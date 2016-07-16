# Studeo
Studeo is a basic CMS built for university courses. It allows students to share news and knowledge efficiently.

# The problem
Computer Science students @ *Università degli Studi di Napoli "Federico II"* were using 
a phpbb board to share solutions to previous tests and exercises. As the number of users and solutions grew, it became hard to
properly index everything manually. So we decided to build Studeo.

# PhpBB integration and dependency
Studeo is meant to integrate with an existing phpbb board bulletin and to provide additional indexing features to said board.
Although being conceived to be used along with phpbb, Studeo will be almost completely independent from the latter, 
as it will provide indexing by link. 
Only the authentication and authorization system will initially depend on phpbb USERS table. 
Other options shall be added as the project grows. 

# Technology
Studeo is built using CakePHP, Twitter Bootstrap, JQuery, MySQL.

# Quick setup
By default Studeo will look for two MySQL databases in *localhost:3306*:

* Studeo's database.
* phpBB's database.

Connection to those can be customized in /config/app.php, by editing the following parts:
```php
'Datasources' => [
        'default' => [
            'className' => 'Cake\Database\Connection',
            'driver' => 'Cake\Database\Driver\Mysql',
            'persistent' => false,
            'host' => 'localhost',
            //'port' => 'non_standard_port_number',
            'username' => 'studeo',
            'password' => 'studeo',
            'database' => 'studeo',
            'encoding' => 'utf8',
            'timezone' => 'UTC',
            'flags' => [],
            'cacheMetadata' => true,
            'log' => false,
            'quoteIdentifiers' => false,
            //'init' => ['SET GLOBAL innodb_stats_on_metadata = 0'],
            'url' => env('DATABASE_URL', null),
        ],
    	/**
    	 * Connection to the phpbb database.
    	 */
    	'phpbb_db' => [
    		'className' => 'Cake\Database\Connection',
    		'driver' => 'Cake\Database\Driver\Mysql',
    		'persistent' => false,
    		'host' => 'localhost',
    		//'port' => 'non_standard_port_number',
    		'username' => 'phpbb',
    		'password' => 'phpbb',
    		'database' => 'phpbb',
    		'encoding' => 'utf8',
    		'timezone' => 'UTC',
    		'flags' => [],
    		'cacheMetadata' => true,
    		'log' => false,
    		'quoteIdentifiers' => false,
    		//'init' => ['SET GLOBAL innodb_stats_on_metadata = 0'],
    		'url' => env('DATABASE_URL', null),
    	],
  ```
  The /sql/studeo_db_create.sql script will build the necessary database structure.
  If one does not wish to install phpbb locally for testing purposes (recommended), it is possible to run the /sql/phpbb_user.sql script to create a users table. The default users table provides the following users:
  * username: **admin**     password: **adminadmin**
  * username: **user**      password: **useruser**
  * username: **moderator** password: **moderator**
  
**Please note:** if you installed phpbb locally as recommended, it may be necessary to update the config variable PHPBB_TABLE_PREFIX to match the prefix the instance of phpbb you want to use is using. This change can be made in /config/bootstrap.php, at the line

```php
/**
 * Set global configuration variables
 */
Configure::write('PHPBB_TABLE_PREFIX','phpbb');
```

#Contribution guidelines
Please, write comments, commit messages and variable/table/column names in English! Issues can be submitted in italian, too.
