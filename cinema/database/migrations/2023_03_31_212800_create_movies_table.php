<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->integer('idMovie')->primary();
            $table->string('title');
            $table->string('synopsis');
            $table->integer('voteCount');
            $table->float('rating');


           /* Movie
            - idMovie : integer
            - title : string
            - synopsis : string
            - voteCount : integer
            - rating : float*/
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
