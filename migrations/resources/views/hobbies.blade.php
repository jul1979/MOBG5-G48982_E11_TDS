@extends('template')

@section('maintitle','Bienvenue sur la page LOGIN')

@section('content')

<h1>
    This is the Hobbies Page.
</h1>
@isset($name)
<div>
    <p>you are connected as {{ $name }} </p>
</div>


@endisset




@endsection