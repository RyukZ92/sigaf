<?php
class MiPrimerTest extends PHPUnit_Framework_TestCase
{
    // esta función no prueba ninguna otra función por lo tanto el nombre solo describe lo que hace
    // en este caso vamos a probar que True es igual a True
    public function testParaProbarQueTrueEsTrue(){
        $variableTrue = false;
        // primero vamos a ponerlo false para que la prueba falle
        
        // Probar que $variableTrue sea True de verdad
        $this->assertTrue($variableTrue);
    }
}
?>
