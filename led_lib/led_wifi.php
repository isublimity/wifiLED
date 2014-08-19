<?php

class led_wifi
{

    /*
     * 	var colors = {
            "blue"       : 0,
            "light blue" : 50,
            "teal"       : 80,
            "green"      : 100,
            "yellow"     : 140,
            "orange"     : 170,
            "red"        : 180,
            "purple"     : 190,
            "pink"       : 200
        }
     */
    private $server='';
    private $port=50000;
    private $delay=50000;
    private $_commands=array(


    );
    public function __construct($server='192.168.0.116',$port=50000)
    {
        $this->server=$server;
        $this->port=$port;
    }
    public function send_command($udp_message)
    {

        $udp_message[] = 0x55;

        $message = vsprintf (str_repeat ('%c', count ($udp_message)), $udp_message);

        echo 'UDP message:';
        foreach($udp_message as $key => $value){
            echo '0x';
            printf("%02x ", $value);
        }
        echo"\n";


        if ($socket = socket_create (AF_INET, SOCK_DGRAM, SOL_UDP)) {
            $f = socket_sendto ($socket, $message, strlen ($message), 0, $this->server, $this->port);
            var_dump ($f);
            usleep ($this->delay);

            echo "LastError:" . socket_last_error ($socket) . "\n";

            socket_close ($socket);

        }
    }
    public function command($cmd)
    {
        $msg=$this->_commands[$cmd];
        return $this->send_command($msg);
    }
    public function on()
    {
        return $this->command('on');
    }

    public function off()
    {
        return $this->command('off');
    }
    public function brightness_up()
    {
        return $this->command('brightness_up');
    }

    public function rgb($r,$g,$b)
    {
        $rgb_msg=array();
        $rgb_msg[0] =0x20;
        $rgb_msg[1] = $r;//dechex($r);
//        $rgb_msg[2] = 22;//dechex($g);
//        $rgb_msg[3] = 22;//dechex($b);
        return $this->send_command($rgb_msg);
    }


}

