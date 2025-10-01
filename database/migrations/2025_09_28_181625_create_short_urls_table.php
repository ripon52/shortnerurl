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
        Schema::create('short_urls', function (Blueprint $table) {
            $table->id();

            $table->longText("original_url")->comment("Ex. https://www.easycrowd.me");
            $table->string("short_code")->unique()->comment("Ex. e52me");
            $table->dateTime("expire_at")->nullable()->comment("Ex. 2025-09-27 19:07:20");
            $table->integer("clicks")->default(0)->comment("Ex. 0");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('short_urls');
    }
};
