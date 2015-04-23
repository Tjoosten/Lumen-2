<?php

  namespace App\Http\Controllers;

  class CallbackGraveyards extends Controller {

    /**
     * [Failure] = No soldiers found.
     *
     * @access public
     * @return callable
     */
    public function transformNoGraveyard() {
       return [
          'error'   => true,
          'message' => 'No graveyard found',
        ];
    }
    
  }
