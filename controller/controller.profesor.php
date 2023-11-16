<?php

class ControllerProfesor {
    private $modelP;
    private $viewP;

    function  __construct()
    {
        $this->modelP= new ModelProfesor();
        $this->viewP= new ViewProfesor();
    }



    function show(){
        $profesores= $this->modelP->select();
        $this->viewP->muestra($profesores);
    } 



    function showID(){
        $id=$_POST["id"];

        if(isset($id)){
            $profesores= $this->modelP->selectID($id);
        }else{
            $this->viewP->error();
            return;
        }

        $this->viewP->muestra($profesores);
    } 


    function delete(){
        $id= $_POST["id"];
        $this->modelP->delete($id);
    }


    function selectOrdenado(){
        $ordenarpor= $_POST["ordenarpor"];
        $orden= $_POST["orden"];

        if(isset($ordenarpor) && isset($orden)){
            $profesoresordenados= $this->modelP->selectOrdenado($ordenarpor, $orden);
        }else{
            $this->viewP->error();
            return;
        }

        $this->viewP->muestra($profesoresordenados);

    }


}