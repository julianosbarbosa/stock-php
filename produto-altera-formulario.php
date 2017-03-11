<?php include("header.php");
include("conecta.php");
include ("banco-cotegoria.php");
include ("banco-produto.php");
$id = $_GET['id'];
$produto = buscaProduto($conexao, $id);
$categorias=listaCategorias($conexao);
$usado = $produto['usado'] ? "checked='checked'":"";
?>

<h1>Alterando produto</h1>
    <form action="altera-produto.php" method="post">
    <input type="hidden" name="id" value="<?=$produto['id']?>">
    <table class="table">
        <tr>
            <td>Nome:</td>
            <td><input class="form-control" type="text" name="nome" value="<?=$produto['nome']?>"></td>
        </tr>
        <tr>
            <td>Preço:</td>
            <td><input class="form-control" type="text" name="preco" value="<?=$produto['preco']?>"></td>
        </tr>
        <tr>
            <td>Descrição:</td>
            <td><textarea class="form-control" name="descricao"><?=$produto['descricao']?></textarea></td>
        </tr>
        <tr>
            <td>Categorias:</td>
            <td>
            <select name="categoria_id" class="form-control">
            <?php foreach($categorias as $categoria):  
            $essaEhACategoria=$produto['categoria_id'] ==$categoria['id'];
            $selecao=$essaEhACategoria ? "selected='selected'":"";
            ?>
                <option value="<?=$categoria['id']?>" <?=$selecao?>>
                <?=$categoria['nome']?><br/>
                </option>
            <?php endforeach ?>
            </select>
            </td>
        </tr>
           <tr>
            
            <td><input type="checkbox"<?=$usado?> value="true" name="usado"> Usado </td>
        </tr>         
        <tr>
       
            <td><input class="btn btn-primary" type="submit" value="Alterar"></td>
        </tr>
    </table>
    </form>
<?php include("footer.php");?>