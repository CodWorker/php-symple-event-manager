<?php

require_once __DIR__ . '/vendor/autoload.php';

use Coder\TestWork1\EventManager;

try{
    // test cases
    $firstFunc = function() {
        echo "called first\n";
    };

    $secondFunc = function() {
        echo "called second\n";
    };

    $thirdFunc = function() {
        echo "called third\n";
    };

    $em = new EventManager();
    $em->addEventListener("type_one", $firstFunc);
    $em->addEventListener("type_two", $secondFunc);
    $em->addEventListener("type_two", $thirdFunc);


    $em->fireEvent("type_one");
    $em->fireEvent("type_two");
}catch(\Exception $e){
    echo 'Exception: ',  $e->getMessage(), "\n";
}

// expected output:
// called first
// called second
// called third