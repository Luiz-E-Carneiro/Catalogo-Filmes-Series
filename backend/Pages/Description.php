<?php

if (!isset($_POST['id'])) {
    header("location:./../../frontend/index.php?erro=2");
    die();
}

require_once("./../db/Database.php");
require_once("./../db/config.php");

$db = new Database();

$query = "SELECT o.id, o.titulo, o.imagem, o.sinopse ,o.tipo, g.nome 
            FROM obras o JOIN generos g ON o.id_genero = g.id WHERE o.id = :id";
$binds = [
    ":id" => $_POST["id"]
];

$response = $db->Select($query, $binds);
$data = $response[0];
?>

<?php
include_once('./../Components/Header.php');
include_once('./../Components/HeaderBody.php');
?>
<div class="w-10/12 bg-slate-800 flex grow">
    <div class="flex flex-col flex-1">
        <h2 class="text-white font-bold"><?php echo $data['titulo']; ?></h2>
        <div class="w-full flex">
            <span class="text-white font-bold">Tipo: <?php echo $data['tipo']; ?></span>
            <span class="text-white font-bold">Gênero: <?php echo $data['nome']; ?></span>
        </div>
        <div class="w-full flex flex-col">
            <span class="text-white font-bold">Sinopse:</span>
            <p class="text-white font-bold text-justify"><?php echo $data['sinopse']; ?></p>
        </div>
    </div>
    <div class="flex-2">
        <img src="<?php echo $data['imagem']; ?>" alt="Imagem da capa da obra <?php echo $data['titulo']; ?>"
        class="w-64 max-h-80">
    </div>
</div>
<?php
include_once('./../Components/Footer.php');
?>