<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterNotificationsTable extends Migration
{
    public function up(){
        Schema::create('register_notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade');  
            $table->text('message');
            $table->boolean('is_sent')->default(false);
            $table->timestampTz('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestampTz('updated_at')->nullable();
        });
    }     
    public function down(){
        Schema::dropIfExists('register_notifications');
    }
}