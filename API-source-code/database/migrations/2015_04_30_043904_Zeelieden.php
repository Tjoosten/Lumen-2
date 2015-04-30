<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Zeelieden extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Zeelieden', function(Blueprint $table) {
            $table->increments(id);
            $table->string('Achternaam', 255);
            $table->string('Voornaam', 255);
            $table->string('Geslacht', 45);
            $table->string('Graad', 255);
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Zeelieden');
	}

}
