<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('cities', function (Blueprint $table) {
        $table->id();  // ID của thành phố
        $table->string('citynameVn');  // Tên thành phố bằng tiếng Việt
        $table->string('citynameKr');  // Tên thành phố bằng tiếng Hàn
        $table->timestamps();  // Thời gian tạo và cập nhật
    });
}

public function down()
{
    Schema::dropIfExists('cities');
}

}
