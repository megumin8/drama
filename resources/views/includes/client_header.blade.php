<header class="navbar">
  <section class="navbar-section">
    <a href="{{route('client_home')}}" class="navbar-brand mr-2">Drama</a>
  </section>
  <section class="navbar-section">
    <div class="input-group input-inline">
       <form action="{{route('search')}}" method="POST">
        @csrf
       <div class="input-group">
        <input class="form-input form-inline" type="text" name="name" required placeholder="Drama Name">
        <button class="btn btn-primary input-group-btn">Search</button>
       </div>
      </form>
    </div>
  </section>
</header>
