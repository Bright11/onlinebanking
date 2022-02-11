<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Bright c web</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/"></a>
          </li>

          @if (Session::has('user'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('prodetail')}}">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}">Logout</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{route('register')}}">Regitser</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Login</a>
          </li>
          @endif
          <!--admin links-->
          @if (Session::has('user'))
          @if (Session::get('user.role_as')==1){
            <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}">Admin Home</a>
              </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('registeredusers')}}">Users</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('customers')}}">Customers</a>
              </li>
          }

          @endif

          @endif

          <!--the end-->
        </ul>

      </div>
    </div>
  </nav>


  @if ($errors->has('password'))
  <div class="alert alert-success" role="alert">
      <h4>Check if password is empty or must be at least 5 characters</h4>
  </div>
  @elseif ($errors->has('confirmpassword'))
  <div class="alert alert-success" role="alert">
      <h4>password and Confirmed didn't match</h4>
  </div>
  @elseif($errors->has('email'))
  <div class="alert alert-success" role="alert">
      <h4>email Exits</h4>
  </div>
  @elseif(session('status'))
  <div class="alert alert-success" role="alert">
      {{ session('status') }}
  </div>
  @endif
