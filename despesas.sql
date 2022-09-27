-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Set-2022 às 15:25
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `controle_despesas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesas`
--

CREATE TABLE `despesas` (
  `id` int(11) NOT NULL,
  `dt_lancamento` datetime NOT NULL DEFAULT current_timestamp(),
  `descricao` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `nome_fornecedor` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `centro_custo` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nf` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `despesas`
--

INSERT INTO `despesas` (`id`, `dt_lancamento`, `descricao`, `valor`, `nome_fornecedor`, `centro_custo`, `nf`, `status_pag`) VALUES
(1, '2022-09-27 14:38:58', 'Pressure ulcer of left heel, stage 3', '8004.74', 'Voomm', '470896', '2022.09.27-14.36.08.jpg', 1),
(2, '2022-09-27 14:38:58', 'Other congenital malformations of male genital organs', '7836.40', 'Quatz', '160625', '2022.09.27-14.36.08.jpg', 4),
(3, '2022-09-27 14:38:58', 'Fracture of mandible, unsp, init encntr for open fracture', '6575.01', 'Wikizz', '847268', '2022.09.27-14.36.08.jpg', 3),
(4, '2022-09-27 14:38:58', 'Varicose veins of other sites', '4234.50', 'Mynte', '321639', '2022.09.27-14.36.08.jpg', 1),
(5, '2022-09-27 14:38:58', 'Acute and subacute infective endocarditis', '4293.27', 'Lazz', '440615', '2022.09.27-14.36.08.jpg', 4),
(6, '2022-09-27 14:38:58', 'Unspecified open wound, unspecified knee, sequela', '3025.22', 'Yodoo', '858794', '2022.09.27-14.36.08.jpg', 4),
(7, '2022-09-27 14:38:58', 'Superficial frostbite of left hand, sequela', '1337.84', 'Flashspan', '859683', '2022.09.27-14.36.08.jpg', 3),
(8, '2022-09-27 14:38:58', 'Laceration of superficial palmar arch of right hand', '551.76', 'Innojam', '776470', '2022.09.27-14.36.08.jpg', 3),
(9, '2022-09-27 14:38:58', 'Stress fracture, right humerus, subs for fx w routn heal', '9026.34', 'Topiczoom', '666240', '2022.09.27-14.36.08.jpg', 3),
(10, '2022-09-27 14:38:58', 'Pnctr w fb of right lesser toe(s) w/o damage to nail', '7933.88', 'Browseblab', '863465', '2022.09.27-14.36.08.jpg', 3),
(11, '2022-09-27 14:38:58', 'Cor pulmonale (chronic)', '7843.55', 'Aimbo', '757097', '2022.09.27-14.36.08.jpg', 3),
(12, '2022-09-27 14:38:58', 'Diffuse large B-cell lymphoma, intrapelvic lymph nodes', '5238.40', 'Kazio', '500373', '2022.09.27-14.36.08.jpg', 2),
(13, '2022-09-27 14:38:58', 'Poisn by antivaric drugs, inc scler agents, assault, subs', '2902.65', 'Kwimbee', '662109', '2022.09.27-14.36.08.jpg', 1),
(14, '2022-09-27 14:38:58', 'Underdosing of 4-Aminophenol derivatives, sequela', '1134.55', 'Aimbu', '221104', '2022.09.27-14.36.08.jpg', 4),
(15, '2022-09-27 14:38:58', 'Poisoning by oth psychodyslept, accidental (unintentional)', '7145.14', 'Trudeo', '756230', '2022.09.27-14.36.08.jpg', 4),
(16, '2022-09-27 14:38:58', 'Other specified bursopathies, right ankle and foot', '6581.07', 'Rhyloo', '188323', '2022.09.27-14.36.08.jpg', 4),
(17, '2022-09-27 14:38:58', 'Disp fx of proximal phalanx of unsp thumb, init for opn fx', '8916.26', 'Wikido', '694525', '2022.09.27-14.36.08.jpg', 3),
(18, '2022-09-27 14:38:58', 'Benign neoplasm of cornea', '6610.06', 'Yadel', '513439', '2022.09.27-14.36.08.jpg', 4),
(19, '2022-09-27 14:38:58', 'Sltr-haris Type II physeal fx lower end of right tibia, init', '5002.43', 'Edgeify', '177845', '2022.09.27-14.36.08.jpg', 4),
(20, '2022-09-27 14:38:58', 'Motorcycle driver injured in collision w hv veh nontraf', '9694.36', 'Geba', '439209', '2022.09.27-14.36.08.jpg', 4),
(21, '2022-09-27 14:38:58', 'Nondisplaced fracture of distal phalanx of other finger', '500.49', 'Devcast', '450177', '2022.09.27-14.36.08.jpg', 3),
(22, '2022-09-27 14:38:58', 'Unsp injury of radial art at forarm lv, right arm, sequela', '3053.13', 'Camido', '357418', '2022.09.27-14.36.08.jpg', 4),
(23, '2022-09-27 14:38:58', 'Nondisp avulsion fx left ischium, subs for fx w routn heal', '4944.66', 'Jabbersphere', '795354', '2022.09.27-14.36.08.jpg', 1),
(24, '2022-09-27 14:38:58', 'Bent bone of right radius, init for opn fx type I/2', '8903.43', 'Zooxo', '398921', '2022.09.27-14.36.08.jpg', 1),
(25, '2022-09-27 14:38:58', 'Corrosion of third degree of left shoulder, subs encntr', '8428.47', 'Bubblemix', '197589', '2022.09.27-14.36.08.jpg', 3),
(26, '2022-09-27 14:38:58', 'Secondary corneal edema, right eye', '2568.33', 'Thoughtblab', '683892', '2022.09.27-14.36.08.jpg', 4),
(27, '2022-09-27 14:38:59', 'Burn of second degree of unspecified shoulder', '6170.56', 'Layo', '407060', '2022.09.27-14.36.08.jpg', 3),
(28, '2022-09-27 14:38:59', 'Nondisp commnt fx shaft of l fibula, 7thQ', '5195.60', 'Realcube', '162510', '2022.09.27-14.36.08.jpg', 3),
(29, '2022-09-27 14:38:59', 'Abrasion, right thigh, initial encounter', '4875.20', 'Demimbu', '726894', '2022.09.27-14.36.08.jpg', 2),
(30, '2022-09-27 14:38:59', 'Nodular corneal degeneration', '1317.59', 'Jabbertype', '158636', '2022.09.27-14.36.08.jpg', 1),
(31, '2022-09-27 14:38:59', 'Drowning and submersion due to fall off passenger ship', '6361.47', 'Eayo', '656002', '2022.09.27-14.36.08.jpg', 1),
(32, '2022-09-27 14:38:59', 'Osteonecrosis in diseases classified elsewhere, hand', '2597.12', 'Brightdog', '787312', '2022.09.27-14.36.08.jpg', 4),
(33, '2022-09-27 14:38:59', 'Displ oblique fx shaft of r tibia, 7thF', '633.20', 'Eadel', '685447', '2022.09.27-14.36.08.jpg', 2),
(34, '2022-09-27 14:38:59', 'Osteolysis, thigh', '7563.53', 'Feedfire', '402593', '2022.09.27-14.36.08.jpg', 4),
(35, '2022-09-27 14:38:59', 'Drug/chem diab w prolif diab rtnop w trctn dtch macula, unsp', '74.28', 'Tavu', '616579', '2022.09.27-14.36.08.jpg', 1),
(36, '2022-09-27 14:38:59', 'Pathological fracture, unspecified ulna and radius', '343.88', 'Skinder', '226519', '2022.09.27-14.36.08.jpg', 2),
(37, '2022-09-27 14:38:59', 'Hallucinogen dependence w unsp hallucinogen-induced disorder', '8005.52', 'Skiptube', '350368', '2022.09.27-14.36.08.jpg', 4),
(38, '2022-09-27 14:38:59', 'Burn of 2nd deg mul sites of right ankle and foot, init', '818.35', 'Skyba', '326608', '2022.09.27-14.36.08.jpg', 4),
(39, '2022-09-27 14:38:59', 'Displaced segmental fracture of shaft of humerus, unsp arm', '9517.59', 'Pixoboo', '876778', '2022.09.27-14.36.08.jpg', 1),
(40, '2022-09-27 14:38:59', 'Oth disrd of left ear in diseases classified elsewhere', '1712.70', 'Meetz', '699084', '2022.09.27-14.36.08.jpg', 1),
(41, '2022-09-27 14:38:59', 'Oth physeal fracture of upper end of humerus, unsp arm, init', '1520.23', 'Photolist', '366672', '2022.09.27-14.36.08.jpg', 3),
(42, '2022-09-27 14:38:59', 'Toxic effect of venom of ants, assault, subsequent encounter', '7440.07', 'Tambee', '524259', '2022.09.27-14.36.08.jpg', 3),
(43, '2022-09-27 14:38:59', 'Nondisp fx of medial condyle of right tibia, init', '9531.83', 'Skivee', '895821', '2022.09.27-14.36.08.jpg', 1),
(44, '2022-09-27 14:38:59', 'Unsp injury of oth blood vessels of thorax, left side, subs', '1773.14', 'Eazzy', '351277', '2022.09.27-14.36.08.jpg', 1),
(45, '2022-09-27 14:38:59', 'Open bite of scalp, initial encounter', '6793.86', 'Tazz', '827448', '2022.09.27-14.36.08.jpg', 2),
(46, '2022-09-27 14:38:59', 'Torus fracture of upper end of ulna', '1700.09', 'Skinder', '620230', '2022.09.27-14.36.08.jpg', 3),
(47, '2022-09-27 14:38:59', 'Other osteonecrosis, pelvis', '7021.85', 'Aimbo', '529320', '2022.09.27-14.36.08.jpg', 1),
(48, '2022-09-27 14:38:59', 'Oth traum nondisp spondylolysis of 4th cervcal vert, 7thG', '5335.58', 'Browseblab', '778341', '2022.09.27-14.36.08.jpg', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `despesas`
--
ALTER TABLE `despesas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `despesas`
--
ALTER TABLE `despesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
