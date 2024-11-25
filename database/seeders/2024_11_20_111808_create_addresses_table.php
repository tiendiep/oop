<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('addresses', function (Blueprint $table) {
        $table->id();  // ID của địa chỉ
        $table->foreignId('member_id')->constrained()->onDelete('cascade');  // Khóa ngoại liên kết với bảng members
        $table->foreignId('district_id')->constrained()->onDelete('cascade');  // Khóa ngoại liên kết với bảng districts
        $table->timestamps();  // Thời gian tạo và cập nhật
    });
}

public function down()
{
    Schema::dropIfExists('addresses');
}

}
