<?php

require_once("./../db/config.php");
require_once("./../db/Database.php");

$db = new Database();

$obra = $db->Select("SELECT o.id, o.titulo, o.imagem, o.sinopse, o.tipo, o.id_genero, g.id, g.nome  
                    FROM obras o 
                    JOIN generos g ON g.id = o.id_genero
                    WHERE o.id = :id", [
    ":id" => $_POST['id']
]);

$genres = $db->Select("SELECT * FROM generos");


include_once('./../Components/Header.php');
include_once('./../Components/HeaderPages.php');

?>
<a href="./../../frontend/index.php?page=Home" class="m-4">
    <button class="text-4xl text-white font-bold px-4 py-2 rounded-xl bg-transparent hover:bg-slate-400">
        <span class="material-symbols-outlined text-4xl">arrow_back</span>
    </button>
</a>
<form action="./../actions/save_edit_obra.php" method="post" class="p-4 flex flex-col gap-2">

    <div>
        <label for="titulo">Título</label>
        <input type="text" name="titulo" value="<?php echo $obra[0]['titulo'] ?>">
        <input type="hidden" name="id" value="<?php echo $obra[0]['id'] ?>">
    </div>
    <div>
        <label for="imagem">URL Imagem</label>
        <input type="text" name="imagem" value="<?php echo $obra[0]['imagem'] ?>">
    </div>
    <div>
        <label for="sinopse">Sinopse</label>
        <input type="text" name="sinopse" value="<?php echo $obra[0]['sinopse'] ?>">
    </div>
    <select name="tipo">
        <?php
        if ($obra[0]['tipo'] == 'filme') {
            echo "<option value='filme' selected>Filme</option>";
            echo "<option value='serie'>Série</option>";
        } else {
            echo "<option value='serie' selected>Série</option>";
            echo "<option value='filme'>Filme</option>";
        }
        ?>
    </select>
    <select name="id_genero">
        <?php foreach ($genres as $genre) : ?>
                <option value="<?php echo $genre['id'] ?>" <?php echo $obra[0]['id_genero'] == $genre['id'] ? 'selected' : '' ?> > <?php echo $genre['nome'] ?></option>
        <?php endforeach ?>
    </select>
</form>

<?php 
include_once('./../Components/Footer.php');
?>