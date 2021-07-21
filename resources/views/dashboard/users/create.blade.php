@extends('dashboard.layout.app')
@section('dashboard-content')
<div class="container">
    <div class="row m6">
        <div class="card col-md-12" style="">
            <div class="card-header" style="margin-left:-15px; margin-right: -15px;background-color:rgba(0, 0, 0, 0.03);color:#eb194b;border-top-left-radius:3px;border-top-right-radius:3px;display:flex;justify-content:space-between;font-size:16px">
                <h2>Cadastrar novo usuário</h2>
                <div class="opacity-btn">
                    <a href="{{url('/dashboard/users')}}" style="color:#eb194b;text-decoration: none;font-weight:bold;">
                        <i class="fa fa-arrow-left" aria-hidden="true" style="margin-top:7px"></i> Voltar</a>
                </div>
            </div>
            <div class="card-body" style="margin-top:10px">
                <div class="box-form">
                    <form id="form" class="dash-user-form" name="dash-user-form" id="dash-user-form" style="min-width: 320px; width:600px">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Nome</label>
                                <input type="text" class="form-control input-form-user" name="name" required maxlength="100">
                            </div>
                        
                            <div class="form-group col-md-6">
                                <label>Sobrenome</label>
                                <input type="text" class="form-control input-form-user" name="lastname" maxlength="100" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>CPF</label>
                                <input type="text" class="form-control input-form-user" name="cpf" id="cpf" maxlength="14" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Telefone</label>
                                <input type="tel" class="form-control input-form-user"  name="phone" id="phone" placeholder="(11) 7777-777" maxlength="21"required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Endereço</label>
                                <input type="text" class="form-control input-form-user" name="address" maxlength="100" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>E-mail</label>
                                <input type="email" name="email" autocomplete="off" class="form-control input-form-user" maxlength="100" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>password</label>
                                <input type="password" name="password" class="form-control input-form-user" maxlength="100" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="role">Permissão Corporativa</label>
                                    <select id="role" name="role" class="form-control" required>
                                        <option selected></option>
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="text-center col-md-12" style="margin-top: 20px;">
                                <button type="submit" class="btn btn-outline-primary" id="btn-create-user">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('dashboard-script')
<script>
    
$(function() {
    $('form[name="dash-user-form"]').submit(function(event) {
        event.preventDefault();
        let name = $("input[name='name']").val();
        let lastname = $("input[name='lastname']").val();
        let cpf = $("input[name='cpf']").val();
        let phone = $("input[name='phone']").val();
        let address = $("input[name='address']").val();
        let email = $("input[name='email']").val();
        let password = $("input[name='password']").val();
        let role = $("select[name='role']").val();
        let _token = $("input[name='_token']").val();

        $.ajax({
            url: "/dashboard/users",
            type:'POST',
            data: {name:name, lastname:lastname, cpf:cpf, phone:phone, address:address, email:email, password:password, role:role, _token:_token},
            success: function(data) {
                let icon = 'success';
                
                if (data.success === false)
                    icon = 'error'
                if (data.success === true) {
                    $("input[type='text'], input[type='tel'], input[type='email'], input[type='password']").each(function() {
                        $(this).val('');
                    });
                }

                Swal.fire({
                position: 'top-end',
                icon: icon,
                title: data.message,
                showConfirmButton: false,
                timer: 1500
                })
            }
        });
    });
});
</script>
@endsection