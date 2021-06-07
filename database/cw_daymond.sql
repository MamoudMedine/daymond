-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-03-12 11:12:40
-- サーバのバージョン： 10.4.13-MariaDB
-- PHP のバージョン: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `cw_daymond`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `adresses`
--

CREATE TABLE `adresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pays` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utilisateur_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `commandes`
--

CREATE TABLE `commandes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantite_produit` int(11) DEFAULT NULL,
  `prix_vente` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autre_details` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_livraison` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etat` int(11) NOT NULL DEFAULT 0,
  `produit_id` int(10) UNSIGNED DEFAULT NULL,
  `utilisateur_id` int(10) UNSIGNED DEFAULT NULL,
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `devises`
--

CREATE TABLE `devises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pays_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `diffusions`
--

CREATE TABLE `diffusions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_vente` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `texte` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disponibilite` int(11) NOT NULL DEFAULT 0,
  `etat` int(11) NOT NULL DEFAULT 0,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `utilisateur_id` int(10) UNSIGNED DEFAULT NULL,
  `type_diffusion_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `etats`
--

CREATE TABLE `etats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `livraisons`
--

CREATE TABLE `livraisons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lieu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frais` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `localisations`
--

CREATE TABLE `localisations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `medias`
--

CREATE TABLE `medias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `produit_id` int(10) UNSIGNED DEFAULT NULL,
  `publicite_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_26_105201_create_adresses_table', 1),
(5, '2021_02_26_105236_create_utilisateurs_table', 1),
(6, '2021_02_26_105307_create_clients_table', 1),
(7, '2021_02_26_105402_create_categories_table', 1),
(8, '2021_02_26_105515_create_couts_table', 1),
(9, '2021_02_26_105536_create_etats_table', 1),
(10, '2021_02_26_105558_create_transactions_table', 1),
(11, '2021_02_26_105618_create_niveaux_table', 1),
(12, '2021_02_26_105647_create_livraisons_table', 1),
(13, '2021_02_26_105718_create_localisations_table', 1),
(14, '2021_02_26_105741_create_admins_table', 1),
(15, '2021_02_26_105809_create_publicites_table', 1),
(16, '2021_02_26_105841_create_type_diffusions_table', 1),
(17, '2021_02_26_105926_create_pays_table', 1),
(18, '2021_02_26_105946_create_devises_table', 1),
(19, '2021_02_26_110231_create_diffusions_table', 1),
(20, '2021_02_26_110256_create_notifications_table', 1),
(21, '2021_02_26_110320_create_paiements_table', 1),
(22, '2021_02_26_110338_create_media_table', 1),
(23, '2021_02_26_110418_create_produits_table', 1),
(24, '2021_02_26_110440_create_commandes_table', 1),
(25, '2021_02_26_120059_create_pays_produit_table', 1),
(26, '2021_02_26_161635_create_type_couts_table', 1),
(27, '2021_03_08_140957_create_products_table', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `niveaux`
--

CREATE TABLE `niveaux` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `texte` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etat` int(11) NOT NULL DEFAULT 0,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `utilisateur_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `paiements`
--

CREATE TABLE `paiements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `somme` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utilisateur_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `pays`
--

CREATE TABLE `pays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indicatif` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wholesale_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_wholesale_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_suggestion_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_suggestion_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abj_delivery_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_soldout` tinyint(1) DEFAULT NULL,
  `is_unavailable` tinyint(1) DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `products`
--

INSERT INTO `products` (`id`, `title`, `cover_url`, `images`, `condition`, `description`, `wholesale_price`, `old_wholesale_price`, `commission`, `min_suggestion_price`, `max_suggestion_price`, `delivery_price`, `abj_delivery_price`, `is_soldout`, `is_unavailable`, `location`, `created_at`, `updated_at`) VALUES
(1, 'Julien Lambert', 'https://via.placeholder.com/640x480.png/00ee66?text=deserunt', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/001100?text=reprehenderit\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0099cc?text=sunt\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ccdd?text=quae\"]', 'nobis', 'Quaerat molestiae voluptatum aut voluptatem. Rerum ipsam quia nisi esse. Velit non ut rem sed.', '4624', '11271', '5099', '9979', '66268', '9441', '157', 0, 0, 'Leleu', '2021-03-11 18:45:25', '2021-03-11 18:45:25'),
(2, 'Frédérique Lebon', 'https://via.placeholder.com/640x480.png/00ddbb?text=perspiciatis', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bbcc?text=quasi\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ccaa?text=ut\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0077aa?text=a\"]', 'qui', 'Et magnam iste consequatur earum doloribus minus. Ut non voluptatum ut quidem nemo molestias. Est et occaecati porro quos qui. Necessitatibus aut quia eaque.', '5766', '22393', '9190', '6898', '76123', '6762', '621', 1, 1, 'LaporteVille', '2021-03-11 18:45:25', '2021-03-11 18:45:25'),
(3, 'Amélie Guillot', 'https://via.placeholder.com/640x480.png/0011ee?text=qui', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/000088?text=assumenda\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00cc44?text=id\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/007777?text=sit\"]', 'sed', 'Quaerat iure ducimus et et optio omnis est doloremque. In consequatur fuga quis dicta aut velit. In aliquid minus qui nulla occaecati aliquam.', '7262', '6744', '5546', '89364', '41412', '1412', '769', 1, 1, 'BoutinBourg', '2021-03-11 18:45:25', '2021-03-11 18:45:25'),
(4, 'Nathalie-Bernadette Brunel', 'https://via.placeholder.com/640x480.png/006666?text=molestiae', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00eecc?text=similique\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/004499?text=voluptas\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/008899?text=incidunt\"]', 'voluptatibus', 'Maxime nostrum quam ut facere aut. Et voluptates quo ipsa quo officiis illum tenetur. Nemo dolor minus quis. Inventore perspiciatis sed rem dolorem aut.', '2316', '20461', '3316', '26040', '47272', '6560', '818', 1, 1, 'Georgesnec', '2021-03-11 18:45:25', '2021-03-11 18:45:25'),
(5, 'Claire-Suzanne David', 'https://via.placeholder.com/640x480.png/00ffaa?text=et', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/004499?text=eius\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/004455?text=amet\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0077bb?text=modi\"]', 'ipsa', 'Cupiditate excepturi accusantium voluptatum aut quaerat. Libero sint modi eligendi debitis earum. Eos consequatur quia omnis voluptatum. Ipsum reiciendis dolorem aliquam quibusdam eveniet.', '698', '53122', '650', '5271', '58899', '2191', '669', 0, 1, 'Roux', '2021-03-11 18:45:25', '2021-03-11 18:45:25'),
(6, 'Thérèse Lopes', 'https://via.placeholder.com/640x480.png/00aaff?text=adipisci', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0077dd?text=magnam\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ccff?text=maiores\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aabb?text=ratione\"]', 'in', 'Placeat autem exercitationem dolores quisquam. Veritatis adipisci libero rem temporibus. Cum velit voluptatibus aut.', '6123', '91763', '5294', '50910', '50676', '3712', '536', 1, 0, 'Labbe-la-Forêt', '2021-03-11 18:45:25', '2021-03-11 18:45:25'),
(7, 'Louise Legros', 'https://via.placeholder.com/640x480.png/006655?text=repellat', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/003399?text=odio\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/000066?text=ullam\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/001155?text=ut\"]', 'et', 'Qui quibusdam voluptatem id. Rem harum fuga nihil dolorum amet aut. Asperiores est pariatur maiores et error autem. Sed molestias qui eos eaque dolorem unde.', '9239', '77408', '9821', '15093', '39140', '9037', '497', 1, 1, 'Marty', '2021-03-11 18:45:25', '2021-03-11 18:45:25'),
(8, 'Aimé Hoarau', 'https://via.placeholder.com/640x480.png/006611?text=aut', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0077bb?text=eum\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ff77?text=eligendi\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bbff?text=ut\"]', 'et', 'Quia recusandae praesentium facilis. Deleniti et voluptas porro sed eum. Et quia quis et debitis est error. Fugit deleniti tempora qui et. Non eaque officia vero. Consectetur totam et earum.', '5541', '6862', '3913', '74827', '79230', '2582', '291', 1, 0, 'Descamps', '2021-03-11 18:45:25', '2021-03-11 18:45:25'),
(9, 'Nathalie Vidal', 'https://via.placeholder.com/640x480.png/00ee77?text=consequatur', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aacc?text=consectetur\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ddff?text=maiores\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/001122?text=quos\"]', 'voluptates', 'Mollitia dolor autem enim commodi. Odit dolorem accusamus aut et dolores architecto.', '6475', '10604', '1792', '2940', '93579', '3540', '743', 0, 0, 'Hernandezboeuf', '2021-03-11 18:45:25', '2021-03-11 18:45:25'),
(10, 'Véronique Gilles', 'https://via.placeholder.com/640x480.png/00aadd?text=praesentium', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0022bb?text=molestiae\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ffaa?text=at\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ff22?text=id\"]', 'quidem', 'Aliquid quia blanditiis est omnis et id. Id consequatur perspiciatis consectetur quo autem dolore eveniet. Minus aut sapiente quod culpa. Maiores est sed doloremque enim iure eius.', '7253', '37671', '7527', '797', '27872', '3393', '914', 1, 0, 'Gerard', '2021-03-11 18:45:25', '2021-03-11 18:45:25'),
(11, 'Catherine Tessier', 'https://via.placeholder.com/640x480.png/00ff11?text=iusto', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/003388?text=nesciunt\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00cc66?text=fuga\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/008822?text=eius\"]', 'beatae', 'Vitae explicabo asperiores ipsa velit tenetur. Laudantium reiciendis beatae earum animi nemo. Maxime necessitatibus dolores velit est odio reprehenderit.', '1085', '58875', '6760', '86003', '44650', '5863', '467', 1, 0, 'Da Costanec', '2021-03-11 18:45:25', '2021-03-11 18:45:25'),
(12, 'Yves Chretien', 'https://via.placeholder.com/640x480.png/001100?text=occaecati', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/001166?text=magnam\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/001122?text=occaecati\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bbdd?text=sequi\"]', 'veniam', 'Explicabo natus repellendus occaecati reiciendis non dolorum. Molestias reprehenderit sapiente dolores ad. Dolorem aut deserunt perferendis quo quis aliquid ex nihil.', '3523', '54725', '7433', '56617', '92834', '5096', '491', 1, 1, 'Torres-sur-Baron', '2021-03-11 18:45:25', '2021-03-11 18:45:25'),
(13, 'Adèle du Morin', 'https://via.placeholder.com/640x480.png/005577?text=nihil', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aa77?text=minima\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0066ff?text=delectus\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/004466?text=accusantium\"]', 'quisquam', 'Quisquam beatae perspiciatis dolores fuga. Et quibusdam autem provident odit.', '4040', '90621', '5311', '8869', '34547', '6827', '60', 1, 1, 'BergerVille', '2021-03-11 18:45:25', '2021-03-11 18:45:25'),
(14, 'Martine Roussel', 'https://via.placeholder.com/640x480.png/00ff77?text=eum', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bb88?text=deserunt\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0022aa?text=corrupti\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0033cc?text=quae\"]', 'deserunt', 'Adipisci ullam excepturi exercitationem eaque pariatur. Fugit temporibus distinctio id nemo possimus molestiae repellat nobis. Magni culpa voluptatem numquam praesentium a fugit.', '9', '98743', '837', '31001', '79163', '8745', '730', 0, 1, 'Garcia', '2021-03-11 18:45:25', '2021-03-11 18:45:25'),
(15, 'Benjamin Da Costa', 'https://via.placeholder.com/640x480.png/00ccdd?text=et', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee55?text=quo\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0055ee?text=recusandae\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/001155?text=corporis\"]', 'quia', 'Ipsam saepe aut et architecto nemo atque ullam et. Ut porro molestiae voluptatem et pariatur quidem. Qui et qui eum. Voluptatum aut reiciendis ut ut quis et laboriosam.', '3514', '19969', '6304', '52683', '91434', '8431', '982', 0, 0, 'Perrot', '2021-03-11 18:45:25', '2021-03-11 18:45:25'),
(16, 'Aimé Berger-Lopes', 'https://via.placeholder.com/640x480.png/00aa99?text=illum', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aa99?text=repellat\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0088ff?text=eos\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/006644?text=numquam\"]', 'libero', 'Quas est consequatur atque quae tempora culpa qui. Aut qui ex sint. Repellat nihil minima assumenda repudiandae voluptate. Ad laboriosam officiis dolorum.', '4540', '56360', '9888', '56931', '18051', '4756', '209', 1, 1, 'BonninVille', '2021-03-11 18:45:25', '2021-03-11 18:45:25'),
(17, 'Marianne Le Leclercq', 'https://via.placeholder.com/640x480.png/008822?text=qui', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0055cc?text=sapiente\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0055dd?text=earum\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/001177?text=consequuntur\"]', 'nisi', 'Labore minima dolor laborum amet harum qui. Non earum quas accusamus. Dolorem rerum id eveniet est.', '4852', '66140', '4248', '33854', '52130', '1546', '539', 0, 0, 'Buisson', '2021-03-11 18:45:25', '2021-03-11 18:45:25'),
(18, 'Marc Poirier', 'https://via.placeholder.com/640x480.png/0011aa?text=est', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ddbb?text=expedita\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/001188?text=iusto\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00cc77?text=voluptatibus\"]', 'repellendus', 'Eum culpa necessitatibus itaque. Facere quia hic qui debitis iste sed. Iusto et magni at cum occaecati natus illum. Laudantium reprehenderit est non tenetur.', '8587', '20143', '4652', '74604', '90190', '9751', '114', 1, 1, 'Hubert', '2021-03-11 18:45:25', '2021-03-11 18:45:25'),
(19, 'Anaïs Jacques', 'https://via.placeholder.com/640x480.png/009988?text=culpa', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/003355?text=id\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ff33?text=exercitationem\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/008888?text=ea\"]', 'voluptatem', 'Unde earum molestias quia cumque dolorem veniam. Assumenda repudiandae nobis fugiat ab enim fugiat qui aut. Est ex neque quos placeat.', '7699', '61298', '7526', '50132', '78829', '5026', '504', 1, 1, 'Lesage', '2021-03-11 18:45:25', '2021-03-11 18:45:25'),
(20, 'Matthieu Benard', 'https://via.placeholder.com/640x480.png/00dd00?text=nemo', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee00?text=aspernatur\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/008866?text=qui\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee44?text=sit\"]', 'placeat', 'Aut necessitatibus ut animi non. Consequatur dignissimos ut dolorem a aut. Eveniet numquam voluptas consequatur et.', '2599', '39527', '9836', '54099', '95534', '7486', '877', 0, 1, 'Maillard-sur-Laine', '2021-03-11 18:45:25', '2021-03-11 18:45:25');

-- --------------------------------------------------------

--
-- テーブルの構造 `produits`
--

CREATE TABLE `produits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sous_titre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categorie_id` int(10) UNSIGNED DEFAULT NULL,
  `prix` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix_reduction` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix_suggestion1` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix_suggestion2` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_cout_id` int(10) UNSIGNED DEFAULT NULL,
  `etat_id` int(10) UNSIGNED DEFAULT NULL,
  `transaction_id` int(10) UNSIGNED DEFAULT NULL,
  `niveau_id` int(10) UNSIGNED DEFAULT NULL,
  `livraison_id` int(10) UNSIGNED DEFAULT NULL,
  `localisation_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `publicites`
--

CREATE TABLE `publicites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `commentaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `type_couts`
--

CREATE TABLE `type_couts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `type_diffusions`
--

CREATE TABLE `type_diffusions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `profession`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Amane Hosanna', 'amanehosanna@gmail.com', '22574936826', NULL, NULL, '$2y$10$3DmG/WQTsdqfyI2k9T.Gsu3ERHqCpFE54GUuZsffo.dKjb4sLVbzS', NULL, NULL, NULL),
(2, 'Name', NULL, '74936826', 'Profession', NULL, '$2y$10$zBhsNAo7.OOJLoG7SWZ8T.hl3Kt66QCjDGuyexefLCqHumIESXwXW', NULL, '2021-03-11 18:47:31', '2021-03-11 18:47:31');

-- --------------------------------------------------------

--
-- テーブルの構造 `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` int(11) NOT NULL DEFAULT 1,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `adresse_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `profession`, `contact`, `password`, `photo`, `statut`, `user_id`, `adresse_id`, `created_at`, `updated_at`) VALUES
(1, 'AMANE', 'Hosanna', 'Software Engineer', '22574936826', 'password', '', 1, 1, NULL, NULL, NULL),
(2, 'Name', NULL, NULL, NULL, NULL, NULL, 1, 2, NULL, '2021-03-11 18:47:31', '2021-03-11 18:47:31');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_utilisateur_id_index` (`utilisateur_id`);

--
-- テーブルのインデックス `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commandes_produit_id_index` (`produit_id`),
  ADD KEY `commandes_utilisateur_id_index` (`utilisateur_id`),
  ADD KEY `commandes_client_id_index` (`client_id`);

--
-- テーブルのインデックス `devises`
--
ALTER TABLE `devises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `devises_pays_id_index` (`pays_id`);

--
-- テーブルのインデックス `diffusions`
--
ALTER TABLE `diffusions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diffusions_admin_id_index` (`admin_id`),
  ADD KEY `diffusions_utilisateur_id_index` (`utilisateur_id`),
  ADD KEY `diffusions_type_diffusion_id_index` (`type_diffusion_id`);

--
-- テーブルのインデックス `etats`
--
ALTER TABLE `etats`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- テーブルのインデックス `livraisons`
--
ALTER TABLE `livraisons`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `localisations`
--
ALTER TABLE `localisations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medias_produit_id_index` (`produit_id`),
  ADD KEY `medias_publicite_id_index` (`publicite_id`);

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `niveaux`
--
ALTER TABLE `niveaux`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_admin_id_index` (`admin_id`),
  ADD KEY `notifications_utilisateur_id_index` (`utilisateur_id`);

--
-- テーブルのインデックス `paiements`
--
ALTER TABLE `paiements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paiements_utilisateur_id_index` (`utilisateur_id`);

--
-- テーブルのインデックス `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- テーブルのインデックス `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produits_categorie_id_index` (`categorie_id`),
  ADD KEY `produits_type_cout_id_index` (`type_cout_id`),
  ADD KEY `produits_etat_id_index` (`etat_id`),
  ADD KEY `produits_transaction_id_index` (`transaction_id`),
  ADD KEY `produits_niveau_id_index` (`niveau_id`),
  ADD KEY `produits_livraison_id_index` (`livraison_id`),
  ADD KEY `produits_localisation_id_index` (`localisation_id`);

--
-- テーブルのインデックス `publicites`
--
ALTER TABLE `publicites`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `type_couts`
--
ALTER TABLE `type_couts`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `type_diffusions`
--
ALTER TABLE `type_diffusions`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- テーブルのインデックス `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateurs_user_id_index` (`user_id`),
  ADD KEY `utilisateurs_adresse_id_index` (`adresse_id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `adresses`
--
ALTER TABLE `adresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `devises`
--
ALTER TABLE `devises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `diffusions`
--
ALTER TABLE `diffusions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `etats`
--
ALTER TABLE `etats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `livraisons`
--
ALTER TABLE `livraisons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `localisations`
--
ALTER TABLE `localisations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `medias`
--
ALTER TABLE `medias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- テーブルのAUTO_INCREMENT `niveaux`
--
ALTER TABLE `niveaux`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `paiements`
--
ALTER TABLE `paiements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `pays`
--
ALTER TABLE `pays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- テーブルのAUTO_INCREMENT `produits`
--
ALTER TABLE `produits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `publicites`
--
ALTER TABLE `publicites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `type_couts`
--
ALTER TABLE `type_couts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `type_diffusions`
--
ALTER TABLE `type_diffusions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルのAUTO_INCREMENT `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
