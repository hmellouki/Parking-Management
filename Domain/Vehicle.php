<?php


class Vehicle
{
    private Immatriculation $Immatriculation;
    private Location $Parked;

    public function __construct(Immatriculation $i, Location $l)
    {
        $this->Immatriculation = $i;
        $this->Parked = $l;
    }

    /**
     * @return Location
     */
    public function SameLocation(Location $Parked): bool
    {
        return $this->Parked === $Parked;
    }

    /**
     * @return Location
     */
    public function getParked(): Location
    {
        return $this->Parked;
    }

    /**
     * @param Location $Parked
     */
    public function ParkMyVehicleAtThisLocation(Location $Parked): void
    {
        $this->Parked = $Parked;
    }

    /**
     * @return Immatriculation
     */
    public function getImmatriculation(): Immatriculation
    {
        return $this->Immatriculation;
    }

    /**
     * @param Immatriculation $Immatriculation
     */
    public function setImmatriculation(Immatriculation $Immatriculation): void
    {
        $this->Immatriculation = $Immatriculation;
    }
}