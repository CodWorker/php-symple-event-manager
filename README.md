<p align="center">
    <h1 align="center">Symple Event Manager</h1>
    <br>
</p>

BASIC USAGE
------------

```
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


// expected output:
// called first
// called second
// called third
```
