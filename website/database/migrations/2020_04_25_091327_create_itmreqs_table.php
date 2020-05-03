<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItmreqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('itmreqs', function (Blueprint $table) {
        $table->id();
        $table->string('requestedByID');
        $table->string('requestedItemID');
        $table->string('request_reason', 256)->nullable();
        $table->enum('request_status',['processing', 'approved', 'declined'])->default('processing');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itmreqs');
    }
}
