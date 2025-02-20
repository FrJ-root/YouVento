<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('events', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->string('name');
            $table->timestampTz('date');  // Timezone-aware timestamp for PostgreSQL
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->integer('capacity');
            $table->foreignId('club_id')->constrained()->onDelete('cascade');  // Foreign key to clubs table
            $table->timestamps();
        });
    }    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
