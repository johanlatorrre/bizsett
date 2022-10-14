@section('title', 'principal')

@section('content')

<!doctype html>
<html lang="en">


  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
 

<!-- Tailwind CSS Link -->
<link rel="stylesheet" 
href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">

<!-- Fontawesome Link -->
<link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">


  
  <!--<head>
     Required meta tags
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     Bootstrap CSS -
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="principal.css" rel="styleheed">

    <style>
      @import url('https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200&display=swap');
    </style>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200&display=swap" rel="stylesheet">

  

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <title>Hello, world!</title>

      Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
  </head>-->
  
  <body style="background-; font-family: 'Titillium Web', sans-serif;"> 

    <nav class="navbar navbar-expand-lg fixed-top navbar navbar-expand-lg n">
      <div class="container">
        <a class="navbar-bizsett" href="#"><img src="storage\img\logo_bizsett_yes.png" class="Logo-bizsett" alt="Logo" ></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <ion-icon name="menu-outline"></ion-icon>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link font-semibold py-2 px-3 rounded-md" href="#" id="Home">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link font-semibold py-2 px-3 rounded-md" href="#" id="Emprendimientos">Emprendimientos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link font-semibold hover:bg-black py-2 px-3 rounded-md" href="{{route('register.index')}}" id="Register">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link font-semibold hover:bg-black py-2 px-3 rounded-md" href="{{route('login.index')}}" id="Login">Login</a> 
            </li>
          </ul>
        </div>
      </div>
    </nav>

   

  <section id="hero">
  <center>
   <div class="topmargin-sm"> 
  <h2><b>Bienvenido a Bizsett</b></h2>

  <p><b>wwwwwwwwwwwwwwwwwwwwwwwwwwwww<b></p>
  </div>
  </center>

</div>

<section>
  <div>
 
    <main role="main">

      <div class="row imagen">
        @foreach ($publicaciones as $publicacione)
        <div class="col-lg-4" >
          <div class="card mb-4 img border border-gray-400 shadow-lg" style="width: 20rem; height: 20rem; background-color:rgb(209, 209, 209);" >
            @foreach ($multimedias as $multimedia)
            @if ($multimedia->id == $publicacione->id)
            

        
                <img src="storage/multimedia_folder/{{($multimedia->url_contenido)}}"  alt="{{($multimedia->url_contenido)}}">

            
            @endif
            @endforeach
            
            <div class="card-body">
              <p class="card-text">Proyecto .....</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" id="cps" class=" btn btn-sm btn-outline-secondary btcmppwb" onclick="window.open('http://localhost/bizsett/public/cuenta','_blank');">Ver</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      
      </div>
    </main>
      
  </div>
</section>




<style>

  body {
    font-family: 'Titillium Web', sans-serif;
  }

  h1 {font-size: 66px; font-weight: 600; line-height: 80px}
  p {font-size: 18px; color: rgb(0, 0, 0); line-height: 1.8; margin-bottom: 0;}


  section {
    padding: 120px 0;
  }


  .topmargin-xs {margin-top: 15px}
  .topmargin-sm {margin-top: 38px}
  .topmargin-lg {margin-top: 60px}



  .nav-link {
    color: rgb(255, 255, 255);
  }

  .nav-link:hover {
    color: rgb(231, 199, 53);
  }

  .Logo-bizsett {
    min-width:90px;
    max-width:90px;
  }

  .navbar-toggler {font-size:30px }
  .navbar-toggler:focus {outline: none}

  .btn {
    font-size: 14px;
    padding: 15px 26px;
    min-width: 160px;
    border-radius: 2px;
    display: inline-block
  }

  .btn-light{
    background-color: aliceblue;
    color: black;
    border: 2px solid #ffffff

  }

  #hero {
      background-image: url('storage/img/pexels-troy-squillaci-2516588.jpg');
      background-position:center;
      background-size:cover;
      padding-top:20%;
      min-height:auto;
      color: rgb(0, 0, 0);


    
    }

  .content-center {
    max-width: 800px;
    margin: 0 auto 0px auto;
    text-align: center
  }

  .publicaciones-container {
    position:inherit;
    overflow: hidden;
    margin: 10px 0;
    border-radius: 3px;
  }

  .publicaciones-container img {
    -moz-transition: all 0.8s;
    -webkit-transition: all 0.8s;
    transition: 9000;
  }

  .publicaciones-container:hover img {
    -moz-transform:scale(1.2);
    -webkit-transform: scale(1.2);
    transform: scale(1.2);
  }

  .publicaciones-details {
    position:absolute;
    bottom: 0px;
    left: 25px;
    z-index: 9000;

  }

  .publicaciones-details a h2, .publicaciones-details a p{
    color:rgb(255, 255, 255)

  }

  /* */
  img { max-width: 100%; max-height: 100%; }

  img { display: block; margin: 0 auto; }

  img { margin: auto auto; }
  img { vertical-align: middle; }

</style>



  <section id="publicaciones">
  <div class="container-fluid">
  <div class="content-center">
    <h2>HOLAAAAAAAAAAAAAAAAAAAAAAAAAAAA <b>Negrita</b></h2>
    <P>FGVBHJNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj</P>
  </div>
