<?php
/* by @api_web */
ob_start();
define('API_KEY','538031275:AAGWuLnP_q3XX6hxMr0SClCGsC-zEPVpOiI');
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
$u = explode("\n",file_get_contents("memb.txt"));
$c = count($u)-1;
$modxe = file_get_contents("usr.txt");
$admin =5555 ;
$sudo = 175279237;
$name = $update->message->from->first_name;
$username = $update->message->from->username;
$t =$message->chat->title;
$user = $message->from->username;
$ch = "@c_941";#معرف قناتك
$join = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$ch&user_id=".$from_id);
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"▫️ يجب عليك الاشتراك في قناة البوت اولا ⚜️؛
◼️ اشترك في القناة ثم ارسل /start ،
 - قناة البوت @c_941 •",
 ]);return false;}  
if($text == '/start'){
    bot('sendMessage',[
      'chat_id'=>$chat_id,
               'text' => "- اهلا بك ؛ [$name](tg://user?id=$chat_id)
⚜¦ فـي بوت تحميل ستـوري انستـا ؛
🌐¦ البوت الاول فـي تليجرام ؛ 
📥¦ يـمكنك تـحميل سـتوري الحسابات العامـة فقط ؛
🔱¦ فـقط ارسـل يوزر الحـساب ؛
✔️¦ وسيقـوم البـوت بجـلب الستـوري ؛
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
📌¦ مـلاحضـة اذا لـم يرد عـليك البوت فأن الحسـاب لا يوجد فيـة ستـوري ‼️'
📮¦ آرسل اليوزر بـدون (  @ )
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[• اضغط هنا وتابع جديدنا ، 📢 '](https://t.me/mroan1235)",
'parse_mode' => "MarkDown", 'disable_web_page_preview' => true, 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => "• اضغط هنا وتابع قناة البوت ، 🔰'", 'url' => "https://t.me/mroan1235"]], ]]) ]);
}
if($text != '/start' ){
 $get = json_decode(file_get_contents("https://wapis.ga/insta/getstories/$text"));
 if($get->error == 'username'){
   bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>'ليس هناك أي مستخدم بهذا الأسم ❌',
  'reply_markup'=>json_encode([
    'inline_keyboard'=>[
        [['text'=>'《 ἿȒᾋQ ἿƝṨҬᾋ》','url'=>'t.me/c_941']]    ]  ]) ]);}
 if($get->stories->error == 'Not found'){
 bot('sendphoto',[
  'chat_id'=>$chat_id,
  'photo'=>$get->user->profile_pic_url_hd,
  'caption'=>'الحساب الذي أرسلتة لم ينشر اي قصة 😬',
  'reply_markup'=>json_encode([
    'inline_keyboard'=>[
        [['text'=>'《 ἿȒᾋQ ἿƝṨҬᾋ》','url'=>'t.me/c_941']]  ]])]);
 } else {
    bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>'يرجى الأنتضار قليلاً 🕒',]);
    $ge = file_get_contents('https://wapis.ga/insta/getstories/'.$text);
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
        [['text'=>' 《 ἿȒᾋQ ἿƝṨҬᾋ》','url'=>'t.me/c_941']]    ]  ])]); }}
 
if($text == "/start") {
bot('sendmessage',[ 
'chat_id'=>$chat_id,
'text'=>"
 ",
'reply_to_message_id'=>$message->message_id,
]);
bot('sendMessage',[
'chat_id'=>$sudo,
'text'=>"
  ٭هذا دخل للبوت 🔰؛
• المعرف ؛ @$username ،
• الاسم ؛ $name 
• الايدي ؛ $from_id
• اليوم ؛ " . date("j") . "\n" . "
",
]);
}


