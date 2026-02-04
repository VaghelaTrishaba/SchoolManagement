<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('student_answers', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('student_id');
        $table->unsignedBigInteger('question_id');
        $table->string('answer');
        $table->timestamps();
    });

    }

    
    public function down(): void
    {
        Schema::dropIfExists('student_answers');    
    }
};
