<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateTablesTable extends Migration {

     use SoftDeletes;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name',50);
            $table->string('type',20);
            $table->integer('length');
            $table->string('html_component');
            $table->string('attributes');
            $table->string('validations');
            $table->integer('table_id')->unsigned();
            $table->softDeletes(); 
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
        Schema::drop('fields');
    }

}
