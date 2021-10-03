<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_targets', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('user_id');
   			$table->unsignedBigInteger('month_id')->nullable();
   			$table->smallInteger('year')->nullable();  			
  			$table->unsignedBigInteger('target_type_id')->nullable();
   			$table->unsignedBigInteger('target_unit_id')->nullable();
  			$table->decimal('target_amount', 8, 2)->nullable()->default(0.00);
  			$table->text('note')->nullable();
			$table->timestamp('created_at')->useCurrent();
  			$table->timestamp('updated_at')->useCurrent()->nullable();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('month_id')->references('id')->on('months')->onDelete('cascade');
			$table->foreign('target_type_id')->references('id')->on('target_cats')->onDelete('cascade');
			$table->foreign('target_unit_id')->references('id')->on('target_units')->onDelete('cascade');
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
        Schema::dropIfExists('user_targets');
    }
}
