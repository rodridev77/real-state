@extends('dashboard.layout.app')
@section('dashboard-content')
<section>
    <div class="container container-page">
        <div class="card">
            <div class="card-header">
                <div class="page-title">Ceo</div>
                <div class="link-toback">
                    <div class="opacity-btn">
                        <a href="{{url('/dashboard')}}" class="toback-color">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Painel</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">

                <div class="row box-content-card">
                    <div class="col-md-3 card-content-inner">
                        <a href="javascript:void(0)" class="dash-card-link ceo-cardmenu">
                            <div class="card-link-title">
                                <div class="area-link">
                                    <div class="data-ceo-card" style="padding-top:30px;">
                                        <h3 style="">{{$total_clients}}</h3>
                                        <div style="text-align:center">Clientes Cadastrados</div>
                                    </div>
                                </div>
                                <div class="page-icon" style="color:rgba(0,0,0,.15);">
                                    <i class="fas fa-user-friends icon-ceo-card"></i>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3 card-content-inner">
                        <a href="javascript:void(0)" class="dash-card-link ceo-cardmenu">
                            <div class="card-link-title">
                                <div class="area-link">
                                    <div class="data-ceo-card" style="padding-top:30px;">
                                        <h3 style="">{{$total_properties}}</h3>
                                        <div style="text-align:center">Imóveis</div>
                                    </div>
                                </div>
                                <div class="page-icon" style="color:rgba(0,0,0,.15);">
                                    <i class="fas fa-hotel icon-ceo-card"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row box-content-card" style="margin-top:30px">
                    <div class="col-md-3 card-content-inner">
                        <a href="javascript:void(0)" class="dash-card-link ceo-cardmenu" style="z-index:888">
                            <div class="card-link-title">
                                <div class="area-link">
                                    <div class="data-ceo-card" style="padding-top:25px;">
                                        <h3 style="">{{$total_buyers }}</h3>
                                        <div style="text-align:center">Clientes Compradores</div>
                                    </div>
                                </div>
                                <div class="page-icon" style="color:rgba(0,0,0,.15);">
                                    <i class="fas fa-briefcase icon-ceo-card"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 card-content-inner">  
                        <a href="javascript:void(0)" class="dash-card-link ceo-cardmenu">
                            <div class="card-link-title">
                                <div class="area-link">
                                    <div class="data-ceo-card" style="padding-top:35px;">
                                        <h3 class="price" style="font-size:20px">{{$amount}}</h3>
                                        <div style="text-align:center">Faturamento</div>
                                    </div>
                                </div>
                                <div class="page-icon" style="color:rgba(0,0,0,.15);">
                                    <i class="far fa-money-bill-alt icon-ceo-card"></i>
                                </div>
                            </div>
                        </a>
                    </div>
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
        url: "/dashboard/users/delete",
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