@extends('errors.app')
@section('title', '404')
@section('content')
<main>
    <div class="container">

      <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h1>404</h1>
        <h2>The page you are looking for doesn't exist.</h2>
        <a class="btn" href="{{url('/')}}">Back to home</a>
        <img src="{{asset('storage/backend/assets/img/not-found.svg')}}" class="img-fluid py-5" alt="Page Not Found">
        <div class="credits">
          Designed by <a href="{{url('/')}}">SRESMIS</a>
        </div>
      </section>

    </div>
  </main>
@endsection