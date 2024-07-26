<?php

$db = new Database();

$reviews = $db->Select("SELECT * FROM avaliacoes");
// join com obras

?>


<div class="w-11/12 h-fit bg-[#073763] flex justify-between items-center p-4 rounded-t-md gap-2 mt-4">
    <span class="text-white text-xl font-bold">Obras - Avaliações</span>

</div>

<div class="w-11/12 h-fit bg-[#4d759a] flex flex-col rounded-b-lg overflow-hidden">
    <div class="w-full h-fit flex flex-wrap justify-center gap-x-10 gap-y-5 bg-[#4d759a] py-4">

        <?php

        foreach ($reviews as $review) {
            $data = $db->Select("SELECT o.titulo, g.nome, a.nota, a.observacoes 
                                    FROM avaliacoes a JOIN obras o ON  a.id_obra = o.id 
                                    JOIN generos g ON o.id_genero = g.id 
                                    WHERE o.id = :id_obra", [":id_obra" => $review['id_obra']]);

            if (count($data) == 0) {
                echo '<span class="text-white text-xl font-semibold">Não há nenhuma obra assistida</span>';
                return;
            }

        ?>
            <div class='w-2/5 h-fit bg-[#191919] flex flex-col gap-2 px-4 py-3 rounded-xl'>
                <div class="w-full flex items-center border-b-2 border-white">
                    <h2 class="py-2 text-white text-xl font-bold w-full"><?php echo $data[0]["titulo"] ?></h2>
                    <div class="w-fit flex gap-2">
                        <form action="./../backend/Pages/Edit_Review.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $review['id'] ?>">
                            <button class="bg-amber-200 flex justify-center items-center rounded">
                                <span class="material-symbols-outlined text-amber-600">edit</span>
                            </button>
                        </form>
                        <form action="./../backend/actions/delete_review.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $review['id'] ?>">
                            <button class="bg-red-200 flex justify-center items-center rounded">
                                <span class="material-symbols-outlined text-red-600">delete</span>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="w-full px-2 flex gap-2">
                    <h4 class="text-white text-lg font-semibold"> Nota: </h4>
                    <span class="text-white text-lg"><?php echo $data[0]["nota"] ?></span>
                </div>
                <div class="w-full px-2 flex gap-2">
                    <h4 class="text-white text-lg font-semibold"> Observações: </h4>
                    <span class="text-white text-lg"><?php echo $data[0]["observacoes"] ?></span>
                </div>
            </div>
        <?php } ?>

    </div>
</div>