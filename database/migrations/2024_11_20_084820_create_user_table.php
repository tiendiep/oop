<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id'); 
            $table->string('name'); 
            $table->string('gender'); 
            $table->date('date');
            $table->unsignedBigInteger('district_id'); 
            $table->timestamps(); 
            $table->foreign('city_id')->references('id')->on('city')->onDelete('cascade'); // Liên kết với bảng city
            $table->foreign('district_id')->references('id')->on('district')->onDelete('cascade'); // Liên kết với bảng district
        });
    }

    public function down()
    {
        Schema::dropIfExists('user');
    }
}









