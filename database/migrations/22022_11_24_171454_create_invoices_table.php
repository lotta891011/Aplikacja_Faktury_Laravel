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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('date_of_issue');
            $table->timestamps();
        });
        Schema::table('items', function (Blueprint $table){
            $table->unsignedBigInteger('invoice_id')->nullable;
            $table->foreign('invoice_id')->references('id')->on('invoices');
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
            $table->dropForeign('items_invoice_id_foreign');
            $table->dropColumn('invoice_id');
        });
        Schema::dropIfExists('invoices');
        
    }
};
