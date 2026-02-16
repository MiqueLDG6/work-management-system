<?php

// database/migrations/2026_02_16_000005_create_incident_history_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('incident_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('incident_id')->constrained('incidents')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('changed_by')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('field_changed', 50);
            $table->text('old_value')->nullable();
            $table->text('new_value')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('incident_history');
    }
};
