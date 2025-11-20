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

    use Monolog\Level;
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;

    // create a log channel
    $log = new Logger('WISD');
    $log->pushHandler(new StreamHandler('../log/my.log', Level::Warning));

    // add records to the log
    $log->warning('Foo');
    $log->error('Bar');