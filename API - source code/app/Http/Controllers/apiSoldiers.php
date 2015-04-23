<?php

  namespace App\Http\Controllers;

  use App\Models\Soldaten;
  use League\Fractal\Manager;
  use League\Fractal\Resource\Collection;
  use League\Fractal\Pagination\Cursor;
  use Illuminate\Http\Response;
  use Request;

  class ApiSoldiers extends CallbackSoldier {

    private $fractal;

    /**
     * Class constructor
     */
    public function __construct() {
      $this->fractal = new Manager();
    }

    /**
     * Display all the soldiers.
     *
     * @access public
     * @link   GET /{parse}/soldiers/all
     * @param  $parse, string, The parsing method.
     * @return Response
     */
    public function soldiers($parse) {
      if ($currentCursorStr = Request::input('cursor', false)) {
        $Soldaten = Soldaten::with('begraafplaats', 'regiment')->where('id', '>', $currentCursorStr)->take(5)->get();
      } else {
        $Soldaten = Soldaten::with('begraafplaats', 'regiment')->take(5)->get();
      }

      $prevCursorStr = Request::input('prevCursor', 6);
      $newCursorStr  = $Soldaten->last()->id;
      $cursor        = new Cursor($currentCursorStr, $prevCursorStr, $newCursorStr, $Soldaten->count());

      $resource = new Collection($Soldaten, $this->transformSoldierCallback());
      $resource->setCursor($cursor);

      switch($parse) {
        case 'json':
          $content = $this->fractal->createData($resource)->toJson();
          $status  = 200;
          $mime    = 'application/json';
        break;

        default:
          $content = $this->transformNoSoldier();
          $status  = 200;
          $mime    = 'application/json';
      }

      $response = response($content, $status);
      $response->header('Content-Type', $mime);

      return $response;
    }

    /**
     * Get a specific soldier.
     *
     * @access public
     * @link   GET /soldiers/{id}
     * @param  $id, integer, soldiers DB id.
     * @param  $pase, string, the parsing option.
     * @return Response.
     */
    public function soldier($parse, $id) {
      $Soldaat       = Soldaten::with('begraafplaats', 'regiment')->where('id', $id)->get();
      $outputLayout  = new Collection($Soldaat, $this->transformSoldierCallback());

      if(count($Soldaat) === 0) {
        return response()->json([
          'Error'   => true,
          'message' => 'No soldier found.',
        ], 200)->header('Content-type', 'application/json');
      }

      switch($parse) {
        case 'json':
          $content = $this->fractal->createData($outputLayout)->toJson();
          $status  = 200;
          $mime    = 'application/json';
        break;

        default:
          $content = $this->transformNoSoldier();
          $status  = 400;
          $mime    = 'application/json';

      }

      $response = response($content, $status);
      $response->header('Content-Type', $mime);

      return $response;
    }

    /**
     * Delete a soldier.
     *
     * @access public
     * @link   GET /soldiers/delete/{id}
     * @param  $id, integer, soldiers DB id.
     * @return Response
     */
    public function delete() {
      $soldiers = Soldaten::find($id);
      $soldiers->delete();

      return response()->json([
        'error'   => false,
        'soldier' => 'Soldier deleted',
      ], 200)->header('Content-Type', 'application/json');
    }

  }
