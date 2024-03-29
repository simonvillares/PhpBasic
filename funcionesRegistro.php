<?php

/*
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/
define('LOGIN_MIN', 3);
define('LOGIN_MAX', 10);
define('PASS_MIN', 5);
define('PASS_MAX', 10);
/**
* enRango
* Indica si un valor está en un rango determinado [inicio,fin]
* @param inicio
* @param fin
* @param valor
* @return true si valor esta en el rango [inicio, fin], sino false
*/
function enRango($inicio, $fin, $valor) {
    return ($valor>=$inicio && $valor<=$fin);
}

/**
* validarLogin
* La longitud debe estar entre LOGIN_MIN y LOGIN_MAX
* y debe contener solo letras y números (patrón)
* @param login
* @return bool
*/
function validarLogin($login) {
    $patron = "/^[[:alnum:]]+$/";
    $longitud = strlen($login);
    return (enRango(LOGIN_MIN, LOGIN_MAX, $longitud)
            && preg_match($patron, $login));
}