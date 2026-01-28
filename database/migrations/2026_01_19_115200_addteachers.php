<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('addteachers',function (Blueprint $table)
        {
                $table->bigIncrements("id");
                $table->String("firstName",50);
                $table->String("secondName",50);
                $table->String("gender",50);
                $table->String("email",50);
                $table->String("mobile",15);
                $table->String("image")->nullable();
                $table->date("birth");
                $table->String("qualification",50);
                $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addteachers');
    }
};
