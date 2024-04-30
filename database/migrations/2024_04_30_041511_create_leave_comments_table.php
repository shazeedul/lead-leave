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
        Schema::create('leave_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('leave_request_id');
            $table->unsignedBigInteger('admin_id');
            $table->text('comment');
            $table->timestamps();

            $table->foreign('leave_request_id')->references('id')->on('leave_requests')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_comments');
    }
};
