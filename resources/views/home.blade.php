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
    h1{ padding-top:5cm;
        font-weight: 700;
        font-size: 62px;}
.estilo{
    color: white;
    text-align: center;
}

  </style>


<body background="https://wallpaperboat.com/wp-content/uploads/2019/06/workout-motivation-02.jpg" >
    <div>
        <div class="estilo">
            <div >
                <h1> NO PAIN NO GAIN </h1>

                <h5 style="font-size:20px"> Having a perfect body requires a lot of training. Nice-looking body and <h5>
                <h5 style="font-size:20px"> powerful organism are interconnected – and we can help you with both. </h5>
            </div>

            <a class="btn btn-danger btn-anis-effect fadeInUp animated" 
            href="#welcome" data-caption-animate="fadeInUp" 
            data-caption-delay="800"><span class="btn-text">get started</span></a>


            <div >
            
                <h4 style="font-size:40px;padding-top:10cm"> <br id="welcome"> WELCOME</br> </h4> <hr>
                
                <h6 style="font-size: 15px"> Welcome to the website Intense Gym! We hope that you will appreciate our services and opportunities we offer </h6>
                <h6 style="font-size: 15px"> our loyal and potential customers. Here are some of them: </h6>

            </div>  
            <p style="padding-top:3cm"> </p>
            <div class="row">
                    <div class="col-md-1"> </div>
                    <div class="col-md-3">
                        <div class="box-icon box-icon-bordered">
                            <h4 class="text-danger offset-top-20">Qualified Coaches</h4>
                            <p>Our coaches have years of experience in  </p>
                            <p>various types of fitness and sports.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-icon box-icon-bordered">
                            <h4 class="text-danger offset-top-20">Individual Approach </h4>
                            <p>Every client of Intense has a personalized  </p>
                            <p>program of training and nutrition. </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-icon box-icon-bordered">
                            <h4 class="text-danger offset-top-20">Modern Fitness Equipment</h4> 
                            <p>We cooperate with leading fitness equipment  </p>
                            <p>suppliers to give you the superior results. </p>
                        </div>
                    </div>
                    <div class="col-md-1"> </div>
            </div>
           
            <h4 style="font-size:40px;padding-top:10cm"> <br></br> </h4> <hr>
        </div>  <!-- Div class estilo -->

   </div>
</body>
@endsection


