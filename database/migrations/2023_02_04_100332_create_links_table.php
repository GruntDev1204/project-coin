<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Swaps');
            $table->string('Contract');
            $table->string('Market');
            $table->string('GitLab');
            $table->string('GitHub');
            $table->string('TeleGram');
            $table->string('Twitter');
            $table->string('LinkAddress');
            $table->string('Facebook');
            $table->string('Tiktok');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links');
    }
}
