<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
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
            $table->foreignId('ticket_id') //ticket number for this note
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('restrict');
            $table->foreignId('page_id') //page where this note should be under
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('restrict');
            $table->foreignId('note_type_id') //Release Note or Workaround
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('restrict');
            $table->string('section'); //specific section on the page
            $table->string('instruction'); //customer instruction
            $table->string('explanation'); //explanation for the approach or how dev executed the instruction
            $table->string('image'); //image or screenshot of section for visual/proof purposes
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
        Schema::dropIfExists('notes');
    }
}
