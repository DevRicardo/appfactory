<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreatePondsTable extends Migration {


    use SoftDeletes;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ponds', function(Blueprint $table)
        {
            $table->increments('id');

            $table->integer('phase_id');
$table->integer('intensivo_minimo');
$table->integer('intensivo_maximo');
$table->integer('super_intensivo_minimo');
$table->integer('super_intensivo_maximo');


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ponds');
    }

}
