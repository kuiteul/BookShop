<header class="position-releative  col-12 border">
    <div class=" col-12 position-absolute row align-items-center top-0 end-0 start-0">
      <div class="col-3 offset-1">
          <img src="" alt="Logo du site web">
      </div>
      <nav class="col-4">
          <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('/')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/book">Books</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/genre">Genre</a>
              </li>
            </ul>
      </nav>
      <div  class="col-2" id="shopping-cart">
          <div  class="col-6 position-releative">
            <a href="{{url('/card')}}">Shop
              <i class="bi bi-cart4"></i>
                <span class="translate-middle badge rounded-pill bg-danger">
                    @isset($card_number)
                        {{ $card_number }}
                    @else
                            0
                    @endisset
                </span>
            </a>
          </div>
      </div>
      @isset($user)
        <form action="{{ url('logout')}}" method="post" class="col-2" id="logout">
          @csrf
          <button type="submit" class="btn btn-primary"> <i class="bi bi-box-arrow-left"></i> Logout</button>
        </form>
      @else
        <div class="col" id="login-header">
            <a href="/login" alt="" class=""><i class="bi bi-box-arrow-in-right"></i> Login</a>
        </div>
      @endisset
    </div>
</header>