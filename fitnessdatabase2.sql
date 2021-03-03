drop database if exists FitnessDatabase2;
create database FitnessDatabase2 character set utf8mb4;
use FitnessDatabase2;


create table Klijent(
    sifra int not null primary key auto_increment,
    ime varchar(20) not null,
    prezime varchar(20) not null,
    Email varchar(30) not null,
    lozinka char(60) not null,
    Spol char(1) ,
    Dob int(2) ,
    Visina int(3) ,
    Masa int(3) ,
    Kontakt varchar(24),
    BrojTjednihTreninga int(1) ,
    Prehrana int , 
    Trener int
 
);

create table Trener(
    sifra int not null primary key auto_increment ,
    Ime varchar(20) not null,
    Prezime varchar(20) not null,
    Spol char(1) not null,
    Iskustvo varchar(20) not null,
    BrojKlijenata int,
    Vrsta varchar(20) not null,
    Email varchar(30) not null,
    SocialMedia varchar(100),
    FitnessCompany int
);

create table Trening(
    sifra int not null primary key auto_increment ,
    Naziv varchar(20) not null,
    Trajanje varchar(20) not null,
    Odmor varchar(20) not null,
    BrojPonavljanja varchar(15) not null,
    TjednihTreninga int(5)not null,
    Datum datetime,
    Trener int ,
    Klijent int 
);


create table FitnessCompany(
    sifra int not null primary key auto_increment,
    Naziv varchar(30) not null,
    Osnutak datetime,
    BrojTrenera int,
    Opis text ,
    Kontakt varchar(30)not null,
    Drzava varchar(15)
);

create table Prehrana(
    sifra int not null primary key auto_increment,
    Vrsta varchar(30) not null,
    TjedniTroskovi decimal(10,2)
   );
  
create table Operater(
    sifra int not null primary key auto_increment,
    Email varchar(50) not null,
    lozinka char(60) not null,
    Ime varchar(50) not null,
    Prezime varchar(50) not null,
    Uloga varchar(10) not null
);





alter table Klijent add foreign key(Prehrana) references Prehrana(sifra);
alter table Trener add foreign key(FitnessCompany) references FitnessCompany(sifra);
alter table Trening add foreign key(Klijent) references Klijent(sifra);
alter table Klijent add foreign key(Trener) references Trener(sifra);
alter table Trening add foreign key(Trener) references Trener(sifra);


insert into FitnessCompany(sifra,Naziv,Osnutak,BrojTrenera,Kontakt,Drzava)
values (null,'5%Nutrition','2015-06-09','1350','5percentbusiness@gmail.com','USA'),(null,'RogueFitness','2017-07-07','2200','roguebusiness@gmail.com','USA'),
(null,'Proteka','2014-06-19','132','protekabusiness@gmail.com','Hrvatska');

insert into trener(sifra,Ime,Prezime,Spol,Iskustvo,BrojKlijenata,Vrsta,Email,FitnessCompany)
values (null,'Richard','Piana','M','25godina','150','TrenerSnage','richpiana@gmail.com',1),
(null,'Jeff','Cavaliere','M','20godina','95','KondicijskiTrener','jeffcav@gmail.com',2),(null,'Eva','Rusan','Ž','15godina','15','KondicijskiTrener','evarusan@gmail.com',3)
,(null,'Petar','Stipić','M','8godina','13','TrenerSnage','stipic@gmail.com',3),(null,'Oleksii','Novikov','M','5godina','25','Strongman','onovikov@gmail.com',2)
,(null,'Filip','Horvat','M','5godina','7','ClassicPhiTrener','filiph@gmail.com',1);




insert into klijent(sifra,ime,prezime,Email,lozinka,Spol,Dob,Visina,Masa,BrojTjednihTreninga,Trener)
values(null,'Tin','Jeger','jegertin@gmail.com','$2y$12$lR.g1de/nAAjOMwL2vrzNeF0lFpsjN5aFPd9nHchNr6WtA0vjyQxK','M','22','180','75','5',4),(null,'Valentin','Mikić','tinomikic@gmail.com','$2y$12$Q5cYxv.pKEeP0zjGFzLfJOq/Q0LzD4qjV3QQOJxLoXepx4ANNNk/G','M','24','183','90','5',1),(null,'Marin','Amidžić','marinamidzic@gmail.com','$2y$12$mRxSI5MX.nMdQMSkPlmcoe64E1JM7Mvdss6EVz5u9e.zEuuP/I9n6','M','24','179','83','7',5);

select * from fitnesscompany;
select * from trening;
select * from klijent;
select * from trener;





select * from trener;
select * from trening;
select * from klijent;
insert into trening(sifra,Naziv,Trajanje,Odmor,BrojPonavljanja,TjednihTreninga,Trener,Klijent)
values(null,'TreningPrsa','2h','4min','4-8','2',1,3),(null,'TreningLeda','2h','4min','8-12','2',1,3)
,(null,'TreningNoge','1h','2min','10-12','1',1,3),(null,'TreningRuke','1.5h','1.5min','12-16','1',1,3),
(null,'Weakside','WeaksideH','WeaksideMIN','WeaksideREPS','1',1,3);
insert into trening(sifra,Naziv,Trajanje,Odmor,BrojPonavljanja,TjednihTreninga,Trener,Klijent)
values (null,'TreningPrsa','1.5h','1min','12-14','1',4,1);

select a.naziv , a.TjednihTreninga 
from trening a inner join klijent b on a.klijent=b.sifra where b.sifra=3;