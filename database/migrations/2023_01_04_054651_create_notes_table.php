<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->timestamps();
        });
            schema::create('lead_note', function (Blueprint $table){
                $table->id();
                $table->unsignedBigInteger('note_id');
                $table->unsignedBigInteger('lead_id');
                $table->timestamps();

                $table->foreign('note_id')->references('id')->on('notes')->onDelete('cascade');
                $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
            });
            schema::create('clause_note', function (Blueprint $table){
                $table->id();
                $table->unsignedBigInteger('note_id');
                $table->unsignedBigInteger('clause_id');
                $table->timestamps();

                $table->foreign('note_id')->references('id')->on('notes')->onDelete('cascade');
                $table->foreign('clause_id')->references('id')->on('clauses')->onDelete('cascade');
            });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
};
