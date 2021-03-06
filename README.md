# RESTful API for Online Store

RESTful API for adding/searching/deleting/editing products in Online Store

### Setup Instructions

* `git`, `php`, `mysql` and `composer` are required as prerequisites.
* clone the repository in a folder, use

```
git clone https://github.com/SanjoliJain/Online-Store.git
```

* change directory to the project directory

```
cd Online-Store
```

* run command to dump the mysql database

```
mysql -u<your-username> -p<your-password> < sql/dump.sql
```

* run composer autoloader command to autoload classes

```
composer dump-autoload
```

* replace database configurations in `config/database.php` file
* run command to start the server on localhost listening to 8000 port

```
php -S localhost:8000 index.php
```


### List of RestfulAPI methods


| paths | params | header | methods | description  | response
|---|---|---|---|---|---|
| `/login` | username, password | | POST | authenticate user | {"status":true,"message":"Logged In Successfully","token":"cd23ec6b7e093127ede983ffca9f8aef4b709b7d"}|
| `/products`  | | token | GET | lists all the items | {"products":[{"productId":"1","productName":"Nutella Jar","price":"1000"},{"productId":"5","productName":"Green Tea  Honey","price":"500"}]}
| `/products/{id}` | productId | token | GET | shows details of item of given itemId | {"product":{"productName":"Green Tea  Honey","price":"500","productId":"4"}} |
| `/products` | price, productName | token | POST | adds a new item | {"product":{"productName":"Green Tea  Honey","price":"500","productId":"4"}} |
| `/products/{id}` | productId | token | POST | updates existing details of item |  {"product":{"productId":"2","productName":"Nutella Jar BIG","price":"1200"}} |
| `/products/{id}` | productId | token | DELETE | deletes a specific item | { "status": true } |

Notes :
* Users log in through /login route with username and password as parameters which returns a token in response.
The username and md5(password) are stored in users table at backend. 
Try to login by username=demo and password=demo .(Alraedy saved in users table). To add new users , username and md5(password) have to added in users table manually.
* For further add/edit/search/delete operations the user must send the generated token in header.

Database :
* Users table : Stores users details
* Products : Stores Products
* Token table: Stores latest token for userId


