<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hero_slides', function (Blueprint $table) {
            $table->id();
            $table->string('headline');
            $table->text('subtext')->nullable();
            $table->string('image')->nullable();
            $table->string('cta_label')->default('Apply Now');
            $table->string('cta_url')->default('/contact-us');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('programme_group')->nullable();
            $table->string('amount');
            $table->string('frequency')->nullable();
            $table->text('note')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_highlighted')->default(false);
            $table->timestamps();
        });

        Schema::create('enrollment_steps', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enrollment_steps');
        Schema::dropIfExists('fees');
        Schema::dropIfExists('hero_slides');
    }
};
