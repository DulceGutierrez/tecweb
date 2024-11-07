<?php
class Menu{
    private $opciones;
    private $direccion;
    
    public function __construct($dir)
    {
        
    }

    public function insertar_opcion($op){
        $this->opciones[]=$op;
    }

    private function graficar_horizontal(){

    }

    private function graficar_vertical(){

    }

    public function graficar(){
        if($this->direccion === 'horizontal'){
            $this->graficar_horizontal();
        }
        else{
            $this->graficar_vertical();
        }
    }
}
?>