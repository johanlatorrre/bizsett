<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" style="color:rgb(255, 196, 0)" href="{{route('home')}}">
      <img src="storage\img\logo_bizsett_project.png" alt="logo_bizsett" height="70px" width="70px">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="col-3 ">
      <div class="d-flex justify-content-start px-4 py-2">
        <div class="buscar ">
          <input type="search" placeholder="Buscar" required>
          <div class="btns">
            <i class="fas fa-search icon"></i>
          </div>
        </div>
        </div>
    </div>

  @auth
        
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      <ul class="ml-auto flex justify-end pt-1">
      <li class="mx-8 ">

        <p class="text-xl" style="color:rgb(255, 255, 255)"><b>{{ auth()->user()->email }}</b></p>
      </li>
      </ul>
      <ul>
      <li class="mx-6">
        <a class="font-bold rounded-md btn btn-outline-warning py-2 px-3" 
         href="{{route('login.destroy')}}">Salir</a>
      </li>
    </ul>

@else

      <ul class="w-1/2 px-2 ml-auto flex justify-end pt-1">
        <li class="mx-6">
          <a class="font-semibold hover:bg-black py-2 px-3 rounded-md" style="color:rgb(255, 196, 0)" href="{{route('login.index')}}">Login</a>
        </li>
        <li class="mx-6">
          <a class="font-semibold border-2 border-black py-2 px-3 rounded-md hover:bg-black" style="color:rgb(255, 196, 0)" href="{{route('register.index')}}">Registrarse</a>
        </li>
      </ul>
  </div>
@endauth
  
</nav>



