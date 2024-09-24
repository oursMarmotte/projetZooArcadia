<?php
class PiloteAnimal{

   public $Id_Animal;
   public $animal_firstName;
   public $Id_Habitat;
   public $Id_Race;
   public $image;

protected static $nbAnimal;

    public function __construct(array $data = [])
    {
        if(!empty($data)){
$this->hydrate($data);
        }
    }


    public function hydrate(array $data){
        foreach($data as  $key => $value){

            $method = 'set'.ucfirst($key);
            if(method_exists($this,$method)){
                 $this->$method($value);
                 
                
            }
        }


    }

   

    public function getAnimalname(){
        return $this->animal_firstName;

    }
    
   

    public function getAnimalid(){
        return $this->Id_Animal;
    }

    public function getIdhabitat(){
        return $this->Id_Habitat;
    }

    public function getIdrace(){
        return $this->Id_Race;
    }
public function getImage(){
    return $this->image;
}

    public function setAnimal_firstName($name){

        $this->animal_firstName= $name;

    }

   
   
public function setId_Animal($idanimal){
    $this->Id_Animal =$idanimal;
}

public function setId_Habitat($idhabitat){
    $this->Id_Habitat= $idhabitat;
}


public function setId_Race($idrace){
    $this->Id_Race= $idrace;
}

public function setImage($image){
    $this->image = $image;
}
    
}


?>