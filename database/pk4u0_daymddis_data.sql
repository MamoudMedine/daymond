-- phpMyAdmin SQL Dump
-- version 4.9.6
-- https://www.phpmyadmin.net/
--
-- ホスト: pk4u0.myd.infomaniak.com
-- 生成日時: 2021 年 4 月 08 日 22:00
-- サーバのバージョン： 5.7.32-log
-- PHP のバージョン: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `pk4u0_daymddis`
--

--
-- テーブルのデータのダンプ `admins`
--

INSERT INTO `admins` (`id`, `nom`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'régie daymond', 'test@test.fr', '123456', NULL, '0000-00-00 00:00:00', NULL);

--
-- テーブルのデータのダンプ `adresses`
--

INSERT INTO `adresses` (`id`, `pays`, `ville`, `created_at`, `updated_at`) VALUES
(1, 'CI', 'Abidjan', NULL, NULL),
(2, 'SN', 'Dakar', NULL, NULL),
(3, 'CotedIvoire', 'Abidjan', '2021-03-26 07:31:59', '2021-03-26 07:31:59'),
(4, 'CotedIvoire', 'Abidjan', '2021-03-26 07:33:01', '2021-03-26 07:33:01'),
(5, 'CotedIvoire', 'Abidjan', '2021-03-28 18:04:14', '2021-03-28 18:04:14'),
(22, 'test', 'test', '2021-04-02 17:40:07', '2021-04-02 17:40:07'),
(23, 'test', 'test', '2021-04-02 17:42:06', '2021-04-02 17:42:06'),
(24, 'hshsj', 'hshzjz', '2021-04-02 17:54:14', '2021-04-02 17:54:14');

--
-- テーブルのデータのダンプ `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, '2021-03-24 18:48:58', '2021-03-24 18:48:58'),
(2, 1, '2021-03-25 15:04:26', '2021-03-25 15:04:26');

--
-- テーブルのデータのダンプ `cart_produit`
--

INSERT INTO `cart_produit` (`id`, `cart_id`, `produit_id`, `quantite`, `montant`, `created_at`, `updated_at`) VALUES
(16, 2, 4, '1', '13944', '2021-04-08 11:51:38', '2021-04-08 11:51:38');

--
-- テーブルのデータのダンプ `categories`
--

INSERT INTO `categories` (`id`, `nom`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Téléphone & Tablettes', '0xe877', NULL, NULL),
(2, 'Informatique & Multimédia', '0xe6aa', NULL, NULL),
(3, 'Véhicules', '0xe44f', NULL, NULL),
(4, 'Immobilier', '0xe7ba', NULL, NULL),
(5, 'Mode & Vêtements', '0xe651', NULL, NULL),
(6, 'Hébergement & Voyage', '0xe58a', NULL, NULL),
(7, 'Loisir', '0xea10', NULL, NULL),
(8, 'Pour la maison', '0xe988', NULL, NULL),
(9, 'Emplois & Formations', '0xeaf6', NULL, NULL),
(10, 'Entreprises & Services', '0xe0b3', NULL, NULL),
(11, 'Beauté & Bien être', '0xe291', NULL, NULL);

--
-- テーブルのデータのダンプ `clients`
--

INSERT INTO `clients` (`id`, `nom`, `contact`, `adresse`, `utilisateur_id`, `created_at`, `updated_at`) VALUES
(1, 'Awilo Logomba', '0523262425', 'Abidjan Cocody', NULL, '2021-03-24 18:48:58', '2021-03-24 18:48:58'),
(2, 'Aeetetza', '25468899', 'Abidjan', NULL, '2021-03-24 18:52:09', '2021-03-24 18:52:09'),
(3, 'Amane', '0574936826', 'Abidjan', NULL, '2021-03-25 15:06:54', '2021-03-25 15:06:54'),
(4, 'Amane', '749368226', 'Bingerville', NULL, '2021-03-25 15:10:12', '2021-03-25 15:10:12'),
(5, 'Amane', 'John', 'Abidjan', NULL, '2021-03-29 16:39:57', '2021-03-29 16:39:57'),
(6, 'TEST CW', '01020399', 'Port bouet, aeroport', NULL, '2021-03-29 16:41:29', '2021-03-29 16:41:29'),
(7, 'ab', '5555555', 'abidjan', NULL, '2021-04-02 11:55:30', '2021-04-02 11:55:30'),
(8, 'Kobenan Armel', '0789513103', 'port bouet', NULL, '2021-04-02 12:07:43', '2021-04-02 12:07:43'),
(9, 'H', 'J', 'Hh', NULL, '2021-04-06 16:36:20', '2021-04-06 16:36:20'),
(10, 'Bonjour', '01010101', 'Abidjan', NULL, '2021-04-06 16:49:31', '2021-04-06 16:49:31');

--
-- テーブルのデータのダンプ `commandes`
--

INSERT INTO `commandes` (`id`, `quantite_produit`, `prix_vente`, `autre_details`, `date_livraison`, `status`, `etat`, `produit_id`, `utilisateur_id`, `client_id`, `date`, `type_commande_id`, `created_at`, `updated_at`) VALUES
(2, 1, '460', 'qsdmflqmsdlfkqsdf', '2021-03-26', 'EN ATTENTE', 0, 6, 2, 2, '2021-03-24 18:52:09', 1, '2021-03-24 18:52:09', '2021-03-24 18:52:09'),
(3, 2, '102866', NULL, '2021-03-26', 'EN ATTENTE', 0, 2, 1, 3, '2021-03-25 15:07:50', 1, '2021-03-25 15:07:50', '2021-03-25 15:07:50'),
(4, 1, '49605', NULL, '2021-03-26', 'EN ATTENTE', 0, 3, 1, 3, '2021-03-25 15:07:50', 1, '2021-03-25 15:07:50', '2021-03-25 15:07:50'),
(5, 1, '51433', NULL, '2021-03-27', 'EN ATTENTE', 0, 2, 1, 4, '2021-03-25 15:10:12', 1, '2021-03-25 15:10:12', '2021-03-25 15:10:12'),
(6, 2, '99210', NULL, '2021-03-27', 'EN ATTENTE', 0, 3, 1, 4, '2021-03-25 15:10:12', 1, '2021-03-25 15:10:12', '2021-03-25 15:10:12'),
(7, 2, '27888', 'Details commande', '2021-03-26', 'STARTED', 0, 4, 1, 5, '2021-03-29 16:39:57', NULL, '2021-03-29 16:39:57', '2021-03-29 16:39:57'),
(8, 1, '13944', 'Merci !', '2021-03-31', 'STARTED', 0, 4, 2, 6, '2021-03-29 16:41:29', NULL, '2021-03-29 16:41:29', '2021-03-29 16:41:29'),
(9, 1, '49605', 'ff', '2021-04-02', 'STARTED', 0, 3, 2, 7, '2021-04-02 11:55:30', NULL, '2021-04-02 11:55:30', '2021-04-02 11:55:30'),
(10, 7, '299222', 'ff', '2021-04-02', 'STARTED', 0, 8, 2, 7, '2021-04-02 11:55:30', NULL, '2021-04-02 11:55:30', '2021-04-02 11:55:30'),
(11, 2, '85492', 'Autre detail heur 16h', '2021-04-03', 'STARTED', 0, 8, 1, 8, '2021-04-02 12:07:43', NULL, '2021-04-02 12:07:43', '2021-04-02 12:07:43'),
(12, 2, '102866', 'Jour', '2021-04-06', 'STARTED', 0, 2, 1, 9, '2021-04-06 16:36:20', NULL, '2021-04-06 16:36:20', '2021-04-06 16:36:20'),
(13, 2, '85492', 'Zzz', '2021-04-06', 'STARTED', 0, 8, 2, 10, '2021-04-06 16:49:31', NULL, '2021-04-06 16:49:31', '2021-04-06 16:49:31');

--
-- テーブルのデータのダンプ `diffusions`
--

INSERT INTO `diffusions` (`id`, `date_vente`, `texte`, `disponibilite`, `etat`, `admin_id`, `utilisateur_id`, `type_diffusion_id`, `created_at`, `updated_at`) VALUES
(1, '2021-03-15 21:19:15', 'Alert !\r\nUn virus s\'est introduire dans votre machine.\r\nPour le supprimer, pressez successivement les touches ctrl + alt + touche directionnel gauche', 1, 1, 1, 3, 1, '2021-03-01 10:47:31', NULL),
(2, '	\r\n2021-03-15 21:20:15', 'Alert !\r\nUn ransomware vient de chiffrer toutes vos données.\r\nNe touchez donc pas votre machine pendant 30 min au risque d\'endommager votre disque dur', 2, 2, 1, 3, 1, '2021-03-03 10:47:35', NULL),
(3, '2021-04-02', 'Seulement 2 produits disponibles !', 2, 0, 2, NULL, 3, '2021-04-01 15:17:43', '2021-04-01 15:17:43');

--
-- テーブルのデータのダンプ `etats`
--

INSERT INTO `etats` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Vendu', '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(2, 'Indisponible', '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(3, 'Stock épuisé', '2021-03-24 18:48:53', '2021-03-24 18:48:53');

--
-- テーブルのデータのダンプ `livraisons`
--

INSERT INTO `livraisons` (`id`, `produit_id`, `lieu`, `frais`, `created_at`, `updated_at`) VALUES
(1, 1, '704 Vella Expressway Suite 548\nSouth Harveytown, ND 00022', '266', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(2, 1, '704 Vella Expressway Suite 548\nSouth Harveytown, ND 00022', '266', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(3, 2, '4317 Keven Light Suite 537\nWest Bettie, AZ 43572', '979', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(4, 2, '4317 Keven Light Suite 537\nWest Bettie, AZ 43572', '979', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(5, 3, '46692 Emard Crescent\nWest Lacy, VA 44358-5714', '992', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(6, 3, '46692 Emard Crescent\nWest Lacy, VA 44358-5714', '992', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(7, 4, '956 Saige Ports Apt. 282\nHermannland, ID 31644', '883', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(8, 4, '956 Saige Ports Apt. 282\nHermannland, ID 31644', '883', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(9, 5, '89995 Brakus Mount\nLake Tyra, FL 47298', '900', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(10, 5, '89995 Brakus Mount\nLake Tyra, FL 47298', '900', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(11, 6, '532 Hickle Way Apt. 040\nMathewville, MA 63080-7870', '871', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(12, 6, '532 Hickle Way Apt. 040\nMathewville, MA 63080-7870', '871', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(13, 7, '397 Bahringer Canyon\nElfriedaside, CT 47984', '521', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(14, 7, '397 Bahringer Canyon\nElfriedaside, CT 47984', '521', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(15, 8, '386 Monahan Harbor\nHillport, DC 82270', '399', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(16, 8, '386 Monahan Harbor\nHillport, DC 82270', '399', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(17, 9, '9593 Joseph Radial\nKrystelton, AL 51715', '941', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(18, 9, '9593 Joseph Radial\nKrystelton, AL 51715', '941', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(19, 10, '34692 Abbey Rapids\nWest Luigi, AR 86352', '669', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(20, 10, '34692 Abbey Rapids\nWest Luigi, AR 86352', '669', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(21, 11, '71504 Kohler Hills Apt. 586\nEast Rebekah, SC 38308-1765', '742', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(22, 11, '71504 Kohler Hills Apt. 586\nEast Rebekah, SC 38308-1765', '742', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(23, 12, '940 Maritza Drive Suite 470\nRosinastad, WV 28831-8357', '528', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(24, 12, '940 Maritza Drive Suite 470\nRosinastad, WV 28831-8357', '528', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(25, 13, '771 Annabell Isle Suite 349\nLake Angelo, KY 02372', '491', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(26, 13, '771 Annabell Isle Suite 349\nLake Angelo, KY 02372', '491', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(27, 14, '438 Miller Islands Suite 073\nNew Adamport, IA 53262', '603', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(28, 14, '438 Miller Islands Suite 073\nNew Adamport, IA 53262', '603', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(29, 15, '70272 Weston Ports Suite 517\nNorth Margie, TX 22207', '378', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(30, 15, '70272 Weston Ports Suite 517\nNorth Margie, TX 22207', '378', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(31, 16, '45475 Leannon Highway Apt. 667\nLake Melany, NY 75803', '383', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(32, 16, '45475 Leannon Highway Apt. 667\nLake Melany, NY 75803', '383', '2021-03-24 18:48:54', '2021-03-24 18:48:54');

--
-- テーブルのデータのダンプ `localisations`
--

INSERT INTO `localisations` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Localisation 1', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(2, 'Localisation 2', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(3, 'Localisation 3', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(5, 'test', '2021-04-06 14:27:02', '2021-04-06 14:27:02');

--
-- テーブルのデータのダンプ `medias`
--

INSERT INTO `medias` (`id`, `nom`, `src`, `produit_id`, `type`, `created_at`, `updated_at`) VALUES
(1, NULL, 'https://picsum.photos/200/300', 1, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(2, NULL, 'https://picsum.photos/200/300', 1, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(3, NULL, 'https://picsum.photos/200/300', 1, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(4, NULL, 'https://picsum.photos/200/300', 1, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(5, NULL, 'https://picsum.photos/200/300', 2, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(6, NULL, 'https://picsum.photos/200/300', 2, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(7, NULL, 'https://picsum.photos/200/300', 2, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(8, NULL, 'https://picsum.photos/200/300', 2, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(9, NULL, 'https://picsum.photos/200/300', 3, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(10, NULL, 'https://picsum.photos/200/300', 3, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(11, NULL, 'https://picsum.photos/200/300', 3, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(12, NULL, 'https://picsum.photos/200/300', 3, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(13, NULL, 'https://picsum.photos/200/300', 4, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(14, NULL, 'https://picsum.photos/200/300', 4, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(15, NULL, 'https://picsum.photos/200/300', 4, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(16, NULL, 'https://picsum.photos/200/300', 4, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(17, NULL, 'https://picsum.photos/200/300', 5, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(18, NULL, 'https://picsum.photos/200/300', 5, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(19, NULL, 'https://picsum.photos/200/300', 5, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(20, NULL, 'https://picsum.photos/200/300', 5, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(21, NULL, 'https://picsum.photos/200/300', 6, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(22, NULL, 'https://picsum.photos/200/300', 6, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(23, NULL, 'https://picsum.photos/200/300', 6, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(24, NULL, 'https://picsum.photos/200/300', 6, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(25, NULL, 'https://picsum.photos/200/300', 7, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(26, NULL, 'https://picsum.photos/200/300', 7, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(27, NULL, 'https://picsum.photos/200/300', 7, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(28, NULL, 'https://picsum.photos/200/300', 7, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(29, NULL, 'https://picsum.photos/200/300', 8, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(30, NULL, 'https://picsum.photos/200/300', 8, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(31, NULL, 'https://picsum.photos/200/300', 8, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(32, NULL, 'https://picsum.photos/200/300', 8, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(33, NULL, 'https://picsum.photos/200/300', 9, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(34, NULL, 'https://picsum.photos/200/300', 9, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(35, NULL, 'https://picsum.photos/200/300', 9, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(36, NULL, 'https://picsum.photos/200/300', 9, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(37, NULL, 'https://picsum.photos/200/300', 10, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(38, NULL, 'https://picsum.photos/200/300', 10, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(39, NULL, 'https://picsum.photos/200/300', 10, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(40, NULL, 'https://picsum.photos/200/300', 10, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(41, NULL, 'https://picsum.photos/200/300', 11, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(42, NULL, 'https://picsum.photos/200/300', 11, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(43, NULL, 'https://picsum.photos/200/300', 11, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(44, NULL, 'https://picsum.photos/200/300', 11, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(45, NULL, 'https://picsum.photos/200/300', 12, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(46, NULL, 'https://picsum.photos/200/300', 12, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(47, NULL, 'https://picsum.photos/200/300', 12, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(48, NULL, 'https://picsum.photos/200/300', 12, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(49, NULL, 'https://picsum.photos/200/300', 13, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(50, NULL, 'https://picsum.photos/200/300', 13, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(51, NULL, 'https://picsum.photos/200/300', 13, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(52, NULL, 'https://picsum.photos/200/300', 13, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(53, NULL, 'https://picsum.photos/200/300', 14, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(54, NULL, 'https://picsum.photos/200/300', 14, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(55, NULL, 'https://picsum.photos/200/300', 14, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(56, NULL, 'https://picsum.photos/200/300', 14, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(57, NULL, 'https://picsum.photos/200/300', 15, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(58, NULL, 'https://picsum.photos/200/300', 15, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(59, NULL, 'https://picsum.photos/200/300', 15, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(60, NULL, 'https://picsum.photos/200/300', 15, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(62, NULL, 'https://picsum.photos/200/300', 16, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(63, NULL, 'https://picsum.photos/200/300', 16, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(64, NULL, 'https://picsum.photos/200/300', 16, NULL, '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(90, NULL, 'https://beta.daymonddistribution.com/public/storage/icon/20210407111836.jpg', NULL, 'icon', '2021-03-31 15:26:18', '2021-04-07 09:18:36'),
(113, NULL, 'https://beta.daymonddistribution.com/prod_img/lTtDIxGuYDLTBmnAbmFFbaE3b9XVQOAEmJTurLHZ.jpg', 17, NULL, '2021-04-01 15:59:43', '2021-04-01 15:59:43'),
(114, NULL, 'https://beta.daymonddistribution.com/prod_img/Uu6sZDM7JoukDBPggNOMP5fKK0VK6VtvGOqHx0za.jpg', 17, NULL, '2021-04-01 15:59:43', '2021-04-01 15:59:43'),
(115, NULL, 'https://beta.daymonddistribution.com/prod_img/isfTTOjkkqmcPi7ds6kOEN256qLwoHZNNYTrCZjG.jpg', 17, NULL, '2021-04-01 15:59:43', '2021-04-01 15:59:43'),
(116, NULL, 'https://beta.daymonddistribution.com/prod_img/IhkPIKUB4KOTxmYdmx9plPxPGA7YMeznPwfu0f1N.jpg', 17, NULL, '2021-04-01 15:59:43', '2021-04-01 15:59:43'),
(117, NULL, 'https://beta.daymonddistribution.com/prod_img/dGNK6ze87GX2i2BBYsjU0Qypb0jco4CVhEkyyLCB.jpg', 18, NULL, '2021-04-02 15:13:53', '2021-04-02 15:13:53'),
(118, NULL, 'https://beta.daymonddistribution.com/prod_img/pMfsTGAGHKdJYpOuxg6Cfv8V0D8I6oMAw7LCQoBm.jpg', 18, NULL, '2021-04-02 15:13:53', '2021-04-02 15:13:53'),
(119, NULL, 'https://beta.daymonddistribution.com/prod_img/aZdnWUPZO60Jk4sz92Lg51aTBSGXiQqwIQYJvHR8.jpg', 18, NULL, '2021-04-02 15:13:53', '2021-04-02 15:13:53'),
(120, NULL, 'https://beta.daymonddistribution.com/prod_img/rOGg0QeZUBdCZms478gMZX16W9tEpEDJu6r6z9V1.jpg', 18, NULL, '2021-04-02 15:13:53', '2021-04-02 15:13:53'),
(121, NULL, 'https://beta.daymonddistribution.com/prod_img/aKhwQ82AN4qye8cgdcy2yIFGAyOuGcRqbgskz4cT.jpg', 19, NULL, '2021-04-02 15:19:00', '2021-04-02 15:19:00'),
(122, NULL, 'https://beta.daymonddistribution.com/prod_img/vVIVIl1UuocI0BcPu5fXtLGnWmzgXh0XYbBkM4IA.jpg', 19, NULL, '2021-04-02 15:19:00', '2021-04-02 15:19:00'),
(123, NULL, 'https://beta.daymonddistribution.com/prod_img/gRiWfxKOjb2FGE9YlDZIIB9qoOYWXocONlbFouyb.jpg', 19, NULL, '2021-04-02 15:19:00', '2021-04-02 15:19:00'),
(124, NULL, 'https://beta.daymonddistribution.com/prod_img/uUugEMmFWA3ZwfTnZLCjvEgMcDOm36qHLN2ssdOw.jpg', 19, NULL, '2021-04-02 15:19:00', '2021-04-02 15:19:00'),
(125, NULL, 'https://beta.daymonddistribution.com/prod_img/N5xAurqMiLY7jCH2cV63eXAiasxm9VkMwOPGnKNI.webp', 20, NULL, '2021-04-06 14:44:02', '2021-04-06 14:44:02'),
(126, NULL, 'https://beta.daymonddistribution.com/prod_img/NRrZUmvDQxCem4aQpwBkf6pSD6jE2IWAsSP6pS98.webp', 20, NULL, '2021-04-06 14:44:02', '2021-04-06 14:44:02'),
(127, NULL, 'https://beta.daymonddistribution.com/prod_img/0XKe5STRP7ziRqUVdhK4sYsjEFW7UT9KwFUMNkYO.webp', 20, NULL, '2021-04-06 14:44:02', '2021-04-06 14:44:02'),
(128, NULL, 'https://beta.daymonddistribution.com/prod_img/CvQVtKpTrHvsh772ctMX6wJJNxW84I0l0mjD2IgO.webp', 20, NULL, '2021-04-06 14:44:02', '2021-04-06 14:44:02'),
(149, NULL, 'https://beta.daymonddistribution.com/public/prod_img/202104071344460.jpg', 27, NULL, '2021-04-07 11:44:46', '2021-04-07 11:44:46'),
(150, NULL, 'https://beta.daymonddistribution.com/public/prod_img/202104071344461.jpg', 27, NULL, '2021-04-07 11:44:46', '2021-04-07 11:44:46'),
(151, NULL, 'https://beta.daymonddistribution.com/public/prod_img/202104071344462.jpg', 27, NULL, '2021-04-07 11:44:46', '2021-04-07 11:44:46'),
(152, NULL, 'https://beta.daymonddistribution.com/public/prod_img/202104071344463.jpg', 27, NULL, '2021-04-07 11:44:46', '2021-04-07 11:44:46');

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_02_26_105201_create_adresses_table', 1),
(10, '2021_02_26_105236_create_utilisateurs_table', 1),
(11, '2021_02_26_105307_create_clients_table', 1),
(12, '2021_02_26_105402_create_categories_table', 1),
(13, '2021_02_26_105515_create_couts_table', 1),
(14, '2021_02_26_105536_create_etats_table', 1),
(15, '2021_02_26_105558_create_transactions_table', 1),
(16, '2021_02_26_105618_create_niveaux_table', 1),
(17, '2021_02_26_105647_create_livraisons_table', 1),
(18, '2021_02_26_105718_create_localisations_table', 1),
(19, '2021_02_26_105741_create_admins_table', 1),
(20, '2021_02_26_105809_create_publicites_table', 1),
(21, '2021_02_26_105841_create_type_diffusions_table', 1),
(22, '2021_02_26_105926_create_pays_table', 1),
(23, '2021_02_26_105946_create_devises_table', 1),
(24, '2021_02_26_110231_create_diffusions_table', 1),
(25, '2021_02_26_110256_create_notifications_table', 1),
(26, '2021_02_26_110320_create_paiements_table', 1),
(27, '2021_02_26_110338_create_media_table', 1),
(28, '2021_02_26_110418_create_produits_table', 1),
(29, '2021_02_26_110439_type_commande_table', 1),
(30, '2021_02_26_110440_create_commandes_table', 2),
(31, '2021_02_26_120059_create_pays_produit_table', 2),
(32, '2021_02_26_161635_create_type_couts_table', 2),
(33, '2021_03_08_140957_create_products_table', 2),
(34, '2021_03_19_162433_create_admin_password_resets_table', 2),
(35, '2021_03_24_105038_create_type_produits_table', 2),
(36, '2021_03_24_111959_create_sous_categories_table', 2),
(37, '2021_03_24_175507_create_carts_table', 2),
(38, '2021_03_24_175726_create_cart_produits_table', 2),
(39, '2021_03_24_192651_create_commande_produits_table', 2);

--
-- テーブルのデータのダンプ `niveaux`
--

INSERT INTO `niveaux` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'Vente flash', NULL, NULL),
(2, 'Plus récent', NULL, NULL);

--
-- テーブルのデータのダンプ `notifications`
--

INSERT INTO `notifications` (`id`, `texte`, `etat`, `admin_id`, `utilisateur_id`, `created_at`, `updated_at`) VALUES
(6, 'whois', 0, 2, 1, '2021-04-01 15:20:08', '2021-04-08 09:45:14'),
(7, 'Bonjour', 0, 2, 1, '2021-04-01 16:01:34', '2021-04-01 16:01:34');

--
-- テーブルのデータのダンプ `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('01b8cf01380b523ecbe4f7f86df6d91fcc687494ac5336803a91a3cea04e63e6b84bbfd8c6e80006', 2, 1, 'MyApp', '[\"admin\"]', 0, '2021-03-29 12:01:47', '2021-03-29 12:01:47', '2022-03-29 14:01:47'),
('04a734a5bbbf5c6ee0e3758058067937404e0dea55c3afebd4c1d80b2cca687b4f7be2db089a97a4', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-27 15:21:00', '2021-03-27 15:21:00', '2022-03-27 16:21:00'),
('058bfd2078ddcb1346da43e0b06ddc75e3d1ec40dcfd1d445b0261ce57d724abd8ec36531cd345a2', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 09:18:10', '2021-03-26 09:18:10', '2022-03-26 11:18:10'),
('0804d40056a9438fbece01306af1c29ae33c1cc41a1cb611df6c02b8e37e4bde065a417478dc0a25', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 09:24:09', '2021-03-26 09:24:09', '2022-03-26 11:24:09'),
('0a8a88dd786482d74a6161642235e0051aaeef45d55fc1967e1e7218efbce4b8f5996eb3173b24c3', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 16:32:44', '2021-03-26 16:32:44', '2022-03-26 17:32:44'),
('0aab4c44169341def05f2cadd299266fd7b51a9b4c9a3eb8a90910b1afc992923dc63e2dd56570ca', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 13:47:11', '2021-03-26 13:47:11', '2022-03-26 14:47:11'),
('0ae244a625ed34be6e1952c9b78e701bcdd79b6de7e7d2b3501a8e1892d09130a7dd7c66c614f9a9', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-27 10:44:41', '2021-03-27 10:44:41', '2022-03-27 11:44:41'),
('0cf79eab19f0eb14d1a9d43db0b2bd52d26b6785a8a5eccf41ec6a7cca600a3634e1bdbb8de81584', 3, 1, 'MyApp', '[\"admin\"]', 0, '2021-04-08 08:07:10', '2021-04-08 08:07:10', '2022-04-08 10:07:10'),
('0d0811070af1a301c283927a3631018a16459a81f75fc910f5506ca97a9c0be3ac15e829d5a4a37a', 2, 1, 'MyApp', '[\"admin\"]', 0, '2021-03-29 11:49:08', '2021-03-29 11:49:08', '2022-03-29 13:49:08'),
('1071e199ffde30f9c2aa94b46fa4dc5a91d7027060af8a00641fee2a437fc78bfd02e0ea4887cbea', 2, 1, 'MyApp', '[\"admin\"]', 0, '2021-03-29 12:00:04', '2021-03-29 12:00:04', '2022-03-29 14:00:04'),
('10ae977f047c91d3400547efe885d464e523b0dd61ea23b4ceadeed45dddca3d258b30c9cc65ea60', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 08:59:33', '2021-03-26 08:59:33', '2022-03-26 10:59:33'),
('1261c1b44a634deb3cbd8d4a9e3fa42e7ed8ddc71dffac13a57322c300280e8843184c077d375b63', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 08:28:43', '2021-03-26 08:28:43', '2022-03-26 10:28:43'),
('1659f240225a6ea8bd831aac645a8d18dcdde15076384e3e4e4085e85464d17b5a9a0fadb4edacc1', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-29 10:59:09', '2021-03-29 10:59:09', '2022-03-29 12:59:09'),
('1939a568ef1bdf4f9cdd0308c617d27b3ccb17f8cf44cb3ede53afa3e5b01d3299d973bead8d04e1', 3, 1, 'MyApp', '[\"admin\"]', 0, '2021-03-29 12:21:26', '2021-03-29 12:21:26', '2022-03-29 14:21:26'),
('1a499c9f36d2b2120f1135effa5bcfce5aae288af27c92212a90b97886462d2bb71e0f7d56d3d2e6', 4, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-28 18:08:48', '2021-03-28 18:08:48', '2022-03-28 20:08:48'),
('1bc831dfbaa127ecf6a4a14fd14e53a580ef211bde3bf7813dc69a3d2de9acac4f59289a3297bb3d', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 17:09:59', '2021-03-26 17:09:59', '2022-03-26 18:09:59'),
('1f748bd1bc2185dba359974698bb8beb71c3dce5b628b8eb724be93f4af3622d7d2888c3e8dad9bb', 3, 1, 'MyApp', '[\"admin\"]', 0, '2021-03-29 12:55:29', '2021-03-29 12:55:29', '2022-03-29 14:55:29'),
('205332912f97fdbcac1be9d8a6431808a29524dad2702d95b678903cd86a49f2455371b6b2eead4a', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-27 11:43:30', '2021-03-27 11:43:30', '2022-03-27 12:43:30'),
('20bc806dd2aa8ad2b6b8f9d2a93066b0af0116268f5516a5d86bd7ffe8c13af7310c5d0117cd5e50', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-27 18:59:37', '2021-03-27 18:59:37', '2022-03-27 19:59:37'),
('215ac6fa4c37af0f0d2a790c34c50577100e909f382b9fb94b3e238da06209d56b51ed4adc8f8981', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 09:24:51', '2021-03-26 09:24:51', '2022-03-26 11:24:51'),
('265f7cf04d27483d7379d2ed3d69470b55ce57d08ead1a0de7d436b881cf32fe1a973e4511e12057', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 17:19:12', '2021-03-26 17:19:12', '2022-03-26 18:19:12'),
('29346ed6f2653bbe8194e00de9f5dbce1b7e78d488da8088d9806cfd5a9139e36298369038b0d09a', 3, 1, 'MyApp', '[\"admin\"]', 0, '2021-03-30 13:04:10', '2021-03-30 13:04:10', '2022-03-30 15:04:10'),
('2c0a96e06fc00a25cd92d5692cdbac4d57dfb2bd1e77db3094b9548336b5dcbc744eb2bbe657b955', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 17:06:01', '2021-03-26 17:06:01', '2022-03-26 18:06:01'),
('2ca35e4e2dc8225c6bdcbce4c4134c123b524a7f219ae5ced276c1163420567d560a3904ed7f126e', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-27 11:15:53', '2021-03-27 11:15:53', '2022-03-27 12:15:53'),
('2d9d22e00e766649ae4221617b0ef4ea6ebc910537eefd6264300894021ab30bfa763eb27ba3879c', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-27 15:42:22', '2021-03-27 15:42:22', '2022-03-27 16:42:22'),
('335598b1a1111baa4976b943dbc208d6924352e3c171fd1631ed113763fef5d875180189a7a3f371', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-27 09:30:45', '2021-03-27 09:30:45', '2022-03-27 10:30:45'),
('346019c61ed439475ac139af5bf36d66dcae3f218dfc2593256cd42ab71fdac4c0fd36e35f7611f7', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 18:43:29', '2021-03-26 18:43:29', '2022-03-26 19:43:29'),
('36d23dc7c0aa82b5803d6e8f25a7e61ac9c2356153c89ace74439fc7c8c8bcd3879ffd1f5ec71c56', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 08:36:21', '2021-03-26 08:36:21', '2022-03-26 10:36:21'),
('387fe7f9e4925225f5d842506fb2ebd8076fa975070d724cbde0aac5635db57337895a75a40e6891', 3, 1, 'MyApp', '[\"admin\"]', 0, '2021-03-29 12:27:44', '2021-03-29 12:27:44', '2022-03-29 14:27:44'),
('3b70d2cc5e31add829f2fdd889e4d75e4bf9c229be8d27cda817936349111d8e6c1db4e7c866d78f', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 16:52:19', '2021-03-26 16:52:19', '2022-03-26 17:52:19'),
('3bf4f85b05e515eb5a92e152c901a0096cc647fe2a3e0d07dbcbc4fb147b8ac88c9324624844e415', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-29 11:00:35', '2021-03-29 11:00:35', '2022-03-29 13:00:35'),
('3d5d99e6576ecbfb5e31b78eda4bab0f2f933465da75410f7ccd4e9b628333f58e6880cb50eada01', 3, 1, 'MyApp', '[\"admin\"]', 0, '2021-03-29 12:27:39', '2021-03-29 12:27:39', '2022-03-29 14:27:39'),
('41abefe0f01ea5bbd286ad29585e77f2a81ebc7e5148f12a8b5dd65c53fb9ce713f07163441f9fce', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 12:25:32', '2021-03-26 12:25:32', '2022-03-26 13:25:32'),
('444be93c6c7ffb10562ddbc2d354dc0b3b9be9ff348331a88f3034b5b1382eab46064313ddae66fd', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 12:24:03', '2021-03-26 12:24:03', '2022-03-26 13:24:03'),
('45e0aa28bd10d23e80e86b9dfa5a0511376a362b0fc797e801e877dfd711083e80cf1aec21b43ea8', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 14:10:27', '2021-03-26 14:10:27', '2022-03-26 15:10:27'),
('466c4d592253d8e6c9eeeb77533cf9a83f71c19286e3b3034c2619b4ea66543337cde4eb76b09a65', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-27 15:45:48', '2021-03-27 15:45:48', '2022-03-27 16:45:48'),
('4ab53b242b5b3fceb95a0727cad78baa6b1901e4f023a4c73a2f45ea2f95648b3c3c1545edeb055a', 2, 1, 'MyApp', '[\"admin\"]', 0, '2021-03-29 11:56:45', '2021-03-29 11:56:45', '2022-03-29 13:56:45'),
('4ab7a63ecdedc16ce501b1644a047ce848045f7cfaa2efd710ce6a76455776a3a95c44ca364313ab', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-28 18:11:31', '2021-03-28 18:11:31', '2022-03-28 20:11:31'),
('50e3c6a4034f1ca85b2f273de8183e79e637a7db7c21d0ac872e91067c09854773fd9bb6833e8778', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 17:23:49', '2021-03-26 17:23:49', '2022-03-26 18:23:49'),
('56bc0b6563f133c9119a81d4f21e44946e9c6d83adbc61adf1f011047867bf4bccbb28fcedc892e7', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-27 18:59:39', '2021-03-27 18:59:39', '2022-03-27 19:59:39'),
('56bd0d457f1fc98b49f04af57df2846b7240a1180c065b65fe4377936878dee615f8635431367605', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 16:46:06', '2021-03-26 16:46:06', '2022-03-26 17:46:06'),
('5a5e59b3dfff29fb5ada87cfb0c2115e6e4b84a6a720eb048399ce58c787035a5cd8dc2722f223d7', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 09:25:47', '2021-03-26 09:25:47', '2022-03-26 11:25:47'),
('5dc175cbd288f25d2a205993c22fdf043d962cf080711fd89f35ed3b0221b75e752c17799c51d532', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 19:30:22', '2021-03-26 19:30:22', '2022-03-26 20:30:22'),
('5e3d60ef7ab4693e5248462308b0dcd11866d35f4333a13afa2fe3b0ec18a83df12291db6d61d89a', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-28 18:21:58', '2021-03-28 18:21:58', '2022-03-28 20:21:58'),
('5e68004a421e5eb97fd889426630364732edd7f1143ae5baa9eab92e974f5b346996d213978c1090', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-27 13:24:29', '2021-03-27 13:24:29', '2022-03-27 14:24:29'),
('60ea852e53947a5bfd3172b8b933ca305e6eb7912b66bd14c805f968a15945fa061dc58686175e61', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-16 09:51:05', '2021-03-16 09:51:05', '2022-03-16 11:51:05'),
('615bdd1185e0b08a773b8f544a11b3aec000b464dbe1a17127475a0276027f7e2a8bfad2482436c2', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 18:11:29', '2021-03-26 18:11:29', '2022-03-26 19:11:29'),
('62ee78f3211d78aa999c73e92f20ccacd7978f040fed62acb4c0f0c5fdf249ed49bf2ace6e4fbdab', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 18:30:09', '2021-03-26 18:30:09', '2022-03-26 19:30:09'),
('6309a39ec172d0784eb08c90b84211cecdc3eecaf6c3184b82edf3b586507b62bdab9b45ad622108', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-29 10:59:22', '2021-03-29 10:59:22', '2022-03-29 12:59:22'),
('634984491f672f9582007bd81353b65a923a2d29807f5323f0f34a6f6b2e04e226793690dcf33013', 3, 1, 'MyApp', '[\"admin\"]', 0, '2021-03-29 12:21:59', '2021-03-29 12:21:59', '2022-03-29 14:21:59'),
('671bf87cda901536211a3fd7db7c39e3fdb7d79a8600693f776988e940d4bd153b16d19b529e081c', 3, 1, 'MyApp', '[\"admin\"]', 0, '2021-03-29 12:21:57', '2021-03-29 12:21:57', '2022-03-29 14:21:57'),
('681654bd18aa8da6d8fe0f419c8479c3861466c4c28e7f1a0949f1e76e81146cc6a53c4950b826ef', 5, 1, 'MyApp', '[]', 0, '2021-03-17 07:17:57', '2021-03-17 07:17:57', '2022-03-17 10:17:57'),
('683da00720c1a2a7532ad54c8ba57b53a7c8c8d8c7c8ee9368d203f65368126b7ce5077b911f4192', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 17:08:21', '2021-03-26 17:08:21', '2022-03-26 18:08:21'),
('6886b1ee6ff6072c25883ab5972e671de6dfea892069749f53979ea2a3e70d526538e668c859d9be', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-27 14:38:07', '2021-03-27 14:38:07', '2022-03-27 15:38:07'),
('695baabf86092dee1e47ee7580c982d8e6b89260870adaaf736a61cf203ab174601d4cd8360d0566', 11, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-18 12:40:31', '2021-03-18 12:40:31', '2022-03-18 15:40:31'),
('6971134dc0eec904e971f7fc4bc5d7db1607eff70c0e5303d87058bc0c0dce71e2cc28f2e5a7c5c5', 3, 1, 'MyApp', '[\"admin\"]', 0, '2021-03-30 13:06:36', '2021-03-30 13:06:36', '2022-03-30 15:06:36'),
('69bfd577a9491f0b138ffb01155c1384262b196862a60051857e145be9d341ca488a3fe3dad0a402', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-27 14:05:43', '2021-03-27 14:05:43', '2022-03-27 15:05:43'),
('69f2f4f003b8037d3fd09534e47792b5daa28ece05574fca976eff87e7a6ed733a2d0c29575fdfc7', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-17 06:09:10', '2021-03-17 06:09:10', '2022-03-17 09:09:10'),
('6b8ca769e32f38e4cd30a07cae57b52f8d422bb50975d5f73c6414b4eae2ba8b1a931e970576af87', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-16 09:51:59', '2021-03-16 09:51:59', '2022-03-16 11:51:59'),
('6bdeae9e154bc502cab2dbb4b8ffd404f25ad3125a4b320877ff0335824e8c0450685028f96ab351', 11, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-19 06:20:47', '2021-03-19 06:20:47', '2022-03-19 09:20:47'),
('6d311194e89dfde14d1bd1b10a378123e6da05a270d9e870f808cddf251511785dbdbbce268f814e', 11, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-18 12:40:26', '2021-03-18 12:40:26', '2022-03-18 15:40:26'),
('6e30eff7a1d3a060e516062adec948eec90ccf057befe3f2acf37c79cf5b6a45e7a1a2ac0b1a833d', 11, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-19 06:31:26', '2021-03-19 06:31:26', '2022-03-19 09:31:26'),
('6f5169ce4c6a27347f9044ce2425a3ce7e0dcb7913df06f694f41730a752118c1d44d26f90790e16', 11, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-19 08:15:15', '2021-03-19 08:15:15', '2022-03-19 11:15:15'),
('6f9d64d9bbea02c20bc89083ae812a72eff24d2fdb5297a11780056f91882640b6871297abaa7fe2', 11, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-18 15:12:33', '2021-03-18 15:12:33', '2022-03-18 18:12:33'),
('7054852328f6a59c628c252983f6833d921f29d3a5616d9988abc133b020a5479a9b50a4a5d33344', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-29 06:59:22', '2021-03-29 06:59:22', '2022-03-29 08:59:22'),
('71940291a9e0299551307144e54929553175560a16fbb5de8f346132db59636f5fab300a641c8d53', 7, 1, 'MyApp', '[]', 0, '2021-03-17 07:36:50', '2021-03-17 07:36:50', '2022-03-17 10:36:50'),
('71994e2766f3088d9c06ab27799e2eb3809ab8814ac6e2ad2d9512b0f2bd6190f2cbce099dbd8c95', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 08:18:42', '2021-03-26 08:18:42', '2022-03-26 10:18:42'),
('738638099b26a2fbda3d6d43a5abbf4647aeac13ce0a8ca907ce98c589bc670d9e4407f1d6ee883d', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-27 10:02:51', '2021-03-27 10:02:51', '2022-03-27 11:02:51'),
('74362b84bc31f9217504b7281cdf6f149bcd3f57159fe54ea3d916827c3af2f19b14feae0a0477f9', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-27 09:22:53', '2021-03-27 09:22:53', '2022-03-27 10:22:53'),
('743681ec59dfc64cd2fc99509055f06edd1a30fbcd8f35ac8ae5eb96bb32fb1d5051b29b0a6241d4', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-27 09:30:13', '2021-03-27 09:30:13', '2022-03-27 10:30:13'),
('758683bac04941e1c764ebae75a7bd6f598ba471d6253b0fde9f9b3be31cad2e8859a500d0c73971', 11, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-18 14:25:53', '2021-03-18 14:25:53', '2022-03-18 17:25:53'),
('75d4472b0577425d802519d451a1217f36dd5652ecdcb258f9abb459e916481c4ba5faf34e3d2a81', 2, 1, 'MyApp', '[\"admin\"]', 0, '2021-03-29 11:57:06', '2021-03-29 11:57:06', '2022-03-29 13:57:06'),
('779f6939035daae913156dd2586fef6f47d3aae9f1ba8d55f13b80ab0748bbd0a1bb4d0f97f8e778', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-29 11:07:27', '2021-03-29 11:07:27', '2022-03-29 13:07:27'),
('78307b2db9dcba9a93a1c3c4a6b14f0d9a6124ffecaf6db06b64f91ad3c00979c68ac1c66ab5a35e', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 08:29:25', '2021-03-26 08:29:25', '2022-03-26 10:29:25'),
('7b54cb236bc9c9b582c9d94e14e3868e0542832c2606ab3bae2795bd9046cb40b101a5739521dc0b', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 16:42:46', '2021-03-26 16:42:46', '2022-03-26 17:42:46'),
('8290224623615b7092214246024d3b8c5c9a65048762ec337f93aa1fd129316387c22d947bf86e95', 3, 1, 'MyApp', '[\"admin\"]', 0, '2021-03-30 08:52:13', '2021-03-30 08:52:13', '2022-03-30 10:52:13'),
('83565f4b88a53d2d2854841bdb653d9cab08df7603683ec1754e2dde051ae149a2a890206f3cefbd', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 16:49:35', '2021-03-26 16:49:35', '2022-03-26 17:49:35'),
('83a5ae52f9d7b1c6d5ba3e98a803602fe4a4a1418b718b1506faef6093f6f3da3b06448f2d7e3222', 15, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-18 13:09:47', '2021-03-18 13:09:47', '2022-03-18 16:09:47'),
('864cab8e4e71a8122ed2b8afa3989b73a536d52e37d80d335b47700dda32d760c0c546faa9a6a0af', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 13:45:08', '2021-03-26 13:45:08', '2022-03-26 14:45:08'),
('865d7fe1205237971fcf14372ec68ef98e513493d2d4fb40acf0cb0418f13248556610aea6c071cc', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 18:24:55', '2021-03-26 18:24:55', '2022-03-26 19:24:55'),
('8aa33423efcb278f6836aa6793dff625fea9c31eeac23e42b8125b562e08f25f3836eb23dae388af', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-29 04:18:07', '2021-03-29 04:18:07', '2022-03-29 06:18:07'),
('8b9047b8c851e166aa8127b21cde80131ab362b304bdc407a6f2639c42c06572acc5fdde27138c43', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-28 18:58:33', '2021-03-28 18:58:33', '2022-03-28 20:58:33'),
('8c650f39940ec8a7663f911f1df1a22091f83fb115c0af3a1edb271b2e6ecd3107278049f1c222a8', 11, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-18 13:36:05', '2021-03-18 13:36:05', '2022-03-18 16:36:05'),
('8c76d6e1cd2fbdcc8bd65a066695bb8cf3deafb21370a43ba904ed7af65150fb67f060a51f8ae7c3', 11, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-18 12:47:17', '2021-03-18 12:47:17', '2022-03-18 15:47:17'),
('8ebe425698cb9168027695cb19efba4f7844dc020c918f865394e6eb5f556cf2557655e1197b9a5f', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 09:04:08', '2021-03-26 09:04:08', '2022-03-26 11:04:08'),
('916f23328c4d693103b5fd6639c52fff937401e97b9099c12a95eaac27d1ec0b83303ceb707af5f9', 3, 1, 'MyApp', '[\"admin\"]', 0, '2021-03-29 12:28:35', '2021-03-29 12:28:35', '2022-03-29 14:28:35'),
('919f116abc4c3d78f95ce19ac8592897d30807c260c89122dd13230da87b35ea7bb4f73dab9f04c2', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-04-01 11:17:01', '2021-04-01 11:17:01', '2022-04-01 13:17:01'),
('91bd2ab1d960c9ef069f65ed943ef75596827466dd50c4523131fbf9de5de70e8bc2f53d46e223a1', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 17:16:29', '2021-03-26 17:16:29', '2022-03-26 18:16:29'),
('96d1be387cb57885f1106c51d40c46dfd392101bcf2dfeda72091a20625e7de1c827031c40d6fd47', 2, 1, 'MyApp', '[\"admin\"]', 0, '2021-03-29 11:57:02', '2021-03-29 11:57:02', '2022-03-29 13:57:02'),
('987a3796a2b5bb4f307553d86985ab05f44b4d0c656f803a9ddda01b6e2ba98470909297b54a7545', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 16:38:31', '2021-03-26 16:38:31', '2022-03-26 17:38:31'),
('9999d564100dd2fcc47493a471e2c9e959bd451358741cfc2702998536457ff9ba7a4ff4f4148c08', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-27 10:28:37', '2021-03-27 10:28:37', '2022-03-27 11:28:37'),
('9a5a3a007b558691352b624d5f24f8f9b3df5868d19b58ac7b24fbfe60fd6aaa6b992ecca4fa3239', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-17 06:27:53', '2021-03-17 06:27:53', '2022-03-17 09:27:53'),
('a0a41a760bf0df9910649aeaaf51e19a05799f4c718dd7c7ded673dbee28184816df8dba833590c2', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-28 18:42:53', '2021-03-28 18:42:53', '2022-03-28 20:42:53'),
('a0bb2cb31ac1660e0587787f9556e886fadecf1b3564b12bb85ed84c48cbbf38b324c9a844d82914', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 19:17:09', '2021-03-26 19:17:09', '2022-03-26 20:17:09'),
('a58c93face49930e7345a25c9ffe7c6e40b4b9a10f048bd405ea7cd05d733e00a3df4b49f0cd74ad', 11, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-18 12:36:43', '2021-03-18 12:36:43', '2022-03-18 15:36:43'),
('a8c3f7906fddeae167e445ef61f8fd26f8b19860909ecb448dec2b7dcc8777df404588ebfd2c8699', 2, 1, 'MyApp', '[\"admin\"]', 0, '2021-03-29 12:01:05', '2021-03-29 12:01:05', '2022-03-29 14:01:05'),
('a99ceabf0e74e799310791d342a9acf15040bbcba711dc8b07646343196b691b8a1851949947fc88', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 17:33:22', '2021-03-26 17:33:22', '2022-03-26 18:33:22'),
('a9cdec6db1bf996ab690ed2d44ceebe28a2ff6227305b8bd9b7b8c3fefe1d1ebac641419c3b60949', 15, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-18 13:07:29', '2021-03-18 13:07:29', '2022-03-18 16:07:29'),
('a9e6a8d2b20b03cb400d8fe2f6b006aa95cb1c08cd249c7e685cf25a88dc795f0c2be55b0bf5d80d', 15, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-18 13:09:49', '2021-03-18 13:09:49', '2022-03-18 16:09:49'),
('ac3ab9285db043affb9e47a452893698f26a72cb31d440eb8a47f978f93a6f06ade7ffd788eb2a78', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 08:03:16', '2021-03-26 08:03:16', '2022-03-26 10:03:16'),
('acb08c7fd6e029e0e24427ba7b586bb83a69b02361eb0fda3b8cd2b9e32fd137069168e033818c45', 11, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-18 14:22:26', '2021-03-18 14:22:26', '2022-03-18 17:22:26'),
('affd6b2fc04a90caa097c00573c6287fd6b2838de74439f81eac64b8db47c32460139cfdafe73ef5', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 09:46:33', '2021-03-26 09:46:33', '2022-03-26 11:46:33'),
('b27d7877ad5b5482bd13e93213488c003c9bb82a7687229577f833b764d29f177435e4ff850974bb', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 17:39:24', '2021-03-26 17:39:24', '2022-03-26 18:39:24'),
('b2d38cd3a415b0c9a00803afd685b621e64e9b4c7ce047014e692a76e596690adeeefe78d0e6c221', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 16:50:50', '2021-03-26 16:50:50', '2022-03-26 17:50:50'),
('b4fcd4c1c44fd2fe5e532cddb18525984847d37edc6e97e969d22eeaae7014ad5b979d4cfd487a96', 15, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-18 13:11:18', '2021-03-18 13:11:18', '2022-03-18 16:11:18'),
('b51c145ed1a6ea1851098d86b47567058a1c231e57cc82bcb70101b6ffa5b543a3f06bc6c2a5463c', 11, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-19 08:56:44', '2021-03-19 08:56:44', '2022-03-19 11:56:44'),
('b52d648ea1c942aa9dd76fda9a4ad1f7731ef7f32f503a9b959968a7ebc4c0463003685fc31fc1cf', 11, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-18 14:58:01', '2021-03-18 14:58:01', '2022-03-18 17:58:01'),
('b6dbfcb949f2a9aca26f62e0bcdaaa3189ada334c660287649d8b65381bd064dd95eb1e083fe0f5f', 11, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-18 12:43:54', '2021-03-18 12:43:54', '2022-03-18 15:43:54'),
('b7624b15d4a65288c69e0b24e92e0042f29cdbc2fa0ac5cbc2025026113044286245a06c91e5b97a', 11, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-18 12:37:00', '2021-03-18 12:37:00', '2022-03-18 15:37:00'),
('b85e0ad9ab1bd794106b7356e7a19329e3571206626c4880f34cafe12f96a0eac90a75c73cd54e17', 3, 1, 'MyApp', '[\"admin\"]', 0, '2021-03-29 12:28:39', '2021-03-29 12:28:39', '2022-03-29 14:28:39'),
('b912d6b31edb53e1b42af277319fc9275af9233e742960029d624fa86f37494661da7595480308c3', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-04-02 12:06:31', '2021-04-02 12:06:31', '2022-04-02 14:06:31'),
('b975455d39a54b7481b5e590ad6db345516aa1a27d26437b386c751b2b4d35cb9fee28382d65dbd3', 11, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-19 06:55:34', '2021-03-19 06:55:34', '2022-03-19 09:55:34'),
('ba15307bb771ea18879dde3a213274944f21e8333662674526d90c4387525ee6961750073e3dc8c5', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-17 06:27:05', '2021-03-17 06:27:05', '2022-03-17 09:27:05'),
('bcbfa1ce200ffaf530d6af1293d734d164846c486a98a41987b8c08132043a12a48f94e7a9315d16', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 16:56:47', '2021-03-26 16:56:47', '2022-03-26 17:56:47'),
('bcdb29e510c082ba954450999d77babe6a935b3ec0ef550881c006245c18c111c5d2629457fa1649', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 09:40:56', '2021-03-26 09:40:56', '2022-03-26 11:40:56'),
('be92a08f73128cdf37d46917eaff60d1ab2676c19db220569173bd428e8be1e8b6f91c97f08a001e', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-17 06:27:00', '2021-03-17 06:27:00', '2022-03-17 09:27:00'),
('beb11eb4c5f375590f28745bbc528e2df314209a093d48f41a547b9f4a2f07ebb73aa32ce170ca85', 15, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-18 13:12:31', '2021-03-18 13:12:31', '2022-03-18 16:12:31'),
('bf1cb91e63c708b1fff0a94f15b052cd0beafeaaba244105259cfdd09f5ae7575b5bc1abfff39f8e', 11, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-19 06:43:14', '2021-03-19 06:43:14', '2022-03-19 09:43:14'),
('c1c687edab4967fafa498ed565fcf03f1a60496cbfcd103f927d9bb466b4c3232d4f7a875431484f', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 16:59:35', '2021-03-26 16:59:35', '2022-03-26 17:59:35'),
('c2a1f85c588a41e0f1d6f17bec3a573b9572e36c6cc019dbab05b76c2596201ed5914b9ae3e581d2', 15, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-18 13:10:59', '2021-03-18 13:10:59', '2022-03-18 16:10:59'),
('c62f468178882544e1bb9ef5f6fe2bcc660957b5db57523e568c0b6fee4a5b183187b96fc021f906', 3, 1, 'MyApp', '[\"admin\"]', 0, '2021-03-29 12:55:13', '2021-03-29 12:55:13', '2022-03-29 14:55:13'),
('c718f643553f0a5620a7a78922b0e302ef9519e82ba547c3224967f2225565b540e97d5e28e69cd4', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-27 14:48:30', '2021-03-27 14:48:30', '2022-03-27 15:48:30'),
('c7ad9206a6f0868b21e0b0c6096d0d69b82e3922b27c62d7b7dfd9fef58f6e6601350282380a9d5d', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 13:56:25', '2021-03-26 13:56:25', '2022-03-26 14:56:25'),
('c7c3fbc60112223f2d0886f030ee01037882cd16a1dd00b2ec274f7dfc72147d24bdfe1515533449', 2, 1, 'MyApp', '[\"admin\"]', 0, '2021-03-29 12:01:02', '2021-03-29 12:01:02', '2022-03-29 14:01:02'),
('c9adf72f0690718a8c479adcd444083c1819f0f06858006bff3caff2580fcbdf2a859c6f1f7e1ac9', 11, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-18 12:08:19', '2021-03-18 12:08:19', '2022-03-18 15:08:19'),
('ca75a3904ee38172f1545ccf5e36646ad8ddf15ae4d6ae7b92b576273643095dc1a33568f0d8336d', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 09:24:42', '2021-03-26 09:24:42', '2022-03-26 11:24:42'),
('cc155e2487b9c904f55ecb96ea67ffc61abfaf483981a0bcecbcbd42dcde3f2cea3b761b1c616810', 3, 1, 'MyApp', '[\"admin\"]', 0, '2021-03-29 13:07:55', '2021-03-29 13:07:55', '2022-03-29 15:07:55'),
('cc9597ddc65192ee7010fd1d65f728f3996c7de079111fed168eb76f56dd026957a279926d2daf8a', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 08:11:59', '2021-03-26 08:11:59', '2022-03-26 10:11:59'),
('ccb454de9f3c8afbad4c9db510f6cf283d8a609b638216433a07235eb8a258d45f30a6b5e068a690', 4, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-28 18:07:24', '2021-03-28 18:07:24', '2022-03-28 20:07:24'),
('ccdb5b8fd21eed183b4082b98a2ec07a01ba1286477193f8def407e240dd912577ef44e51b8488c7', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 09:33:52', '2021-03-26 09:33:52', '2022-03-26 11:33:52'),
('cf0d67945f81740d53737555d61a394622e049cb8b0001526d6ce63c41935109f0d5176ad8cb81e6', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-27 15:48:14', '2021-03-27 15:48:14', '2022-03-27 16:48:14'),
('d06fef10e993f85c50355c8b42e4bd1a5aac22c723233d4c5a76a1eec73de609b1f51b314191d4f9', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-27 08:47:40', '2021-03-27 08:47:40', '2022-03-27 09:47:40'),
('d125e7237d4b18633ef4fb68ae8ebc8fd7b67281910fedc932da04f40f95dda4f7b2c9bf8625bd52', 11, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-19 06:58:25', '2021-03-19 06:58:25', '2022-03-19 09:58:25'),
('d175ed7c7b1b25ae753d675b82be329f79912d5aa588a9b0497234059eea80b0fa97acc3d85d546a', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 13:38:30', '2021-03-26 13:38:30', '2022-03-26 14:38:30'),
('d59ca920ac4fd8a2f68acc703251ffa9ca61ee4ec447adcd1a85d1b91ca3001966d7c87a8dcab215', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 14:00:28', '2021-03-26 14:00:28', '2022-03-26 15:00:28'),
('d7d6e59c1b070493daa1e9a8cccb110a3d26c2684e4d701957e4bc626f6925182a53b77f1562eb5c', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-29 11:03:58', '2021-03-29 11:03:58', '2022-03-29 13:03:58'),
('d7efba98a291fc23220cddda357ba3f1a8af0018fdda1e3b0d9cf6f13cc57e802c17b82f5c21ca4b', 15, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-18 13:07:52', '2021-03-18 13:07:52', '2022-03-18 16:07:52'),
('dadc492e8142b3af3e7e62df51f439e5d600ceb002e2a88b28e09c74433c23a6a1ced286bf2f6223', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 18:22:54', '2021-03-26 18:22:54', '2022-03-26 19:22:54'),
('db4a81500ed498093412d68d7116be991a7ea7dc0f8b05144d197410c4a48e3983075e56557d3ad5', 11, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-19 11:06:34', '2021-03-19 11:06:34', '2022-03-19 14:06:34'),
('dbf98e4bdd3f8e4e0f1cb78ad01603cb2ee13b8b75c6146af2d0d686ae20b412b26670bd1f685ac2', 11, 1, 'MyApp', '[]', 0, '2021-03-17 08:19:55', '2021-03-17 08:19:55', '2022-03-17 11:19:55'),
('ded0238321aaeebe69e2a797090f695a4d1d42475735ac7a5214337981afbbba6eababd1e4d67f7e', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-27 11:52:28', '2021-03-27 11:52:28', '2022-03-27 12:52:28'),
('e11be5f7bcacdcfbc6f8e4a9f3770a358ae941e3d9b908119702cf7cae95c4b20ccd6318e4a64a91', 11, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-18 14:28:08', '2021-03-18 14:28:08', '2022-03-18 17:28:08'),
('e122c3eaaaaf4711372a149298017367d3edb43c9705746ec2999213710bc2826ce511206037f487', 2, 1, 'MyApp', '[\"admin\"]', 0, '2021-03-29 11:57:38', '2021-03-29 11:57:38', '2022-03-29 13:57:38'),
('e1ddf8cdee4e41033f9cf7b6b29aeec1e220f831dc8a9e5c7c783529adc79a6c345a0cc9bf455ad3', 15, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-18 13:25:50', '2021-03-18 13:25:50', '2022-03-18 16:25:50'),
('e594d086975c272df1756887dbc11199d1329d1384cbed8d3aa8352e0ac5cddaac3f5a5dec5f6ffc', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-27 15:12:47', '2021-03-27 15:12:47', '2022-03-27 16:12:47'),
('e6adc1809fe37aaf00c09e52465747022fddfde74b5c18950b8bd60478d86bb088a454f8365a9f62', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 13:41:10', '2021-03-26 13:41:10', '2022-03-26 14:41:10'),
('e9f47f819c79812c8eaabbd9cfcc2d20ecde1d095ed76c01de1884f3e059918deec77d5dcf7de876', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-17 06:32:43', '2021-03-17 06:32:43', '2022-03-17 09:32:43'),
('ea22fe45a5073d7154681ca4e7da09717e976aca962d0b16e4a9c7abc7450d8cd7466f91c4d3570e', 6, 1, 'MyApp', '[]', 0, '2021-03-17 07:21:54', '2021-03-17 07:21:54', '2022-03-17 10:21:54'),
('ea823d60d1730d5444120064edeb7f1000813863783d343afaee9878459190159cf4015d5f85e388', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 13:52:56', '2021-03-26 13:52:56', '2022-03-26 14:52:56'),
('eac1952b118ea425b6d94e3a78f12c6514578f12e8ad3e49b6506da88c94b43b593c69d85df48112', 11, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-18 13:31:35', '2021-03-18 13:31:35', '2022-03-18 16:31:35'),
('ec534a3b4811d9a5c28112916c1f436f47b156ffd7c8c245a6f83fac665cce97e6babdd3d17b7038', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-27 16:50:28', '2021-03-27 16:50:28', '2022-03-27 17:50:28'),
('ecc9e33786b40aeec386e0feb2c2d46143cd94f9ea1cd535e71d30cde879de932a9daaeef4f637c9', 3, 1, 'MyApp', '[\"admin\"]', 0, '2021-03-29 13:05:27', '2021-03-29 13:05:27', '2022-03-29 15:05:27'),
('f1a91c64523111a1f41cbe2dbf3117584e9dedff14276b2bb707705d97f3cd1b384094cb7b7467b8', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-17 06:13:46', '2021-03-17 06:13:46', '2022-03-17 09:13:46'),
('f274776d54aba8742e6ff75181908d58f2483bc1f72daa7b989b6347c6b97d3100149b49d18b56b1', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 09:08:04', '2021-03-26 09:08:04', '2022-03-26 11:08:04'),
('f32a4cabfcc4adcb5c31de8172308f53947b36de222f494a052371207a362ce6b8eb54ace0d0e49b', 4, 1, 'MyApp', '[]', 0, '2021-03-28 18:04:14', '2021-03-28 18:04:14', '2022-03-28 20:04:14'),
('f3adcfd932bd6c95ff225992128639dbc66aba2e3f9382de90deb5b4bb3592222271500bc3376832', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 13:42:53', '2021-03-26 13:42:53', '2022-03-26 14:42:53'),
('f3dbac77c9cf68ab05c633bf1884d15795cd2e047e3d3da446a900093b99568c16c295cbe7ddd09b', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-27 18:59:39', '2021-03-27 18:59:39', '2022-03-27 19:59:39'),
('f436c6be485ff38cc997a248ffaba23ad295cd9fafa5a1932ef388e51a875afce0860fe15efdfc7d', 11, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-18 12:43:03', '2021-03-18 12:43:03', '2022-03-18 15:43:03'),
('f4948a453798a7e6ccedd46061ac7df8f35b007d3b6c070c518f10dbf5489c5016d5f0e108b201cd', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 16:36:14', '2021-03-26 16:36:14', '2022-03-26 17:36:14'),
('f4c5c2fe3bd92fe41227c0254b2ea7f9ba6c3f2eea37fe808889f7c1511659a2a6919ac20a3464b7', 3, 1, 'MyApp', '[\"admin\"]', 0, '2021-03-29 12:29:06', '2021-03-29 12:29:06', '2022-03-29 14:29:06'),
('f7fe203b353004a63af97191d2f03cbaf3b0642e094aa5af4bed323314ec36ad080d8b0a7a485e12', 3, 1, 'MyApp', '[\"admin\"]', 0, '2021-03-31 13:07:43', '2021-03-31 13:07:43', '2022-03-31 15:07:43'),
('f87cc83f899440324e55394a4aa4fbea0765d69b0f1ba646099076c454d85c2e0fca7fa1a8572e76', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 17:13:03', '2021-03-26 17:13:03', '2022-03-26 18:13:03'),
('f95cc20c168ea2e759f8ce93b31c8931cfee1e44cc31dca19b3db9416f0bc70ba72ba0f0c2024ae5', 3, 1, 'MyApp', '[\"admin\"]', 0, '2021-03-29 12:41:18', '2021-03-29 12:41:18', '2022-03-29 14:41:18'),
('fa36559faeaa4cca21faddb73c7ed1382fa13d37c9797a020cce2b778664c69883226ddea25bbab8', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 16:53:59', '2021-03-26 16:53:59', '2022-03-26 17:53:59'),
('facea8c0cd1c53cd734778568b5c53b810c50a8b51f12970cee984e7fdaf670d40abf2c6165fcf81', 11, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-18 12:34:56', '2021-03-18 12:34:56', '2022-03-18 15:34:56'),
('fe7cde46b0df2340e4b327f3eefbb2ef65b83efdd1e25ed38ee156336d728ee24d5418652a6dec7f', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 13:49:56', '2021-03-26 13:49:56', '2022-03-26 14:49:56'),
('feb3ac28b6e25087bd6bc9033eec2d6248a4515d3c89076a94ef5876205c7b0890316011120ae32e', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-27 19:00:33', '2021-03-27 19:00:33', '2022-03-27 20:00:33'),
('fee3872139ffa16cd0132c379dc6e35c1d4912d9308c59ff5cba7058e69ee3a453502bf9294d8a56', 3, 1, 'MyApp', '[\"utilisateur\"]', 0, '2021-03-26 09:27:56', '2021-03-26 09:27:56', '2022-03-26 11:27:56');

--
-- テーブルのデータのダンプ `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Daymond Personal Access Client', 'tKiWrSTeom5cv0Xh3kEIwP9N7kR4Af1QXd9wQNQW', NULL, 'http://localhost', 1, 0, 0, '2021-03-16 09:39:15', '2021-03-16 09:39:15'),
(2, NULL, 'Daymond Password Grant Client', 'pN02jtr0OmpIzAO4QftARlmmzk9d3Dzs7THWUSQV', 'users', 'http://localhost', 0, 1, 0, '2021-03-16 09:39:15', '2021-03-16 09:39:15');

--
-- テーブルのデータのダンプ `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-03-16 09:39:15', '2021-03-16 09:39:15');

--
-- テーブルのデータのダンプ `pays`
--

INSERT INTO `pays` (`id`, `nom`, `indicatif`, `code`, `flag`, `created_at`, `updated_at`) VALUES
(1, 'Bénin', '', '', '', '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(2, 'Burkina Faso', '', '', '', '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(3, 'Burundi', '', '', '', '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(4, 'Cameroun', '', '', '', '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(5, 'Comores', '', '', '', '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(6, 'Côte d\'Ivoire', '', '', '', '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(7, 'Djibouti', '', '', '', '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(8, 'Gabon', '', '', '', '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(9, 'Guinée', '', '', '', '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(10, 'Guinée équatoriale', '', '', '', '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(11, 'Madagascar', '', '', '', '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(12, 'Mali', '', '', '', '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(13, 'Niger', '', '', '', '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(14, 'République centrafricaine', '', '', '', '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(15, 'République démocratique du Congo', '', '', '', '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(16, 'République du Congo', '', '', '', '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(17, 'Rwanda', '', '', '', '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(18, 'Sénégal', '', '', '', '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(19, 'Seychelles', '', '', '', '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(20, 'Tchad', '', '', '', '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(21, 'Togo', '', '', '', '2021-03-24 18:48:53', '2021-03-24 18:48:53');

--
-- テーブルのデータのダンプ `produits`
--

INSERT INTO `produits` (`id`, `nom`, `sous_titre`, `description`, `categorie_id`, `sous_categorie_id`, `prix`, `quantite`, `prix_reduction`, `commission`, `prix_suggestion1`, `prix_suggestion2`, `prix_grossiste1`, `prix_grossiste2`, `type_cout_id`, `etat_id`, `transaction_id`, `niveau_id`, `type_produit_id`, `localisation_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Dr. Sean Olson DVMDr. Sean Olson DVMDr. Sean Olson DVMDr. Sean Olson DVMDr. Sean Olson DVMDr. Sean Olson DVMDr. Sean Olson DVMDr. Sean Olson DVMDr. Sean Olson DVM', 'Dicta distinctio voluptatem sit dolor doloremque dicta.Dicta distinctio voluptatem sit dolor doloremque dicta.Dicta distinctio voluptatem sit dolor doloremque dicta.Dicta distinctio voluptatem sit dolor doloremque dicta.Dicta distinctio voluptatem sit dol', 'Dicta distinctio voluptatem sit dolor doloremque dicta.Dicta distinctio voluptatem sit dolor doloremque dicta.Dicta distinctio voluptatem sit dolor doloremque dicta.Dicta distinctio voluptatem sit dolor doloremque dicta.Dicta distinctio voluptatem sit dolor doloremque dicta.Dicta distinctio voluptatem sit dolor doloremque dicta.', 1, NULL, '51433', 1, '2654', '621', '7046', '4692', NULL, NULL, 2, 1, 1, 1, 1, 1, '2021-03-24 18:48:54', '2021-03-24 18:48:54', NULL),
(3, 'Telly Rippin PhD', 'Et voluptas et possimus animi.', 'Recusandae ipsum ad sit sit odio officiis dolores. Vel unde praesentium architecto cumque qui dolor.', 1, NULL, '49605', 1, '1459', '239', '7638', '8730', NULL, NULL, 2, 1, 1, 1, 1, 1, '2021-03-24 18:48:54', '2021-03-24 18:48:54', NULL),
(4, 'Anthony Lang', 'Sed voluptatum commodi quidem consequatur et.', 'Nihil ea itaque nobis error voluptatem. Amet dolores est velit nihil. Assumenda enim ut autem earum nesciunt enim ex et.', 1, NULL, '13944', 1, '4076', '716', '3592', '1112', NULL, NULL, 2, 1, 1, 1, 1, 1, '2021-03-24 18:48:54', '2021-03-24 18:48:54', NULL),
(5, 'Efrain Pacocha', 'Nobis et adipisci corrupti in recusandae est minus eum.', 'Ex voluptatem soluta porro eligendi. Esse quas modi quia voluptas atque aliquam esse. Ducimus quaerat sed eum cumque qui aut labore.', 1, NULL, '26617', 1, '1331', '989', '85', '3440', NULL, NULL, 2, 1, 1, 1, 1, 1, '2021-03-24 18:48:54', '2021-03-24 18:48:54', NULL),
(6, 'Destiny Greenholt', 'Hic velit laborum qui et eaque consequatur.', 'Accusantium fugit omnis ut et odit. Magni sit doloribus sit est qui aliquid cumque. Odit est esse quaerat amet pariatur libero. Mollitia debitis illo eos beatae molestiae hic delectus.', 1, NULL, '460', 1, '595', '350', '8592', '904', NULL, NULL, 2, 1, 1, 1, 1, 1, '2021-03-24 18:48:54', '2021-03-24 18:48:54', NULL),
(7, 'Sean Gleichner', 'Itaque eveniet aut modi ipsa libero modi nulla eligendi.', 'Autem necessitatibus doloribus numquam cumque. Porro quia quaerat accusantium reprehenderit est repudiandae. Corrupti delectus ut dolor possimus dolor nisi. Qui commodi consequatur molestiae tempora quia.', 1, NULL, '35497', 1, '8728', '725', '5251', '299', NULL, NULL, 2, 1, 1, 1, 1, 1, '2021-03-24 18:48:54', '2021-03-24 18:48:54', NULL),
(8, 'Providenci Oberbrunner', 'In exercitationem ullam ut suscipit officiis.', 'Blanditiis aperiam qui minus earum nulla ut. Animi officiis architecto aut cupiditate in aut dolorem laboriosam.', 1, NULL, '42746', 1, '8199', '122', '340', '1194', NULL, NULL, 2, 1, 1, 1, 1, 1, '2021-03-24 18:48:54', '2021-03-24 18:48:54', NULL),
(9, 'Nichole Bashirian III', 'Consequatur ipsum repellat harum consequatur vero.', 'Et voluptate et et harum nihil quasi. Nulla a et omnis et officiis.', 1, NULL, '76900', 1, '6409', '927', '6357', '4386', NULL, NULL, 2, 1, 1, 1, 1, 1, '2021-03-24 18:48:54', '2021-03-24 18:48:54', NULL),
(10, 'Orval Rippin', 'Quia facilis qui blanditiis atque ipsam sed.', 'Eum quasi iure impedit eum vitae et ab. Dolorem in eius corrupti et nam. Aut ullam fugit sapiente.', 1, NULL, '17190', 1, '5428', '987', '9178', '7932', NULL, NULL, 2, 1, 1, 1, 1, 1, '2021-03-24 18:48:54', '2021-03-24 18:48:54', NULL),
(11, 'Miss Christiana Kassulke V', 'Similique sunt aut molestiae praesentium aut non fugiat.', 'Cupiditate omnis unde ipsa ad ad. Ducimus vero cum adipisci quisquam quia dolorum dolores corporis. Earum vero vero quo provident iusto quidem error.', 1, NULL, '51849', 1, '3521', '757', '8027', '6531', NULL, NULL, 2, 1, 1, 1, 1, 1, '2021-03-24 18:48:54', '2021-03-24 18:48:54', NULL),
(12, 'Alayna Bayer', 'Sed voluptatem non dignissimos voluptate corporis.', 'Omnis reprehenderit cupiditate voluptatum numquam dolores. Aut sit commodi quia consectetur corrupti quis libero. Et saepe et consectetur. Ratione rerum amet illum eos iste possimus.', 1, NULL, '56551', 1, '4340', '55', '371', '3392', NULL, NULL, 2, 1, 1, 1, 1, 1, '2021-03-24 18:48:54', '2021-03-24 18:48:54', NULL),
(13, 'Mr. Camron Hermann I', 'Enim hic necessitatibus nesciunt.', 'Eum perspiciatis deleniti blanditiis nobis. Voluptatem ut facere quasi dolores sit.', 1, NULL, '90159', 1, '7629', '363', '3358', '9312', NULL, NULL, 2, 1, 1, 1, 1, 1, '2021-03-24 18:48:54', '2021-03-24 18:48:54', NULL),
(14, 'Diamond Dooley', 'Id vero soluta consectetur iure vel.', 'Aspernatur eos debitis illo minima perferendis magni. Consequatur cumque enim magnam. Dicta occaecati excepturi quisquam et in omnis. Sequi vero temporibus ullam similique provident.', 1, NULL, '6372', 1, '7910', '404', '8935', '6183', NULL, NULL, 2, 1, 1, 1, 1, 1, '2021-03-24 18:48:54', '2021-03-24 18:48:54', NULL),
(15, 'Rachel Douglas', 'Doloremque ipsam beatae dicta natus soluta consequatur.', 'Fugiat quibusdam velit quidem eos voluptatem illo. Officia sequi magni dolorum necessitatibus. Recusandae vel magni beatae laboriosam. Eaque voluptate vel nesciunt reprehenderit quod.', 1, NULL, '94155', 1, '1110', '897', '1274', '5661', NULL, NULL, 2, 1, 1, 1, 1, 1, '2021-03-24 18:48:54', '2021-03-24 18:48:54', NULL),
(16, 'Prof. Liza Gusikowski II', 'Quasi rerum ut itaque in ut praesentium.', 'Aut molestiae sunt placeat ad voluptatem nemo ducimus. Aut natus sed quis illum molestias sed maxime facilis. Porro qui ipsam laudantium quasi fugit ipsa est.', 1, NULL, '70881', 1, '8644', '200', '8397', '292', NULL, NULL, 2, 1, 1, 1, 1, 1, '2021-03-24 18:48:54', '2021-03-24 18:48:54', NULL),
(17, 'Pc Lenovo', 'C4556', '6/500 giga', 2, NULL, '100000', NULL, '55000', NULL, '10600', '150100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-01 15:59:43', '2021-04-01 15:59:43', NULL),
(18, 'Imprimante', 'imprimante Hp a wifi', 'Imprimante Canon multifonction impression, photocopie couleur blanc noir et scan\n\n*Impression\n*Scan\n*photocopie couleur blanc noir: 180 pages\n*Photocopie couleur: 150  pages\n*Jet d\'ancre\n\nPrix grossiste: 39.000 FCFA\n\nSuggestions de prix de vente : de 47.000 a 55.000 FCFA\n\nLivraison et expédition possible partout en côte d\'ivoire\n\n30 pièces disponibles', 2, NULL, '39000', NULL, NULL, NULL, '46600', '49600', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-02 15:13:53', '2021-04-02 15:13:53', NULL),
(19, 'Imprimante', 'imprimante Hp', 'Imprimante Canon multifonction impression, photocopie couleur blanc noir et scan\n\n*Impression\n*Scan\n*photocopie couleur blanc noir: 180 pages\n*Photocopie couleur: 150  pages\n*Jet d\'ancre\n\nPrix grossiste: 39.000 FCFA\n\nSuggestions de prix de vente : de 47.000 a 55.000 FCFA\n\nLivraison et expédition possible partout en côte d\'ivoire\n\n30 pièces disponibles', 2, NULL, '39000', NULL, NULL, NULL, '46600', '49600', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-02 15:19:00', '2021-04-02 15:19:00', NULL),
(20, 'Gadget de cuisine', 'Objet utile pour la cuisine', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste quae deleniti explicabo, possimus ipsam cum commodi fugiat sapiente ut ab natus alias maxime. Excepturi repudiandae animi magnam nesciunt asperiores libero!', 4, NULL, '60000', NULL, '50000', '3100', '75100', '90100', NULL, NULL, NULL, 3, 2, NULL, NULL, NULL, '2021-04-06 14:44:02', '2021-04-06 14:44:02', NULL),
(27, 'nom', 'sous titre', 'description', 1, NULL, NULL, 100, '10000', NULL, '20000', '30000', NULL, NULL, 1, NULL, 1, 1, 1, NULL, '2021-04-07 11:44:46', '2021-04-07 11:44:46', NULL);

--
-- テーブルのデータのダンプ `sous_categories`
--

INSERT INTO `sous_categories` (`id`, `nom`, `categorie_id`, `created_at`, `updated_at`) VALUES
(1, 'Sport & Fitness', 1, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(2, 'Instruments & Accessoires de Sport', 1, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(3, 'Top marques', 1, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(4, 'Jouets pour bébés', 2, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(5, 'Jeux de plein air', 2, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(6, 'Jeux de société', 2, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(7, 'Trotinettes & skateboards', 2, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(8, 'Jouets pour enfants', 2, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(9, 'Poupées & Peluches', 2, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(10, 'Jeux éducatifs', 2, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(11, 'Déguisement & Fêtes', 2, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(12, 'La grande Récré', 2, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(13, 'Entretien de la voiture', 3, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(14, 'Motos et sports motorisés', 3, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(15, 'Pièces de rechange', 3, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(16, 'Electronique auto & Accessoires', 3, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(17, 'Feux & Accessoires d\'éclairage', 3, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(18, 'Pièces & Accessoires de VR', 3, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(19, 'Peintures et fournitures', 3, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(20, 'Huiles & fluides', 3, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(21, 'Outils & équipements', 3, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(22, 'Accessoires intérieur', 3, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(23, 'Accessoires extérieur', 3, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(24, 'Top Marques Auto', 3, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(25, 'Mode Femme', 9, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(26, 'Jardin secret', 9, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(27, 'Uniformes de travail', 9, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(28, 'Bagage et sac de voyage', 9, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(29, 'Mode Homme', 9, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(30, 'Mode enfant', 9, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(31, 'Top marques', 9, '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(32, 'Découvrez d\'autres produits', 9, '2021-03-24 18:48:53', '2021-03-24 18:48:53');

--
-- テーブルのデータのダンプ `transactions`
--

INSERT INTO `transactions` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Vente', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(2, 'Trans_2', '2021-03-24 18:48:54', '2021-03-24 18:48:54'),
(3, 'Trans_3', '2021-03-24 18:48:54', '2021-03-24 18:48:54');

--
-- テーブルのデータのダンプ `type_commande`
--

INSERT INTO `type_commande` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Nouvelle commande', '2021-03-17 16:35:15', '2021-03-17 16:35:15'),
(2, 'Commande en cours', '2021-03-17 16:35:15', '2021-03-17 16:35:15'),
(3, 'Commande validée', '2021-03-17 16:35:15', '2021-03-17 16:35:15'),
(4, 'Commande annulée', '2021-03-17 16:35:15', '2021-03-17 16:35:15');

--
-- テーブルのデータのダンプ `type_couts`
--

INSERT INTO `type_couts` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Prix', NULL, NULL),
(2, 'Prix grossiste', NULL, NULL),
(3, 'A louer', NULL, NULL);

--
-- テーブルのデータのダンプ `type_diffusions`
--

INSERT INTO `type_diffusions` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Article vendu', '2021-03-15 20:26:27', '2021-03-15 20:26:27'),
(2, 'Disponibilité du produit', '2021-03-15 20:26:27', '2021-03-15 20:26:27'),
(3, ' Info Daymond', '2021-03-15 20:26:27', '2021-03-15 20:26:27');

--
-- テーブルのデータのダンプ `type_produits`
--

INSERT INTO `type_produits` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Nouveau', '2021-03-24 18:48:53', '2021-03-24 18:48:53'),
(2, 'Importé', '2021-03-24 18:48:53', '2021-03-24 18:48:53');

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contact`, `is_admin`, `is_confirmed`, `email_verified_at`, `adresse_id`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Amane Hosanna', 'amanehosanna@gmail.com', NULL, '0', '', NULL, NULL, '$2y$10$DnH4VYp7YX0ff.z6hJHm9OauXeQHiriRLS9VSZi/TXJaGroKCnxEe', 'W6U0FyO1S3p1MY5xZC3Om3iI8b7IRJivdRoQJLrvfpsu4LwZBbV6s70HIuEo', NULL, NULL),
(2, 'John Admin', 'john@lark.com', '22574936826', '1', 'F487A', NULL, NULL, '$2y$10$njXPibVokxl9bKg/LVxI7.1u6dYTgKokVyu0d/RKvwwP9fgSqcYIq', NULL, NULL, '2021-03-29 12:01:47'),
(3, 'r007k1t', 'test@test.fr', '2250575330370', '1', '7A3C3', NULL, NULL, '', NULL, '2021-03-29 14:06:16', '2021-04-08 08:07:10');

--
-- テーブルのデータのダンプ `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `profession`, `contact`, `password`, `photo`, `statut`, `etoile`, `etoile_plus`, `user_id`, `adresse_id`, `created_at`, `updated_at`) VALUES
(1, 'AMANE', 'Hosanna', 'Software Engineer', '74936826', 'password', 'https://beta.daymonddistribution.com/pp/QibkHzFYXaJpquvGylOiHKi0UOOrHnPFR74iC5V6.png', 1, 0, 0, 1, 3, '2021-04-06 11:25:03', '2021-04-01 15:26:57'),
(3, 'rootkit', '', 'Informaticien', '+2250102396335', '637F2', 'https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?f=y', 1, 7, 3, NULL, 4, '2021-03-26 07:33:01', '2021-04-06 08:33:39'),
(4, 'Michael kouamé', '', 'infographiste', '+2250759028545', '71F52', 'https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?f=y', 1, 0, 0, NULL, 5, '2021-03-28 18:04:14', '2021-03-28 18:07:25'),
(10, 'cracker', NULL, 'test', '+2250102396336', NULL, 'https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?f=y', 1, 0, 0, NULL, 23, '2021-04-02 17:42:06', '2021-04-02 17:42:06'),
(11, 'test', NULL, 'gshsjsj', '+2258080808888', NULL, 'https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?f=y', 1, 0, 0, NULL, 24, '2021-04-02 17:54:14', '2021-04-02 17:54:14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
