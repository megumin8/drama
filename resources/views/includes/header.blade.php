<header class="navbar">
    <section class="navbar-section">
      <a href="{{route('home')}}" class="navbar-brand mr-2"><img src="{{asset('images/logo.png')}}" alt="drama" class="logo"></a>
      <a href="..." class="btn btn-link"></a>
      <a href="..." class="btn btn-link"></a>
    </section>
    <section class="navbar-section center">
        <div class="input-group input-inline center">
            <input class="navbar_search" type="text" placeholder="search" id="search" name="search">
            <i class="uil uil-search"></i>
          </div>
    </section>
    <section class="navbar-section">
      <!--

        !-->
        <div class="input-group input-inline user_info">
            <p><i class="uil uil-user"></i></p>
            <p>{{$user->name}}</p>
             <a href="{{route('logout')}}"><p>Logout</p></a>
        </div>
    </section>
  </header>
