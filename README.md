
# doctrine-embeddables-in-embeddables

Person -> FullName -> Name => into people(id, first_name, last_name, middle_name)


## First create DB

```
vendor/bin/doctrine orm:schema-tool:drop --force; vendor/bin/doctrine orm:schema-tool:update --force --dump-sql

Dropping database schema...

                                                                                                                        
 [OK] Database schema dropped successfully!                                                                             
                                                                                                                        


 The following SQL statements will be executed:

     CREATE TABLE people (id INTEGER NOT NULL, birth_date DATE NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, middle_name VARCHAR(255) NOT NULL, PRIMARY KEY(id));

 Updating database schema...

     1 query was executed

                                                                                                                        
 [OK] Database schema updated successfully!                                                                             
```

## Then add some person

```
./create.php

object(Person)#24 (3) {
  ["id":"Person":private]=>
  int(1)
  ["fullName":"Person":private]=>
  object(FullName)#25 (3) {
    ["first":"FullName":private]=>
    object(Name)#26 (1) {
      ["name":"Name":private]=>
      string(18) "Александр"
    }
    ["middle":"FullName":private]=>
    object(Name)#27 (1) {
      ["name":"Name":private]=>
      string(18) "Сергеевич"
    }
    ["last":"FullName":private]=>
    object(Name)#28 (1) {
      ["name":"Name":private]=>
      string(18) "Устименко"
    }
  }
  ["birthDate":"Person":private]=>
  object(DateTime)#29 (3) {
    ["date"]=>
    string(26) "1983-01-05 00:00:00.000000"
    ["timezone_type"]=>
    int(3)
    ["timezone"]=>
    string(16) "Asia/Krasnoyarsk"
  }
}
```

## And finally list em

Using `__toString` on main entity and embedded value objects we now have tree-like structure stored in single table.

```
 ./list.php 
- Person named Александр Сергеевич Устименко, born at 1983-01-05
```
