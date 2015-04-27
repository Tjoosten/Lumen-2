<?php

  namespace App\Http\Controllers;

  use App\Models\Divisie;
  use League\Fractal\Manager;
  use League\Fractal\Resource\Collection;
  use League\Fractal\Pagination\Cursor;
  use Illuminate\Http\Response;
  use Request;

  Class ApiRegiments extends CallbackRegiments {

    protected $fractal;

    public function __construct() {
      $this->fractal = new Manager();
    }

    /**
     *
     */
    public function getRegiments() {

    }

    /**
     * @api             {get} /regiments/{id} get a specific regiments.
     * @apiname         regiments (specific)
     * @apiDescription  Get a specific regiment.
     * @apiGroup        Regiments
     * @apiPermission   none
     * @apiVersion      1.0.0
     *
     * @apiExample Usage (example):
     * curl -i http://www.domain.com/regiments/22
     */
    public function getRegiment($id) {
      $Regiment      = Divisie::where('id', $id)->get();
      $outputLayout  = new Collection($Regiment, $this->transformRegimentCallback());

      if(count($Soldaat) === 0) {
        $content = $this->transformNoRegiment();
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

    /**
     * @api             {post} /regiments/insert Insert a new regiment.
     * @apiName         Insert a new regiment
     * @apiDescription  Insert new regiment.
     * @apiGroup        Regiments
     * @apiPermission   none
     * @apiVersion      1.0.0
     */
    public function insertRegiment() {
      $regiment = new Divisie;
      $regiment->Regiment = Request::get('Regiment');
      $regiment->save();
      $regiment->count();

      switch(count($regiment)) {
        case '1':
          $status  = 200; // Successfull request
          $mime    = 'application/json';
          $content =
        break;

        case '0':
          $status  = 400; // Bad request
          $mime    = 'application/json';
          $content =
        break;
      }

      $response = response($content, $status);
      $response->header('Content-Type', $mime);

      return $response;
    }

    /**
     * @api            {patch} /regiments/patch/{id} Update
     * @apiName        Update a regiment
     * @apiDescription Update a regiment
     * @apiGroup       Regiments
     * @apiPermission  Admin
     * @apiVersion     1.0.0
     */
    public function updateRegiment($id) {
      $regiment = Divisie::where('id', '=', $id);
      $regiment->Regiment = Request::get('Regiment'):
      $regiment->save();
      $regiment->count();
    }

    /**
     * @api             {delete} /regiments/delete/{id} Delete a regiment.
     * @apiName         deleteRegiments
     * @apiDescription  Delete a regiment
     * @apiGroup        Regiments
     * @apiPermission   None
     * @apiVersion      1.0.0
     *
     * @apiExample Usage (example)
     * curl -i http://www.domain.com/regiments/delete/22
     */
    public function deleteRegiments($id) {
      $regiment = new Divisie;
    }

  }
