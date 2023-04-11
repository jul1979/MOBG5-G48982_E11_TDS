<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    //
    public function index()
    {
        $movies=Movie::getMovies();
        return view('movies',['movies'=>$movies]);
    }

    public function update($id)
    {
        $movie = Movie::find($id);
        $movie->likes+=1;
        $movie->save();
        return redirect()->route('movies.index');
    }

    public function findShows($movieId)
    {
        $shows = Movie::getShowsById($movieId);
        return response()->json($shows,200);
    }
}
