<?php include("header.php");
include("conecta.php");
include ("banco-cotegoria.php");

$categorias=listaCategorias($conexao);
?>

<h1>Formulario de produto</h1>
    <form action="adiciona-produto.php" method="post">
    <table class="table">
        <tr>
            <td>Nome:</td>
            <td><input class="form-control" type="text" name="nome"></td>
        </tr>
        <tr>
            <td>Preço:</td>
            <td><input class="form-control" type="text" name="preco"></td>
        </tr>
        <tr>
            <td>Descrição:</td>
            <td><textarea class="form-control" name="descricao"></textarea></td>
        </tr>
        <tr>
            <td>Categorias:</td>
            <td>
            <select name="categoria_id" class="form-control">
            <?php foreach($categorias as $categoria):  ?>
                <option value="<?=$categoria['id']?>">
                <?=$categoria['nome']?><br/>
                </option>
            <?php endforeach ?>
            </select>
            </td>
        </tr>
           <tr>
            
            <td><input type="checkbox" value="true" name="usado"> Usado </td>
        </tr>         
        <tr>
       
            <td><input class="btn btn-primary" type="submit" value="Cadastrar"></td>
        </tr>
    </table>
    </form>
<?php include("footer.php");?>