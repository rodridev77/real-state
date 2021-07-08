<script>{{ asset('assets/js/fontawesome.js') }}</script>
<script>{{ asset('assets/js/jquery.js') }}</script>
<script>{{ asset('assets/js/bootstrap.js') }}</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://rawgit.com/RobinHerbots/Inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

<script> 

$(document).ready(function(){
  $('.cpf').inputmask("999.999.999-99");
});

$(document).ready(function(){
  $('.phone').inputmask({"mask": "(99) 9999-9999"});
});

$(document).ready(function(){
  $('#cpf').inputmask("999.999.999-99");
});

$(document).ready(function(){
  $('#phone').inputmask({"mask": "(99) 9999-9999"});
});

$(document).ready(function(){
    $(".price").inputmask('decimal', {
        'alias': 'numeric',
        'groupSeparator': '.',
        'autoGroup': true,
        'digits': 2,
        'radixPoint': ",",
        'digitsOptional': false,
        'allowMinus': false,
        'prefix': 'R$ ',
        'placeholder': ''
    });
});


</script>