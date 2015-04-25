<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Model;

  class Divisie extends Model {

    protected $table = 'Regimenten';
    protected $hidden = ['updated_at', 'created_at'];

  }
