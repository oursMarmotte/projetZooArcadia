<?php
class PiloteRapport {

   private $rapport_id;
   private $rapport_Date;
   private $rapport_Detail;
   private $etat_de_santé_animal;
   private $id_Animal;
   private $id_Employé;

protected static $nbRapport;

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

   

    public function getRapportdate(){
        return $this->rapport_Date;

    }
    
   

    public function getRapportid(){
        return $this->rapport_id;
    }

    public function getRapportdetail(){
        return $this->rapport_Detail;
    }

    public function getEtatsanté(){
        return $this->etat_de_santé_animal;
    }
public function getIdanimal(){
    return $this->id_Animal;
}

public function getIdemployé(){
    return $this->id_Employé;
}

    public function setRapport_id($idrapport){

        $this->rapport_id= $idrapport;

    }

   
   
public function setRapport_Date($rapportDate){
    $this->rapport_Date= $rapportDate;
}

public function setRapport_Detail($rapportdetail){
    $this->rapport_Detail= $rapportdetail;
}
public function setEtat_de_santé_animal($santé){
    $this->etat_de_santé_animal = $santé;
}

public function setId_Animal($idanimal){
    $this->id_Animal= $idanimal;
}

public function setId_Employé($idemployé){
    $this->id_Employé= $idemployé;
}
    
}


?>