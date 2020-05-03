<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Items', function (Blueprint $table) {
          $table->id();
          $table->enum('category',['pet', 'phone', 'jewelry'])->default('pet');
          $table->DateTime('foundTime')->nullable();
          $table->string('foundUser', 30)->nullable();
          $table->string('foundPlace', 500)->nullable();
          $table->enum('colour',['black', 'grey', 'white', 'brown', 'red', 'orange', 'yellow', 'green', 'blue', 'purple', 'pink'])->default('black');
          $table->string('image', 256)->nullable();
          $table->string('description', 256)->nullable();
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
        Schema::dropIfExists('items');
    }
}
