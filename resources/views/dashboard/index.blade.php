@extends('dashboard.layout.app')

@section('dashboard-content')
<section>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Painel</h2>
                <div>
                    <a href="#" class="welcome-user"><span style="color:rgba(1,1,1,.5)">
                            Bem vindo:</span> {{auth()->user()->name}}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">

                <div class="row box-content-card">
                    <div class="col-md-3 card-content-inner">
                        <a href="{{url('/dashboard/clients')}}" class="dash-card-link">
                            <div class="card-link-title">
                                <div class="area-link">
                                    <h3>CLIENTES</h3>
                                </div>
                                <div class="page-icon">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3 card-content-inner">
                        <a href="{{url('/dashboard/users')}}" class="dash-card-link">
                            <div class="card-link-title">
                                <div class="area-link">
                                    <h3>USUÁRIOS</h3>
                                </div>
                                <div class="page-icon">
                                    <i class="fas fa-user-friends"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row box-content-card" style="margin-top:30px">
                    <div class="col-md-3 card-content-inner">
                    <a href="{{url('/dashboard/sales')}}" class="dash-card-link">
                        <div class="card-link-title">
                            <div class="area-link">
                                <h3>VENDAS</h3>
                            </div>
                            <div class="page-icon">
                                <i class="fab fa-salesforce"></i>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-md-3 card-content-inner">  
                        <a href="{{url('/dashboard/properties')}}" class="dash-card-link">
                            <div class="card-link-title">
                                <div class="area-link">
                                    <h3>IMOVEIS</h3>
                                </div>
                                <div class="page-icon">
                                <i class="fas fa-hotel"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row box-content-card" style="margin-top:30px">
                    <div class="col-md-3 card-content-inner">
                        <a href="{{url('/dashboard/ceo')}}" class="dash-card-link">
                            <div class="card-link-title">
                                <div class="area-link">
                                    <h3>CEO</h3>
                                </div>
                                <div class="page-icon">
                                    <i class="fas fa-user-tie"></i>
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