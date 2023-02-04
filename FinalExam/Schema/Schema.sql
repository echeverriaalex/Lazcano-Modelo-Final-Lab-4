drop database Tickets;
CREATE DATABASE IF NOT EXISTS Tickets;
USE Tickets;

drop table tickets;
CREATE TABLE IF NOT EXISTS tickets
(
    ticketId INT NOT NULL AUTO_INCREMENT,
    ticketTypeId INT NOT NULL,
    name NVARCHAR(100) NOT NULL,
    email NVARCHAR(100) NOT NULL,
    date NVARCHAR(100) NOT NULL,
    description NVARCHAR(1000) NOT NULL,
    CONSTRAINT PK_Tickets PRIMARY KEY (ticketId)  
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS tickettypes
(
    ticketTypeId INT NOT NULL AUTO_INCREMENT,
    description NVARCHAR(100) NOT NULL,
    CONSTRAINT PK_TicketTypes PRIMARY KEY (ticketTypeId)
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS users
(
    userId INT NOT NULL AUTO_INCREMENT,
    email NVARCHAR(100) NOT NULL,
    password NVARCHAR(100) NOT NULL,
    CONSTRAINT PK_Users PRIMARY KEY (userId)
)Engine=InnoDB;

INSERT INTO users
	(email, password)
VALUES 
	('user@myapp.com', '123456');

INSERT INTO tickettypes
	(description)
VALUES 
	('New User Request'),
    ('Password Reset'),
    ('Remove User'),
    ('Modify User Details');
    
select * from users;
show tables;

delete from tickets;
select * from tickets;
/* REGISTRO ALGUNOS DATOS PARA NO REGISTRAR A CADA RATO ATRAVEZ DE LA APP*/
insert into tickets(ticketTypeId, date, name, email, description) 
	values  (1, "04-Feb-2023", "Fulano", "fula@no.com", "ticket de fulano"),
			(2, "04-Feb-2023", "Fulanito", "fula@nito.com", "ticket de Fulanito"),
            (3, "04-Feb-2023", "Memgano", "Memgano@no.com", "ticket de Memgano"),
            (4, "04-Feb-2023", "Memganito", "Memganito@no.com", "ticket de Memganito"),
            (4, "04-Feb-2023", "Gachi", "Gachi@to.com", "ticket de Gachi"),
            (2, "04-Feb-2023", "Pachito", "Pachito@to.com", "ticket de Pachito"),
            (3, "04-Feb-2023", "Roberto", "Roberto@oo.com", "ticket de Roberto"),
            (1, "04-Feb-2023", "Alex", "al@ex.com", "ticket de Alex"),
            (1, "04-Feb-2023", "Maira", "mai@ra.com", "ticket de Maira"),
            (1, "04-Feb-2023", "Franchu", "Franchu@uuu.com", "ticket de Franchu"),
            (1, "04-Feb-2023", "Jorgito", "Jorgito@alfajor.com", "ticket de Jorgito"),
            (1, "04-Feb-2023", "Pituso", "Pituso@galletita.com", "ticket de Pituso"),
            (1, "04-Feb-2023", "Maradona", "Maradona@pelusa.com", "ticket de el D1EG0"),
            (1, "04-Feb-2023", "Steve", "Steve@Jobs.com", "ticket de la Apple"),
            (1, "04-Feb-2023", "Susanita", "Susanita@takata.com", "ticket de Susanita");
select * from tickets;

delete from tickets where ticketId = 3;
select * from tickets;

delete from tickettypes;
select * from tickettypes;

select * from tickets t inner join tickettypes tt where t.ticketTypeId = tt.ticketTypeId;
 
