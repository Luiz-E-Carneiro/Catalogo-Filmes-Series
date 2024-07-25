<?php
include_once('./../Components/Header.php');
include_once('./../Components/HeaderPages.php');

?>

<a href="./../../frontend/index.php?page=Home" class="m-4">
    <button class="text-4xl text-white font-bold px-4 py-2 rounded-xl bg-transparent hover:bg-slate-400">
        <span class="material-symbols-outlined text-4xl">arrow_back</span>
    </button>
</a>
<form action="./../actions/save_review.php" method="post" class=" w-fit bg-gradient-to-b from-[#4d759a] from-60% flex flex-col gap-10 py-10 px-20 rounded-lg mt-8">
    <div>
        <h2>Review da obra <?php echo $_POST['titulo'] ?></h2>
        <hr>
    </div>
    <input type="hidden" name="id_obra" value="<?php echo $_POST['id_obra'] ?>">
    <div>
        <label for="nota">
            Nota:
        </label>
        <input type="number" name="nota" min="0" max="10">
    </div>
    <div class="flex items-start">
        <label for="observacoes">
            Observação:
        </label>
        <textarea name="observacoes"></textarea>
    </div>
    <button type="submit" class="bg-[#1052ce] text-white text-lg font-bold py-2 rounded-xl">Submeter Review</button>
</form>


<?php
include_once('./../Components/Footer.php');
?>