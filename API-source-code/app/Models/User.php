<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Model;

  /**
   * DB: Model for the API users.
   *
   * @author     Tim Joosten
   * @license    MIT
   * @version    1.0.0
   * @package    API
   * @subpackage Models
   */

  class User extends Model {

    /**
     * The Database table?.
     *
     * @access protected
     * @var $table
     */
    protected $table = 'Users';

  }
