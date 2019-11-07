CREATE TABLE kunder (
		kundenr int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		fornavn varchar(20),
		etternavn varchar (30),
      	adresse varchar(50),
        postnr int(4),
		poststed varchar (20),
        land varchar (20),
		telefon int(8),
        mobiltelfon int(8),
		epost varchar(50),
        kundetype int(2),
        poengsaldo int(6)
    );

	CREATE TABLE biler (
		id int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        bilnavn varchar(50),
        bilklasse int(3),
        antallseter int(2),
		litenbagasje int(1),
		storbagasje int(1),
		transmisjon varchar(10),
		aircondition tinyint(1),
		gps tinyint(1),
		dorer int(1),
		poslat float(10,6),
		poslong float (10,6)
    );

	CREATE TABLE bilklasse (
		bilklasse int(3) NOT NULL PRIMARY KEY,
        klassenavn varchar(20),
        beskrivelse varchar(100)
    );

	CREATE TABLE pris (
		bilklasse int(3) NOT NULL PRIMARY KEY,
        pris_ukedag int(4),
        pris_helg int (4),
		pris_hoytid int (4),
		pris_tibud int(4)
    );

 CREATE TABLE bilbestilling (
		bestillingsnr int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		kundenr int(6),
		bilid int(6),
        ordredato datetime,
		fra datetime,
        til datetime,
        merknad varchar(200)
    );

CREATE TABLE bilklubbnyheter (
		id int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        tittel varchar(30),
        ingress varchar(100),
		tekst text,
		bildelink varchar (100),
		synligfra date,
		synligtil date,
		publisert date
    );



CREATE TABLE leverandor (
		leverandorid int(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		navn varchar(50),
		adresse varchar(50),
        postnr int(4),
		telefon int(8),
        mobiltelfon int(8),
		epost varchar(50),
        merknad varchar(200)
    );


CREATE TABLE ansatte (
		ansattnr int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        ansattdato date,
        stilling int(2),
        fornavn varchar(50),
        etternavn varchar(50),
		adresse varchar(50),
        postnr int(4),
        bursdag date,
		telefon int(8),
        mobiltelfon int(8),
		epost varchar(50),
        merknad varchar(200),
        brukernavn varchar(20),
        passord varchar(30)
    );

CREATE TABLE kundetype (
		kundetype int(3) NOT NULL PRIMARY KEY,
        kundenavn varchar(20),
        beskrivelse varchar(30)
    );

CREATE TABLE stilling (
		stillingstype int(3) NOT NULL PRIMARY KEY,
        stillingsnavnnavn varchar(20),
        beskrivelse varchar(30)
    );

CREATE TABLE postnr (
		postnr int(4) NOT NULL PRIMARY KEY,
        poststed varchar(20)
    );

 CREATE TABLE ordre (
		ordrenr int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		type varchar(50),
		kundenr varchar(50),
        ordredato date,
		ansattnr varchar(6),
        forsendelsestype varchar(20),
        merkander varchar(50),
        status varchar(20),
        sendtdato date
    );

CREATE TABLE ordrelinjer (
		ordrenr int(6) NOT NULL,
		vareid int(6) NOT NULL,
		kursid varchar(50),
        pris decimal(6,2),
        antall int(5),
        rabatt int(3),
        PRIMARY KEY(ordrenr,vareid)
    );

CREATE TABLE varer (
		vareid int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        varenr int(6),
        varenavn varchar(50),
        varegruppe int(3),
        varetype varchar(20),
        serienr varchar(30),
        lokasjon varchar(30),
        lagerbeholdning int(4),
        minimumslager int(4),
        maksimumslager int(4),
        innkjopspris decimal(6,2),
        utsalgspris decimal(6,2),
        vareprodusent varchar(30),
        pakkelengde int(4),
        pakkebredde int(4),
        pakkehoyde int(4),
        vekt decimal(2,2),
        merknad varchar(50),
        bildelink varchar(50),
        inndato date,
        utdato date
    );

 CREATE TABLE varegruppe (
	   varegruppe int(3) NOT NULL PRIMARY KEY,
        navn varchar(20),
        beskrivelse varchar(30)
    );