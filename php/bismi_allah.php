<?php
//in the name of Allah


/* THE PLAN BY THE WILL OF ALLAH
 *
 * 1. main page will have a form with a place to enter the site's domain/ip wich will send a request the server to scan that ip. user will -inch'Allah- then be redirected to the scan page
 * 2. the scan page will check if the 'cache/' dir has the site's scan results. if not, will check if it is currently being scanned in the 'cache/scanning' file, or requet a scan otherwise. and it will redirect the user into the 
 * 3. the waiting page is a page wich will reload every 5 seconds if the it is still scanning
 * 4. the scan request: will call the commend/system_call "nmap -A {ip} > cache {ip}"
 */

// TODO change this to plain html if you don't use any functions

echo '
<!DOCTYPE html>
<html>
<head>
    <title>web scanner</title>
</head>
<body>
    <h1>in the name of Allah</h1>
    <form action="request.php" method="get">
        <label for="site_addr">site name/ip:</label>
        <input type="text" id="site_addr" name="site_addr">
        <p>will add the flags input soon by the will of Allah</p>
        <button type="submit">scan</button>
    </form>
</body>
</html>
';

?>
