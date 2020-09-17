# asferro-test

**Skip steps 1 and 2 if you use Docker-compose.**  
## 1. Initialize DB. 
For example:  
```sql
CREATE DATABASE asferro;
```
Where `asferro` is your database name.
## 2. Next you must to set/update configs  
**In production you must use gitignored file!*
```
web/config/db.php
```
Where you can set database name, user, password, etc.
```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=mysql;dbname=asferro',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
    // ...
];
```
## 3. Next you must to apply all migrations via command  
```
php yii migrate
```
After that you can connect to website, login via standart login/pass (`admin`:`admin`) for example and see books page.
