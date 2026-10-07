<?php

$conexao = mysqli_connect(
    "localhost:3307",
    "root",
    "root",
    "biblioteca"
);
if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_error());
}