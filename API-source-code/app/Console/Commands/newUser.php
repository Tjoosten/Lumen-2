<?php

  namespace App\Console\Commands;

  use App\Models\User;
  use Illuminate\Console\Command;

  /**
   * @apiName    Execute the console command (api:newUser).
   * @apiGroup   CLI Artisan commands
   * @apiVersion 1.0.0
   *
   * @apiSuccess {string} The user is created
   * @apiError   {string} WARNING: Invalid option or handling cancelled.
   */

   class newUser extends Command {

    protected $name = 'api:newUser';
    protected $description = 'Create a new user for the API';

    public function handle() {
      $firstname = $this->ask('What is the firstname of the user?');
      $lastname  = $this->ask('What is the lastname of the user?');
      $email     = $this->ask('What is the email address of the user?');
      $password  = $this->secret('What is the password for the user?');

      if ($this->confirm('Do you wish to continue? [yes|no]')) {
        $user = new User;
        $user->firstname    = $firstname;
        $user->lastname     = $lastname;
        $user->email        = $email;
        $user->password     = $password;
        $user->save();
      } else {
        echo "\n";
        $this->error('[WARNING]: Invalid option or handling cancelled');
      }


    }

   }
