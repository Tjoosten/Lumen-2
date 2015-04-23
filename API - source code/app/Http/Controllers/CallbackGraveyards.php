<?php

  namespace App\Http\Controllers;

  class CallbackGraveyards extends Controller {

    /**
     * [Failure] = No soldiers found.
     *
     * @access public
     * @return callable
     */

    /**
     * [Failure]: Invalid parse option
     *
     * @access public
     * @return callable.
     */
    public function CallbackInvalidParseOption() {
      return [
        'error'   => (bool) true,
        'message' => (string) 'Invalid parse option',
        ];
    }
  }
