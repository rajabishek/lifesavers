<?php namespace Eckspan\Donors;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Donor;

class RecordDonorDetailsCommandHandler implements CommandHandler {

    use DispatchableTrait;

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	$donor = Donor::recordDetails($command->name, $command->email, $command->age, 
    								$command->sex, $command->blood_group, $command->mobile, 
    								$command->address, $command->observations);
        $this->dispatchEventsFor($donor);
		return $donor;
    }
}