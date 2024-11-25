<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropForeign(['city_id']);  // Xóa khóa ngoại với bảng 'city'
            $table->dropForeign(['district_id']);
            // Xóa các cột
            $table->dropColumn(['district_id', 'city_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            // Khôi phục lại các cột đã xóa trong quá trình rollback
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();

            // Thêm lại khóa ngoại nếu cần
            $table->foreign('city_id')->references('id')->on('city')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('district')->onDelete('cascade');
        });
    }
}
