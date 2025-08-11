<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('task', function (Blueprint $table) {
            $table->increments('id');

            //priority
            $table->integer('weight');

            $table->unsignedInteger('card_id');
            $table->foreign('card_id')->references('id')->on('card')->onDelete('cascade');
            
            // $table->unsignedInteger('status_task_id');
            // $table->foreign('status_task_id')->references('id')->on('status_task')->onDelete('cascade');
            
            //nao iniciada, andamento, finalizada.
            $table->integer('status_task');
            
            // $table->unsignedInteger('priority_id');
            // $table->foreign('priority_id')->references('id')->on('priority')->onDelete('cascade');
            
            $table->string('description');
            $table->date('dt_start');
            $table->date('dt_end');
            $table->string('dead_line');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task');
    }
};
