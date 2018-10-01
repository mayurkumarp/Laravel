<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name',Config::get('constant.name_size'));
            $table->string('last_name',Config::get('constant.name_size'));
            $table->string('gender',  Config::get('constant.gender_size'));
            $table->string('email',Config::get('constant.email_size'))->unique();
            $table->string('username',Config::get('constant.email_size'))->unique();
            $table->string('password');
            $table->text('phone_number');
            $table->string('address');
            $table->string('city',  Config::get('constant.city_size'))->nullable();
            $table->string('state',  Config::get('constant.state_size'))->nullable();
            $table->string('country',  Config::get('constant.state_size'))->nullable();
            $table->enum('is_social',['G+','facebook'])->nullable();
            $table->string('social_id',Config::get('constant.email_size'))->nullable();
            $table->string('social_profile',Config::get('constant.social_p_size'))->nullable();
            $table->string('profile_img',Config::get('constant.pic_size'))->nullable();
            $table->enum('device_type', ['Web','Android', 'iOS'])->default('Web');
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
        Schema::drop('users');
    }
}
