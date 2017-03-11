<?php include("header.php");
include("conecta.php");
include("banco-produto.php");

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


<?php if (insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado)): ?>
    <p class="text-success">Produto <?= $nome; ?>, <?= $preco; ?> Adicionado com sucesso!</p>
<?php else: $msg = mysqli_error($conexao); ?>
     <p class="text-danger">Produto <?= $nome; ?>, <?= $preco; ?> Não foi adicionado <?= $msg?> </p>
<?php endif ?>





<?php include("footer.php");?>