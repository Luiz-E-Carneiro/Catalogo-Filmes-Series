<?php

require_once("./../db/Database.php");
require_once("./../db/config.php");

$db = new Database();

$tipo = $_POST['tipo'] == "filme" ? 'Filme' : 'Série';

$genres = $db->Select("SELECT * FROM generos");

?>

<form action="./../../backend/actions/add_obra.php" method="post" class="px-4 py-2 flex flex-col gap-2">
    <input type="hidden" name="tipo" value="<?php echo $_POST['tipo']  ?>">
    <div class="w-full">
        <h2 class="text-white font-bold font-xl">Adicionar <?php echo $tipo ?></h2>
        <hr>
    </div>
    <div class="w-full">
        <label for="titulo" class="text-white font-semibold text-lg">
            Titulo da Obra:
        </label>
        <input type="text" name="titulo" placeholder="...">
    </div>
    <div class="w-full">
        <label for="genre" class="text-white font-semibold text-lg">
            Gênero da Obra:
        </label>
        <select name="id_genero">
            <?php foreach ($genres as $genre) : ?>
                <option value="<?php echo $genre['id'] ?>"><?php echo $genre['nome'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="w-full">
        <label for="imagem" class="text-white font-semibold text-lg">
            Imagem da Obra:
        </label>
        <input type="text" name="imagem" placeholder="...">
    </div>
    <div class="w-full">
        <label for="sinopse" class="text-white font-semibold text-lg">
            Sinopse da Obra:
        </label>
        <input type="text" name="sinopse" placeholder="...">
    </div>
    <button type="submit" class="p-2 text-white font-semibold">
        Adicionar Obra
    </button>
</form>