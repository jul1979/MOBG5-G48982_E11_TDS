@extends('template')

@section('maintitle','Tous les dépôts')

@section('content')
    <div id="main">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Nom du dépôt</th>
          <th scope="col">Nom de l'utilisateur</th>
          <th scope="col">Nombre de commits</th>
        </tr>
      </thead>
      <tbody>



      @foreach($repos as $repo)
        <tr>
{{--          <td><a href="{{route('repos.show',['repo'=>$repo->id])}}">{{$repo->reponame}}</a></td>--}}
            <td>
                <button type="button" onclick="hello({{$repo->id}})" class="btn btn-link">{{$repo->reponame}}</button> </td>
          <td>{{$repo->c_name}}</td>
          <td>{{$repo->commits}}</td>
        </tr>
      @endforeach
      </tbody>
    </table>


    </div>

@endsection
