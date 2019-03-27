<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name_en');
			$table->string('name_ar');
			$table->longText('description_en')->nullable();
			$table->longText('description_ar')->nullable();
			$table->string('address_en');
			$table->string('address_ar');
			$table->string('longitude')->nullable();
			$table->string('latitude')->nullable();
			$table->boolean('featured')->default(0);
			
			$table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
			
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
        Schema::dropIfExists('providers');
    }
}
