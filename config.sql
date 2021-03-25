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

 Date: 25/03/2021 18:24:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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

SET FOREIGN_KEY_CHECKS = 1;
