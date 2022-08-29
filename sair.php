<?php
require 'config/constants.php';

// Destroi todas as seções e direciona para a pagina de login
session_destroy();
header('location: ' . ROOT_URL . 'login.php');
die();