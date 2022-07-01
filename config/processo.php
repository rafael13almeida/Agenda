<?php

session_start();

include_once("conexao.php");
include_once("url.php");

$data = $_POST;

if (!empty($data)) {

    if($data["type"] === "create") {
        
        $nome = $data["nome"];
        $telefone = $data["telefone"];
        $email = $data["email"];
        $observacoes = $data["observacoes"];

        $query = "INSERT INTO contatos (nome, telefone, email, observacoes) VALUES (:nome, :telefone, :email, :observacoes)";
        $stmt = $conn->prepare($query);

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":telefone", $telefone);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":observacoes", $observacoes);

        try {

            $stmt->execute();
            $_SESSION["msg"] = "Novo contato adicionado !";
        
        } catch(PDOException $e) {
            $error = $e->getMessage();
            echo "Erro: $error";
        }

    } elseif($data["type"] === "edit") {

        $nome = $data["nome"];
        $telefone = $data["telefone"];
        $email = $data["email"];
        $observacoes = $data["observacoes"];
        $id = $data["id"];

        $query = "UPDATE contatos 
                  SET nome = :nome, telefone = :telefone, email = :email, observacoes = :observacoes 
                  WHERE id = :id";
        
        $stmt = $conn->prepare($query);

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":telefone", $telefone);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":observacoes", $observacoes);
        $stmt->bindParam(":id", $id);

        try {

            $stmt->execute();
            $_SESSION["msg"] = "Seu contato foi atualizado !";
        
        } catch(PDOException $e) {
            $error = $e->getMessage();
            echo "Erro: $error";
        }
        
    } elseif($data["type"] === "delete") {
        $id = $data["id"];

        $query = "DELETE FROM contatos WHERE id = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        
        try {

            $stmt->execute();
            $_SESSION["msg"] = "Contato Removido !";
        
        } catch(PDOException $e) {
            $error = $e->getMessage();
            echo "Erro: $error";
        }
    }

    header("Location:" . $BASE_URL . "../index.php");

} else {
    $id;

    if (!empty($_GET)) {
        $id = $_GET["id"];
    }

    if (!empty($id)) {

        $query = "SELECT * FROM contatos WHERE id = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $contato = $stmt->fetch();
    } else {

        $contatos = [];

        $query = "SELECT * FROM contatos";

        $stmt = $conn->prepare($query);
        $stmt->execute();

        $contatos = $stmt->fetchAll();
    }
}

// Fechando conexão; 
$conn = null;