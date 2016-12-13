create database felizardo;
\c felizardo

drop table orderdetails;
drop table pokemons;
drop table orders;

create table pokemons (
	id varchar(3) not null,
	name varchar(50) not null,
	type varchar(50) not null,
	description text not null,
	priceEach decimal not null,
	stock integer not null,
	primary key (id)
);

create table orderdetails (
	orderNumber varchar(50) not null,
	orderDate timestamp not null,
	pokemonid varchar(3) not null,
	quantity integer not null,
	priceEach decimal not null,
	primary key (orderNumber)
);

create table orders (
	orderNumber varchar(50) not null,
	customerid varchar(50) not null,
	total decimal not null,
	paidStatus boolean not null,
	primary key (orderNumber)
);