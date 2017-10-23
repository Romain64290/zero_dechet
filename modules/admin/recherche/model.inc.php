<?php

/***** Dernière modification : 27/10/2016, Romain TALDU	*****/

 class recherche {

    private $con;

    public function __construct(connection $con) {
        $this->con = $con->con;
    }


}