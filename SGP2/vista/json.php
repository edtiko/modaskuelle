<?php
include_once 'clientes.class.php';

$cliente = new Clientes();

echo json_encode($cliente->buscarCliente($_GET['term']));

