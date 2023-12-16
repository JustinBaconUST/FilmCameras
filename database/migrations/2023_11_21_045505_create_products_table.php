<?php

// database/migrations/YYYY_MM_DD_create_products_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description')->nullable();
        $table->float('price');
        $table->boolean('archive')->default(false); //added archive functionality
        $table->string('image'); //added image functionality
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
