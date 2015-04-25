<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Model;

  class Graven extends Model {

    protected $table = 'Begraafplaatsen';
    protected $hidden = ['updated_at', 'created_at'];

  }
