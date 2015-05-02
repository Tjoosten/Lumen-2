<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Graven extends Model
{

    /**
     * The databese table.
     *
     * @var string
     */
    protected $table = 'Begraafplaatsen';

    /**
     * The hidden database columns.
     *
     * @var array
     */
    protected $hidden = ['updated_at', 'created_at'];

}
