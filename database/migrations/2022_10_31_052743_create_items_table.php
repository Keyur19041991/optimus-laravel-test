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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->nullable()->default(null);
            $table->integer('category_id')->nullable()->default(null);
            $table->string('title');
            $table->string('slug');
            $table->string('image');
            $table->boolean('status')->default(1);
            $table->enum('type', ['product', 'category'])->default('product');
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
