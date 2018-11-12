@extends('layouts.main')
@section('title', 'Fresh&Deli')
@section('content')
@component('layouts.menu')

@endcomponent
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3>Listado de Lotes</h3>    

    </div>
</div>

<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <div class="table-responsive">
            <table>
                <thead>
                    <th>Id</th>
                    <th>Fecha</th>
                    <th>Numero de lote</th>
                    <th>Nombre</th>
                </thead>
                @foreach($lotes as $lote)
                <tr>
                    <td>{{$lote->idlote}}</td>
                    <td>{{$lote->date}}</td>
                    <td>{{$lote->numero_lote}}</td>
                    <td>{{$lote->producto_idproducto}}</td>
                    <td>
                        <a href=""><button class="btn btn-info">Editar</button></a>
                    </td>
                </tr>
                @endforeach
            </table>  
            
        </div>    

    </div>
</div>

@endsection