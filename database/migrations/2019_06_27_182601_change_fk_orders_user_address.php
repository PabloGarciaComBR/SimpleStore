<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFkOrdersUserAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("orders", function(Blueprint $table) {
            $table->unsignedBigInteger('user_address_id')->after('user_id');
            $table->foreign('user_address_id')->references('id')->on('user_addresses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("orders", function(Blueprint $table) {
            $table->dropForeign('orders_user_address_id_foreign');
            $table->dropColumn('user_address_id');
        });
    }
}
