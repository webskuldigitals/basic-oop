
CREATE TABLE `milk`.`database_migration` (
  `id` INT(11) NOT NULL AUTO_INCREMENT , 
  `folder_name` VARCHAR(80) NOT NULL , 
  `datetime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
  PRIMARY KEY (`id`)
) ENGINE = InnoDB; 

CREATE TABLE `module` (
  `id` bigint(20) NOT NULL,
  `folder` varchar(40) NOT NULL,
  `page_title` varchar(240) NOT NULL,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `module` (`id`, `folder`, `page_title`, `active`) VALUES
(1, 'accounts', 'My account', 1),
(2, 'frontend', 'Frontend', 1);

CREATE TABLE `what` (
  `id` bigint(20) NOT NULL,
  `module_id` bigint(20) NOT NULL,
  `file` varchar(40) NOT NULL,
  `page_title` varchar(240) NOT NULL,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `what` (`id`, `module_id`, `file`, `page_title`, `active`) VALUES
(1, 1, 'login-form', 'Login', 1);

ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `what`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_file_unique` (`id`,`file`),
  ADD KEY `what_to_module_relation` (`module_id`);

ALTER TABLE `module`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `what`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `what`
  ADD CONSTRAINT `what_to_module_relation` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`);
COMMIT;