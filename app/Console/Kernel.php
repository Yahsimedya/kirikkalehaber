<?php


namespace App\Console;

use App\Http\Controllers\IhaController;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Console\Commands\DemoCron;
use App\Models\Comments;
use App\Models\Post;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\District;

use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use Storage;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
       // php artisan make:command NamazVakitleri --command=namaz:cron
        Commands\DemoCron::class,
        Commands\NamazVakitleri::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('demo:cron')->everyFiveMinutes();
        $schedule->command('namaz:cron')->monthlyOn(15, '00:00');
        ///php artisan schedule:run ile tek sefer çalışıyor
        ///php artisan schedule:work ile devamlı çalışıyor
    }


    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');
        require base_path('routes/console.php');
    }
}
/*


*/
