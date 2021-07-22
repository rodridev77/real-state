<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Not Found</title>
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/css/style.css">
</head>
<body>
    <div class="containter .notfound" style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-top:200px; color: #eb194b; font-size: 32px">
        <div class="notfound-message">
            <h3>{{$message}}</h3>
        </div>
        <div class="opacity-btn">
            <a href="{{url('/dashboard')}}" style="color:#eb194b;text-decoration: none;font-weight:bold;">
                <i class="fa fa-arrow-left" aria-hidden="true" style="margin-top:7px"></i> Voltar
            </a>
        </div>
    </div>

    @include('dashboard.layout.includes.script-links')
</body>
</html>