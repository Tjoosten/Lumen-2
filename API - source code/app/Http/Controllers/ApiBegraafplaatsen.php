<?php

  namespace App\Http\Controllers;

  use App\Models\Graven;
  use App\Http\Controllers\Controller;

  use Illuminate\Http\Response;

  class ApiBegraafplaatsen extends CallbackGraveyards {

    /**
     * Display all the graveyards.
     *
     * @access public
     * @link   GET /Graveyards/all
     * @return Response
     */
    public function graveyards() {
      $status  = 200; // HTTP code: Successfull request.
      $content = Graven::all();
      $mime    = 'application/json';
       
      $reponse = response($content, $status)
      $response->header('Content-Type', $mime);

      return $response;
    }


    /**
     * Display a specific graveyard.
     *
     * @access public
     * @link   GET /Graveyards/{id}
     * @param  $id, integer, the graveyards id.
     * @param  $parse, string, The parsing method.
     * @return Response
     */
    public function graveyard($parse, $id) {
      $graveyard = Graven::find($id);

      if(count($graveyard) == 0) {
        $content = $this->NoGraveyard();
        $status  = 200;
        $mime    = 'application/json';
      } else {
        $content = 'meh';
        $status  = 200;
        $mime    = 'application/json';
      }
      
      $response = reponse($content, $status);
      $response->header('Content-Type', $mime);
      
      return $response;
    }
  }
