<?php

use Illuminate\Database\Migrations\Migration;

class RenameClientCountryFieldToReferenceCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function ($table) {
            $table->dropColumn('country');
            $table->tinyInteger('country_id')->after('city');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function ($table) {
            $table->dropColumn('country_id');
            $table->string('country')->after('city');
        });
    }
}
