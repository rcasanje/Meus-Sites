<?php
if(!isset($_SESSION)) session_start();
if(!isset($_SESSION['User']['idkey'])) $_SESSION['User']['idkey'] = "nada";
if(!isset($_SESSION['User']['apelido'])) $_SESSION['User']['apelido'] = "nada";
if(!isset($_SESSION['User']['permissao'])) $_SESSION['User']['permissao'] = 0;
if(!isset($_SESSION['Server']['erro'])) $_SESSION['Server']['erro'] = 0;
session_write_close();
?>