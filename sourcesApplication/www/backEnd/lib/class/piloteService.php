<?php
class PiloteService{

   private $service_id;
   private $service_nom;
   private $service_description;
   private $icon;
private $id_employé;

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

   

    public function getServiceId(){
        return $this->service_id;

    }
    
   

    public function getServiceNom(){
        return $this->service_nom;
    }

    public function getServiceDescription(){
        return $this->service_description;
    }

    public function getIcon(){
        return $this->icon;
    }


    public function getIdEmployé(){
      return  $this->id_employé;
    }

    public function setService_nom($servicenom){
        $this->service_nom = $servicenom;
    }

    public function setId_employé($idemployé){

        $this->id_employé = $idemployé;
    }


    public function setService_id($id){
        $this->service_id=$id;
    }

    public function setService_description($description){
        $this->service_description= $description;
    }
    public function setIcon($icon){
        $this->icon= $icon;
    }

}


?>