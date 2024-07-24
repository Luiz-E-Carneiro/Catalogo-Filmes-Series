<?php

    $db = new Database();

    $genres = $db->Select("SELECT * FROM generos");
    
    
    if($_SESSION['conditions']['genre'] > 0 AND $_SESSION['conditions']['genre'] <= count($genres)){
        $query = "SELECT o.id, o.titulo, o.imagem, o.tipo, g.nome 
                FROM obras o 
                JOIN generos g ON o.id_genero = g.id
                WHERE o.tipo = :tipo AND o.id_genero = :id_genero";
        $binds = [
                ":tipo" => $_SESSION['conditions']['type'],
                ":id_genero" => $_SESSION['conditions']['genre']
                ];
    }else {
        $query = "SELECT o.id, o.titulo, o.imagem, o.tipo, g.nome 
                FROM obras o 
                JOIN generos g ON o.id_genero = g.id
                WHERE o.tipo = :tipo";
        $binds = [
            ":tipo" => $_SESSION['conditions']['type']
            ];
    }

    $obras = $db->Select($query,$binds);
?>

<div class="relative w-full p-4 flex flex-col">
    <h2 class="text-white font-bold text-2xl py-2">Escolha pelo gênero</h2>
    <button id="prev" class="absolute z-10 left-0 top-1/2 transform -translate-y-1/2 bg-[#1052ce] text-white px-6 py-4 rounded"><</button>
    <div class="overflow-hidden">
        <div id="scrollContainer" class="flex w-full overflow-hidden space-x-4 transition-transform select-none">
            <form action="./../backend/actions/save_conditions.php" method="POST" class="relative flex-shrink-0 w-1/4 bg-black text-white text-center cursor-pointer hover:border-4 hover:border-[#1052ce]">
                <input type="hidden" name="genre_id" value="0">
                <img src="https://musicaecinema.com.br/wp-content/uploads/2024/01/filmes-mais-assistidos-streaming.webp" alt="" class="w-full h-full max-h-full object-cover" draggable="false">
                <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 p-2 text-left text-white font-bold text-lg tracking-wider">Todos</div>
            </form>
            <?php foreach ($genres as $genre) : ?>
                <form action="./../backend/actions/save_conditions.php" method="POST" class="relative flex-shrink-0 w-1/4 bg-black text-white text-center cursor-pointer hover:border-4 hover:border-[#1052ce]">
                    <input type="hidden" name="genre_id" value="<?= $genre['id'] ?>">
                    <img src="<?= $genre['imagem'] ?>" alt="" class="w-full h-full max-h-full object-cover" draggable="false">
                    <div class="absolute bottom-0 left-0 bg-black bg-opacity-75 p-2 text-left text-white font-bold text-lg tracking-wider"><?= $genre['nome'] ?></div>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
    <button id="next" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-[#1052ce] text-white px-6 py-4 rounded">></button>
</div>

<div class="w-11/12 h-fit bg-[#073763] flex justify-between items-center p-4  rounded-t-md">
    <div class="flex items-center gap-x-4">
        <div class="flex">
        <form action="./../backend/actions/save_conditions.php" method="post" class="w-fit h-fit">
                <input type="hidden" name="type" value="filme">
                <button type="submit" class="<?php echo $_SESSION['conditions']['type'] == 'filme' ? 'bg-[#1052ce]' : 'bg-slate-500' ?> rounded-s-lg border-r-2 border-[#073763] text-white font-bold text-2xl p-2">Filmes</button>
            </form>
            <form action="./../backend/actions/save_conditions.php" method="post" class="w-fit h-fit">
                <input type="hidden" name="type" value="serie">
                <button type="submit" class="<?php echo $_SESSION['conditions']['type'] == 'serie' ? 'bg-[#1052ce]' : 'bg-slate-500' ?> rounded-e-lg border-l-2 border-[#073763] text-white font-bold text-2xl p-2">Séries</button>
            </form>
        </div>
    </div>
    <div class="flex gap-4">
        <button class="text-2xl text-white font-bold bg-[#1052ce] p-2 rounded-xl">
            + Adicionar <?php echo $_SESSION['conditions']['type'] == "filme" ? "Filme" : "Série" ?>
        </button>
        <button class="text-2xl text-white font-bold bg-[#1052ce] p-2 rounded-xl">
            + Adicionar Gênero
        </button>
    </div>
</div>

<div class="w-11/12 h-fit bg-[#4d759a] flex flex-col rounded-b-lg overflow-hidden">
    <div class="p-4">
        <span class="text-white text-xl">Novidades - <?php echo $_SESSION['conditions']['type'] == 'filme' ? 'Filmes' : "Séries"; ?> - <?php echo $_SESSION['conditions']['genre'] - 1 >= 0? $genres[$_SESSION['conditions']['genre'] - 1]['nome'] : "Todos"?> </span>
    </div>
    <div class="w-full h-fit flex flex-wrap justify-center gap-x-10 gap-y-5 bg-[#4d759a] pb-4">
        <?php
            shuffle($obras);
            foreach ($obras as $obra) {
                $card = new Card($obra);
                $card->renderCard();
            }
        ?>
    </div>
</div>
<script src="interactions/card.js"></script>
<script src="interactions/slider.js"></script>