@extends('base')

@section('base')
<head>
    <link rel="stylesheet" href="{{ asset('css/contacto.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <title>Contacto</title>
    
</head>
<body style="background-color:  #e2e7eb">
    <div class="wrapper">

        <div class="profile-card">
            <div class="profile-header">
                <img src="https://us.123rf.com/450wm/alenavlad/alenavlad1710/alenavlad171000008/87113769-tuba-instrumento-de-lat%C3%B3n-instrumento-de-m%C3%BAsica-de-viento-trompeta-de-bocina-de-la-orquesta-bajo.jpg" alt="">
            </div>
            <div class="profile-body">
                  <div class="author-img">
                      <img src="{{ asset('img/neli.png') }}" alt="">
                  </div>
                  <div class="name">Cornelio Romero</div>
                  <div class="intro">
                     <p>Estudiante del CFGS Desarrollo de Aplicaciones Multiplataforma y Licenciado en Derecho
                     </p>
                  </div>
                  <div class="social-icon">
                      <ul>
                          <li>
                              <a href="https://www.facebook.com/neli.romeroborrero">
                                  <i class="fab fa-facebook-f"></i>
                              </a>
                          </li>
                          <li>
                              <a href="https://twitter.com/Nelius72">
                                  <i class="fab fa-twitter"></i>
                              </a>
                          </li>
                          
                          <li>
                              <a href="https://www.instagram.com/nelius72/">
                                  <i class="fab fa-instagram"></i>
                              </a>
                          </li>
                         
                      </ul>
                  </div>
            </div>
        </div>
  
  
    </div>  
</body>
@endsection