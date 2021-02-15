<div id="credito">

    <form id="form" method="post">
        <div class="formulario">

            <div class="card">

                <div class="dados">
                    <div class="numero">
                        <p id="numeroc">1234 1234 1234 1234</p>
                    </div>
                    
                    <div class="valid flex">
                        <p>validade </p>
                        <p id="validc">00/0000</p>
                    </div>
                    
                    <div class="nome">
                        <p id="nomec">Alison Vitor Brito Souza</p>
                    </div>
                </div>
                
            </div>

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" placeholder="exemplo: Alison Souza">
            </div>

            <div class="form-group">
                <label for="numero">Numero</label>
                <input type="text" name="numero" id="numero" placeholder="exemplo: 12345678..." maxlength="16">
            </div>

            <div class="flex-space">
                <div class="form-group col-1-2">
                    <label for="validade">Validade</label>
                    <input type="text" name="validade" id="validade" placeholder="MM / YY" maxlength="6">
                </div>

                <div class="form-group col-1-2">
                    <label for="cvv">CVV</label>
                    <input type="text" name="cvv" id="cvv" placeholder="exemplo: 123" maxlength="3">
                </div>
            </div>
            
            <div class="clear"></div>
            <div id="form-select" class="form-select">
                <label for="parce">Parcelamento</label>
                <select name="parce" id="parce">
                </select>
            </div>

            <input class="btn" type="submit" value="finalizar pagamento">
        </div>
    </form>

</div>
<script type="text/javascript" src=
"https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script src="public/js/credito.js"></script>
<script src="public/js/validate.js"></script>