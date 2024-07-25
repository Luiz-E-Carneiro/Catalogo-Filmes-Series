<?php

$db = new Database();

$watched = $db->Select("SELECT o.id, o.titulo, o.imagem, o.tipo FROM obras o WHERE assistida = TRUE");

?>

<div class="w-11/12 h-fit bg-[#073763] flex justify-between items-center p-4 rounded-t-md gap-2 mt-4">
    <span class="text-white text-xl font-bold">Obras - Assistidas</span>
    
</div>

<div class="w-11/12 h-fit bg-[#4d759a] flex flex-col rounded-b-lg overflow-hidden">
    <div class="w-full h-fit flex flex-wrap justify-center gap-x-10 gap-y-5 bg-[#4d759a] py-4">
        <?php
        shuffle($watched);
        foreach ($watched as $obra) {
            $card = new Card($obra);
            $card->renderCard();
        }
        ?>
    </div>
</div>
<script src="interactions/card.js"></script>
<script src="interactions/slider.js"></script>