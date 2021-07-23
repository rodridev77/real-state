@extends('dashboard.layout.app')
@section('dashboard-content')
<section>
    <div class="container container-page">
        <div class="card" style="position: relative;top:30px;">
            <div class="card-header">
                <div class="page-title">Vendas</div>
                <div class="link-toback">
                    <div class="opacity-btn">
                        <a href="{{url('/dashboard')}}" class="toback-color">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Painel</a>
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
                            <td>{{$property->city}}</td>
                            <td>{{$property->area}} m<sup>2</sup></td>
                            <td class="price">{{$property->price}}</td>
                            <td>{{$property->status}}</td>
                            <td>
                                @if($property->status == 'available')
                                <div style="display:flex;justify-content:center;align-items:center">
                                    <a class="show-property opacity-btn" href="{{ url('/dashboard/sales', $property->id) }}" style="float:left;" data-id="{{$property->id}}">
                                        Vender
                                    </a>
                                </div> 
                                @endif                    
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
$("#sale-approve-btn").click(function(event) {
    event.preventDefault();
    let sale_id = $(this).data("id");
    let _token = $("input[name='_token']").val();
   
    $.ajax({
        url: "/dashboard/properties/approve-sale",
        type:'PATCH',
        data: {id:sale_id, _token:_token},
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