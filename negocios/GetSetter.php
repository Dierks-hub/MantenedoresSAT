<?php

class GetSetter extends stdClass{
    protected $sql;
    protected $ejecuta;
    protected $rdbms;
    protected $usercon;
    protected $vector_resultado;
    protected $filas;

    public function getFilas(){
        $this->filas=count($this->vector_resultado);
        return $this->filas;
    }
    public function getSet($filas=0){
        if(isset($this->vector_resultado[$filas])){
            foreach($this->vector_resultado[$filas] as $index => $resultados){
                $key = mb_strtoupper($index);
                $this->{$key}   = $resultados;
            }
        }
    }
}
