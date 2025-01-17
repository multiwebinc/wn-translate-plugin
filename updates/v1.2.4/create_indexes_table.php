<?php namespace Winter\Translate\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class CreateIndexesTable extends Migration
{

    public function up()
    {
        if (!Schema::hasTable('rainlab_translate_indexes')) {
            Schema::create('rainlab_translate_indexes', function($table)
            {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('locale')->index();
                $table->string('model_id')->index()->nullable();
                $table->string('model_type')->index()->nullable();
                $table->string('item')->nullable()->index();
                $table->mediumText('value')->nullable();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('rainlab_translate_indexes');
    }

}
