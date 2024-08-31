-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 30, 2024 at 01:25 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bluetravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(45) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Taman Hiburan', '66ced862a1d3b.webp', '2024-08-14 13:21:59', '2024-08-28 07:57:22'),
(2, 'Air Terjun', '66ced8b28fc7f.webp', '2024-08-14 13:21:59', '2024-08-28 07:58:42'),
(3, 'Hutan', '66ced8fd24af1.jpg', '2024-08-14 13:22:27', '2024-08-28 07:59:57'),
(4, 'Gunung', '66ced91354323.webp', '2024-08-14 13:22:27', '2024-08-28 08:00:19'),
(5, 'Perairan', '66ced929d6707.webp', '2024-08-14 13:23:00', '2024-08-28 08:00:41'),
(6, 'Gua', '66cedb9cad673.jpg', '2024-08-14 13:23:00', '2024-08-28 08:11:08');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Jakarta', '66cef795553c8.webp', '2024-08-14 13:19:49', '2024-08-28 10:10:29'),
(2, 'Sukabumi', '66cefe9897d65.jpeg', '2024-08-14 13:20:03', '2024-08-28 10:40:24'),
(3, 'Bandung', '66cef7c6c6c92.webp', '2024-08-14 13:20:15', '2024-08-28 10:11:18'),
(4, 'Bogor', '66cef7e1c855f.jpg', '2024-08-14 13:20:23', '2024-08-28 10:11:45'),
(5, 'Pangandaran', '66cef7f97a646.webp', '2024-08-14 13:20:51', '2024-08-28 10:12:09'),
(7, 'Cirebon', '66ceff0b227a2.jpg', '2024-08-17 09:16:09', '2024-08-28 10:42:19'),
(11, 'Tasikmalaya', '66ceff5d040e6.jpg', '2024-08-20 06:34:45', '2024-08-28 10:43:41'),
(12, 'Cianjur', '66cf001a4e130.jpg', '2024-08-21 05:57:33', '2024-08-28 10:46:50'),
(13, 'Bekasi', '66cf005f418ab.jpg', '2024-08-21 07:21:45', '2024-08-28 10:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int NOT NULL,
  `name` varchar(45) NOT NULL,
  `descriptions` text NOT NULL,
  `images` text NOT NULL,
  `price` double NOT NULL,
  `rating` float NOT NULL,
  `location` varchar(45) NOT NULL,
  `tags` text NOT NULL,
  `ordered` int NOT NULL DEFAULT '0',
  `videos` text NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  `category_id` int NOT NULL,
  `city_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `name`, `descriptions`, `images`, `price`, `rating`, `location`, `tags`, `ordered`, `videos`, `open_time`, `close_time`, `category_id`, `city_id`, `created_at`, `updated_at`) VALUES
(4, 'Kebun Binatang Bandung', '[\"Bandung Zoo adalah kebun binatang dengan berbagai spesies hewan, taman bermain, dan fasilitas edukatif.\",\"Kebun Binatang Bandung, terletak di pusat kota Bandung, adalah destinasi keluarga yang menampilkan beragam koleksi satwa dari seluruh dunia. Dengan area seluas sekitar 14 hektar, kebun binatang ini menawarkan pengalaman mendekati berbagai spesies hewan, mulai dari gajah, singa, hingga beruang. Pengunjung dapat menjelajahi berbagai zona yang didesain sesuai dengan habitat alami hewan, memberikan edukasi sekaligus hiburan. Selain melihat hewan, kebun binatang ini juga menyediakan fasilitas seperti area bermain anak dan restoran untuk kenyamanan pengunjung. Dengan suasana yang hijau dan sejuk, tempat ini ideal untuk rekreasi sambil menikmati udara segar. Kebun Binatang Bandung juga berkomitmen pada konservasi dan pendidikan tentang pelestarian satwa, menjadikannya destinasi yang bermanfaat dan informatif. Tempat ini sering mengadakan program edukatif dan pertunjukan yang melibatkan interaksi langsung dengan hewan. Dengan fasilitas yang memadai dan koleksi satwa yang menarik, Kebun Binatang Bandung adalah pilihan sempurna untuk outing keluarga.\"]', '[\"66c2fa91e3b6f.webp\",\"66c2fa91e447b.webp\",\"66c2fa91e47dd.webp\",\"66c2fa91e4b0b.webp\"]', 52000, 4.3, 'Coblong, Bandung', '[\"Edukasi\",\"  Refund Mudah\",\"  Fasilitas Lengkap\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/ZBJqHcMKQvs?si=BT0NOxB7FScd2Lw5\",\"https:\\/\\/www.youtube.com\\/embed\\/ZX8G7MfLJmk?si=uJ2EYYIkesCLUJX9\",\"https:\\/\\/www.youtube.com\\/embed\\/zPiwskxIyPs?si=8FVOPu_MUgEfGxqJ\"]', '09:00:00', '16:00:00', 1, 3, '2024-08-19 07:56:01', '2024-08-28 04:22:43'),
(5, 'Kawah Putih', '[\"Kawah Putih Ciwidey Bandung menawarkan pemandangan danau kawah berwarna putih dengan udara sejuk.\",\"Kawah Putih merupakan destinasi wajib bagi wisatawan yang mencari pengalaman alam yang indah dan berbeda di Bandung. Sementara itu, Gua Sunyaragi juga merupakan destinasi wisata yang menarik, menyuguhkan perpaduan sejarah dan budaya yang kaya serta sering menjadi daya tarik bagi wisatawan lokal maupun mancanegara. Gua Sunyaragi di Cirebon adalah situs bersejarah yang memadukan keindahan alam dan warisan budaya. Terletak di tengah kota, gua ini adalah bagian dari kompleks Taman Sari Gua Sunyaragi yang dulunya digunakan sebagai tempat meditasi dan peristirahatan oleh para Sultan Cirebon dan keluarganya. Struktur gua ini unik karena dibangun dari batu karang dan batu bata dengan ornamen yang mencerminkan perpaduan budaya Hindu, Buddha, dan Islam. Pengunjung dapat menjelajahi lorong-lorong gua yang misterius dan menikmati pemandangan taman yang asri, serta mendalami kisah-kisah mistis yang mengelilingi situs ini. Gua Sunyaragi juga sering dijadikan tempat untuk pertunjukan seni budaya, menjadikannya destinasi wisata yang memikat bagi mereka yang tertarik pada sejarah dan kebudayaan.\"]', '[\"66c4289e58d17.jpg\",\"66c4289e597cf.webp\",\"66c4289e59f58.webp\",\"66c4289e5a38c.webp\"]', 32000, 2.9, 'Ciwidey, Bandung', '[\"Aksesibilitas\",\"  Fasilitas Lengkap\",\"  Akses Mudah\",\"  Destinasi Populer\"]', 1, '[\"https:\\/\\/www.youtube.com\\/embed\\/hc0eedPV0so?si=F2UC2wdl2aZlXmcX&#38;amp;start=6\",\"https:\\/\\/www.youtube.com\\/embed\\/uWrCaKA5kRw?si=qepJ4qwKHMHGikOL\",\"https:\\/\\/www.youtube.com\\/embed\\/pY7i_ER2cs8?si=dRE2x_Chfc1fAIC7\"]', '07:30:00', '17:00:00', 5, 3, '2024-08-20 05:24:46', '2024-08-28 10:49:55'),
(6, 'Situ Patenggang', '[\"Situ Patenggang di Bandung menawarkan keindahan danau alami yang tenang dan pemandangan menawan.\",\"Situ Patenggang adalah sebuah destinasi wisata yang terletak di Bandung, Jawa Barat, yang terkenal dengan keindahan danau yang memukau serta suasana alam yang menenangkan. Danau ini terletak di kaki Gunung Patuha, dan dikelilingi oleh hutan hijau yang lebat, menciptakan pemandangan yang menyejukkan. Pengunjung dapat menikmati berbagai aktivitas outdoor seperti berperahu di danau yang tenang, menjelajahi jalur hiking, atau hanya bersantai sambil menikmati keindahan alam sekitar. Tempat ini juga menyediakan area piknik yang nyaman, ideal untuk keluarga dan kelompok yang ingin menikmati makanan sambil dikelilingi oleh pemandangan alam. Selain itu, Situ Patenggang juga memiliki legenda lokal yang menarik, yaitu kisah cinta sepasang kekasih yang dipercaya menjadi asal-usul nama danau ini. Dengan udara segar dan pemandangan yang memukau, Situ Patenggang menjadi tempat ideal untuk melarikan diri dari kesibukan kota dan menikmati kedamaian alam. Kunjungan ke Situ Patenggang tidak hanya menawarkan pengalaman alam yang menenangkan tetapi juga kesempatan untuk mempelajari budaya dan cerita rakyat lokal.\"]', '[\"66c42cdf38cf5.jpg\",\"66c42cdf39317.jpg\",\"66c42cdf397ad.jpg\",\"66c42cdf3a2ee.jpg\"]', 25000, 4.4, 'Rancabali, Bandung', '[\"Area Berkemah\",\" Spot Instagramable\",\" View Indah\",\" Kamar Keluarga\",\" Fasilitas Lengkap\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/2JkpEU2iO6E?si=Hc_y34c1T4F89Dh6&#38;amp;start=4\",\"https:\\/\\/www.youtube.com\\/embed\\/bfV47OuqUAo?si=1cthzNawP0e71Vw9\",\"https:\\/\\/www.youtube.com\\/embed\\/GU5BJJwPS1A?si=2f8-SEVUJQr29KJu\"]', '07:00:00', '17:00:00', 5, 3, '2024-08-20 05:42:55', '2024-08-27 14:16:07'),
(7, 'Situ Gede', '[\"Situ Gede Tasikmalaya: Danau indah dengan pemandangan alam yang menenangkan dan aktivitas outdoor.\",\"Situ Gede, terletak di Tasikmalaya, adalah sebuah destinasi wisata alam yang menawarkan keindahan danau yang tenang dengan pemandangan yang asri. Dikelilingi oleh pepohonan hijau dan perbukitan yang mempesona, Situ Gede menjadi tempat yang sempurna untuk bersantai dan menikmati suasana alami. Pengunjung dapat menikmati berbagai aktivitas seperti berperahu di danau, memancing, atau sekadar berjalan-jalan di sekitar area danau. Di pagi dan sore hari, kabut tipis sering menyelimuti area ini, menambah kesan mistis dan menenangkan. Selain itu, tersedia fasilitas penunjang seperti area parkir, warung makan, dan tempat duduk untuk bersantai, menjadikan Situ Gede pilihan ideal bagi mereka yang ingin melepaskan diri dari hiruk-pikuk kota dan menikmati keindahan alam yang masih alami di Tasikmalaya.Selama musim hujan, danau ini sering kali mengalami kenaikan air yang membuat pemandangan menjadi lebih dramatis, dengan latar belakang pegunungan yang hijau dan lembap. Situ Gede menawarkan pengalaman berkendara yang menyenangkan bagi pengunjung yang datang dari luar kota.\"]', '[\"66c43d231a5d4.jpg\",\"66c43d231bd38.jpg\",\"66c43d231d46e.jpg\",\"66c43d231de3a.jpg\"]', 15000, 3.2, 'Mangkubumi, Tasikmalaya', '[\"Wisata Danau\",\"  Reservasi Cepat\",\"  Harga Terjangkau\",\"  Dekat Wisata Kuliner\",\"  Area Santai &#38; Relaksasi\",\"  Pilihan Makanan Lokal\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/HPEBo8jTYi0?si=LYy0yeeE_Ksmfq-Q&#38;amp;start=100\",\"https:\\/\\/www.youtube.com\\/embed\\/cCnCmVTFDu0?si=8Yr8CjfdH5k_lw9a\",\"https:\\/\\/www.youtube.com\\/embed\\/xH5sdjKG8IU?si=wyTloS0cmozgLxFh&#38;amp;start=14\"]', '07:00:00', '17:00:00', 5, 11, '2024-08-20 06:52:19', '2024-08-27 14:20:47'),
(8, 'Situ Gunung', '[\"Danau Situ Gunung di Sukabumi, destinasi alam tenang, eksotis, dan memukau dengan pemandangan indah.\",\"Danau Situ Gunung, yang terletak di Sukabumi, Jawa Barat, merupakan salah satu destinasi wisata yang menawarkan pesona alam yang memukau dengan suasana yang tenang dan damai. Dikelilingi oleh hutan tropis yang rimbun dan pegunungan hijau yang menyejukkan, danau ini adalah tempat ideal bagi para pengunjung yang mencari ketenangan dan keindahan alam. Air danau yang jernih, dengan refleksi pegunungan di sekelilingnya, menciptakan pemandangan yang menakjubkan, sementara aktivitas seperti berperahu atau sekadar duduk di tepi danau memungkinkan pengunjung untuk merasakan kedekatan dengan alam. Tidak hanya menawarkan keindahan visual, Danau Situ Gunung juga merupakan lokasi yang baik untuk hiking dan camping, dengan jalur-jalur yang mengarah ke spot-spot yang menarik dan pemandangan spektakuler. Sebagai bagian dari Taman Nasional Gunung Gede Pangrango, danau ini juga memiliki nilai ekologis yang tinggi, menjadikannya tempat yang sempurna untuk menikmati keindahan alam sambil menghargai kekayaan flora dan fauna setempat.\"]', '[\"66c44324e7b03.jpg\",\"66c44324e86fd.jpg\",\"66c44324e8e2a.webp\",\"66c44324e9511.jpg\"]', 13000, 4.7, 'Kadudampit, Sukabumi', '[\"Camping di Danau\",\" Wisata Keluarga\",\" Spot Memancing\",\" Pemandangan Alam\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/lpLRIIiSDx8?si=08VfZY4cBtKfCcgf&#38;amp;start=37\",\"https:\\/\\/www.youtube.com\\/embed\\/b4XcHO_7DDU?si=atEBg-tTzJbLXXbc&#38;amp;start=55\",\"https:\\/\\/www.youtube.com\\/embed\\/FMH0kwiWJAg?si=85wehCMqCL1ZD8yi\"]', '07:00:00', '16:00:00', 5, 2, '2024-08-20 07:17:56', '2024-08-20 07:17:56'),
(9, 'Gua Sunyaragi', '[\"Gua Sunyaragi di Cirebon menawarkan keindahan arsitektur unik, sejarah, dan suasana mistis yang memukau.\",\"Gua Sunyaragi di Cirebon adalah situs bersejarah yang memadukan keindahan alam dan warisan budaya. Terletak di tengah kota, gua ini adalah bagian dari kompleks Taman Sari Gua Sunyaragi yang dulunya digunakan sebagai tempat meditasi dan peristirahatan oleh para Sultan Cirebon dan keluarganya. Struktur gua ini unik karena dibangun dari batu karang dan batu bata dengan ornamen yang mencerminkan perpaduan budaya Hindu, Buddha, dan Islam. Pengunjung dapat menjelajahi lorong-lorong gua yang misterius dan menikmati pemandangan taman yang asri, serta mendalami kisah-kisah mistis yang mengelilingi situs ini. Gua Sunyaragi juga sering dijadikan tempat untuk pertunjukan seni budaya, menjadikannya destinasi wisata yang memikat bagi mereka yang tertarik pada sejarah dan kebudayaan. Gua Sunyaragi tidak hanya menjadi tempat wisata, tetapi juga destinasi edukatif yang memberikan wawasan tentang sejarah dan arsitektur tradisional Cirebon. Gua Sunyaragi juga memiliki nilai arkeologis yang tinggi, menjadikannya sebagai salah satu warisan budaya penting di Cirebon yang harus dilestarikan.\"]', '[\"66c5589490bc1.webp\",\"66c5589491d4c.jpg\",\"66c5589492384.jpg\",\"66c558949274d.jpg\"]', 17000, 3.2, 'Kesambi, Cirebon', '[\"Tempat Bersejarah\",\" Warisan Budaya\",\" Tur Bangunan Bersejarah\",\" Wisata Spiritual\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/H7WAQQCxlQI?si=dpUhS3_xiOb3vyAh&#38;amp;start=44\",\"https:\\/\\/www.youtube.com\\/embed\\/nVHXYdyLhjU?si=OT9dH9oLVuiGihpB\",\"https:\\/\\/www.youtube.com\\/embed\\/08PGLO0DMAw?si=rEjK6b2k6VKZ1SJx\"]', '08:00:00', '17:00:00', 6, 7, '2024-08-21 03:01:40', '2024-08-27 14:08:31'),
(10, 'Gua Buniayu', '[\"Gua Buniayu menawarkan petualangan bawah tanah yang menantang dengan pemandangan stalaktit menakjubkan.\",\"Gua Buniayu merupakan salah satu destinasi wisata alam yang menantang di Sukabumi, Jawa Barat. Terletak di kawasan karst yang eksotis, gua ini menawarkan pengalaman penjelajahan bawah tanah yang unik dan penuh petualangan. Dengan panjang lorong lebih dari 3 kilometer, pengunjung dapat menikmati stalaktit dan stalagmit yang masih alami serta formasi bebatuan yang memukau. Gua ini terbagi menjadi dua jalur, jalur terang yang cocok untuk pemula dan jalur gelap yang menantang bagi yang lebih berpengalaman. Salah satu daya tarik utama adalah sungai bawah tanah yang jernih dan suasana gua yang masih asri. Pemandu yang berpengalaman siap memandu wisatawan untuk mengeksplorasi keindahan gua ini dengan aman. Pengalaman menyusuri Gua Buniayu membutuhkan stamina fisik yang baik karena medannya cukup menantang, termasuk menuruni dinding gua dengan tali. Selain penjelajahan gua, area sekitar juga menawarkan panorama hutan yang hijau dan sejuk. Gua Buniayu menjadi destinasi yang ideal bagi para pecinta petualangan dan alam yang ingin merasakan sensasi menjelajah dunia bawah tanah.\"]', '[\"66c56c26368b0.jpg\",\"66c56c2637fdd.jpg\",\"66c56c263877d.jpg\",\"66c56c2638d19.jpg\"]', 80000, 4.1, 'Nyalindung, Sukabumi', '[\"Keindahan Tersembunyi\",\" Jelajah Gua Terpanjang\",\" Pengalaman Alam Unik\",\" Trekking Gua\",\" Jelajah Gua\"]', 1, '[\"https:\\/\\/www.youtube.com\\/embed\\/bHhHB_maEuQ?si=cnPKmoXhsYAwGj0d\",\"https:\\/\\/www.youtube.com\\/embed\\/ppXBqGbEqNE?si=zejc_2K7khTloTtQ&#38;amp;start=110\",\"https:\\/\\/www.youtube.com\\/embed\\/T7dLLc2Heus?si=m1kJ6_joqozxUxZz&#38;amp;start=54\"]', '08:00:00', '16:00:00', 6, 2, '2024-08-21 04:25:10', '2024-08-28 04:20:00'),
(11, 'Gua Pawon', '[\"Gua Pawon adalah situs arkeologi dengan gua dan lukisan prasejarah yang menakjubkan di Jawa Barat.\",\"Gua Pawon adalah sebuah situs purbakala yang terletak di Kabupaten Bandung Barat, Jawa Barat, Indonesia. Gua ini menyimpan jejak kehidupan manusia prasejarah yang sangat berharga. Berbagai artefak dari masa Mesolitik dan Neolitik seperti alat-alat dari batu obsidian telah ditemukan di sini. Gua Pawon tidak hanya menarik bagi para arkeolog, tetapi juga bagi wisatawan yang ingin mengetahui lebih dalam tentang sejarah manusia purba di Nusantara. Letaknya yang strategis dan keindahan alam sekitar membuat Gua Pawon menjadi destinasi wisata edukasi yang populer. Selain itu, Gua Pawon juga memiliki nilai spiritual bagi masyarakat setempat, terutama bagi komunitas Sunda. Dengan mengunjungi Gua Pawon, kita dapat merasakan langsung sentuhan sejarah dan memahami bagaimana kehidupan manusia purba di wilayah ini. Gua Pawon, yang terletak di Padalarang, Bandung, adalah situs arkeologi yang menyimpan peninggalan prasejarah dan menawarkan pemandangan gua yang eksotis dengan formasi batuan alami yang unik. Gua Pawon juga menyuguhkan panorama indah dengan latar belakang perbukitan kapur yang memukau.\"]', '[\"66c56e8b85699.jpg\",\"66c56e8b860ee.jpg\",\"66c56e8b86a3d.jpg\",\"66c56e8b872c8.jpg\"]', 10000, 4.5, 'Cipatat, Bandung Barat', '[\"Situs Purba\",\"  Destinasi Edukasi\",\"  Wisata Akhir Pekan\",\"  Jelajah Gua\",\"  Tur Arkeologi\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/OgF41s3iA9g?si=kGubAMPYD1IRi6nj\",\"https:\\/\\/www.youtube.com\\/embed\\/Fafa1r125O4?si=k1-HZX7qvn-RYfdZ&#38;amp;start=10\",\"https:\\/\\/www.youtube.com\\/embed\\/vWMHaYfLLA8?si=5mdz7B6P6jGnVEPE\"]', '09:00:00', '15:30:00', 6, 3, '2024-08-21 04:35:23', '2024-08-28 04:22:05'),
(12, 'Forest Park Tahura Ir. H. Juanda', '[\"Tahura Djuanda menawarkan keindahan alam yang menakjubkan, cocok untuk kegiatan rekreasi dan edukasi.\",\"Taman Hutan Raya Ir. H. Djuanda adalah sebuah oase hijau yang terletak di Kota Bandung, Jawa Barat. Sebagai paru-paru kota, Tahura Djuanda menawarkan pengalaman alam yang menyegarkan. Kawasan konservasi ini menyajikan beragam ekosistem, mulai dari hutan pinus yang menjulang tinggi hingga lembah-lembah yang hijau. Pengunjung dapat menikmati keindahan alam dengan trekking menyusuri berbagai jalur, menikmati kesegaran air terjun, atau sekedar bersantai di area piknik. Selain itu, Tahura Djuanda juga menyimpan nilai sejarah yang menarik, seperti Goa Jepang yang menjadi saksi bisu masa lalu. Dengan udara yang sejuk dan pemandangan yang memukau, Tahura Djuanda menjadi destinasi wisata yang sempurna bagi siapa saja yang ingin melarikan diri dari hiruk pikuk perkotaan dan mencari ketenangan di tengah alam. Taman Hutan Raya Ir. H. Djuanda di Bandung merupakan kawasan konservasi alam yang luas, menawarkan keindahan hutan pinus, gua bersejarah, dan air terjun yang memukau. Pengunjung dapat menikmati udara segar sambil menjelajahi jalur hiking yang menyatu dengan alam.\"]', '[\"66c5709234e44.jpg\",\"66c570923583f.jpg\",\"66c5709235efd.jpg\",\"66c570923662b.jpg\"]', 100000, 4.6, 'Cimenyan, Bandung', '[\"Camping\",\" Trekking\",\" Alam Yang Segar\",\" Hutan Rimbun\",\" Udara Sejuk\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/JFhTX221z1s?si=fdpQhrCLXs9AlXaA\",\"https:\\/\\/www.youtube.com\\/embed\\/Yps0Y8Cl-Ys?si=Xk4-PqM2WPNfFhUr\",\"https:\\/\\/www.youtube.com\\/embed\\/qoG82rj2UvY?si=f2IP8T-H70M2LUwY\"]', '08:00:00', '16:00:00', 3, 3, '2024-08-21 04:44:02', '2024-08-28 00:58:38'),
(13, 'Farm House Susu', '[\"Farm House Susu menawarkan pengalaman wisata ala peternakan dengan berbagai atraksi dan spot foto menarik.\",\"Farm House Susu Lembang adalah destinasi wisata yang menyajikan pengalaman beternak dan mengolah susu sapi secara langsung. Berlokasi di Lembang, Bandung Barat, Farm House Susu Lembang menawarkan pemandangan alam pegunungan yang indah. Pengunjung dapat menyusuri peternakan sapi dan melihat proses pemerahan susu secara langsung. Selain itu, ada berbagai kelas edukasi seperti membuat es krim, keju, dan yogurt dari susu segar. Setelah belajar, pengunjung bisa membeli aneka produk susu segar dan olahan di toko suvenir. Fasilitas lain yang tersedia adalah kandang kelinci, kincir angin, dan restoran yang menyajikan masakan berbahan dasar susu. Farm House Susu Lembang juga menyediakan spot foto yang instagramable untuk mengabadikan momen liburan. Wahana permainan anak-anak seperti komidi putar dan kuda-kudaan juga dapat dinikmati di sini. Tiket masuk ke Farm House Susu Lembang terjangkau, sehingga cocok untuk dikunjungi bersama keluarga maupun teman-teman. Farm House Susu Lembang adalah destinasi wisata keluarga yang menyajikan nuansa pedesaan Eropa dengan spot foto menarik dan fasilitas mencicipi susu segar.\"]', '[\"66c572d943575.webp\",\"66c572d943de8.jpg\",\"66c572d94481d.jpg\",\"66c572d944ff6.jpg\"]', 30000, 3.8, 'Lembang, Bandung Barat', '[\"Wisata Keluarga\",\"   Seru\",\"   Piknik\",\"   Spot Foto\",\"   Peternakan\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/OoWJui1YSiY?si=-RZ4f3dDayCyXNcG\",\"https:\\/\\/www.youtube.com\\/embed\\/vkxDUkIqZy0?si=bAfVbEr4hNCTyumT\",\"https:\\/\\/www.youtube.com\\/embed\\/68zlToWj0IY?si=FNO-OIBwtSzV6eYi\"]', '09:00:00', '18:00:00', 1, 3, '2024-08-21 04:53:45', '2024-08-28 01:22:15'),
(14, 'Dago Dreampark', '[\"Dago Dreampark adalah taman hiburan keluarga dengan beragam wahana permainan ekstrem dan santai di Bandung.\",\"Dago Dreampark adalah taman hiburan keluarga yang terletak di Dago, Bandung. Taman ini menawarkan berbagai wahana permainan dan atraksi yang cocok untuk segala usia. Pengunjung dapat menikmati permainan ekstrem seperti roller coaster, flying fox, dan bungee jumping. Selain itu, ada juga wahana yang lebih santai seperti kincir raksasa, kora-kora, dan komidi putar. Dago Dreampark juga memiliki taman bermain untuk anak-anak yang dilengkapi perosotan dan jembatan gantung. Pengunjung dapat bersantai sambil menikmati pemandangan Kota Bandung dari ketinggian di area cafe dan restoran. Fasilitas lainnya termasuk kolam renang, area outbound, dan tempat bermain laser tag. Tiket masuk Dago Dreampark terjangkau dengan berbagai paket yang ditawarkan. Wahana-wahana di taman hiburan ini selalu dikembangkan untuk memberikan pengalaman yang lebih menarik bagi pengunjung. Dago Dreampark menjadi salah satu destinasi wisata populer di Bandung yang cocok untuk liburan keluarga. Dago Dreampark adalah destinasi wisata keluarga di Bandung yang menawarkan berbagai wahana seru dan spot foto instagramable.\"]', '[\"66c5756e205e3.webp\",\"66c5756e21056.webp\",\"66c5756e21949.webp\",\"66c5756e227ed.webp\"]', 30000, 4.2, 'Lembang, Bandung Barat', '[\"Family Friendly\",\" Games\",\" Wahana\",\" Memacu Adrenalin\",\" Petualangan\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/Yit9Mh0CZk0?si=gI3QivS03eylBRey\",\"https:\\/\\/www.youtube.com\\/embed\\/uGDA7LAX-iU?si=WcNQ1i5ZGEnZ-yEl\",\"https:\\/\\/www.youtube.com\\/embed\\/0BYPahxTYgQ?si=BSckN2UAIEBIH7Tk\"]', '09:00:00', '17:00:00', 1, 3, '2024-08-21 05:04:46', '2024-08-28 01:25:11'),
(15, 'Curug Maribaya', '[\"Curug Maribaya adalah destinasi wisata alam dengan pemandangan air terjun yang indah di Lembang, Bandung.\",\"Curug Maribaya adalah destinasi wisata alam yang populer di Lembang, Bandung Barat. Dulu, tempat ini terkenal dengan pemandian air panasnya, namun kini daya tarik utamanya adalah keberadaan beberapa air terjun atau curug yang memukau. Salah satu keunikan Curug Maribaya adalah adanya jembatan yang dibangun di atas air terjun, sehingga pengunjung dapat menikmati keindahannya dari dekat. Kawasan wisata ini menawarkan suasana yang sejuk dan asri, sangat cocok untuk melepas penat dari hiruk pikuk perkotaan. Selain menikmati keindahan air terjun, pengunjung juga dapat melakukan berbagai aktivitas menarik seperti berfoto, trekking ringan, atau sekadar bersantai di area sekitar. Curug Maribaya memiliki beberapa aliran sungai, yaitu Sungai Cikawari dan Sungai Cigulung, yang masing-masing memiliki keindahan tersendiri. Dengan panorama alam yang menakjubkan, udara yang segar, dan fasilitas yang cukup lengkap, Curug Maribaya menjadi salah satu destinasi wisata wajib bagi para pencinta alam yang berkunjung ke Bandung. Curug Maribaya di Lembang menawarkan keindahan air terjun alami dan suasana sejuk yang menenangkan.\"]', '[\"66c5778d37e0c.jpg\",\"66c5778d3875c.jpg\",\"66c5778d390da.jpg\",\"66c5778d39947.jpg\"]', 75000, 3.7, 'Lembang, Bandung Barat', '[\"Rileks\",\"  Bermain Air\",\"  Eksplorasi Alam\",\"  Hunting Foto\",\"  Sejuk\",\"  Asri\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/bMloMnivcIU?si=zEMO1dsru9LBInkD\",\"https:\\/\\/www.youtube.com\\/embed\\/BxrZirI566g?si=C9wSrMDpVuQIrVgk\",\"https:\\/\\/www.youtube.com\\/embed\\/-OjVIuyS4-s?si=yohW6txoefLDMWwD\"]', '09:00:00', '21:00:00', 2, 3, '2024-08-21 05:13:49', '2024-08-28 01:10:08'),
(16, 'Curug Cimahi', '[\"Curug Cimahi adalah air terjun tertinggi di Jawa Barat dengan pemandangan alam yang menakjubkan di Cimahi, Bandung.\",\"Curug Cimahi adalah salah satu destinasi wisata alam yang paling populer di Bandung Barat. Terletak di ketinggian sekitar 1050 mdpl, air terjun ini menawarkan pesona alam yang menakjubkan dengan ketinggian sekitar 87 meter. Deburan air yang deras dan pemandangan hijau yang menyegarkan menjadi daya tarik utama Curug Cimahi. Untuk mencapai dasar air terjun, pengunjung perlu menuruni ratusan anak tangga. Selain menikmati keindahan alam, pengunjung juga dapat melakukan berbagai aktivitas seperti berenang di kolam alami, piknik, atau sekadar bersantai menikmati udara segar. Curug Cimahi juga menyediakan fasilitas yang cukup lengkap, seperti area parkir, warung makan, dan toilet. Suasana yang sejuk dan pemandangan alam yang indah membuat Curug Cimahi menjadi tempat yang tepat untuk melepas penat dan menghabiskan waktu bersama keluarga maupun teman. Curug Cimahi, yang terletak di Kabupaten Bandung Barat, menawarkan keindahan air terjun setinggi 87 meter yang dikelilingi oleh hutan hijau lebat, menciptakan suasana sejuk dan damai bagi para pengunjung. Curug Cimahi semakin memukau pada malam hari membuat air terjun tampak magis dan mempesona.\"]', '[\"66c579c3b9b14.jpg\",\"66c579c3ba6d6.jpg\",\"66c579c3bb234.webp\",\"66c579c3bb8ef.jpeg\"]', 25000, 4.4, 'Cisarua, Bandung Barat', '[\"Jelajah Alam\",\" Camping\",\" Liburan Akhir Pekan\",\" Recomended\"]', 1, '[\"https:\\/\\/www.youtube.com\\/embed\\/XMrOann-Qmw?si=XJrJdlS-oqtLRI1e\",\"https:\\/\\/www.youtube.com\\/embed\\/jsl5sqno26c?si=DxsbxsmqcHj7o_cU\",\"https:\\/\\/www.youtube.com\\/embed\\/gCGj9FI0n5E?si=HnTKadwLYwILD-9S\"]', '07:00:00', '17:00:00', 2, 3, '2024-08-21 05:23:15', '2024-08-28 14:07:46'),
(17, 'Curug Cilember', '[\"Curug Cilember adalah air terjun indah di Bogor dengan trekking dan pemandangan hutan tropis.\",\"Curug Cilember adalah destinasi wisata alam yang populer di Bogor, Jawa Barat. Terkenal dengan keindahan tujuh air terjunnya, Curug Cilember menawarkan pengalaman menyegarkan di tengah alam yang asri. Setiap air terjun memiliki karakteristik yang unik, mulai dari yang kecil dan tenang hingga yang deras dan menantang. Selain menikmati keindahan air terjun, pengunjung juga dapat menjelajahi hutan pinus yang sejuk atau mengunjungi taman kupu-kupu yang penuh warna. Trek menuju setiap air terjun cukup bervariasi, ada yang mudah dijangkau dan ada pula yang membutuhkan sedikit tenaga ekstra. Udara yang sejuk dan pemandangan alam yang hijau membuat Curug Cilember menjadi tempat yang sempurna untuk melepas penat dan menghabiskan waktu bersama keluarga atau teman. Fasilitas yang tersedia di kawasan wisata ini cukup lengkap, mulai dari area parkir, warung makan, hingga toilet. Curug Cilember, yang terletak di Bogor, menawarkan keindahan air terjun bertingkat yang dikelilingi oleh hutan pinus asri, menciptakan suasana sejuk dan menenangkan.\"]', '[\"66c57c2d6fe1c.jpg\",\"66c57c2d70bc0.jpg\",\"66c57c2d7129a.jpg\",\"66c57c2d71aef.jpg\"]', 80000, 3.9, 'Megamendung, Bogor', '[\"Trekkking Air Terjun\",\"   Ketenangan Mental\",\"   Air Terjun Tujuh Tingkat\",\"   Akses Mudah\",\"   Jelajah Hutan\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/Ydwwdc4-uZg?si=Uf68Sg-TU5UdSXYY&#38;amp;start=690\",\"https:\\/\\/www.youtube.com\\/embed\\/jYGbFnPyuIY?si=8PXNORYtlp2rx4WB\",\"https:\\/\\/www.youtube.com\\/embed\\/h5R5z6_zR5o?si=zLEe6_y8RfNR_LfT&#38;amp;start=60\"]', '07:00:00', '21:00:00', 2, 4, '2024-08-21 05:33:33', '2024-08-28 02:47:11'),
(18, 'Curug Cikaso', '[\"Curug Cikaso adalah air terjun megah dengan tiga aliran air dan pemandangan alam yang indah.\",\"Curug Cikaso, terletak di kawasan Sukabumi, Jawa Barat, adalah salah satu keajaiban alam yang memukau dengan tiga air terjun yang bertingkat dan membentuk sebuah pemandangan yang menawan. Air terjun ini dikenal dengan nama Curug Cikaso karena terletak di aliran Sungai Cikaso, yang menyajikan panorama alam yang luar biasa dengan suasana yang tenang dan asri. Air terjun pertama memiliki ketinggian sekitar 80 meter, sementara dua air terjun lainnya lebih kecil namun sama menawannya. Di sekitar Curug Cikaso, pengunjung dapat menikmati keindahan hutan tropis yang lebat dan udara segar yang menyejukkan. Akses menuju Curug Cikaso memerlukan perjalanan melalui jalan setapak yang dikelilingi oleh pepohonan, menawarkan pengalaman trekking yang menyenangkan. Saat musim hujan, debit air terjun meningkat dan menciptakan semburan air yang spektakuler. Pengunjung juga dapat melakukan aktivitas seperti berenang di kolam di bawah air terjun atau sekadar berfoto dengan latar belakang yang menakjubkan. Untuk mencapai Curug Cikaso, pengunjung dapat memulai perjalanan dari kota Sukabumi dengan mudah.\"]', '[\"66c57ed323c2a.webp\",\"66c57ed3245c5.jpg\",\"66c57ed32552a.jpg\",\"66c57ed325d00.jpeg\"]', 120000, 3.6, 'Cibitung, Sukabumi', '[\"Piknik Keluarga\",\"  Keajaiban Alam\",\"  Suasana Tenang\",\"  Menyegarkan\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/WPdSQGxPV8c?si=M1ipWBeMQfXhftjz&#38;amp;start=34\",\"https:\\/\\/www.youtube.com\\/embed\\/1INSheAiUpU?si=OFsQhXlPuamPU2U5&#38;amp;start=33\",\"https:\\/\\/www.youtube.com\\/embed\\/Exk009Xy-kw?si=4N8Sr44pXO4hhrb2&#38;amp;start=32\"]', '06:00:00', '17:00:00', 2, 2, '2024-08-21 05:44:51', '2024-08-28 01:19:28'),
(19, 'Gunung Gede Pangrango', '[\"Gunung Pangrango menawarkan pemandangan indah dan trekking menantang di ketinggian 3.019 meter.\",\"Gunung Gede Pangrango adalah destinasi alam yang menakjubkan terletak di perbatasan antara Jawa Barat dan Jawa Tengah, Indonesia. Gunung ini terdiri dari dua puncak utama: Gunung Gede dengan ketinggian 2.958 meter dan Gunung Pangrango yang mencapai 3.019 meter. Terkenal dengan keindahan alamnya, gunung ini menawarkan pemandangan spektakuler dari hutan hujan tropis yang subur, padang edelweiss yang menawan, dan aliran air terjun yang segar. Jalur pendakian yang populer termasuk jalur Cibodas dan jalur Suryakencana, yang menawarkan pengalaman mendaki yang menantang serta kesempatan untuk menikmati flora dan fauna yang langka. Selain sebagai destinasi pendakian, Gunung Gede Pangrango juga merupakan kawasan konservasi dengan keragaman hayati yang melimpah, termasuk berbagai spesies burung, mamalia, dan tumbuhan endemik. Pengunjung dapat menemukan berbagai pos istirahat sepanjang jalur pendakian yang memberikan kesempatan untuk beristirahat sambil menikmati keindahan alam sekitar. Cuaca di gunung ini bervariasi, dengan suhu yang bisa sangat dingin di puncak, sehingga persiapan yang matang sangat dianjurkan.\"]', '[\"66c581be74385.jpg\",\"66c581be74d07.jpg\",\"66c581be753f7.jpg\",\"66c581be75bbf.jpg\"]', 100000, 4.7, 'Cipanas, Cianjur', '[\"Pendakian Gunung\",\"    Pendakian Pagi\",\"    Ketenangan Alam\",\"    Rasa Petualangan\",\"    Area Camping\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/IkmM3NM46v4?si=uRt1l3UwXc-GXn1P&#38;amp;start=241\",\"https:\\/\\/www.youtube.com\\/embed\\/HmhJDatQpI0?si=JfzDAofWHtY2YcZx\",\"https:\\/\\/www.youtube.com\\/embed\\/Hi4cGTASH2E?si=khrkL2cA-bcRc6mX\"]', '06:00:00', '18:00:00', 4, 12, '2024-08-21 05:57:18', '2024-08-27 14:26:13'),
(20, 'Gunung Tangkuban Parahu', '[\"Gunung Tangkuban Perahu adalah gunung berapi aktif dengan kawah besar dan pemandangan menawan di Jawa Barat.\",\"Gunung Tangkuban Perahu, terletak di Jawa Barat, Indonesia, adalah gunung berapi yang terkenal dengan bentuk kawahnya yang unik dan menawan. Dengan ketinggian sekitar 2.084 meter, gunung ini menawarkan pemandangan spektakuler dari kawah-kawah yang aktif seperti Kawah Ratu, Kawah Domas, dan Kawah Upas. Legenda lokal mengaitkan bentuk gunung ini dengan cerita rakyat tentang seorang raja yang berubah menjadi gunung setelah cintanya tidak berbalas. Pengunjung dapat menjelajahi area kawah yang beruap dan melihat langsung aktivitas vulkanik dari jarak dekat. Tangkuban Perahu juga menawarkan trek pendakian yang relatif mudah, menjadikannya destinasi yang cocok untuk berbagai level pendaki. Suhu di area kawah bisa dingin, jadi persiapkan pakaian hangat saat mengunjunginya. Di sekitar gunung, terdapat berbagai kios dan warung yang menjual makanan dan cendera mata, menambah kenyamanan wisatawan. Keindahan alam dan pemandangan luas dari puncak gunung menjadikannya tempat yang populer untuk fotografi. Gunung Tangkuban Perahu juga memiliki nilai budaya dan sejarah yang penting bagi masyarakat setempat.\"]', '[\"66c58b7477882.jpg\",\"66c58b74782e4.webp\",\"66c58b74789d3.webp\",\"66c58b7479097.webp\"]', 285000, 4.6, 'Lembang, Bandung Barat', '[\"Jelajah Kawah\",\" Spot Foto\",\" Wisata Kuliner di Sekitar\",\" Relaksasi Alam\",\" Pemandangan Lembah\",\" Penginapan Terdekat\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/94ZnTu_BxWc?si=Itegl3KRfSn5VgBc\",\"https:\\/\\/www.youtube.com\\/embed\\/hjiAbR_oRJ4?si=wxUC-yJOdUkuvoXr\",\"https:\\/\\/www.youtube.com\\/embed\\/HJBAAFvtUgQ?si=AQB1k_5ymohOQxPI\"]', '07:00:00', '15:00:00', 4, 3, '2024-08-21 06:38:44', '2024-08-27 14:27:07'),
(21, 'Gunung Ciremai', '[\"Gunung Ciremai adalah gunung tertinggi di Jawa Barat dengan pemandangan alam yang menakjubkan.\",\"Gunung Ciremai, dengan ketinggian 3.078 meter, adalah gunung tertinggi di Jawa Barat, Indonesia, menawarkan keindahan alam yang memukau dan pengalaman pendakian yang menantang. Terletak di perbatasan antara Kabupaten Kuningan dan Majalengka, gunung ini memiliki pemandangan yang spektakuler, dengan kawah besar dan padang Edelweiss yang luas di puncaknya. Jalur pendakian utama, seperti jalur Palutungan dan jalur Apuy, memberikan akses untuk menikmati hutan tropis yang lebat, flora yang beragam, dan fauna liar yang langka. Suhu di puncak bisa sangat dingin, sehingga persiapan yang matang sangat penting untuk memastikan kenyamanan selama perjalanan. Selain keindahan alamnya, Gunung Ciremai juga memiliki nilai budaya bagi masyarakat lokal yang sering mengadakan upacara adat di sekitarnya. Para pendaki dapat menemukan berbagai pos istirahat di sepanjang jalur pendakian, yang memungkinkan mereka untuk beristirahat sambil menikmati pemandangan. Aktivitas vulkanik di gunung ini menambah daya tariknya, meskipun saat ini tidak ada aktivitas letusan yang signifikan.\"]', '[\"66c58e2495704.jpg\",\"66c58e2495f11.jpg\",\"66c58e2496701.jpg\",\"66c58e2497413.jpg\"]', 230000, 4.5, 'Jalaksana, Kuningan', '[\"Pendakian\",\"  Camping di Puncak\",\"  Pemandangan Puncak\",\"  Sensasi Petualangan\",\"  Sumber Air Bersih\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/0GwkpXWlS0Y?si=WfVkPIoYCRIaHnNY\",\"https:\\/\\/www.youtube.com\\/embed\\/gvN6ULS_chM?si=-E3AoToDnz2v6z1f\",\"https:\\/\\/www.youtube.com\\/embed\\/8Mdm_WGzEkI?si=LVq7O05yTVP18nwh\"]', '13:00:00', '19:50:00', 4, 7, '2024-08-21 06:50:12', '2024-08-27 14:28:49'),
(22, 'Gunung Batu Jonggol', '[\"Gunung Batu adalah destinasi wisata dengan pemandangan indah dari puncak batuan, ideal untuk trekking dan fotografi.\",\"Gunung Batu, yang terletak di daerah Jawa Barat, Indonesia, adalah destinasi wisata alam yang menawarkan pemandangan spektakuler dan tantangan pendakian yang seru. Dengan ketinggian sekitar 1.200 meter, gunung ini dikenal karena batu-batu besar dan formasi batuannya yang unik, yang menciptakan panorama menakjubkan di sekelilingnya. Pendakian menuju puncak relatif singkat namun menantang, dengan jalur yang melintasi hutan tropis dan pemandangan lembah yang hijau. Sesampainya di puncak, pengunjung disuguhi panorama luas yang mencakup pegunungan sekitar dan kota-kota kecil di lembah. Gunung Batu juga terkenal dengan keanekaragaman flora dan fauna, serta udara segar yang menyegarkan. Suhu di area puncak bisa menjadi dingin, jadi bawa pakaian hangat untuk kenyamanan. Selain trekking, destinasi ini juga populer untuk aktivitas fotografi, terutama saat matahari terbit dan terbenam. Di sekitar area kaki gunung, terdapat beberapa warung yang menawarkan makanan dan minuman tradisional. Gunung Batu di Jonggol adalah destinasi yang ideal untuk para pendaki dan pecinta alam, menawarkan pemandangan spektakuler dari puncaknya.\"]', '[\"66c591c9ea162.jpg\",\"66c591c9eab67.webp\",\"66c591c9eb535.jpg\",\"66c591c9ebd35.jpg\"]', 25000, 4.2, 'Sukamakmur, Bogor', '[\"Jelajah Alam\",\" Petualangan\",\" Spot Fotografi\",\" Area Camping\",\"\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/EAlC_oFsU7U?si=pGPOkcs4s_d_zvCJ\",\"https:\\/\\/www.youtube.com\\/embed\\/me2tbYKUIaA?si=dcMLGIBG9PEKLwgw\",\"https:\\/\\/www.youtube.com\\/embed\\/R2P0idCwpls?si=-Mzj2aP7lDzOzBzG\"]', '08:00:00', '17:00:00', 4, 4, '2024-08-21 07:05:45', '2024-08-27 14:32:12'),
(23, 'Orchid Forest Cikole', '[\"Orchid Forest Cikole adalah taman orkid di hutan pinus dengan keindahan bunga dan fasilitas rekreasi yang menawan.\",\"Orchid Forest Cikole, terletak di Lembang, Jawa Barat, adalah destinasi wisata alam yang memukau dengan koleksi orkid yang menawan. Dikelilingi oleh hutan pinus yang sejuk dan asri, tempat ini menawarkan pengalaman yang menyegarkan bagi pengunjung yang mencari ketenangan di tengah alam. Di sini, Anda bisa menemukan berbagai spesies orkid langka yang dipelihara dengan penuh perhatian dalam suasana yang rimbun dan hijau. Selain menikmati keindahan bunga orkid, pengunjung dapat menjelajahi berbagai area menarik seperti jembatan gantung, area foto estetik, dan taman tematik yang dirancang untuk meningkatkan pengalaman berwisata. Orchid Forest Cikole juga menyediakan fasilitas rekreasi seperti trekking ringan dan piknik, menjadikannya tempat yang ideal untuk keluarga dan pasangan. Suasana yang tenang dan udara segar di hutan pinus memberikan latar belakang sempurna untuk bersantai dan menikmati keindahan alam. Tempat ini juga sering mengadakan acara dan festival bunga, menambah daya tarik wisatawan. Dengan berbagai fasilitas dan pemandangan yang menawan.\"]', '[\"66c593848df3a.jpg\",\"66c593848e9f7.jpg\",\"66c593848f166.jpg\",\"66c593848f957.jpg\"]', 120000, 3.5, 'Lembang, Bandung Barat', '[\"Piknik di Alam\",\" Relaksasi di Alam\",\" Hutan Anggrek\",\" Edukasi Botani\",\" Area Berpiknik\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/P2mmIq1rASg?si=uT00I2I3kW9km1JS\",\"https:\\/\\/www.youtube.com\\/embed\\/k0-KkYwq378?si=6vcN8Qp6RFRUyvZR\",\"https:\\/\\/www.youtube.com\\/embed\\/t6kmb1mAH9Y?si=y0EcerjvM8rLhb4a\"]', '09:00:00', '18:00:00', 3, 3, '2024-08-21 07:13:08', '2024-08-28 00:59:48'),
(24, 'WaterBoom Lippo Cikarang', '[\"Waterboom Lippo Cikarang adalah taman air yang menyenangkan dengan berbagai seluncuran dan kolam renang di Cikarang.\",\"Waterboom Lippo Cikarang adalah taman rekreasi air yang terletak di Cikarang, Jawa Barat, menawarkan berbagai atraksi menyenangkan untuk semua usia. Dengan desain yang modern dan fasilitas yang lengkap, Waterboom Lippo Cikarang menyediakan beragam seluncuran air yang mendebarkan, kolam renang besar, serta area bermain anak yang aman dan menyenangkan. Pengunjung dapat menikmati sensasi seluncuran ekstrem atau bersantai di kolam arus yang tenang sambil menikmati suasana tropis. Taman ini juga dilengkapi dengan fasilitas seperti area makan, tempat duduk yang nyaman, dan cabana untuk bersantai. Dengan berbagai pilihan makanan dan minuman, pengunjung dapat menikmati hidangan lezat tanpa harus meninggalkan area rekreasi. Waterboom Lippo Cikarang menjadi pilihan ideal untuk liburan keluarga, acara kelompok, atau sekadar bersenang-senang di akhir pekan. Untuk kenyamanan, taman ini menyediakan layanan penyewaan pelampung, loker, dan fasilitas kebersihan yang terjaga. Suasana yang ceria dan pelayanan yang ramah menambah kenyamanan pengalaman wisatawan.\"]', '[\"66c5955e84846.jpeg\",\"66c5955e85121.jpg\",\"66c5955e858e5.webp\",\"66c5955e86117.webp\"]', 45000, 3.9, 'Cibatu, Bekasi', '[\"Wisata Keluarga\",\"  Kebersamaan\",\"  Wahana Seluncur\",\"  Kolam Arus\",\"  Kios Makanan dan Minuman\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/iw7MCotSmso?si=MjYD219GzCWqaNNh\",\"https:\\/\\/www.youtube.com\\/embed\\/Tz94Gc6IntA?si=uqPwNGbxDbG40QuV\",\"https:\\/\\/www.youtube.com\\/embed\\/kX5eCacn8vE?si=GHCSKhiH9TDQE7kq\"]', '09:00:00', '17:00:00', 1, 13, '2024-08-21 07:21:02', '2024-08-27 14:09:45'),
(25, 'Trans Studio Bandung', '[\"Trans Studio Bandung adalah taman hiburan indoor dengan wahana seru dan pertunjukan menarik.\",\"Trans Studio Bandung adalah taman hiburan indoor yang terletak di pusat kota Bandung, menawarkan pengalaman seru untuk seluruh keluarga. Dengan luas area lebih dari 4,2 hektar, taman ini menghadirkan berbagai wahana permainan, atraksi, dan pertunjukan dalam ruangan yang mengesankan. Pengunjung dapat menikmati berbagai jenis wahana, mulai dari roller coaster yang memacu adrenalin hingga area permainan anak-anak yang aman dan menyenangkan. Selain wahana permainan, Trans Studio Bandung juga memiliki berbagai tema area yang menakjubkan, termasuk zona yang terinspirasi dari dunia film dan fantasi. Pertunjukan live dan parade yang diadakan secara rutin menambah keunikan pengalaman berwisata. Dengan fasilitas lengkap, termasuk area makan, toko souvenir, dan ruang istirahat, Trans Studio Bandung memastikan kenyamanan pengunjung sepanjang hari. Taman hiburan ini juga menawarkan berbagai event khusus dan promosi yang menarik. Cuaca yang tidak menentu tidak menjadi masalah karena semua wahana dan atraksi berada di dalam ruangan.\"]', '[\"66c5973aef47e.jpg\",\"66c5973aefc45.webp\",\"66c5973af0d38.webp\",\"66c5973af15ba.webp\"]', 190000, 4.2, 'Cibangkong, Bandung', '[\"Wahana Permainan\",\"  Wisata Keluarga\",\"  Dunia Fantasi\",\"  Area Foto\",\"  Panggung Hiburan\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/GHvgJtLH6p8?si=4FP3vPJsJDcx6oge\",\"https:\\/\\/www.youtube.com\\/embed\\/ehvCCbZbPqY?si=J1K_92NCnoYjIHsc\",\"https:\\/\\/www.youtube.com\\/embed\\/8hC7V2BjStw?si=21nlO3d4aWHEGx9j\"]', '10:00:00', '17:00:00', 1, 3, '2024-08-21 07:28:58', '2024-08-28 01:29:13'),
(26, 'Trans Snow World', '[\"Trans Snow World Bekasi adalah arena salju indoor dengan berbagai atraksi bersalju dan permainan dingin di Bekasi.\",\"Trans Snow World Bekasi adalah destinasi wisata salju indoor yang menawarkan pengalaman unik di tengah iklim tropis Indonesia. Terletak di Bekasi, kawasan ini menghadirkan suasana salju yang asli dengan suhu dingin yang membuat pengunjung merasakan sensasi musim dingin. Pengunjung dapat menikmati berbagai atraksi salju, termasuk area bermain salju, seluncuran, dan snow playground yang dirancang khusus untuk segala usia. Dengan luas area lebih dari 2.000 meter persegi, Trans Snow World Bekasi menawarkan pengalaman bermain salju yang menyenangkan dan menyegarkan. Tersedia juga fasilitas seperti penyewaan pakaian hangat, pengatur suhu yang nyaman, dan area istirahat yang membuat kunjungan semakin nyaman. Selain itu, ada berbagai wahana yang menghibur seperti snow slide dan snowball fight, memberikan hiburan tanpa henti untuk keluarga dan teman. Setiap detail dirancang untuk meniru suasana salju yang sesungguhnya, menjadikannya tempat ideal untuk menikmati kegiatan musim dingin di tengah panasnya cuaca Indonesia. Trans Snow World Bekasi juga sering mengadakan event dan promo khusus yang menambah daya tarik bagi pengunjung.\"]', '[\"66c598cf5fb44.webp\",\"66c598cf60a81.webp\",\"66c598cf61a5d.webp\",\"66c598cf621b4.webp\"]', 150000, 4.3, 'Margahayu, Bekasi', '[\"Taman Salju\",\" Sensasi Musim Dingin\",\" Kegembiraan Keluarga\",\" Rasa Sejuk Salju\",\" Restoran di Area Salju\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/XShrKR2GX2E?si=eAqdjz5wrlPDJFaL\",\"https:\\/\\/www.youtube.com\\/embed\\/rIktXn1RIv0?si=KTwJCzqyK7aD4TFM\",\"https:\\/\\/www.youtube.com\\/embed\\/5jxCl84unCs?si=6Ctn_AE-cGa74YTb\"]', '10:00:00', '18:00:00', 1, 13, '2024-08-21 07:35:43', '2024-08-28 01:31:41'),
(27, 'The JungleLand Adventure', '[\"JungleLand Adventure Theme Park adalah taman hiburan outdoor dengan berbagai wahana seru di kawasan Sentul, Bogor.\",\"JungleLand Adventure Theme Park, yang terletak di Sentul, Bogor, adalah taman hiburan outdoor yang menawarkan beragam wahana dan atraksi seru bagi pengunjung dari segala usia. Dengan luas lebih dari 35 hektar, taman ini dibagi menjadi beberapa zona tematik, seperti Mysteria, Carnivalia, dan Tropicalia, yang masing-masing menghadirkan pengalaman bermain yang berbeda. Wahana-wahana adrenalin seperti roller coaster dan Hounted House menjadi favorit bagi para pengunjung yang menyukai tantangan, sementara area bermain anak-anak menyediakan wahana yang aman dan menyenangkan bagi keluarga. Dikelilingi oleh keindahan alam pegunungan Sentul, JungleLand juga menawarkan pemandangan hijau yang menyejukkan, membuat pengunjung dapat menikmati udara segar saat berkeliling. Fasilitas pendukung seperti food court, restoran, dan tempat istirahat tersebar di seluruh area untuk menjamin kenyamanan. Taman ini sering mengadakan acara spesial dan pertunjukan live yang menambah keseruan berkunjung. Dengan berbagai wahana edukatif, JungleLand juga memberikan pengalaman belajar yang menarik, terutama bagi anak-anak.\"]', '[\"66c5b52add688.jpeg\",\"66c5b52addb0a.webp\",\"66c5b52addef2.webp\",\"66c5b52ade221.webp\"]', 140000, 4.1, 'Babakan Madang, Bogor', '[\"Puncak Adrenalin\",\" Sensasi Mendebarkan\",\" Spot Foto Instagramable\",\" Atraksi Dunia Fantasi\",\" Toko Souvenir Unik\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/q5R2x_HDlj0?si=h8Bd4mkNEevD7xxj\",\"https:\\/\\/www.youtube.com\\/embed\\/Ptv4SK0lMB4?si=XLnoT32_mInMoxOU\",\"https:\\/\\/www.youtube.com\\/embed\\/lNtlQoTQuhI?si=G35u7UvhlCgNrnjX\"]', '10:00:00', '17:00:00', 1, 4, '2024-08-21 09:36:42', '2024-08-28 01:34:48'),
(28, 'The Great Asia Africa', '[\"The Great Asia Africa adalah taman tematik dengan replika budaya negara-negara Asia dan Afrika.\",\"The Great Asia Africa, yang terletak di Lembang, Jawa Barat, adalah destinasi wisata yang unik, menggabungkan replika budaya dari negara-negara di Asia dan Afrika dalam satu tempat. Pengunjung dapat menjelajahi berbagai paviliun yang dirancang menyerupai bangunan ikonik dan suasana khas dari negara-negara seperti Jepang, Korea, India, Timur Tengah, hingga negara-negara di Afrika. Setiap paviliun menawarkan pengalaman budaya yang otentik, termasuk kuliner khas, pakaian tradisional, dan kesempatan berfoto dengan latar yang memukau. Destinasi ini sangat cocok untuk wisata edukatif, di mana pengunjung bisa belajar tentang keragaman budaya dari dua benua sekaligus. Dengan suasana alam yang sejuk dan pemandangan pegunungan yang indah, The Great Asia Africa menawarkan pengalaman yang tidak hanya menarik tetapi juga menyegarkan. Selain paviliun budaya, tempat ini juga dilengkapi dengan berbagai fasilitas rekreasi seperti restoran, kafe, dan area bermain. Desain yang menarik dan suasana yang tenang menjadikannya pilihan tepat untuk wisata keluarga. The Great Asia Africa menghadirkan pengalaman wisata budaya dari berbagai negara.\"]', '[\"66c5b6b01983b.webp\",\"66c5b6b019cf9.webp\",\"66c5b6b01a1be.webp\",\"66c5b6b01a5e1.webp\"]', 50000, 4.3, 'Lembang, Bandung', '[\"Wisata Budaya Dunia\",\"  Spot Foto Instagramable\",\"  Tour Edukasi Sejarah\",\"  Petualangan Lintas Budaya\",\"  Miniatur Landmark Asia\",\"  Toko Souvenir Global\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/AZuK9SXAzns?si=6iHrLcHQdjwLZH3B\",\"https:\\/\\/www.youtube.com\\/embed\\/fzz_PP1aAp0?si=x4EvgvSgxzCEeozf\",\"https:\\/\\/www.youtube.com\\/embed\\/CFnbWb1slL8?si=NpqybR8kyN_jSVYS\"]', '09:00:00', '18:00:00', 1, 3, '2024-08-21 09:43:12', '2024-08-28 01:39:36'),
(29, 'Telaga Warna Puncak', '[\"Telaga Warna Puncak menawarkan air yang berubah warna, pemandangan alam indah, dan suasana tenang di Bogor.\",\"Telaga Warna Puncak adalah destinasi alam yang memukau, terletak di kawasan Puncak, Bogor, Jawa Barat. Telaga ini terkenal dengan airnya yang dapat berubah warna, dari hijau, biru, hingga kuning kecokelatan, tergantung pada kondisi cahaya dan kadar alga di dalamnya. Dikelilingi oleh hutan yang rimbun dan pegunungan yang sejuk, Telaga Warna menawarkan suasana tenang yang cocok untuk relaksasi dan menikmati keindahan alam. Pengunjung dapat menikmati pemandangan telaga dari berbagai sudut melalui jalur trekking yang telah disediakan, atau mendayung perahu kecil di atas air yang tenang. Telaga Warna juga memiliki legenda lokal yang menambah daya tariknya, membuat tempat ini tidak hanya menarik secara visual, tetapi juga kaya akan cerita budaya. Fasilitas yang tersedia cukup memadai, termasuk area parkir, warung makan, dan tempat duduk di sekitar telaga. Tempat ini juga menjadi lokasi favorit bagi fotografer dan pecinta alam yang ingin menangkap momen indah di alam terbuka. Dengan suhu yang sejuk dan udara yang segar, Telaga Warna adalah tempat yang sempurna untuk melarikan diri dari hiruk-pikuk kota.\"]', '[\"66c5b8c803548.jpg\",\"66c5b8c803df4.jpg\",\"66c5b8c804346.jpg\",\"66c5b8c80465d.jpg\"]', 30000, 4.1, 'Puncak Gadog, Kabupaten Bogor', '[\"Jelajah Telaga\",\" Piknik Keluarga\",\" Keajaiban Alam\",\" Keindahan Sejuta Warna\",\" Area Piknik\",\" Perahu Sewa\",\" Kios Souvenir\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/CTXbKQlT4Uw?si=6C34-fui9EwFKtdg&#38;amp;start=180\",\"https:\\/\\/www.youtube.com\\/embed\\/Q1V9FO_k-6o?si=N-eA_JDsnuJy_Ye_\",\"https:\\/\\/www.youtube.com\\/embed\\/Tr7P9K1ba8A?si=e2ql44kmQ6yaANxt\"]', '08:00:00', '17:00:00', 5, 4, '2024-08-21 09:52:08', '2024-08-27 14:22:12'),
(30, 'Taman Safari Indonesia', '[\"Taman Safari Indonesia adalah kebun binatang dengan pengalaman safari dan interaksi langsung dengan hewan.\",\"Taman Safari Indonesia, terletak di Cisarua, Bogor, adalah destinasi wisata yang menawarkan pengalaman unik berinteraksi dengan berbagai spesies hewan liar dalam habitat yang mirip dengan alam asli mereka. Dengan area seluas lebih dari 170 hektar, taman ini menyediakan safari drive yang memungkinkan pengunjung melihat hewan-hewan seperti singa, zebra, dan gajah dari dalam mobil. Selain safari drive, pengunjung juga dapat menikmati berbagai atraksi seperti pertunjukan hewan, kebun binatang mini, dan area interaktif di mana mereka bisa memberi makan beberapa hewan. Taman Safari Indonesia berkomitmen pada konservasi dan pendidikan, dengan program pemeliharaan dan perlindungan spesies langka serta upaya edukasi tentang kehidupan satwa liar. Fasilitas yang tersedia meliputi area bermain anak, restoran, dan pusat informasi untuk kenyamanan pengunjung. Taman ini juga menawarkan berbagai akomodasi, termasuk hotel dan glamping, bagi mereka yang ingin merasakan pengalaman safari lebih lama. Program dan event khusus sering diadakan, menambah daya tarik taman ini sepanjang tahun. Destinasi ini menggabungkan hiburan dan edukasi.\"]', '[\"66c5ba8a0c3c5.webp\",\"66c5ba8a0c7fd.webp\",\"66c5ba8a0cb66.webp\",\"66c5ba8a0ce0e.webp\"]', 200000, 4.7, 'Cisarua, Kabupaten Bogor', '[\"Interaksi dengan Satwa\",\"  Jelajah Hutan\",\"  Foto dengan Satwa\",\"  Keajaiban Alam Liar\",\"  Wahana Edukasi Satwa\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/vAgtB737Iz8?si=0VDvT_pFCGiYXftM\",\"https:\\/\\/www.youtube.com\\/embed\\/IVdgMRTk4U0?si=4xlCtjfeVN734j2R\",\"https:\\/\\/www.youtube.com\\/embed\\/G9iGDK8WEwE?si=-LZVgxtfHz4xxC64\"]', '09:00:00', '17:00:00', 1, 4, '2024-08-21 09:59:38', '2024-08-28 01:45:33');
INSERT INTO `destinations` (`id`, `name`, `descriptions`, `images`, `price`, `rating`, `location`, `tags`, `ordered`, `videos`, `open_time`, `close_time`, `category_id`, `city_id`, `created_at`, `updated_at`) VALUES
(31, 'Taman Bunga Nusantara', '[\"Taman Bunga Nusantara adalah taman indah dengan berbagai koleksi bunga dan taman tematik di Cianjur, Jawa Barat.\",\"Taman Bunga Nusantara, terletak di Cipanas, Puncak, Bogor, adalah destinasi wisata yang menampilkan keindahan taman bunga dengan desain yang menawan. Dengan luas sekitar 35 hektar, taman ini menawarkan berbagai jenis taman tematik, seperti taman bunga Eropa, taman Jepang, dan taman labirin yang memukau. Pengunjung dapat menikmati pemandangan bunga yang berwarna-warni sepanjang tahun, serta berbagai jenis tanaman yang dikelompokkan berdasarkan tema dan wilayah asalnya. Taman ini juga memiliki fasilitas edukasi seperti kebun tanaman obat dan taman edukasi anak-anak, yang memberikan pengalaman belajar tentang flora. Selain itu, ada area bermain dan spot foto yang menarik untuk mengabadikan momen bersama keluarga atau teman. Suasana yang tenang dan udara segar di sekitar taman membuatnya ideal untuk bersantai dan menikmati alam. Taman Bunga Nusantara sering mengadakan acara dan festival bunga yang menambah keseruan berkunjung. Fasilitas seperti restoran, kafe, dan toko suvenir memastikan kenyamanan pengunjung selama berada di taman. Taman Bunga Nusantara menampilkan keindahan kebun bunga.\"]', '[\"66c5bcad1dfe0.webp\",\"66c5bcad1e524.webp\",\"66c5bcad1ea36.webp\",\"66c5bcad1ed86.webp\"]', 56000, 4.6, 'Sukaresmi, Cianjur', '[\"Jalan Santai di Kebun\",\" Jelajah Labirin Bunga\",\" Taman Sakura\",\" Area Piknik\",\" Toko Souvenir\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/IbOVLDlGJmk?si=_MOKtIY5H8WFSHd1\",\"https:\\/\\/www.youtube.com\\/embed\\/PUSRell7JdI?si=Mm4bvh4EvcxWiJ00\",\"https:\\/\\/www.youtube.com\\/embed\\/aBnpVAX2GPs?si=mss3Okvh0P0vEOsJ\"]', '09:00:00', '17:00:00', 1, 12, '2024-08-21 10:08:45', '2024-08-28 01:52:46'),
(32, 'Sumber Air Panas Sari Ater', '[\"Sumber Air Panas Sari Ater adalah pemandian alami yang menawarkan relaksasi dan pemandangan indah.\",\"Sumber Air Panas Sari Ater, terletak di Subang, Jawa Barat, adalah destinasi wisata alam yang menawarkan pengalaman relaksasi di pemandian air panas alami. Dikelilingi oleh lanskap pegunungan yang hijau dan udara sejuk, tempat ini menyediakan kolam-kolam air panas dengan berbagai suhu yang bermanfaat untuk kesehatan dan relaksasi. Air panasnya berasal dari mata air gunung berapi yang kaya mineral, dipercaya memiliki khasiat terapeutik bagi tubuh. Selain pemandian air panas, Sari Ater juga menyediakan fasilitas seperti spa, tempat beristirahat, dan area makan yang menyajikan kuliner lokal. Pengunjung dapat menikmati suasana tenang sambil merendam tubuh dalam air hangat yang menyegarkan. Terdapat juga area bermain dan fasilitas untuk keluarga, menjadikannya tempat yang ideal untuk berlibur bersama orang tersayang. Pemandangan alam yang indah dan udara segar menambah kenyamanan dan ketenangan saat berkunjung. Dengan berbagai pilihan paket perawatan dan fasilitas yang memadai, Sumber Air Panas Sari Ater menawarkan pengalaman wisata yang menyenangkan dan menenangkan.\"]', '[\"66c5bed919187.webp\",\"66c5bed919a9f.jpg\",\"66c5bed91a2c4.jpg\",\"66c5bed91a8aa.webp\"]', 65000, 4.3, 'Lembang, Bandung', '[\"Terapi Air Panas\",\"  Pemandian Air Panas\",\"  Kepuasan Terapi\",\"  Sensasi Hangat\",\"  Penginapan Terdekat\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/vBnONE4KxV4?si=ME9-RopUvRDeBUOS\",\"https:\\/\\/www.youtube.com\\/embed\\/xue7jCQ7F88?si=A_tJJSo4oNV8QSGg\",\"https:\\/\\/www.youtube.com\\/embed\\/g81Ut0Oue7c?si=wSdItOkwZf-RJ9IZ\"]', '08:00:00', '22:00:00', 5, 3, '2024-08-21 10:18:01', '2024-08-27 14:23:32'),
(33, 'Sea World Ancol', '[\"Sea World Ancol adalah akuarium raksasa di Jakarta dengan berbagai spesies laut dan pertunjukan hewan menarik.\",\"Sea World Ancol, terletak di kawasan Ancol, Jakarta, adalah akuarium raksasa yang menawarkan pengalaman edukatif dan menghibur tentang kehidupan laut. Destinasi ini menampilkan berbagai spesies ikan, mamalia laut, dan makhluk laut lainnya dalam habitat yang dirancang menyerupai lingkungan aslinya. Pengunjung dapat melihat atraksi utama seperti penguin, hiu, dan ikan pari dalam akuarium besar yang menakjubkan. Selain itu, Sea World Ancol juga memiliki pertunjukan langsung yang menampilkan kemampuan luar biasa dari beberapa hewan laut. Fasilitas interaktif seperti area sentuh dan kolam pakan memungkinkan pengunjung untuk berinteraksi secara langsung dengan beberapa spesies laut. Tempat ini juga menyediakan berbagai informasi edukatif tentang konservasi laut dan pentingnya pelestarian lingkungan. Dengan desain yang memikat dan fasilitas yang lengkap, Sea World Ancol menjadi pilihan ideal untuk wisata keluarga. Suasana yang didominasi oleh nuansa laut dan aktivitas yang beragam memastikan pengalaman yang menyenangkan untuk pengunjung segala usia. Area makan, toko souvenir, dan ruang istirahat tersedia untuk menambah kenyamanan.\"]', '[\"66c5c0794df94.webp\",\"66c5c0794e6db.jpg\",\"66c5c0794eea0.webp\",\"66c5c07950ce3.webp\"]', 98000, 4.4, 'Pademangan, Jakarta Utara', '[\"Pameran Ikan Eksotis\",\" Terowongan Akuarium\",\" Edukasi Laut\",\" Keajaiban Dunia Bawah Laut\",\" Zona Rekreasi Laut\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/6UuJSeQVG_U?si=q0CokEwIaGKKkSVr\",\"https:\\/\\/www.youtube.com\\/embed\\/7lNUyxhDwHg?si=VA-MimGMX6XqHJnm\",\"https:\\/\\/www.youtube.com\\/embed\\/nHnC-e9JT8I?si=jK-0TXHMLbCVODNw\"]', '09:30:00', '16:00:00', 1, 1, '2024-08-21 10:24:57', '2024-08-28 01:49:43'),
(34, 'Kebun Teh Malabar', '[\"Kebun Teh Malabar menawarkan pemandangan hijau, udara segar, dan wisata edukatif di Bandung.\",\"Kebun Teh Malabar, terletak di kawasan Pangalengan, Bandung, adalah destinasi wisata yang mempesona dengan lanskap perkebunan teh yang luas dan hijau. Dikenal karena keindahan alamnya, kebun teh ini menawarkan pemandangan pegunungan yang menyejukkan serta udara segar yang menyegarkan. Pengunjung dapat menikmati tur edukatif tentang proses penanaman dan pemetikan teh, serta bagaimana teh diproses menjadi minuman siap saji. Area ini juga menyediakan jalur trekking ringan yang memungkinkan wisatawan untuk menjelajahi kebun teh sambil menikmati keindahan alam sekitar. Selain itu, terdapat fasilitas seperti caf\\u00e9 yang menyajikan teh segar langsung dari kebun serta area foto yang Instagramable. Kebun Teh Malabar juga sering mengadakan workshop dan kegiatan budaya yang menambah pengalaman wisatawan. Suasana tenang dan suasana alam yang alami menjadikannya tempat ideal untuk bersantai dan beristirahat dari kesibukan kota. Dengan pemandangan yang menakjubkan dan pengalaman yang menyenangkan, Kebun Teh Malabar adalah destinasi yang cocok untuk keluarga, pasangan, dan pecinta alam.\"]', '[\"66c5c398a7697.jpg\",\"66c5c398a7fce.jpg\",\"66c5c398a87dc.jpg\",\"66c5c398a8e2e.jpg\"]', 10000, 3.7, 'Pangalengan, Bandung', '[\"Ketenangan Alam\",\"  Kesejukan Udara\",\"  Taman Teh\",\"  Spot Foto\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/1SALZ1wcKGM?si=1cvoXEeMlAg7j5g9\",\"https:\\/\\/www.youtube.com\\/embed\\/N69kdcXDcS0?si=EFfQwQyH_cD92r6q\",\"https:\\/\\/www.youtube.com\\/embed\\/BtSGT63-MVU?si=U2clEMS1C-593Wdp\"]', '06:00:00', '17:00:00', 3, 3, '2024-08-21 10:38:16', '2024-08-28 01:01:31'),
(35, 'Pantai Anyer', '[\"Pantai Anyer menawarkan pasir putih, air jernih, dan beragam aktivitas rekreasi di pesisir Banten.\",\"Pantai Anyer, yang terletak di Banten, Indonesia, adalah destinasi pantai populer yang menawarkan keindahan pesisir yang menakjubkan dan beragam aktivitas rekreasi. Dengan pasir putihnya yang halus dan air laut yang jernih, pantai ini sangat ideal untuk berenang, bersantai, atau berjemur di bawah sinar matahari. Pemandangan latar belakang gunung berapi dan pulau-pulau kecil menambah keindahan panorama pantai ini. Selain menikmati keindahan alam, pengunjung dapat melakukan berbagai olahraga air seperti snorkeling, jet ski, dan banana boat. Pantai Anyer juga dikenal dengan fasilitas yang lengkap, termasuk hotel, restoran, dan area bermain anak-anak, yang memastikan kenyamanan bagi keluarga dan wisatawan. Suasana di pantai ini biasanya ramai pada akhir pekan dan liburan, membuatnya menjadi tempat yang populer untuk perayaan dan gathering. Pengunjung dapat menikmati matahari terbenam yang menakjubkan dari tepi pantai, memberikan pengalaman yang romantis dan menenangkan. Berbagai aktivitas seperti barbecue dan piknik juga sering dilakukan di sini. Pantai Anyer menawarkan pasir putih, ombak tenang, dan pemandangan matahari terbenam.\"]', '[\"66c5c63e4d2bf.jpg\",\"66c5c63e4daef.jpg\",\"66c5c63e4e252.jpg\",\"66c5c63e4f204.jpg\"]', 20000, 3.5, 'Serang, Banten', '[\"Snorkeling\",\"  Piknik di Pantai\",\"  Ketenangan Pantai\",\"  Keindahan Alam Laut\",\"  Tempat Sunset Terbaik\",\"  Tenda Pantai\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/7H-BAo9WiXQ?si=NnyqtS8p1TlpcK3N\",\"https:\\/\\/www.youtube.com\\/embed\\/OqhG3KxbFp8?si=9tEGqIUIFZe2fPrp\",\"https:\\/\\/www.youtube.com\\/embed\\/moNbxdqO3Ks?si=v7xz4hkcHGyvixok\"]', '09:00:00', '18:00:00', 5, 5, '2024-08-21 10:49:34', '2024-08-28 02:08:08'),
(36, 'Maribaya Natural Area', '[\"Maribaya Natural Area menawarkan pemandian air panas alami, air terjun, dan pemandangan hutan yang asri.\",\"Maribaya Natural Area, terletak di Lembang, Bandung, adalah destinasi wisata alam yang terkenal dengan keindahan alamnya dan sumber air panas alami. Area ini menawarkan pengalaman berendam di kolam air panas yang mengalir dari mata air pegunungan, memberikan efek relaksasi dan penyembuhan. Selain pemandian air panas, Maribaya juga dikenal dengan air terjun yang menakjubkan dan jembatan gantung yang menambah keindahan lanskap sekitar. Pengunjung dapat menikmati trekking ringan melalui hutan yang sejuk dan udara segar di sekitar area. Fasilitas yang tersedia termasuk area piknik, restoran, dan tempat duduk di sekitar kolam untuk menikmati pemandangan. Maribaya Natural Area juga menyediakan berbagai aktivitas seperti berendam di kolam-kolam dengan berbagai suhu dan spa alami. Suasana tenang dan keindahan alam yang menakjubkan menjadikannya tempat ideal untuk relaksasi dan pelarian dari rutinitas sehari-hari. Keberadaan taman-taman tematik dan spot foto yang menarik menambah daya tarik destinasi ini. Pengunjung juga dapat menikmati kuliner lokal yang disajikan di sekitar area.\"]', '[\"66c5cec755d7f.jpg\",\"66c5cec757680.jpg\",\"66c5cec757ebc.jpg\",\"66c5cec7586fc.jpg\"]', 35000, 3.5, 'Lembang, Bandung', '[\"Relaksasi\",\"   Kesejukan dan Kesehatan\",\"  Aktivitas Outbound\",\"   Taman Relaksasi\",\"   Area Piknik\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/zavr1wp9YJE?si=i2hRxAdoJ--HGurk&#38;amp;start=208\",\"https:\\/\\/www.youtube.com\\/embed\\/wAr-shJkTps?si=ydTtD6NGqI0t9YOu\",\"https:\\/\\/www.youtube.com\\/embed\\/54_GTyuQcLU?si=ez90OyDXDsFe4yBt\"]', '09:00:00', '18:00:00', 3, 3, '2024-08-21 11:25:59', '2024-08-28 01:02:39'),
(37, 'Kolam Renang Swiss-Belresort', '[\"Kolam Renang Swiss-Belresort Dago menawarkan suasana mewah dengan pemandangan indah dan fasilitas lengkap.\",\"Kolam Renang Swiss-Belresort, yang terletak di Swiss-Belresort Serpong, merupakan destinasi ideal untuk relaksasi dan kesenangan di tengah kenyamanan hotel mewah. Kolam renang ini menawarkan desain modern dengan air jernih yang dikelilingi oleh pemandangan tropis yang menyejukkan. Dengan area kolam yang luas, pengunjung dapat berenang, bersantai di tepi kolam, atau menikmati fasilitas sun deck yang nyaman. Kolam renang ini juga dilengkapi dengan bar kolam renang yang menyediakan berbagai minuman dan makanan ringan untuk menemani waktu bersantai. Fasilitasnya mencakup area anak-anak yang aman dan menyenangkan, serta jacuzzi untuk relaksasi lebih dalam. Suasana yang tenang dan lingkungan yang bersih menjadikan kolam renang ini tempat yang sempurna untuk bersantai setelah hari yang sibuk. Selain itu, pengunjung dapat menikmati pemandangan taman yang rimbun dan desain arsitektur yang elegan. Kolam renang Swiss-Belresort juga sering digunakan untuk acara-acara khusus dan perayaan. Dengan pelayanan yang ramah dan fasilitas berkualitas tinggi, destinasi ini menawarkan pengalaman berlibur yang menyenangkan.\"]', '[\"66c5d19408364.webp\",\"66c5d19408ced.webp\",\"66c5d194093fb.webp\",\"66c5d19409c53.webp\"]', 100000, 4.3, 'Dago, Bandung', '[\"Rasa Nyaman\",\"  Kolam Renang Anak\",\"  Fasilitas Kesehatan dan Kebugaran\",\"  Bar Kolam Renang\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/h607YrGURjQ?si=V-8LlwkBVcxW5oaX\",\"https:\\/\\/www.youtube.com\\/embed\\/_yjLXaftajk?si=hK_C_F58Lf-EBDzI\",\"https:\\/\\/www.youtube.com\\/embed\\/eKfSZfGAiiQ?si=vPcYiApj3IEF5xne\"]', '06:00:00', '20:00:00', 1, 3, '2024-08-21 11:37:56', '2024-08-28 10:50:08'),
(38, 'Gunung Galunggung', '[\"Gunung Galunggung adalah gunung berapi aktif dengan kawah menakjubkan dan pemandian air panas.\",\"Gunung Galunggung, terletak di Tasikmalaya, Jawa Barat, adalah gunung berapi aktif yang menawarkan keindahan alam yang menakjubkan. Dengan ketinggian sekitar 2.167 meter, gunung ini terkenal dengan kawahnya yang luas dan danau kawah yang mempesona di puncaknya. Setelah erupsi besar pada tahun 1982-1983, kawah gunung ini menjadi salah satu daya tarik utama bagi para pendaki dan pecinta alam. Trekking menuju puncak Galunggung memberikan pengalaman yang menantang, dengan pemandangan spektakuler dari hutan tropis, perkebunan, dan desa-desa sekitarnya. Di sekitar kawah, terdapat juga kolam renang alami yang terbentuk dari air hujan, memberikan kesempatan untuk bersantai setelah mendaki. Gunung Galunggung juga memiliki situs sejarah yang menarik, termasuk reruntuhan bekas pemukiman yang terkena dampak erupsi. Cuaca di area gunung ini bisa bervariasi, dengan suhu yang sejuk di puncak, jadi persiapan yang matang diperlukan. Tempat ini sering dikunjungi oleh para peneliti dan pengamat vulkanologi, serta wisatawan yang ingin menjelajahi keajaiban alam.\"]', '[\"66c5d36cc582e.jpg\",\"66c5d36cc631c.jpg\",\"66c5d36cc6be5.jpg\",\"66c5d36cc72a3.jpg\"]', 125000, 4.1, 'Leuwisari, Tasikmalaya', '[\"Pendakian\",\"   Area Camping\",\"   Eksplorasi\",\"   Petualangan\",\"  Kawah Lava\",\"  Trekking Gunung\"]', 1, '[\"https:\\/\\/www.youtube.com\\/embed\\/Kis1SRphu10?si=Vn0YXXxm63algLFm\",\"https:\\/\\/www.youtube.com\\/embed\\/SfhWoM4YwiU?si=YTrQwCFPkPq-oVGi\",\"https:\\/\\/www.youtube.com\\/embed\\/lTWcs_nR-c0?si=CDtYbv3zm3b0CkRc\"]', '07:00:00', '21:00:00', 4, 11, '2024-08-21 11:45:48', '2024-08-28 04:19:10'),
(39, 'Gua Lalay', '[\"Gua Lalay adalah gua alami di Bogor dengan stalaktit, stalakmit, dan koloni kelelawar.\",\"Gua Lalay Klapanunggal, terletak di Klapanunggal, Bogor, adalah destinasi wisata alam yang menarik dengan keunikan utama berupa koloni kelelawar yang besar. Gua ini memiliki struktur stalaktit dan stalagmit yang menambah keindahan interior gua, memberikan suasana yang misterius dan menakjubkan. Para pengunjung dapat menjelajahi lorong-lorong gua yang gelap sambil menyaksikan ribuan kelelawar terbang keluar saat malam tiba. Selain itu, gua ini dikelilingi oleh vegetasi hijau yang menambah kesegaran dan keindahan alam sekitar. Akses menuju gua ini cukup mudah, dengan jalur trekking yang memudahkan pengunjung untuk sampai ke lokasi. Pengalaman berkunjung ke Gua Lalay Klapanunggal tidak hanya menawarkan keindahan geologi, tetapi juga kesempatan untuk belajar tentang ekosistem gua dan kehidupan kelelawar. Fasilitas dasar seperti area parkir dan warung makanan tersedia di sekitar area gua untuk kenyamanan pengunjung. Suasana tenang dan udara sejuk membuatnya menjadi tempat yang ideal untuk melarikan diri dari hiruk-pikuk kota.\"]', '[\"66c5ee6d9efe3.jpg\",\"66c5ee6da044d.jpg\",\"66c5ee6da0f72.jpg\",\"66c5ee6da167e.webp\"]', 18000, 3.4, 'Klapanunggal, Bogor', '[\"Jelajah Alam Bawah Tanah\",\"  Eksplorasi Gua\",\"  Pengalaman Unik\",\"  Gua Alami\",\"  Area Foto\"]', 0, '[\"https:\\/\\/www.youtube.com\\/embed\\/KQUoK9XEcDw?si=ev9gXZboSYzXAYAC\",\"https:\\/\\/www.youtube.com\\/embed\\/TFG3l7RD_DU?si=t5dXW2wMSjzzra5O\",\"https:\\/\\/www.youtube.com\\/embed\\/vxoeJt2cYqQ?si=oJsyoBy1M6xInQBm\"]', '08:00:00', '17:00:00', 6, 4, '2024-08-21 13:41:01', '2024-08-28 01:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `destination_id` int NOT NULL,
  `duration` int NOT NULL,
  `total_people` int NOT NULL,
  `hotel` tinyint(1) DEFAULT '0',
  `transportation` tinyint(1) DEFAULT '0',
  `food` tinyint(1) DEFAULT '0',
  `package_price` double NOT NULL,
  `total_price` double NOT NULL,
  `status` enum('processing','completed','cancelled') NOT NULL DEFAULT 'processing',
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `destination_id`, `duration`, `total_people`, `hotel`, `transportation`, `food`, `package_price`, `total_price`, `status`, `order_date`) VALUES
(18, 11, 38, 2, 5, 1, 1, 1, 2700000, 6025000, 'processing', '2024-08-28'),
(21, 11, 10, 5, 1, 1, 1, 1, 2700000, 13580000, 'processing', '2024-08-28'),
(23, 11, 5, 5, 5, 1, 1, 0, 2200000, 11160000, 'cancelled', '2024-08-28'),
(24, 12, 16, 4, 5, 1, 1, 1, 2700000, 10925000, 'cancelled', '2024-08-28');

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `after_order_delete` AFTER DELETE ON `orders` FOR EACH ROW BEGIN
    UPDATE destinations
    SET ordered = ordered - 1
    WHERE id = OLD.destination_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_order_update` AFTER UPDATE ON `orders` FOR EACH ROW BEGIN
    -- Kurangi ordered untuk produk lama
    IF OLD.destination_id IS NOT NULL THEN
        UPDATE destinations
        SET ordered = ordered - 1
        WHERE id = OLD.destination_id;
    END IF;

    -- Tambah ordered untuk produk baru
    IF NEW.destination_id IS NOT NULL THEN
        UPDATE destinations
        SET ordered = ordered + 1
        WHERE id = NEW.destination_id;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_ordered_count` AFTER INSERT ON `orders` FOR EACH ROW BEGIN
    UPDATE destinations
    SET ordered = ordered + 1
    WHERE id = NEW.destination_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `destination_id` int NOT NULL,
  `rating` float NOT NULL,
  `comment` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `user_id`, `destination_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(3, 12, 18, 3.3, 'Paket liburan yang saya pesan melalui Blue Travel sangat memuaskan, pelayanan yang ramah dan destinasi wisata yang menakjubkan membuat pengalaman liburan saya menjadi sempurna.', '2024-08-28 14:22:05', '2024-08-28 14:22:05'),
(5, 11, 30, 3.7, 'Saya sangat merekomendasikan Blue Travel untuk teman-teman yang ingin liburan tanpa ribet, mereka benar-benar ahli dalam menyediakan pengalaman wisata yang berkesan.', '2024-08-28 14:27:13', '2024-08-28 14:27:13'),
(6, 13, 25, 4.5, 'Blue Travel memberikan saya kemudahan dalam merencanakan liburan, dari pemesanan hingga pelaksanaan perjalanan semuanya berjalan dengan lancar dan tanpa hambatan.', '2024-08-28 14:28:48', '2024-08-28 14:28:48'),
(7, 16, 35, 3.4, 'Pelayanan berkualitas dan pemandu wisata yang informatif dari Blue Travel membuat liburan saya menjadi lebih berarti dan berkesan, saya pasti akan kembali menggunakan jasa mereka.', '2024-08-29 09:18:13', '2024-08-29 09:19:22'),
(8, 17, 35, 4, 'Pengalaman eksplorasi bersama Blue Travel membuat saya semakin jatuh cinta dengan keindahan alam Jawa Barat, terima kasih untuk perjalanan yang tak terlupakan!', '2024-08-29 09:24:38', '2024-08-29 09:24:38'),
(9, 18, 14, 3.5, 'Sudah beberapa kali saya menggunakan jasa Blue Travel dan tak pernah kecewa, selalu memberikan pengalaman liburan yang istimewa dan tiada duanya.', '2024-08-30 06:52:02', '2024-08-30 06:52:02'),
(10, 19, 37, 3.8, 'Pengalaman liburan bersama Blue Travel benar-benar mengagumkan, pelayanan mereka luar biasa dan semua kebutuhan perjalanan saya terpenuhi dengan baik.', '2024-08-30 07:12:53', '2024-08-30 07:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(45) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profile_image` varchar(45) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `phone`, `email`, `profile_image`, `password`, `role`, `created_at`, `updated_at`) VALUES
(11, 'andika', 'Andika Pratama', '081272761376', 'andikaprtm3@gmail.com', '66cff2d23c6ec.jpg', '$2y$10$7gSyUL2B/MkdV08P/z7i4eoFQFxHF16nmVlSJmHcfU46AxsmAfTQS', 'user', '2024-08-20 04:25:07', '2024-08-29 12:34:08'),
(12, 'rudii', 'Rudi Sutanto', '081261273561', 'rudisutan8@gmail.com', '66cff3462c478.jpg', '$2y$10$VxezbSh2ZuVCKcAJSU8rFu9eT71JQ9y4kIMS7B9gcvmrOhJYXij/K', 'user', '2024-08-28 14:04:58', '2024-08-29 12:33:08'),
(13, 'rezaa', 'Reza Achmad', '081267367238', 'rezaac5@gmail.com', '66cff30941407.jpg', '$2y$10$RGnCsPt7S9qEcIILuK/R1u4evzGBPFsEB7MjUu6y/QgL8PKGi44im', 'user', '2024-08-28 14:25:26', '2024-08-30 06:50:49'),
(16, 'budii', 'Budi Santoso', '081256536235', 'budisanto12@gmail.com', '66d0371709a71.jpg', '$2y$10$b5R7lCHPvtc1H8BR0ihf1uLojQIDHAEA8HZ4494pkLzzXJUmWp7sa', 'user', '2024-08-29 03:31:49', '2024-08-29 12:30:42'),
(17, 'yudaa', 'Yuda Wijaya', '081263256237', 'yudawija7@gmail.com', '66d03df0f311c.jpg', '$2y$10$FJZVPdYIZgJ8edl8fN5HteRskdbXPpHVFM7ZSRMQAzhRfCr9GOLn6', 'user', '2024-08-29 09:22:57', '2024-08-29 12:34:56'),
(18, 'fadli', 'Fadli Maulana', '081263253723', 'fadlim6@gmail.com', '66d03f3931a14.jpg', '$2y$10$vSYu1fZkQW.jUWbaOXICp.37pIOU767LzcH/IDfue.j0F6QfAFviK', 'user', '2024-08-29 09:26:55', '2024-08-29 12:31:46'),
(19, 'diann', 'Dian Purnama', '081263263273', 'dianpurn92@gmail.com', '66d170200ab83.jpg', '$2y$10$S/lgf0WTGZVjKmaJmZvhq.LLeuqUpe6npjARmdh5nsRHRn4GSkNHS', 'user', '2024-08-30 06:55:41', '2024-08-30 07:09:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `destinations_ibfk_1` (`category_id`),
  ADD KEY `destinations_ibfk_2` (`city_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ibfk_1` (`user_id`),
  ADD KEY `orders_ibfk_2` (`destination_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonials_ibfk_1` (`user_id`),
  ADD KEY `testimonials_ibfk_2` (`destination_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `destinations`
--
ALTER TABLE `destinations`
  ADD CONSTRAINT `destinations_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `destinations_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `testimonials_ibfk_2` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
