<header class="w-full h-20 bg-black191919 flex g-4 justify-between">
    <img src="" alt="Logo">
    <div class="w-fit h-max">
        <a href="index.php?page=Home" class="text-white">Home</a>
        <a href="index.php?page=Watched" class="text-white">Assitidos</a>
        <a href="index.php?page=Favorites" class="text-white">Favoritos</a>
        <a href="index.php?page=Review" class="text-white">Avaliações</a>
        <a href="./../backend/actions/destroy_session.php" class="text-white">Destuir Sessão</a>
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