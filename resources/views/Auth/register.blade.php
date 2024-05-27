@extends('layout/template')

@section('title')
    BookShop | Login Page
@endsection


@section('content')

    <h1 class="text-center fw-bold" id="welcome-login">Ready to use our bookshop?</h1>
    <br><br>

    <form class="row g-3">
        <div class="col-md-6">
          <label for="first-name" class="form-label">First name</label>
          <input type="text" class="form-control" placeholder="First-name" id="f-name" name="first-name">
        </div>
        <div class="col-md-6">
          <label for="last-name" class="form-label">Last name</label>
          <input type="text" class="form-control" placeholder="Last name" id="l-name" name="last-name">
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Address</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>
        <div class="col-12">
          <label for="inputAddress2" class="form-label">Address 2</label>
          <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label">City</label>
          <input type="text" class="form-control" id="inputCity">
        </div>
        <div class="col-md-4">
          <label for="inputState" class="form-label">State</label>
          <select id="inputState" class="form-select">
            <option selected>Choose...</option>
            <option>...</option>
          </select>
        </div>
        <div class="col-md-2">
          <label for="inputZip" class="form-label">Zip</label>
          <input type="text" class="form-control" id="inputZip">
        </div>
        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
      </form>

@endsection