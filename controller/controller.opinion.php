<?php

class ControllerOpinion{
    private $modelP;
    private $modelO;
    private $view;
    
    function __Controller(){
        $this->modelP = new ModelProfesor();
        $this->modelO = new ModelOpinion(); 
        $this->view= new ViewOpinion();
    }


    function add(){
        $dni= $_POST["dni"];
        $fecha = now();
        $imagen= $_POST["img"];
        $id_profesor = $_POST["id_profesor"];


        if(!isset($dni)){
            $this->view->error();
            return;
        }


        if(!isset($imagen)){
            $this->view->error();
            return;
        }


        if(!isset($profesor)){
            $this->view->error();
            return;
        }
        $profesor = $this->modelP->selectID($id_profesor);
        if(!isset($profesor)){
            $this->view->error();
            return;
        }


        if($this->existeAlumno($dni, $id_profesor)){
            $this->modelO->insert($dni, $fecha, $imagen, $id_profesor);
        }else{
            $this->view->error();
        }
    }

    function existeAlumno($dni, $profesor){
        $alumno = $this->modelO->selectDNI($dni);

        if(isset($alumno)){

            if($alumno->id_profesor == $profesor){
                $this->view->error();
                return false;
            }else{
                return true;
            }
            
        }

        return true;
        
    }


}