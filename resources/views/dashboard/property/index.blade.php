@extends('dashboard.layout.app')
@section('dashboard-content')
<section>
    <div class="container container-page">
        <div class="card">
            <div class="card-header">
                <div class="page-title">Imóveis</div>
                <div class="link-toback">
                    <div class="opacity-btn">
                        <a href="{{url('/dashboard')}}" class="toback-color">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Painel</a>
                    </div>
                    <span style="margin-right:10px;margin-left:10px">|</span>
                    <div class="opacity-btn ">
                        <a href="{{url('dashboard/properties/create')}}" style="text-decoration: none;font-weight:bold">Novo Imóvel <i class="fas fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10%;text-align: center;">Código</th>
                            <th style="width: 15%;text-align: center;">Tipo</th>
                            <th style="width: 15%;text-align: center;">Cidade</th>
                            <th style="width: 10%;text-align: center;">Área</th>
                            <th style="width: 15%;text-align: center;">Preço</th>
                            <th style="width: 20%;text-align: center;">Status</th>
                            <th style="width: 15%;text-align: center;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($properties as $property)
                        <tr class="property-table">
                            <td>{{$property->code}}</td>
                            <td>{{$property->type}}</td>
                            <td>{{$property->address->city ?? ''}}</td>
                            <td>{{$property->area}} m<sup>2</sup></td>
                            <td class="price">{{$property->price}}</td>
                            <td>{{$property->status}}</td>
                            <td>
                                <div style="display:flex;justify-content:space-between;align-items:center">
                                    
                                    <a class="edit-user opacity-btn" href="{{url('/dashboard/properties/'.$property->id.'/edit')}}" style="float:left;" data-id="{{$property->id}}" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
        
                                    <form name="user-form-delete" id="user-form-delete">
                                        @csrf
                                        @method('delete')
                                        
                                        <button class="delete-user opacity-btn" data-id="{{$property->id}}" title="Excluir">
                                            <i class="fa fa-trash user-delete-icon" aria-hidden="true"></i>
                                        </button>
                                    </form>    
                                </div>                     
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="d-flex justify-content-center">
                    {!! $properties->links() !!}
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
        url: `/dashboard/properties/${user_id}`,
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