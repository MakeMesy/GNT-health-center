-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2025 at 04:13 AM
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
-- Table structure for table `courses_list`
--

CREATE TABLE `courses_list` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `url_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `requirements` text DEFAULT NULL,
  `coverage` text DEFAULT NULL,
  `instructors_name` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `google_map_link` varchar(255) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `terms_and_conditions` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `images` text DEFAULT NULL,
  `mode` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `courses_list`
--

INSERT INTO `courses_list` (`id`, `course_name`, `url_name`, `description`, `price`, `image`, `requirements`, `coverage`, `instructors_name`, `street`, `district`, `landmark`, `google_map_link`, `duration`, `terms_and_conditions`, `email`, `phone`, `images`, `mode`) VALUES
(8, 'Flower Healing Course', 'batch-flower-healing', 'A comprehensive course on Batch Flower medicine for emotional and physical well-being.A comprehensive course on Batch Flower medicine for emotional and physical well-being.', 299.99, '1739847671_67b3f7f719940_Pain Relief.jpg', '[\"Basic knowledge of natural healing.\",\"Basic knowledge of natural healing.\",\"Basic knowledge of natural healing.\",\"Basic knowledge of natural healing.\"]', '[\"Basic knowledge of natural healing.\",\"Basic knowledge of natural healing.\",\"Basic knowledge of natural healing.\",\"Basic knowledge of natural healing.\"]', 'Healing Academy', '123 Wellness Street', 'Theni', 'theni', 'https://goo.gl/maps/example', '4 Weeks', 'No refunds after enrollment. Certification upon co...', 'info@example.com', '+1234567890', '[\"67b3f7f719c48_\\u0b86\\u0bb1\\u0bcd\\u0bb1\\u0bb2\\u0bcd_\\u0b86\\u0bb1\\u0bcd\\u0bb1\\u0bc1\\u0baa\\u0bcd\\u0baa\\u0b9f\\u0bc1\\u0ba4\\u0bcd\\u0ba4\\u0bc1\\u0ba4\\u0bb2\\u0bcd_\\u0bae\\u0bc8\\u0baf\\u0bae\\u0bcd.png\",\"67b3f7f719da5_Pain Relief.jpg\",\"67b3f7f719f82_Red And Black Bold Business Webinar Instagram Post.png\"]', 'offline');

-- --------------------------------------------------------

--
-- Table structure for table `featured_courses`
--

CREATE TABLE `featured_courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `featured_courses`
--

INSERT INTO `featured_courses` (`id`, `name`, `description`, `link`, `price`, `image`) VALUES
(1, 'Batch Flower Medicin', 'Learn the fundamentals  Batch Flower Medicine and its healing benefits.', 'https://example.com/course-', 199.00, '67b31c08d7766_4765650_7ec9_6.webp'),
(2, 'Advanced Batch Flower Techniques', 'Master advanced Batch Flower techniques for emotional well-being.', 'https://example.com/course-2', 299.99, 'flower.jpeg'),
(3, 'Healing with Batch Flower Remedies', 'Comprehensive course covering all aspects of using Batch Flower remedies for healing.', 'https://example.com/course-3', 249.99, 'flower.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `maingallery`
--

CREATE TABLE `maingallery` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `maingallery`
--

INSERT INTO `maingallery` (`id`, `image`) VALUES
(1, 'img2.jpg'),
(2, 'img3.jpg'),
(3, 'img6.jpg'),
(4, 'flower.webp'),
(5, 'accu.webp');

-- --------------------------------------------------------

--
-- Table structure for table `main_treatments`
--

CREATE TABLE `main_treatments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `main_treatments`
--

INSERT INTO `main_treatments` (`id`, `name`, `description`, `price`, `image_icon`) VALUES
(1, 'Pain Relief', 'Natural remedies to alleviate pain and improve mobility.', 1.00, '67b1c6cc1f520_Pain Relief.jpg'),
(2, 'Insomnia', 'Holistic therapies for restful sleep and stress reduction.', 0.00, 'Insomnia.jpg'),
(3, 'Spine Care', 'Treatments to support a healthy, pain-free spine.', 1.00, 'spinecare.jpg'),
(4, 'Flower Medicine', 'Healing using natural extracts for emotional and physical balance.', 0.00, 'Flower Medicine.webp'),
(5, 'Yoga', 'Practices for enhanced flexibility, mindfulness, and overall wellness.', 0.00, 'Yoga.webp'),
(6, 'Flower Medicine', 'Healing using natural extracts for emotional and physical balance.', 0.00, 'Flower Medicine.webp');

-- --------------------------------------------------------

--
-- Table structure for table `marquee`
--

CREATE TABLE `marquee` (
  `id` int(11) NOT NULL,
  `marquee_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `marquee`
--

INSERT INTO `marquee` (`id`, `marquee_text`) VALUES
(1, 'We focus on holistic healing through therapies like Ayurveda, yoga, and chiropractic care, blending traditional practices with modern techniques for complete wellness.');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(11) NOT NULL,
  `platform_name` varchar(50) NOT NULL,
  `profile_link` varchar(255) NOT NULL,
  `followers` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `platform_name`, `profile_link`, `followers`, `created_at`, `icon`) VALUES
(1, 'Facebook', 'https://www.facebook.com/yourpage', 50000, '2025-02-04 13:37:11', '<i class=\"fa-brands fa-facebook\"></i>'),
(2, 'YouTube', 'https://www.youtube.com/yourchannel', 100000, '2025-02-04 13:37:11', '<i class=\"fa-brands fa-youtube\"></i>'),
(3, 'Instagram', 'https://www.instagram.com/gnthealthcare', 75000, '2025-02-04 13:37:11', '<i class=\"fa-brands fa-instagram\"></i>'),
(4, 'WhatsApp', 'https://wa.me/yourphonenumber', 20000, '2025-02-04 13:37:11', '<i class=\"fa fa-whatsapp\" aria-hidden=\"true\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `name`, `designation`, `education`, `description`, `image`) VALUES
(1, 'Dr. Sarah Johnso', 'Lead Wellness Exper', '    Ph.D. in Holistic Medicin', 'Passionate about holistic haling and natural therapies, with over 10 years of experience in wellness coaching.', '67b1e6c1259d5_Pain Relief.jpg'),
(2, 'Dr. Sarah Johnson', 'Lead Wellness Expert', 'Ph.D. in Holistic Medicine', 'Passionate about holistic healing and natural therapies, with over 10 years of experience in wellness coaching.', 'face.png');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `feedback` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `user_image`, `feedback`, `created_at`) VALUES
(1, 'Mark', '67a1f5318b5a8_my.webp', 'Its My \r\n', '2025-02-04 11:08:58'),
(2, 'Mark', '67a1f5318b5a8_my.webp', 'Its My \r\n', '2025-02-04 11:08:58'),
(3, 'Mark', '67a1f5318b5a8_my.webp', 'Its My \r\n', '2025-02-04 11:08:58'),
(4, 'Mark', '67a1f5318b5a8_my.webp', 'Its My \r\n', '2025-02-04 11:08:58'),
(6, 'Mark', '67a1f5318b5a8_my.webp', 'Its My \r\n', '2025-02-04 11:08:58'),
(7, 'Mark', '67a1f5318b5a8_my.webp', 'Its My \r\n', '2025-02-04 11:08:58');

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
  `herosection_des` text DEFAULT NULL,
  `about_video` text DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `video_title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `treatments`
--

INSERT INTO `treatments` (`id`, `name`, `url_name`, `slogan`, `about`, `benefits`, `therapies`, `images`, `thumbnail`, `created_at`, `herosection`, `herosection_title`, `herosection_des`, `about_video`, `video_link`, `video_title`) VALUES
(1, 'Bridal Care', 'bridal-care', 'Radiate beauty on your special day with our complete bridal care treatments.', 'Bridal Care is a holistic beauty treatment designed to pamper brides before their big day. It includes skin care, hair care, and relaxation therapies to ensure that every bride feels rejuvenated, glowing, and confident as she walks down the aisle.', '[\"Glowing skin for a radiant bridal look\",\"Deep relaxation and stress relief before the wedding\",\"Revitalization of hair for smooth and shiny locks\",\"Detoxification and body rejuvenation treatments\",\"Customized skincare to address individual skin concerns\",\"Improved overall well-being, ensuring a calm and confident bride\"]', '{\n    \"therapies\": [\n        {\n            \"name\": \"Yoga\",\n            \"image\": \"yoga.png\"\n        },\n        {\n            \"name\": \"Enema\",\n            \"image\": \"enema.png\"\n        },\n        {\n            \"name\": \"Mud Therapy\",\n            \"image\": \"mudtherapy.png\"\n        },\n        {\n            \"name\": \"Sweda massage\",\n            \"image\": \"swedamassage.png\"\n        },\n        {\n            \"name\": \"Herbal Facial\",\n            \"image\": \"herbalfacial.png\"\n        }\n    ]\n}', 'bridal-care-benefit.png', 'bridalcare-thumnail.png', '2025-01-20 17:28:47', 'bridalcare.png', 'Transform Your Bridal Glow', 'Experience personalized care for a radiant, confident walk down the aisle', NULL, NULL, NULL),
(2, 'Weight Loss', 'weight-loss', 'Achieve a healthier you with our holistic weight loss therapies.', 'Weight loss treatments aim to improve physical health, enhance metabolism, and promote overall well-being. These therapies focus on sustainable methods to help individuals achieve their weight goals while addressing both physical and mental aspects of health.', '[\"Boosts metabolism and promotes fat burning for effective weight management\", \"Improves digestion and detoxifies the body for enhanced overall health\", \"Increases physical fitness and energy levels to support an active lifestyle\", \"Promotes relaxation and reduces stress, aiding emotional well-being\", \"Addresses underlying health conditions contributing to weight gain\", \"Encourages a balanced and sustainable lifestyle for long-term benefits\"]', '{\n      \"therapies\": [\n        {\"name\": \"Yoga\", \"image\": \"yoga.png\"},\n        {\"name\": \"Meditation\", \"image\": \"Meditation.png\"},\n        {\"name\": \"Nasiyam (Nasal Therapy)\", \"image\": \"nasaltherapy.png\"},\n        {\"name\": \"Acupressure\", \"image\": \"acupressure.png\"},\n        {\"name\": \"Acupuncture\", \"image\": \"acupuncture.png\"},\n        {\"name\": \"Varma Therapy\", \"image\": \"varma_therapy.png\"},\n        {\"name\": \"Hijama (Cupping Therapy)\", \"image\": \"hijama.png\"},\n        {\"name\": \"Dorn Therapy\", \"image\": \"dorn_therapy.png\"},\n        {\"name\": \"Hydrotherapy\", \"image\": \"hydrotherapy.jpg\"},\n        {\"name\": \"Sand Bath\", \"image\": \"sand_bath.png\"}\n      ]\n    }', 'weight-loss.png', 'weight-loss-thumnail.png', '2025-01-21 12:54:25', 'weight-loss.png', 'Healthy Weight Transformation', 'Achieve your goals with treatments that boost health, enhance metabolism, and support well-being.', NULL, NULL, NULL),
(3, 'Skin Care', 'skin-care', 'Rejuvenate and radiate with our personalized skin care therapies.', 'Skin care treatments are designed to enhance natural beauty, rejuvenate the skin, and address specific concerns like acne, aging, or dullness. These therapies use holistic and natural techniques to promote healthy and glowing skin.', '[\"Cleanses and detoxifies the skin for a natural glow\", \"Improves hydration and elasticity, reducing signs of aging\", \"Treats specific concerns like acne, pigmentation, and dullness\", \"Enhances relaxation and reduces stress for healthier skin\", \"Promotes blood circulation and stimulates collagen production\", \"Nourishes the skin with herbal and natural ingredients\"]', '{\n      \"therapies\": [\n        {\"name\": \"Hijama\", \"image\": \"hijama.png\"},\n        {\"name\": \"Acupuncture\", \"image\": \"acupuncture.png\"},\n        {\"name\": \"Acupressure\", \"image\": \"acupressure.png\"},\n        {\"name\": \"Flower Medicine\", \"image\": \"flower_medicine.png\"},\n        {\"name\": \"Ayurveda Facial\", \"image\": \"ayurveda_facial.png\"},\n        {\"name\": \"Herbal Facial\", \"image\": \"herbalfacial.png\"},\n        {\"name\": \"Cupping Facial\", \"image\": \"cupping_facial.png\"},\n        {\"name\": \"Hydro Facial\", \"image\": \"hydro_facial.png\"},\n        {\"name\": \"Aroma Therapy\", \"image\": \"aroma_therapy.png\"}\n      ]\n    }', 'skin-care.png', 'skin-care-thumnail.png', '2025-01-21 12:57:04', 'skin-care.png', 'Radiant Skin Awaits\n\n', 'Nourish and rejuvenate your skin with care tailored just for you.', NULL, NULL, NULL),
(4, 'Hair Care', 'hair-care', 'Restore and revitalize your hair with our holistic therapies.', 'Hair care treatments focus on strengthening hair follicles, promoting hair growth, and addressing issues like hair fall, dandruff, and dryness. These therapies use natural methods and rejuvenating techniques to ensure healthy and lustrous hair.', '[\"Strengthens hair from the roots, reducing hair fall\", \"Promotes hair growth for thicker and healthier locks\", \"Nourishes the scalp and combats dryness and dandruff\", \"Restores shine and smoothness for a polished look\", \"Improves blood circulation to the scalp, enhancing hair health\", \"Reduces stress, promoting a healthy scalp environment\"]', '{\n      \"therapies\": [\n        {\"name\": \"Diet\", \"image\": \"diet.png\"},\n        {\"name\": \"Hijama (Cupping Therapy)\", \"image\": \"hijama.png\"},\n        {\"name\": \"Acupressure\", \"image\": \"acupressure.png\"},\n        {\"name\": \"Acupuncture\", \"image\": \"acupuncture.png\"},\n        {\"name\": \"Micro-needling\", \"image\": \"micro_needling.png\"},\n        {\"name\": \"Massage\", \"image\": \"hairmassage.png\"},\n        {\"name\": \"Ayurveda Hair Spa\", \"image\": \"ayurveda_hair_spa.png\"}\n      ]\n    }', 'hair-care.png', 'hair-care-thumnail.png', '2025-01-21 12:59:46', 'Hair-Care.png', 'Nourish Your Hair, Transform Your Look', 'Strengthen follicles, promote growth, and combat hair issues with rejuvenating treatments for healthy, lustrous hair.', NULL, NULL, NULL),
(6, 'Spine Care', 'spine-care', 'Strengthen and support your spine for a pain-free life.', 'Spine care treatments aim to alleviate pain, improve posture, and enhance spinal health. These therapies combine gentle adjustments and relaxation techniques to relieve tension and promote alignment.', '[\"Relieves back pain and improves mobility\", \"Supports proper spinal alignment\", \"Enhances posture and reduces tension\", \"Promotes blood flow and flexibility\", \"Non-invasive therapies for long-term relief\", \"Improves overall well-being and spinal health\"]', '{\n      \"therapies\": [\n        {\"name\": \"Dorn Therapy\", \"image\": \"dorn_therapy.png\"},\n        {\"name\": \"Acupressure\", \"image\": \"acupressure.png\"},\n        {\"name\": \"Acupuncture\", \"image\": \"acupuncture.png\"},\n        {\"name\": \"Cupping Therapy\", \"image\": \"cupping_therapy.png\"},\n        {\"name\": \"Paadha Guasa (Foot Guasa)\", \"image\": \"paadha_guasa.png\"},\n        {\"name\": \"Massage\", \"image\": \"massage.png\"}\n      ]\n    }', 'Spine-Care.png', 'Spine-Care.png', '2025-01-21 13:13:35', 'Spine-Care.png', 'Comprehensive Spine Care for a Healthier Back', 'Alleviate pain and improve posture with gentle spine care treatments', NULL, NULL, NULL),
(22, 'Karla Kattai', 'karla-kattai', 'Karala Kattai â€“ Strong, Durable, and Reliable Binding Solutions for Every Need', 'Karala Kattai is a trusted name in high-quality binding solutions, known for strength and durability. Designed for various applications, from industrial to household use, our products ensure reliability and long-lasting performance. With a commitment to excellence, we provide the perfect solution for all your binding needs.', '[\"Builds grip, wrist, shoulder, and core strength for overall fitness.\"]', '{\"therapies\":[{\"name\":\"Basic Swing (Thal Alithal)\",\"image\":\"1739766535_67b2bb0768637_maxresdefault.jpg\"},{\"name\":\"Basic Swing (Thal Alithal)\",\"image\":\"1739766535_67b2bb07687a1_maxresdefault.jpg\"},{\"name\":\"Reverse Swing (Pin Alithal)\",\"image\":\"1739766535_67b2bb07688e6_maxresdefault.jpg\"},{\"name\":\"Circular Swing (Soozhi Alithal)\",\"image\":\"1739766535_67b2bb0768a5b_karlakattai-yoga-775454.jpg\"},{\"name\":\" Single-Hand Swing (Oru Kai Alithal)\",\"image\":\"1739766535_67b2bb0768c23_maxresdefault.jpg\"},{\"name\":\" Double-Handed Swing (Irattai Kai Alithal)\",\"image\":\"1739766535_67b2bb0768db7_maxresdefault.jpg\"}]}', '1739766535_67b2bb0767ed0_karlakattai-yoga-987894.webp', '1739766535_67b2bb0768356_karlakattai-yoga-775454.jpg', '2025-02-17 04:28:55', '1739766535_67b2bb07684cc_Kerla Kattai.png', 'Karala Katti: Strength in Every Knot', 'Crafted with precision, built for durabilityâ€”your trusted binding solution', 'Crafted with precision, built for durabilityâ€”your trusted binding solution', 'https://youtu.be/-SGrHfgN7gw', 'Karala Katti: Strength in Every Knot'),
(23, 'Batch Flower ', 'Batch-Flower ', 'Batch Flower Medicine â€“ Healing with Natureâ€™s Gifts for Emotional Wellness', 'Batch Flower Medicine is a holistic approach to emotional healing, utilizing the power of natural flower essences. Our remedies are crafted to promote mental clarity, reduce stress, and enhance emotional well-being. With a focus on balance and harmony, we offer a gentle yet effective solution to support your emotional health and overall wellness.', '[\" Helps restore emotional stability and calmness.\",\"Alleviates stress and anxiety by promoting relaxation.\",\"Enhances self-esteem and self-worth.\",\"Clears mental fog, aiding better decision-making and focus.\",\" Assists in recovering from emotional trauma or shock.\",\"Encourages restful and peaceful sleep by calming the mind.\"]', '{\"therapies\":[{\"name\":\"Rescue Remedy \",\"image\":\"1739767647_67b2bf5fca65f_rockville-centre-chiropractor-dr-bach-flower-remedies.jpg\"},{\"name\":\"Mimulus\",\"image\":\"1739767647_67b2bf5fca80b_rockville-centre-chiropractor-dr-bach-flower-remedies.jpg\"},{\"name\":\"Star of Bethlehem\",\"image\":\"1739767647_67b2bf5fca951_rockville-centre-chiropractor-dr-bach-flower-remedies.jpg\"},{\"name\":\"Larch\",\"image\":\"1739767647_67b2bf5fcaa57_rockville-centre-chiropractor-dr-bach-flower-remedies.jpg\"},{\"name\":\"Cherry Plum\",\"image\":\"1739767647_67b2bf5fcab69_rockville-centre-chiropractor-dr-bach-flower-remedies.jpg\"}]}', '1739767647_67b2bf5fc9e59_rockville-centre-chiropractor-dr-bach-flower-remedies.jpg', '1739767647_67b2bf5fca326_4765650_7ec9_6.webp', '2025-02-17 04:47:27', '1739767647_67b2bf5fca4b0_bach-flower-and-homeopathy-toronto.jpeg', 'Discover the Healing Power of Batch Flower Remedies', 'Unlock natureâ€™s healing potential with Batch Flower medicine, designed to restore balance and emotional well-being. Our remedies help you achieve mental clarity, emotional resilience, and a peaceful state of mind.', 'Unlock natureâ€™s healing potential with Batch Flower medicine, designed to restore balance and emotional well-being. Our remedies help you achieve mental clarity, emotional resilience, and a peaceful state of mind.', 'https://www.youtube.com/watch?v=Fit7BqpBDLE&pp=ygUMYmF0Y2ggZmxvd2Vy', 'Discover the Healing Power of Batch Flower Remedies'),
(24, 'hi', '', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-17 19:44:30', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'hi', '', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-17 19:44:41', NULL, NULL, NULL, NULL, NULL, NULL);

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
-- Indexes for table `courses_list`
--
ALTER TABLE `courses_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featured_courses`
--
ALTER TABLE `featured_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maingallery`
--
ALTER TABLE `maingallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_treatments`
--
ALTER TABLE `main_treatments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marquee`
--
ALTER TABLE `marquee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
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
-- AUTO_INCREMENT for table `courses_list`
--
ALTER TABLE `courses_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `featured_courses`
--
ALTER TABLE `featured_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `maingallery`
--
ALTER TABLE `maingallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `main_treatments`
--
ALTER TABLE `main_treatments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `marquee`
--
ALTER TABLE `marquee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `treatments`
--
ALTER TABLE `treatments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
