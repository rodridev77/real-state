@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="container" style="margin-top:50px;border:3px solid #fff;padding-top:10px;border-radius:5px;border-top-color: orange;">
            <div class="property-search" >
                <div class="box-form">
                    <form id="form" class="search-property-form" name="search-property-form" id="search-property-form" style="width:100%">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label>Código</label>
                                <input type="text" class="form-control input-form-user" name="name" required maxlength="100">
                            </div>
                            
                            <div class="form-group col-md-2">
                                <label for="role">Tipo de Imóvel</label>
                                    <select id="role" name="role" class="form-control" required>
                                        <option selected></option>
                                        <option>Casa</option>
                                        <option>Apartamento</option>
                                        <option>Sobrado</option>
                                        <option>Galpão</option>
                                        <option>Sobrado</option>
                                    </select>
                                </label>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="role">N° de Quartos</label>
                                    <select id="role" name="role" class="form-control" required>
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
                                <label for="role">Cidade</label>
                                    <select id="role" name="role" class="form-control" required>
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
                                <label for="role">Valor</label>
                                    <select id="role" name="role" class="form-control" required>
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

                        <div class="form-row" style="display:flex;justify-content;align-items:center">
                            <div class="form-group col-md-12">
                                <div class="text-center" style="margin-top: 20px;">
                                    <button type="submit" class="btn btn-outline-primary" id="btn-create-user">Pesquisar</button>
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
            {{-- Pagination --}}
                <div class="d-flex justify-content-center" style="margin-top:10px">
                    {!! $properties->links() !!}
                </div>
        </div>
    </div>
@endsection