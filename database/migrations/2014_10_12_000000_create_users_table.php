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
        Schema::create('users', function (Blueprint $table) {
          
          
            $table->id('id');
           
            $table->string('fname',);
            $table->string('lname');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('img')->nullable();;
            $table->string('Urlimg')->nullable();
            $table->string('status');
            $table->enum('role',['Etudiant','Enseignant'])->default('Etudiant');
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
        Schema::dropIfExists('users');
    }
};
