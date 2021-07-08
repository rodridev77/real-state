@extends('dashboard.layout.app')
@section('dashboard-content')
<div class="container">
    <div class="row m6">
        <div class="card col-md-12" style="">
            <div class="card-header" style="margin-left:-15px; margin-right: -15px;background-color:rgba(0, 0, 0, 0.03);color:#eb194b;border-top-left-radius:3px;border-top-right-radius:3px;display:flex;justify-content:space-between;font-size:16px">
                <h2>Atualizar imóvel</h2>
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
                            <input type="hidden" name="property_id" value="{{$property->id ?? ''}}">
                            <div class="form-group col-md-4">
                                <label>Área</label>
                                <input type="text" class="form-control input-form-property" name="area" value="{{$property->area ?? ''}}" required maxlength="100">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="bedroom">Quartos</label>
                                    <select id="bedroom" name="bedroom" class="form-control" required>
                                        <option selected></option>
                                        <option {{$property->bedroom == 1 ? 'selected' : ''}}>1</option>
                                        <option {{$property->bedroom == 2 ? 'selected' : ''}}>2</option>
                                        <option {{$property->bedroom == 3 ? 'selected' : ''}}>3</option>
                                        <option {{$property->bedroom == 4 ? 'selected' : ''}}>4</option>
                                        <option {{$property->bedroom == 5 ? 'selected' : ''}}>5</option>
                                        <option {{$property->bedroom == 6 ? 'selected' : ''}}>6</option>
                                        <option {{$property->bedroom == 7 ? 'selected' : ''}}>7</option>
                                        <option {{$property->bedroom == 8 ? 'selected' : ''}}>8</option>
                                        <option {{$property->bedroom == 9 ? 'selected' : ''}}>9</option>
                                        <option {{$property->bedroom == 10 ? 'selected' : ''}}>10</option>
                                    </select>
                                </label>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="suite">Suites</label>
                                    <select id="suite" name="suite" class="form-control" required>
                                        <option selected></option>
                                        <option {{$property->suite == 1 ? 'selected' : ''}}>1</option>
                                        <option {{$property->suite == 2 ? 'selected' : ''}}>2</option>
                                        <option {{$property->suite == 3 ? 'selected' : ''}}>3</option>
                                        <option {{$property->suite == 4 ? 'selected' : ''}}>4</option>
                                        <option {{$property->suite == 5 ? 'selected' : ''}}>5</option>
                                        <option {{$property->suite == 6 ? 'selected' : ''}}>6</option>
                                        <option {{$property->suite == 7 ? 'selected' : ''}}>7</option>
                                        <option {{$property->suite == 8 ? 'selected' : ''}}>8</option>
                                        <option {{$property->suite == 9 ? 'selected' : ''}}>9</option>
                                        <option {{$property->suite == 10 ? 'selected' : ''}}>10</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="bathroom">Banheiros</label>
                                    <select id="bathroom" name="bathroom" class="form-control" required>
                                        <option selected></option>
                                        <option {{$property->bathroom == 1 ? 'selected' : ''}}>1</option>
                                        <option {{$property->bathroom == 2 ? 'selected' : ''}}>2</option>
                                        <option {{$property->bathroom == 3 ? 'selected' : ''}}>3</option>
                                        <option {{$property->bathroom == 4 ? 'selected' : ''}}>4</option>
                                        <option {{$property->bathroom == 5 ? 'selected' : ''}}>5</option>
                                        <option {{$property->bathroom == 6 ? 'selected' : ''}}>6</option>
                                        <option {{$property->bathroom == 7 ? 'selected' : ''}}>7</option>
                                        <option {{$property->bathroom == 8 ? 'selected' : ''}}>8</option>
                                        <option {{$property->bathroom == 9 ? 'selected' : ''}}>9</option>
                                        <option {{$property->bathroom == 10 ? 'selected' : ''}}>10</option>
                                    </select>
                                </label>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="garage">Garagem</label>
                                    <select id="garage" name="garage" class="form-control" required>
                                        <option selected></option>
                                        <option {{$property->garage == 1 ? 'selected' : ''}}>1</option>
                                        <option {{$property->garage == 2 ? 'selected' : ''}}>2</option>
                                        <option {{$property->garage == 3 ? 'selected' : ''}}>3</option>
                                        <option {{$property->garage == 4 ? 'selected' : ''}}>4</option>
                                        <option {{$property->garage == 5 ? 'selected' : ''}}>5</option>
                                        <option {{$property->garage == 6 ? 'selected' : ''}}>6</option>
                                        <option {{$property->garage == 7 ? 'selected' : ''}}>7</option>
                                        <option {{$property->garage == 8 ? 'selected' : ''}}>8</option>
                                        <option {{$property->garage == 9 ? 'selected' : ''}}>9</option>
                                        <option {{$property->garage == 10 ? 'selected' : ''}}>10</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="type">Tipo</label>
                                    <select id="type" name="type" class="form-control" value="{{$property->type ?? ''}}" required>
                                        <option selected></option>
                                        <option {{$property->type == 'Casa' ? 'selected' : ''}}>Casa</option>
                                        <option {{$property->type == 'Apartamento' ? 'selected' : ''}}>Apartamento</option>
                                        <option {{$property->type == 'Sobrado' ? 'selected' : ''}}>Sobrado</option>
                                        <option {{$property->type == 'Galpão' ? 'selected' : ''}}>Galpão</option>
                                        <option {{$property->type == 'Terreno' ? 'selected' : ''}}>Terreno</option>
                                    </select>
                                </label>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label>Preço</label>
                                <input type="text" name="price" class="form-control input-form-user price" maxlength="14" value="{{$property->price ?? ''}}">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="description">Descrição</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{$property->description ?? ''}}</textarea>
                            </div>
                        </div>

                        <h5 style="margin-bottom:20px; padding-bottom: 5px; border-bottom: 1px solid rgba(1,1,1,.2)">Endereço do Imóvel</h5>
                        @if ($property->address !== null)
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="street">Endereço</label>
                                <input type="text" name="street" id="street" class="form-control input-form-user" maxlength="100" value="{{$property->address->street ?? ''}}"  required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="number">Número</label>
                                <input type="text" name="number" id="number" class="form-control input-form-user" maxlength="15"  value="{{$property->address->number ?? ''}}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="district">Bairro</label>
                                <input type="text" name="district" id="district" class="form-control input-form-user" maxlength="100"  value="{{$property->address->district ?? ''}}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="city">Cidade</label>
                                <input type="text" name="city" id="city" class="form-control input-form-user" maxlength="100"  value="{{$property->address->city ?? ''}}" required>
                            </div>
                        </div>
                        @endif

                        <div class="text-center" style="margin-top: 20px;">
                            <button type="submit" class="btn btn-outline-primary" id="btn-update-property">Atualizar</button>
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
        
        let id = $("input[name='property_id']").val();
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
            url: "/dashboard/properties/update",
            type: 'PUT',
            data: {id:id, area:area, bedroom:bedroom, suite:suite, bathroom:bathroom, garage:garage, price:price, 
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