<header class="w-full h-20 bg-[#191919] flex g-4 justify-between items-center px-4">
    <img src="" alt="Logo">
    <div class="w-fit h-max flex gap-8">
        <a href="index.php?page=Home" class="text-white font-bold text-xl">Home</a>
        <a href="index.php?page=Watched" class="text-white font-bold text-xl">Assitidos</a>
        <a href="index.php?page=Favorites" class="text-white font-bold text-xl">Favoritos</a>
        <a href="index.php?page=Review" class="text-white font-bold text-xl">Avaliações</a>
        <a href="./../backend/actions/destroy_session.php" class="text-white font-bold text-xl">Destuir Sessão</a>
    </div>
    <style>
        .description {
            visibility: hidden;
            transition: .2s ease-in-out;
            background: rgb(0, 0, 0);
            background: linear-gradient(0deg, rgba(0, 0, 0, 1) 42%, rgba(148, 187, 233, 0) 100%);
            opacity: .2;
        }
        
        .card:hover .description {
            visibility: visible;
            opacity: 1;
            
        }
    </style>
</header>