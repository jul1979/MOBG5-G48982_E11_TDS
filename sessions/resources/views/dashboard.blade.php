@extends('template')

@section('maintitle','déconnexion')

@section('content')

<main class="login-form">
  <div class="cotainer">
    <form action="{{ route('dash.post') }}" method="POST">
      @csrf
      <div>
        <button type="submit" class="btn btn-danger">LOGOUT</button>
      </div>

    </form>
  </div>
</main>

@endsection