CREATE TABLE `user` (
    uid int(5) not null PRIMARY KEY AUTO_INCREMENT,
    name varchar(32) not null,
    email varchar(254) not null,
    pass varchar(128) not null,
    crtime int(10) not null,
    ltime int(10) not null,
    ptoken varchar(32) not null DEFAULT CURRENT_TIMESTAMP,
    hasnation int(1) not null,
    ismod int(1) not null
);

CREATE TABLE `bugs` (
    id int(5) not null PRIMARY KEY AUTO_INCREMENT,
    uid int(5) not null,
    title varchar(64) not null,
    info varchar(1024) not null,
    severity int(2) not null,
    time int(10) not null
);

CREATE TABLE `nation` (
    id int(5) not null PRIMARY KEY AUTO_INCREMENT,
    crtime int(10) not null,
    uid int(5) not null,
    name varchar(16) not null,
    capitol varchar(16) not null,
    biome int(1) not null,
    government int(1) not null,
    econ int(1) not null,
    population int(9) not null,
    tier int(10) not null
);

CREATE TABLE construct (
    name varchar(32) not null,
    email varchar(254) not null,
    pass varchar(128) not null,
    crtime int(10) not null,
    ltime int(10) not null,
    ptoken varchar(32) not null DEFAULT CURRENT_TIMESTAMP,
    hasnation int(1) not null,
    ismod int(1) not null
);

CREATE TABLE facref (
    id int(3) not null PRIMARY KEY AUTO_INCREMENT,
    name varchar(32) not null,
    cost text not null,
    input text not null, 
    output text not null, 
    maxlvl int(2) not null,
    icon text not null
);

CREATE TABLE resref (
    id int(3) not null PRIMARY KEY AUTO_INCREMENT,
    name varchar(32) not null,
    icon text not null
);
