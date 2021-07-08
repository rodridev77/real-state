@extends('dashboard.layout.app')
@section('dashboard-content')
<div class="container">
    <div class="row m6">
        <div class="card col-md-12" style="">
            <div class="card-header" style="margin-left:-15px; margin-right: -15px;background-color:rgba(0, 0, 0, 0.03);color:#eb194b;border-top-left-radius:3px;border-top-right-radius:3px;display:flex;justify-content:space-between;font-size:16px">
                <h2>Editar Usuário</h2>
                <div class="opacity-btn">
                    <a href="{{url('/dashboard/users')}}" style="color:#eb194b;text-decoration: none;font-weight:bold;">
                        <i class="fa fa-arrow-left" aria-hidden="true" style="margin-top:7px"></i> Voltar</a>
                </div>
            </div>
            <div class="card-body" style="margin-top:10px">
                <div class="box-form">
                    <form id="form" class="dash-user-form-edit" name="dash-user-form-edit" id="dash-user-form-edit" style="min-width: 320px; width:600px">
                        @csrf
                        <div class="form-group"> @php $user = $user[0];  @endphp
                            <label>Nome</label>
                            <input type="text" class="form-control input-form-user" name="name" value="{{$user->name}}" maxlength="100" required>
                        </div>
                        <div class="form-group">
                            <label>Sobrenome</label>
                            <input type="text" class="form-control input-form-user" name="lastname" value="{{$user->lastname}}" maxlength="100" required>
                        </div>
                        <div class="form-group">
                            <label>CPF</label>
                            <input type="text" class="form-control input-form-user" name="cpf" value="{{$user->cpf}}" maxlength="11" required>
                        </div>
                        <div class="form-group">
                            <label>Telefone</label>
                            <input type="tel" mask="(99)9 9999-9999" class="form-control input-form-user" name="phone" value="{{$user->phone}}" maxlength="21" required>
                        </div>
                        <div class="form-group">
                            <label>Endereço</label>
                            <input type="text" class="form-control input-form-user" name="address" value="{{$user->address}}" maxlength="100" required>
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" name="email" autocomplete="off" class="form-control input-form-user" value="{{$user->email}}" maxlength="100" required>
                        </div>
                        <input type="hidden" class="form-control input-form-user" name="id" value="{{$user->id}}">
                        <div class="text-center" style="margin-top: 20px;">
                            <button type="submit" class="btn btn-outline-primary" id="btn-create-user">Salvar</button>
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
    $('form[name="dash-user-form-edit"]').submit(function(event) {
        event.preventDefault();
        let id = $("input[name='id']").val();
        let name = $("input[name='name']").val();
        let lastname = $("input[name='lastname']").val();
        let cpf = $("input[name='cpf']").val();
        let phone = $("input[name='phone']").val();
        let address = $("input[name='address']").val();
        let email = $("input[name='email']").val();
        let _token = $("input[name='_token']").val();

        $.ajax({
            url: "/dashboard/users/update",
            type:'PUT',
            data: {id:id, name:name, lastname:lastname, cpf:cpf, phone:phone, address:address, email:email, _token:_token},
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