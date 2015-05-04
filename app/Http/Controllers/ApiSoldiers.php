<?php

namespace App\Http\Controllers;

use App\Models\Soldaten;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\Cursor;
use Illuminate\Http\Response;
use Request;

class ApiSoldiers extends CallbackSoldier
{

    private $fractal;

    public function __construct()
    {
        $this->fractal = new Manager();
    }

    public function getSoldiers()
    {
        if ($currentCursorStr = Request::input('cursor', false)) {
            $Soldaten = Soldaten::with('begraafplaats', 'regiment')->where('id', '>', $currentCursorStr)->take(5)->get();
        } else {
            $Soldaten = Soldaten::with('begraafplaats', 'regiment')->take(5)->get();
        }

        $prevCursorStr = Request::input('prevCursor', 6);
        $newCursorStr = $Soldaten->last()->id;
        $cursor = new Cursor($currentCursorStr, $prevCursorStr, $newCursorStr, $Soldaten->count());

        $resource = new Collection($Soldaten, $this->transformSoldierCallback());
        $resource->setCursor($cursor);

        $content = $this->fractal->createData($resource)->toJson();
        $status = 200;
        $mime = 'application/json';

        $response = response($content, $status);
        $response->header('Content-Type', $mime);

        return $response;
    }

    public function getSoldier($id)
    {
        $Soldaat = Soldaten::with('begraafplaats', 'regiment')->where('id', $id)->get();
        $outputLayout = new Collection($Soldaat, $this->transformSoldierCallback());


        if (count($Soldaat) === 0) {
            $content = $this->transformNoSoldiers();
            $status = 200;
            $mime = 'application/json';
        } else {
            $content = $this->fractal->createData($outputLayout)->toJson();
            $status = 200;
            $mime = 'application/json';
        }

        $response = response($content, $status);
        $response->header('Content-Type', $mime);

        return $response;
    }

    public function update($id)
    {
        $Soldier = Soldaten::find($id);
        $Soldier->save();

        if($Soldier->count() === 0) {
            $mime    = 'application/json';
            $status  = 200; //Successfull request;
            $content = [ 'message' => 'Could not update the soldier' ];
        } elseif($Soldier->count() > 0) {
            $mime    = 'application/json';
            $status  = 200; // Successfull request.
            $content = [ 'message' => 'Soldier is updated' ];
        }

        $response = response($content, $status);
        $response->header($mime);

        return $response;
    }

    public function insert()
    {
        $Soldiers = new Soldaten;
        $Soldiers->Voornaam           = Request::get('Voornaam');
        $Soldiers->Achternaam         = Request::get('Achternaam');
        $Soldiers->Burgerlijke_stand  = Request::get('Stam_nr');
        $Soldiers->regiment_id        = Request::get('Regiment');
        $Soldiers->Geboren_datum      = Request::get('GeborenDatum');
        $Soldiers->Geboren_plaats     = Request::get('GeborenPlaats');
        $Soldiers->Overleden_locatie  = Request::get('OverledenLocatie');
        $Soldiers->Overleden_datum    = Request::get('OverledenDatum');
        $Soldiers->Overleden_plaats   = Request::get('OverledenPlaats');
        $Soldiers->Doodsoorzaak       = Request::get('Doodsoorzaak');
        $Soldiers->herdenking_id      = Request::get('Herdenking');
        $Soldiers->Geslacht           = Request::get('Geslacht');
        $Soldiers->Eenheid            = Request::get('Eenheid');
        $Soldiers->Rang               = Request::get('Rang');
        $Soldiers->Graf_referentie    = Request::get('Graf_referentie');
        $Soldiers->Dienst             = Request::get('Dienst');
        $Soldiers->Notitie            = Request::get('Notitie');
        $Soldiers->save();

        if ($Soldiers->count() === 0) {
            $mime = 'application/json';
            $status = 200; // Successfull Request.
            $content = ['message' => 'Could not add the soldier.'];
        } elseif ($Soldiers->count() > 0) {
            $mime = 'application/json';
            $status = 400; // Bad Request
            $content = ['message' => 'Soldier successfull added.'];
        }

        $response = response($content, $status);
        $response->header($mime);

        return $response;

    }

    public function delete($id)
    {
        $soldiers = Soldaten::find($id);
        $soldiers->delete();

        switch (count($soldiers->count())) {
            case '1':
                $mime = 'application/json';
                $status = 200;
                $content = ['message' => 'Soldier deleted'];
                break;

        case '0':
            $mime = 'application/json';
            $status = 400;
            $content = ['messsage' => 'Could not perform the action'];
            break;
      }

        $response = response($content, $status);
        $response->header('Content-Type', $mime);

        return $response;
    }

    public function updateSoldier($id)
    {
        $Soldier = Soldaten::where('id', $id)->get();
        $Soldier->Voornaam = Request::get('Voornaam');
        $Soldier->Achternaam = Request::get('Achternaam');
        $Soldier->save();

        if ($Soldier->count() === 0) {
            $mime = 'application/json';
            $status = 200; // Successfull request.
        } elseif ($Soldier->count() > 0) {
            $mime = 'application/json';
        }

        $response = response($content, $status);
        $response->header($mime);

        return $response;
    }
}
