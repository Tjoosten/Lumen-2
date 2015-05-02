<?php

namespace App\Http\Controllers;

use App\Models\Sailors;;
use App\Http\Controllers\Controller;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\Cursor;
use Illuminate\Http\Response;
use Request;

class ApiSailors extends CallbackSailors
{
    private $fractal;

    public function __construct()
    {
        $this->fractal = new Manager();
    }

    /**
     *
     */
    public function getSailors()
    {
        if ($currentCursorStr = Request::input('cursor', false)) {
            $Sailors = Sailors::where('id', '>', $currentCursorStr)->take(5)->get();
        } else {
            $Sailors = Sailors::take(5)->get();
        }

        $prevCursorStr = Request::input('prevCursor', 6);
        $newCursorStr = $Sailors->last()->id;
        $cursor = new Cursor($currentCursorStr, $prevCursorStr, $newCursorStr, $Sailors->count());

        $resource = new Collection($Sailors, $this->transformSailorsCallback());
        $resource->setCursor($cursor);

        $content = $this->fractal->createData($resource)->toJson();
        $status = 200;
        $mime = 'application/json';

        $response = response($content, $status);
        $response->header('Content-Type', $mime);

        return $response;
    }

    /**
     *
     */
    public function getSailor()
    {

    }

    /**
     *
     */
    public function insertSailor()
    {
        $Sailors                   = new Sailors();
        $Sailors->Achternaam       = Request::get('Achternaam');
        $Sailors->Voornaam         = Request::get('Voornaam');
        $Sailors->Geslacht         = Request::get('Geslacht');
        $Sailors->Graad            = Request::get('Graad');
        $Sailors->Schip            = Request::get('Schip');
        $Sailors->Geboren_plaats   = Request::get('GeborenPlaats');
        $Sailors->Geboren_datum    = Request::get('GeborenDatum');
        $Sailors->Overleden_plaats = Request::get('OverledenPlaats');
        $Sailors->Overleden_Datum  = Request::get('OverledenDatum');
        $Sailors->Woonplaats       = Request::get('Woonplaats');
        $Sailors->save();

        if ($Sailors->count() === 0) {
            $mime    = 'application/json';
            $status  = 200; // Successfull request
            $content = ['message' => 'Could not add the sailor.'];
        } elseif ($Sailors->count() > 0) {
            $mime    = 'application/json';
            $status  = 400; // Bad request.
            $content = ['message' => 'Sailor successfully added.'];
        }

        $response = response($content, $status);
        $response->header($mime);

        return $response;
    }

    /**
     *
     */
    public function updateSailor($id)
    {
        $Sailors                   = Sailors::find($id);
        $Sailors->Achternaam       = Request::get('Achternaam');
        $Sailors->Voornaam         = Request::get('Voornaam');
        $Sailors->Geslacht         = Request::get('Geslacht');
        $Sailors->Graad            = Request::get('Graad');
        $Sailors->Schip            = Request::get('Schip');
        $Sailors->Geboren_plaats   = Request::get('GeborenPlaats');
        $Sailors->Geboren_datum    = Request::get('GeborenDatum');
        $Sailors->Overleden_plaats = Request::get('OverledenPlaats');
        $Sailors->Overleden_Datum  = Request::get('OverledenDatum');
        $Sailors->Woonplaats       = Request::get('Woonplaays');
        $Sailors->save();
    }

    /**
     *
     */
    public function deleteSailor($id)
    {
        $Sailors = Sailors::find($id);
        $Sailors->delete();

        if($Sailors->count() === 0) {

        } elseif($Sailors->count() > 0) {

        }
    }
}