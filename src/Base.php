<?php

require '../src/Config.php';

class Base extends Config {

    private $ObjectPDO;

    function __construct($ObjectPDO = null) {
        $this->ObjectPDO = $ObjectPDO;

        parent::__construct();
        return $this->conecta();
    }

    protected function conecta() {
        try {
            $ObjectPDO = new Config();
            $ObjectPDO->exec("set names utf8");
            $ObjectPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "ERROR: {$e->getMessage()}";
        }

        return $this->ObjectPDO;
    }

    function desconectar() {
        $this->ObjectPDO = null;
    }

    function listar() {
        $ObjectPDO = new Base();
        $sql = 'SELECT * FROM categoria';
        $sth = $ObjectPDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array());
        $rows = $sth->fetchAll();

        foreach ($rows as $row) {
            echo "id: " . $row["id"] . " | Nome: " . $row["nome"] . " | " . '<a href="index.php?editar&id=' . $row["id"] . '&nome=' . $row["nome"] . '">Editar</a>' . " " . '<a href="index.php?excluir&id=' . $row["id"] . '">Excluir</a>' . "<br>";
        }
        $ObjectPDO->desconectar();
    }

    function preparar($sql) {
        $this->sql = $sql;
        $ObjectPDO = new Base();
        $sth = $ObjectPDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array());
    }

}
