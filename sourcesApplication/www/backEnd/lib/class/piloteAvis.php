<?php
class PiloteAvis {
  private $avis_id;
  private $avis_champ;
   private $visiteur_pseudo;
   private $champ_valider;
   private $avis_date;

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

   

    public function getAvisChamp(){
        return $this->avis_champ;

    }
    
   

    public function getAvisId(){
        return $this->avis_id;
    }

    public function getVisiteurPseudo(){
        return $this->visiteur_pseudo;
    }

    public function getChampAvalider(){
        return $this->champ_valider;
    }
public function getAvisDate(){
    return $this->avis_date;
}



    public function setAvis_id($idmessage){

        $this->avis_id= $idmessage;

    }

   
   
public function setAvis_champ($avis){
    $this->avis_champ= $avis;
}

public function setVisiteur_pseudo($pseudo){
    $this->visiteur_pseudo =$pseudo;
}
public function setChamp_valider($valid){
    $this->champ_valider = $valid;
}

public function setAvis_date($date){
    $this->avis_date =$date;
}


    
}


?>