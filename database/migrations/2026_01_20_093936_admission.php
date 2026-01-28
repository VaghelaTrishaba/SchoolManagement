<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('admissions',function (Blueprint $table)
        {
            $table->bigIncrements("id");
            $table->String("firstName",50);
            $table->String("secondName",50);
            $table->String("mobile",10);
            $table->String("gender",10);
            $table->String("image",50);
            $table->date("birth");
            $table->String("category",50);
            $table->String("grNumber",50);
            $table->date("admissionDate");
            $table->String("fatherName",50);
            $table->String("fatherMobile",10);
            $table->String("fatherImage",50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
