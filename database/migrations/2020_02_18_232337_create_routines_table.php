<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
<<<<<<< HEAD
            $table->string('description'); /**0 al 100 */
            $table->string('duration');
            $table->string('frequency');
=======
            $table->string('description');
            $table->integer('duration'); // duration in days
            $table->integer('frequency'); //training x week
            $table->string('goal');
>>>>>>> 189a7d722d689b6b6954c9a6a05cdc68b71ba90a
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routines');
    }
}
