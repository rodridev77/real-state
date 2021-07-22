@extends('layout.app')

@section('content')
    @php //dd(); @endphp
    <div class="container-fluid">
        <div class="container" style="margin-top:50px;border:3px solid #fff;padding-top:10px;border-radius:5px;border-top-color: orange;">
            <div class="property-search" >
                <div class="box-form">
                    <form class="search_form" name="search_form" id="search_form" style="width:100%">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label>Código</label>
                                <input type="text" class="form-control" name="search_code" maxlength="5">
                            </div>
                            
                            <div class="form-group col-md-2">
                                <label for="search_type">Tipo de Imóvel</label>
                                    <select id="search_type" name="search_type" class="form-control" required>
                                        <option selected>Todos</option>
                                        <option>Casa</option>
                                        <option>Apartamento</option>
                                        <option>Sobrado</option>
                                        <option>Galpão</option>
                                        <option>Sobrado</option>
                                    </select>
                                </label>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="search_bedrooms">N° de Quartos</label>
                                    <select id="search_bedrooms" name="search_bedrooms" class="form-control">
                                        <option selected></option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                </label>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="search_city">Cidade</label>
                                    <select id="search_city" name="search_city" class="form-control">
                                        <option selected></option>
                                        <option>Campinas</option>
                                        <option>Curitiba</option>
                                        <option>São Paulo</option>
                                        <option>Bauro</option>
                                        <option>Sorocaba</option>
                                        <option>São José</option>
                                        <option>Diadema</option>
                                    </select>
                                </label>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="search_price">Valor</label>
                                    <select id="search_price" name="search_price" class="form-control">
                                        <option selected></option>
                                        <option>R$ 50.000,00 - R$ 100.000,00</option>
                                        <option>R$ 100.000,01 - R$ 200.000,00</option>
                                        <option>R$ 200.000,01 - R$ 300.000,00</option>
                                        <option>R$ 300.000,01 - R$ 400.000,00</option>
                                        <option>R$ 400.000,01 - R$ 500.000,00</option>
                                        <option>R$ 500.000,01 - R$ 10.000.000,00</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <input type="hidden" value="teste" name="teste">
                        <div class="form-row" style="display:flex;justify-content;align-items:center">
                            <div class="form-group col-md-12">
                                <div class="text-center" style="margin-top: 20px;">
                                    <button type="submit" class="btn btn-outline-primary" id="search_btn">Pesquisar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container" style="border:1px solid rgba(0,0,0,.3); padding-top:5px">
            <did class="property-box" style="" >
                <div class="row box-inner" >
                @foreach($properties as $property)
                    <div class="col-md-3 property_item" style="pading:5px 15px">
                        <div class="card" style="display:flex;flex-direction:column;justify-content:center;align-item:center; height:400px; background-color: rgba(0,0,0,.1)">
                            <div class="property-image">
                            </div>
                            <div class="property-type" style="padding-left:10px;padding-top:20px">
                                {{$property->type}}
                            </div>
                            <div class="property-address" style="display:flex;flex-direction:column;justify-content:center;align-item:center;padding-left:10px;padding-top:20px">
                                <div class="property-street" >
                                    {{$property->address->street ?? ''}} {{$property->address->number ?? ''}}
                                </div>
                                <div class="property-district">
                                    <span class="price property-type">
                                        {{$property->district}}
                                    </span>
                                </div>
                                <div class="property-city">
                                    <span class="property-type">
                                        {{$property->city}}
                                    </span>
                                </div>
                                <div class="property-price">
                                    <span id="price" class="property-type">
                                        {{$property->price}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-center loadmore-container" style="margin-top:10px">
                <form id="loading-more">
                    <div class="form-row" style="display:flex;justify-content;align-items:center">
                        <div class="form-group col-md-12">
                            <div class="text-center" style="margin-top: 20px;">
                                <input type="hidden" id="current_page" value="{{$properties->currentPage()}}">
                                <button type="submit" class="btn btn-outline-primary" id="btn-loadmore">Carregar mais</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('dashboard-script')
<script> 
$(function() {
    $('form[name="search_form"]').submit(function(event) {
        event.preventDefault(); 
    
        let code = $("input[name='search_code']").val();
        let type = $("select[name='search_type']").val();
        let bedrooms = $("select[name='search_bedrooms']").val();
        let city = $("select[name='search_city']").val();
        let price = $("select[name='search_price']").val();
        let _token = $("input[name='_token']").val();

        $.ajax({
            url: "/search/property",
            type:'GET',
            data: {code:code, type:type, bedrooms:bedrooms, city:city, price:price, _token:_token},
            success: function(data) {
                let icon = 'success';
                //console.log(data);
                
                if (data.success === false)
                    icon = 'error'
                if (data.success === true) {
                    $("input[type='text'], select").each(function() {
                        $(this).val('');
                    });
                    //alert(data[].result[0].bedroom);
                    //let teste = '<div>'+data.result[0].bedroom+'</div>';
                    //$(".box-inner").html(loadProperty(data.result)).fadeIn();
                    for (var y = 0; y < data.result.length; y++) {
                        console.log(data.result[y]);
                        if (y == 0) {
                            $(".box-inner").html(loadProperty2(data.result[y]));
                            $("teste").fadeIn(3000);
                        } else {
                            $(".box-inner").append(loadProperty2(data.result[y]));
                            $("teste").fadeIn(3000);
                        }
                    }   
                    $("#loading-more").hide();                    
                }
            }
        });
    });

    $("#loading-more").submit(function(event) {
        event.preventDefault(); 

        let current_page = $("#current_page").val();
        let _token = $("input[name='_token']").val();

        $.ajax({
            url: "/home/loadmore",
            type:'GET',
            data: {current_page:current_page, _token:_token},
            success: function(data) {
                let icon = 'success';
            
                if (data.properties.data.length == 0) {
                    alert("No more");
                    $("#loading-more").hide();
                    $(".loadmore-container").html(
                        "<div class='nomore-msg' style='color:primary'>Fim dos resultados.</div>"
                    );
                    return false;
                }
                if (data.success === false)
                    icon = 'error'
                if (data.success === true) {
                    //console.log(data.properties.data[0].address.city);
                    $(".box-inner").append($(loadProperty(data.properties.data)).fadeIn(3000));
                    $("#current_page").val(data.properties.current_page);
                }
            }
        });
    });
});

function loadProperty(data) {
    let load = "";
    
    for (var i = 0; i < data.length; i++) {
        load += "<div class='col-md-3 property_item' style='pading:5px 15px'>" +
            "<div class='card' style='display:flex;flex-direction:column;justify-content:center;align-item:center; height:400px; background-color: rgba(0,0,0,.1)'>"+
                "<div class='property-image'></div>"+
                "<div class='property-type' style='padding-left:10px;padding-top:20px'>"+data[i].type+"</div>"+
                "<div class='property-address' style='display:flex;flex-direction:column;justify-content:center;align-item:center;padding-left:10px;padding-top:20px'>"+
                    "<div class='property-street' >"+data[i].address.street+", "+data[i].address.number+"</div>"+
                    "<div class='property-district'>"+
                        "<span class='price property-type'>"+data[i].address.district+"</span>"+
                    "</div>"+
                    "<div class='property-city'>"+
                        "<span class='property-type'>"+data[i].address.city+"</span>"+
                    "</div>"+
                    "<div class='property-price'>"+
                        "<span id='price' class='property-type'>"+data[i].price+"</span>"+
                    "</div>"+
                "</div>"+
            "</div>"+
        "</div>";
    }

    return load;
}

function loadProperty2(data) {
    
    let load = "<div class='col-md-3 property_item' style='pading:5px 15px'>" +
            "<div class='card' style='display:flex;flex-direction:column;justify-content:center;align-item:center; height:400px; background-color: rgba(0,0,0,.1)'>"+
                "<div class='property-image'></div>"+
                "<div class='property-type' style='padding-left:10px;padding-top:20px'>"+data.type+"</div>"+
                "<div class='property-address' style='display:flex;flex-direction:column;justify-content:center;align-item:center;padding-left:10px;padding-top:20px'>"+
                    "<div class='property-street' >"+data.address.street+", "+data.address.number+"</div>"+
                    "<div class='property-district'>"+
                        "<span class='price property-type'>"+data.address.district+"</span>"+
                    "</div>"+
                    "<div class='property-city'>"+
                        "<span class='property-type'>"+data.address.city+"</span>"+
                    "</div>"+
                    "<div class='property-price'>"+
                        "<span id='price' class='property-type'>"+data.price+"</span>"+
                    "</div>"+
                "</div>"+
            "</div>"+
        "</div>";

    let teste = "<div id='teste'><h1>Teste</h1></div>"
    
    return teste;
}
</script>
@endsection