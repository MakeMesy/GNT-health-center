-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2025 at 08:25 AM
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
-- Database: `gnt`
--

-- --------------------------------------------------------

--
-- Table structure for table `adsbanner`
--

CREATE TABLE `adsbanner` (
  `id` int(11) NOT NULL,
  `ad_name` varchar(255) NOT NULL,
  `ad_banner` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `adsbanner`
--

INSERT INTO `adsbanner` (`id`, `ad_name`, `ad_banner`, `description`, `created_at`) VALUES
(17, 'WEIGHT LOSS', '678f82f0050cb_WhatsApp Image 2025-01-10 at 20.15.57_fb256c52.jpg', '[\"free consultation\",\"BMI Checking\",\"Diet planning\",\"diet planning\",\"BMI checking\"]', '2025-01-21 11:20:16'),
(18, 'WEIGHT LOSS', '678f89bee5916_WhatsApp Image 2025-01-10 at 20.15.57_fb256c52.jpg', '[\"free consultation  \",\"BMI Checking \",\"Diet planning \",\"diet planning\",\"Cupping\"]', '2025-01-21 11:49:18'),
(19, 'Weight Loss', '678f8da61bfd8_WhatsApp Image 2025-01-10 at 20.15.57_fb256c52.jpg', '[\"free consultation\",\"BMI Checking\",\"Diet planning\"]', '2025-01-21 12:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `service_category` varchar(1000) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `full_name`, `email_address`, `phone_number`, `service_category`, `message`, `created_at`) VALUES
(1, 'Mark', 'mark', '9210', 'bridal', '\r\n            MARK', '2025-01-19 12:21:40'),
(2, 'Mark', 'mark', '9210', 'bridal', '\r\n            MARK', '2025-01-19 12:21:47'),
(3, 'Mark', 'mark', '9210', 'bridal', '\r\n            mark', '2025-01-19 12:24:55'),
(4, 'Mark', 'mar@gmail.ocm', 'naveen', 'bridal', '\r\n            mark', '2025-01-20 00:14:09'),
(5, 'mark', 'mark@gmail.com', 'new', 'hair-care', '\r\n            markk', '2025-01-20 00:14:37'),
(6, 'B.Naveen Bharathi', 'naveenbharathi5050@gmail.com', '6369800627', 'weight-loss', 'Database Connection: The code connects to the database using mysqli.\r\nSQL Query: The SQL query selects all the necessary fields from the appointments table.\r\nResult Handling: The result of the query is checked. If the query returns rows, we loop through each row and display the appointment details in an HTML table.\r\nTable Structure: Each row will contain the appointment details such as the patient\'s name, doctor\'s name, date, time, and status.\r\n            ', '2025-01-20 16:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `treatments`
--

CREATE TABLE `treatments` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `url_name` varchar(1000) NOT NULL,
  `slogan` text DEFAULT NULL,
  `about` text DEFAULT NULL,
  `benefits` text DEFAULT NULL,
  `therapies` text DEFAULT NULL,
  `images` text DEFAULT NULL,
  `thumbnail` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `herosection` varchar(1000) DEFAULT NULL,
  `herosection_title` varchar(1000) DEFAULT NULL,
  `herosection_des` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `treatments`
--

INSERT INTO `treatments` (`id`, `name`, `url_name`, `slogan`, `about`, `benefits`, `therapies`, `images`, `thumbnail`, `created_at`, `herosection`, `herosection_title`, `herosection_des`) VALUES
(1, 'Bridal Care', 'bridal-care', 'Radiate beauty on your special day with our complete bridal care treatments.', 'Bridal Care is a holistic beauty treatment designed to pamper brides before their big day. It includes skin care, hair care, and relaxation therapies to ensure that every bride feels rejuvenated, glowing, and confident as she walks down the aisle.', '[\"Glowing skin for a radiant bridal look\", \"Deep relaxation and stress relief before the wedding\", \"Revitalization of hair for smooth and shiny locks\", \"Detoxification and body rejuvenation treatments\", \"Customized skincare to address individual skin concerns\", \"Improved overall well-being, ensuring a calm and confident bride\"]', '{\n    \"therapies\": [\n        {\n            \"name\": \"Yoga\",\n            \"image\": \"yoga.png\"\n        },\n        {\n            \"name\": \"Enema\",\n            \"image\": \"enema.png\"\n        },\n        {\n            \"name\": \"Mud Therapy\",\n            \"image\": \"mudtherapy.png\"\n        },\n        {\n            \"name\": \"Sweda massage\",\n            \"image\": \"swedamassage.png\"\n        },\n        {\n            \"name\": \"Herbal Facial\",\n            \"image\": \"herbalfacial.png\"\n        }\n    ]\n}', 'bridal-care-benefit.png', 'bridalcare-thumnail.png', '2025-01-20 17:28:47', 'bridalcare.png', 'Transform Your Bridal Glow', 'Experience personalized care for a radiant, confident walk down the aisle'),
(2, 'Weight Loss', 'weight-loss', 'Achieve a healthier you with our holistic weight loss therapies.', 'Weight loss treatments aim to improve physical health, enhance metabolism, and promote overall well-being. These therapies focus on sustainable methods to help individuals achieve their weight goals while addressing both physical and mental aspects of health.', '[\"Boosts metabolism and promotes fat burning for effective weight management\", \"Improves digestion and detoxifies the body for enhanced overall health\", \"Increases physical fitness and energy levels to support an active lifestyle\", \"Promotes relaxation and reduces stress, aiding emotional well-being\", \"Addresses underlying health conditions contributing to weight gain\", \"Encourages a balanced and sustainable lifestyle for long-term benefits\"]', '{\n      \"therapies\": [\n        {\"name\": \"Yoga\", \"image\": \"yoga.png\"},\n        {\"name\": \"Meditation\", \"image\": \"Meditation.png\"},\n        {\"name\": \"Nasiyam (Nasal Therapy)\", \"image\": \"nasaltherapy.png\"},\n        {\"name\": \"Acupressure\", \"image\": \"acupressure.png\"},\n        {\"name\": \"Acupuncture\", \"image\": \"acupuncture.png\"},\n        {\"name\": \"Varma Therapy\", \"image\": \"varma_therapy.png\"},\n        {\"name\": \"Hijama (Cupping Therapy)\", \"image\": \"hijama.png\"},\n        {\"name\": \"Dorn Therapy\", \"image\": \"dorn_therapy.png\"},\n        {\"name\": \"Hydrotherapy\", \"image\": \"hydrotherapy.jpg\"},\n        {\"name\": \"Sand Bath\", \"image\": \"sand_bath.png\"}\n      ]\n    }', 'weight-loss.png', 'weight-loss-thumnail.png', '2025-01-21 12:54:25', 'weight-loss.png', 'Healthy Weight Transformation', 'Achieve your goals with treatments that boost health, enhance metabolism, and support well-being.'),
(3, 'Skin Care', 'skin-care', 'Rejuvenate and radiate with our personalized skin care therapies.', 'Skin care treatments are designed to enhance natural beauty, rejuvenate the skin, and address specific concerns like acne, aging, or dullness. These therapies use holistic and natural techniques to promote healthy and glowing skin.', '[\"Cleanses and detoxifies the skin for a natural glow\", \"Improves hydration and elasticity, reducing signs of aging\", \"Treats specific concerns like acne, pigmentation, and dullness\", \"Enhances relaxation and reduces stress for healthier skin\", \"Promotes blood circulation and stimulates collagen production\", \"Nourishes the skin with herbal and natural ingredients\"]', '{\n      \"therapies\": [\n        {\"name\": \"Hijama\", \"image\": \"hijama.png\"},\n        {\"name\": \"Acupuncture\", \"image\": \"acupuncture.png\"},\n        {\"name\": \"Acupressure\", \"image\": \"acupressure.png\"},\n        {\"name\": \"Flower Medicine\", \"image\": \"flower_medicine.png\"},\n        {\"name\": \"Ayurveda Facial\", \"image\": \"ayurveda_facial.png\"},\n        {\"name\": \"Herbal Facial\", \"image\": \"herbalfacial.png\"},\n        {\"name\": \"Cupping Facial\", \"image\": \"cupping_facial.png\"},\n        {\"name\": \"Hydro Facial\", \"image\": \"hydro_facial.png\"},\n        {\"name\": \"Aroma Therapy\", \"image\": \"aroma_therapy.png\"}\n      ]\n    }', 'skin-care.png', 'skin-care-thumnail.png', '2025-01-21 12:57:04', 'skin-care.png', 'Radiant Skin Awaits\n\n', 'Nourish and rejuvenate your skin with care tailored just for you.'),
(4, 'Hair Care', 'hair-care', 'Restore and revitalize your hair with our holistic therapies.', 'Hair care treatments focus on strengthening hair follicles, promoting hair growth, and addressing issues like hair fall, dandruff, and dryness. These therapies use natural methods and rejuvenating techniques to ensure healthy and lustrous hair.', '[\"Strengthens hair from the roots, reducing hair fall\", \"Promotes hair growth for thicker and healthier locks\", \"Nourishes the scalp and combats dryness and dandruff\", \"Restores shine and smoothness for a polished look\", \"Improves blood circulation to the scalp, enhancing hair health\", \"Reduces stress, promoting a healthy scalp environment\"]', '{\n      \"therapies\": [\n        {\"name\": \"Diet\", \"image\": \"diet.png\"},\n        {\"name\": \"Hijama (Cupping Therapy)\", \"image\": \"hijama.png\"},\n        {\"name\": \"Acupressure\", \"image\": \"acupressure.png\"},\n        {\"name\": \"Acupuncture\", \"image\": \"acupuncture.png\"},\n        {\"name\": \"Micro-needling\", \"image\": \"micro_needling.png\"},\n        {\"name\": \"Massage\", \"image\": \"hairmassage.png\"},\n        {\"name\": \"Ayurveda Hair Spa\", \"image\": \"ayurveda_hair_spa.png\"}\n      ]\n    }', 'hair-care.png', 'hair-care-thumnail.png', '2025-01-21 12:59:46', 'Hair-Care.png', 'Nourish Your Hair, Transform Your Look', 'Strengthen follicles, promote growth, and combat hair issues with rejuvenating treatments for healthy, lustrous hair.'),
(6, 'Spine Care', 'spine-care', 'Strengthen and support your spine for a pain-free life.', 'Spine care treatments aim to alleviate pain, improve posture, and enhance spinal health. These therapies combine gentle adjustments and relaxation techniques to relieve tension and promote alignment.', '[\"Relieves back pain and improves mobility\", \"Supports proper spinal alignment\", \"Enhances posture and reduces tension\", \"Promotes blood flow and flexibility\", \"Non-invasive therapies for long-term relief\", \"Improves overall well-being and spinal health\"]', '{\n      \"therapies\": [\n        {\"name\": \"Dorn Therapy\", \"image\": \"dorn_therapy.png\"},\n        {\"name\": \"Acupressure\", \"image\": \"acupressure.png\"},\n        {\"name\": \"Acupuncture\", \"image\": \"acupuncture.png\"},\n        {\"name\": \"Cupping Therapy\", \"image\": \"cupping_therapy.png\"},\n        {\"name\": \"Paadha Guasa (Foot Guasa)\", \"image\": \"paadha_guasa.png\"},\n        {\"name\": \"Massage\", \"image\": \"massage.png\"}\n      ]\n    }', 'Spine-Care.png', 'Spine-Care.png', '2025-01-21 13:13:35', 'Spine-Care.png', 'Comprehensive Spine Care for a Healthier Back', 'Alleviate pain and improve posture with gentle spine care treatments');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adsbanner`
--
ALTER TABLE `adsbanner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatments`
--
ALTER TABLE `treatments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adsbanner`
--
ALTER TABLE `adsbanner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `treatments`
--
ALTER TABLE `treatments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
