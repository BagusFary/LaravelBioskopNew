<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Bioskop Review | @yield('title')</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
</head>

<body>

      <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="/movies">Bioskop Review</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="btn btn-outline-danger Movies" href="/">Movies</a>
                  </li> 

                  <li class="nav-item d-flex">
                    <a class="btn btn-success dashboard-admin" href="/history-comments/{{ Auth::user()->id }}">History Review</a>
                  </li>
                  
                  @if(Auth::user()->role_id != 1)

                    @else
                      <li class="nav-item d-flex">
                        <a class="btn btn-success dashboard-admin" href="/dashboard-admin">Dashboard Admin</a>
                      </li>
                   @endif

                  </ul>
                </div>
            
                @if(Auth::user()->role_id != 1)
                <li>
                  <strong class="user-name">{{ Auth::user()->name }}</strong>
                </li>
                    <li>
                      <span class="badge rounded-pill text-bg-info custom-badge">User</span>
                      <img src="{{ asset('/img/gambarprofil/user-icon.png') }}" class="account-icon">
                    </li>
                  @else
                  <li>
                    <strong class="user-name">{{ Auth::user()->name }}</strong>
                  </li>
                    <li>
                      <span class="badge rounded-pill text-bg-success custom-badge">Admin</span>
                      <img src="{{ asset('/img/gambarprofil/admin-icon.png') }}" class="account-icon">
                    </li>
                 @endif

                  <li class="nav-item d-flex">
                    <a class="btn btn-outline-light Logout" href="/logout">Logout</a>
                </li>
                </div>
              </div>
            </nav>



      <div class="container">
        @yield('content')
      </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>