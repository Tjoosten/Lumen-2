<?php

namespace App\Console\Commands;

use App\Models\PoliticalPrisoners;
use App\Models\Resistance;
use App\Models\Memorial;
use App\Models\Civilians;
use App\Models\Soldaten;
use App\Models\Sailors;
use App\Models\Graven;
use App\Models\Divisie;
use Illuminate\Console\Command;

/**
 * Terminal function for counting all the database records relaying to the API.
 */

class Rowcount extends Command {

	/**
	 * The console command name.
	 *
   * @access protected
	 * @var    string
	 */
	protected $name = 'api:count';

	/**
	 * The console command description.
	 *
   * @access protected
	 * @var string
	 */
	protected $description = 'Count all the database inserts.';

	/**
	 * Execute the console command.
	 *
   * @access public
	 * @return mixed
   * @todo   Document this in the readme.md file.
	 */
	public function handle() {
    $countSoldiers   = number_format(count(Soldaten::all()));
    $countGraveyards = number_format(count(Graven::all()));
    $countRegiments  = number_format(count(Divisie::all()));
    $countSailors    = number_format(count(Sailors::all()));
    $countCivilians  = number_format(count(Civilians::all()));
    $countMemorial   = number_format(count(Memorial::all()));
    $countPrisoners  = number_format(count(PoliticalPrisoners::all()));
    $countResistance = number_format(count(Resistance::all()));

    // Count the inserts together
    $sum = $countSoldiers  + $countGraveyards + $countRegiments
         + $countSailors   + $countCivilians  + $countMemorial
         + $countPrisoners + $countResistance;

    $all = number_format($sum);

    $this->info("Military Deaths:       $countSoldiers");
    $this->info("Graveyards:            $countGraveyards");
    $this->info("Militray Regiments:    $countRegiments");
    $this->info("Sailors deaths:        $countSailors");
    $this->info("Civilians deaths:      $countCivilians");
    $this->info("Memorial monuments:    $countMemorial");
    $this->info("Political Prisoners:   $countPrisoners");
    $this->info("Resistance Fighters:   $countResistance");
    $this->comment("---------------------- $all");
  }

}
