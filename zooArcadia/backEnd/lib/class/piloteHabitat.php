<?php
class PiloteHabitat{

  public $habitat_id;
  public $habitat_nom;
  public $habitat_description;



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

    

    public function getHabitatname(){
        return $this->habitat_nom;

    }
    public function getHabitatid(){
        return $this->habitat_id;
    }
    public function getHabitatDescription(){
        return $this->habitat_description;
    }

   
    public function setHabitat_nom($habitatname){

        $this->habitat_nom = $habitatname;

    }

    public function setHabitat_id($habitatid){
        $this->habitat_id = $habitatid;
    }
    public function setHabitat_description($habitatdescription){
        $this->habitat_description= $habitatdescription;
    }


    
}


?>