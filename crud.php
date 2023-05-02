<?php

    include("conecta.php");
    // Para pegar o texto dos inputs:
    $matricula   = $_POST ["matricula"];
    $nome        = $_POST ["nome"];
    $idade       = $_POST["idade"];

    // Se clicou no botão INSERIR:
    if(isset($_POST["inserir"]))
    {
        $comando = $pdo->prepare("INSERT INTO alunos VALUES($matricula,'$nome',$idade)" );
        $resultado = $comando->execute();
        header("Location: cadastro.html");
    }

    if(isset($_POST["excluir"]))
    {
        $comando = $pdo->prepare("DELETE FROM alunos WHERE matricula=$matricula");
        $resultado = $comando->execute();
        header("Location: cadastro.html");
    }

    if(isset($_POST["alterar"]))
    {
        $comando = $pdo->prepare("UPDATE alunos SET nome='$nome', idade=$idade WHERE matricula=$matricula");
        $resultado = $comando->execute();
        header("Location: cadastro.html");
    }

    if(isset($_POST["listar"]))
    {
        $comando = $pdo->prepare("SELECT * FROM alunos");
        $resultado = $comando->execute();
        header("Location: cadastro.html");

        while($linhas = $comando->fetch())
        {
            $M = $linhas["matricula"];  // Nome da coluna XAMPP
            $N = $linhas["nome"];       // Nome da coluna XAMPP
            $i = $linhas["idade"];      // Nome da coluna XAMPP
            echo("Matricula: $m Nome: $n Idade: $i <br>");
        }
    }



        
    $comando = $pdo->prepare("INSERT INTO alunos VALUES($matricula,'$nome',$idade)" );

    $resultado = $comando->execute();

    // Para voltar no formulário:
    header("Location: cadastro.html");

?>