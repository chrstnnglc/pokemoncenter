create database felizardo;
\c felizardo

drop table order_details;
drop table pokemons;
drop table orders;

create table pokemons (
	id integer not null,
	name varchar(50) not null,
	type varchar(50) not null,
	description text not null,
	priceEach decimal not null,
	stock integer not null,
	primary key (id)
);

create table orders (
	id serial not null,
	customerid integer not null,
	orderDate timestamp not null,
	total decimal not null,
	paidStatus boolean not null,
	created_at timestamp not null,
	updated_at timestamp not null,
	primary key (id)
);

create table order_details (
	order_id integer references orders(id),
	id serial not null,
	pokemonid integer not null,
	pokemonname varchar(50) not null,
	quantity integer not null,
	priceEach decimal not null,
	created_at timestamp not null,
	updated_at timestamp not null,
	primary key (id)
);