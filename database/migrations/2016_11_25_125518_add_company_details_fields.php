<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompanyDetailsFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
	        $table->string('logo');
	        $table->string('website');
	        $table->text('description');
            $table->integer('company_industry_id');
	        $table->integer('company_size_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('logo');
	        $table->dropColumn('website');
	        $table->dropColumn('description');
	        $table->dropColumn('company_industry_id');
	        $table->dropColumn('company_size_id');
        });
    }
}
