var hash;
var bancard;
var cardtoken;





var formulario = document.getElementsByClassName("formulario");
// gerando a o token
$.ajax({
    type: "post",
    url: "public/ajax/sessaoIdAjax.php",
    dataType: "json",
}).done(function(e){
    PagSeguroDirectPayment.setSessionId(e.id);
});







// descobrindo a bandeira do cartão de credito
var numecard = document.getElementById("numero");
numecard.addEventListener("keyup", function(e){
    
    if (numecard.value.length >= 6) {
        
        PagSeguroDirectPayment.getBrand({
            cardBin: numecard.value.substring(0, 6),
            success: function(response) {
                //bandeira encontrada
                $.each(response, function (key, value) { 
                    bancard = value.name;
                    console.log(value.name);
                });
                //  a quantidade de parcelamento
                PagSeguroDirectPayment.getInstallments({
                    amount: 100,
                    maxInstallmentNoInterest: 4,
                    brand: bancard,
                    success: function(e){
                        var selec = document.getElementById('parce');
                        // Retorna as opções de parcelamento disponíveis
                        
                        $.each(e.installments[bancard], function (key, value) { 
                            var opt   = document.createElement("option");
                            opt.value = value.quantity+'x'+value.installmentAmount;
                            let juros = value.interestFree == true ? "Sem juros" : "Com juros";
                            opt.innerHTML = value.quantity+'X'+value.installmentAmount+" "+juros;
                            selec.appendChild(opt);
                            document.getElementById('form-select').style.display = 'flex';
                            
                        });
                    }
                });
            }
        });

    }
});

document.getElementById("form").addEventListener("submit", function(x) {
    x.preventDefault();
    let val = document.getElementById('validade').value.split('/');

    PagSeguroDirectPayment.onSenderHashReady(function(response){
        if(response.status == 'error') {
            console.log(response.message);
            return false;
        }
        hash = response.senderHash; //Hash estará disponível nesta variável.
    });

    // '4111111111111111' '013'
    PagSeguroDirectPayment.createCardToken({
        cardNumber: document.getElementById('numero').value, // Número do cartão de crédito
        brand: bancard, // Bandeira do cartão
        cvv: document.getElementById('cvv').value, // CVV do cartão
        expirationMonth: val[0], // Mês da expiração do cartão
        expirationYear: val[1], // Ano da expiração do cartão, é necessário os 4 dígitos.
        success: function(e) {
            // Retorna o cartão tokenizado.
            $.each(e, function (key, value) { 
                console.log(value.token);
                cardtoken = value.token;
            });

            $.ajax({
                type: "post",
                url: "public/ajax/creditoAjax.php",
                data: {'hash': hash, 'cardtoken': cardtoken},
                dataType: "json",
            }).done(function(cred){
                console.log(cred)
                alert("pedido finalizado com sucesso")
            });
        }
     });
    
});
