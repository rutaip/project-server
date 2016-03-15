<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_name');
            $table->integer('customer_id')->unsigned();
            $table->integer('partner_id')->unsigned();
            $table->integer('support_partner_id')->unsigned();
            $table->integer('region_id')->unsigned();
            $table->string('country');
            $table->integer('pm_id')->unsigned();
            $table->integer('acd_type_id')->unsigned();
            $table->integer('project_type_id');
            $table->enum('integrations', ['Yes', 'No']);
            $table->enum('pre_integrations', ['Yes', 'No']);
            $table->string('status');
            $table->string('master_status');
            $table->date('original_date');
            $table->date('expected_date');
            $table->date('delivery_date');
            $table->integer('days_contracted');
            $table->integer('days_spent');
            $table->integer('amount_eur');
            $table->integer('amount_usd');
            $table->enum('amount_pending', ['Yes', 'No']);
            $table->integer('expenses_reported_eur');
            $table->integer('expenses_reported_usd');
            $table->integer('not_expenses_reported_eur');
            $table->integer('not_expenses_reported_usd');
            $table->integer('cost_project_mo');
            $table->integer('comments_id');
            $table->integer('completed');
            $table->integer('user_id')->unsigned();
            $table->string('campaign');
            $table->text('description');
            $table->string('gdrive_link');
            $table->string('crm_link');
            $table->string('pl_link');
            $table->string('imp_type');
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
        Schema::drop('projects');
    }
}
