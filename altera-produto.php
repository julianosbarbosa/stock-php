<?php include("header.php");
include("conecta.php");
include("banco-produto.php");

$id=$_POST['id'];
$nome=$_POST["nome"];
$preco=$_POST["preco"];
$descricao =$_POST['descricao'];
$categoria_id =$_POST['categoria_id'];
if(array_key_exists('usado', $_POST))
{
    $usado = "true";
}else
{
    $usado = "false";
}

?>


<?php if (alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado)): ?>
    <p class="text-success">Produto <?= $nome; ?>, <?= $preco; ?> Alterado com sucesso!</p>
<?php else: $msg = mysqli_error($conexao); ?>
     <p class="text-danger">Produto <?= $nome; ?>, <?= $preco; ?> Não foi alterado <?= $msg?> </p>
<?php endif ?>





<?php include("footer.php");?>