@extends('template')

@section('maintitle','Liste des Films')

@section('content')


    <div class="container">
        <div class="row" id="main">
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Film</th>
                        <th scope="col">Likes</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($movies as $movie)
                        <tr>
                           {{-- <td><a href="">{{$movie->title}}</a></td>--}}
                            <td><button type="button"  class="btn btn-link" onclick="myFunction('{{$movie->idMovie}}')">{{$movie->title}} </button></td>
                            <td>{{$movie->likes}}</td>
                            <td> <button type="button" class="btn btn-primary"><a href="{{route('movies.like',['id'=>$movie->idMovie])}}" class="text-white">Liker</a></button>         </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>

@endsection
