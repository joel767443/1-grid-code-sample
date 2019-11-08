<?php

namespace App\Console\Commands;

use App\Models\EmployeeAddress;
use App\Services\GoogleService;
use Illuminate\Console\Command;

class ProcessEmployeeDistanceFromWork extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process:employeeDistance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will process the distance from the employees residential address to work';

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
        $addresses = EmployeeAddress::where('processed', false)->get();

        foreach ($addresses as $address) {

            try {

                $distanceFromWork = GoogleService::getLatLng($address->employee_address);

                if ($distanceFromWork) {
                    $address->employee_distance = $distanceFromWork;
                    $address->processed = true;
                    $address->save();
                }

            } catch (\Exception $e) {
                continue;
            }
        }

    }
}
