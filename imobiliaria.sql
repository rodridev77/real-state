-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Jul-2021 às 20:16
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `imobiliaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `street` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `addresses`
--

INSERT INTO `addresses` (`id`, `street`, `number`, `district`, `city`, `property_id`, `created_at`, `updated_at`) VALUES
(1, 'Rua X', '00', 'Bairro X', 'Campinas', 1, '2021-07-08 18:37:18', '2021-07-08 18:37:18'),
(2, 'Rua X', '11', 'Bairro X', 'Curitiba', 2, '2021-07-08 18:38:51', '2021-07-08 18:38:51'),
(3, 'Rua X', '22', 'Bairro X', 'Sorocaba', 3, '2021-07-08 18:39:51', '2021-07-08 18:39:51'),
(4, 'Rua X', '33', 'Bairro X', 'São Paulo', 4, '2021-07-08 18:41:01', '2021-07-08 18:41:01'),
(5, 'Rua X', '44', 'Bairro X', 'São Pedro', 5, '2021-07-08 18:43:13', '2021-07-08 18:43:13'),
(6, 'Rua X', '55', 'Bairro X', 'Floripa', 6, '2021-07-08 18:47:06', '2021-07-08 18:47:06'),
(7, 'Rua X', '77', 'Bairro X', 'Londrina', 7, '2021-07-08 18:47:53', '2021-07-08 18:48:30'),
(9, 'Rua X', '88', 'Bairro X', 'Rio', 9, '2021-07-08 19:11:32', '2021-07-08 19:11:32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ceos`
--

CREATE TABLE `ceos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(21) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `clients`
--

INSERT INTO `clients` (`id`, `name`, `lastname`, `cpf`, `phone`, `address`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Pedro', 'Lastname', '75508552006', '11 11111111', 'Rua X', 'pedro@mail.com', '2021-07-08 18:18:35', '2021-07-08 18:18:35'),
(2, 'Maria', 'Lastname', '13055899040', '22 22222222', 'Rua X', 'maria@mail.com', '2021-07-08 18:21:44', '2021-07-08 18:21:44'),
(3, 'João', 'Lastname', '96727575061', '33 33333333', 'Rua X', 'joao@mail.com', '2021-07-08 18:23:07', '2021-07-08 18:23:07'),
(4, 'Mila', 'Lastname', '23819395040', '44 44444444', 'Rua X', 'mila@mail.com', '2021-07-08 18:24:25', '2021-07-08 18:24:25'),
(6, 'Juca', 'Lastname', '57304307013', '66 66666666', 'Rua X', 'juca@mail.com', '2021-07-08 18:25:57', '2021-07-08 18:31:14'),
(7, 'Zico', 'Lastname', '55747221000', '77 77777777', 'Rua X', 'zico@mail.com', '2021-07-08 18:26:34', '2021-07-08 18:26:34'),
(8, 'Alan', 'Lastname', '84960144017', '88 88888888', 'Rua X', 'alan@mail.com', '2021-07-08 18:27:20', '2021-07-08 18:27:20'),
(9, 'Deco', 'Lastname', '22393511016', '99 99999999', 'Rua X', 'deco@mail.com', '2021-07-08 18:27:50', '2021-07-08 18:27:50'),
(10, 'Lara', 'lara@mail.com', '46018598086', '00 00000000', 'Rua X', 'lara@mail.com', '2021-07-08 18:29:03', '2021-07-08 18:29:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `commercials`
--

CREATE TABLE `commercials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `financials`
--

CREATE TABLE `financials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_30_230210_create_clients_table', 1),
(5, '2021_06_30_230501_create_properties_table', 1),
(6, '2021_06_30_230637_create_addresses_table', 1),
(7, '2021_06_30_230654_create_sales_table', 1),
(8, '2021_07_04_003809_create_admins_table', 1),
(9, '2021_07_04_003856_create_commercials_table', 1),
(10, '2021_07_04_003935_create_financials_table', 1),
(11, '2021_07_04_003955_create_ceos_table', 1),
(12, '2021_07_04_010303_create_roles_table', 1),
(13, '2021_07_04_010326_create_permissions_table', 1),
(14, '2021_07_04_010720_create_role_permissions_table', 1),
(15, '2021_07_04_020443_create_role_users_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(1, 'view_users', 'Ver usuários', NULL, NULL),
(2, 'create_users', 'Criar usuáros', NULL, NULL),
(3, 'update_users', 'Atualizar usuários', NULL, NULL),
(4, 'delete_users', 'Excluir usuários', NULL, NULL),
(5, 'view_properties', 'Ver imóveis', NULL, NULL),
(6, 'create_properties', 'Criar imóveis', NULL, NULL),
(7, 'update_properties', 'Atualizar imóveis', NULL, NULL),
(8, 'delete_properties', 'Excluir imóveis', NULL, NULL),
(9, 'view_clients', 'Ver clientes', NULL, NULL),
(10, 'create_clients', 'Criar clientes', NULL, NULL),
(11, 'update_clients', 'Atualizar clientes', NULL, NULL),
(12, 'delete_clients', 'Excluir clientes', NULL, NULL),
(13, 'view_sales', 'Ver vendas', NULL, NULL),
(14, 'approve_sales', 'Aprovar vendas', NULL, NULL),
(15, 'view_ceo', 'Página do CEO', NULL, NULL),
(16, 'create_sales', 'Criar vendas', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` int(11) NOT NULL,
  `bedroom` int(11) NOT NULL,
  `suite` int(11) NOT NULL,
  `bathroom` int(11) NOT NULL,
  `garage` int(11) NOT NULL,
  `price` double(15,2) NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `properties`
--

INSERT INTO `properties` (`id`, `code`, `area`, `bedroom`, `suite`, `bathroom`, `garage`, `price`, `type`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '45767', 62, 2, 1, 2, 2, 12000000.00, 'Casa', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur est turpis, id laoreet odio volutpat at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur sed justo non est iaculis fringilla. Suspendisse orci eros, bibendum ac sem eu, commodo ullamcorper eros blandit.', 'Sold', '2021-07-08 18:37:18', '2021-07-08 19:39:35'),
(2, '82411', 55, 1, 1, 1, 1, 9000000.00, 'Apartamento', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur est turpis, id laoreet odio volutpat at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur sed justo non est iaculis fringilla. Suspendisse orci eros, bibendum ac sem eu, commodo ullamcorper eros blandit.', 'available', '2021-07-08 18:38:51', '2021-07-08 18:38:51'),
(3, '99535', 70, 2, 1, 2, 2, 20000000.00, 'Casa', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur est turpis, id laoreet odio volutpat at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur sed justo non est iaculis fringilla. Suspendisse orci eros, bibendum ac sem eu, commodo ullamcorper eros blandit.', 'available', '2021-07-08 18:39:51', '2021-07-08 18:39:51'),
(4, '63253', 120, 3, 2, 3, 2, 35000000.00, 'Casa', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur est turpis, id laoreet odio volutpat at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur sed justo non est iaculis fringilla. Suspendisse orci eros, bibendum ac sem eu, commodo ullamcorper eros blandit.', 'Sold', '2021-07-08 18:41:01', '2021-07-08 19:49:33'),
(5, '71168', 90, 4, 2, 3, 3, 39000000.00, 'Sobrado', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur est turpis, id laoreet odio volutpat at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur sed justo non est iaculis fringilla. Suspendisse orci eros, bibendum ac sem eu, commodo ullamcorper eros blandit.', 'unavailable', '2021-07-08 18:43:13', '2021-07-08 19:09:52'),
(6, '22922', 55, 1, 1, 1, 1, 12000000.00, 'Sobrado', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur est turpis, id laoreet odio volutpat at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur sed justo non est iaculis fringilla. Suspendisse orci eros, bibendum ac sem eu, commodo ullamcorper eros blandit.', 'Sold', '2021-07-08 18:47:06', '2021-07-08 20:23:22'),
(7, '01724', 100, 3, 2, 2, 2, 30000000.00, 'Apartamento', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur est turpis, id laoreet odio volutpat at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur sed justo non est iaculis fringilla. Suspendisse orci eros, bibendum ac sem eu, commodo ullamcorper eros blandit.', 'available', '2021-07-08 18:47:53', '2021-07-08 18:48:30'),
(9, '09547', 70, 3, 1, 2, 1, 25000000.00, 'Sobrado', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur est turpis, id laoreet odio volutpat at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur sed justo non est iaculis fringilla. Suspendisse orci eros, bibendum ac sem eu, commodo ullamcorper eros blandit.', 'unavailable', '2021-07-08 19:11:32', '2021-07-08 19:12:35');

-- --------------------------------------------------------

--
-- Estrutura da tabela `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `roles`
--

INSERT INTO `roles` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(1, 'administrative', 'Usuário responsável pelo cadastro de usuários e o cadastro dos imóveis', NULL, NULL),
(2, 'commercial', 'Usuário responsável pelo cadastro de clientes e venda dos imóveis', NULL, NULL),
(3, 'financial', 'Usuário responsável pela aprovação da venda', NULL, NULL),
(4, 'ceo', 'Usuário dono da empresa, com permissão para a área de CEO', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 1, 5, NULL, NULL),
(6, 1, 6, NULL, NULL),
(7, 1, 7, NULL, NULL),
(8, 1, 8, NULL, NULL),
(9, 2, 9, NULL, NULL),
(10, 2, 10, NULL, NULL),
(11, 2, 11, NULL, NULL),
(12, 2, 12, NULL, NULL),
(13, 2, 13, NULL, NULL),
(14, 2, 16, NULL, NULL),
(15, 4, 15, NULL, NULL),
(17, 3, 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `role_users`
--

CREATE TABLE `role_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `role_users`
--

INSERT INTO `role_users` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 3, NULL, NULL),
(4, 4, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` double(15,2) NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `sale_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sales`
--

INSERT INTO `sales` (`id`, `price`, `status`, `sale_date`, `property_id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 12000000.00, 'Performed', '2021-07-08 15:57:18', 1, 1, '2021-07-08 18:57:18', '2021-07-08 19:39:35'),
(2, 35000000.00, 'Performed', '2021-07-08 15:58:06', 4, 1, '2021-07-08 18:58:06', '2021-07-08 19:49:33'),
(3, 12000000.00, 'Performed', '2021-07-08 15:58:46', 6, 4, '2021-07-08 18:58:46', '2021-07-08 20:23:21'),
(4, 39000000.00, 'pending', '2021-07-08 16:09:52', 5, 6, '2021-07-08 19:09:52', '2021-07-08 19:09:52'),
(5, 25000000.00, 'pending', '2021-07-08 16:12:35', 9, 8, '2021-07-08 19:12:35', '2021-07-08 19:12:35');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(21) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `cpf`, `phone`, `address`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Lastname', '00000000000', '(11) 0000-0000', 'Rua das Acássias', 'admin@mail.com', '2021-07-08 17:24:51', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'D0ZAggGu1DSI2wxmMQ65g37ZM0SCnyjEQzfn9xc6WXywDLYb2iqWNVhbpWvP', '2021-07-08 17:24:51', '2021-07-08 17:24:51'),
(2, 'Commercial', 'Lastname', '11111111111', '11 11111111', 'Rua X', 'commercial@mail.com', NULL, '$2y$10$2iSsmY5LfzHtedh9btUyiOEMHw2TJ8eTrGop5dKMsxVY2OHw7rW/G', NULL, '2021-07-08 17:59:45', '2021-07-08 17:59:45'),
(3, 'Financial', 'Lastname', '22222222222', '22 22222222', 'Rua X', 'financial@mail.com', NULL, '$2y$10$FRqzqxzU3EZfucuZavjc3.gseJgG56JGM9DW4bdVwxRoBZidI6Tei', NULL, '2021-07-08 18:01:09', '2021-07-08 18:01:09'),
(4, 'Ceo', 'Lastname', '33333333333', '33 33333333', 'Rua X', 'ceo@mail.com', NULL, '$2y$10$JdvBxw1Dr6uo/FjJ3jkIzOOqOs6vrWKqE/lf9fbCk6Z.b27NLdl6C', NULL, '2021-07-08 18:02:10', '2021-07-08 18:02:10');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_property_id_foreign` (`property_id`);

--
-- Índices para tabela `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ceos`
--
ALTER TABLE `ceos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Índices para tabela `commercials`
--
ALTER TABLE `commercials`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `financials`
--
ALTER TABLE `financials`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permissions_role_id_foreign` (`role_id`),
  ADD KEY `role_permissions_permission_id_foreign` (`permission_id`);

--
-- Índices para tabela `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_users_role_id_foreign` (`role_id`),
  ADD KEY `role_users_user_id_foreign` (`user_id`);

--
-- Índices para tabela `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_property_id_foreign` (`property_id`),
  ADD KEY `sales_client_id_foreign` (`client_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ceos`
--
ALTER TABLE `ceos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `commercials`
--
ALTER TABLE `commercials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `financials`
--
ALTER TABLE `financials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `role_users`
--
ALTER TABLE `role_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `role_users`
--
ALTER TABLE `role_users`
  ADD CONSTRAINT `role_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
