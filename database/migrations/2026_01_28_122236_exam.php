<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
       Schema::create('exams',function (Blueprint $table){
            $table->foreignId("class_id")->references("id")->on('classes')->onDelete('cascade');
            $table->bigIncrements("id");
            $table->String("subject",50);
            $table->String("marks",50);
            $table->String("duration",50);
            $table->timestamps();
       });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
