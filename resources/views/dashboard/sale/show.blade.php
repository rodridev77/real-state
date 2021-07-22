@extends('dashboard.layout.app')
@section('dashboard-content')
<section>
    <div class="container container-page">
        <div class="card" style="position: relative;top:30px;">
            <div class="card-header" style="display:flex;justify-content:space-between;font-size:16px">
                <div style="color: orange;font-weight:bold;margin-right:10px">Vendas</div>
                <div style="display:flex;justify-content:space-between;align-items:center">
                    <div class="opacity-btn">
                        <a href="{{url('/dashboard/sales')}}" style="color:#eb194b;text-decoration: none;font-weight:bold;">
                            <i class="fa fa-arrow-left" aria-hidden="true" style="margin-top:7px"></i> Voltar</a>
                    </div>
                    <span style="margin-right:10px;margin-left:10px">|</span>
                    <div class="opacity-btn ">
                        <a href="{{url('dashboard/properties/create')}}" style="text-decoration: none;font-weight:bold">Novo Imóvel <i class="fas fa-plus"></i></a>
                    </div>
                </div>
            </div>

            <div class="row" style="display:flex;justify-content:center;align-items:start;margin:0px">  

                <div class="col-md-6" >
                    <div class="row" style="display:flex;flex-direction:column;justify-content:center;align-items:start;font-size:16px;margin:0px;margin-top:20px;">

                        <div class="col-md-12 text-property" style="margin-right:15px;margin-bottom:15px;font-size:24px">
                            <span style="border-bottom:1px solid #eb194b">Dados do Imóvel</span>
                        </div>  
                        <div class="col-md-12 property-addess" style="margin-right:15px">
                            <table class="table table-striped property-data">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Código</th>
                                        <td class="table-cell-sale">{{$property->code ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Área </th>
                                        <td class="table-cell-sale" >{{$property->area ?? ''}} m<sup>2</sup></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Quartos</th>
                                        <td class="table-cell-sale">{{$property->bedroom ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Suítes</th>
                                        <td class="table-cell-sale">{{$property->suite ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Banheiros</th>
                                        <td class="table-cell-sale">{{$property->bathroom ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Garagem</th>
                                        <td class="table-cell-sale">{{$property->garage ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Price</th>
                                        <td class="price table-cell-sale">{{$property->price  ?? 'R$ 000.00'}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tipo</th>
                                        <td class="table-cell-sale">{{$property->type ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Status</th>
                                        <td class="table-cell-sale">{{$property->status  ?? ''}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-12 text-property" style="margin:20px 0;font-size:20px">
                            <span style="border-bottom:1px solid #eb194b">Endereço</span>
                        </div> 

                        <div class="col-md-12 property-addess" style="margin-left:0 20px;">
                            <table class="table table-striped">
                                <thead>
                                </thead>
                                <tbody>
                                @if ($property->address !== null)
                                    <tr>
                                        <th scope="row">Rua</th>
                                        <td class="table-cell-sale">{{$property->address->street}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Número</th>
                                        <td class="table-cell-sale">{{$property->address->number}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Bairro</th>
                                        <td class="table-cell-sale">{{$property->address->district}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Cidade</th>
                                        <td class="table-cell-sale">{{$property->address->city}}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        
                <div class="col-md-6">
                    <div class="row" style="display:flex;flex-direction:column;justify-content:center;align-items:start;font-size:16px;margin:0px;margin-top:20px">
                        <div class="col-md-12 search-client" style="width:100%">
                            <form name="client-form-search" id="client-form-search" style="width:100%">
                                @csrf
                                <div class="form-group input-group" style="margin-left:15px;margin-top:20px;">
                                    <input name="cpf" class="cpf form-control input-form-user" placeholder="Consultar CPF" type="text" maxlength="14" class="form-control" required>
                                    <span style="display:none" id="msg-cpferror">Informe o CPF</span>
                                    <button type="button" id="search-client" class="btn btn-default">
                                        <span class="glyphicon glyphicon-search"></span> Pesquisar
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-property" style="margin-left:15px;margin-right:15px;margin-bottom:15px;font-size:24px">
                            <span style="border-bottom:1px solid #eb194b">Dados do Comprador</span>
                        </div> 
                        <div class="col-md-12" style="margin-left:15px;margin-right:15px">
                            <table class="table table-striped property-data" id="client-table">
                                <thead>
                                </thead>
                                <tbody>   
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12" style="display:flex;justify-content:center;align-items:center;font-size:16px;pading-bottom:50px;margin-bottom:50px;margin-top:-90px">
                    <form name="" id="" style="width:100%">
                        @csrf
                        <input id="property_price" type="hidden" value="{{$property->price ?? ''}}">
                        <input id="property_id" type="hidden" value="{{$property->id ?? ''}}">
                        <input id="client_id" type="hidden" value="">
                        <button type="button" id="btn-create-sale" class="btn btn-outline-primary" style="width:30%!important">
                            Concluir Venda
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('dashboard-script')
<script>
$("#search-client").click(function(event) {
    event.preventDefault();

    let cpf = $("input[name='cpf']").val();
    let _token = $("input[name='_token']").val();

    //let cpf_check = $("#msg-cpferror").val(); 
    //cpf = cpf.trim();
    //alert(client_id)
    if ((cpf.indexOf('_') != -1) || (cpf.length == 0))
        alert("Informe o CPF do cliente.")
   
    $.ajax({
        url: "/dashboard/search-client",
        type:'POST',
        data: {cpf:cpf, _token:_token},
        success: function(data) {
            let icon = 'success';
                
            if (data.success === false) {
                icon = 'error';

                Swal.fire({
                position: 'top-end',
                icon: icon,
                title: data.message,
                showConfirmButton: false,
                timer: 1500
                })
            }
            if (data.success === true) {
                $("#client-table tbody").append(
                    "<tr><th scope='row'>Nome</th><td id='client-name' class='table-cell-sale'>" + data[0].client.name +"</td></tr>" +
                    "<tr><th scope='row'>Sobrenome</th><td id='client-lastname' class='table-cell-sale'>" + data[0].client.lastname +"</td></tr>" +
                    "<tr><th scope='row'>CPF</th><td id='cpf' class='table-cell-sale'>"+data[0].client.cpf +"</td></tr>" +
                    "<tr><th scope='row'>Telefone</th><td id='phone' class='table-cell-sale phone'>" + data[0].client.phone +"</td></tr>" +
                    "<tr><th scope='row'>Endereço</th><td id='client-address' class='table-cell-sale'>" + data[0].client.address +"</td></tr>" +
                    "<tr><th scope='row'>E-mail</th><td id='client-email' class='table-cell-sale'>" + data[0].client.email +"</td></tr>"
                );

                $("#client_id").val(data[0].client.id);
                $("#cpf").inputmask("999.999.999-99");
                $("#phone").inputmask({"mask": "(99) 9999-9999"});
            }
        }
    });
});

$("#btn-create-sale").click(function(event) {
    event.preventDefault();

    let property_price = $("#property_price").val();
    let property_id = $("#property_id").val();
    let client_id = $("#client_id").val();
    let _token = $("input[name='_token']").val();
    let cpf2 = $("input[name='cpf']").val();
    
    if (cpf2.length == 0) {
        //$("#msg-cpferror").css("display", "block");
        alert("Informe o CPF do cliente.")
        return false;
    }
   
    $.ajax({
        url: "/dashboard/sales",
        type:'POST',
        data: {property_price:property_price, property_id:property_id, client_id:client_id, _token:_token},
        success: function(data) {
            let icon = 'success';
                
            if (data.success === false) {
                icon = 'error';
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