<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('district', function (Blueprint $table) {
            $table->id();  // Tạo khóa chính (auto-increment)
            $table->unsignedBigInteger('city_id'); // Khóa ngoại từ bảng city
            $table->string('districtVn'); // Tên quận (tiếng Việt)
            $table->string('districtKorean'); // Tên quận (tiếng Hàn)
            $table->timestamps(); // created_at, updated_at
            
            $table->foreign('city_id')->references('id')->on('city')->onDelete('cascade'); // Liên kết với bảng city
        });
    }

    public function down()
    {
        Schema::dropIfExists('district');
    }
}
