-- create a db and add below table.
CREATE TABLE `todo` ( `id` INT NOT NULL AUTO_INCREMENT , `value` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

-- optionally create a user specific for this db (db name: todo)
CREATE USER 'todo'@'localhost' IDENTIFIED WITH mysql_native_password AS '***';
GRANT USAGE ON *.* TO 'todo'@'localhost' REQUIRE NONE WITH
                                        MAX_QUERIES_PER_HOUR 0
                                        MAX_CONNECTIONS_PER_HOUR 0
                                        MAX_UPDATES_PER_HOUR 0
                                        MAX_USER_CONNECTIONS 0;
GRANT ALL PRIVILEGES ON `todo`.* TO 'todo'@'localhost';