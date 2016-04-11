<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateProjectsTable extends Migration {


    use SoftDeletes;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('image',150);
            $table->string('name',140);
            $table->text('description');
            $table->integer('user_id')->unsigned();
            $table->integer('categorie_id')->unsigned();
            $table->integer('state_id')->unsigned();
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
        Schema::drop('projects');
    }

}
