<?php

use Illuminate\Database\Migrations\Migration;

/**
 *
 * Monujo
 *
 * @author Alessandro Arnodo
 *
 *
 */

class ModifyUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->string('currency', 3)->default("EUR");
            $table->string('timezone')->nullable();
            $table->date('birthday')->nullable();
            $table->string('locale', 10)->default("IT_it");
            $table->string('nation', 5)->default("IT");
            $table->string('username');
            $table->unique('username');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('currency');
            $table->dropColumn('timezone');
            $table->dropColumn('birthday');
            $table->dropColumn('locale');
            $table->dropColumn('nation');
            $table->dropColumn('username');
        });
    }

}