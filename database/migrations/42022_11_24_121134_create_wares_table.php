<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ware', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('symbol');
            $table->timestamps();
        });
        Schema::table('items', function (Blueprint $table){
            $table->unsignedBigInteger('ware_id')->nullable;
            $table->foreign('ware_id')->references('id')->on('ware');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table){
            $table->dropForeign('items_ware_id_foreign');
            $table->dropColumn('ware_id');
        });
        Schema::dropIfExists('ware');
    }
};
