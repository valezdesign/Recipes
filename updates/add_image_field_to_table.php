<?php namespace Valezdesign\Recipes\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class AddImageFieldToTable extends Migration
{
    public function up()
    {
        Schema::table('recipes_posts', function($table)
        {
            $table->string('image', 200)->nullable();
        });
    }

    public function down()
    {
        Schema::table('recipes_posts', function($table)
        {
            $table->dropColumn('image');
        });
    }
}
