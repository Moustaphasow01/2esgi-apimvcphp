<?php

namespace Model;

class Model
{
    private $name;
    protected $db;

    public function __construct($name){
        $this->name = $name;
<<<<<<< HEAD
    }

    function getData()
    {
        $data = file_get_contents("data/" . $this->name . ".json");
        return json_decode($data);
    }


    function getAll()
    {
        $req = $this->db->prepare("SELECT * FROM  ".$this->name);
=======
        $this->db = (\Model\Bdd::getInstance())->db;
    }

    function getAll()
    {
        $req = $this->db->prepare("SELECT * FROM " . $this->name);
>>>>>>> 6f43a7c2696fec905e05c6e4a17bb5e1bce42d67
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetchAll();
    }

    function getOne($id)
    {
<<<<<<< HEAD
        $req = $this->db->prepare("SELECT * FROM  ".$this->name." WHERE id = :id");
        $req->execute(array(
            "id" => $id
        ));
=======
        $req = $this->db->prepare("SELECT * FROM " . $this->name . " WHERE id=?");
        $req->execute(array($id));
>>>>>>> 6f43a7c2696fec905e05c6e4a17bb5e1bce42d67
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetch();
    }
    
    function create($object)
<<<<<<< HEAD
    {
        $sql = "INSERT INTO ".$this->name;
        $sqlField=array();
        $req = $this->db->prepare("INSERT INTO ".$this->name);
=======
    {   
        $sql = "INSERT INTO " . $this->name;
        $sqlField = array();
        $sqlValue = array();
        
>>>>>>> 6f43a7c2696fec905e05c6e4a17bb5e1bce42d67
        foreach($object as $key => $value){
            $sqlField[] = $key;
            $sqlValue[] = $value;
        }
<<<<<<< HEAD
        $sql .= "(". implode(",",$sqlField) .") VALUE(" . implode(",",array_fill(0,count($sqlValue),"?")) . ")";
        $req = $this->db->prepare($sql);
        $req->execute($sqlValue);
    }
    
    function update($object)
{
    $id = $object->id;
    unset($object->id);

    $sql = "UPDATE " . $this->name . " SET ";

    $sqlField = array();
    $sqlValue = array();

    foreach($object as $key=>$value){
        $sqlField[] = $key . "=?";
        $sqlValue[] = $value;
    }

    $sql .= implode(",",$sqlField) . " WHERE id=?";

    $sqlValue[] = $id;
        
    $req = $this->db->prepare($sql);
    $req->execute($sqlValue);

    if($req->rowCount() == 1){
        return true;
    }else{
        return false;
    }
}

    
    function delete($id)
    {

        $req = $this->db->prepare("DELETE FROM ".$this->name." WHERE id = :id");
        $req->execute(array(
            "id" => $id
        ));
        return true;
        if ($req->rowCount() == 1) {
=======

        $sql .= "(". implode(",",$sqlField) .") VALUE(" . implode(",",array_fill(0,count($sqlValue),"?")) . ")";


        $req = $this->db->prepare($sql);
        $req->execute($sqlValue);

        if($req->rowCount() == 1){
>>>>>>> 6f43a7c2696fec905e05c6e4a17bb5e1bce42d67
            return true;
        }else{
            return false;
        }

    }
<<<<<<< HEAD
}
=======
    
    function update($object)
    {
        $id = $object->id;
        unset($object->id);

        $sql = "UPDATE " . $this->name . " SET ";

        $sqlField = array();
        $sqlValue = array();

        foreach($object as $key=>$value){
            $sqlField[] = $key . "=?";
            $sqlValue[] = $value;
        }

        $sql .= implode(",",$sqlField) . "WHERE id=?";

        $sqlValue[] = $id;

        $req = $this->db->prepare($sql);
        $req->execute($sqlValue);
        if($req->rowCount() == 1){
            return true;
        }else{
            return false;
        }
    }

    function delete($id)
    {
        $req = $this->db->prepare("DELETE FROM " . $this->name . " WHERE id=?");
        $req->execute(array($id));
        if($req->rowCount() == 1){
            return true;
        }else{
            return false;
        }
    }
}
>>>>>>> 6f43a7c2696fec905e05c6e4a17bb5e1bce42d67
