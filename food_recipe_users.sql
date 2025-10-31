-- SQL script to create `users` table for My Food Recipe
-- Run this in phpMyAdmin (select your database) to create the table.

CREATE TABLE IF NOT EXISTS `users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(100) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `role` ENUM('admin','user') NOT NULL DEFAULT 'user',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Optional: create an initial admin user.
-- For security, you should create a hashed password using PHP's password_hash and then paste it below.
-- Example: from a terminal with PHP installed run:
-- php -r "echo password_hash('YourAdminPassword', PASSWORD_BCRYPT);"
-- Then copy the resulting hash and use it in the INSERT statement below.

-- INSERT INTO `users` (`username`, `password`, `role`) VALUES
-- ('admin', '$2y$10$REPLACE_WITH_PHP_GENERATED_HASH_HERE', 'admin');

-- If you prefer not to generate a hash yourself, you can use the provided helper script
-- `create_admin.php` (in the project root) to create an admin account safely from the browser.
