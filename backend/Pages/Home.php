<?php

    $db = new Database();

    $obras = $db->Select("SELECT * FROM generos");

?>


<div class="w-11/12 h-fit bg-slate-600 flex justify-between">
    <div class="flex items-center">
        <span>Tipo:</span>
        <div class="flex">
            <button class="bg-slate-300 rounded-s-lg border-r-2 border-black">Filmes</button>
            <button class="bg-slate-300 rounded-e-lg border-l-2 border-black">Séries</button>
        </div>
    </div>
    <div class="">
        <span>Gênero</span>
        <select name="" id="">
            <option value="" selected>Todos</option>
        </select>
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

<div class="relative w-full p-10">
    <button id="prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-blue-500 text-white px-4 py-2 rounded">Prev</button>
    <div class="overflow-hidden">
        <div id="scrollContainer" class="flex w-full overflow-hidden space-x-4 transition-transform select-none">
            <?php
                foreach ($obras as $obra) {
                    echo "<div class='relative flex-shrink-0 w-1/4 bg-red-400 text-white text-center hover:border-4 hover:border-red-900 box-border'>";
                        echo "<img src='$obra[imagem]' alt='' class='w-full h-full max-h-full object-cover' draggable='false'>";
                        echo "<div class='absolute bottom-0 left-0 bg-black bg-opacity-50 p-2 text-left'>" . $obra['nome'] . "</div>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
    <button id="next" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-blue-500 text-white px-4 py-2 rounded">Next</button>
</div>


<div class="mt-4 w-11/12 h-fit bg-slate-200 flex flex-col">
    <h2>Filmes (???)</h2>
    <div class="w-full h-fit">
        <h3>Novidades (não assistidos)</h3>
    </div>
    <div class="w-full h-fit">
        <h3>Assitidos (Vem depois dos que ainda não foram)</h3>
    </div>
</div>
<script src="interactions/slider.js"></script>