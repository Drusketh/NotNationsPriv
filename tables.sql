CREATE TABLE user (
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

CREATE TABLE bugs (
    id int(5) not null PRIMARY KEY AUTO_INCREMENT,
    uid int(5) not null,
    title varchar(64) not null,
    info varchar(1024) not null,
    severity int(2) not null,
    time int(10) not null
);

CREATE TABLE nation (
    id int(5) not null PRIMARY KEY AUTO_INCREMENT,
    uid int(5) not null,
    name varchar(16) not null,
    capitol varchar(16) not null,
    biome int(1) not null,
    government int(1) not null,
    crtime int(10) not null,
    population int(9) not null,
    tier int(10) not null
);

CREATE TABLE `resources` (
  `id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `uid` int(5) NOT NULL,
  `money` int(9) NOT NULL DEFAULT 0,
  `food` int(9) NOT NULL DEFAULT 0,
  `power` int(9) NOT NULL DEFAULT 0,
  `bm` int(9) NOT NULL DEFAULT 0,
  `cg` int(9) NOT NULL DEFAULT 0,
  `metal` int(9) NOT NULL DEFAULT 0,
  `fuel` int(6) NOT NULL DEFAULT 0,
  `ammunition` int(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE factories (
    id int(5) not null PRIMARY KEY AUTO_INCREMENT,
    uid int(5) not null,
    dairy int(6) not null,
    dairyprog int(2) not null,
    dairylevel int(1) not null,
);



CREATE TABLE factest1 (
    id int(5) not null PRIMARY KEY AUTO_INCREMENT,
    a int(5) not null,
    b int(5) not null,
    c int(5) not null,
    d int(5) not null,
    e int(5) not null,
    f int(5) not null,
    g int(5) not null,
    h int(5) not null,
    i int(5) not null,
    j int(5) not null,
    k int(5) not null,
    l int(5) not null,
    m int(5) not null,
    n int(5) not null,
    o int(5) not null,
    p int(5) not null,
    r int(5) not null,
    s int(5) not null,
    t int(5) not null,
    u int(5) not null,
    v int(5) not null,
    w int(5) not null,
    x int(5) not null,
    y int(5) not null,
    z int(5) not null,
    a1 int(5) not null,
    b1 int(5) not null,
    c1 int(5) not null,
    d1 int(5) not null,
    e1 int(5) not null,
    f1 int(5) not null,
    g1 int(5) not null,
    h1 int(5) not null,
    i1 int(5) not null,
    j1 int(5) not null,
    k1 int(5) not null,
    l1 int(5) not null,
    m1 int(5) not null,
    n1 int(5) not null,
    o1 int(5) not null,
    p1 int(5) not null,
    r1 int(5) not null,
    s1 int(5) not null,
    t1 int(5) not null,
    u1 int(5) not null,
    v1 int(5) not null,
    w1 int(5) not null,
    x1 int(5) not null,
    y1 int(5) not null,
    z1 int(5) not null,
    a2 int(5) not null,
    b2 int(5) not null,
    c2 int(5) not null,
    d2 int(5) not null,
    e2 int(5) not null,
    f2 int(5) not null,
    g2 int(5) not null,
    h2 int(5) not null,
    i2 int(5) not null,
    j2 int(5) not null,
    k2 int(5) not null,
    l2 int(5) not null,
    m2 int(5) not null,
    n2 int(5) not null,
    o2 int(5) not null,
    p2 int(5) not null,
    r2 int(5) not null,
    s2 int(5) not null,
    t2 int(5) not null,
    u2 int(5) not null,
    v2 int(5) not null,
    w2 int(5) not null,
    x2 int(5) not null,
    y2 int(5) not null,
    z2 int(5) not null,
);

INSERT INTO fac (factory_id, player_id, name, cost) VALUES (1, 3, "testfac", "1 dabloon");