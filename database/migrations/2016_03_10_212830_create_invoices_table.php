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
            $table->string('currency');
            $table->integer('agreement')->unsigned();
            $table->integer('january')->unsigned();
            $table->integer('february')->unsigned();
            $table->integer('march')->unsigned();
            $table->integer('april')->unsigned();
            $table->integer('may')->unsigned();
            $table->integer('june')->unsigned();
            $table->integer('july')->unsigned();
            $table->integer('august')->unsigned();
            $table->integer('september')->unsigned();
            $table->integer('october')->unsigned();
            $table->integer('november')->unsigned();
            $table->integer('december')->unsigned();
            $table->integer('project_id')->unique();
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
