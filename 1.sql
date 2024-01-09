-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mvc
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mvc
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mvc` DEFAULT CHARACTER SET utf8 ;
USE `mvc` ;

-- -----------------------------------------------------
-- Table `mvc`.`role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mvc`.`role` ;

CREATE TABLE IF NOT EXISTS `mvc`.`role` (
  `id_role` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) CHARACTER SET 'armscii8' NOT NULL,
  PRIMARY KEY (`id_role`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mvc`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mvc`.`user` ;

CREATE TABLE IF NOT EXISTS `mvc`.`user` (
  `id_user` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(45) NOT NULL,
  `fullname` VARCHAR(45) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `role_id_role` INT NOT NULL,
  PRIMARY KEY (`id_user`),
  INDEX `fk_user_role1_idx` (`role_id_role` ASC) VISIBLE,
  CONSTRAINT `fk_user_role1`
    FOREIGN KEY (`role_id_role`)
    REFERENCES `mvc`.`role` (`id_role`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mvc`.`order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mvc`.`order` ;

CREATE TABLE IF NOT EXISTS `mvc`.`order` (
  `id_order` INT NOT NULL AUTO_INCREMENT,
  `date` DATE NOT NULL,
  `user_id_user` INT NOT NULL,
  PRIMARY KEY (`id_order`),
  INDEX `fk_order_user1_idx` (`user_id_user` ASC) VISIBLE,
  CONSTRAINT `fk_order_user1`
    FOREIGN KEY (`user_id_user`)
    REFERENCES `mvc`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mvc`.`product`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mvc`.`product` ;

CREATE TABLE IF NOT EXISTS `mvc`.`product` (
  `id_product` INT NOT NULL AUTO_INCREMENT,
  `name_pr` VARCHAR(45) NOT NULL,
  `price` INT NOT NULL,
  `productcol` VARCHAR(45) NULL,
  PRIMARY KEY (`id_product`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mvc`.`product_order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mvc`.`product_order` ;

CREATE TABLE IF NOT EXISTS `mvc`.`product_order` (
  `product_id_product` INT NOT NULL,
  `order_id_order` INT NOT NULL,
  INDEX `fk_product_order_product1_idx` (`product_id_product` ASC) VISIBLE,
  INDEX `fk_product_order_order1_idx` (`order_id_order` ASC) VISIBLE,
  CONSTRAINT `fk_product_order_product1`
    FOREIGN KEY (`product_id_product`)
    REFERENCES `mvc`.`product` (`id_product`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_order_order1`
    FOREIGN KEY (`order_id_order`)
    REFERENCES `mvc`.`order` (`id_order`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
