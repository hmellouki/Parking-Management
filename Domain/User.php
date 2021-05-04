<?php


class User
{
    private Fleet $myfleet;
    private string $nom, $prenom;
    private static UserId $id;

    public function __construct(string $n,string $p,?Fleet $fleet){
        $this->nom = $n;
        $this->prenom = $p;
        $this->id = UserId::random();

        if ($fleet){
            $this->myfleet = $fleet;
        }else{
            $this->myfleet = new Fleet();
        }
    }

    /**
     * @param Vehicle $v
     * @return bool
     */
    public function RegisteredThisVehicleIntoMyFleet(Vehicle $v):bool
    {
        foreach($this->myfleet as $vehicle){
            if($v == $vehicle){
                return true;
            }
        }
        return false;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @return UserId|Uuid
     */
    public static function getId()
    {
        return self::$id;
    }

    /**
     * @return Fleet
     */
    public function getMyfleet(): Fleet
    {
        return $this->myfleet;
    }

    /**
     * @param Fleet $myfleet
     */
    public function setMyfleet(Fleet $myfleet): void
    {
        $this->myfleet = $myfleet;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }
}