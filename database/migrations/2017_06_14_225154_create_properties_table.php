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
            $table->string('LFD_Terms_42')->nullable();
            $table->string('LR_remarks11')->nullable();
            $table->string('LM_Char10_6')->nullable();
            $table->string('LM_Char10_11')->nullable();
            $table->string('LM_Char10_15')->nullable();
            $table->string('LM_Char50_5')->nullable();
            $table->string('LM_Int1_8')->nullable();
            $table->string('LM_Int2_1')->nullable();
            $table->string('LM_Int4_7')->nullable();
            $table->string('LM_Int4_8')->nullable();
            $table->string('LM_Int4_16')->nullable();
            $table->string('LM_Dec_3')->nullable();
            $table->string('LM_Dec_4')->nullable();
            $table->string('LM_Dec_6')->nullable();
            $table->string('LFD_Cooling_3')->nullable();
            $table->string('LFD_Equipment_4')->nullable();
            $table->string('LFD_LaundryLocation_15')->nullable();
            $table->string('LFD_Pool_25')->nullable();
            $table->string('LFD_SchoolDistrict_32')->nullable();
            $table->string('LFD_View_44')->nullable();
            $table->string('LFD_PropertyCondition_305')->nullable();
            $table->string('LM_Int2_6')->nullable();
            $table->string('L_IdxInclude')->nullable();
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
