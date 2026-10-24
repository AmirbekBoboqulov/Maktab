<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('parent_infos', function (Blueprint $table) {
            $table->id();
            $table->string('title_uz');
            $table->string('title_ru');
            $table->text('body_uz');
            $table->text('body_ru');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('parent_infos');
    }
};
