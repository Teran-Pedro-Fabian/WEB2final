<?php

class ModelProfesor{
    private $db;

    function __construct()
    {
        $this->db= new PDO("bace de datos");
    }

    function select(){
        $querry= $this->db->prepare("SELECT * FROM profesor");
        $querry->execute();
        $profesor= $querry->fetchAll(PDO::FETCH_OBJ);

        return$profesor;
    } 
    function selectID($ID){
        $querry= $this->db->prepare("SELECT * FROM profesor WHERE id= ?");
        $querry->execute([$ID]);
        $profesor= $querry->fetch(PDO::FETCH_OBJ);

        return$profesor;
    } 
    function delete($ID){
        $querry= $this->db->prepare("DELETE * FROM profesor WHERE id=?");
        $querry->execute([$ID]);
    } 
    
    function selectordenado($ordenarPor= null, $orden=null ){
        $query = $this->db->prepare("SELECT * FROM peliculas ORDER BY $ordenarPor $orden");
        
        $query->execute();

        $peliculas = $query->fetchAll(PDO::FETCH_OBJ);
        return $peliculas;
    } 


}