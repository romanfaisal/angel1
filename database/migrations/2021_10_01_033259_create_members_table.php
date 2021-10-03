<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
			$table->string('name', 255);
			$table->string('mobile', 255)->unique();
			$table->string('email', 255)->nullable();
			$table->string('address', 400)->nullable();
			$table->text('details')->nullable();
			$table->string('type', 255)->nullable();
			$table->timestamp('created_at')->useCurrent();
  			$table->timestamp('updated_at')->useCurrent()->nullable();
			$table->tinyInteger('status')->nullable();
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
        Schema::dropIfExists('members');
    }
}
