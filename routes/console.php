<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('logs:clear', function() {

    // Option 1: Empty the whole logs folder (even .gitignore)
    exec('rm ' . storage_path('logs/*'));

    // Option 2: Delete laravel logs only (this will exclude telescope* etc.)
    exec('rm ' . storage_path('logs/laravel*'));

    $this->comment('Logs have been cleared!');

})->describe('Clear log files');
