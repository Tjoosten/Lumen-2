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
     * @api             {get} /sailors/all Get all the sailors
     * @apiName         getSailors()
     * @apiDescription  Get all the sailors.
     * @apiGroup        Sailors
     * @apiPermission   None
     * @apiVersion      1.0.0
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
     * @api             {get} /sailor/{id} Get a specific sailor
     * @apiName         getSailor
     * @apidescription  Get a specific sailor.
     * @apiGroup        Sailors
     * @apiPermission   None
     * @apiVersion      1.0.0
     */
    public function getSailor()
    {

    }

    /**
     * @api             {post} /sailors/insert Insert new saolor
     * @apiname         insertSailor
     * @apiDescription  Insert a new sailor
     * @apiGroup        Sailors
     * @apiPermission   none
     * @apiVersion      1.0.0
     *
     * @apiParam        {String}  Achternaam        The sailor his lastname.
     * @apiParam        {String}  Voornaam          The sailor his firstname.
     * @apiParam        {String}  Geslacht          The gender of the sailor.
     * @apiParam        {String}  Graad             The rank on the ship.
     * @apiParam        {String}  Schip             The ship they working on.
     * @apiParam        {String}  GeborenPlaats     Place of birth.
     * @apiParam        {String}  GeborenDatum      Date of birth.
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
     * @api             {patch} /sailors/update Update a sailor.
     * @apiName         updateSailor()
     * @apiDescription  Update a sailor
     * @apiGroup        Sailors
     * @apiPermission   None
     * @apiVersion      1.0.0
     */
    public function updateSailor($id)
    {
        $Sailors = Sailors::find($id);

        if (Request::get('Achternaam')) {
            $Sailors->Achternaam = Request::get('Achternaam');
        }

        if (Request::get('Voornaam')) {
            $Sailors->Voornaam = Request::get('Voornaam');
        }

        if (Request::get('Geslacht')) {
            $Sailors->Geslacht = Request::get('Geslacht');
        }

        if (Request::get('Graad')) {
            $Sailors->Graad = Request::get('Graad');
        }

        if (Request::get('Schip')) {
            $Sailors->Schip = Request::get('Schip');
        }

        $Sailors->Geboren_plaats   = Request::get('GeborenPlaats');
        $Sailors->Geboren_datum    = Request::get('GeborenDatum');
        $Sailors->Overleden_plaats = Request::get('OverledenPlaats');
        $Sailors->Overleden_Datum  = Request::get('OverledenDatum');
        $Sailors->Woonplaats       = Request::get('Woonplaays');
        $Sailors->save();
    }

    /**
     * @api             {delete} /sailors/delete/{id} Delete a sailor
     * @apiName         deleteSoldier()
     * @apiDescription  Delete a soldier
     * @apiGroup        Sailors
     * @apiPermission   Admin
     * @apiVersion      1.0.0
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