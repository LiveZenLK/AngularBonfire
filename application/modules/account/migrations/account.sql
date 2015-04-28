CREATE TABLE `bf_account` (
	`account_id` INT(11) NOT NULL AUTO_INCREMENT,
	`user_id` INT(11) NULL DEFAULT NULL,
	`account_profile` VARCHAR(50) NULL DEFAULT NULL COMMENT 'Markdown',
	`location` VARCHAR(50) NULL DEFAULT NULL COMMENT 'City, Country',
	`image_path` VARCHAR(50) NULL DEFAULT '3' COMMENT 'a string',
	`active` INT(11) NULL DEFAULT '0' COMMENT 'true or false',
	PRIMARY KEY (`account_id`),
	INDEX `Index 2` (`user_id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=4
;
