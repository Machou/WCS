drop database if exists checkpoint1;
create database checkpoint1;

use checkpoint1;

create table bribe (
  id int not null auto_increment primary key,
  name varchar(100),
  payment int
);

INSERT INTO bribe (name, payment)
 VALUES
 ('Al Capone', 100),
 ('Joe Mallone', 100),
 ('Eliott Ness', 200);
