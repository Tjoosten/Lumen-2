<?php

  namespace App\Exceptions;

  use Exception;
  use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;

  class Handler extends ExceptionHandler {

      /**
       * A list of the exception types that should not be reported.
       */
      protected $dontReport = [
          'Symfony\Component\HttpKernel\Exception\HttpException'
      ];

      /**
       * @apiName        report
       * @apiDescription Report or log an exception.
       * @apiGroup       Exception handler.
       * @apiVersion     1.0.0
       *
       * @apiParam       \Exception  $e
       * @apiError       void
       */
      public function report(Exception $e)
      {
          return parent::report($e);
      }

      /**
       * @apiName        render
       * @apiDescription Render an exception into an HTTP response.
       * @apiGroup       Exception handler
       * @apiVersion     1.0.0
       *
       * @apiParam       \Illuminate\Http\Request  $request
       * @apiParam       \Exception  $e
       * @apiSuccess     \Illuminate\Http\Response
       */
      public function render($request, Exception $e)
      {
          return parent::render($request, $e);
      }

  }
