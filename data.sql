/*
 Navicat Premium Data Transfer

 Source Server         : oro
 Source Server Type    : MySQL
 Source Server Version : 100415
 Source Host           : sql351.main-hosting.eu:3306
 Source Schema         : u846104315_oro

 Target Server Type    : MySQL
 Target Server Version : 100415
 File Encoding         : 65001

 Date: 25/03/2021 15:51:39
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cate
-- ----------------------------
DROP TABLE IF EXISTS `cate`;
CREATE TABLE `cate`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pos` int UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of cate
-- ----------------------------

-- ----------------------------
-- Table structure for config
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of config
-- ----------------------------
INSERT INTO `config` VALUES (1, 'Web Hoa oro', 'Giới thiệu...', NULL, '2021-03-23 15:11:45');

-- ----------------------------
-- Table structure for mails
-- ----------------------------
DROP TABLE IF EXISTS `mails`;
CREATE TABLE `mails`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of mails
-- ----------------------------
INSERT INTO `mails` VALUES (7, 'Nguyen Anh Duy', 'lua.solution@gmail.com', 'wwqewe', '0859571638', '2021-03-23 15:09:42', '2021-03-23 15:09:42');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos` int UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES (1, 'Cùng mèo Tita dạy trẻ kỹ năng sống', 'cung-meo-tita-day-tre-ky-nang-song-1', 'cung-meo-tita-day-tre-ky-nang-song-1.png?n=1616485558', 'Bộ truyện tranh song ngữ Anh - Việt \"Những chuyến phiêu lưu của mèo Tita\" dẫn dắt độc giả nhí đến với nhiều câu chuyện hấp dẫn.', '<p>Bộ truyện tranh song ngữ Anh - Việt 5 tập mang t&ecirc;n&nbsp;<em>Những chuyến phi&ecirc;u lưu của m&egrave;o Tita</em>&nbsp;vừa được NXB Tổng hợp TP.HCM ấn h&agrave;nh, hứa hẹn sẽ trở th&agrave;nh &ldquo;người bạn mới&rdquo; th&uacute; vị của bạn đọc nhỏ tuổi.</p>\r\n\r\n<p><em>Những chuyến phi&ecirc;u lưu của m&egrave;o Tita</em>&nbsp;gồm 5 c&acirc;u chuyện tiếp nối nhau kể về chuyến phi&ecirc;u lưu của Tita, vốn l&agrave; c&ocirc; m&egrave;o mồ c&ocirc;i, may mắn gặp được một bạn thiếu ni&ecirc;n tốt bụng nhận nu&ocirc;i dưỡng.</p>\r\n\r\n<p>Với t&iacute;nh c&aacute;ch ưa kh&aacute;m ph&aacute;, vui vẻ, hay gi&uacute;p đỡ, Tita được cư d&acirc;n nơi m&igrave;nh đang sống - m&ocirc;i trường quốc tế đa văn h&oacute;a, gần gũi thi&ecirc;n nhi&ecirc;n - qu&yacute; mến.</p>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><img alt=\"\" src=\"http://127.0.0.1/traicayhoabien/public/images/20210208_101601_1614270023.jpg\" style=\"height:333px; width:500px\" /></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Bộ truyện tranh&nbsp;<em>Những chuyến phi&ecirc;u lưu của m&egrave;o Tita.</em>&nbsp;Ảnh:&nbsp;<em>L.G</em><em>.</em></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Đ&acirc;y l&agrave; t&aacute;c phẩm đầu tay của t&aacute;c giả B&ugrave;i Linh Giang, người d&agrave;nh hơn 12 năm dạy tiếng Anh cho nhiều bạn nhỏ, v&agrave; cũng l&agrave; huấn luyện vi&ecirc;n sức khỏe. Nhờ cơ duy&ecirc;n đ&oacute;, cứ mỗi lứa học tr&ograve;, t&aacute;c giả lại g&oacute;p nhặt th&ecirc;m nhiều c&aacute; t&iacute;nh đ&aacute;ng y&ecirc;u, khắc họa n&ecirc;n những nh&acirc;n vật với t&iacute;nh c&aacute;ch sinh động v&agrave; gần gũi với lứa tuổi thiếu nhi.</p>\r\n\r\n<p>T&aacute;c giả cho rằng m&ocirc;i trường l&agrave;m việc đ&oacute; l&agrave; nguồn cảm hứng để c&ocirc; bắt tay thực hiện t&aacute;c phẩm với tất cả t&igrave;nh y&ecirc;u thương trẻ thơ v&agrave; niềm say m&ecirc; v&igrave; sự nghiệp gi&aacute;o dục.</p>\r\n\r\n<p>Linh Giang chia sẻ: &quot;Hy vọng bộ truyện c&oacute; thể gi&uacute;p trẻ em c&oacute; cơ hội tiếp x&uacute;c gần gũi hơn với m&ocirc;n tiếng Anh, thật vui vẻ, tự nhi&ecirc;n. C&aacute;c độc giả quốc tế sẽ c&oacute; c&aacute;i nh&igrave;n đẹp hơn về văn h&oacute;a v&agrave; ứng xử của người Việt th&ocirc;ng qua t&aacute;c phẩm n&agrave;y&quot;.</p>\r\n\r\n<p>Khi bạn đọc nh&iacute; đồng h&agrave;nh c&ugrave;ng m&egrave;o Tita qua n&eacute;t vẽ sống động, gần gũi của họa sĩ Lam trong chuyến phi&ecirc;u lưu đầy m&agrave;u sắc ấy, c&aacute;c em cũng hiểu th&ecirc;m về gi&aacute; trị của t&igrave;nh bạn ch&acirc;n th&agrave;nh, l&ograve;ng biết ơn đối với những điều xung quanh v&agrave; tầm quan trọng trong &yacute; thức n&acirc;ng cao sức khỏe thể chất, c&ugrave;ng việc nu&ocirc;i dưỡng tinh thần t&iacute;ch cực.</p>\r\n\r\n<p>Tiếp cận bộ s&aacute;ch, phụ huynh c&oacute; nhiều cơ hội để c&ugrave;ng gi&aacute;o dục v&agrave; chia sẻ t&igrave;nh thương với con m&igrave;nh, th&ocirc;ng qua những c&acirc;u chuyện về sự v&acirc;ng lời, l&ograve;ng tự trọng, sự khi&ecirc;m nhường.</p>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://127.0.0.1/traicayhoabien/public/images/20210208_101601_1614270044.jpg\" style=\"height:399px; width:600px\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Một phần tập 2 mang t&ecirc;n&nbsp;<em>Cẩn thận khi chơi đ&ugrave;a</em>&nbsp;trong bộ truyện&nbsp;<em>Những chuyến phi&ecirc;u lưu của m&egrave;o Tita.&nbsp;</em>Ảnh:&nbsp;<em>L.G</em><em>.</em></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Qua 5 tập, m&egrave;o Tita sẽ trải qua những cuộc phi&ecirc;u lưu với những chủ đề &quot;C&oacute; ai đ&oacute; đang gặp nạn&quot;, &quot;Cẩn thận khi chơi đ&ugrave;a&quot;, &quot;Người bạn lấp l&aacute;nh&quot;, &quot;Bữa ăn sau giờ chơi&quot; v&agrave; &quot;L&agrave;m việc tốt sẽ được b&aacute;o đ&aacute;p&quot;. Mỗi tập l&agrave; một c&acirc;u chuyện &yacute; nghĩa gi&aacute;o dục trẻ nhỏ thiết thực.</p>\r\n\r\n<p>Chẳng hạn ở tập 1 với chủ đề&nbsp;<em>C&oacute; ai đ&oacute; đang gặp nạn</em>, m&egrave;o Tita d&ugrave;ng sức m&igrave;nh gi&uacute;p bạn ch&oacute; Tiny bị kẹt ch&acirc;n dưới kh&uacute;c gỗ. &Yacute; nghĩa gi&aacute;o dục được đ&uacute;c kết với trẻ nhỏ ch&iacute;nh l&agrave; chế độ ăn uống hợp l&yacute;, đ&uacute;ng c&aacute;ch để khỏe mạnh.</p>\r\n\r\n<p>Tập 2 với chủ đề&nbsp;<em>Cẩn thận khi chơi đ&ugrave;a</em>, m&egrave;o Tita mải chơi bị rơi xuống nước, được vợ chồng c&ocirc; ngỗng Seb-Lucy cứu, nhắc trẻ về l&ograve;ng biết ơn người gi&uacute;p m&igrave;nh, cũng như cần c&oacute; kỹ năng bơi để kh&ocirc;ng bị đuối nước...</p>', 999, '2019-11-07 07:53:29', '2021-03-23 14:45:58');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `note` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `status` tinyint UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of orders
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL
) ENGINE = MyISAM CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int NOT NULL,
  `admin` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', '0123456789', 1, 1, 'admin@gmail.com', '$2y$12$u4/QHFJIZUEpdtEBPRcG8e32gMNXJkIcdxN9mYpCTcDX2p23b3Tvm', 'nNW9RHGO8LJeSdqeCIM0PApnrDGL1jnC4YCZThKpYrQLFz9ky7gTctGt1UAF', '2019-10-24 07:58:23', '2019-11-06 10:32:32');

SET FOREIGN_KEY_CHECKS = 1;
