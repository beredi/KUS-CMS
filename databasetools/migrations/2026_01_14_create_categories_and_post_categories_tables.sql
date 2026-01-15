-- Migration: Create categories and post_categories tables
-- Created: 2026-01-14
-- Description: Adds category support for posts with many-to-many relationship

-- Create categories table
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `idx_name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- Create post_categories junction table for many-to-many relationship
CREATE TABLE IF NOT EXISTS `post_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_post_category` (`post_id`, `category_id`),
  KEY `idx_post_id` (`post_id`),
  KEY `idx_category_id` (`category_id`),
  KEY `fk_post_categories_category` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- Rollback script (commented out, uncomment to rollback)
-- DROP TABLE IF EXISTS `post_categories`;
-- DROP TABLE IF EXISTS `categories`;
