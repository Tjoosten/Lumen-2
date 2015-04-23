<?php

  namespace App\Http\Controllers;

  use App\Models\Graven;
  use App\Http\Controllers\Controller;

  use Illuminate\Http\Response;

  class ApiBegraafplaatsen extends Controller {

    /**
     * Display all the graveyards.
     *
     * @access public
     * @link   GET /Graveyards/all
     * @param  $parse, string, The parsing method.
     * @return Response
     */
    public function graveyards($parse) {
      $graveyards = Graven::all();

      return response()->json([
        'Error'      => false,
        'Rows'       => count($graveyards),
        'Graveyards' => $graveyards,
      ], 200)->header('Content-Type', 'application/json');
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
        return response()->json([
          'Error'   => true,
          'Rows'    => count($graveyard),
          'message' => 'No graveyard found.',
        ], 200)->header('Content-type', 'application/json');
      } else {
        return response()->json([
          'Error'     => false,
          'Rows'      => count($graveyard),
          'Graveyard' => $graveyard
        ], 200)->header('Content-Type','application/json');
      }
    }
  }
