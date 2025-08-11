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
        Schema::create('project_log', function (Blueprint $table) {
            $table->increments('id');

            //como ja temos a relacao com o user_project nao ha a necessidade de fazer a relacao com project tbm
            // $table->integer('project_id')->unsigned();
            // $table->foreign('project_id')->references('id')->on('project')->onDelete('cascade');

            // $table->integer('type_log_id')->unsigned();
            // $table->foreign('type_log_id')->references('id')->on('type_log')->onDelete('cascade');
            $table->integer('type_log');

            $table->integer('user_project_id')->unsigned();
            $table->foreign('user_project_id')->references('id')->on('user_project')->onDelete('cascade');

            $table->date('dt_modified');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_log');
    }
};
