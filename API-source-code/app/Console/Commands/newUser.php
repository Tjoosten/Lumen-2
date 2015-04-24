<?php

  namespace App\Console\Commands;

  use App\Models\User;
  use Illuminate\Console\Command;

  /**
   * Terminal function for creating new users.
   */

   class newUser extends Command {

     /**
      * The console command
      *
      * @access protected
      * @var string
      */
    protected $name = 'api:newUser';

    /**
     * The console command description.
     *
     * @access protected
     * @var string
     */
    protected $description = 'Create a new user for the API';

    /**
     * Execute the console command?
     *
     * @access public
     * @return mixed
     */
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
