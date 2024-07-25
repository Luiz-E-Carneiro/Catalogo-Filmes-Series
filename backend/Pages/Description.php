<?php

if (!isset($_POST['id'])) {
    header("location:./../../frontend/index.php?erro=2");
    die();
}

require_once("./../db/Database.php");
require_once("./../db/config.php");

$db = new Database();

$query = "SELECT o.id, o.titulo, o.imagem, o.sinopse ,o.tipo, o.assistida, g.nome 
            FROM obras o JOIN generos g ON o.id_genero = g.id WHERE o.id = :id";
$binds = [
    ":id" => $_POST["id"]
];

$response = $db->Select($query, $binds);
$data = $response[0];


$query2 = "SELECT COUNT(*) as resposta FROM avaliacoes WHERE id_obra = :id";

$resposta_avaliacao = $db->Select($query2, $binds);


include_once('./../Components/Header.php');
include_once('./../Components/HeaderPages.php');
?>
<div class="relative w-11/12 bg-gradient-to-r from-[#4d759a] to-90% flex gap-10 p-10 rounded-lg mt-4">
    <a href="./../../frontend/index.php?page=Home" class="absolute top-0 right-1">
        <button class="text-4xl text-white font-bold px-4 py-2 rounded-xl bg-transparent hover:bg-gradient-to-l from-[#ccd0c8] to-90%">
            <span class="material-symbols-outlined text-4xl">arrow_back</span>
        </button>
    </a>
    <div class="flex flex-col w-2/3 gap-12">
        <h2 class="text-white font-bold text-5xl"><?php echo $data['titulo'] ?></h2>
        <div class="w-full flex gap-x-20">
            <span class="text-white font-bold">Tipo: <?php echo $data['tipo'] == 'filme' ? "Filme" : "Série" ?></span>
            <span class="text-white font-bold">Gênero: <?php echo $data['nome'] ?></span>
        </div>
        <div class="w-full flex flex-col gap-y-4">
            <h4 class="text-white font-bold text-2xl">Sinopse:</h4>
            <p class="text-white font-semibold text-justify"><?php echo $data['sinopse'] ?></p>
        </div>
        <div class="flex flex-col gap-4">

            <?php if (!$resposta_avaliacao[0]['resposta']) { ?>
                <form action="./Review.php" method="post">
                    <input type="hidden" name="id_obra" value=<?php echo $data['id'] ?>">
                    <input type="hidden" name="titulo" value="<?php echo $data['titulo'] ?>">
                    <button type="submit" class="text-2xl text-white font-bold bg-[#1052ce] p-2 rounded-xl">
                        <span>Avaliar Obra</span>
                        <span class="material-symbols-outlined">rate_review</span>
                    </button>
                </form>
            <?php } else { ?>
                <h4 class="text-white font-bold text-4xl">
                    Avaliação
                </h4>
                <hr>

                <?php $review = $db->Select("SELECT nota, observacoes FROM avaliacoes WHERE id_obra = :id_obra", [":id_obra" => $data['id']]) ?>
                <span class="text-white font-bold text-2xl">Nota: <?php echo $review[0]['nota'] ?></span>
                <div class="w-full flex items-end gap-2">
                    <h4 class="text-white font-bold text-2xl">Observação:</h4>
                    <p class="text-white text-justify"><?php echo $review[0]['observacoes'] ?></p>
                </div>
            <?php } ?>


        </div>
    </div>
    <div class="grow flex flex-col justify-center items-center gap-4">
        <img src="<?php echo $data['imagem'] ?>" alt="Imagem da capa da obra <?php echo $data['titulo'] ?>" class="w-64 max-h-80">
        <div class="flex flex-col gap-4 items-center">
            <!-- <button class="bg-amber-400 p-2 rounded-lg font-bold text-lg text-amber-700">
                    Favoritar
                </button> -->

            <form action="./../actions/save_watched.php" method="post">
                <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                <?php
                if (!$data['assistida']) {
                    echo '<input type="hidden" name="condition" value="assistido">';
                } else {
                    echo '<input type="hidden" name="condition" value="desassistir">';
                }
                ?>
                <button type="submit" class="bg-slate-400 p-2 rounded-lg font-bold text-lg text-slate-700 flex items-center gap-2">
                    <?php
                    if (!$data['assistida']) {
                        echo '<span class="material-symbols-outlined">visibility_off</span>';
                        echo '<span>Marcar como Assitido</span>';
                    } else {
                        echo '<span class="material-symbols-outlined">visibility</span>';
                        echo '<span>Desmarcar como assitido</span>';
                    }
                    ?>
                </button>
            </form>

            <form action="./../Edit.php" method="post">
                <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                <button type="submit" class="bg-cyan-500 p-2 rounded-lg font-bold text-lg text-slate-700 flex items-center gap-2">
                    <span class="material-symbols-outlined">edit</span>
                    <span class="text-slate-700">Editar Obra</span>
                </button>
            </form>

        </div>
    </div>
</div>
<?php
include_once('./../Components/Footer.php');
?>