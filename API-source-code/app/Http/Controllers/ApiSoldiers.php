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

    public function __construct() {
      $this->fractal = new Manager();
    }

    /**
     * @api             {get} /soldier/all getting all the soldiers.
     * @apiname         getSoldiers
     * @apiDescription  Get all the soldiers
     * @apiGroup        Soldiers
     * @apiPermission   none
     * @apiVersion      1.0.0
     *
     * @apiExample Usage (example):
     * curl -i http://www.domain.com/soldiers/all
     *
     * @apiSuccess      {Integer} id                 The soldier his DB id.
     * @apiSuccess      {String}  Voornaam           The firstname.
     * @apiSuccess      {String}  Achternaam         The lastname.
     * @apiSuccess      {String}  Geslacht           The gender .
     * @apiSuccess      {String}  Burgerlijke_stand  The relation status
     * @apiSuccess      {String}  Geboren_plaats     The place of birth.
     * @apiSuccess      {String}  Geboren_daatum     The date from birth.
     * @apiSuccess      {String}  Overleden_plaats   The place of death.
     * @apiSuccess      {String}  Overleden_datum    The date of death.
     * @apiSuccess      {String}  Overleden_locatie  The location of death.
     * @apiSuccess      {String}  Doodsoorzaak       The Cause of death.
     * @apiSuccess      {String}  Graf_referentie    The grave number.
     * @apiSuccess      {Integer} herdenking_id      The id of the graveyard.
     * @apiSuccess      {String}  Begraafplaats      The graveyard
     * @apiSuccess      {String}  Lengtegraad        Lengtegraad van het kerkhof.
     * @apiSuccess      {String}  Breedtegraad       Breedtegraad van het kerkhof.
     * @apiSuccess      {String}  Type               Type graveyard.
     * @apiSuccess      {String}  Rang               Military rank
     * @apiSuccess      {string}  Dienst             Service year.
     * @apiSuccess      {string}  Eenheid            Service country.
     * @apiSuccess      {string}  Stam_nr            Service number.
     * @apiSuccess      {Integer} regiment_id        The id of the regiment.
     * @apiSuccess      {String}  regiment           The regiment
     * @apiSuccess      {String}  Notitie            Notation about the soldier.
     *
     * @apiError        {Boolean} error              Error detectation.
     * @apiError        {String}  message            The error message.
     */
    public function getSoldiers() {
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

      $content = $this->fractal->createData($resource)->toJson();
      $status  = 200;
      $mime    = 'application/json';

      $response = response($content, $status);
      $response->header('Content-Type', $mime);

      return $response;
    }

    /**
     * @api             {get} /soldiers/{id} get a specific soldier.
     * @apiname         getSoldier
     * @apiDescription  Get a specific soldier
     * @apiGroup        Soldiers
     * @apiPermission   none
     * @apiVersion      1.0.0
     *
     * @apiParam        {String}  id                 The api off the soldier.
     *
     *
     * @apiExample Usage (example):
     * curl -i http://www.domain.com/soldiers/22
     *
     * @apiSuccess      {Integer} id                 The soldier his DB id.
     * @apiSuccess      {String}  Voornaam           The firstname.
     * @apiSuccess      {String}  Achternaam         The lastname.
     * @apiSuccess      {String}  Geslacht           The gender .
     * @apiSuccess      {String}  Burgerlijke_stand  The relation status
     * @apiSuccess      {String}  Geboren_plaats     The place of birth.
     * @apiSuccess      {String}  Geboren_daatum     The date from birth.
     * @apiSuccess      {String}  Overleden_plaats   The place of death.
     * @apiSuccess      {String}  Overleden_datum    The date of death.
     * @apiSuccess      {String}  Overleden_locatie  The location of death.
     * @apiSuccess      {String}  Doodsoorzaak       The Cause of death.
     * @apiSuccess      {String}  Graf_referentie    The grave number.
     * @apiSuccess      {Integer} herdenking_id      The id of the graveyard.
     * @apiSuccess      {String}  Begraafplaats      The graveyard
     * @apiSuccess      {String}  Lengtegraad        Lengtegraad van het kerkhof.
     * @apiSuccess      {String}  Breedtegraad       Breedtegraad van het kerkhof.
     * @apiSuccess      {String}  Type               Type graveyard.
     * @apiSuccess      {String}  Rang               Military rank
     * @apiSuccess      {string}  Dienst             Service year.
     * @apiSuccess      {string}  Eenheid            Service country.
     * @apiSuccess      {string}  Stam_nr            Service number.
     * @apiSuccess      {Integer} regiment_id        The id of the regiment.
     * @apiSuccess      {String}  regiment           The regiment
     * @apiSuccess      {String}  Notitie            Notation about the soldier.
     *
     * @apiError        {Boolean} error              Error detectation.
     * @apiError        {String}  message            The error message.
     */
    public function getSoldier($id) {
      $Soldaat       = Soldaten::with('begraafplaats', 'regiment')->where('id', $id)->get();
      $outputLayout  = new Collection($Soldaat, $this->transformSoldierCallback());


      if(count($Soldaat) === 0) {
        $content = $this->transformNoSoldiers();
        $status  = 200;
        $mime    = 'application/json';
      } else {
        $content = $this->fractal->createData($outputLayout)->toJson();
        $status  = 200;
        $mime    = 'application/json';
      }

      $response = response($content, $status);
      $response->header('Content-Type', $mime);

      return $response;
    }

    public function update() {

    }

    /**
     * @api             {post} /soldiers/{id} Insert a new soldier.
     * @apiname         InsertSoldier
     * @apiDescription  Insert a new soldiers
     * @apiGroup        Soldiers
     * @apiPermission   none
     * @apiVersion      1.0.0
     *
     * @apiParam        {String}  Voornaam                 The firstname of the soldier.
     * @apiParam        {String}  Achternaam               The lastname of the soldier.
     *
     *
     * @apiExample Usage (example):
     * curl -i -d 'Param=Value&Param=Value' http://www.domain.com/soldiers/insert/22
     */
    public function insert() {
      $Soldiers             = new Soldaten;
      $Soldiers->Voornaam   = Request::get('Voornaam');
      $Soldiers->Achternaam = Request::get('Achternaam');
      $Soldiers->save();


      return

    }

    /**
     * @api             {delete} /soldiers/{id} Delete a specific soldier.
     * @apiname         delete
     * @apiDescription  Delete a specific soldier
     * @apiGroup        Soldiers
     * @apiPermission   none
     * @apiVersion      1.0.0
     *
     * @apiParam        {String}  id                 The api off the soldier.
     *
     * @apiExample Usage (example):
     * curl -i http://www.domain.com/soldiers/delete/22
     */
    public function delete($id) {
      $soldiers = Soldaten::find($id);
      $soldiers->delete();

      switch(count($soldiers->count())) {
        case '1':
          $mime    = 'application/json';
          $status  = 200;
          $content = ['message' =>'Soldier deleted'];
        break;

        case '0':
          $mime    = 'application/json';
          $status  = 400;
          $content = ['messsage' => 'Could not perform the action'];
        break;
      }

      $response = response($content, $status);
      $response->header('Content-Type', $mime);

      return $response;
    }

    /**
     * @api             {patch} /soldiers/update/{id} Update a soldier.
     * @apiName         update
     * @apiDescription  Update a soldier
     * @apiGroup        Soldiers
     * apiPermission    Admin
     * @apiVersion      1.0.0
     */
    public function updateSoldier($id) {

    }
  }
