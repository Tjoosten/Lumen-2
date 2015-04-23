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

    /**
     * [Success]: Callback for the graveyard side.
     *
     * @access public
     * @return callable
     */
    public function transformGraveyard() {
      return function($data) {
        return [
          [
            'id'                => (int)    $data->id,
            'begraafplaats'     => (string) $data->Begraafplaats,
            'lengtegraaf'       => (string) $data->Lengtegraad,
            'breedtegraad'      => (string) $data->Breedtegraad,
            'type'              => (string) $data->Type,
          ],
        ];
      };
    }

  }
