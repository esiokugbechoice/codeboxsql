# a3pay-php
PHP library for a3Pay


## Requirements
 * PHP ^7.3


## Installation
To install with composer run the following command

    composer require a3pay/php


## Usage
```php

//Autoload classes using composer
require_once 'vendor/autoload.php';
//OR
//Include the classes directly from path
require_once 'vendor/a3pay/php/dist/payments.php';

//mysqli USAGE
//INSERT
$mysqli->insertInto('tableOne',array('name' => 'lolo' , 'deg' => '100')); //return string
//SELECT
//Single Select
$mysqli->singleSelect('accounts',array('id' => '60' , 'mobile' => '+2348023775657'), 'fetch', array('ORDER BY' => 'rand()' , 'LIMIT' => '3')); //return array
$mysqli->singleSelect('accounts',array('id' => '60' , 'mobile' => '+2348023775657'), 'count', array('ORDER BY' => 'rand()' , 'LIMIT' => '3')); //return string
//multi Select
$mysqli->multiSelect(array('accounts' => 'a' , 'bvn' => 'b'),array('a.id' => '60' , 'b.usrID' => '60'), 'fetch', array('ORDER BY' => 'rand()' , 'LIMIT' => '3'));// return array
//$mysqli->multiSelect(array('accounts' => 'a' , 'bvn' => 'b'),array('a.id' => '60' , 'b.usrID' => '60'), 'count', array('ORDER BY' => 'rand()' , 'LIMIT' => '3')); //return string

```


## Examples
Look to the scripts in the `/examples` directory in your browser. You will have to change the api_key and token in the example files to your own.


## Contributing
If you encounter a bug or have a suggestion to help improve this liobrary for others, you are welcome to open a Github issue on this repository and it will be reviewed by our development team.


## License
MIT - see LICENSE

