-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-12-2024 a las 20:28:58
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dental`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1729010036),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1729010036;', 1729010036),
('a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1728404976),
('a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1728404976;', 1728404976);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paciente_id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` varchar(255) NOT NULL,
  `tratamiento_id` bigint(20) UNSIGNED NOT NULL,
  `asistio` tinyint(1) NOT NULL DEFAULT 0,
  `Atendido` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fecha_original` date DEFAULT NULL,
  `reagendar` tinyint(1) NOT NULL DEFAULT 0,
  `cancelar` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `paciente_id`, `fecha`, `hora`, `estado`, `tratamiento_id`, `asistio`, `Atendido`, `created_at`, `updated_at`, `fecha_original`, `reagendar`, `cancelar`) VALUES
(176, 1, '2024-10-14', '08:30:00', 'cancelada', 1, 0, 0, '2024-10-14 19:16:40', '2024-10-14 19:16:40', NULL, 0, 0),
(178, 1, '2024-10-14', '09:30:00', 'confirmada', 7, 0, 0, '2024-10-14 19:17:08', '2024-10-14 19:17:08', NULL, 0, 0),
(179, 1, '2024-10-15', '08:30:00', 'confirmada', 1, 0, 0, '2024-10-14 19:37:28', '2024-10-14 19:37:28', NULL, 0, 0),
(180, 2, '2024-10-15', '09:00:00', 'pendiente', 4, 0, 0, '2024-10-14 19:37:40', '2024-10-14 19:37:40', NULL, 0, 0),
(181, 1, '2024-10-15', '09:30:00', 'confirmada', 7, 0, 0, '2024-10-14 19:37:57', '2024-10-14 19:37:57', NULL, 0, 0),
(182, 1, '2024-10-15', '10:30:00', 'confirmada', 1, 0, 0, '2024-10-14 19:38:15', '2024-10-14 19:38:15', NULL, 0, 0),
(183, 1, '2024-10-30', '09:30:00', 'confirmada', 7, 0, 0, '2024-10-14 20:06:45', '2024-10-16 19:27:37', '2024-10-29', 0, 0),
(184, 3, '2024-10-31', '08:30:00', 'pendiente', 1, 0, 0, '2024-10-14 20:07:09', '2024-10-16 19:44:48', '2024-10-24', 0, 0),
(187, 2, '2024-10-12', '09:30:00', 'pendiente', 4, 0, 0, '2024-10-16 18:40:40', '2024-10-16 19:06:38', '2024-10-17', 0, 0),
(190, 1, '2024-10-16', '11:30:00', 'pendiente', 4, 1, 0, '2024-10-16 19:53:14', '2024-10-16 20:50:02', NULL, 1, 0),
(191, 2, '2024-10-16', '17:00:00', 'pendiente', 1, 0, 0, '2024-10-16 19:53:19', '2024-10-16 20:49:58', NULL, 1, 0),
(192, 1, '2024-12-31', '09:00:00', 'confirmada', 4, 0, 0, '2024-12-20 23:39:05', '2024-12-20 23:39:20', NULL, 0, 0),
(193, 1, '2024-12-24', '10:00:00', 'confirmada', 4, 0, 0, '2024-12-23 09:28:03', '2024-12-23 09:28:03', NULL, 0, 0),
(194, 1, '2024-12-26', '09:00:00', 'cancelada', 4, 0, 0, '2024-12-26 22:31:35', '2024-12-26 22:31:35', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `start_at` datetime NOT NULL,
  `end_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas`
--

CREATE TABLE `horas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `horitas` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `horas`
--

INSERT INTO `horas` (`id`, `horitas`, `created_at`, `updated_at`) VALUES
(1, '00:00:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(2, '00:30:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(3, '01:00:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(4, '01:30:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(5, '02:00:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(6, '02:30:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(7, '03:00:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(8, '03:30:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(9, '04:00:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(10, '04:30:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(11, '05:00:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(12, '05:30:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(13, '06:00:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(14, '06:30:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(15, '07:00:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(16, '07:30:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(17, '08:00:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(18, '08:30:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(19, '09:00:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(20, '09:30:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(21, '10:00:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(22, '10:30:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(23, '11:00:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(24, '11:30:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(25, '12:00:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(26, '12:30:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(27, '13:00:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(28, '13:30:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(29, '14:00:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(30, '14:30:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(31, '15:00:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(32, '15:30:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(33, '16:00:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(34, '16:30:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(35, '17:00:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(36, '17:30:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(37, '18:00:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(38, '18:30:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(39, '19:00:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(40, '19:30:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(41, '20:00:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(42, '20:30:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(43, '21:00:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(44, '21:30:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(45, '22:00:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(46, '22:30:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(47, '23:00:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(48, '23:30:00', '2024-10-05 20:17:14', '2024-10-05 20:17:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_03_164413_create_pacientes_table', 1),
(5, '2024_09_04_195400_create_usuarios_table', 1),
(6, '2024_09_05_021149_create_rols_table', 1),
(7, '2024_09_05_173057_create_tratamientos_table', 1),
(8, '2024_09_07_183936_create_citas_table', 1),
(9, '2024_09_23_105030_create_events_table', 1),
(10, '2024_09_26_124627_create_horas_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `ape_paterno` varchar(50) NOT NULL,
  `ape_materno` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `numero_telefono` varchar(255) NOT NULL,
  `colonia` varchar(255) NOT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombres`, `ape_paterno`, `ape_materno`, `fecha_nacimiento`, `numero_telefono`, `colonia`, `foto_perfil`, `created_at`, `updated_at`) VALUES
(1, 'Prof Peyton Kshlerin MD', 'Cormier', 'Roob', '2016-11-08', '73874298473928', 'Malvina Shore', NULL, '2024-10-05 20:17:14', '2024-10-05 20:20:06'),
(2, 'Prof. Nelson Fritsch IV', 'Zboncak', 'Prohaska', '2024-06-07', '352.649.3251', 'Weissnat Row', 'https://via.placeholder.com/640x480.png/0000dd?text=people+Faker+quia', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(3, 'Prof. Kayley Funk I', 'Wisoky', 'Braun', '2006-02-28', '1-843-830-1132', 'Antone Ways', 'https://via.placeholder.com/640x480.png/007799?text=people+Faker+exercitationem', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(4, 'Alberto Price', 'Schuppe', 'Bartoletti', '2006-07-15', '347.892.6573', 'Hegmann Extension', 'https://via.placeholder.com/640x480.png/0066dd?text=people+Faker+omnis', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(5, 'Rogelio Champlin', 'Crooks', 'Mosciski', '2001-05-23', '+1.661.682.3457', 'Claudie Valleys', 'https://via.placeholder.com/640x480.png/00aaaa?text=people+Faker+inventore', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(6, 'Prof. Katlyn Greenfelder Jr.', 'Goodwin', 'Kautzer', '1998-06-28', '+1-540-700-2181', 'Hauck Extension', 'https://via.placeholder.com/640x480.png/0077dd?text=people+Faker+perspiciatis', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(7, 'Maggie Bogan', 'Wuckert', 'Wintheiser', '1994-10-14', '1-272-724-4803', 'Michaela Isle', 'https://via.placeholder.com/640x480.png/00aa66?text=people+Faker+quia', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(8, 'Luis Hettinger', 'Bogisich', 'Bergstrom', '2023-02-09', '630.362.0274', 'Franco Key', 'https://via.placeholder.com/640x480.png/00ddcc?text=people+Faker+praesentium', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(9, 'Barrett Carter', 'Harris', 'Borer', '2003-04-22', '+1.614.349.8346', 'Orn Villages', 'https://via.placeholder.com/640x480.png/00aa66?text=people+Faker+rem', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(10, 'Sydni Bernhard', 'Graham', 'Haley', '2010-02-09', '(734) 615-5000', 'Rath Center', 'https://via.placeholder.com/640x480.png/00eeee?text=people+Faker+ea', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(11, 'Dr. Gerardo Simonis DDS', 'Wuckert', 'Lind', '2009-07-16', '317.274.1084', 'Wisoky Center', 'https://via.placeholder.com/640x480.png/00ffdd?text=people+Faker+asperiores', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(12, 'Raquel Sauer I', 'Barrows', 'Swaniawski', '1999-01-30', '+1-516-508-7425', 'Davin Harbor', 'https://via.placeholder.com/640x480.png/004422?text=people+Faker+enim', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(13, 'Mr. Ray Powlowski Sr.', 'Mertz', 'Luettgen', '2001-01-05', '+1.432.565.4092', 'Gia Ford', 'https://via.placeholder.com/640x480.png/009944?text=people+Faker+quos', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(14, 'Mr. Gardner Harvey', 'Murray', 'Sipes', '2007-07-01', '(352) 433-8073', 'Wyman Fords', 'https://via.placeholder.com/640x480.png/0044ff?text=people+Faker+magni', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(15, 'Mr. Braulio Hills', 'Gorczany', 'Connelly', '2000-03-14', '+1-458-503-4288', 'Stewart Meadow', 'https://via.placeholder.com/640x480.png/004444?text=people+Faker+et', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(16, 'Ms. Amie Rogahn IV', 'Auer', 'Gleichner', '2005-12-24', '+1-512-218-0872', 'King Tunnel', 'https://via.placeholder.com/640x480.png/00bb66?text=people+Faker+sint', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(17, 'Erik McDermott', 'Bode', 'Keeling', '1995-05-05', '+1 (937) 342-8906', 'Lemke Track', 'https://via.placeholder.com/640x480.png/00aabb?text=people+Faker+molestiae', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(18, 'Gladys Hintz III', 'Daniel', 'Sipes', '2003-11-29', '+1 (929) 640-6264', 'Margarita Unions', 'https://via.placeholder.com/640x480.png/0011ee?text=people+Faker+libero', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(19, 'Judd Stoltenberg V', 'Grady', 'Haley', '2014-09-08', '603-838-4377', 'Elisa Squares', 'https://via.placeholder.com/640x480.png/00ff33?text=people+Faker+tempora', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(20, 'Mylene Wilkinson', 'Stokes', 'Howell', '2018-08-20', '+1.217.968.5394', 'Hand Inlet', 'https://via.placeholder.com/640x480.png/00aaff?text=people+Faker+aliquid', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(21, 'Payton Weissnat', 'Maggio', 'Daugherty', '1999-01-10', '+1.223.319.3693', 'Lehner Parkway', 'https://via.placeholder.com/640x480.png/00ffff?text=people+Faker+velit', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(22, 'Nina Ondricka', 'Miller', 'Turcotte', '2015-06-21', '+1 (212) 843-3443', 'Audra Burg', 'https://via.placeholder.com/640x480.png/0088ff?text=people+Faker+fuga', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(23, 'Terrell Stroman', 'Ondricka', 'Kreiger', '2022-12-11', '580-804-6895', 'Norbert Squares', 'https://via.placeholder.com/640x480.png/007711?text=people+Faker+et', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(24, 'Vada Robel', 'Brakus', 'Bayer', '2000-11-12', '916-451-4996', 'Laila Drives', 'https://via.placeholder.com/640x480.png/008800?text=people+Faker+enim', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(25, 'Frederique Beer DVM', 'Dibbert', 'Streich', '2002-04-11', '1-762-822-9184', 'Gina Isle', 'https://via.placeholder.com/640x480.png/00ee77?text=people+Faker+corrupti', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(26, 'Prof. Cassandre Ullrich', 'Cole', 'Paucek', '2003-01-11', '1-570-700-2395', 'Veum Field', 'https://via.placeholder.com/640x480.png/00dd55?text=people+Faker+facere', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(27, 'Thaddeus Green Sr.', 'Rath', 'Fahey', '2022-01-23', '1-231-563-9697', 'Wintheiser Junction', 'https://via.placeholder.com/640x480.png/00ee00?text=people+Faker+et', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(28, 'Gaetano Ledner', 'Pfannerstill', 'Harris', '2014-09-29', '904-216-9728', 'Jannie Overpass', 'https://via.placeholder.com/640x480.png/005555?text=people+Faker+eos', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(29, 'Maryse Hettinger', 'Greenfelder', 'Kassulke', '2003-03-21', '785-841-7310', 'Eve Creek', 'https://via.placeholder.com/640x480.png/00aadd?text=people+Faker+reprehenderit', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(30, 'Lexie Sporer', 'Rolfson', 'Price', '2024-04-12', '+1-980-436-7032', 'Kenna Manors', 'https://via.placeholder.com/640x480.png/008888?text=people+Faker+quod', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(31, 'Jovanny Reilly II', 'Kilback', 'Pagac', '2001-11-06', '(585) 918-6053', 'Wilfred Curve', 'https://via.placeholder.com/640x480.png/002211?text=people+Faker+quo', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(32, 'Mrs. Shea Schumm V', 'Graham', 'Murazik', '2015-12-07', '1-630-221-5823', 'Lucius Fields', 'https://via.placeholder.com/640x480.png/00ee77?text=people+Faker+sit', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(33, 'Joany Lowe', 'Koch', 'Mueller', '2022-07-01', '+1.857.341.2707', 'Labadie Summit', 'https://via.placeholder.com/640x480.png/00dd33?text=people+Faker+in', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(34, 'Millie Lindgren', 'Schmidt', 'Crist', '1994-11-28', '1-440-280-2088', 'Sunny Trail', 'https://via.placeholder.com/640x480.png/00eecc?text=people+Faker+earum', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(35, 'Dr. Coty Armstrong', 'Weissnat', 'Runolfsdottir', '2022-12-24', '231.352.4135', 'Alaina Flats', 'https://via.placeholder.com/640x480.png/001177?text=people+Faker+aliquid', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(36, 'Mrs. Nola Aufderhar', 'Murazik', 'Cormier', '2015-12-17', '857.710.4309', 'Dietrich Islands', 'https://via.placeholder.com/640x480.png/007788?text=people+Faker+eum', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(37, 'Dewitt Murazik DVM', 'O\'Reilly', 'Greenholt', '2007-01-21', '912.967.2131', 'Marvin Shoals', 'https://via.placeholder.com/640x480.png/00eeee?text=people+Faker+sit', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(38, 'Mrs. Audrey Dicki', 'Wiza', 'Doyle', '2021-01-06', '+1-313-264-7479', 'Alec Ridge', 'https://via.placeholder.com/640x480.png/00ff88?text=people+Faker+consequatur', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(39, 'Annette O\'Hara IV', 'DuBuque', 'Friesen', '2011-11-05', '+1-540-657-7054', 'Wolff Via', 'https://via.placeholder.com/640x480.png/0022aa?text=people+Faker+ab', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(40, 'Eudora Kemmer', 'Botsford', 'Kunde', '1999-11-26', '1-734-408-2974', 'Nona Skyway', 'https://via.placeholder.com/640x480.png/006600?text=people+Faker+exercitationem', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(41, 'Zachariah Murazik DVM', 'Mitchell', 'Boyle', '2018-04-21', '1-803-356-5293', 'Jacobson Harbors', 'https://via.placeholder.com/640x480.png/00dd22?text=people+Faker+id', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(42, 'Santiago Weissnat', 'Hackett', 'Kassulke', '2008-03-16', '1-218-691-4819', 'Koss Landing', 'https://via.placeholder.com/640x480.png/0022cc?text=people+Faker+sit', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(43, 'Dr. Gail Reynolds MD', 'Kuvalis', 'Kertzmann', '2001-03-11', '423-909-9726', 'Schaden Rapids', 'https://via.placeholder.com/640x480.png/009933?text=people+Faker+ut', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(44, 'Dr. Judge Lowe', 'Ward', 'Bogan', '2014-04-18', '(872) 371-1250', 'Amani Neck', 'https://via.placeholder.com/640x480.png/00cc77?text=people+Faker+voluptatibus', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(45, 'Prof. Arnold Luettgen Sr.', 'Reichel', 'Collins', '2005-01-02', '+1 (463) 908-9930', 'Legros Course', 'https://via.placeholder.com/640x480.png/00bbaa?text=people+Faker+laudantium', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(46, 'Lenna Prosacco V', 'Wunsch', 'Walker', '2012-07-20', '+1-602-652-6229', 'Trent Run', 'https://via.placeholder.com/640x480.png/00ff44?text=people+Faker+nemo', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(47, 'Saige Von', 'Huels', 'Dicki', '2013-07-09', '341.433.1205', 'Amber Streets', 'https://via.placeholder.com/640x480.png/0099ee?text=people+Faker+velit', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(48, 'Karlie Osinski', 'Purdy', 'Balistreri', '2006-05-25', '(707) 968-6300', 'Schoen Tunnel', 'https://via.placeholder.com/640x480.png/00ddcc?text=people+Faker+dignissimos', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(49, 'Braeden Miller', 'Price', 'Larson', '2007-09-24', '(726) 846-8229', 'Dereck Ways', 'https://via.placeholder.com/640x480.png/005577?text=people+Faker+consequatur', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(50, 'Dr. Jada Botsford III', 'Ryan', 'Nienow', '2011-05-17', '(848) 251-2341', 'Elenora Drive', 'https://via.placeholder.com/640x480.png/0044dd?text=people+Faker+architecto', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(51, 'Sarah Ritchie', 'Leuschke', 'Dibbert', '2004-06-05', '+1 (262) 497-7424', 'Lockman Isle', 'https://via.placeholder.com/640x480.png/003311?text=people+Faker+nulla', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(52, 'Eloise Kautzer', 'Ledner', 'Klocko', '2004-09-30', '(518) 797-2476', 'Grant Route', 'https://via.placeholder.com/640x480.png/00ff00?text=people+Faker+sit', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(53, 'Elise Fadel', 'Lakin', 'Kuvalis', '2006-03-24', '657-686-7508', 'Liliana Roads', 'https://via.placeholder.com/640x480.png/003311?text=people+Faker+totam', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(54, 'Zane Marvin Jr.', 'Krajcik', 'Hermann', '2009-04-12', '+1.669.262.5696', 'Eldred Union', 'https://via.placeholder.com/640x480.png/00bb33?text=people+Faker+aliquam', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(55, 'Bernie Pouros', 'Russel', 'Kuhic', '2006-10-16', '(463) 330-0635', 'Eliza Burg', 'https://via.placeholder.com/640x480.png/00ddee?text=people+Faker+modi', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(56, 'Dr. Leif Gerlach Jr.', 'Hoppe', 'Davis', '1995-08-11', '650.458.5196', 'Trace Islands', 'https://via.placeholder.com/640x480.png/0022ee?text=people+Faker+blanditiis', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(57, 'Art Collier', 'Gutkowski', 'Waelchi', '2012-10-15', '+1.401.383.1205', 'Marvin Throughway', 'https://via.placeholder.com/640x480.png/009966?text=people+Faker+numquam', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(58, 'Ms. Sydni Kunze V', 'Leuschke', 'Dooley', '2014-08-05', '878.360.2786', 'Fisher Ridges', 'https://via.placeholder.com/640x480.png/0044bb?text=people+Faker+labore', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(59, 'Freda Kassulke', 'Blick', 'Lesch', '2010-12-17', '(385) 749-5802', 'Berge Common', 'https://via.placeholder.com/640x480.png/00dd55?text=people+Faker+laboriosam', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(60, 'Tressa Kuphal', 'Kovacek', 'Gaylord', '2014-03-30', '559-939-3668', 'Sunny Roads', 'https://via.placeholder.com/640x480.png/002266?text=people+Faker+et', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(61, 'Raymundo Rau I', 'O\'Conner', 'Thompson', '2007-08-07', '1-616-903-3925', 'Hauck Fords', 'https://via.placeholder.com/640x480.png/00cc22?text=people+Faker+necessitatibus', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(62, 'Vernice Stoltenberg', 'Okuneva', 'Beer', '2002-07-29', '+1-380-717-9439', 'Haag Burg', 'https://via.placeholder.com/640x480.png/00ff22?text=people+Faker+aut', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(63, 'Rollin Corwin', 'Beatty', 'Rolfson', '2008-06-23', '+18282746696', 'Zander Rapid', 'https://via.placeholder.com/640x480.png/00aa11?text=people+Faker+saepe', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(64, 'Dr. Lee O\'Conner', 'Lemke', 'Rohan', '2019-11-27', '1-828-506-5578', 'Purdy Cliff', 'https://via.placeholder.com/640x480.png/0011aa?text=people+Faker+quo', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(65, 'Mr. Jovany Bode', 'Schinner', 'Pouros', '2005-02-09', '1-212-474-5923', 'Larkin Forks', 'https://via.placeholder.com/640x480.png/00ff11?text=people+Faker+eveniet', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(66, 'Miss Jermaine Schiller', 'Roob', 'Abbott', '2018-01-01', '1-845-328-4998', 'Bogisich Trail', 'https://via.placeholder.com/640x480.png/0022ff?text=people+Faker+architecto', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(67, 'Cyrus Gottlieb', 'Kerluke', 'Heller', '2001-05-22', '618.748.0946', 'Godfrey Track', 'https://via.placeholder.com/640x480.png/00ffdd?text=people+Faker+magni', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(68, 'Giovanni Renner', 'VonRueden', 'McKenzie', '2014-05-17', '+19596655388', 'Herbert Camp', 'https://via.placeholder.com/640x480.png/0022cc?text=people+Faker+dolores', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(69, 'Mossie Sporer Jr.', 'Sawayn', 'Kirlin', '1999-11-06', '+17172402773', 'Mayert Radial', 'https://via.placeholder.com/640x480.png/00ee88?text=people+Faker+nam', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(70, 'Keon Pfeffer', 'Sipes', 'Goldner', '2015-12-12', '+1.270.589.4828', 'Curtis Turnpike', 'https://via.placeholder.com/640x480.png/0088dd?text=people+Faker+nam', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(71, 'Estell Grimes DDS', 'Harber', 'Maggio', '2024-02-27', '(260) 629-5369', 'Koepp Fields', 'https://via.placeholder.com/640x480.png/003311?text=people+Faker+quo', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(72, 'Mr. Luther Bogan I', 'Collier', 'Brown', '2001-03-11', '458.594.1974', 'Toy Streets', 'https://via.placeholder.com/640x480.png/0077dd?text=people+Faker+fugiat', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(73, 'Maximo Konopelski', 'Mayer', 'Schamberger', '1999-03-06', '636.499.6919', 'Balistreri Meadow', 'https://via.placeholder.com/640x480.png/000044?text=people+Faker+occaecati', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(74, 'Karine Boehm', 'Hirthe', 'Rogahn', '1996-07-30', '845-319-0896', 'Van Rest', 'https://via.placeholder.com/640x480.png/0033ff?text=people+Faker+excepturi', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(75, 'Heidi Keeling', 'Koelpin', 'McClure', '2008-03-04', '808.210.9366', 'Leanna Point', 'https://via.placeholder.com/640x480.png/003333?text=people+Faker+praesentium', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(76, 'Oswald Kerluke', 'Price', 'Cruickshank', '2020-11-28', '+1-607-524-6596', 'Zemlak Mountain', 'https://via.placeholder.com/640x480.png/00ddee?text=people+Faker+consectetur', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(77, 'Garrick Wyman', 'Russel', 'Jacobi', '2013-05-23', '657.242.0493', 'Bosco Walks', 'https://via.placeholder.com/640x480.png/0077cc?text=people+Faker+architecto', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(78, 'Fiona Herzog', 'Maggio', 'Heathcote', '2001-10-26', '1-351-625-9368', 'Alvis Radial', 'https://via.placeholder.com/640x480.png/00ddcc?text=people+Faker+odio', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(79, 'Dr. Burley Herman Sr.', 'Boehm', 'Bashirian', '2005-03-16', '+15594499423', 'Lenna Expressway', 'https://via.placeholder.com/640x480.png/00bbee?text=people+Faker+vitae', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(80, 'Lucy Hartmann', 'Altenwerth', 'Buckridge', '1999-03-31', '1-563-292-7990', 'Flatley Turnpike', 'https://via.placeholder.com/640x480.png/0011ff?text=people+Faker+quis', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(81, 'Quinten Bins', 'Ondricka', 'Spinka', '2018-01-20', '1-629-970-4188', 'Darrell Terrace', 'https://via.placeholder.com/640x480.png/00bbaa?text=people+Faker+corrupti', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(82, 'Sydnie Schneider DDS', 'Dach', 'Flatley', '2007-08-19', '+1-617-692-1095', 'Wunsch Mill', 'https://via.placeholder.com/640x480.png/00ff99?text=people+Faker+velit', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(83, 'Prof. Brice Sporer', 'Ratke', 'Hodkiewicz', '2008-04-07', '430-614-2515', 'Myron Parkway', 'https://via.placeholder.com/640x480.png/003344?text=people+Faker+rerum', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(84, 'Cameron Howe', 'Zboncak', 'Vandervort', '2021-12-25', '+1.330.768.6858', 'Haven Wells', 'https://via.placeholder.com/640x480.png/004466?text=people+Faker+ratione', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(85, 'Vanessa Bednar', 'Hettinger', 'Thompson', '2019-12-04', '1-432-428-6228', 'Bauch Cliffs', 'https://via.placeholder.com/640x480.png/00ccee?text=people+Faker+incidunt', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(86, 'Doyle Adams', 'O\'Reilly', 'Denesik', '2023-01-11', '(520) 402-3515', 'McKenzie Village', 'https://via.placeholder.com/640x480.png/0033ff?text=people+Faker+harum', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(87, 'Prof. Lennie Prosacco', 'Kirlin', 'Zemlak', '2004-01-16', '+1.920.722.4144', 'Labadie Streets', 'https://via.placeholder.com/640x480.png/004499?text=people+Faker+hic', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(88, 'Saige Zulauf', 'Flatley', 'Gusikowski', '2009-10-29', '786.626.4292', 'Greenfelder Landing', 'https://via.placeholder.com/640x480.png/00bb00?text=people+Faker+voluptas', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(89, 'Prof. Loyal Huel', 'Bednar', 'Gorczany', '2016-12-05', '272-272-6392', 'Block Knolls', 'https://via.placeholder.com/640x480.png/006666?text=people+Faker+ea', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(90, 'Dr. Broderick Bradtke PhD', 'Schaden', 'Huels', '2023-12-22', '+1.341.887.0537', 'Eleonore Glen', 'https://via.placeholder.com/640x480.png/000044?text=people+Faker+aut', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(91, 'Dr. Ezequiel Schneider MD', 'Abshire', 'Hansen', '2017-10-16', '678.721.0591', 'Zulauf Gateway', 'https://via.placeholder.com/640x480.png/00aaaa?text=people+Faker+reiciendis', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(92, 'Miss Selina Connelly PhD', 'Gulgowski', 'Jast', '2011-12-19', '+1-959-564-8330', 'Vesta Ranch', 'https://via.placeholder.com/640x480.png/0011bb?text=people+Faker+nam', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(93, 'Leo Murazik', 'Simonis', 'Maggio', '2010-08-01', '+1-747-885-3108', 'Kutch Path', 'https://via.placeholder.com/640x480.png/00ddee?text=people+Faker+quae', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(94, 'Candice Cruickshank', 'Harris', 'Kassulke', '2002-11-12', '317-509-4667', 'Laron Orchard', 'https://via.placeholder.com/640x480.png/005599?text=people+Faker+sequi', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(95, 'Adella Grimes', 'Padberg', 'Casper', '2023-06-25', '320.271.2235', 'Jacobi Extensions', 'https://via.placeholder.com/640x480.png/00ff11?text=people+Faker+recusandae', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(96, 'Lynn Barrows', 'Anderson', 'Jenkins', '2008-01-30', '1-332-753-8946', 'Marjolaine Corner', 'https://via.placeholder.com/640x480.png/00ee99?text=people+Faker+iste', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(97, 'Wendell Funk', 'Streich', 'McClure', '2017-03-16', '805.486.0976', 'Homenick Lock', 'https://via.placeholder.com/640x480.png/00ffaa?text=people+Faker+a', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(98, 'Zella Hodkiewicz DVM', 'Schaefer', 'Collins', '2003-04-24', '+1.660.990.9954', 'Dayna Alley', 'https://via.placeholder.com/640x480.png/00ccaa?text=people+Faker+pariatur', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(99, 'Prof. Schuyler Collins', 'Steuber', 'Larson', '2004-11-09', '+1-575-363-7423', 'Tevin Circles', 'https://via.placeholder.com/640x480.png/002277?text=people+Faker+deleniti', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(100, 'Elva O\'Keefe', 'Heller', 'Lang', '2019-06-28', '(828) 914-9727', 'Gutmann Harbor', 'https://via.placeholder.com/640x480.png/0044aa?text=people+Faker+doloremque', '2024-10-05 20:17:14', '2024-10-05 20:17:14'),
(101, 'caros', 'cc', 'www', '2001-03-08', '3535342424245', 'tata', 'pacientes/01J9PFDTKMT22TR255VYSVKC62.webp', '2024-10-08 16:29:34', '2024-10-08 16:29:34'),
(112, 'dddd', 'ffff', 'eszzz', '2008-03-03', '345343223', 'dsddsss', NULL, '2024-12-26 22:25:55', '2024-12-26 22:25:55'),
(113, 'Juan Carlos', 'Damian ', 'Diaz', '2001-12-03', '4534445321', 'Apatzingan', NULL, '2024-12-26 22:31:13', '2024-12-26 22:31:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rols`
--

CREATE TABLE `rols` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rols`
--

INSERT INTO `rols` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Dentista', 'Dr', '2024-10-08 16:40:37', '2024-10-08 16:40:37'),
(2, 'Limpieza', 'Encargada', '2024-10-15 16:23:29', '2024-10-15 16:23:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientos`
--

CREATE TABLE `tratamientos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `duracion_horas` int(11) NOT NULL DEFAULT 0,
  `duracion_minutos` int(11) NOT NULL DEFAULT 0,
  `precio` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tratamientos`
--

INSERT INTO `tratamientos` (`id`, `nombre`, `descripcion`, `duracion_horas`, `duracion_minutos`, `precio`, `created_at`, `updated_at`) VALUES
(1, 'Revision', 'tata', 0, 20, 100.00, '2024-10-08 16:32:07', '2024-10-08 16:32:07'),
(4, 'Limpieza', 'limpieza dental', 0, 40, 400.00, '2024-10-11 18:18:42', '2024-10-11 18:18:42'),
(7, 'Lista', 'dddd', 0, 45, 2000.00, '2024-10-11 20:01:58', '2024-10-11 20:01:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'carlitos', 'wi1406375@outlook.com', NULL, '$2y$12$8QOCotrlyf4fE3JyEkO6gOg0SBlKqcf05t53vuA1SCV.qW5CeYoaq', '9H8Ah50jlkNTNpGJPdJl1ii0zYUkYhYyavKp1fTw24NaaGqZSsA3o2TkXfPp', '2024-10-05 20:17:14', '2024-10-05 20:17:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `ape_paterno` varchar(255) NOT NULL,
  `ape_materno` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `edad` int(11) NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `ape_paterno`, `ape_materno`, `fecha_nacimiento`, `edad`, `nombre_usuario`, `contraseña`, `estado`, `fecha_registro`, `created_at`, `updated_at`) VALUES
(1, 'Ulises', 'Maldonado', 'Diaz', '1990-01-14', 34, 'uli11', '12345678', 0, '2024-10-15 16:22:08', '2024-10-15 16:22:08', '2024-10-15 16:22:08'),
(2, 'Alison', 'D', 'D', '1995-02-03', 29, 'pmmm', '213445', 0, '2024-10-15 16:22:50', '2024-10-15 16:22:50', '2024-10-15 16:22:50');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `citas_paciente_id_foreign` (`paciente_id`),
  ADD KEY `citas_tratamiento_id_foreign` (`tratamiento_id`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `horas`
--
ALTER TABLE `horas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `horas_horitas_unique` (`horitas`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `rols`
--
ALTER TABLE `rols`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuarios_nombre_usuario_unique` (`nombre_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horas`
--
ALTER TABLE `horas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de la tabla `rols`
--
ALTER TABLE `rols`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `citas_tratamiento_id_foreign` FOREIGN KEY (`tratamiento_id`) REFERENCES `tratamientos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
