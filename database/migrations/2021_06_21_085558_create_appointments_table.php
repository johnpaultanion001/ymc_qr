<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('service_id');
            $table->string('doctor_id')->nullable();;
            $table->string('ref_number');
            $table->longText('note')->nullable();

            $table->string('status')->default('PENDING');
            $table->longText('comment')->nullable();

            $table->date('date');
            $table->string('time');
            $table->string('isMove')->default(0);

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
        Schema::dropIfExists('appointments');
    }
}
