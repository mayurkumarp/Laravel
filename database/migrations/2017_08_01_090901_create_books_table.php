<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('author_id');
            $table->integer('category_id');
            $table->string('name',  Config::get('constant.book_name'));
            $table->string('author',  Config::get('constant.authort_name'))->nullable();
            $table->double('price', Config::get('constant.price_digit'), Config::get('constant.price_deci'));
            $table->unsignedInteger('qty');
            $table->string('cover');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')
                    ->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
        DB::unprepared("ALTER TABLE books MODIFY user_id INT(10) UNSIGNED NOT NULL,"
                . "ADD INDEX (user_id), "
                . "ADD FOREIGN KEY (user_id) REFERENCES users(id)");
        DB::unprepared("ALTER TABLE books MODIFY author_id INT(10) UNSIGNED NOT NULL,"
                . "ADD INDEX (author_id), "
                . "ADD FOREIGN KEY (author_id) REFERENCES authors(id)");
        DB::unprepared("ALTER TABLE books MODIFY category_id INT(10) UNSIGNED NOT NULL,"
                . "ADD INDEX (category_id), "
                . "ADD FOREIGN KEY (category_id) REFERENCES Category(id)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('books');
    }
}
