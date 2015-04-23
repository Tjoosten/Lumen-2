<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Model;

  /**
   * DB: Model for the Political prisoners.
   *
   * @author  Tim Joosten
   * @license MIT
   * @version 1.0.0
   * @package Fallen soldiers API.
   */

  class PoliticalPrisoners extends Model {

    /**
     * The database table
     *
     * @access protected
     * @var    $hidden
     */
    protected $table = 'Politieke_gevangenen';

  }
