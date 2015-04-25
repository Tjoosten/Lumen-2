<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Model;

  /**
   * DB: Model for the Military deaths.
   *
   * @author  Tim Joosten
   * @license MIT
   * @version 1.0.0
   * @package Fallen soldiers API.
   */

  class Soldaten extends Model {

  	protected $table = 'Gesneuvelde';
    protected $hidden = ['updated_at', 'created_at'];

  	public function begraafplaats() {
  		return $this->hasOne('App\Models\Graven', 'id', 'herdenking_id');
  	}

    public function regiment() {
      return $this->hasOne('App\Models\Divisie','ID', 'regiment_id');
    }

  }
