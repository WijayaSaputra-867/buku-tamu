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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade');
            $table->foreignId('institution_id')->constrained()->onUpdate('cascade');
            $table->string('name');
            $table->string('needed_field');
            $table->string('meeting_person');
            $table->enum('gender', ['male', 'female']);
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->timestamp('check_in_at');
            $table->timestamp('check_out_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
