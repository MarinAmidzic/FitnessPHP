drop database if exists FitnessDatabase2;
create database FitnessDatabase2 character set utf8mb4;
use FitnessDatabase2;

# alter database cesar_pp22 default character set utf8mb4;


create table Klijent(
    sifra int not null primary key auto_increment,
    ime varchar(20) not null,
    prezime varchar(20) not null,
    email varchar(30) not null,
    lozinka char(60) not null,
    spol char(1) ,
    dob int(2) ,
    visina int(3) ,
    masa int(3) ,
    kontakt varchar(24),
    adresa varchar(50) ,
    prehrana int , 
    uloga varchar(15),
    cilj varchar(40),
    trener int
 
);

create table Trener(
    sifra int not null primary key auto_increment ,
    ime varchar(20) not null,
    prezime varchar(20) not null,
    spol char(1) not null,
    iskustvo varchar(20) not null,
    brojKlijenata int,
    vrsta varchar(20) not null,
    email varchar(30) not null,
    socialMedia varchar(100),
    fitnessCompany int
);

create table Trening(
    sifra int not null primary key auto_increment ,
    naziv varchar(20) not null,
    trajanje varchar(20) not null,
    odmor varchar(20) not null,
    brojPonavljanja varchar(15) not null,
    tjednihTreninga int(5)not null,
    datum datetime,
    trener int ,
    klijent int 
);







alter table Trening add foreign key(Klijent) references Klijent(sifra);
alter table Klijent add foreign key(Trener) references Trener(sifra);
alter table Trening add foreign key(Trener) references Trener(sifra);




insert into Trener(sifra,ime,prezime,spol,iskustvo,brojKlijenata,vrsta,email)
values (null,'Richard','Piana','M','25godina','150','TrenerSnage','richpiana@gmail.com'),
(null,'Jeff','Cavaliere','M','20godina','95','KondicijskiTrener','jeffcav@gmail.com')
,(null,'Oleksii','Novikov','M','5godina','25','Strongman','onovikov@gmail.com')
,(null,'Filip','Horvat','M','5godina','7','ClassicPhiTrener','filiph@gmail.com');




insert into Klijent(sifra,ime,prezime,email,lozinka,spol,dob,visina,masa,adresa,trener,uloga)
values(null,'Tin','Jeger','jegertin@gmail.com','$2y$12$lR.g1de/nAAjOMwL2vrzNeF0lFpsjN5aFPd9nHchNr6WtA0vjyQxK','M','22','180','75','nebitnotrenutno',4,'Klijent'),
(null,'Valentin','Mikić','tinomikic@gmail.com','$2y$12$Q5cYxv.pKEeP0zjGFzLfJOq/Q0LzD4qjV3QQOJxLoXepx4ANNNk/G','M','24','183','90','nebitnotrenutno',1,'Klijent'),
(null,'Marin','Amidžić','marinamidzic@gmail.com','$2y$12$mRxSI5MX.nMdQMSkPlmcoe64E1JM7Mvdss6EVz5u9e.zEuuP/I9n6','M','24','179','83','Vukovarska 76 , 31000 Osijek',1,'Admin');


insert into Trening(sifra,naziv,trajanje,odmor,brojPonavljanja,tjednihTreninga,trener,klijent)
values(null,'TreningPrsa','2h','4min','4-8','2',1,3),(null,'TreningLeda','2h','4min','8-12','2',1,3)
,(null,'TreningNoge','1h','2min','10-12','1',1,3),(null,'TreningRuke','1.5h','1.5min','12-16','1',1,3),
(null,'Weakside','WeaksideH','WeaksideMIN','WeaksideREPS','1',1,3);
insert into Trening(sifra,naziv,trajanje,odmor,brojPonavljanja,tjednihTreninga,trener,klijent)
values (null,'TreningPrsa','1.5h','1min','12-14','1',4,1);



update Klijent set kontakt = '0911828535' where sifra=3 ;
update Klijent set cilj = '100 kg' where sifra=3;

delete  from trener where sifra=6;

select * from trener;



