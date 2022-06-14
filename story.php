<?php
ob_start();
define('API_KEY','5538420645:AAGopAdED2NRvTFUp7g_QsV23brUTX3QA-M');
echo "https://api.telegram.org/bot".API_KEY."/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME'];
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{        return json_decode($res);    }}

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

if($text != '/start' ){
 $get = json_decode(file_get_contents("https://storiesdown.com/api/stories/0051ac727b8da9ba1e8a7ae9792c549e?_username=$text"));
 if($get->error == 'username'){
   bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>'ليس هناك أي مستخدم بهذا الأسم ❌',
  'reply_markup'=>json_encode([
    'inline_keyboard'=>[
        [['text'=>'ok','url'=>'t.me/ss_ss']]    ]  ]) ]);}
 if($get->stories->error == 'Not found'){
 bot('sendphoto',[
  'chat_id'=>$chat_id,
  'photo'=>$get->stories->image_url,
  'caption'=>'الحساب الذي أرسلتة لم ينشر اي قصة 😬',
  'reply_markup'=>json_encode([
    'inline_keyboard'=>[
        [['text'=>'ok','url'=>'t.me/ss_ss']]  ]])]);
 } else {
    bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>'يرجى الأنتضار قليلاً 🕒',]);
    $ge = file_get_contents('https://storiesdown.com/api/stories/0051ac727b8da9ba1e8a7ae9792c549e?_username='.$text);
    $json = json_decode($ge, true);
    for ($i=0; $i < count($json['result']['reels_media'][0]['items']); $i++) {
        $photo = $json['result']['reels_media'][0]['items'][$i]['display_url'];
    bot('sendphoto',[
      'chat_id'=>$chat_id,
      'photo'=>$photo
    ]);
    $video = $json['result']['reels_media'][0]['items'][$i]['video_resources'][1]['src'];
    bot('sendvideo',[
      'chat_id'=>$chat_id,
      'video'=>$video    ]);    }
  bot('sendMediaGroup',[
    'chat_id' => $chat_id,
    'media' =>json_encode($photo),  ]);  bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>'تم ارسال جميع الحالات الخاصة بالمستخدم ('.$text.')

يمكنك أرسال اسم مستخدم اخر لتنزيل حالاته او الخروج ⬇️',
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
        [['text'=>'ok','url'=>'t.me/ss_ss']]    ]  ])]); }}
