<?php

	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;

	class Users extends Migration {
		
		public function up() {
			Schema::create('Users', function(Blueprint $table) {
				$table->inscrements('id');
				$table->string('firstname', 255);
				$table->string('lastname', 255);
				$table->string('email', 255);
				$table->string('password', 255);
				$table->timestaps();
			});
		}

		public function down() {
			Schema::drop('Users');
		}

	}
