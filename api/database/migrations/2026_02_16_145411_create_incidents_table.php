<?php

// database/migrations/2026_02_16_000004_create_incidents_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete()->onUpdate('cascade');
            $table->string('title', 150);
            $table->text('description');
            $table->enum('status', ['open', 'in_progress', 'closed'])->default('open');
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
            $table->timestamps();
            $table->dateTime('closed_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('incidents');
    }
};
