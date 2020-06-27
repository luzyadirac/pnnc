@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Gestión de roles</div>
                <div class="card-body">
                  Ha ingresado al sistema como: {{ Auth::user()->role }}
                    <hr/>
                    <span>
                        @if(Auth::user()->role=='Admin')
                    <label for="Rol">Roles definidos:</label>
                    <select name="Rol">
                        <option value="Ages">Gestor</option>
                        <option value="Afin">Financiero</option>
                        <option value="Agar">Garantías</option>
                        <option value="Aper">Personas</option>
                        <option value="Acon">General</option>
                    </select>                
                    </span>
                     <hr/>
                            @if (Route::has('register'))   
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar usuarios') }}</a>
                            @endif
                        @endif
                </div>
            </div>
        </div> 

    <div class="row justify-content-center col-md-8">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Menu del usuario</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    @include ('gco.menu')                
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
</div>