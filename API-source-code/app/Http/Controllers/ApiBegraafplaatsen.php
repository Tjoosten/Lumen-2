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

    public function __construct() {
      $this->fractal = new Manager();
    }

    /**
     * @api             {get} /graveyards/all get all the graveyards.
     * @apiname         graveyards (all)
     * @apiDescription  Get a all the graveyards.
     * @apiGroup        Graveyards
     * @apiPermission   none
     * @apiVersion      1.0.0
     *
     * @apiExample Usage (example):
     * curl -i http://www.domain.com/graveyards/all
     *
     * @apiError        {Boolean}   error    Error detection.
     * @apiError        {String}    message  Error Message.
     */
    public function graveyards() {
      if ($currentCursorStr = Request::input('cursor', false)) {
        $Soldaten = Graven::where('id', '>', $currentCursorStr)->take(5)->get();
      } else {
        $Soldaten = Graven::take(5)->get();
      }
      
      // Execution time logging. 
      if($_ENV['APP_DEBUG'] === true) {
        $execTime = '0';
        Log::info("$_SERVER['REQUEST_URI'] executed in $execTime");
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
     * @api             {get} /graveyard/{id} get a specific graveyard.
     * @apiname         graveyards (specific)
     * @apiDescription  Get a specific graveyard.
     * @apiGroup        Graveyards
     * @apiPermission   none
     * @apiVersion      1.0.0
     *
     * @apiExample Usage (example):
     * curl -i http://www.domain.com/graveyard/33
     *
     *  @apiErrorExample Error response:
     *     HTTP/1.1 401 Not Authenticated
     *     {
     *       "error": true,
     *       "message": "No graveyard found".
     *     }
     *
     * @apiError        {Boolean}   error    Error detection.
     * @apiError        {String}    message  Error Message.
     */
    public function graveyard($id) {
      $graveyard = Graven::where('id', $id)->get();
      $dbResult  = new Collection($graveyard, $this->transformGraveyard());

      if(count($graveyard) == 0) {
        $content = $this->transformNoGraveyard();
        $status  = 200;
        $mime    = 'application/json';
      } else {
        $content = $this->fractal->createData($dbResult)->toJson();
        $status  = 200;
        $mime    = 'application/json';
      }

      $response = response($content, $status);
      $response->header('Content-Type', $mime);

      return $response;
    }
  }
