Use OpenServer and MySQL to start project.


```
CREATE DATABASE todo;
USE todo;
CREATE TABLE tasks (
  id INT NOT NULL AUTO_INCREMENT,
  tasks VARCHAR(100) NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX id_UNIQUE (id ASC) VISIBLE);
```
