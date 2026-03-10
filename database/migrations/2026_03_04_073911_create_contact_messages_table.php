<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 150);
            $table->string('email', 150);
            $table->string('phone', 30);
            $table->string('subject', 100);
            $table->text('message');
            $table->timestamp('submitted_at')->useCurrent();
            $table->boolean('is_read')->default(false);     // 0 = unread, 1 = read
            $table->timestamp('read_at')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->enum('status', ['new', 'replied', 'spam', 'deleted'])->default('new');
            $table->timestamps();   // optional: created_at / updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};