<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("subjects",function(Blueprint $table){
                $table->foreignId("class_id")->references("id")->on('classes')->onDelete('cascade');
                $table->bigIncrements( "id");
                $table->string("sub1",30);
                $table->string("sub2",30);
                $table->string("sub3",30);
                $table->string("sub4",30);
                $table->string("sub5",30);
                $table->string("sub6",30);
                $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("subjects");
    }
};
