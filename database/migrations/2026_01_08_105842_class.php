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
        Schema::create("classes", function (Blueprint $table) {
            $table->bigIncrements( "id");
            $table->String("name",50);
            $table->String("medium",50);
            $table->String("stream",50);
            $table->String("section",50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("classes");
    }
};
