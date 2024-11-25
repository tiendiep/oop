<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city', function (Blueprint $table) {
            $table->id();  // Tạo khóa chính (auto-increment)
            $table->string('citynameVn'); // Tên thành phố (tiếng Việt)
            $table->string('citynameKorea'); // Tên thành phố (tiếng Hàn)
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('city');
    }
}
