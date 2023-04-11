<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\String\s;

class MovieController extends Controller
{
    //
    public function index()
    {
       //$movies= DB::select('select m.idMovie,s.idShow,s.start, m.title,r.idRoom,(r.capacity-s.soldTickets)as available from rooms r join shows s on r.idRoom=s.idRoom join movies m on m.idMovie=s.idMovie where s.start >CURRENT_TIMESTAMP ORDER BY s.start, HOUR(CURRENT_TIMESTAMP),m.title ASC');
       $movies= Movie::movies();

        //dd($movies);
       return view('movies',["movies"=>$movies
        ]);
    }


   //This method shows how to update a model
    public function update(Request $request,$id)
    {
        //dd("hello");
        $sales= intval($request->nbtickets);
        $show = Show::find($id);
        //$show->timestamps = false;


        $show->soldTickets =  $show->soldTickets +$sales;
        $show->save();
        //$show->save(['timestamps' => false]);
       // dd($show->soldTickets );



      /* $show = DB::select('select * from shows where idShow = ?', [$id]);
       // dd($show);
        $sales=  $show[0]->soldTickets + $sales;
        $show[0]->timestamp=false;

        //dd($sales,$show);
         DB::update(
            'update shows set soldTickets = ? where idShow = ?',
            [$sales,$id]
        );*/
        //return redirect()->route('movie.index');
        return redirect()->to('/movies');
        /*     0 => {#291 ▼
             +"idShow": 7
             +"start": "2023-05-25 20:00:00"
             +"soldTickets": 10
             +"idMovie": 2
             +"idRoom": 3
       }
     ]*/
        //$movie = Show::find($id);
        //$movie->soldTickets=$movie->soldTickets+$sales;

        /* Example 1 */
/*        Post::find(1)->increment('visitors');
        /* Example 2 */
       /* $post = Post::find(1);
        $post->visitors = $post->visitors + 1;
        $post->save();*/
        //$total=intval($request->nbtickets);
       // $sql = "UPDATE member_profile SET points = points + 1 WHERE user_id = ?";
       /* $affected = DB::update(
            'update shows set soldTickets  = soldTickets + ?   where idShow = ?',
            [ intval($request->nbtickets)  ,intval($request->showid)]
        );*/
        //return redirect()->back();
       // dd($request->showid,$request->nbtickets);
        //dd($affected);

    }

    public function show($id)
    {
        $movie = Movie::getMovieById($id);

        return response()->json($movie,200);

/*        return response()->json([
            'movie' => $movie
        ]);*/

    }
}
