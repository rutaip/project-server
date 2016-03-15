<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offerings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_name');
            $table->integer('customer_id')->unsigned();
            $table->integer('partner_id')->unsigned();
            $table->integer('region_id')->unsigned();
            $table->string('country');
            $table->integer('pm_id')->unsigned();
            $table->integer('acd_type_id')->unsigned();
            $table->enum('sd', ['Yes', 'No']);
            $table->string('master_status');
            $table->date('original_date');
            $table->date('expected_date');
            $table->date('delivery_date');
            $table->integer('days_contracted');
            $table->integer('days_spent');
            $table->integer('amount_eur');
            $table->integer('amount_usd');
            $table->enum('amount_pending', ['Yes', 'No']);
            $table->integer('comments_id');
            $table->integer('completed');
            $table->integer('user_id')->unsigned();
            $table->string('campaign');
            $table->text('description');
            $table->string('vsp_link');
            $table->string('color');
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
        Schema::drop('offerings');
    }
}
