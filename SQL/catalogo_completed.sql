-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2024 at 03:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catalogo`
--

-- --------------------------------------------------------

--
-- Table structure for table `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `id` int(11) NOT NULL,
  `id_obra` int(11) DEFAULT NULL,
  `nota` int(11) DEFAULT NULL CHECK (`nota` >= 0 and `nota` <= 10),
  `observacoes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `generos`
--

CREATE TABLE `generos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `imagem` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `generos`
--

INSERT INTO `generos` (`id`, `nome`, `imagem`) VALUES
(1, 'Romance', 'https://br.web.img2.acsta.net/r_654_368/newsv7/20/06/12/18/16/2912051.jpg'),
(2, 'Ação', 'https://grupoahora.net.br/wp-content/uploads/2022/05/Nobody-2021-movie-reviews.jpeg'),
(3, 'Comédia', 'https://tm.ibxk.com.br/2022/10/05/0519331160333.jpg?ims=1200x675'),
(4, 'Ficção Científica', 'https://cinepop.com.br/wp-content/uploads/2015/12/filmesespaciais_1.jpg'),
(5, 'Terror', 'https://img.odcdn.com.br/wp-content/uploads/2023/04/FQEVLXR01X2E1634600097644.jpg'),
(6, 'Suspense', 'https://www.fatosdesconhecidos.com.br/wp-content/uploads/2024/07/filme-de-suspense-capa.jpg'),
(7, 'Aventura', 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiD1qHhUhlN719Jf0eJSxSSVcwISpMUCzl38Di267gI7Pm3JXSEYoYZTDAavQKHVBRyNsqrUFlBkCin_24u1Xq-Ot_5jmk4waaNmFKaV_utUvaciUb7ad13ScFE3cbMKXp-Q799_k1hvpPkNMmBpQAq-RBLB7P35DlKWRKbJ2YSn4JZhrGNemev65I/s1920/indianajones.jpg'),
(8, 'Infantil', 'https://lunetas.com.br/wp-content/uploads/2023/07/5-brincadeiras-inspiradas-em-filmes-para-fazer-com-as-criancas-portal-lunetas.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `obras`
--

CREATE TABLE `obras` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `imagem` varchar(1000) NOT NULL,
  `sinopse` text DEFAULT NULL,
  `tipo` enum('filme','serie') NOT NULL,
  `id_genero` int(11) DEFAULT NULL,
  `assistida` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obras`
--

INSERT INTO `obras` (`id`, `nome`, `imagem`, `sinopse`, `tipo`, `id_genero`, `assistida`) VALUES
(1, 'Cinquenta Tons de Cinza', 'https://br.web.img2.acsta.net/pictures/14/11/14/13/47/211678.jpg', 'A estudante de literatura Anastasia Steele, de 21 anos, entrevista o jovem bilionário Christian Grey, como um favor a sua colega de quarto Kate Kavanagh. Ela vê nele um homem atraente e brilhante, e ele fica igualmente fascinado por ela. Embora seja sexualmente inexperiente, Anastasia mergulha de cabeça nessa relação e descobre os prazeres do sadomasoquismo, tornando-se o objeto de submissão do enigmático Grey.', 'filme', 1, 0),
(2, 'Uma Ideia de Você', 'https://media.filmelier.com/tit/ObQWTl/poster/uma-ideia-de-voce_PDghFFU.jpeg', 'Solène, uma mãe solteira de 40 anos embarca em um romance inesperado com Hayes Campbell, o vocalista de 24 anos da August Moon, a boy band mais popular do planeta.', 'filme', 1, 0),
(3, 'Um dia', 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcR9b0dJ4vwEkec1DPgIDRCYIxBtc49gM4JCXEa-O0oz56kGTONK', 'Em Um Dia, Emma (Anne Hathaway) e Dexter (Jim Sturgess) se conheceram na faculdade, em 15 de julho. Essa data serve de base para acompanhar a vida deles ao longo de 20 anos. Nesse período, Emma enfrenta dificuldades para ser bem sucedida na carreira, enquanto Dexter consegue sucesso fácil, tanto no trabalho quanto com as mulheres. Mesmo passando por diversas pessoas, a vida de ambos continua sempre, de alguma forma, interligada.', 'filme', 1, 0),
(4, '365 DNI', 'https://br.web.img3.acsta.net/c_310_420/pictures/20/03/02/09/29/5096195.jpg', 'Laura é uma diretora de vendas que embarca em uma viagem à Sicília para salvar seu relacionamento. Lá, ela conhece Massimo, um membro da máfia siciliana, que a sequestra e lhe dá 365 dias para se apaixonar por ele.', 'filme', 1, 0),
(5, 'Diário de uma Paixão', 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcQItcIG5CYEvd9Q8n9PYgDgN793r3Xm8rRi-DtogVX9sbZda1wg', 'Na década de 1940, na Carolina do Sul, o operário Noah Calhoun e a rica Allie se apaixonam desesperadamente, mas os pais da jovem não aprovam o namoro. Noah é enviado para lutar na Segunda Guerra Mundial, e parece ser o fim do romance. Enquanto isso, Allie se envolve com outro homem. No entanto, a paixão deles ainda não acabou quando Noah retorna para a pequena cidade anos mais tarde, próximo ao casamento de Allie.', 'filme', 1, 0),
(6, 'Como Eu Era Antes de Você', 'https://br.web.img3.acsta.net/c_310_420/pictures/16/02/03/19/11/303307.jpg', 'Em Como Eu Era Antes de Você, o rico e bem sucedido Will (Sam Claflin) leva uma vida repleta de conquistas, viagens e esportes radicais até ser atingido por uma moto. O acidente o torna tetraplégico, obrigando-o a permanecer em uma cadeira de rodas. A situação o torna depressivo e extremamente cínico, para a preocupação de seus pais (Janet McTeer e Charles Dance). É neste contexto que Louisa Clark (Emilia Clarke) é contratada para cuidar de Will. De origem modesta, com dificuldades financeiras e sem grandes aspirações na vida, ela faz o possível para melhorar o estado de espírito de Will e, aos poucos, acaba se envolvendo com ele.', 'filme', 1, 0),
(7, 'Business Proposal', 'https://m.media-amazon.com/images/M/MV5BNjlhMDc5NDMtZGY2Mi00ZTMxLTk0Y2ItN2VjZDQ1ZmRiZGQ2XkEyXkFqcGdeQXVyMTMzODk3NDU0._V1_FMjpg_UX1000_.jpg', 'Ha-ri vai a um encontro às cegas se passando pela amiga e pronta para dispensar o pretendente. Mas o plano dá errado, e ele acaba fazendo uma proposta para ela.', 'serie', 1, 0),
(8, 'Virgin River', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSrEuGNnOuBGTkZASrWsQlmckffoD1hsxu3Iw&s', 'Uma enfermeira se muda de Los Angeles para uma cidadezinha no norte da Califórnia em busca de um recomeço. Mas a nova vida vai ser bem diferente do que ela imagina.', 'serie', 1, 0),
(9, 'Amor Moderno', 'https://i0.wp.com/assets.b9.com.br/wp-content/uploads/2021/08/modern-love-2-poster.jpg?fit=800%2C1000&ssl=1', 'Um olhar para o amor em suas mais variadas formas, da paixão romântica ao carinho de uma família. Histórias únicas sobre as alegrias e tribulações do amor.', 'serie', 1, 0),
(10, 'Pousando no Amor', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSrNCJgKUFpSG8hcuCeyUU4C3GjBca8TzfvPg&s', 'Um acidente de parapente leva uma herdeira sul-coreana à Coreia do Norte. Lá, ela acaba conhecendo um oficial do exército, que vai ajudá-la a se esconder.', 'serie', 1, 0),
(11, 'You Me Her', 'https://m.media-amazon.com/images/M/MV5BMTc2MjUwOTMyNF5BMl5BanBnXkFtZTgwNTEwNTQ0MTI@._V1_.jpg', 'Para apimentar a relação, o casal Jack e Emma contrata uma acompanhante. Tudo vai muito bem até o dia em que um deles se apaixona por ela.', 'serie', 1, 0),
(12, 'Doces Magnólias', 'https://livrariaamandabuttchevits.com.br/image/cache/data/api/produtos/17070-515x800.jpg?1652119578', 'Juntas, as amigas Maddie, Helen e Dana Sue lidam com problemas amorosos, familiares e profissionais na pequena cidade de Serenity.', 'serie', 1, 0),
(13, 'Batman - O Cavaleiro Das Trevas', 'https://br.web.img3.acsta.net/c_310_420/medias/nmedia/18/86/98/32/19870786.jpg', 'Após dois anos desde o surgimento do Batman (Christian Bale), os criminosos de Gotham City têm muito o que temer. Com a ajuda do tenente James Gordon (Gary Oldman) e do promotor público Harvey Dent (Aaron Eckhart), Batman luta contra o crime organizado.', 'filme', 2, 0),
(14, 'Bastardos Inglórios', 'https://static.wikia.nocookie.net/dublagem/images/6/6c/Bastardos_Ingl%C3%B3rios.png/revision/latest/thumbnail/width/360/height/360?cb=20230920032122&path-prefix=pt-br', 'Um pelotão de soldados de origem judaica, na Segunda Guerra Mundial, caçam e matam o maior número de nazistas que conseguem.', 'filme', 2, 0),
(15, 'Reacher', 'https://m.media-amazon.com/images/I/71LGGcQHzqL._AC_UF894,1000_QL80_.jpg', 'O investigador veterano da polícia militar Jack Reacher é falsamente acusado de assassinato e se vê no meio de uma conspiração mortal em Margrave, Geórgia.', 'serie', 2, 0),
(16, 'A Lista Terminal', 'https://br.web.img3.acsta.net/pictures/22/07/06/15/31/1656819.jpg', 'James Reece se torna vingativo ao investigar as forças misteriosas por trás do assassinato de todo o seu pelotão. Livre da estrutura de comando militar, Reece aplica as lições que aprendeu em quase duas décadas de guerra na caça aos responsáveis.', 'serie', 2, 0),
(17, 'Debi & Lóide 2 - Quando Debi Conheceu Lóide', 'https://f001.backblazeb2.com/file/papocine/2014/11/20141114-debi-e-loide-2-papo-de-cinema1.jpg', 'Após anos recebendo educação em casa, o não exatamente brilhante adolescente Harry Dunne finalmente entra para a escola pública e conhece outro aluno com dificuldades de aprendizado, Lloyd Christmas. A dupla acaba em uma classe para estudantes com necessidades especiais, criada pelo diretor Collins para tirar dinheiro dos pais e bancar seu apartamento no Havaí. A falcatrua é descoberta pela aluna Jessica, que pede ajuda a Harry e Lloyd para desmascarar Collins.', 'filme', 3, 0),
(18, 'Mistério em Paris', 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcT_YOQ1K-ZTpbBTK0KyqZSY3BGFBUCGLgRby4QpxloD7KstoIOj', 'Nick e Audrey Spitz abrem uma agência de investigação e finalmente conseguem um caso importante: um amigo bilionário é sequestrado no dia de seu casamento.', 'filme', 3, 0),
(19, 'BoJack Horseman', 'https://lh3.googleusercontent.com/proxy/SHdJ9G6q8E3D7hlov6tqNCrXbx8cv5ExUVzhVyUy5Bolg_0RJuzlTL-Afl-yT5qdXsAldaHiQ0xNWQcmo56NnwmhNCBttKNG', 'BoJack Horseman, um cavalo humanoide, busca um retorno a Hollywood anos depois de sua fama como estrela de uma sitcom nos anos 1990. Com a ajuda de um amigo humano e sua ex-namorada felina, ele se esforça para recuperar sua carreira e sua dignidade.', 'serie', 3, 0),
(20, 'Eu, a Patroa e as Crianças', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQH1yboaxwiyoqTflQI9hJIS7caYlBumKVeiA&s', 'O amoroso pai de família Michael Kyle engravidou Janet quando ela ainda era uma adolescente. Os dois se casaram e tiveram três filhos, mas o fantasma de sua própria história faz com que Michael alimente um verdadeiro pavor de que o mesmo aconteça com seus filhos. Por isso, ele sonha com uma família à moda antiga, mas, na prática, vive uma realidade bem diferente. Sua mulher não é uma dona de casa exemplar, mas uma trabalhadora em ascensão; seu filho adolescente é fã dos grandes astros do rap; sua filha de 15 anos, além de não demonstrar recato, faz de tudo para impressionar os garotos; e a caçula, que não tem nada de dócil e obediente, é contestadora e esperta o suficiente para superar a argumentação do pai na maioria absoluta das vezes.', 'serie', 3, 0),
(21, 'A Chegada', 'https://www.papodecinema.com.br/wp-content/uploads/2016/10/20191229-poster.png', 'Naves alienígenas chegaram às principais cidades do mundo. Com a intenção de se comunicar com os visitantes, uma linguista e um militar são chamados para decifrar as estranhas mensagens dos visitantes.', 'filme', 4, 0),
(22, 'Interestelar', 'https://musicart.xboxlive.com/7/b8841000-0000-0000-0000-000000000002/504/image.jpg?w=1920&h=1080', 'As reservas naturais da Terra estão chegando ao fim e um grupo de astronautas recebe a missão de verificar possíveis planetas para receberem a população mundial, possibilitando a continuação da espécie. Cooper é chamado para liderar o grupo e aceita a missão sabendo que pode nunca mais ver os filhos. Ao lado de Brand, Jenkins e Doyle, ele seguirá em busca de um novo lar.', 'filme', 4, 0),
(23, 'Black Mirror', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTmR_Bf8eZ39HHFfqJUnXtZWwwYmza__2v6g&s', 'Contos de ficção científica que refletem o lado negro das telas e da tecnologia, mostrando que nem toda novidade traz só benefícios.', 'serie', 4, 0),
(24, 'Halo', 'https://br.web.img3.acsta.net/pictures/22/02/21/20/10/2589351.jpg', 'Master Chief, um super-soldado ciberneticamente modificado, defende a humanidade contra o Covenant, uma aliança de alienígenas fanáticos, no século 26.', 'serie', 4, 0),
(25, 'Imaculada', 'https://br.web.img2.acsta.net/pictures/24/01/25/09/36/2233433.jpg', 'Cecilia, uma jovem religiosa, se torna freira em um convento isolado na região rural italiana. Após uma gravidez misteriosa, Cecilia é atormentada por forças perversas, enquanto confronta segredos sombrios e horrores do convento.', 'filme', 5, 0),
(26, 'Annabelle', 'https://br.web.img2.acsta.net/pictures/14/08/11/21/32/336680.jpg', 'John Form acha que encontrou o presente ideal para sua esposa grávida, uma boneca vintage. No entanto, a alegria do casal não dura muito. Uma noite terrível, membros de uma seita satânica invadem a casa do casal em um ataque violento. Ao tentarem invocar um demônio, eles mancham a boneca de sangue, tornando-a receptora de uma entidade do mal.', 'filme', 5, 0),
(27, 'Outsider', 'https://images.justwatch.com/poster/167567025/s718/the-outsider.jpg', 'A investigação do assassinato de um menino se torna obscura quando uma entidade sobrenatural faz com que a equipe encarregada questione suas próprias crenças.', 'serie', 5, 0),
(28, 'Marianne', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJTy_pDJbiCDReVPskMOBHIWCzQij0fMPv6w&s', 'De volta a sua cidade natal, uma famosa escritora de livros de terror descobre que o espírito que atormenta seus sonhos está provocando o caos no mundo real.', 'serie', 5, 0),
(29, 'Anatomia de uma Queda', 'https://br.web.img3.acsta.net/c_310_420/pictures/23/12/19/14/31/0947044.png', 'Durante o último ano, Sandra, uma escritora alemã, e Samuel, seu marido francês, viveram juntos com Daniel, o filho de 11 anos do casal, em uma pequena e isolada cidade nos Alpes. Quando Samuel é encontrado morto, a polícia passa a tratar o caso como um suposto homicídio, e Sandra se torna a principal suspeita.', 'filme', 6, 0),
(30, 'A Teia', 'https://ingresso-a.akamaihd.net/prd/img/movie/a-teia/b8f79507-0986-4024-8823-4ab72527d0b5.webp', 'Sofrendo de perda de memória, um ex-detetive de homicídios tenta resolver um assassinato brutal do qual não consegue se lembrar. À medida que reúne evidências de uma investigação de uma década, ele logo descobre segredos em seu passado esquecido.', 'filme', 6, 0),
(31, 'Dark', 'https://images.justwatch.com/poster/290941069/s592/dark', 'Os mistérios sombrios de uma pequena cidade alemã são expostos quando duas crianças desaparecem. Enquanto as famílias procuram os dois desaparecidos, eles descobrem uma trama de indivíduos conectados com a história conturbada da cidade.', 'serie', 6, 0),
(32, 'Ozark', 'https://m.media-amazon.com/images/I/41qfRW7v9lL.jpg', 'Marty, um consultor financeiro, leva a família a um resort em Ozarks para mantê-la segura depois que as suas negociações com um cartel de drogas mexicano dão errado.', 'serie', 6, 0),
(33, 'Uncharted: Fora do Mapa', 'https://media.fstatic.com/NbGUOqlnlphi35EdB77CDGu19zc=/322x478/smart/filters:format(webp)/media/movies/covers/2022/03/VERTICAL.jpg', 'Nathan Drake e seu parceiro canastrão Victor \"Sully\" Sullivan embarcam em uma perigosa busca para encontrar o maior tesouro jamais encontrado. Enquanto isso, eles também rastreiam pistas que podem levar ao irmão perdido de Nathan.', 'filme', 7, 0),
(34, 'Furiosa: Uma Saga Mad Max', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTp_2YijZ6WE3Drcq0wmIGgjaeh0hJgQq4-tA&s', 'A jovem Furiosa cai nas mãos de uma grande horda de motoqueiros liderada pelo senhor da guerra Dementus. Varrendo Wasteland, eles encontram a Cidadela, presidida pelo Immortan Joe. Enquanto os dois tiranos lutam pelo domínio, Furiosa logo se vê em uma batalha ininterrupta para voltar para casa.', 'filme', 7, 0),
(35, 'Sweet Tooth', 'https://m.media-amazon.com/images/I/71LerBMyOLL._AC_UF1000,1000_QL80_.jpg', 'Em uma perigosa aventura em um mundo pós-apocalíptico, um adorável menino-cervo sai em busca de um novo começo na companhia de um protetor rabugento.', 'serie', 7, 0),
(36, 'The Witcher: A Origem', 'https://p2.trrsf.com/image/fget/cf/940/0/images.terra.com/2022/12/27/1519329039-3177575945832409771343036436051757347978045n.jpg', 'Sete párias do mundo dos elfos se unem em uma jornada contra um poder implacável.', 'serie', 7, 0),
(37, 'Divertida Mente 2', 'https://lumiere-a.akamaihd.net/v1/images/image_b0bdb13a.jpeg?region=0,0,540,810', 'Com um salto temporal, Riley se encontra mais velha, passando pela tão temida adolescência. Junto com o amadurecimento, a sala de controle também está passando por uma adaptação para dar lugar a algo totalmente inesperado: novas emoções.', 'filme', 8, 0),
(38, 'Por Água Abaixo', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSla5dJ_QXcdLr9sv5FoIk3b-fCa90fogFAxw&s', 'Roddy é um ratinho acostumado a um bairro luxuoso de Londres. Sem querer, ele dá uma descarga infeliz e acaba nos esgotos, onde terá de aprender a viver de uma forma completamente diferente.', 'filme', 8, 0),
(39, 'Pocoyo', 'https://media.fstatic.com/k21xOG7BQeHMjKbaD54jLhlCtIc=/322x478/smart/filters:format(webp)/media/movies/covers/2021/11/1g.jpg', 'De chapéu e roupas azuis, Pocoyo faz de cada dia uma inesquecível aventura enquanto explora o mundo ao seu redor ao lado de seus amigos, o que inclui um pato amarelo, uma elefanta rosa, um pássaro dorminhoco e a cadelinha Loula.', 'serie', 8, 0),
(40, 'O Show da Luna!', 'https://images.justwatch.com/poster/256447740/s718/o-show-da-luna.jpg', 'Luna, uma garota de seis anos que ama ciências, acredita que a Terra é um enorme laboratório em que ela pode descobrir diversas curiosidades. A cada episódio, uma curiosidade é abordada, seja no quintal de casa ou na praia, Luna, seu irmão mais novo, Júpiter, de quatro anos e o furão de estimação da família, Cláudio, praticam ciência diariamente, formulando hipóteses e fazendo experimentos. Criativa, curiosa e destemida, Luna utiliza sua imaginação para descobrir suas diversas dúvidas.', 'serie', 8, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_obra` (`id_obra`);

--
-- Indexes for table `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_genero` (`id_genero`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `obras`
--
ALTER TABLE `obras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `avaliacoes_ibfk_1` FOREIGN KEY (`id_obra`) REFERENCES `obras` (`id`);

--
-- Constraints for table `obras`
--
ALTER TABLE `obras`
  ADD CONSTRAINT `obras_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
