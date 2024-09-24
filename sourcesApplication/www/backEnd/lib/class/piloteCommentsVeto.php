<?php
class PiloteCommentsVeto {

   private $comment_id;
   private $comment_date;
   private $comment_label;
   private $veto_id;
   private $habitat_id;




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


    public function getCommentdate(){
        return $this->comment_date;
    }
    
   
    public function getCommentId(){
        return $this->comment_id;
    }

    public function getComment(){
        return $this->comment_label;
    }

    public function getVetoId(){
        return $this->veto_id;
    }
public function getHabitatId(){
    return $this->habitat_id;
}

public function setComment_date($commentdate){
    return $this->comment_date =$commentdate;
}


public function setComment_label($comment){
    $this->comment_label =$comment;
}
    public function setComment_id($idcomment){

        $this->comment_id = $idcomment;

    }

   
   
public function setVeto_id($vetoid){
    $this->veto_id = $vetoid;
}

public function setHabitat_id($habitatid){
    $this->habitat_id = $habitatid;
}



}


?>