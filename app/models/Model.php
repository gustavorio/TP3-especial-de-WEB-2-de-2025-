<?php
    class Model {
        protected $db;

        function __construct() {
          try {
            $this->db = new PDO('mysql:host='. MYSQL_HOST .';dbname='. MYSQL_DB .';charset=utf8', MYSQL_USER, MYSQL_PASS);
          } catch (\Throwable $th) {
            $this->createDB();
          }
          $this->deploy();
        }

        function createDB() {
          $this->db = new PDO('mysql:host=' . MYSQL_HOST, MYSQL_USER, MYSQL_PASS);
          $DBName = MYSQL_DB;

          $sql =<<<END
            SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
            START TRANSACTION;
            SET time_zone = "+00:00";
        
            CREATE DATABASE IF NOT EXISTS `$DBName` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
            USE `$DBName`;
          END;

          $this->db->query($sql);
        }

        function deploy() {
            // Chequear si hay tablas
            $query = $this->db->query('SHOW TABLES');
            $tables = $query->fetchAll(); // Nos devuelve todas las tablas de la db
            if(count($tables)==0) {
                // Si no hay crearlas
                $sql =<<<END
                SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
                START TRANSACTION;
                SET time_zone = "+00:00";


                /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
                /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
                /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
                /*!40101 SET NAMES utf8mb4 */;

                --
                -- Database: `ciber dragon`
                --

                -- --------------------------------------------------------

                --
                -- Table structure for table `desarrolladores`
                --

                CREATE TABLE `desarrolladores` (
                  `desarrolladorId` int(11) NOT NULL,
                  `fechaCreacion` date NOT NULL,
                  `origen` varchar(45) NOT NULL,
                  `nombreDesarrollador` varchar(45) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                --
                -- Dumping data for table `desarrolladores`
                --

                INSERT INTO `desarrolladores` (`desarrolladorId`, `fechaCreacion`, `origen`, `nombreDesarrollador`) VALUES
                (5, '2009-09-12', 'Noruega', 'Mojang'),
                (7, '1992-04-25', 'EEUU', 'Blizzard'),
                (8, '1995-06-15', 'EEUU', 'Rockstar');

                -- --------------------------------------------------------

                --
                -- Table structure for table `juegos`
                --

                CREATE TABLE `juegos` (
                  `juegoId` int(11) NOT NULL,
                  `nombreJuego` varchar(45) NOT NULL,
                  `fechaLanzamiento` date NOT NULL,
                  `desarrolladorId` int(11) NOT NULL,
                  `descripcionJuego` text NOT NULL,
                  `edad` int(11) NOT NULL,
                  `imagen` varchar(200) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                --
                -- Dumping data for table `juegos`
                --

                INSERT INTO `juegos` (`juegoId`, `nombreJuego`, `fechaLanzamiento`, `desarrolladorId`, `descripcionJuego`, `edad`, `imagen`) VALUES
                (13, 'Minecraft', '2011-11-18', 5, 'Minecraft es un juego de mundo abierto, y no tiene un fin claramente definido (aunque sí que tiene una dimensión llamada a sí misma \'The End\', o en español \'El Final\' en donde después de entrar y matar a la dragona aparecen los créditos del juego y un poema).31​ Esto permite una gran libertad en cuanto a la elección de su forma de jugar. A pesar de ello, el juego posee un sistema que otorga logros por completar ciertas acciones. La cámara es en primera persona, aunque los jugadores tienen la posibilidad de cambiarla a una perspectiva de tercera persona en cualquier momento.', 8, 'https://www.minecraft.net/content/dam/games/minecraft/key-art/SUPM_Game-Image_One-Vanilla_672x400.jpg'),
                (21, 'Hearthstone: Heroes of Warcraft', '2014-03-11', 7, 'Hearthstone es un juego de cartas coleccionables en línea que se basa en partidas por turnos entre dos oponentes, operado a través del Battle.net de Blizzard.4​ Los jugadores pueden escoger entre diferentes modos de juego que ofrecen diferentes experiencias.\r\n\r\nEl juego presenta once héroes, (en la última expansión se incluyó al nuevo héroe, Caballero de la Muerte) cada uno de ellos representando una clase distinta dentro del universo de Warcraft como Mago o Pícaro, exceptuando al Monje. Cada héroe presenta habilidades o los denominados poderes de héroe.', 7, 'https://d2q63o9r0h0ohi.cloudfront.net/_next/static/images/default-4fff3c606c794dc03a915b9071f562d3.jpg'),
                (22, 'GTA V', '2013-09-17', 8, 'Grand Theft Auto V (abreviado como GTA V o GTA 5) es un videojuego de acción-aventura de mundo abierto en tercera persona desarrollado por el estudio escocés Rockstar North y distribuido por Rockstar Games. Este título revolucionario hizo su debut el 17 de septiembre de 2013 en las consolas Xbox 360 y PlayStation 3. Posteriormente, experimentó una reaparición el 18 de noviembre de 2014 en las consolas de nueva generación, Xbox One y PlayStation 4, con una perspectiva en primera persona. El juego luego amplió su alcance a Microsoft Windows el 14 de abril de 2015. El capítulo más reciente en su historia confirmó su llegada a Xbox Series X/S y PlayStation 5 en marzo de 2022, alardeando de impresionantes mejoras gráficas, incluido el soporte para una resolución de 8K y fluidos 120 FPS. Marca un hito significativo al ser la primera entrada importante en la serie Grand Theft Auto desde la presentación de Grand Theft Auto IV en 2008, marcando el comienzo de la \"era HD\" para la franquicia.', 18, 'https://image.api.playstation.com/cdn/UP1004/CUSA00419_00/bTNSe7ok8eFVGeQByA5qSzBQoKAAY32R.png');

                -- --------------------------------------------------------

                --
                -- Table structure for table `reviews`
                --

                CREATE TABLE `reviews` (
                  `reviewId` int(11) NOT NULL,
                  `descripcion` varchar(200) NOT NULL,
                  `puntuacion` int(11) NOT NULL,
                  `usuario` varchar(200) NOT NULL,
                  `juegoId` int(11) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                --
                -- Dumping data for table `reviews`
                --

                INSERT INTO `reviews` (`reviewId`, `descripcion`, `puntuacion`, `usuario`, `juegoId`) VALUES
                (11, 'Un mundo muy amplio y muchas cosas para hacer, me encantó.', 5, 'webadmin', 13),
                (12, 'Muy pay to win, difícil cuando recién se arranca a jugar.', 2, 'webadmin', 21),
                (13, 'Buen juego pero muy violento.', 4, 'webadmin', 22);

                -- --------------------------------------------------------

                --
                -- Table structure for table `usuarios`
                --

                CREATE TABLE `usuarios` (
                  `usuario` varchar(200) NOT NULL,
                  `contra` varchar(200) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                --
                -- Dumping data for table `usuarios`
                --

                INSERT INTO `usuarios` (`usuario`, `contra`) VALUES
                ('webadmin', '$2y$10$5iX0BZS3E2qRR090rtKUqOfAc0XDL6XFpVFBpWODBWxIsw/t65DRq');

                --
                -- Indexes for dumped tables
                --

                --
                -- Indexes for table `desarrolladores`
                --
                ALTER TABLE `desarrolladores`
                  ADD PRIMARY KEY (`desarrolladorId`);

                --
                -- Indexes for table `juegos`
                --
                ALTER TABLE `juegos`
                  ADD PRIMARY KEY (`juegoId`),
                  ADD KEY `desarrollador` (`desarrolladorId`) USING BTREE;

                --
                -- Indexes for table `reviews`
                --
                ALTER TABLE `reviews`
                  ADD PRIMARY KEY (`reviewId`),
                  ADD KEY `juegoId` (`juegoId`),
                  ADD KEY `usuario` (`usuario`) USING BTREE;

                --
                -- Indexes for table `usuarios`
                --
                ALTER TABLE `usuarios`
                  ADD PRIMARY KEY (`usuario`);

                --
                -- AUTO_INCREMENT for dumped tables
                --

                --
                -- AUTO_INCREMENT for table `desarrolladores`
                --
                ALTER TABLE `desarrolladores`
                  MODIFY `desarrolladorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

                --
                -- AUTO_INCREMENT for table `juegos`
                --
                ALTER TABLE `juegos`
                  MODIFY `juegoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

                --
                -- AUTO_INCREMENT for table `reviews`
                --
                ALTER TABLE `reviews`
                  MODIFY `reviewId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

                --
                -- Constraints for dumped tables
                --

                --
                -- Constraints for table `juegos`
                --
                ALTER TABLE `juegos`
                  ADD CONSTRAINT `juegos_ibfk_1` FOREIGN KEY (`desarrolladorId`) REFERENCES `desarrolladores` (`desarrolladorId`);

                --
                -- Constraints for table `reviews`
                --
                ALTER TABLE `reviews`
                  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
                  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`juegoId`) REFERENCES `juegos` (`juegoId`) ON DELETE CASCADE ON UPDATE CASCADE;
                COMMIT;

                /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
                /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
                /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

                END;
                $this->db->query($sql);
            }
            
        }
    }