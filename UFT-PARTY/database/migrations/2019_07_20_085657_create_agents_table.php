<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->bigIncrements('agent_id');
            $table->string('agent_name',30);
            $table->string('gender',2);
            $table->string('district_name');
            $table->integer('contact')->unsigned();
            $table->string('email',30)->unique();
            $table->string('agent_sign',3);
            $table->enum('role',['Agent','Agent head'])->default('Agent');
            $table->date('reg_date');
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
        Schema::dropIfExists('agents');
    }
}
