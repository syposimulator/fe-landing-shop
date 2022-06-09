@extends('layouts.guest')
@section('content')
<section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <div class="text-center text-muted mb-4">
            <h4>LOGIN</h4>
          </div>
          @if ($errors->any())
            <div class="alert alert-danger p-1 text-center" role="alert">
              @foreach ($errors->all() as $error)
                {{ $error }}
              @endforeach
            </div>
            @endif
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-outline mb-4">
              <input id="email" type="email" name="email" :value="old('email')" required autofocus class="form-control form-control-lg" placeholder="Email" />
            </div>
            <div class="form-outline mb-4">
              <input id="password"  type="password" name="password" required autocomplete="current-password" class="form-control form-control-lg" placeholder="Password" />
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            </div>
            <a href="{{ route('auth.google') }}" class="btn btn-dark btn-lg w-100 mt-3 mb-5">
                <img alt="Logo" src="/images/google-icon.svg" class="h-20px me-3" />Login dengan Google
            </a>
          </form>
        </div>
      </div>
    </div>
  </section>
  @stop