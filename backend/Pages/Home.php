<?php

    $db = new Database();

    $genres = $db->Select("SELECT * FROM generos");
    
    // $news = $db->Select(
    // "   SELECT o.id, o.nome, o.imagem, g.nome 
    //     FROM obras o 
    //     JOIN generos g ON o.id_genero = g.id 
    //     WHERE o.assistida = FALSE");
    
    // $watched = $db->Select("SELECT * FROM obras WHERE assistida = TRUE");
    
?>


<div class="relative w-full p-4 flex flex-col">
    <h2>Escolha pelo gênero</h2>
    <button id="prev" class="absolute z-10 left-0 top-1/2 transform -translate-y-1/2 bg-blue-500 text-white px-4 py-2 rounded"><</button>
    <div class="overflow-hidden">
        <div id="scrollContainer" class="flex w-full overflow-hidden space-x-4 transition-transform select-none">
        <div class='relative flex-shrink-0 w-1/4 bg-red-400 text-white text-center cursor-pointer     hover:border-4 hover:border-red-900 box-border'>
        <!-- https://www.onoticiado.com.br/wp-content/uploads/2022/11/streaming-lancamentos-novembro.jpg -->
                        <img src='https://musicaecinema.com.br/wp-content/uploads/2024/01/filmes-mais-assistidos-streaming.webp' alt='' class='w-full h-full max-h-full object-cover' draggable='false'>
                        <div class='absolute bottom-0 left-0 bg-black bg-opacity-50 p-2 text-left'> Todos </div>
                    </div>
            <?php
                foreach ($genres as $genre) {
                    echo "<div class='relative flex-shrink-0 w-1/4 bg-red-400 text-white text-center cursor-pointer     hover:border-4 hover:border-red-900 box-border'>";
                    echo "<img src='$genre[imagem]' alt='' class='w-full h-full max-h-full object-cover' draggable='false'>";
                    echo "<div class='absolute bottom-0 left-0 bg-black bg-opacity-50 p-2 text-left'>" . $genre['nome'] . "</div>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
    <button id="next" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-blue-500 text-white px-4 py-2 rounded">></button>
</div>

<div class="w-11/12 h-fit bg-slate-600 flex justify-between">
    <div class="flex items-center">
        <span>Tipo:</span>
        <div class="flex">
            <button class="bg-slate-300 rounded-s-lg border-r-2 border-black">Filmes</button>
            <button class="bg-slate-300 rounded-e-lg border-l-2 border-black">Séries</button>
        </div>
    </div>
    <div class="">
        <button>
            Adicionar Filme/Série
        </button>
        <button>
            Adicionar Gênero
        </button>
    </div>
</div>

<div class="w-11/12 h-fit bg-slate-300 flex flex-col">
    <span>?Filmes? - Novidades</span>
    <div class="w-full h-fit bg-slate-200">
        

    </div>
    <div class="w-full h-fit">
        <h3>Assitidos (Vem depois dos que ainda não foram)</h3>
    </div>
</div>
<script src="interactions/slider.js"></script>