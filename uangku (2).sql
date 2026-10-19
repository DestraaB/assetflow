-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2026 at 03:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uangku`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_kategori` int(11) UNSIGNED NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Primer'),
(2, 'Sekunder'),
(3, 'Tersier');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id_expense` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `id_kategori` int(11) UNSIGNED NOT NULL,
  `nominal` text NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto_struk` varchar(255) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id_expense`, `id_user`, `id_kategori`, `nominal`, `deskripsi`, `foto_struk`, `tanggal`, `created_at`) VALUES
(1, 1, 1, '7eec5426e6e58d093d742e55a2066c507adbd95a49d45ae70368852b634e7c4c384c08918439dc026b2bc1764325fb7aa988a89787d84160409040a6b403d100e7r4PSRmfTxkEwy4Z91a8Od25+CnBBVYnOm00jXCSxM=', 'a2eb4ec1b62d11fd9730acc909f1a4190f9224d8ec821862f78a8e03d052e40a3cb2a5491ee48b59b7b335c5108f6ce73cc90dcc448474c4dad1a7ad96173a6cmuAuCGwfwlTEyxj1Fcof4LRYBSe+z16hsRvliKOYQEqgE/aQtjKN8SEJaZxEhw2x', '1ca5d27676b5ffefc4c6be1b469e2e34.png', '2026-10-01 00:00:00', '2026-10-01 11:49:16'),
(2, 7, 2, '9c025eddec57d6c1e2853feae130f112782aff0e79a56ff63326306cab690ea67ea679c7fc7c5bf5c7e807326bc86e11fb79064ce7193464d1ab9bb00b263866wpaJt5AqjgQ+bY6gyQHSHagJ+uA+5pS0bH7lT3gNgwc=', 'ed6881a5e0b56255508724c01463645e3000b5a1bb9fc9a6c1e2871ef1dc1672703d1f00564ba1f47ad8f88827fdf3c8d45979c31b2f40bb7bf6a0b2171df0137h3G6xRpNwtMgHcZMDo8m2ZC5uoYIpHaGuikdKaDa6U=', '3b83838d6cf3265dc4fcaa9379cecca9.jpeg', '2026-10-02 00:00:00', '2026-10-02 09:04:43'),
(3, 7, 1, 'b45af038dbe7becf5b71af995621abf1f4ba4322f14cbce885e430412b058eb2b9a429966ab8d364ae030eca170f34197cf80825c5668844c0d9c6068a3f7cdezsbDVhdwg1CykQUbPRFOuW9HQQeYu4KG9mMvI7sHdW4=', '1477a69f6b5079241b1350cf27ec387b4bf65a231fcc5606b3907de23990161dfa84468b0952bd0777713c04d6935f0a00126e16f3daa3831b51cc3fea3c911dcfVoU3MhoOPZ/6/m5o/7/0eNtGC+eqABGKmzrPJVDf0=', 'fa8f67640634c5ec07d08292d2e948a5.jpeg', '2026-10-02 00:00:00', '2026-10-02 09:05:27'),
(4, 1, 1, '3915c6d4bbd973b1fa527be15bb1a498f91e662f887529b1bf04fabd7be1f09bda82a254f82e2175d74c7d9022f204c837fda12935c08292e78df985f1e9f81brohd246BzUmhTkEhIjdfpnNX1Ltx7BqpbsoR1PONe5Q=', 'ec216744357196a7c98f768b044abb68e44890c7adc44b36d7682cd5a294314cd38185fafdc1691a13f1612389b0538fdcbd6f498c33c43d96f69945c5c4f9c4rAtGFKSibFY6DZ5DGUO7S8tgR4aJ/puHajRlu6XlGXX2NXhoPZuTTO5FWsvgnVYZ', 'd57eb83103d171571b80f669c75a15eb.png', '2026-10-05 00:00:00', '2026-10-05 15:02:10'),
(5, 8, 1, '8d211a39de71a4c12ecb08c8a83c099bec6d7e14a3035213fc8cfbeef125b61886d137d5404a20aa7f413fe86c46cb5ff4c8e107c2d070c3fdedf0ae9a7e9939sh2MiW8Xp7d+ZDDK0sqOVxMC6nT9oiJ1RHY6MRcShNU=', '618b20d5fbb99a329f4ec9228489eef3423b9fc1006dcd382553c2ce4ca50a1ddf51c2dcdb778969fc1c10d41063e7c685d7f77781ae300d36e108b798143416NEU/KQMEFxkQ+nG3L+jUfyCpVM6BPVBpMzuFuJkocbU=', 'a1b7670c1b2b5f9f15b5cfeaa1bfd1dd.png', '2026-10-07 00:00:00', '2026-10-07 12:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nominal` text DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `sumber` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id`, `id_user`, `nominal`, `tanggal`, `sumber`, `deskripsi`) VALUES
(1, 1, '1000000', '2026-10-01 00:00:00', 'Gaji', 'GAJI OKTOBER'),
(2, 1, '37cb6626a8457daa168895963cb546c148e5f6e37612a6c721fc649d0ecb8f3ed938e960dc8d9874d5dd872f028804a4b23595692fae888958227b829465fcffaeZTiHFkPQ8DgrjaIDTEfXte/FT39bhQ2UUVmbU5M4A=', '2026-10-01 00:00:00', 'a0fcfcefde59bb58bb29760eda55f171f7d931afc6893d0ea9d6f5cbde31b624c2395ba04042ad9852d588f6cc18cbf997443b8532dcceba56968597cedff05cjJYamRBrFTIrLOopvaUsSbTbs6vWl8VdxzB1eLeXR2U=', '0f6996f559e63f17d8ac68f9260375888292a022b3f9b9af7b35973800c31a5d8621aa5175a40b00e408ce45cefc4f8997974a62894b1b4de9830bfca8ee0ee74ZKzmOhiWPUHPAgbMM9r+jYQm6Y1F6I521FHKYz6JIk='),
(3, 7, '5c7d3c10299deb714f0774bfa00fdf938346c7f779b0c0743ba6dfca8b0e186beea701fb41da0141586186aba591fc600d91e4f4c1cdb0a2079fbecb9ceafb78cAO64pHLyrVkmfXucMwHLG9e+Mp45I3aqz5YfJhAnlM=', '2026-10-02 00:00:00', '18b830a229642feeaa83b12e7a9e555d9e44efb40dddc82e02b4f2c201ce8fc4863bce073b2931ee5c426dc2c33d80847961111317ca90e51c69642929279c59K/hK0VRcCuN1tyELw2qJ5MIzA1C0xn3dcHoEWCvlLMQ=', '78b415ae339965f83c2f8f44aebe9b699bffa41f2e1119329c5d43978d46ca513d83a34d1080763c4665f254aa1c79f629f3f7418dd1734e3b96caa5910ea0d0hpWsdJPqaUfkxCTv1cJXhum7IIrNV5xtmqnHN0qR2J8='),
(4, 7, '10f10c1d191f023e7e3633057430563be64041e1a90a812af3dbda805a458b4bbda051be958411cb2f27daebf5d5989142919572d671f47de87c0a57907aa020+LejxWh6NEe1As9jITPbkCr6fvsjuC5nZthVbKlho2A=', '2026-10-02 00:00:00', 'd685c5acce6598c43dd90a522765640e000bc34854e5dfa41d972e24b1936e320563f552e7708bccdecd474f0dc5d80fe097ae86a455fa7107c84436e9214a741Ord7cjktNmvHMX+Lyd2QB1zI7NURksr7mxkytdB9lw=', '966610aee286a9506ea3c1a4f1ad3a734f694ca9527a1877868aeb25a85f272160cf6fd8e85ec47925e57934b2a8201414259cf5fb203a3bd86bbc1880c8b2dd5EbuXeUkY69Q8qJMt0vfKgfWa++mF8tQAje1PU8wSoU='),
(5, 8, 'a2335ee7c07a17d97a759d58bc0e77961ce5ad50c3c7d832b38621ed6bdc3eea8f14ef5aa65acaf615dadf5fa78e5f9b05eb324b69260f171dab8132c3792ec41uzlqKfC8sSLVpdH89RzwZ5I9nMhV7YhIhvlenkhO7Y=', '2026-10-07 11:59:44', '98768a0f9f5aa550048999b3b41de3e04e7b774615522925fe846a59289a0fa701b4a427411eecb5be0ab422869804328651f778a09172e3cdee71395660e8e8iGc4NKNh+K4XE/UYJwIwr5xO5+iCQVm2TqXoqwBSbPA=', '6befb2f5275078ab39e1e79318d40c1d1405b5fb70062320eeb4272bfd7199ee64c075ec76a7d48bdc237eff869c830419649f415b4f5a49c12e7562e67e67931NntpuePCPpawR0q5+ErtDUgcjVNBfaHFhZQDkhbtDA='),
(6, 8, '4442193b83ba1220a8bde301894fa598d462f91330e77bd3447170504d22f0a94c853e41462e479edc870d042cae57e67b70a0cb58c85f67874e60db4cfb29a5jzeBa0JpXEjW2r2wc35UJF+M0iuWKym7ydl6gWBJ3h4=', '2026-10-07 12:09:51', '30bedca57768dc20c2e7af5931a9cc195e1b067548104030f5f0486405049488c3e0a6d1fbdbfc3c2390f5040c82f51adebb801b8598d567d7afee8fd2e26b46f2S74men3RPCmZTAPaLORmIRsSY2IfEgnyGu08dhkeQ=', 'a0699a280943c8e55cf2f797ea801ba23599fe545d07da15f988a535030b84a36cd32a529115fdea9efc60eb46483ab880a047ca441b1afc1c2e5e39dc2c1283Mxtw5lsF2TWEb2Igc3Z2gIuG8u+ntkf14LG82i+T0Bk=');

-- --------------------------------------------------------

--
-- Table structure for table `tabungan`
--

CREATE TABLE `tabungan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nominal` text DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabungan`
--

INSERT INTO `tabungan` (`id`, `id_user`, `nominal`, `tanggal`, `deskripsi`) VALUES
(1, 1, 'eab5cc8ede7c846bbb7b6527d8a329ee0c74b10677041f781a922889237ca94504f831211db0a3e2333890f20b8520066ca044d312f023e351b8721831133ee38gPIFk7BDNtUP/T0sN9pUn7A2FhuPHb9+jmIVyU2bTI=', '2026-10-01 00:00:00', 'f1b65d8bd6b14a83d4ceaf3684df4b4aa4dadf9d406fdc67361bfd2015e62ceb225bfa795a24d5dac08732f4a4245ad51d9f9002892b205984afe218f4be923ebha+uIFTiIuF0UwCh9+hlZEOUZs58cgVNE4X8fwjfVl9+9PSgBvJ5wOVTC402r4b'),
(2, 7, '4709adafaa2ae6805cfcb31a0fc7e6fe0937b56c9b3a18bfb8f9b7323ebde0abafbdbbdff69df406059567d70e0d36ef73d091b0016f220abe5d34743e896df1YfMF69Vej9WhExn6eaSwyskcHesK7FgMD2JyRxMOQTQ=', '2026-10-02 00:00:00', '354ac0340e6ce884655c8e3ce05e4eb3524f230634f3516ad635896cf70495ed577aebaacec64f163ba33ff7a6d9ae353c11213a21e99cd85c3140e538464f618pRz0XF1YF6APJAKAKsplvIoI2rXil9p1vgejmd4eHQ='),
(8, 1, 'af489e683c420c74bac521429c97394a157d4ae7afa83f10a010e6c3fcf293b6432bc2a9c5a041c14cf332ce7c184f8262377e8ec977ac464f8b4b9f51ac4257LUkQ9iWjE/vQMnJOUNvNYsoIjKZbRUm63u/KGE92ZXk=', '2026-10-02 09:52:10', ''),
(9, 1, '37323b4ee9c54e61db9e076592ad1aad23d20fd92026e646c4e855e8d580117a6d0fc260239d17148d22dc150df8d880ae940d5366eb1029850fcdd5375cf4e3YpJFAhCCIUWp2d2OK46SXEjFdx7kxhxVin8+qvkgMnM=', '2026-10-02 09:53:09', ''),
(10, 1, '0c6bd0ffc60940da6614d3d35ad9adb2b793f65f0072468b36a996e73f2c05d82f25f0df6f19639594580004e2f73452d2951c70eb2634dd4a63dba54d6592a2uacGIWKa50Un0vDOFuulwtGR3XRG/2S+dhykfmPsfRE=', '2026-10-02 10:51:05', ''),
(11, 1, '939c96d7a21b9d4095fdb37ed3f773e1bb487d0e715ba319ad9649eb39b0ffbd83c4dc52fecdfd85b14563da2189bddd140232c729e6ab4cb464d0b154949b239AtR634vpxImxb3chap5gbtFRKaAEDdd3VeEnYhn9Pg=', '2026-10-02 15:52:30', ''),
(12, 1, '867ccfabb32d0f6f884b1ad1c43596efc93462efd79f376c22a2db3eb4ea2ad7d233fc59e46bfddd67cbe93ec13933a013aa0330bbd8d550553ebe169967e579Zva4HFu4oV3DsSgNnfTdipXN14XTsEHb0VujhSRQpG0=', '2026-10-05 09:53:35', ''),
(13, 1, 'b09b8e4ab6681c7c170e043ffbf8ca0c1e7dd6b68bd5139a962c22f37cb31992915bfd5f09a09bfc5339901c56bf306ee89c7989df842a24d5f9be3767098c80Hgy8Zw8iBGobtY53GfuejV1iLWKDRxO3zEKC03tZO7Y=', '2026-10-05 09:55:17', ''),
(14, 8, '5fbec3735d753dcc6ca8fbb07225a874e98c827cea2cfc4db59e5b0a5c996276c2f957fad673782d46b4a984e05e533b4465360a9e34998611a927af4b350bfdYCrsR46BLh2XfPj9/lgOjpb+ji3dUBl3fw5n7eU7RvA=', '2026-10-07 12:13:17', 'bedc02d7fa937842acdbb1c0eb91ed8d69dd5b52f2e1c834994cbd0498ed3ee4b1817df0138344d3feb51b53016f76a5a530ca676e3b74efa09ccface667c59bQPReSwTmKa2Un8+VoexwYxxJP7PaRun4IMVmTaPQjMvGbouHOVIfvrcK1nFNdXY8'),
(15, 8, 'aa12eb23ef5ae0f508d1fa96cf8fe82e67d230073813f44a771b11510e1acfd7f213eabfe7ecf89685f219695c132350e001a39211c6fef9cfa259e141dda26fohsAgGoyxlG/wTS7Ocm1TcO9MI9F0oI2qrR85dHau64=', '2026-10-07 12:15:22', '9f36a51281713f07973a63933e5b59f4a7f634af3b0b89a9082333f3914dcceafa8cc4f8ef6fce0f3395cf9de5e65eecd69754a6f94ecba30350768b2b7a1f96/D2KAn1HnalRSOwAdg+HFfbUrCjA58rAKcDL20Fuhs+6x1ORDu8UTRzCYqCR5wov'),
(16, 8, 'd98902804bcb9c5293547754b5a7e20159b7c5ec6ebd7209c6d3f3ba141daaae0eee0a2771b0f8e793131788bc769dd1618722f937913dc14dd398d12597db5dTl3OG8OOpve7UFxT/v/wXFFWJEVk6d2dZNN1x0S5Zu0=', '2026-10-07 12:15:56', '55fb1fe04b5a16169a1a0abc23758ad0383705bd72e85c21fdee6e368bdeb27616fa412fbb1db2b99ba4346702f149423e03c8d87254b633fa845c2b59134b94f7viylKkQnzoPPa3DxS4wCEy9unbSUoMf7MeY5lCBrlvdSchdDbkeyWQIC4PRdwH');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `limit_pengeluaran` text DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `password`, `limit_pengeluaran`, `reset_token`, `created_at`, `updated_at`) VALUES
(1, 'destra', 'destrajaya11@gmail.com', '$2y$10$I2egZe4Y0gdcj25GivcI0O2cb4RpVobdGV4SNT0W69avYK/m7BF4u', '49da6b148fbd59dec0952b421797dee73a1f735cf01fe5cd310af55b823f039ad09926db377a2c499b159f42d9a90239e38a2bc66e8684df07e4bc4386f43b0cDbmNstpQqee0T+H8uMzKHZ2hUQk/D6vX5escF6wzjYs=', '3c739c323fc027f2df70dac4922aef03b75b6fa33eeb73fe0a019a1f6f3c36da', '2026-09-21 15:27:02', '2026-10-01 15:08:21'),
(2, 'wijaya', 'destra@gmail.com', '$2y$10$kw9WINtIk.SKzuRXLQeAGO5zn2Qbay12xP4ft9OHcTzIDsRtgJGZC', NULL, NULL, '2026-09-21 15:53:33', '2026-10-01 09:49:33'),
(3, 'bintangg', 'bintangwjaya@gmail.com', '$2y$10$nfB1WItlRo24eLgFXC97LOFWMKcm.N5cP3XI./5FV2Ugw3Sv6c6Bu', NULL, NULL, '2026-09-22 08:46:08', '2026-10-01 09:49:33'),
(4, 'wijaya', 'destra1@gmail.com', '$2y$10$1CUU2vkqCjLY9z2.aN6CKe.1kR0CjMwrUqdYTrdwdxbE3VaOdxoZK', NULL, NULL, '2026-09-22 13:30:13', '2026-10-01 09:49:33'),
(5, 'jancuk', 'hama@gmail.com', '$2y$10$g/4aRH7kXa.tv0GySGSUVuIRvyG2CQdr44C6R5gP1OcLrYf/wGO6C', NULL, NULL, '2026-09-23 15:48:35', '2026-10-01 09:49:33'),
(6, 'Affan Bahari', 'andriher21@gmail.com', '$2y$10$oCRx4IsWim2ZCic2wugF7OzEVtsjUhSyfN/Mns4qdujHhXWctm4a.', NULL, NULL, '2026-09-30 14:23:13', '2026-10-01 09:49:33'),
(7, 'Affan Bahari', 'affanbahari@gmail.com', '$2y$10$K5Q463xqGFevG7pxEraYt.Bb9aX6lHzHbfYxDbqbgOQnCBCXDplF2', '5d72c7feb9e7511b6a726eebdd8a581928441d855c6545aeaa80a9dc1188ad42713d92f04744c5dc7c2157a3fdd92a37b2124960b40a3a864f30aa02055309e0wljBKq/bpWkQsqwzdGYqvFQI2RvyPikDFeNpSXZXBm8=', NULL, '2026-10-02 09:01:41', '2026-10-02 09:03:07'),
(8, 'user', 'wijayadestra805@gmail.com', '$2y$10$s/0pItMF2DIayET1YA5ta.YgGyqu0zv/D22Wa2nFc7lRLAmY70x9G', 'c339ac2670ce78907ad5a74b00e620361e0b84cd19447602391f73daf3bda0914bcbd47a972aec0557703f6c7f4977a2644aa6229eb5da7afed0e3eba5f590a9InvBkF35/e11HF48hBkjJAXMagp8ZtAl4ALX+hboCFU=', '5XYwkA0rTOvHoEhhaWffsE6T+fCvYHB0Ziug6T4dPnw=', '2026-10-07 10:01:25', '2026-10-07 12:28:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id_expense`),
  ADD KEY `fk_expense_user` (`id_user`),
  ADD KEY `fk_expense_kategori` (`id_kategori`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_kategori` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id_expense` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tabungan`
--
ALTER TABLE `tabungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `fk_expense_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `categories` (`id_kategori`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_expense_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
