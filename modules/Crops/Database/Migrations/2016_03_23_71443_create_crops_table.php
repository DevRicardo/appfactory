<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateCropsTable extends Migration {


    use SoftDeletes;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crops', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('name','120');
$table->string('description','140');


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
        Schema::drop('crops');
    }

}
