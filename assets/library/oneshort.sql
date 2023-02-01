CREATE DATABASE demo;

CREATE TABLE users(
    id bigint PRIMARY KEY NOT null,
    username varchar(255) NOT null,
    email varchar(255) NOT null,
    passwords varchar(255) NOT null,
    contact varchar(255) NOT null,
    verification_code boolean default 0,
    register_date datetime default now(),
    remarks varchar(255) 
);

CREATE TABLE verification_email(
    id bigint PRIMARY KEY NOT null,
    email bigint NOT NULL,
    verification_code varchar(255) NOT null,
    code_used boolean NOT NULL,
    remarks varchar(255)
);