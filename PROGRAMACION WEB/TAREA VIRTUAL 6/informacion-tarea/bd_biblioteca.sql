SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `libro`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `libro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;


INSERT INTO libro (titulo, autor, cantidad) VALUES
('El señor de los anillos', 'J.R.R. Tolkien', 10),
('Harry Potter y la piedra filosofal', 'J.K. Rowling', 5),
('Cien años de soledad', 'Gabriel García Márquez', 8),
('1984', 'George Orwell', 12),
('Orgullo y prejuicio', 'Jane Austen', 6),
('Don Quijote de la Mancha', 'Miguel de Cervantes', 15),
('Crimen y castigo', 'Fyodor Dostoyevsky', 7),
('El principito', 'Antoine de Saint-Exupéry', 9),
('El retrato de Dorian Gray', 'Oscar Wilde', 4),
('La metamorfosis', 'Franz Kafka', 11),
('La Odisea', 'Homero', 3),
('La Ilíada', 'Homero', 2),
('La divina comedia', 'Dante Alighieri', 1);

```