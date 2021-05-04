<?php

use Behat\Behat\Context\Context;

/**
 * Defines application features from the specific context.
 */
class RegisterContext implements Context
{
    private Fleet $otherfleet;
    private Vehicle $vehicle;
    private Fleet $fleet;

    /**
     * @Given my fleet :flee $
     */
    public function myFleet2(Fleet $flee)
    {
        $this->fleet = $flee;
    }

    /**
     * @Given a vehicle :vehicl $
     */
    public function aVehicle2(Vehicle $vehicl)
    {
        $this->vehicle = $vehicl;
    }

    /**
     * @When I register this vehicle into my fleet
     */
    public function iRegisterThisVehicleIntoMyFleet()
    {
        $this->fleet->RegisterVehicle($this->vehicle);
    }

    /**
     * @Then this vehicle should be part of my vehicle fleet
     * @throws Exception
     */
    public function thisVehicleShouldBePartOfMyVehicleFleet()
    {
        if (!$this->fleet->RegisteredVehicleIntoThisFleet($this->vehicle)) {
            throw new Exception("The vehicle is not part of the fleet");
        }
    }

    /**
     * @When I try to register this vehicle into my fleet
     */
    public function iTryToRegisterThisVehicleIntoMyFleet()
    {
        $this->fleet->RegisterVehicle($this->vehicle);
    }

    /**
     * @Then I should be informed this this vehicle has already been registered into my fleet
     * @throws Exception
     */
    public function iShouldBeInformedThisThisVehicleHasAlreadyBeenRegisteredIntoMyFleet()
    {
        if (!$this->fleet->RegisteredVehicleIntoThisFleet($this->vehicle)) {
            throw new Exception("The vehicle has already been registered into this fleet");
        }
    }

    /**
     * @Given the fleet of another user :Fleet $
     */
    public function theFleetOfAnotherUser(Fleet $otherfleet)
    {
        $this->otherfleet = $otherfleet;
    }

    /**
     * @Given this vehicle has been registered into the other user's fleet
     */
    public function thisVehicleHasBeenRegisteredIntoTheOtherUsersFleet()
    {
        $this->otherfleet->RegisterVehicle($this->vehicle);
    }
}