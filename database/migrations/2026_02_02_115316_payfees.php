<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
       Schema::create('payfees',function(Blueprint $table){
            $table->bigIncrements("id");
            $table->String("name",50);
            $table->String("amount");
            $table->String("mode",50);
            $table->timestamps();
       });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('payfees');
    }
};
