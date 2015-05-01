CREATE TABLE `bf_chat` (
	`message_id` INT(11) NOT NULL AUTO_INCREMENT,
	`sender_id` INT(11) NULL DEFAULT NULL,
	`recipient_id` INT(11) NULL DEFAULT NULL,
	`message` VARCHAR(250) NULL DEFAULT NULL COMMENT 'Markdown',
	`checked` VARCHAR(50) NULL DEFAULT NULL COMMENT 'bool 1 or 0',
	`timestamp` VARCHAR(50) NULL DEFAULT '3' COMMENT 'now()',
	PRIMARY KEY (`account_id`),
	INDEX `Index 2` (`user_id`),
	INDEX `Index 3` (`recipient_id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=4
;
