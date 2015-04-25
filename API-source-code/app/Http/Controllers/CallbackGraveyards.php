<?php

  namespace App\Http\Controllers;

  class CallbackGraveyards extends Controller {

    public function transformNoGraveyard() {
       return [
          'error'   => true,
          'message' => 'No graveyard found',
        ];
    }

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
