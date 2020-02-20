@extends('client.template.main')
@section('title','Home')

@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>

          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
             <a class="navbar-brand" href="#">Hidden brand</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Programa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Perfil</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="#">Nutrición</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="#">Calendario</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="#">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Administrador</a>
                </li>
            </ul>
                    
                        <a class="sesion" href="#">Login</a>
                        <a class="sesion" href="#">Sign in</a>
                    
    
        </div>
    </nav>

@endsection

@section('content')
    <p> proyecto workout</p>
@endsection


