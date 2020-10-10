-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 08 Juillet 2019 à 09:06
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `project`
--

-- --------------------------------------------------------

--
-- Structure de la table `answers`
--

CREATE TABLE `answers` (
  `answer_id` int(255) NOT NULL,
  `answer_user_id` int(255) NOT NULL,
  `answer_question_id` int(255) NOT NULL,
  `answer_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `answers`
--

INSERT INTO `answers` (`answer_id`, `answer_user_id`, `answer_question_id`, `answer_content`, `answer_creation_date`) VALUES
(2, 4, 1, 'PHPANSWERLorem ipsum dolor sit amet, consectetur adipisicing elit. Vel unde, enim architecto facere quos! Eligendi perspiciatis inventore, suscipit nemo eveniet doloribus, libero quam hic nihil expedita cumque voluptate soluta? Exercitationem voluptatem ut iusto. Accusamus excepturi dolores, facere pariatur ducimus itaque atque, omnis sit. Beatae ducimus molestias, porro nisi eveniet repellat fugit. Atque, sapiente tempora consequatur. Nulla, saepe esse. Facilis eligendi natus a consectetur minus quae voluptatibus soluta molestias in autem itaque maxime veritatis, deleniti exercitationem officia libero ab numquam modi obcaecati id, consequatur? Praesentium ipsa porro, officia. Facere nisi, voluptates voluptate rerum consectetur, quas sed quaerat ullam voluptas saepe atque.', '2019-03-13'),
(3, 2, 1, 'PHPANSWERLorem ipsum dolor sit amet, consectetur adipisicing elit. Vel unde, enim architecto facere quos! Eligendi perspiciatis inventore, suscipit nemo eveniet doloribus, libero quam hic nihil expedita cumque voluptate soluta? Exercitationem voluptatem ut iusto. Accusamus excepturi dolores, facere pariatur ducimus itaque atque, omnis sit. Beatae ducimus molestias, porro nisi eveniet repellat fugit. Atque, sapiente tempora consequatur. Nulla, saepe esse. Facilis eligendi natus a consectetur minus quae voluptatibus soluta molestias in autem itaque maxime veritatis, deleniti exercitationem officia libero ab numquam modi obcaecati id, consequatur? Praesentium ipsa porro, officia. Facere nisi, voluptates voluptate rerum consectetur, quas sed quaerat ullam voluptas saepe atque.', '2019-03-14'),
(4, 1, 2, 'JAVASCRIPTANSWERLorem ipsum ucimus molficia libero ab numquam modi obcaecati id, consequatur? Praesentium ipsa porro, officia. Facere nisi, voluptates voluptate rerum consectetur, quas sed quaerat ullam voluptas saepe atque.', '2019-03-06'),
(5, 2, 2, 'JAVASCRIPTANSWERLorem ipsum dolor sit amet, consectetur adipisicing elit. Vel unde, enim architecto facere quos! Eligendi perspiciatis inventore, suscipit nemo eveniet doloribus, libero quam hic nihil expedita cumque voluptate soluta? Exercitationem voluptatem ut iusto. Accusamus excepturi dolores, facere pariatur ducimus itaque atque, omnis sit. Beatae ducimus molestias, porro nisi eveniet repellat fugit. Atque, sapiente tempora consequatur. Nulla, saepe esse. Facilis eligendi natus a consectetur minus quae voluptatibus soluta molestias in autem itaque maxime veritatis, deleniti exercitationem officia libero ab numquam modi obcaecati id, consequatur? Praesentium ipsa porro, officia. Facere nisi, voluptates voluptate rerum consectetur, quas sed quaerat ullam voluptas saepe atque.', '2019-03-06'),
(6, 1, 4, 'phpLorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque tempora dicta expedita doloribus nulla possimus rerum itaque ad laudantium blanditiis, quis facere tempore ipsa at eos similique recusandae perspiciatis, odit inventore veritatis porro modi mollitia sequi atque. Ullam harum non aliquid assumenda architecto, error impedit et in. Corrupti dolorem ullam fugiat itaque tenetur, cum voluptatem assumenda! Accusantium doloremque voluptates cum consequatur quisquam deserunt perferendis quaerat fugiat eaque blanditiis voluptas quod voluptate commodi earum cupiditate, necessitatibus, quos. Adipisci sint autem dolores accusamus sequi suscipit, obcaecati saepe, odit consequatur expedita. Adipisci tempora veniam reiciendis aut id sapiente voluptatum a dolorem exercitationem, qui necessitatibus nesciunt fugit temporibus magni unde quae, ullam in doloribus doloremque, ut esse, cum quaerat perferendis sit? Ducimus nulla et, nam explicabo modi. Quasi, non! Quas officia libero repellendus, omnis. Inventore aliquam dolore fuga molestiae temporibus magni nulla doloribus at, distinctio sint rerum dolorum quos ratione minus incidunt delectus officiis reprehenderit recusandae vero! Expedita, quas totam omnis consequuntur quasi neque minus magni asperiores explicabo. Ullam rem odio quia assumenda magnam at, neque reiciendis accusantium recusandae earum! Eligendi quaerat, iure libero veritatis assumenda modi, aspernatur ut similique eos, delectus dignissimos voluptate. Asperiores voluptatem nulla cumque repellat cum accusamus vel sint fugit!', '2019-04-27'),
(7, 1, 4, 'phpLorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque tempora dicta expedita doloribus nulla possimus rerum itaque ad laudantium blanditiis, quis facere tempore ipsa at eos similique recusandae perspiciatis, odit inventore veritatis porro modi mollitia sequi atque. Ullam harum non aliquid assumenda architecto, error impedit et in. Corrupti dolorem ullam fugiat itaque tenetur, cum voluptatem assumenda! Accusantium doloremque voluptates cum consequatur quisquam deserunt perferendis quaerat fugiat eaque blanditiis voluptas quod voluptate commodi earum cupiditate, necessitatibus, quos. Adipisci sint autem dolores accusamus sequi suscipit, obcaecati saepe, odit consequatur expedita. Adipisci tempora veniam reiciendis aut id sapiente voluptatum a dolorem exercitationem, qui necessitatibus nesciunt fugit temporibus magni unde quae, ullam in doloribus doloremque, ut esse, cum quaerat perferendis sit? Ducimus nulla et, nam explicabo modi. Quasi, non! Quas officia libero repellendus, omnis. Inventore aliquam dolore fuga molestiae temporibus magni nulla doloribus at, distinctio sint rerum dolorum quos ratione minus incidunt delectus officiis reprehenderit recusandae vero! Expedita, quas totam omnis consequuntur quasi neque minus magni asperiores explicabo. Ullam rem odio quia assumenda magnam at, neque reiciendis accusantium recusandae earum! Eligendi quaerat, iure libero veritatis assumenda modi, aspernatur ut similique eos, delectus dignissimos voluptate. Asperiores voluptatem nulla cumque repellat cum accusamus vel sint fugit!', '2019-04-02'),
(8, 1, 1, 'hahahahah go ask rasmus ledorf that foking question', '2019-04-01'),
(9, 1, 1, 'really don t know sorry', '2019-04-01'),
(10, 1, 1, 'c''est comme si tu me demandes pourquoi je suis beau ', '2019-04-01'),
(11, 1, 1, 'ouuuu quelle quest!!', '2019-04-06'),
(12, 1, 4, 'because it gets the job done ! thats why / parce qu il fait le travail c pr ca', '2019-04-09'),
(13, 7, 6, 'javascript est emploé dans bcp de domaine notammenet le devélopement web (front and back end ) et le developement mobile ...', '2019-04-11');

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(255) NOT NULL,
  `class_university_id` int(255) NOT NULL,
  `class_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_creation_date` date NOT NULL,
  `class_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_image` varchar(255) NOT NULL,
  `class_professor_creator_id` int(255) NOT NULL,
  `class_following` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `classes`
--

INSERT INTO `classes` (`class_id`, `class_university_id`, `class_name`, `class_creation_date`, `class_description`, `class_image`, `class_professor_creator_id`, `class_following`) VALUES
(1, 1, 'programmation web', '2019-04-04', 'une classe dédié a la programmation et technologies web.', 'img_cinema.jpg', 4, 3),
(2, 1, 'smi programming', '2019-04-10', 'PROGRAMMINGLorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet iure provident unde aliquam, in alias voluptatum, quaerat reiciendis debitis. Cupiditate aliquam omnis, soluta dicta inventore officia, corporis dolor porro obcaecati! Totam repudiandae perferendis soluta fugit, magnam? Soluta ipsa est sequi.', 'grammar_img.jpg', 1, 1),
(4, 2, 'apprentissage automatique', '2019-06-17', 'une classe qui parle du machine learning et les technologie de l''intelligence artificiel', 'pic.png', 5, 0);

-- --------------------------------------------------------

--
-- Structure de la table `following_classes`
--

CREATE TABLE `following_classes` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `class_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `following_classes`
--

INSERT INTO `following_classes` (`id`, `user_id`, `class_id`) VALUES
(14, 2, 1),
(15, 1, 2),
(17, 1, 1),
(18, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `following_topics`
--

CREATE TABLE `following_topics` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `topic_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `following_topics`
--

INSERT INTO `following_topics` (`id`, `user_id`, `topic_id`) VALUES
(13, 2, 2),
(21, 4, 2),
(24, 2, 1),
(25, 2, 3),
(26, 2, 4),
(30, 4, 7),
(31, 5, 1),
(43, 7, 1),
(44, 7, 2),
(45, 7, 3),
(46, 7, 4),
(48, 7, 7),
(60, 1, 7),
(61, 1, 2),
(62, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(255) NOT NULL,
  `post_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_class_id` int(255) NOT NULL,
  `post_description` text NOT NULL,
  `post_type` varchar(30) NOT NULL,
  `post_document_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_class_id`, `post_description`, `post_type`, `post_document_name`, `post_creation_date`) VALUES
(1, 'cour de php', 1, 'PHPCOURSELorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet iure provident unde aliquam, in alias voluptatum, quaerat reiciendis debitis. Cupiditate aliquam omnis, soluta dicta inventore officia, corporis dolor porro obcaecati! Totam repudiandae perferendis soluta fugit, magnam? Soluta ipsa est sequi.', 'course', 'hacking.pdf', '2019-04-03'),
(2, 'cour de réseau', 3, 'NETWORKINGCOURSELorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet iure provident unde aliquam, in alias voluptatum, quaerat reiciendis debitis. Cupiditate aliquam omnis, soluta dicta inventore officia, corporis dolor porro obcaecati! Totam repudiandae perferendis soluta fugit, magnam? Soluta ipsa est sequi.', 'course', 'net_for_dummies.pdf', '2019-04-10'),
(3, 'devoir de programmation', 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet iure provident unde aliquam, in alias voluptatum, quaerat reiciendis debitis. Cupidita', 'home_work', 'programmation.pdf', '2019-04-10'),
(4, 'this is a title', 2, 'this is a description', 'course', 'Calendrier Rentrée 2019-2020  CU du 31 mai 2019(1).pdf', '2019-06-18');

-- --------------------------------------------------------

--
-- Structure de la table `posts_comments`
--

CREATE TABLE `posts_comments` (
  `comment_id` int(255) NOT NULL,
  `comment_user_id` int(255) NOT NULL,
  `comment_post_id` int(255) NOT NULL,
  `comment_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `posts_comments`
--

INSERT INTO `posts_comments` (`comment_id`, `comment_user_id`, `comment_post_id`, `comment_content`, `comment_creation_date`) VALUES
(1, 2, 1, 'ux texte standard de l''imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la burea', '2019-04-10'),
(2, 4, 1, 'ux texte standard de l''imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la burea', '2019-04-18'),
(3, 1, 1, 'c est un commentaire de alae touba', '2019-04-10'),
(4, 1, 1, 'un autre comment de alae', '2019-04-10'),
(18, 1, 1, 'my name is alae touba', '2019-04-10'),
(20, 1, 1, 'test', '2019-04-10'),
(21, 1, 3, 'voila un commetaire', '2019-04-10'),
(22, 1, 3, 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique, sans que son contenu n''en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.\r\n', '2019-04-10'),
(23, 1, 2, 'netwooorkiiing', '2019-04-10'),
(24, 1, 2, 'learn networking', '2019-04-10'),
(25, 2, 4, 'i really wanna learn this', '2019-06-18'),
(26, 2, 4, 'another comment by farid', '2019-06-18'),
(27, 1, 1, 'ujjjjjjjjjjjj', '2019-07-01');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(255) NOT NULL,
  `question_user_id` int(255) NOT NULL,
  `question_topic_id` int(255) NOT NULL,
  `question_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_creation_date` date NOT NULL,
  `question_tags` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`question_id`, `question_user_id`, `question_topic_id`, `question_content`, `question_creation_date`, `question_tags`) VALUES
(1, 1, 2, 'pourquoi le php est si facile ?', '2019-03-06', 'php, web'),
(2, 2, 1, 'est ce que javascript est le meilleur langage de programmation?', '2019-03-05', 'javascript, web, frontend'),
(3, 1, 2, 'combien de temps pour apprendre php?', '2019-04-03', 'php'),
(4, 2, 2, 'est ce que php est un bon language de programmatyion pour un débutant', '2019-04-19', 'php'),
(5, 1, 2, 'on peut apprendre php dans 3 mois ?', '2019-04-06', 'php, apprendre'),
(6, 7, 1, 'javascript est employé  dans quel domaine?', '2019-04-11', 'javascript');

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(255) NOT NULL,
  `topic_user_id` int(255) NOT NULL,
  `topic_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_image` varchar(255) NOT NULL,
  `topic_creation_date` date NOT NULL,
  `topic_following` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_user_id`, `topic_name`, `topic_description`, `topic_image`, `topic_creation_date`, `topic_following`) VALUES
(1, 1, 'javascript', 'o ab numquam modi obcaecati id, consequatur? Praesentium ipsa porro, officia. Facere nisi, voluptates voluptate rerum consectetur, quas sed quaerat ullam voluptas saepe atque.', 'javascript.jpg', '2019-03-07', 3),
(2, 2, 'php', 'o ab numquam modi obcaecati id, consequatur? Praesentium ipsa porro, officia. Facere nisi, voluptates voluptate rerum consectetur, quas sed quaerat ullam voluptas saepe atque.', 'php1.jpg', '2019-03-12', 4),
(3, 1, 'python', 'PYTHONLorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur libero similique quos quidem in, temporibus praesentium saepe sapiente rerum asperiores!', 'python.jpg', '2019-04-06', 2),
(4, 1, 'cyber security', 'Le quos quidem in, temporibus praesentium saepe sapiente rerum asperiores!', '', '2019-04-06', 3),
(7, 7, 'mathématiques', 'loremosidfhsi  odhfuizhefuohze uifhizeudfhiozuehdjijdddddddddd ddddddddddddddddd ddddd dddddzei oiozeeeee', '7e4f9b01691295fc064ba90e8ee8ea97.jpg', '2019-04-11', 3);

-- --------------------------------------------------------

--
-- Structure de la table `universities`
--

CREATE TABLE `universities` (
  `university_id` int(255) NOT NULL,
  `university_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `university_image` varchar(255) NOT NULL,
  `university_creation_date` date NOT NULL,
  `university_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `universities`
--

INSERT INTO `universities` (`university_id`, `university_name`, `university_image`, `university_creation_date`, `university_description`) VALUES
(1, 'mohammad 5 rabat', 'univ_mo_5.jpg', '2019-04-16', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet iure provident unde aliquam, in alias voluptatum, quaerat reiciendis debitis. Cupiditate aliquam omnis, soluta dicta inventore officia, corporis dolor porro obcaecati! Totam repudiandae perferendis soluta fugit, magnam? Soluta ipsa est sequi.'),
(2, 'hassan 2, casablanca', 'univ_hassan_2.jpg', '2019-04-04', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet iure provident unde aliquam, in alias voluptatum, quaerat reiciendis debitis. Cupiditate aliquam omnis, soluta dicta inventore officia, corporis dolor porro obcaecati! Totam repudiandae perferendis soluta fugit, magnam? Soluta ipsa est sequi.');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `user_firstname` varchar(70) NOT NULL,
  `user_lastname` varchar(70) NOT NULL,
  `user_email` varchar(70) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_sex` varchar(10) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_profile` varchar(10) NOT NULL,
  `user_university_id` int(255) NOT NULL,
  `user_inscription_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_sex`, `user_image`, `user_profile`, `user_university_id`, `user_inscription_date`) VALUES
(1, 'alae', 'touba', 'alae@gmail.com', '$2y$12$EO6ONd9yhGNfDDPUaQ2dauSoi6Ojr7udKGY5gtYizKJyhHSW1TZ7.', 'homme', 'alae.jpg', 'professor', 1, '2019-03-06'),
(2, 'farid', 'qouribchi', 'farid.qbch@gmail.com', '$2y$12$ERvAL4S3Jn913GhPzFJpi.BF1bgLlhJgx/Rn5FcqbRBlLdLI30QmG', 'homme', 'farid.jpg', 'student', 1, '2019-03-19'),
(4, 'anas', 'hanssali', 'anas@yahoo.fr', '$2y$12$wEQtqwmoeM/U20c/6KH06OIf/72xubRa/XDQwIhJiv6PgkBylInqC', 'homme', 'anas.jpg', 'student', 2, '2019-03-30'),
(5, 'hamza', 'jebbar', 'hamza.jeb@gmail.com', '$2y$12$mxKZCIAnEylEWFBFH9/y7OYOUd4BnmpWMTEOrV/cs4NA87QYkVenW', 'homme', 'hamza.jpg', 'professor', 2, '2019-04-10'),
(7, 'Nom', 'Prenom', 'yassin@gmail.com', '$2y$12$xalrX1nOh/3ac3WlTYspeeNFSjb/b.Eb8U.G6RFCRbXjUnrndz2nO', 'homme', '76dace9ac211d1b171d43862c312f8ff.jpg', 'professor', 2, '2019-04-11');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answer_id`);

--
-- Index pour la table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Index pour la table `following_classes`
--
ALTER TABLE `following_classes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `following_topics`
--
ALTER TABLE `following_topics`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Index pour la table `posts_comments`
--
ALTER TABLE `posts_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Index pour la table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- Index pour la table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`university_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `answers`
--
ALTER TABLE `answers`
  MODIFY `answer_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `following_classes`
--
ALTER TABLE `following_classes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `following_topics`
--
ALTER TABLE `following_topics`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `posts_comments`
--
ALTER TABLE `posts_comments`
  MODIFY `comment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `universities`
--
ALTER TABLE `universities`
  MODIFY `university_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
