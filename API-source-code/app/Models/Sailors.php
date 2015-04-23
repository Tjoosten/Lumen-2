<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Model;

  /**
   * DB: Model for the drowned sailors table.
   *
   * @author  Tim Joosten
   * @license MIT
   * @version 1.0.0
   * @package Fallen soldiers API.
   */

  class Sailors extends Model {

    /**
     * The database table
     *
     * @access protected
     * @var    $hidden
     */
    protected $table = 'Zeelieden';

  }
