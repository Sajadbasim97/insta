<?php
$API_KEY = "5538420645:AAGopAdED2NRvTFUp7g_QsV23brUTX3QA-M"; 
define("API_KEY", $API_KEY);
function bot($method, $datas = [])
{
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$from_id = $message->from->id;
if($text == '/start'){
    bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>' get text or us
- ','reply_markup'=>json_encode([
  'inline_keyboard'=>[
   [['text'=>'ok tv me  ،','url'=>'t.me/ss_ss']],]  ]) ]);}


if($text != "/start"){
$Api = json_decode(file_get_contents("https://storiesdown.com/api/stories/0051ac727b8da9ba1e8a7ae9792c549e?_username=$text"),true);
for($i = 0; $i<count($Api['stories']); $i++){
$photo = $Api['stories'][$i]['image_url'];
$nm = $i +1;
bot('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>$photo,
'caption'=>"🖼| صورة : $nm ",
]);

}
