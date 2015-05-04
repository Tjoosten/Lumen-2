<?php

  namespace App\Http\Middleware;

  use Closure;
  use Request;

  class ExampleMiddleware {

      public function handle(Request $request, Closure $next)
      {
          return $next($request);
      }

  }
