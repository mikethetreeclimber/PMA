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
        Schema::create('worksites', function (Blueprint $table) {
            $table->id();
            $table->string('circuit_number')->nullable();
            $table->string('work_site_id')->nullable();
            $table->string('status')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('parcel_id')->nullable();
            $table->string('completed_at_date')->nullable();
            $table->string('created_at_date')->nullable();
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
        Schema::dropIfExists('worksites');
    }
};
