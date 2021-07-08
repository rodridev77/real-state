<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login MyImob</title>
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    
    <style>
        body {
            background-color:#f1f1f1;
        }
        .list-group-item {
            cursor: pointer;
        }
        .panel-body form .countries_added .delete {
            cursor: pointer;
            background-image: url(./close.png);
            height: 11px;
            width: 11px;
            display: inline-block;
            background-size: contain;
            margin-bottom: -1px;
        }
    </style>
</head>

<body id="page-top">

<div class="container" style="height:100vh;display:flex; align-items: center; justify-content: center;">
 
<div class="row">
    </div>
    <div class="row col-md-12 align-middle" style="flex-direction: row; justify-content: center; align-items: center; height: 100%;">
        <div id="login" class="col-md-8">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 m-auto p-4">
                        <div class="col-sm-12 m-auto p-4" style="background:#fff; border-radius:20px; box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);">
                            
                            <h3 style="text-align: center;font-size: 24px; font-weight:900; color: rgba(0,0,0,0.7)">Que bom que você está aqui!</h3>
                            <h4 style="text-align: center;font-size: 16px; font-weight:600; margin-bottom:20px; color: rgba(0,0,0,0.7)">Bem-vindo à ImobWeb.</h4>
                            <form id="login-form">
                                @csrf
                                <div class="form-group row">
                                    <label for="email" class="col-md-12 col-form-label" style="font-size: 14px;color: rgba(0,0,0,0.7)">E-mail</label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" name="email" style="font-size: 14px; font-weight:600; rgba(0,0,0,0.2); border-radius: 25px" class="form-control" name="email" required autocomplete="email" placeholder="Informe seu e-mail de login" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-12 col-form-label " style="font-size: 14px;color: rgba(0,0,0,0.7)">Senha</label>

                                    <div class="col-md-12">
                                        <input id="password" type="password" name="password" style="font-size: 14px; font-weight:600; rgba(0,0,0,0.2); border-radius: 25px" class="form-control" name="password" placeholder="Informe sua senha de login" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-12 offset-md-12" style="display:flex; justify-content:space-between; margin-bottom: 20px; margin-top: 10px;">
                                        <a style="font-size: 14px; font-weight:400; margin-left: 20px;color:#35AC5B" class="" href="/">Voltar ao site</a>
                                    </div>

                                    <div class="col-md-12 offset-md-12" style="display:flex; justify-content: center; align-items: center;">
                                        <button type="submit" class="btn btn-lg col-md-12 btn-primary" style="color:#fff;font-size: 18px; font-weight:600; border-radius: 25px;">
                                            Entrar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('dashboard.layout.includes.script-links')
<script>
$(function() {
    $("form#login-form").submit(function(event) {
        
        event.preventDefault();
        let email = $("input[name='email']").val();
        let password = $("input[name='password']").val();
        let _token = $("input[name='_token']").val();
       
        $.ajax({
            url: "/authenticate",
            type:'POST',
            data: {password:password, email:email, _token:_token},
            success: function(data) {
                if (data.success === false) {
                    $("input[type='email'], input[type='password']").each(function() {
                        $(this).val('');
                    });

                    Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: data.message,
                    showConfirmButton: false,
                    timer: 1500
                    })
                }
                else {
                    if (data.success === true)
                        window.location = '/dashboard';
                }
            }
        });
    });
});
</script>
</body>
</html>