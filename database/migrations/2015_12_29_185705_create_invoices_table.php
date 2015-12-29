<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference_nb');
            $table->integer('client_id');
            $table->date('due_date');
            $table->text('notes')->nullable();
            $table->decimal('tax', 19, 4);
            $table->boolean('recurring'); // yes or no
            $table->integer('recurring_frequency')->nullable(); // how many days between invoicing?
            $table->date('recurring_start')->nullable();
            $table->date('recurring_end')->nullable();
            $table->date('recurring_next')->nullable();
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
        Schema::drop('invoices');
    }
}
