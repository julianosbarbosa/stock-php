<?php include("header.php");
 include("conecta.php");
 include("banco-produto.php"); ?>

 <?php
 if(array_key_exists("removido", $_GET) && $_GET["removido"]=="true"){
 ?>  
    <p class="alert-success">Produto removido com sucesso</p>
 <?php   
 }
 ?>

<table class="table table-striped table-bordered">
    <?php
    $produtos =listaProdutos($conexao);
    foreach($produtos as $produto) :
        ?>
        <tr>
            <td><?= $produto['nome'] ?></td>
            <td><?= $produto['preco'] ?></td>
            <td><?= substr($produto['descricao'], 0, 80) ?></td>
            <td><?= $produto['categoria_nome'] ?></td>
            <td>
               <form action="remove-produto.php" method="post">
                <input type="hidden" name="id" value="<?=$produto['id']?>">
                <button class="btn btn-danger">remover</button>
               </form>
            </td>
            <td>
                <a class="btn btn-primary" href="produto-altera-formulario.php?id=<?=$produto['id']?>">alterar</a>
            </td>
        </tr>
    <?php
    endforeach
    ?>
</table>        

<?php include("footer.php");?>
      