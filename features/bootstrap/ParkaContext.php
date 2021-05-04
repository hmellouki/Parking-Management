<?php

use Behat\Behat\Context\Context;

/**
 * Defines application features from the specific context.
 */
class ParkaContext implements Context
{
    private Vehicle $vehicle;
    private Location $location;
    private Fleet $fleet;


    /**
     * @Given my fleet :Fleet $
     */
    public function myFleet(Fleet $fleet)
    {
        $this->fleet = $fleet;
    }

    /**
     * @Given a vehicle :Vehicle $
     */
    public function aVehicle(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
    }

    /**
     * @Given I have registered this vehicle into my fleet
     */
    public function iHaveRegisteredThisVehicleIntoMyFleet()
    {
        $this->fleet->RegisterVehicle($this->vehicle);
    }

    /**
     * @Given a location :location $
     */
    public function aLocation(Location $location)
    {
        $this->location = $location;
    }

    /**
     * @When I park my vehicle at this location
     */
    public function iParkMyVehicleAtThisLocation()
    {
        $this->vehicle->ParkMyVehicleAtThisLocation($this->location);
    }

    /**
     * @Then the known location of my vehicle should verify this location
     * @throws Exception
     */
    public function theKnownLocationOfMyVehicleShouldVerifyThisLocation()
    {
        if (!$this->vehicle->SameLocation($this->location)) {
            throw new Exception("The known location of my vehicle is not verified");
        }
    }

    /**
     * @Given my vehicle has been parked into this location
     */
    public function myVehicleHasBeenParkedIntoThisLocation()
    {
        $this->vehicle->ParkMyVehicleAtThisLocation($this->location);
    }

    /**
     * @When I try to park my vehicle at this location
     */
    public function iTryToParkMyVehicleAtThisLocation()
    {
        $this->vehicle->ParkMyVehicleAtThisLocation($this->location);
    }

    /**
     * @Then I should be informed that my vehicle is already parked at this location
     * @throws  Exception
     */
    public function iShouldBeInformedThatMyVehicleIsAlreadyParkedAtThisLocation()
    {
        if ($this->vehicle->SameLocation($this->location)) {
            throw new Exception("The vehicle is already parked at this location");
        }
    }
}