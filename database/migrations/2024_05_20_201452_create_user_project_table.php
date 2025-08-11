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
        Schema::create('user_project', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            
            //$table->integer('permission_id')->unsigned();
            //$table->foreign('permission_id')->references('id')->on('permission')->onDelete('cascade');
            
            //para tirar a tabela de permissões.
            
            $table->boolean('is_owner')->default(false);

            //se o usuário aceitou entrar
            $table->boolean('confirmed')->default(false);

            $table->integer('personal_user_id')->unsigned();
            $table->foreign('personal_user_id')->references('id')->on('personal_user')->onDelete('cascade');

            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('project')->onDelete('cascade');

            $table->date('dt_admission');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_project');
    }
};
