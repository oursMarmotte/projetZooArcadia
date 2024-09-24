<?php
class PiloteCategorie{

   private $race_id;
   private $animal_label;




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

   

    public function getRace_id(){
        return $this->race_id;

    }
    
   

    public function getAnimalLabel(){
        return $this->animal_label;
    }

   

    public function setAnimal_label($labelname){

        $this->animal_label =$labelname;

    }

   
   

}
    


?>