<?php


class Fleet
{
    private array $fleet = [];

    public function __construct()
    {
    }

    /**
     * @param Vehicle $v
     * @return bool
     */
    public function RegisteredVehicleIntoThisFleet(Vehicle $v): bool
    {
        foreach($this->fleet as $vehicle){
            if($v == $vehicle){
                return true;
            }
        }
        return false;
    }

    /**
     * @param Vehicle $v
     */
    public function RegisterVehicle(Vehicle $v):void
    {
        $this->fleet[] = $v;
    }

    /**
     * @return array
     */
    public function getFleet(): array
    {
        return $this->fleet;
    }

    public function __destruct()
    {
        unset($this->fleet);
    }
}