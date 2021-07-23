@extends('dashboard.layout.app')
@section('dashboard-content')
<section>
    <div class="container container-page">
        <div class="card">
            <div class="card-header">
                <div class="page-title">Clientes</div>
                <div class="link-toback">
                    <div class="opacity-btn">
                        <a href="{{url('/dashboard')}}" class="toback-color">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Painel</a>
                    </div>
                    <span style="margin-right:10px;margin-left:10px">|</span>
                    <div class="opacity-btn ">
                        <a href="{{url('dashboard/users/create')}}" class="btn-newdata">Novo Usuário <i class="fas fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 20%;text-align: center;">Nome</th>
                            <th style="width: 15%;text-align: center;">CPF</th>
                            <th style="width: 15%;text-align: center;">Telefone</th>
                            <th style="width: 20%;text-align: center;">Email</th>
                            <th style="width: 20%;text-align: center;">Endereço</th>
                            <th style="width: 10%;text-align: center;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="user-table">
                            <td>{{$user->name}} {{ $user->lastname}}</td>
                            <td class="cpf">{{$user->cpf}}</td>
                            <td class="phone">{{$user->phone}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->address}}</td>
                            <td>
                                <a class="edit-user opacity-btn" href="{{url('/dashboard/users/'.$user->id.'/edit')}}" style="float:left;" data-id="{{$user->id}}" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @if (Auth::user()->can('delete_users', Auth::user()))
                                <form name="user-form-delete" id="user-form-delete">
                                    @csrf
                                    @method('delete')
                                    
                                    <button class="delete-user opacity-btn" data-id="{{$user->id}}" title="Excluir">
                                        <i class="fa fa-trash user-delete-icon" aria-hidden="true"></i>
                                    </button>
                                </form>  
                                @endif                      
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="d-flex justify-content-center">
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('dashboard-script')
<script>
$(".delete-user").click(function(event) {
    event.preventDefault();
    let user_id = $(this).data("id");
    let _token = $("input[name='_token']").val();
   
    $.ajax({
        url: "/dashboard/users/"+user_id,
        type:'DELETE',
        data: {id:user_id, _token:_token},
        success: function(data) {
            let icon = 'success';
                
            if (data.success === false)
                    icon = 'error'
            if (data.success === true) {
                document.location.reload(true);
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
</script>
@endsection