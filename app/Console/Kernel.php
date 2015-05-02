<?php

  namespace App\Console;

  use Illuminate\Console\Scheduling\Schedule;
  use Laravel\Lumen\Console\Kernel as ConsoleKernel;

  class Kernel extends ConsoleKernel {

    /**
     * The Artisan commands provided by your application.
     */
    protected $commands = [
      'App\Console\Commands\Rowcount',
      'App\Console\Commands\newUser',
    ];

    /**
     * @apiName     Define the application's command schedule.
     * @apiGroup    CLI Artisan Commands
     * @apiVersion  1.0.0
     * @apiParam    \Illuminate\Console\Scheduling\Schedule  $schedule
     * @apiSuccess  void
     */
    protected function schedule(Schedule $schedule) {
      // Scheduled jobs.
    }
  }
