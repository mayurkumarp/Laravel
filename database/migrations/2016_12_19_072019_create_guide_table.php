<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name',\Config::get('constant.name_size'));
            $table->string('last_name',\Config::get('constant.name_size'));
            $table->string('gender',  \Config::get('constant.gender_size'));
            $table->string('email',\Config::get('constant.email_size'))->unique();
            $table->string('password');
            $table->text('phone_number');
            $table->string('address');
            $table->string('city',  \Config::get('constant.city_size'));
            $table->string('state',  \Config::get('constant.state_size'));
            $table->rememberToken();
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('guides');
    }
}
