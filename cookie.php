<?php
session_start();

if (isset($_COOKIE['nombre'])){
    setcookie('nombre', $_COOKIE['nombre']+1);
    echo "bonjour je t'ai vu ".$_COOKIE['nombre'];
}else{
    setcookie('nombre', 0);
    echo "bonjour je t'ai vu ".$_COOKIE['nombre'];
}
