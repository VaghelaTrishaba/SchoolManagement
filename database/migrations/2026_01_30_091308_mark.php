<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('marks',function (Blueprint $table){
            $table->foreignId("student_id")->references("id")->on('student_answers')->onDelete('cascade');
            $table->foreignId("class_id")->references("id")->on('student_answers')->onDelete('cascade');
            $table->bigIncrements("id");
            $table->String("marks",50);
            $table->timestamps();
        });   
    }

    public function down(): void
    {
        Schema::dropIfExists('marks');       
    }
};
