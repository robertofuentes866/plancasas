-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-02-2023 a las 16:58:21
-- Versión del servidor: 5.6.51-cll-lve
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `plancasas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agentes`
--

CREATE TABLE `agentes` (
  `id_agente` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cel1` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cel2` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_agente` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_privilegio` tinyint(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `agentes`
--

INSERT INTO `agentes` (`id_agente`, `nombre`, `apellidos`, `email`, `password`, `cel1`, `cel2`, `foto_agente`, `id_privilegio`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'Admin Admin', 'example@example.com', '$2y$10$tR2kZ4R1vmLSVv1HKYsaXO3vrmjv2VnZZS1Vt2.lw5XONKzsVpu6y', '505 88888888', NULL, NULL, NULL, '2023-02-15 16:02:09', '2023-02-15 16:02:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casas`
--

CREATE TABLE `casas` (
  `id_casa` bigint(20) UNSIGNED NOT NULL,
  `id_tipo` tinyint(3) UNSIGNED NOT NULL,
  `plantas` tinyint(3) UNSIGNED DEFAULT NULL,
  `garage` tinyint(3) UNSIGNED DEFAULT NULL,
  `casaNumero` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_construccion` double(8,2) DEFAULT NULL,
  `area_terreno` double(8,2) DEFAULT NULL,
  `habitaciones` tinyint(3) UNSIGNED DEFAULT NULL,
  `banos` tinyint(3) UNSIGNED DEFAULT NULL,
  `bano_social` tinyint(3) UNSIGNED DEFAULT NULL,
  `piscina` tinyint(1) DEFAULT NULL,
  `disponibilidad` tinyint(1) DEFAULT NULL,
  `apartamento` tinyint(1) DEFAULT NULL,
  `destacado` tinyint(1) DEFAULT NULL,
  `ano_construccion` year(4) DEFAULT NULL,
  `aires_acondicionado` tinyint(3) UNSIGNED DEFAULT NULL,
  `abanicos_techo` tinyint(3) UNSIGNED DEFAULT NULL,
  `agua_caliente` tinyint(1) DEFAULT NULL,
  `tanque_agua` tinyint(1) DEFAULT NULL,
  `sistema_seguridad` tinyint(1) DEFAULT NULL,
  `id_agente` bigint(20) UNSIGNED NOT NULL,
  `id_localizacion` smallint(5) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cuartoDomestica` tinyint(1) NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `id_subtipo` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `id_ciudad` tinyint(3) UNSIGNED NOT NULL,
  `ciudad` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `duraciones`
--

CREATE TABLE `duraciones` (
  `id_duracion` tinyint(3) UNSIGNED NOT NULL,
  `duracion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos_casas`
--

CREATE TABLE `favoritos_casas` (
  `id_casa` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos_casas`
--

CREATE TABLE `fotos_casas` (
  `id_foto` bigint(20) UNSIGNED NOT NULL,
  `id_casa` bigint(20) UNSIGNED NOT NULL,
  `foto_normal` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_thumb` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leyenda` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `es_principal` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localizaciones`
--

CREATE TABLE `localizaciones` (
  `id_localizacion` smallint(5) UNSIGNED NOT NULL,
  `residencial` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `id_ciudad` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_05_160000_create_tipos_table', 1),
(6, '2022_09_05_160100_create_recursos_table', 1),
(7, '2022_09_05_160200_create_ciudades_table', 1),
(8, '2022_09_05_160300_create_localizaciones_table', 1),
(9, '2022_09_05_160400_create_duraciones_table', 1),
(10, '2022_09_05_160500_create_ofrecimientos_table', 1),
(11, '2022_10_01_143032_create_usuarios_table', 1),
(12, '2022_10_01_143050_create_privilegios_table', 1),
(13, '2022_10_01_143053_create_agentes_table', 1),
(14, '2022_10_01_143054_create_casas_table', 1),
(15, '2022_10_01_143057_create_precios_casas_table', 1),
(16, '2022_10_01_143058_create_fotos_casas_table', 1),
(17, '2022_10_01_143059_create_favoritos_casas_table', 1),
(18, '2022_10_08_232612_add_cuarto_domestica_to_casas', 1),
(19, '2022_12_06_010534_create_sessions_table', 1),
(20, '2022_12_13_163346_add_descripcion_to_casas', 1),
(21, '2022_12_23_030932_create_subtipos_table', 1),
(22, '2023_01_16_223613_add_admin_agentes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofrecimientos`
--

CREATE TABLE `ofrecimientos` (
  `id_ofrecimiento` tinyint(3) UNSIGNED NOT NULL,
  `ofrecimiento` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios_casas`
--

CREATE TABLE `precios_casas` (
  `id_casa` bigint(20) UNSIGNED NOT NULL,
  `id_ofrecimiento` tinyint(3) UNSIGNED NOT NULL,
  `id_duracion` tinyint(3) UNSIGNED NOT NULL,
  `id_recurso` tinyint(3) UNSIGNED NOT NULL,
  `disponibilidad` tinyint(1) DEFAULT NULL,
  `valor` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE `privilegios` (
  `id_privilegio` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `select` tinyint(1) DEFAULT NULL,
  `insert` tinyint(1) DEFAULT NULL,
  `update` tinyint(1) DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`id_privilegio`, `nombre`, `select`, `insert`, `update`, `delete`, `created_at`, `updated_at`) VALUES
(1, 'Privilegio total', 1, 1, 1, 1, '2023-02-16 15:38:04', '2023-02-16 15:38:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `id_recurso` tinyint(3) UNSIGNED NOT NULL,
  `recurso` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subtipos`
--

CREATE TABLE `subtipos` (
  `id_tipo` tinyint(3) UNSIGNED NOT NULL,
  `id_subtipo` tinyint(3) UNSIGNED NOT NULL,
  `subtipo` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id_tipo` tinyint(3) UNSIGNED NOT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agentes`
--
ALTER TABLE `agentes`
  ADD PRIMARY KEY (`id_agente`),
  ADD KEY `agentes_id_privilegio_foreign` (`id_privilegio`);

--
-- Indices de la tabla `casas`
--
ALTER TABLE `casas`
  ADD PRIMARY KEY (`id_casa`),
  ADD KEY `casas_id_agente_foreign` (`id_agente`),
  ADD KEY `casas_id_tipo_foreign` (`id_tipo`),
  ADD KEY `casas_id_localizacion_foreign` (`id_localizacion`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id_ciudad`);

--
-- Indices de la tabla `duraciones`
--
ALTER TABLE `duraciones`
  ADD PRIMARY KEY (`id_duracion`);

--
-- Indices de la tabla `favoritos_casas`
--
ALTER TABLE `favoritos_casas`
  ADD PRIMARY KEY (`id_casa`,`id_usuario`),
  ADD KEY `favoritos_casas_id_usuario_foreign` (`id_usuario`);

--
-- Indices de la tabla `fotos_casas`
--
ALTER TABLE `fotos_casas`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `foreign_casas_fotos` (`id_casa`);

--
-- Indices de la tabla `localizaciones`
--
ALTER TABLE `localizaciones`
  ADD PRIMARY KEY (`id_localizacion`),
  ADD KEY `localizaciones_id_ciudad_foreign` (`id_ciudad`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ofrecimientos`
--
ALTER TABLE `ofrecimientos`
  ADD PRIMARY KEY (`id_ofrecimiento`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`(191),`tokenable_id`);

--
-- Indices de la tabla `precios_casas`
--
ALTER TABLE `precios_casas`
  ADD KEY `precios_casas_id_casa_foreign` (`id_casa`),
  ADD KEY `precios_casas_id_ofrecimiento_foreign` (`id_ofrecimiento`),
  ADD KEY `precios_casas_id_duracion_foreign` (`id_duracion`),
  ADD KEY `precios_casas_id_recurso_foreign` (`id_recurso`);

--
-- Indices de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  ADD PRIMARY KEY (`id_privilegio`);

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id_recurso`);

--
-- Indices de la tabla `subtipos`
--
ALTER TABLE `subtipos`
  ADD PRIMARY KEY (`id_subtipo`),
  ADD KEY `foreign_tipos_subtipos` (`id_tipo`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agentes`
--
ALTER TABLE `agentes`
  MODIFY `id_agente` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `casas`
--
ALTER TABLE `casas`
  MODIFY `id_casa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `id_ciudad` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `duraciones`
--
ALTER TABLE `duraciones`
  MODIFY `id_duracion` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fotos_casas`
--
ALTER TABLE `fotos_casas`
  MODIFY `id_foto` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `localizaciones`
--
ALTER TABLE `localizaciones`
  MODIFY `id_localizacion` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ofrecimientos`
--
ALTER TABLE `ofrecimientos`
  MODIFY `id_ofrecimiento` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  MODIFY `id_privilegio` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id_recurso` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `subtipos`
--
ALTER TABLE `subtipos`
  MODIFY `id_subtipo` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id_tipo` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agentes`
--
ALTER TABLE `agentes`
  ADD CONSTRAINT `foreign_privilegios` FOREIGN KEY (`id_privilegio`) REFERENCES `privilegios` (`id_privilegio`);

--
-- Filtros para la tabla `casas`
--
ALTER TABLE `casas`
  ADD CONSTRAINT `foreign_agentes` FOREIGN KEY (`id_agente`) REFERENCES `agentes` (`id_agente`),
  ADD CONSTRAINT `foreign_localizaciones` FOREIGN KEY (`id_localizacion`) REFERENCES `localizaciones` (`id_localizacion`),
  ADD CONSTRAINT `foreign_tipos` FOREIGN KEY (`id_tipo`) REFERENCES `tipos` (`id_tipo`);

--
-- Filtros para la tabla `favoritos_casas`
--
ALTER TABLE `favoritos_casas`
  ADD CONSTRAINT `foreign_casas` FOREIGN KEY (`id_casa`) REFERENCES `casas` (`id_casa`) ON DELETE CASCADE,
  ADD CONSTRAINT `foreign_users` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `fotos_casas`
--
ALTER TABLE `fotos_casas`
  ADD CONSTRAINT `foreign_casas_fotos` FOREIGN KEY (`id_casa`) REFERENCES `casas` (`id_casa`) ON DELETE CASCADE;

--
-- Filtros para la tabla `precios_casas`
--
ALTER TABLE `precios_casas`
  ADD CONSTRAINT `foreigh_recursos_precios` FOREIGN KEY (`id_recurso`) REFERENCES `recursos` (`id_recurso`),
  ADD CONSTRAINT `foreign_casas_precios` FOREIGN KEY (`id_casa`) REFERENCES `casas` (`id_casa`) ON DELETE CASCADE,
  ADD CONSTRAINT `foreign_duraciones_precios` FOREIGN KEY (`id_duracion`) REFERENCES `duraciones` (`id_duracion`),
  ADD CONSTRAINT `foreign_ofrecimientos_precios` FOREIGN KEY (`id_ofrecimiento`) REFERENCES `ofrecimientos` (`id_ofrecimiento`);

--
-- Filtros para la tabla `subtipos`
--
ALTER TABLE `subtipos`
  ADD CONSTRAINT `foreign_tipos_subtipos` FOREIGN KEY (`id_tipo`) REFERENCES `tipos` (`id_tipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
