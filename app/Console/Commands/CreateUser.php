<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use Faker\Generator;
use App\User;
class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'createuser';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to create the only user for the application';
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //create the user from user input
        if(!User::find(1)){
            $user=new User();
            $user->name = $this->ask('Select your username');
            $user->email=$this->ask('Type your email address');
            $user->password=bcrypt($this->ask('Type your preffered password'));
            $user->save();
            $this->info('The user has been created');
        }
        else{
            $this->info('Only one user is allowed for this app');
        }
    }
}
