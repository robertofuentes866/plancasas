<?php
    namespace App\lixo;

    Class miLixito {

        public function quienSoy($nombre):void {
            session(['nombre'=>$nombre]);
        }
    }
?>