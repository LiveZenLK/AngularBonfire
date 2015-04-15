CREATE TABLE `bf_belongings` (
	`belonging_id` INT(11) NOT NULL AUTO_INCREMENT,
	`user_id` INT(11) NULL DEFAULT NULL,
	`stuff_id` VARCHAR(50) NULL DEFAULT NULL COMMENT '',
	`amount` INT(11) NULL DEFAULT '0' COMMENT 'how many the player holds',
	PRIMARY KEY (`belonging_id`),
	INDEX `Index 2` (`user_id`),
	INDEX `Index 3` (`stuff_id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=4
;
