CREATE TABLE `web`.`members`
(
    `id`          INT          NOT NULL AUTO_INCREMENT,
    `name`        VARCHAR(255) NOT NULL,
    `lastname`    VARCHAR(255) NOT NULL,
    `dateofbirth` DATE         NOT NULL,
    `adress`      VARCHAR(255) NOT NULL,
    `JMBG`        BIGINT       NOT NULL,
    `number`      VARCHAR(255) NOT NULL,
    `email`       VARCHAR(255) NOT NULL,
    `passnumber`  VARCHAR(255) NOT NULL,
    `year`        INT          NOT NULL,
    `passscan`    TEXT         NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;
