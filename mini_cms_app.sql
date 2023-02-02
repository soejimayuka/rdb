-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2023 年 2 月 02 日 08:06
-- サーバのバージョン： 5.7.26
-- PHP のバージョン: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `mini_cms_app`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `category_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'お知らせ'),
(2, 'イベント情報'),
(3, '活動報告');

-- --------------------------------------------------------

--
-- テーブルの構造 `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(60) NOT NULL,
  `content` longtext NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `post_image` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `category_id`, `post_image`, `created`, `modified`) VALUES
(3, '台湾定期便再開記念「プチ台湾フェア」開催', 'テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。', 1, '20230202070635-area02.jpg', '2022-04-20 10:00:00', '2023-02-02 07:44:33'),
(4, '台湾春旅キャンペーン', 'テスト投稿になります。テスト投稿になります。テスト投稿になります。テスト投稿になります。テスト投稿になります。テスト投稿になります。テスト投稿になります。テスト投稿になります。テスト投稿になります。テスト投稿になります。テスト投稿になります。', 1, '20230202070745-area04.jpg', '2022-12-16 01:43:19', '2023-02-02 07:44:55'),
(5, '台湾旅行プレゼントキャンペーン', 'これはイベント情報のテスト投稿です。これはイベント情報のテスト投稿です。これはイベント情報のテスト投稿です。これはイベント情報のテスト投稿です。これはイベント情報のテスト投稿です。これはイベント情報のテスト投稿です。これはイベント情報のテスト投稿です。これはイベント情報のテスト投稿です。これはイベント情報のテスト投稿です。', 2, '20230202070825-area04.jpg', '2022-12-22 17:04:02', '2023-02-02 07:45:21'),
(7, 'GO！GO！台湾　ウェルカムプレゼントキャンペーン', 'テストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだテストだ', 1, '20230202070916-area05.jpg', '2022-12-21 10:13:16', '2023-02-02 07:45:30');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルのAUTO_INCREMENT `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
