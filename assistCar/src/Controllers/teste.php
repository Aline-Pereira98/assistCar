<?php 
function logout(){
    session_start();
    session_unset();
    session_destroy();
    header("Location: http://minas:1529/treinamento/Aline/formulario/home.html");
    exit();
}