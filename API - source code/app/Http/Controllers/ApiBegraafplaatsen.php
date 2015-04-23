<?php

  namespace App\Http\Controllers;

  use App\Models\Graven;
  use App\Http\Controllers\Controller;
  use League\Fractal\Manager;
  use League\Fractal\Resource\Collection;
  use League\Fractal\Pagination\Cursor;
  use Illuminate\Http\Response;
  use Request;

  class ApiBegraafplaatsen extends CallbackGraveyards {

    private $fractal;

    /**
     * Class constructor
     */
    public function __construct() {
      $this->fractal = new Manager();
    }

    /**
     * Display all the graveyards.
     *
     * @access public
     * @link   GET /Graveyards/all
     * @return Response
     */
    public function graveyards() {
      if ($currentCursorStr = Request::input('cursor', false)) {
        $Soldaten = Graven::where('id', '>', $currentCursorStr)->take(5)->get();
      } else {
        $Soldaten = Graven::take(5)->get();
      }

      $prevCursorStr = Request::input('prevCursor', 6);
      $newCursorStr  = $Soldaten->last()->id;
      $cursor        = new Cursor($currentCursorStr, $prevCursorStr, $newCursorStr, $Soldaten->count());

      $resource = new Collection($Soldaten, $this->transformGraveyard());
      $resource->setCursor($cursor);

      $content = $this->fractal->createData($resource)->toJson();
      $status  = 200;
      $mime    = 'application/json';

      $response = response($content, $status);
      $response->header('Content-Type', $mime);

      return $response;
    }


    /**
     * Display a specific graveyard.
     *
     * @access public
     * @link   GET /Graveyards/{id}
     * @param  $id, integer, the graveyards id.
     * @return Response
     */
    public function graveyard($id) {
      $graveyard = Graven::find($id);

      if(count($graveyard) == 0) {
        $content = $this->transformNoGraveyard();
        $status  = 200;
        $mime    = 'application/json';
      } else {
        $content = $this->transformNoGraveyard();
        $status  = 200;
        $mime    = 'application/json';
      }

      $response = response($content, $status);
      $response->header('Content-Type', $mime);

      return $response;
    }
  }
