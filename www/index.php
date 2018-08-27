<?php
//require './Base.php';
require '../src/CrudCategoria.php';

?>
<hr>
<h1>Trabalho PHP OO</h1>
<hr>
<a href="index.php">Home</a>

<h2>Nova Categoria</h2>
<form method="get" action="#">
    <input type="hidden" name="id" value="<?php if (isset($_GET['id'])) {echo $_GET['id'];} else {echo 0;}?>"
           
    <label>Nome:</label>
    <input type="text" name="nome" placeholder="Digite o nome" value="<?php if (isset($_GET['nome'])) {echo $_GET['nome'];}?>"/>
    <br>
    <br>
    <input name="cadastrar" type="submit" value="Salvar"/>
</form>

<hr>
<hr>
<h2>Lista de Categorias</h2>
<button type="button"><a href="index.php?listar"  style="text-decoration:none">Listar</a></button>
<h4>Atualize sua lista após cadastrar uma nova Categoria</h4>

<?php
//**********Instancia da Classe para Realizar o Crud***********************\\
$categoria = new CrudCategoria();

//**********************Cadastrar ou Alterar Categoria**********************\\
//*******************SE ID=0 Cadastar
if (isset($_GET['cadastrar']) and ( $_GET['id'] == 0)) {
    $nome = $_GET['nome'];
    $categoria->insert($nome);
}
//*******************SE O ID É > 0 Alterar
elseif (isset($_GET['cadastrar'])and ( $_GET['id'] > 0)) {
    $id = $_GET['id'];
    $nome = $_GET['nome'];
    $categoria->alterar($id, $nome);
}


//**********************Listar Categorias**********************\\                   
if (isset($_GET['listar'])) {
    $categoria->listar();
}

//**********************Excluir Categorias**********************\\
if (isset($_GET['excluir'])) {
    $id = $_GET['id'];
    $categoria->deletar($id);
}