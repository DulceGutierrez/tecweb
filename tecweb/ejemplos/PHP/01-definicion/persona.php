<?php
class persona {
    private $hombre; //atributo

    public function inicializar ($name) {
        $this->nombre = $name; 
        echo '<p>'. $this->nombre. '</p>'; //
    }

    public function mostrar (){
        echo '<p>'. $this->nombre. '</p>'; 
    }

}
?>