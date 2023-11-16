<?php

class ModelOpinion{
    private $db;

    function __construct()
    {
        $this->db = new PDO("bace de datos");
    }

    function insert($dni, $fecha, $imagen, $id_profesor){
        $querry= $this->db->prepare("INSERT INTO opinion('dni', 'fecha', 'imagen', 'id_profesor') value(?,?,?,?) ");
        $querry->execute([$dni, $fecha, $imagen, $id_profesor]);
    } 

    function selectDNI($dni){
        $querry= $this->db->prepare("SELECT * FROM opinion WHERE dni= ?");
        $querry->execute([$dni]);
        $profesor= $querry->fetchAll(PDO::FETCH_OBJ);

        return$profesor;
    } 
}