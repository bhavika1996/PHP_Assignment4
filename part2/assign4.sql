create database bhavikaassign4 ;

CREATE TABLE `bhavikaassign4`.`message` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `messages` VARCHAR(75) NOT NULL,
  PRIMARY KEY (`id`));

INSERT INTO `bhavikaassign4`.`message` (`username`, `messages`) VALUES ('bhavi', 'hello');
INSERT INTO `bhavikaassign4`.`message` (`username`, `messages`) VALUES ('patel', 'how are you ?');


