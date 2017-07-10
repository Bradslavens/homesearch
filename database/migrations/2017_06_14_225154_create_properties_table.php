<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('L_ListingID');
            $table->string('FullAddress')->nullable();
            $table->integer('L_AskingPrice')->nullable();
            $table->string('L_AddressNumber')->nullable();
            $table->string('L_AddressDirection')->nullable();
            $table->string('L_AddressStreet')->nullable();
            $table->string('L_Address2')->nullable();
            $table->string('L_City')->nullable();
            $table->string('L_State')->nullable();
            $table->string('L_Zip')->nullable();
            $table->string('LM_Int1_3')->nullable(); // total bedrooms
            $table->string('LM_Int2_3')->nullable(); // full baths
            $table->string('LM_Int1_5')->nullable(); // 1/2 baths
            $table->string('LM_Int4_1')->nullable(); // sf
            $table->string('L_UpdateDate')->nullable(); // updated date , not all have an update date
            $table->string('L_ListingDate'); // list date
            $table->string('L_Status');
            $table->string('LM_Char10_1')->nullable(); // county
            $table->string('L_StatusCatID');
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
        Schema::dropIfExists('properties');
    }
}
