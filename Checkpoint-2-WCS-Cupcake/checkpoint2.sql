drop database if exists checkpoint2;

create database checkpoint2;

use checkpoint2;

create table accessory(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name varchar(255) not null,
  url varchar(255) not null
);

create table cupcake(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name varchar(255) not null,
  color1 char(7) NOT NULL,
  color2 char(7) NOT NULL,
  color3 char(7) NOT NULL,
  accessory_id INT NOT NULL,
  created_at DATETIME
);

ALTER TABLE cupcake
ADD FOREIGN KEY (accessory_id) REFERENCES accessory(id);
