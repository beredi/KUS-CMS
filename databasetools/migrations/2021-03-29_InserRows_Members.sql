ALTER TABLE `members`
    ADD `degree` VARCHAR(128) NOT NULL AFTER `passscan`, ADD `sex` VARCHAR(128) NOT NULL AFTER `degree`;
