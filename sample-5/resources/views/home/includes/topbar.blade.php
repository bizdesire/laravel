<nav class="navbar navbar-expand-lg bg-body-tertiary" style="width:100%;">
  <div class="container">
    <a class="navbar-brand" href="#">DEMO PRODUCT</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        
        @if(auth()->check())
        <li class="nav-item">
            <a class="nav-link" href="{{auth()->user()->role == 'admin' ? route('admin.dashboard') : ''}}">{{auth()->user()->name}}</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('home.logout')}}">Logout</a>
          </li>
          <li class="nav-item"> 
            <button id="copyButton" data-url="{{route('home.refer.register',base64_encode(auth()->user()->id))}}">Copy Refer Url</button>
          </li>
         
        @else 
        <li class="nav-item">
            <a class="nav-link" href="{{route('home.register')}}">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('home.login')}}">Login</a>
          </li> 
         
        @endif
        <li class="nav-item">
            <a class="nav-link" href="{{route('home.mycart')}}">My Cart (<span id="counts">{{Cart::count()}}</span>)</a>
        </li>
      </ul>
       
    </div>
  </div>
</nav>