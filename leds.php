<?

/*
 *
 *






#region marlight udp packets const (do not change it)

// ----------------------------- FIRST PAGE IPHONE APPLICATION  ------------------------------------------
$ALL_ON                 = array(0x01, 0x55);
$ALL_OFF                = array(0x02, 0x55);

$BRIGHT_UP              = array(0x03, 0x55);
$BRIGHT_DOWN            = array(0x04, 0x55);

$TEMP_COLDER            = array(0x05, 0x55);
$TEMP_WARMER            = array(0x06, 0x55);

$BRIGHT_TEMP_DEFAULT    = array(0x07, 0x55);

$ON_1                   = array(0x08, 0x55);
$OFF_1                  = array(0x09, 0x55);
$ON_2                   = array(0x0A, 0x55);
$OFF_2                  = array(0x0B, 0x55);
$ON_3                   = array(0x0C, 0x55);
$OFF_3                  = array(0x0D, 0x55);
$ON_4                   = array(0x0E, 0x55);
$OFF_4                  = array(0x0F, 0x55);

// ----------------------------- SECOND PAGE IPHONE APPLICATION  (RGB) -----------------------------------
$RGB_MODE_ON            = array(0x12, 0x55);
$RGB_MODE_BRIGHT_DOWN   = array(0x10, 0x55);
$RGB_MODE_BRIGHT_UP     = array(0x11, 0x55);
$RGB_MODE_SET_COLOR     = array(0x13, 0x00, 0x00, 0x00, 0x55);

// ----------------------------- THIRD PAGE IPHONE APPLICATION  (PRESETS) --------------------------------
$MODE_NIGHT             = array(0x14, 0x55);
$MODE_MEETING           = array(0x15, 0x55);
$MODE_READING           = array(0x16, 0x55);
$MODE_MODE              = array(0x17, 0x55);

$MODE_TIMER             = array(0x18, 0x00, 0x00, 0x00, 0x00, 0x09, 0x14, 0x55);
$MODE_ALARM             = array(0x19, 0x00, 0x00, 0x09, 0x14, 0x55);
$MODE_SLEEP             = array(0x1A, 0x55); // ??????
$MODE_RECREATION        = array(0x1B, 0x00, 0x00, 0x00, 0x55);
// ----------------------------- END CONSTS -----------------------------------


 */


// -----------------------------------------------------------------------------------------------------------------------
$timer=array(0,0,0,0);
$rgb=array(0,0,0);
$channel=0;



$c=array(0x22,0x00);

$n=new led_wifi();
$n->off();
sleep(1);
$n->on();
$n->rgb(1,20,20);
for ($f=0;$f<=255;$f++)
{

    $n->rgb($f,0,0);
//sleep(1);
}

echo "END\n";
function led_cmd($channel,$command,$RGB,$timer)
{

    $r=$RGB[0];
    $g=$RGB[1];
    $b=$RGB[2];

    $m1=$timer[0];
    $h1=$timer[1];
    $m2=$timer[2];
    $h2=$timer[3];
// ----------------------------- FIRST PAGE IPHONE APPLICATION  ------------------------------------------
    $ALL_ON                 = array(0x01, 0x55);
    $ALL_OFF                = array(0x02, 0x55);

    $BRIGHT_UP              = array(0x03, 0x55);
    $BRIGHT_DOWN            = array(0x04, 0x55);

    $TEMP_COLDER            = array(0x05, 0x55);
    $TEMP_WARMER            = array(0x06, 0x55);

    $BRIGHT_TEMP_DEFAULT    = array(0x07, 0x55);

    $ON_1                   = array(0x08, 0x55);
    $OFF_1                  = array(0x09, 0x55);
    $ON_2                   = array(0x0A, 0x55);
    $OFF_2                  = array(0x0B, 0x55);
    $ON_3                   = array(0x0C, 0x55);
    $OFF_3                  = array(0x0D, 0x55);
    $ON_4                   = array(0x0E, 0x55);
    $OFF_4                  = array(0x0F, 0x55);

// ----------------------------- SECOND PAGE IPHONE APPLICATION  (RGB) -----------------------------------
    $RGB_MODE_ON            = array(0x12, 0x55);
    $RGB_MODE_BRIGHT_DOWN   = array(0x10, 0x55);
    $RGB_MODE_BRIGHT_UP     = array(0x11, 0x55);
    $RGB_MODE_SET_COLOR     = array(0x13, 0x00, 0x00, 0x00, 0x55);

// ----------------------------- THIRD PAGE IPHONE APPLICATION  (PRESETS) --------------------------------
    $MODE_NIGHT             = array(0x14, 0x55);
    $MODE_MEETING           = array(0x15, 0x55);
    $MODE_READING           = array(0x16, 0x55);
    $MODE_MODE              = array(0x17, 0x55);

    $MODE_TIMER             = array(0x18, 0x00, 0x00, 0x00, 0x00, 0x09, 0x14, 0x55);
    $MODE_ALARM             = array(0x19, 0x00, 0x00, 0x09, 0x14, 0x55);
    $MODE_SLEEP             = array(0x1A, 0x55); // ??????
    $MODE_RECREATION        = array(0x1B, 0x00, 0x00, 0x00, 0x55);
// ----------------------------- END CONSTS -----------------------------------
//send command depending POST/GET request

    if($channel!=0){
        switch($channel)        {
            case 1:
                sendMessage($ON_1);
                break;
            case 2:
                sendMessage($ON_2);
                break;
            case 3:
                sendMessage($ON_3);
                break;
            case 4:
                sendMessage($ON_4);
                break;
        }
    }



    switch($command){
        case 'ALL_ON':
            sendMessage($ALL_ON);
            break;
        case 'ALL_OFF':
            sendMessage($ALL_OFF);
            break;
        case 'BRIGHT_UP':
            sendMessage($BRIGHT_UP);
            break;
        case 'BRIGHT_DOWN':
            sendMessage($BRIGHT_DOWN);
            break;
        case 'TEMP_COLDER':
            sendMessage($TEMP_COLDER);
            break;
        case 'TEMP_WARMER':
            sendMessage($TEMP_WARMER);
            break;
        case 'BRIGHT_TEMP_DEFAULT':
            sendMessage($BRIGHT_TEMP_DEFAULT);
            break;
        case 'ON_1':
            sendMessage($ON_1);
            break;
        case 'OFF_1':
            sendMessage($OFF_1);
            break;
        case 'ON_2':
            sendMessage($ON_2);
            break;
        case 'OFF_2':
            sendMessage($OFF_2);
            break;
        case 'ON_3':
            sendMessage($ON_3);
            break;
        case 'OFF_3':
            sendMessage($OFF_3);
            break;
        case 'ON_4':
            sendMessage($ON_4);
            break;
        case 'OFF_4':
            sendMessage($OFF_4);
            break;
        case 'RGB_MODE_ON':
            sendMessage($RGB_MODE_ON);
            break;
        case 'RGB_MODE_BRIGHT_DOWN':
            sendMessage($RGB_MODE_BRIGHT_DOWN);
            break;
        case 'RGB_MODE_BRIGHT_UP':
            sendMessage($RGB_MODE_BRIGHT_UP);
            break;
        case 'RGB_MODE_SET_COLOR':
            $rgb_msg =$RGB_MODE_SET_COLOR;
            $rgb_msg[1] = $r;
            $rgb_msg[2] = $g;
            $rgb_msg[3] = $b;
            sendMessage($rgb_msg);
            break;
        case 'MODE_NIGHT':
            sendMessage($MODE_NIGHT);
            break;
        case 'MODE_MEETING':
            sendMessage($MODE_MEETING);
            break;
        case 'MODE_READING':
            sendMessage($MODE_READING);
            break;
        case 'MODE_MODE':
            sendMessage($MODE_MODE);
            break;
        case 'MODE_TIMER':
            $timer_msg =$MODE_TIMER;
            $timer_msg[1] = $h1;
            $timer_msg[2] = $m1;
            $timer_msg[3] = $h2;
            $timer_msg[4] = $m2;
            sendMessage($timer_msg);
            break;
        case 'MODE_ALARM':
            $alarm_msg =$MODE_ALARM;
            $alarm_msg[1] = $h1;
            $alarm_msg[2] = $m1;
            sendMessage($alarm_msg);
            break;
        case 'MODE_SLEEP':
            sendMessage($MODE_SLEEP);
            break;
        case 'MODE_RECREATION':
            $recreation_msg =$MODE_RECREATION;
            $recreation_msg[1] = $r;
            $recreation_msg[2] = $g;
            $recreation_msg[3] = $b;
            sendMessage($recreation_msg);
            break;
        default:
            break;
    }
}
