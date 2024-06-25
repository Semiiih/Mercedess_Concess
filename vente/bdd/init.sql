drop database if exists vente;

create database vente;

use vente;


CREATE TABLE
    produit (
        id integer not null,
        libelle varchar(256) not null,
        description varchar(1000),
        prix float not null,
        stock integer,
        image varchar(256),
        inBasket integer,
        constraint pk_products primary key (id)
);
    

insert into
    products (id, label, prix, stock, image, inBasket)
values
    (
        1,
        "AMG GT63 S",
        214 855. 00,
        10,
        "https://i.redd.it/rafale-design-for-the-nato-tiger-meet-2024-v0-4pa8cid7e44d1.jpg?width=1590&format=pjpg&auto=webp&s=7052f4fa81423619f778b021e7e0b46c754ed068",
        13
    ),
    (
        2,
        "G63 AMG avec Edition 1",
        275 893. 75,
        22,
        "https://www.avionslegendaires.net/wp-content/uploads/2022/05/Rafale-Rogue-Spartan-AdlAE-sujet_AdlAE.jpg",
        10
    );

select
    *
from
    products;