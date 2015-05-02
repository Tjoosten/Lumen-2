<?php

namespace App\Http\Controllers;

use App\Models\Sailors;;
use App\Http\Controllers\Controller;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\Cursor;
use Illuminate\Http\Response;
use Request;

class ApiBegraafplaatsen extends CallbackGraveyards
{

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
        $newCursorStr = $Soldaten->last()->id;
        $cursor = new Cursor($currentCursorStr, $prevCursorStr, $newCursorStr, $Sailors->count());

        $resource = new Collection($Sailors, $this->transformSoldierCallback());
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
        $Sailors = new Sailors();
        $Sailors->save();
    }

    /**
     *
     */
    public function updateSailor()
    {

    }

    /**
     *
     */
    public function deleteSailor($id)
    {
        $Sailors = Sailors::find($id);
        $Sailors->delete();
    }
}