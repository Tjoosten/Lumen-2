<?php

	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;

	class Regimenten extends Migration {

		public function up() {

			Schema::create('Regimenten', function(Blueprint $table) {
				$table->increments('id');
				$table->string('Regiment');
				$table->timestamps();
			});

		}
		
		public function down() {
			Schema::drop('Regimenten');
		}

	}
