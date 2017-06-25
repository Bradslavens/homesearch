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
            $table->string('FullAddress');
            $table->integer('L_AskingPrice');
            $table->string('L_AddressNumber');
            $table->string('L_AddressDirection');
            $table->string('L_AddressStreet');
            $table->string('L_Address2');
            $table->string('L_City');
            $table->string('L_State');
            $table->string('L_Zip');
            $table->string('LM_Int1_3'); // total bedrooms
            $table->string('LM_Int2_3'); // full baths
            $table->string('LM_Int1_5'); // 1/2 baths
            $table->string('LM_Int4_1'); // estimated square feet
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
