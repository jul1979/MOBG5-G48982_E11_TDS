@extends('template')

@section('maintitle','Home Page')

@section('content')


@auth

<p>Bienvenue {{Auth::user()->name}}</p>
<button type="button" class="btn btn-link"><a class="nav-link" href="{{route('dash')}}">se
    Déconnecter</a></button>


@else

<button type="button" class="btn btn-link"><a class="nav-link" href="{{route('login')}}">se
    connecter</a></button>
@endauth
@endsection