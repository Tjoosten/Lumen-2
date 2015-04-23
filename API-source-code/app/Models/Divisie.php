<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Model;

  /**
   * DB: Model for all the military regiments.
   *
   * @author  Tim Joosten
   * @license MIT
   * @version 1.0.0
   * @package Fallen soldiers API.
   */

  class Divisie extends Model {

    /**
     * The database table
     *
     * @access protected
     * @var    $hidden
     */
    protected $table = 'Regimenten';

    /**
     * Hidden columns
     *
     * @access protected
     * @var    $hidden
     */
    protected $hidden = ['updated_at', 'created_at'];

  }
