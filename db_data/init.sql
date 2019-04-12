CREATE SCHEMA SplitBuddy;

USE SplitBuddy;

CREATE TABLE `User` (
	userID INT AUTO_INCREMENT,
	vname NVARCHAR(255),
	nname NVARCHAR (255),
	username NVARCHAR (255),
	passwort NVARCHAR (255),
	PRIMARY KEY (userID)
);

CREATE TABLE GruppenProjekt(
	projektID INT AUTO_INCREMENT,
	titel NVARCHAR(255),
	anmerkung NVARCHAR(4000),
	anzahl INT,
	typ INT,
	sortierkriterium INT,
	blacklisting BIT,
	userID INT,
	FOREIGN KEY (userID) REFERENCES `User` (userID),
	PRIMARY KEY (projektID)
);

CREATE TABLE Gruppen(
	gruppenID INT AUTO_INCREMENT,
	gruppenname NVARCHAR(255),
	projektID INT,
	FOREIGN KEY (projektID) REFERENCES GruppenProjekt (projektID),
	PRIMARY KEY (gruppenID)
);

CREATE TABLE Geschlecht(
	geschlechtID INT AUTO_INCREMENT,
	geschlecht NVARCHAR (20),
	kuerzel NVARCHAR (1),
	PRIMARY KEY (geschlechtID)
);

CREATE TABLE Teilnehmer(
	teilnehmerID INT AUTO_INCREMENT,
	vname NVARCHAR(255),
	nname NVARCHAR(255),
	gebdate DATE,
	mail NVARCHAR (255),
	gruppenID INT,
	projektID INT,
	geschlechtID INT,
	FOREIGN KEY (projektID) REFERENCES Gruppenprojekt (projektID),
	FOREIGN KEY (gruppenID) REFERENCES Gruppen (gruppenID),
	FOREIGN KEY (geschlechtID) REFERENCES Geschlecht (geschlechtID),
	PRIMARY KEY (teilnehmerID)
);

CREATE TABLE BlacklistItem(
	blacklistID INT AUTO_INCREMENT, 
	projektID INT,
	teilnehmerEins INT,
	teilnehmerZwei INT,
	FOREIGN KEY (projektID) REFERENCES Gruppenprojekt (projektID),
	FOREIGN KEY (teilnehmerEins) REFERENCES Teilnehmer (teilnehmerID),
	FOREIGN KEY (teilnehmerZwei) REFERENCES Teilnehmer (teilnehmerID),
	PRIMARY KEY (blacklistID)
);




