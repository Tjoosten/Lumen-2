<?php

  namespace App\Http\Middleware;

  use Closure;
  use Request;

  class ExampleMiddleware {

     /**
      * @apiName        handle
      * @apiDescription Handle an incoming request..
      * @apiGroup       Middleware.
      * @apiVersion     1.0.0
      *
      * @apiParam       \Illuminate\Http\Request  $request
      * @apiParam       \Closure  $next
      * @apiSuccess     mixed
      */
      public function handle(Request $request, Closure $next)
      {
          return $next($request);
      }

  }
