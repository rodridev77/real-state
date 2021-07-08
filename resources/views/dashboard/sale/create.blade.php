@extends('dashboard.layout.app')
@section('dashboard-content')
<div class="container">
    <div class="row m6">
        <div class="card col-md-12" style="">
            <div class="card-header" style="margin-left:-15px; margin-right: -15px;background-color:rgba(0, 0, 0, 0.03);color:#eb194b;border-top-left-radius:3px;border-top-right-radius:3px;display:flex;justify-content:space-between;font-size:16px">
                <h2>Cadastrar novo imóvel</h2>
                <div class="opacity-btn">
                    <a href="{{url('/dashboard/properties')}}" style="color:#eb194b;text-decoration: none;font-weight:bold;">
                        <i class="fa fa-arrow-left" aria-hidden="true" style="margin-top:7px"></i> Voltar</a>
                </div>
            </div>
            <div class="card-body" style="margin-top:10px">
                <div class="box-form">
                    <form class="dash-property-form" name="dash-property-form" id="dash-property-form" style="min-width: 320px; width:600px">
                        @csrf
                        <h5 style="margin-bottom:20px; padding-bottom: 5px; border-bottom: 1px solid rgba(1,1,1,.2)">Dados do Imóvel</h5>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Área</label>
                                <input type="text" class="form-control input-form-property" name="area" required maxlength="100">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="bedroom">Quartos</label>
                                    <select id="bedroom" name="bedroom" class="form-control" required>
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
                            <div class="form-group col-md-4">
                                <label for="suite">Suites</label>
                                    <select id="suite" name="suite" class="form-control" required>
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
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="bathroom">Banheiros</label>
                                    <select id="bathroom" name="bathroom" class="form-control" required>
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
                            
                            <div class="form-group col-md-6">
                                <label for="garage">Garagem</label>
                                    <select id="garage" name="garage" class="form-control" required>
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
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="type">Tipo</label>
                                    <select id="type" name="type" class="form-control" required>
                                        <option selected></option>
                                        <option>Casa</option>
                                        <option>Apartamento</option>
                                        <option>Sobrado</option>
                                        <option>Galpão</option>
                                        <option>Terreno</option>
                                    </select>
                                </label>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label>Preço</label>
                                <input type="text" name="price" class="form-control input-form-user" maxlength="15" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="description">Descrição</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
                        </div>

                        <h5 style="margin-bottom:20px; padding-bottom: 5px; border-bottom: 1px solid rgba(1,1,1,.2)">Endereço do Imóvel</h5>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="street">Endereço</label>
                                <input type="text" name="street" id="street" class="form-control input-form-user" maxlength="100" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="number">Número</label>
                                <input type="text" name="number" id="number" class="form-control input-form-user" maxlength="15" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="district">Bairro</label>
                                <input type="text" name="district" id="district" class="form-control input-form-user" maxlength="100" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="city">Cidade</label>
                                <input type="text" name="city" id="city" class="form-control input-form-user" maxlength="100" required>
                            </div>
                        </div>

                        <div class="text-center" style="margin-top: 20px;">
                            <button type="submit" class="btn btn-outline-primary" id="btn-create-property">Cadastrar</button>
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
    $('form[name="dash-property-form"]').submit(function(event) {
        event.preventDefault();
        let area = $("input[name='area']").val();
        let bedroom = $("select[name='bedroom']").val();
        let suite = $("select[name='suite']").val();
        let bathroom = $("select[name='bathroom']").val();
        let garage = $("select[name='garage']").val();
        let price = $("input[name='price']").val();
        let description = $("textarea[name='description']").val();
        let street = $("input[name='street']").val();
        let number = $("input[name='number']").val();
        let city = $("input[name='city']").val();
        let district = $("input[name='district']").val();
        let type = $("select[name='type']").val();
        let _token = $("input[name='_token']").val();
    
        $.ajax({
            url: "/dashboard/properties/store",
            type:'POST',
            data: {area:area, bedroom:bedroom, suite:suite, bathroom:bathroom, garage:garage, price:price, 
            description:description, type:type, street:street, number:number, district:district, city:city, _token:_token},
            success: function(data) {
                let icon = 'success';
                
                if (data.success === false)
                    icon = 'error'
                if (data.success === true) {
                    $("input[type='text'], select, textarea").each(function() {
                        $(this).val('');
                    });

                    $("textarea[name='description']").val('');
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