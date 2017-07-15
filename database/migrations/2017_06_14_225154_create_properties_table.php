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
            $table->text('LFD_Terms_42')->nullable();
            $table->text('LR_remarks11')->nullable();
            $table->string('LM_Char10_6')->nullable(); // pets
            $table->string('LM_Char10_11')->nullable(); // stories
            $table->string('LM_Char10_15')->nullable(); // lot size
            $table->string('LM_Char50_5')->nullable(); // senior community
            $table->string('LM_Int1_8')->nullable(); // fire places
            $table->string('LM_Int2_1')->nullable(); // year built
            $table->string('LM_Int4_7')->nullable(); // garage spaces 
            $table->string('LM_Int4_8')->nullable(); // parking total
            $table->string('LM_Int4_16')->nullable(); // monthly total fees
            $table->string('LM_Dec_3')->nullable(); // association fees
            $table->string('LM_Dec_4')->nullable(); // homeowner total fees
            $table->string('LM_Dec_6')->nullable(); // mello roos
            $table->text('LFD_Cooling_3')->nullable();
            $table->text('LFD_Equipment_4')->nullable();
            $table->text('LFD_LaundryLocation_15')->nullable();
            $table->string('LFD_Pool_25')->nullable();
            $table->text('LFD_SchoolDistrict_32')->nullable();
            $table->text('LFD_View_44')->nullable();
            // $table->string('LFD_PropertyCondition_305')->nullable();
            $table->integer('LM_Int2_6')->nullable();
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
