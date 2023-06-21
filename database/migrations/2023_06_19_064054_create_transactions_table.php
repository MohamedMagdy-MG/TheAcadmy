<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36)->unique();
            $table->double('paidAmount')->default(0.0);
            $table->string('Currency')->default('EGP');
            $table->string('parentEmail');
            $table->foreign('parentEmail')->on('users')->references('email');
            $table->enum('statusCode',[1,2,3]);
            $table->date('paymentDate')->default(Carbon::now()->format('Y-m-d'));
            $table->string('parentIdentification');
            $table->softDeletes();
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
        Schema::dropIfExists('transactions');
    }
}
