<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('f_name');
            $table->string('alloted_name');
            $table->string('email');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('status');
            $table->string('var_cust');
            $table->string('contact');
            $table->string('whatsup_num');
            $table->string('cinic');
            $table->string('area');
            $table->string('connection_fee');
            $table->string('package_name');
            $table->string('discount');
            $table->string('total_payable');
            $table->string('package_id');
            $table->string('user_id');
            $table->string('address');
            $table->text('date');
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
        Schema::dropIfExists('_clients');
    }
};
