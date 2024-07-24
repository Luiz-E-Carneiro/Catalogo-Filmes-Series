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
?>
<header class="w-full h-20 bg-[#191919] flex g-4 justify-between">
    <img src="" alt="Logo">
    <div class="w-fit h-max">
        <a href="./../../frontend/index.php?page=Home" class="text-white">Home</a>
        <a href="./../../frontend/index.php?page=Watched" class="text-white">Assitidos</a>
        <a href="./../../frontend/index.php?page=Favorites" class="text-white">Favoritos</a>
        <a href="./../../frontend/index.php?page=Review" class="text-white">Avaliações</a>
        <a href="./../backend/actions/destroy_session.php" class="text-white">Destuir Sessão</a>
    </div>
</header>
<body class="bg-[#212121]">

<div class="w-11/12 bg-slate-800 flex gap-10 p-10 mt-8">
    <div class="flex flex-col flex-1 gap-16">
        <h2 class="text-white font-bold text-5xl"><?php echo $data['titulo'] ?></h2>
        <div class="w-full flex gap-x-20">
            <span class="text-white font-bold">Tipo: <?php echo $data['tipo'] == 'filme' ? "Filme" : "Série" ?></span>
            <span class="text-white font-bold">Gênero: <?php echo $data['nome'] ?></span>
        </div>
        <div class="w-full flex flex-col gap-y-8">
            <span class="text-white font-bold">Sinopse:</span>
            <p class="text-white font-bold text-justify"><?php echo $data['sinopse'] ?></p>
        </div>
    </div>
    <div class="flex-2">
        <div class="flex flex-col">
            <button>
                Favoritar
            </button>
            <button>
                Marcar como assistido
            </button>
        </div>
        <img src="<?php echo $data['imagem'] ?>" alt="Imagem da capa da obra <?php echo $data['titulo'] ?>"
        class="w-64 max-h-80">
    </div>
</div>
<?php
include_once('./../Components/Footer.php');
?>