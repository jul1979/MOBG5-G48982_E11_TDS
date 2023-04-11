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
        Schema::create('shows', function (Blueprint $table) {
            $table->integer('idShow')->primary();
            $table->timestamp('start');
            $table->integer('soldTickets');
            $table->integer('idMovie');
            $table->foreign('idMovie')->references('idMovie')->on('movies');
            $table->integer('idRoom');
            $table->foreign('idRoom')->references('idRoom')->on('rooms');
/*
            - idShow : integer
            - start : timestamp
            - soldTickets : integer
            - idMovie : integer
            - idRoom : integer*/

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shows');
    }
};
