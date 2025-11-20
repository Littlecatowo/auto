<?php
    require '../vendor/autoload.php';

    use Demo\Hello\Someone;
    use Demo\Hello\Lara;

    $lara = new Lara();
    $vincent = new Someone('Vincent');

    $mary = new Demo\Hello\Someone('Mary');
    $john = new Demo\Hello\Someone('John');
    $hello = new Demo\HelloWorld();

    use Demo\HelloWorld as World;
    $world = new World();