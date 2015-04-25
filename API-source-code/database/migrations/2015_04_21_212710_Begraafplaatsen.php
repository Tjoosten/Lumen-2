<?php

	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;

	class Begraafplaatsen extends Migration {

		public function up() {

			Schema::create('Gesneuvelde', function(Blueprint $table) {
				$table->increments('id');
				$table->text('Begraafplaats');
				$table->string('Lengtegraad', 255);
				$table->string('Breedtegraad', 255);
				$table->string('Type', 45);
				$table->timestamps();
			});

		}

		public function down() {
			Schama::drop('Begraafplaatsen');
		}

	}
