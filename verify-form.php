<?php
require('vendor/autoload.php');

use Respect\Validation\Validator as v;

$username = $_POST['username'];

$checkValid = v::alnum()->noWhitespace()->length(1, 15);

if ($checkValid->validate($username)) {
    echo "<h1>OK $username</h1>";
} else {
    echo "<h1>CACA $username</h1>";
}
