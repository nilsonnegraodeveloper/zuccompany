<!-- jQuery -->
<script src="{{ asset('static/vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('static/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('static/vendors/fastclick/lib/fastclick.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('static/vendors/iCheck/icheck.min.js') }}"></script>
<!-- DateJS -->
<script src="{{ asset('static/vendors/DateJS/build/date.js') }}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('static/vendors/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('static/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap-wysiwyg -->
<script src="{{ asset('static/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script>
<script src="{{ asset('static/vendors/jquery.hotkeys/jquery.hotkeys.js') }}"></script>
<script src="{{ asset('static/vendors/google-code-prettify/src/prettify.js') }}"></script>
<!-- jQuery Tags Input -->
<script src="{{ asset('static/vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
<!-- Switchery -->
<script src="{{ asset('static/vendors/switchery/dist/switchery.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('static/vendors/select2/dist/js/select2.full.min.js') }}"></script>
<!-- jQuery autocomplete -->
<script src="{{ asset('static/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js') }}"></script>
<!-- starrr -->
<script src="{{ asset('static/vendors/starrr/dist/starrr.js') }}"></script>

<!-- Datatables -->
<script src="{{ asset('static/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('static/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('static/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('static/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('static/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('static/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('static/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('static/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('static/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('static/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('static/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script src="{{ asset('static/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset('static/build/js/custom.min.js') }}"></script>
<!-- Scripts Mask -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
<!-- Script Função MaskMoney -->
<script src="{{ asset('static/build/js/jquery.maskMoney.js') }}"></script>

<script type="text/javascript">
    jQuery(function($) {
        $("#cep").mask("99.999-999");
    });

    function limpa_formulário_cep() {
        //Limpa valores do formulário de cep.
        document.getElementById('endereco').value = ("");
        document.getElementById('bairro').value = ("");
        document.getElementById('cidade').value = ("");
        document.getElementById('estado').value = ("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('endereco').value = (conteudo.logradouro);
            document.getElementById('bairro').value = (conteudo.bairro);
            document.getElementById('cidade').value = (conteudo.localidade);
            document.getElementById('estado').value = (conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('endereco').value = "...";
                document.getElementById('bairro').value = "...";
                document.getElementById('cidade').value = "...";
                document.getElementById('estado').value = "...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);


            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    /* Máscaras ER */
    function mascara(o, f) {
        v_obj = o
        v_fun = f
        setTimeout("execmascara()", 1)
    }

    function execmascara() {
        v_obj.value = v_fun(v_obj.value)
    }

    function mtel(v) {
        v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
        v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
        v = v.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
        return v;
    }

    $(document).on('keydown', '[data-mask-for-cpf-cnpj]', function(e) {

        var digit = e.key.replace(/\D/g, '');

        var value = $(this).val().replace(/\D/g, '');

        var size = value.concat(digit).length;

        $(this).mask((size <= 11) ? '000.000.000-00' : '00.000.000-00');
    });

    $(function() {
        $("#money").maskMoney({
            symbol: '',
            showSymbol: true,
            thousands: '.',
            decimal: ',',
            symbolStay: true
        });
    })

    // Remove pontos, vírgulas, espaços e marcadores de moeda.
    function limpar(x) {
        return x.replace(",", "").replace(".", "").replace(" ", "");
    }

    // Recebe um número inteiro (valor em centavos) e devolve uma string com o
    // seu valor formatado como se fosse um valor monetário em real.
    function formatarMoeda(numero) {

        if (isNaN(numero)) return "Favor Informar a Quantidade!";

        // Descobre se o valor é negativo e extrai o sinal.
        var negativo = numero < 0;
        numero = Math.abs(numero);

        // Usado para produzir a resposta, caractere por caractere.
        var resposta = "";

        // Converte o número para string.
        var t = numero + "";

        // Itera cada caractere do número, de trás para frente.
        for (var i = t.length - 1; i >= 0; i--) {
            var j = t.length - i;

            // Adiciona o caractere na resposta.
            resposta = t.charAt(i) + resposta;

            // Colocar uma vírgula ou um ponto se for o caso.
            if (j == 2) {
                resposta = "," + resposta;
            } else if (j % 3 == 2 && i != 0) {
                resposta = "." + resposta;
            }
        }

        // Preenche os zeros a esquerda para o caso de o valor ser muito pequeno (menos de um real).
        if (resposta.length < 4) {
            resposta = "0,00".substring(0, 4 - resposta.length) + resposta;
        }

        // Coloca o sinal de negativo, se necessário.
        if (negativo) resposta = "-" + resposta;

        // Coloca como prefixo a unidade da moeda.
        return "R$ " + resposta;
    }

    function somar() {
        // Obtém os dois valores digitados.
        var a = parseInt(limpar($("#campo1").val()), 10);
        var b = parseInt(limpar($("#campo2").val()), 10);

        // Executa a soma.
        var soma = a * b;

        // Formata o resultado como moeda.
        var resposta = formatarMoeda(soma);
        $("#resultado").html(resposta);
    }

    $(document).ready(function() {
        $("#executar").click(somar);
    });

    $('#submit').click(function() {
        $(this).addClass('button_loader').attr("value", "");
        window.setTimeout(function() {
            $('#submit').removeClass('button_loader').attr("value", "\u2713");
            $('#submit').prop('disabled', true);
        }, 3000);
    });
</script>


