CREATE TABLE `web`.`files`
(
    `id`          INT          NOT NULL AUTO_INCREMENT,
    `name`        VARCHAR(255) NOT NULL,
    `file`        TEXT         NOT NULL,
    `description` TEXT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

ALTER TABLE `files`
    ADD UNIQUE (`file`);
