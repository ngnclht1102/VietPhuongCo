<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetNullableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('intro')->nullable()->change();
            $table->string('promo1')->nullable()->change();
            $table->string('promo2')->nullable()->change();
            $table->string('promo3')->nullable()->change();
            $table->string('images')->nullable()->change();
            $table->string('r_intro')->nullable()->change();
            $table->string('review')->nullable()->change();
            $table->string('tag')->nullable()->change();
            $table->string('packet')->nullable()->change();
            // $table->string('user_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
