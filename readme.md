1. Console `composer install`

2. Create `config.php` as `config.example.php`

3. Create table `users`

`CREATE TABLE users
 (
   id          INT AUTO_INCREMENT
     PRIMARY KEY,
   login       VARCHAR(100) NULL,
   password    VARCHAR(255) NULL,
   name        TEXT         NULL,
   age         DATE         NULL,
   description LONGTEXT     NULL,
   photo       VARCHAR(100) NULL,
   CONSTRAINT users_login_uindex
   UNIQUE (login)
 );
`

or use `dump_users.sql`

Задание #2
dz07.loftschool\libs\Eloquent\migration.php