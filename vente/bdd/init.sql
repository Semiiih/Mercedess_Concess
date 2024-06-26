drop database if exists vente;

create database vente;

use vente;


CREATE TABLE
    produit (
        id integer not null,
        libelle varchar(256) not null,
        prix float not null,
        stock integer,
        image varchar(256),
        inBasket integer,
        power varchar(256),
        engine varchar(256),
        constraint pk_products primary key (id)
);
    

insert into
    produit (id, libelle, prix, stock, image, inBasket ,power, engine )
values
    (
        1,
        "AMG GT63 S",
        214855.00,
        10,
        "./images/amgGt63s.jpg",
        0,
        '577 ch',
        'V8 de 4,0 L'
    ),
    (
        2,
        "G63 AMG avec Edition 1",
        275893.75,
        22,
        "./images/amgClasseG63.jpeg",
        0,
        '585 ch',
        'V8 de 4,0 L'
    ),
    (
        3,
        "Mercedes-AMG GLE 63 S 4MATIC",
        173450.00,
        0,
        "./images/gle.jpeg",
        0,
        '612 ch',
        'V8 de 5,5 L'
    );

select
    *
from
    produit;