<?php

require '../src/Base.php';

class CrudCategoria extends Base {

    public function insert($nome) {
        $sql = "INSERT INTO `categoria` (`id`, `nome`) VALUES (NULL, '$nome')";
        $salvar = new Base();
        $salvar->preparar($sql);
        echo "Cadastro Salvo";
        parent::desconectar();
    }

    public function listar() {
        parent::listar();
        parent::desconectar();
    }

    public function alterar($id, $nome) {
        $sql = "UPDATE `categoria` SET `nome` = '$nome' WHERE `categoria`.`id` = $id;";
        $alterar = new Base();
        $alterar->preparar($sql);
        echo $id;
        echo $nome;
        echo "Cadastro Alterado";
        parent::desconectar();
    }

    public function deletar($id) {
        $sql = "DELETE FROM `categoria` WHERE `categoria`.`id` = $id;";
        $alterar = new Base();
        $alterar->preparar($sql);
        echo "Cadastro Deletado";
        parent::desconectar();
    }

}
