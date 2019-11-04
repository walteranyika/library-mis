<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //"student_id","activity_id","book_id"
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("student_id")->unsigned();
            $table->bigInteger("activity_id")->unsigned();
            $table->bigInteger("book_id")->unsigned();
            $table->foreign("student_id")->references("id")->on("students");
            $table->foreign("activity_id")->references("id")->on("activities");
            $table->foreign("book_id")->references("id")->on("books");
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
        Schema::dropIfExists('transactions');
    }
}
