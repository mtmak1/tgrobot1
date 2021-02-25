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



if (strpos($message, "hello") === 0) {
    file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=Hello, frieds!");
}

else{
    
    $inline_button1 = array("text"=>"Главный сайт","url"=>"http://google.com");
    $inline_button2 = array("text"=>"Действие","callback_data"=>'/plz');
    $inline_keyboard = [[$inline_button1,$inline_button2]];
    $keyboard=array("inline_keyboard"=>$inline_keyboard);
    $replyMarkup = json_encode($keyboard); 
    //file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=Here's the weather pu ".'&text='."key".'&reply_markup=' . $replyMarkup);
    send($path, $chatId,'Default text', $replyMarkup);
}

switch($data){
    case '/plz':
        $inline_button1 = array("text"=>"Google url","url"=>"http://google.com");
        $inline_button2 = array("text"=>"work plz","callback_data"=>'/plz');
        $inline_keyboard = [[$inline_button1,$inline_button2]];
        $keyboard=array("inline_keyboard"=>$inline_keyboard);
        $replyMarkup = json_encode($keyboard); 
        file_get_contents($path."/sendmessage?chat_id=".$chat_id_in."&text=Here's the weather pu ".'&text='."key".'&reply_markup=' . $replyMarkup);
    break;
}




function send($path, $chatid, $message, $buttons){
    file_get_contents($path."/sendmessage?chat_id=".$chatid."&text=Here's the weather pu ".$message.'&reply_markup=' . $buttons);

}


?>
<!-- <?php
//https://api.telegram.org/bot1387467862:AAHm63q6W4xRwnO17ddPhV_uxIZAZncOcww/setwebhook?url=https://amarthurabot.000webhostapp.com/amarthurabot.php
$token="1387467862:AAHm63q6W4xRwnO17ddPhV_uxIZAZncOcww";
$path="https://api.telegram.org/bot1387467862:AAHm63q6W4xRwnO17ddPhV_uxIZAZncOcww";
//$token="1387467862:AAHm63q6W4xRwnO17ddPhV_uxIZAZncOcww";
//$path="https://api.telegram.org/bot1387467862:AAHm63q6W4xRwnO17ddPhV_uxIZAZncOcww";
$update = json_decode(file_get_contents("php://input"), TRUE);
$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];


$api = 'https://api.telegram.org/bot' . $token;


$callback_query = $update['callback_query'];
$data = $callback_query['data'];
$message_id = ['callback_query']['message']['message_id'];
$chat_id_in = $callback_query['message']['chat']['id'];

if (strpos($message, "/info") === 0) {
   
    
    file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=Here's the weather u ");
}


if (strpos($message, "/text") === 0){
  
        $inline_button1 = array("text"=>"Google url","url"=>"http://google.com");
        $inline_button2 = array("text"=>"work plz","callback_data"=>'/plz');
        $inline_keyboard = [[$inline_button1,$inline_button2]];
        $keyboard=array("inline_keyboard"=>$inline_keyboard);
        $replyMarkup = json_encode($keyboard); 
        file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=Here's the weather pu ".'&text='."key".'&reply_markup=' . $replyMarkup);
        
}
switch($data){
    case '/plz':
        $inline_button1 = array("text"=>"Google url","url"=>"http://google.com");
        $inline_button2 = array("text"=>"work plz","callback_data"=>'/plz');
        $inline_keyboard = [[$inline_button1,$inline_button2]];
        $keyboard=array("inline_keyboard"=>$inline_keyboard);
        $replyMarkup = json_encode($keyboard); 
        file_get_contents($path."/sendmessage?chat_id=".$chat_id_in."&text=Here's the weather pu ".'&text='."key".'&reply_markup=' . $replyMarkup);
    break;
}

?> -->




