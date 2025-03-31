CREATE TABLE registre_clases (
    id_clase int NOT NULL AUTO_INCREMENT,
    dia date NOT NULL,
    temps time,
    desplaçament time default "00:00:00",
    cafe bit default 0,
    nom_profe varchar(255),
    nom_alumne varchar(255),
    comentari varchar(255) default "",
    data_registre timestamp DEFAULT CURRENT_TIMESTAMP,
    pagada_by_client bit DEFAULT 0,
    pagada_to_profe bit DEFAULT 0,
    PRIMARY KEY (id_clase)
); 

CREATE TABLE aprofe_conexions (
    id_conexio int NOT NULL AUTO_INCREMENT,
    profe varchar(255),
    alumne varchar(255),
    materia varchar(255) DEFAULT "",
    comentari varchar(255) DEFAULT "",
    data_registre timestamp DEFAULT CURRENT_TIMESTAMP,
    data_inici date NOT NULL,
    data_fi date default "0001-01-01",
    PRIMARY KEY (id_conexio)
); 

CREATE TABLE apagador_conexions (
    id_conexio int NOT NULL AUTO_INCREMENT,
    pagador varchar(255),
    alumne varchar(255),
    parentesc varchar(255) DEFAULT "",
    comentari varchar(255) DEFAULT "",
    data_registre timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_conexio)
); 

CREATE TABLE pagaments_clases (
    id_pago int NOT NULL AUTO_INCREMENT,
    diners int NOT NULL,
    hores time,
    nom_pagador varchar(255) DEFAULT "desconegut",    
    nom_profe varchar(255),
    nom_alumne varchar(255),
    codi varchar(255),
    comentari varchar(255),
    viatges int,
    cafes int, 
    data_registre timestamp DEFAULT CURRENT_TIMESTAMP,
    pag_rebut bit DEFAULT 0,
    PRIMARY KEY (id_pago)
); 

CREATE TABLE profes (
    id_profes int NOT NULL AUTO_INCREMENT,
    acronim varchar(255),
    nom varchar(255),
    telefon varchar(15),
    email varchar(255),
    adreça varchar(255),
    data_inici date NOT NULL,
    data_registre timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_profes)
);

CREATE TABLE alumnes (
    id_alumne int NOT NULL AUTO_INCREMENT,
    acronim varchar(255),
    nom varchar(255),
    telefon varchar(15),
    email varchar(255),
    adreça varchar(255),
    data_inici date NOT NULL,
    data_registre timestamp DEFAULT CURRENT_TIMESTAMP,
    paga_hora int DEFAULT 0,
    profe_hora int DEFAULT 0,
    PRIMARY KEY (id_alumne)
);

CREATE TABLE pagadors (
    id_pagador int NOT NULL AUTO_INCREMENT,
    acronim varchar(255),
    nom varchar(255),
    telefon varchar(15),
    email varchar(255),
    data_inici date NOT NULL,
    data_registre timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_pagador)
);

CREATE TABLE pagadors (
    id_pagador int NOT NULL AUTO_INCREMENT,
    acronim varchar(255),
    nom varchar(255),
    telefon varchar(15),
    email varchar(255),
    data_inici date NOT NULL,
    data_registre timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_pagador)
);

CREATE TABLE disponibilitat (
    id_dispo int NOT NULL AUTO_INCREMENT,
    acronim varchar(255),
    horari varchar(3000),
    data_inici date NOT NULL,
    data_caducitat date NOT NULL,
    data_creacio timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_dispo)
);

CREATE TABLE conceptes (
    id_concepte int NOT NULL AUTO_INCREMENT,
    acronim varchar(255),
    concepte varchar(255),
    descripció varchar(255),
    data_creacio timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_concepte)
);

CREATE TABLE dependencies_conceptes ( 
/* tot concepte global depen d'uns conceptes específics */
    id_dep_concepte int NOT NULL AUTO_INCREMENT,
    conc_global varchar(255),
    conc_especific varchar(255),
    descripció varchar(255),
    data_creacio timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_dep_concepte)
);

CREATE TABLE materies ( /* pot ser matemàtiques 1r eso, mates 2n batxillerat e
i això te conjunts de conceptes, en aquesta taula només es llisten les matèries */
    id_materia int NOT NULL AUTO_INCREMENT,
    materia varchar(255),
    descripció varchar(255),
    data_creacio timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_materia)
);

CREATE TABLE nivells ( /* 1r eso, 2n eso, 2n batx */
    id_nivell int NOT NULL AUTO_INCREMENT,
    nivell varchar(255),
    descripció varchar(255),
    data_creacio timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_nivell)
);

CREATE TABLE continguts_per_materia ( /* cada fila es un concepte contingut en
una metèria en concret */
    id_contingut int NOT NULL AUTO_INCREMENT,
    materia varchar(255),
    concepte varchar(255),
    descripció varchar(255),
    data_creacio timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_contingut)
);

