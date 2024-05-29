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
                <a class="nav-link" href="#">Books</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Genre</a>
              </li>
            </ul>
      </nav>
      <form action="{{ url('order') }}" method="post" class="col-2" id="shopping-cart">
          @csrf
          <button type="submit" class="col-6 btn btn-primary position-releative">
            Shop
            <i class="bi bi-cart4"></i>
              <span class=" translate-middle badge rounded-pill bg-danger">
                  0
                </span>
                
          </button>
      </form>
      <form action="{{ url('logout')}}" method="post" class="col-2" id="logout">
          @csrf
          <button type="submit" class="btn btn-primary"> <i class="bi bi-box-arrow-left"></i> Logout</button>
      </form>
    </div>
</header>