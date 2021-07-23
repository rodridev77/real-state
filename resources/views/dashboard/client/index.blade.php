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
                    <div class="opacity-btn">
                        <a href="{{url('dashboard/clients/create')}}" style="text-decoration: none;font-weight:bold">Novo Cliente <i class="fas fa-plus"></i></a>
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
                        @foreach($clients as $client)
                        <tr class="client-table">
                            <td>{{$client->name}} {{ $client->lastname}}</td>
                            <td class="cpf">{{$client->cpf}}</td>
                            <td class="phone">{{$client->phone}}</td>
                            <td>{{$client->email}}</td>
                            <td>{{$client->address}}</td>
                            <td>
                                <a class="edit-client opacity-btn" href="{{url('/dashboard/clients/'.$client->id.'/edit')}}" style="float:left;" data-id="{{$client->id}}" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
    
                                <form name="client-form-delete" id="client-form-delete">
                                    @csrf
                                    @method('delete')
                                    
                                    <button class="delete-client opacity-btn" data-id="{{$client->id}}" title="Excluir">
                                        <i class="fa fa-trash client-delete-icon" aria-hidden="true"></i>
                                    </button>
                                </form>                         
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="d-flex justify-content-center">
                    {!! $clients->links() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('dashboard-script')
<script>
$(".delete-client").click(function(event) {
    event.preventDefault();
    let client_id = $(this).data("id");
    let _token = $("input[name='_token']").val();
   
    $.ajax({
        url: "/dashboard/clients/"+client_id,
        type:'DELETE',
        data: {id:client_id, _token:_token},
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