<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTargetUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('target_units', function (Blueprint $table) {
            $table->id();
			$table->string('name', 250)->unique();
			$table->text('details')->nullable();
			$table->integer('parent_id')->nullable();
			$table->tinyInteger('status')->nullable();
			$table->timestamp('created_at')->useCurrent();
  			$table->timestamp('updated_at')->useCurrent()->nullable();
           	$table->charset = 'utf8mb4';
    		$table->collation = 'utf8mb4_unicode_ci';
			$table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('target_units');
    }
}
