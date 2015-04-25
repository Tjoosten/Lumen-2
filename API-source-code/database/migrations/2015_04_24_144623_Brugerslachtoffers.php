<?php

	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;

	class Brugerslachtoffers extends Migration {

		public function up() {
			//
		}

		public function down() {
			Schame::drop('Burgerslachtoffers');
		}

	}
