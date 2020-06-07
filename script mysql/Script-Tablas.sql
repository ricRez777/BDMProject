create database NoticiasDB;

use noticiasdb;

create table UserT(
	id_Use int auto_increment primary key,
    type_use varchar(50),
    email varchar(100),
    pass varchar(300),
    nameComplete varchar(100),
    phone varchar(20),
    profilePicture blob,
    activo bit(1)
);
alter table UserT add firm varchar(100);
ALTER TABLE usert CHANGE profilePicture profilePicture longblob;

create table SectionT(
	id_Section int auto_increment primary key,
    nameSection varchar(100),
    color varchar(20),
    activo bit(1)
);
alter table SectionT add main bit(1);

create table NewsT(
	id_News int auto_increment primary key,
    title varchar(200),
    descriptionNews varchar(250),
    textNews varchar(1000),
    eventDate datetime,
    publicationDate date,
    location varchar(100),
    keywords varchar(200),
    statusNews varchar(30),
    id_Section int,
    id_Use int,
    constraint FK_Section_idSection
    Foreign Key (id_Section)
    references SectionT(id_Section),
    constraint FK_User_idUse
    Foreign Key (id_Use)
    references UserT(id_Use)
);
ALTER TABLE NewsT CHANGE activo activo bit(1);
ALTER TABLE NewsT CHANGE front front bit(1);

create table ImageT(
	id_image int auto_increment primary key,
    image blob,
    cover bit(1),
    id_News int,
    constraint FK_News_idNews
    Foreign Key (id_News)
    references NewsT(id_News)
);
ALTER TABLE imaget ADD activo bit(11);
ALTER TABLE imaget CHANGE image image varchar(250);
describe imaget;

create table VideoT(
	id_video int auto_increment primary key,
    video mediumblob,
    cover bit(1),
    activo bit(1),
    id_News int,
    constraint FK_News_idNewsVideo
    foreign key (id_News)
    references NewsT(id_News)
);
ALTER TABLE videoT CHANGE video video varchar(250);

create table LikeT(
	id_like int auto_increment primary key,
    status_like bit(1),
    id_Use int,
    id_News int,
    constraint FK_idUse_isLike_Use
    Foreign Key (id_Use)
    references usert (id_Use),
    constraint FK_idNews_isLike_Use
    Foreign Key (id_News)
    references newst (id_News)
);

create table commentaryT(
	id_commentary int auto_increment primary key,
    commentary varchar(250),
    id_Use int,
    id_News int,
    id_Reply int,
    constraint FK_idUse_commentary_Use
    Foreign Key (id_Use)
    references usert (id_Use),
    constraint FK_idNews_commentary_Use
    Foreign Key (id_News)
    references newst (id_News),
    constraint FK_idReply_commentary_Use
    Foreign Key (id_Reply)
    references commentaryT (id_commentary)
);






