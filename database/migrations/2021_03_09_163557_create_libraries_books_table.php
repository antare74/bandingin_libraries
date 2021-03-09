<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrariesBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libraries_books', function (Blueprint $table) {
            $table->id();
            $table->integer('books_id')
                ->unsigned()
                ->constrained('books')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('libraries_id')
                ->unsigned()
                ->constrained('libraries')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('libraries_books');
    }
}
