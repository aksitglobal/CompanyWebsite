<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_contents', function (Blueprint $table) {
            $table->id();
            $table->string('service_slug');
            $table->enum('content_type', ['text', 'image', 'video']);
            $table->longText('content');
            $table->unsignedInteger('order')->default(0);
            $table->timestamps();

            $table->index('service_slug');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_contents');
    }
};
