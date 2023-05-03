<?php

namespace App\Http\Controllers;

use App\Models\Repository;
use Illuminate\Http\Request;

class RepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('repos',['repos'=>Repository::getReposInfo()]);

    }




    /**
     * Display the specified resource.
     */
    public function show( $repository)
    {

        $result=Repository::repoDetailById($repository);
        return response()->json($result,200);
    }



}
