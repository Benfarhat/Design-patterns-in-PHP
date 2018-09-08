<?php

include_once 'database.php';
include_once 'mock.php';

$user = new MockUser();

$result = $user->delete(3);

if($result) {
    echo "user deleted!";
} else {
    echo "user not deleted!";
}