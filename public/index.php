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

    use Carbon\Carbon;

    printf("現在是 %s", Carbon::now()->toDateTimeString());
    printf("在台北現在是 %s", Carbon::now('Asia/Taipei'));  //implicit __toString()
    $tomorrow = Carbon::now()->addDay();
    $lastWeek = Carbon::now()->subWeek();

    $officialDate = Carbon::now()->toRfc2822String();

    $howOldAmI = Carbon::createFromDate(2004, 12, 1)->age;

    $noonTodayJapanTime = Carbon::createFromTime(12, 0, 0, 'Asia/Tokyo');

    $internetWillBlowUpOn = Carbon::create(2038, 01, 19, 3, 14, 7, 'GMT');

    // Don't really want this to happen so mock now
    Carbon::setTestNow(Carbon::createFromDate(2025, 11, 21));

    // comparisons are always done in UTC
    if (Carbon::now()->gte($internetWillBlowUpOn)) {
        die();
    }

    // Phew! Return to normal behaviour
    Carbon::setTestNow();

    if (Carbon::now()->isWeekend()) {
        echo '哈哈派對!';
    }
    // Over 200 languages (and over 500 regional variants) supported:
    echo Carbon::now()->subMinutes(2)->diffForHumans(); // '2 minutes ago'
    echo Carbon::now()->subMinutes(2)->locale('zh_TW')->diffForHumans(); // '2分钟前'
    echo Carbon::parse('2019-07-23 14:51')->isoFormat('LLLL'); // 'Tuesday, July 23, 2019 2:51 PM'
    echo Carbon::parse('2019-07-23 14:51')->locale('fr_FR')->isoFormat('LLLL'); // 'mardi 23 juillet 2019 14:51'

    // ... but also does 'from now', 'after' and 'before'
    // rolling up to seconds, minutes, hours, days, months, years

    $daysSinceEpoch = Carbon::createFromTimestamp(0)->diffInDays(); // something such as:
                                                                    // 19817.6771
    $daysUntilInternetBlowUp = $internetWillBlowUpOn->diffInDays(); // Negative value since it's in the future:
                                                                    // -5037.4560

    // Without parameter, difference is calculated from now, but doing $a->diff($b)
    // it will count time from $a to $b.
    Carbon::createFromTimestamp(0)->diffInDays($internetWillBlowUpOn); // 24855.1348