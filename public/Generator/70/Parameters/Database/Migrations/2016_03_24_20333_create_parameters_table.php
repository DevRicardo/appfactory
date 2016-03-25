<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateParametersTable extends Migration {


    use SoftDeletes;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameters', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('name','100');
$table->integer('minimo');
$table->integer('maximo');
$table->string('unidad','20');
$table->string('consecuencia','300');
$table->string('recomendacion','300');
$table->integer('crop_id');


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
        Schema::drop('parameters');
    }

}
