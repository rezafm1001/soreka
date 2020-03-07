<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->string('office_name');
            $table->string('city_name')->nullable();
            $table->string('expert_name')->nullable();
            $table->string('manager_name')->nullable();
            $table->string('activity')->nullable();
            $table->string('address')->nullable();
            $table->string('brand')->nullable();
            $table->text('description')->nullable();
            $table->integer('sell_model')->nullable();
            $table->integer('user_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->on('users')->references('id')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offices');
    }
}
