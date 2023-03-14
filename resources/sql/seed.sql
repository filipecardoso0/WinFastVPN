create schema if not exists winfastvpn;

DROP TABLE IF EXISTS users CASCADE;
DROP TABLE IF EXISTS products CASCADE;
DROP TABLE IF EXISTS vouchers CASCADE;
DROP TABLE IF EXISTS transactions CASCADE;

CREATE TABLE users (
   id SERIAL PRIMARY KEY,
   email VARCHAR UNIQUE NOT NULL,
   password VARCHAR NOT NULL
);

CREATE TABLE products (
    id SERIAL PRIMARY KEY,
    name TEXT UNIQUE NOT NULL,
    price INTEGER NOT NULL,
    discount NUMERIC(3,2) CONSTRAINT discount_ck CHECK (((discount >= 0) AND (discount <= 1))),
    durationdays INTEGER NOT NULL
);

CREATE TABLE vouchers(
    id SERIAL PRIMARY KEY,
    userid INTEGER NOT NULL REFERENCES users(id) ON UPDATE CASCADE,
    code TEXT UNIQUE NOT NULL
);

CREATE TABLE transactions (
    id SERIAL PRIMARY KEY,
    userid INTEGER NOT NULL REFERENCES users(id) ON UPDATE CASCADE,
    productid INTEGER NOT NULL REFERENCES products(id) ON UPDATE CASCADE,
    transactiondate TIMESTAMP WITH TIME ZONE DEFAULT now() NOT NULL,
    voucherid INTEGER DEFAULT NULL REFERENCES vouchers(id) ON UPDATE CASCADE
);

/* POPULATE USERS TABLE */
INSERT INTO users(email, password) VALUES ('teste@teste.com', '$2a$12$ht5y.xR8KX3.R.BgMmrrfeyf9qZbNuIBWI6Ac2f3wGbrSZiyY6igq');

/* POPULATE PRODUCTS TABLE */
INSERT INTO products VALUES(1, '1 Month', 5, 0, 30);
INSERT INTO products VALUES(2, '6 Months', 25, 0, 180);
INSERT INTO products VALUES(3, '1 Year', 40, 0, 366);

/* POPULATE VOUCHERS TABLE */
INSERT INTO vouchers(userid, code) VALUES(1, 'teste');
