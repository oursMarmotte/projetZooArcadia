<?php
class PiloteAlimentation{

   private $alimentation_id;
   private $alimentation_label;
   private $alimentation_date;
   private $alimentation_qté;
private $employé_id;
private $animal_id;
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

   

    public function getAlimentationId(){
        return $this->alimentation_id;

    }
    
   

    public function getAlimentationLabel(){
        return $this->alimentation_label;
    }

    public function getAlimentationDate(){
        return $this->alimentation_date;
    }

    public function getAlimentationQté(){
        return $this->alimentation_qté;
    }


    public function getIdEmployé(){
      return  $this->employé_id;
    }

    public function getIdAnimal(){
        return  $this->animal_id;
      }



      function setAlimentation_id($idalimentation){
        $this->alimentation_id = $idalimentation;
      }

    public function setAlimentation_label($labelAlimentation){
        $this->alimentation_label= $labelAlimentation;
    }

    public function setAlimentation_date($date){

        $this->alimentation_date= $date;
    }


    public function setAlimentation_qté($quantité){
        $this->alimentation_qté = $quantité;
    }

    public function setEmployé_id($employéid){
        $this->employé_id= $employéid;
    }
    public function setAnimal_id($animalid){
        $this->animal_id= $animalid;
    }

}


?>