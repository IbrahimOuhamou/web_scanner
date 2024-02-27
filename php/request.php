<?php
//in the name of Allah
ignore_user_abort(true);
set_time_limit(0);

$addr = htmlspecialchars($_GET['site_addr']);
if(file_exists('cache/' . $addr))
{
    echo '
    <!DOCTYPE html>
    <html>
    <head>
        <title>in the name of Allah</title>
    </head>
    <body>
        <p>in the name of Allah</p>
        <p>scan results of ' . $addr . '</p>
        <pre>' . file_get_contents('cache/' . $addr) . '</pre>
    </body>
    </html>';
}
elseif (file_exists('cache/' . $addr . '_request'))
{
    echo'
    <!DOCTYPE html>
    <html>
    <head>
        <title>bismi allah scanned ' . $addr . ' </title>
        <meta http-equiv="refresh" content="10">
    </head>
    <body>
        <h1>in the name of Allah</h1>
        <p>please wait for your scan results for ' . $addr . '</p>
    </body>
    </html>';
}
else
{
    $f = fopen('cache/' . $addr . '_request', 'w');
    fwrite($f, date('F Y h:i:s A'));
    fclose($f);
    
    $pid = pcntl_fork();
    if(-1 === $pid)
    {
        echo 'internal problem, request later. la ilaha illa Allah';
    }
    elseif($pid)
    {
        echo'
        <!DOCTYPE html>
        <html>
        <head>
            <title>bismi allah scanned ' . $addr . ' </title>
            <meta http-equiv="refresh" content="10">
        </head>
        <body>
            <h1>in the name of Allah</h1>
            <p>please wait for your scan results for ' . $addr . '</p>
        </body>
        </html>';
        $status = 0;
        pcntl_wait($status);
    }
    else
    {
        system('echo "bismiAllah" > cache/' . $addr);
        system('nmap ' . $addr . ' > cache/' . $addr);
        system('rm cache/' . $addr . '_request');
    }
}


?>
