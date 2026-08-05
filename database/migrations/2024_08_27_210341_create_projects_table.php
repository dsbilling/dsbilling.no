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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->uuid();
            $table->string('title');
            $table->string('slug');
            $table->text('content');
            $table->string('repository');
            $table->string('website');
            $table->string('logo_url');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0: inactive, 1: active, etc');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
