 <!-- Inicia con esa pagina siempre   -->

@extends('layouts.app')

@section('content')
<!-- <div class="container">
 
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            HOLA
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @auth
                        <div class="alert alert-success" role="alert">
                            {{ auth()->user()->name }}
                        </div>

                    @endauth

                    Bienvenido !
                </div>
            </div>
        </div>
    </div>
</div> -->

<style type="text/css">
    h1{
        color: white;
        text-align: center;
        padding-top:5cm;
        font-weight: 700;
        font-size: 62px;}
    h5 {
        color: white;
        text-align: center;
        font-size: 20px;}
    h6 {
        color: black;
        text-align: center;
        font-size: 15px;}
    h4{
        padding-top:15cm;
        color: black;
        text-align: center;
        font-size:40px;
    }
    .contenedor{
    height: 49%;
    margin: 1% 1%;
}

  </style>


<body background="https://i.pinimg.com/originals/5e/01/b1/5e01b1851854094d48be8fd833055753.jpg" >
    <div >
        <div>
            <div>
                <h1> NO PAIN NO GAIN </h1>

                <h5> Having a perfect body requires a lot of training. Nice-looking body and <h5>
                <h5> powerful organism are interconnected – and we can help you with both. </h5>
            </div>
            <div class="contenedor">
                <h4> <br> WELCOME</br> </h4> <hr>
                <h6> Welcome to the website Intense Gym! We hope that you will appreciate our services and opportunities we offer </h6>
                <h6> our loyal and potential customers. Here are some of them: </h6>

            </div>  
        </div>
    </div>
   </div>
</body>
@endsection
