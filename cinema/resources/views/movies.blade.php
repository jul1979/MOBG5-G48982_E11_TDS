@extends('template')

@section('maintitle','Liste des Séances')

@section('content')



    <div class="container">


    <div class="row" id="row">
        <div class="col-8">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">JOUR</th>
                    <th scope="col">HEURE</th>
                    <th scope="col">FILM</th>
                    <th scope="col">SALLE</th>
                    <th scope="col">PLACE DISPONIBLES</th>
                    <th scope="col">BILLETERIE</th>
                </tr>
                </thead>
                <tbody>
                @foreach($movies as $movie)

                    <tr>
                        <td>{{explode(" ",$movie->start)[0]}}</td>
                        {{--           <td>{{explode(" ",$movie->start)[1]}}</td>--}}
                        <td>{{    explode(":",explode(" ",$movie->start)[1])[0]  .':'. explode(":",explode(" ",$movie->start)[1])[1]    }}</td>
                        {{-- <td>{{$movie->title}}</td>--}}
                        <td>
                            <button type="button" class="btn btn-link" onclick="myFunction('{{$movie->idMovie}}')">{{$movie->title}}</button></td>
                        <td>{{$movie->idRoom}}</td>
                        <td>{{$movie->available}}</td>
                        <td>



                            {{--                <form   method="post"  action="{{ route('movie.store', ['idShow' => $movie->idShow]) }}">--}}
                            <form   method="post"  action="{{ route('movie.update',$movie->idShow) }}">
                                {{csrf_field()}}
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" class="btn btn-outline-warning btn-sm">Acheter </button>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control" id="buy"  name="nbtickets">
                                        </div>


                                    </div>
                                </div>

                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>


            </table>


        </div>

    </div>
    </div>

@endsection
