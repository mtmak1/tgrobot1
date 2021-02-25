<?php
//https://api.telegram.org/bot1387467862:AAHm63q6W4xRwnO17ddPhV_uxIZAZncOcww/setwebhook?url=https://amarthurabot.000webhostapp.com/amarthurabot.php
$token="1641022256:AAF6H4__KaS3ZQWTiUDPbiU4cNw_goZkf-E";
$path="https://api.telegram.org/bot1641022256:AAF6H4__KaS3ZQWTiUDPbiU4cNw_goZkf-E";
$webhook = "https://api.telegram.org/bot1641022256:AAF6H4__KaS3ZQWTiUDPbiU4cNw_goZkf-E/setwebhook?url=https://tgrobot1.herokuapp.com/index.php";
$update = json_decode(file_get_contents("php://input"), TRUE);
$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];

$callback_query = $update['callback_query'];
$data = $callback_query['data'];
$message_id = ['callback_query']['message']['message_id'];
$chat_id_in = $callback_query['message']['chat']['id'];

function gettxt($message){
    $bdw = fopen('info.txt', 'a');
    fwrite($bdw, "$message ||");
    fclose($bdw);
}

gettxt($message);

if (strpos($message, "hello") === 0) {
    file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=Hello, frieds!");
}

else{
   
    //file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=Here's the weather pu ".'&text='."key".'&reply_markup=' . $replyMarkup);
    send($path, $chatId,'Default text', showbuts());
}

switch($data){
    case '/plz':
        
        file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=Here's the weather pu ".'&text='."key".'&reply_markup=' . showbuts());
    break;
    case '/show':
        $textt = gettextfromfile('info.txt');
        send($path, $chatid, $textt, showbuts());
    break;
}

function gettextfromfile($fname){
    $bdw = fopen($fname, 'r');
    $line = '';
    $alltxt = '';
    while(!feof($bdw)){
       fgets($bdw, $line);
       $alltxt .= $line;
    }
    fclose($bdw);
    return $alltxt;
}


function showbuts(){
    $inline_button1 = array("text"=>"Google url","url"=>"http://google.com");
    $inline_button2 = array("text"=>"work plz","callback_data"=>'/plz');
    $inline_button3 = array("text"=>"Отобразить", "callback_data"=>'/show');
    $inline_keyboard = [[$inline_button1,$inline_button2,$inline_button3]];
    $keyboard=array("inline_keyboard"=>$inline_keyboard);
    $replyMarkup = json_encode($keyboard); 
    return $replyMarkup;
}


function send($path, $chatid, $message, $buttons){
    file_get_contents($path."/sendmessage?chat_id=".$chatid."&text=Here's the weather pu ".$message.'&reply_markup=' . $buttons);

}


?>




