<?php

namespace App\Http\Controllers;

use App\Models\Divisie;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\Cursor;
use Illuminate\Http\Response;
use Request;

Class ApiRegiments extends CallbackRegiments
{

    protected $fractal;

    public function __construct()
    {
        $this->fractal = new Manager();
    }

    public function getRegiments()
    {
        $regiments = Divisie:all()
    }

    public function getRegiment($id)
    {
        $Regiment = Divisie::where('id', $id)->get();
        $outputLayout = new Collection($Regiment, $this->transformRegimentCallback());

        if (count($Soldaat) === 0) {
            $content = $this->transformNoRegiment();
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

    public function insertRegiment()
    {
        $regiment = new Divisie;
        $regiment->Regiment = Request::get('Regiment');
        $regiment->save();
        $regiment->count();

        switch ($regiment->count()) {
            case '1':
                $status = 200; // Successfull request
                $mime = 'application/json';
                $content = [ 'message' => 'successfull added the regiment.' ];
        break;

            case '0':
                $status = 400; // Bad request
                $mime = 'application/json';
                $content = [ 'message' => 'Could not add the regiment.' ];
        break;
        }

        $response = response($content, $status);
        $response->header('Content-Type', $mime);

        return $response;
    }

    public function updateRegiment($id)
    {
        $regiment = Divisie::where('id', '=', $id);
        $regiment->Regiment = Request::get('Regiment'):
        $regiment->save();

        if ($regiment->count() === 0) {
            $mime    = 'application/json';
            $status  = 200; // Successfull request.
            $content = [ 'message' => 'Could not update the regiment' ];
        } elseif($regiment->count()) {
            $mime    = 'application/json';
            $status  = 400; // BAd request.
            $content = [ 'message' => 'Regiment successfull updated' ];
        }

        $response = response($content, $mime);
        $response->header($mime);


    }

    public function deleteRegiments($id)
    {
        $regiment = Divisie::find($id);
        $regiment->delete();

        if ($regiment->count() === 0) {
            $mime    = 'application/json';
            $status  = 200; // Successfull request.
            $content = [ 'message' => 'Regiment could not deleted.' ];
        } elseif ($regiment->count() > 0) {
            $mime    = 'application/json';
            $status  = 200; // Successfull request.
            $content = [ 'message' => 'Regiment successfull deleted.' ];
        }

        $response = response($content, $status)
        $response->header($mime);

        return $response;
    }

}
