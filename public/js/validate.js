var nome   = document.getElementById('nome');
var numero = document.getElementById('numero');
var cvv    = document.getElementById('cvv');
var val    = document.getElementById('validade');

nome.addEventListener("keyup", function(params) {
    nome.value = nome.value.toUpperCase();
    if (nome.value == '') {
        document.getElementById('nomec').innerHTML = 'alison';
    } else {
        document.getElementById('nomec').innerHTML = nome.value;
    }
})

numero.addEventListener("keyup", function(params) {
    if (numero.value == '') {
        document.getElementById('numeroc').innerHTML = '1234567...';
    } else {
        var num = numero.value.replace(/[^\d]/g, "");
        num = numero.value.replace(/(\d{4})(\d{4})(\d{4})(\d{4})/g, "$1 $2 $3 $4");
        document.getElementById('numeroc').innerHTML = num;
    }
})

cvv.addEventListener('keyup', function(){
    var cv = cvv.value.replace(/[^\d]/g, "");
    cvv.value = cv;
})

val.addEventListener("keyup", function() {
    
    if (val.value == '') {
        document.getElementById('validc').innerHTML = '00/0000';
    } else {
        var valid = val.value.replace(/[^\d]/g, "");
        valid = valid.replace(/(\d{2})(\d{4})/g, "$1/$2");
        val.value = valid;
        document.getElementById('validc').innerHTML = valid;
    }
})
