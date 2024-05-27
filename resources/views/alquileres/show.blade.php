@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Detalles del Alquiler') }}</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('Monto') }}</h5>
                <p class="card-text">{{ $alquiler->monto }}</p>

                <h5 class="card-title">{{ __('Fecha de Inicio') }}</h5>
                <p class="card-text">{{ $alquiler->fecha_inicio }}</p>

                <h5 class="card-title">{{ __('Fecha de Fin') }}</h5>
                <p class="card-text">{{ $alquiler->fecha_fin }}</p>

                <h5 class="card-title">{{ __('Departamento') }}</h5>
                <p class="card-text">{{ $alquiler->departamento->direccion }}</p>

                <h5 class="card-title">{{ __('Inquilinos') }}</h5>
                <p class="card-text">{{ $alquiler->inquilino->nombre }}</p>
                
            </div>
        </div>
    </div>
@endsection
