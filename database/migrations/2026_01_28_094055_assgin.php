<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
       Schema::create('assgins',function (Blueprint $table){
            $table->bigIncrements("id");
            $table->String("subject",50);
            $table->String("file",50);
            $table->date("date");
            $table->timestamps();
       });
    }

    
    public function down(): void
    {
       Schema::dropIfExists('assgins');
    }
};
