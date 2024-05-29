
<ul class="nav flex-column col-12 border">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="{{ url('admin') }}"><i class="bi bi-house-fill"></i> Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('admin/book') }}"><i class="bi bi-book-fill"></i></i> Book</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('admin/genre') }}"><i class="bi bi-card-text"></i> Genre</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href=" {{ url('admin/order') }} "><i class="bi bi-credit-card-fill"></i> Order</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/user') }}"><i class="bi bi-person-fill"></i> User</a>
      </li>
</ul>
