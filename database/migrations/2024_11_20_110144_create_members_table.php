<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('members', function (Blueprint $table) {
        $table->id();  // ID của member
        $table->string('name');  // Tên member
        $table->enum('gender', ['Male', 'Female']);  // Giới tính
        $table->date('date');  // Ngày sinh
        $table->timestamps();  // Thời gian tạo và cập nhật
    });
}

public function down()
{
    Schema::dropIfExists('members');
}

}
