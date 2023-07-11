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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id');
            $table->string('payable_amount');
            $table->string('paid_amount');
            $table->string('balance');
            $table->string('payment_type');
            $table->string('con_status');
            $table->string('date');
            $table->string('month');
            $table->string('year');
            $table->string('status');
            $table->string('payment_method');
            $table->string('pre_balance');
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
        Schema::dropIfExists('accounts');
    }
};
