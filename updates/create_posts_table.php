<?php namespace Valezdesign\Recipes\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('recipes_posts', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title', 100);
            $table->string('slug', 100);
            $table->time('timecook');
            $table->text('ingredients');
            $table->tinyInteger('price');
            $table->text('content');
            $table->timestamp('published_at');
            $table->string('send', 1)->default(1);
            $table->string('status', 1)->default(1);
            $table->string('statistics', 8)->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recipes_posts');
    }
}