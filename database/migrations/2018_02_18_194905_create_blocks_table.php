<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateBlocksTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('blocks',function(Blueprint $table){
            $table->increments("id");
            $table->tinyInteger("show_1")->default(0)->nullable();
            $table->string("image_1")->nullable();
            $table->string("title_1")->nullable();
            $table->string("link_1_1")->nullable();
            $table->string("link_1_2")->nullable();
            $table->tinyInteger("show_2")->default(0)->nullable();
            $table->string("image_2")->nullable();
            $table->string("title_2")->nullable();
            $table->string("link_2_1")->nullable();
            $table->string("link_2_2")->nullable();
            $table->tinyInteger("show_3")->default(0)->nullable();
            $table->string("image_3")->nullable();
            $table->string("link_3")->nullable();
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
        Schema::drop('blocks');
    }

}