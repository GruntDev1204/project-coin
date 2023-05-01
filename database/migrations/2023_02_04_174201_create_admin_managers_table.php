<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_managers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('user_info');
            $table->string('email');
            $table->string('fullName');
            $table->string('password');
            $table->string('avatar')->default('./photos/shares/1.png');
            $table->double('ma_PIN' , 6, 0);
            $table->string('vai_tro')->nullable();
            $table->string('describe_vai_tro')->nullable();
            $table->integer('is_allow')->default(0);
            $table->integer('is_ceo')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_managers');
    }
}
