<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->id();  // ID của quận
            $table->foreignId('city_id')->constrained()->onDelete('cascade');  // Khóa ngoại liên kết với bảng cities
            $table->string('districtVn');  // Tên quận bằng tiếng Việt
            $table->string('districtKr');  // Tên quận bằng tiếng Hàn
            $table->timestamps();  // Thời gian tạo và cập nhật
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('districts');
    }
}
