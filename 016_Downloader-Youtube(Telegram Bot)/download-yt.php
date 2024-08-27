<?php

ob_start();

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

define('BOT_TOKEN', '???');

define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');

function messageRequest($method, $parameter)
{
    if(! $parameter) {
        $parameter = array();
    }

    $parameter['method'] = $method;

    $handle = curl_init(API_URL);

    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);

    curl_setopt($handle, CURLOPT_TIMEOUT, 60);

    curl_setopt($handle, CURLOPT_POSTFIELDS, json_encode($parameter));

    curl_setopt($handle, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));

    $result = curl_exec($handle);

    return $result;
}

function objectToArrays($object)
{
    if (!is_object($object) && !is_array($object)) {
        return $object;
    }
    if (is_object($object)) {
        $object = get_object_vars($object);
    }
    return array_map("objectToArrays", $object);
}

$update = json_decode(file_get_contents("php://input"));

if(isset($update->message->chat->id)) {

    $message_id = $update->message->id;

    $chat_id = $update->message->chat->id;

    $text = $update->message->text;

    $name = $update->message->from->first_name;

    $username = $update->message->from->username;

    $mojtaba = file_get_contents("mojtaba.txt");

    $ADMIN = '???';

    mkdir("data/$chat_id");

    if($text === '/start') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        $user = file_get_contents('Member.txt');
    
        $members = explode("\n", $user);
    
        if(! in_array($chat_id, $members)) {
    
            $add_user = file_get_contents('Member.txt');
    
            $add_user .= $chat_id . "\n";
    
            file_put_contents('Member.txt', $add_user);
        }
    
        messageRequest('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"خوب کاربر گرامی خوش امدید 
        زبان خودتون را انتخاب کنید😁
        ➖➖➖➖➖➖➖➖➖➖
        حسنا مرحبا بالضيف
        اختر لغتك😁
        ➖➖➖➖➖➖➖➖➖➖
        Welcome Guest
        Choose your language😁",
         'parse_mode'=>"MarkDown",
          'reply_markup'=>json_encode([
                    'keyboard'=>[
                      [
                      ['text'=>"fa"]
                      ],
                      [
                      ['text'=>"arb"]
                      ],
                      [
                      ['text'=>"en"]
                      ]
                      ]
                ])
          ]);
    }

    elseif($text === '/panel' && $chat_id === $ADMIN) {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);
    
        messageRequest('sendmessage', [
                    'chat_id' =>$chat_id,
                    'text' =>"ادمین عزیز به پنل مدیریتی ربات خودش امدید",
                    'parse_mode'=>'html',
          'reply_markup'=>json_encode([
                'keyboard'=>[
                  [
                  ['text'=>"/statistics"],['text'=>"/publicmsg"]
                  ]
                  ],'resize_keyboard'=>true
            ])
                ]);
    }

    elseif($text === '/admin' || $text === 'ادمین') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => '@Mojtaba_mz1', 'reply_to_message_id' => $message_id]);
        
        die;
    }

    elseif($text === '/image_admin') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'upload_photo']);

        messageRequest('sendPhoto', ['chat_id' => $chat_id, 'photo' => randomImage(), 'caption' => '@Mojtaba_mz1']);

        die;
    }

    elseif($text === '/statistics' && $chat_id == $ADMIN){

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        $user = file_get_contents("Member.txt");
    
        $member_id = explode("\n",$user);
    
        $member_count = count($member_id) -1;

        messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => $member_count, 'parse_mode' => 'HTML']);

    }

    elseif($text === '/publicmsg' && $chat_id === $ADMIN) {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing ']);

        file_put_contents("mojtaba.txt","bc");

        messageRequest('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>" پیام مورد نظر رو در قالب متن بفرستید:",
            'parse_mode'=>'html',
            'reply_markup'=>json_encode([
              'keyboard'=>[
              [['text'=>'/panel']],
              ],'resize_keyboard'=>true])
          ]);
    }
    
    elseif($mojtaba === 'bc' && $chat_id === $ADMIN) {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        file_put_contents("mojtaba.txt","none");

        messageRequest('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>" پیام همگانی فرستاده شد.",
          ]);

          $all_member = fopen("Member.txt", "r");

          while( !feof( $all_member)) {

            $user = fgets($all_member);

            SendMessage($user,$text,"html");
          }
    }

    elseif($text === "fa"){

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        messageRequest('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"به ربات دانلود از یوتیوب خوش امدید😊",
        'reply_markup'=>json_encode([
          'keyboard'=>[
            [
            ['text'=>"دانلود"],['text'=>"توسعه دهنده"]
            ]
            ],'resize_keyboard'=>true
      ])
        ]);
    }

    elseif($text == "arb"){

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        messageRequest('sendMessage',[
             'chat_id'=>$chat_id,
             'text'=>"مرحبا بكم في تحميل يوتيوب روبوت😊",
             'reply_markup'=>json_encode([
              'keyboard'=>[
                [
                ['text'=>"تحمیل"],['text'=>"مطور"]
                ]
                ],'resize_keyboard'=>true
          ])
        ]);
        }

    elseif($text == "en"){

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

            messageRequest('sendMessage',[
                'chat_id'=>$chat_id,
                'text'=>"Welcome to Download YouTube Robot😊",
                'reply_markup'=>json_encode([
                  'keyboard'=>[
                    [
                    ['text'=>"download"],['text'=>"developer"]
                    ]
                    ],'resize_keyboard'=>true
              ])
                 ]);
            }

    elseif ($text === "دانلود") {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        file_put_contents("mojtaba.txt","a");

        messageRequest('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"خوب حالا لینک یوتیوب خودتون را بفرستید😅",
            ]);
    }

    elseif($mojtaba === "a" ){

        file_put_contents("mojtaba.txt","0");

        $A = $message->text;

        $ali1 = json_decode(file_get_contents("https://api.unblockvideos.com/youtube_downloader?id=".$text."&selector=mp4"));

        $tik2 = objectToArrays($ali1);

        $ur = $tik2[0]["url"];

        $er = ["error"];

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        messageRequest('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"در حال  دانلود.......
        
        اگه حجم فیلمتون بالا باشه با تاخیر فرستاده میشود",
          ]);

          messageRequest('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"یکی از ربات دانلود از یوتیوب استفاده کرد😐
        
        زبانش فارسی بود 😅
        
        نام : $name
        یوزر : $username
        ایدی : $chat_id
        
        اینم لینک یوتیوبش:
        $text",
          ]);

            messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'upload_document']);

            messageRequest('sendDocument',[
            'chat_id'=>$chat_id,
            'document'=>$ur,
            'file_name'=>$text,
      ]);

      messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'upload_document']);

      messageRequest('sendDocument',[
            'chat_id'=>$chat_id,
            'document'=>$ur,
            'file_name'=>$text,
      ]);
        }

    elseif ($text == "تحمیل") {

        file_put_contents("mojtaba.txt","f");

        messageRequest('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"صلة جيدة في یوتیوب المشاركة😋",
              ]);
    }

    elseif($mojtaba === "f" ){

        file_put_contents("mojtaba.txt","0");

        $A = $message->text;

        $ali1 = json_decode(file_get_contents("https://api.unblockvideos.com/youtube_downloader?id=".$text."&selector=mp4"));

        $tik2 = objectToArrays($ali1);
        
        $ur = $tik2["0"]["url"];

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        messageRequest('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"تحميل📤 .......
        إذا تم إرسال الفيديو أعلاه مع تأخير🙊",
          ]);

        messageRequest('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"یکی از ربات دانلود از یوتیوب استفاده کرد😐
        
        زبانش عربی بود 😅
        
        نام : $name
        یوزر : $username
        ایدی : $chat_id
        
        اینم لینک یوتیوبش:
        ‌$text",
          ]);

          messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'upload_document']);

                messageRequest('sendDocument',[
                'chat_id'=>$chat_id,
                'document'=>$ur,
                'file_name'=>$text,
          ]);

          messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'upload_document']);

          messageRequest('sendDocument',[
                'chat_id'=>$chat_id,
                'document'=>$ur,
                'file_name'=>$text,
          ]);
        }

    elseif ($text === "download") {
        file_put_contents("mojtaba.txt","h");

        messageRequest('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"Good link your YouTube Post😁",
              ]);
    }

    elseif($mojtaba === "h" ){
        file_put_contents("mojtaba.txt","0");

        $A = $message->text;

        $ali1 = json_decode(file_get_contents("https://api.unblockvideos.com/youtube_downloader?id=".$text."&selector=mp4"));

        $tik2 = objectToArrays($ali1);

        $ur = $tik2["0"]["url"];

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        messageRequest('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"Downloading 📤.......
         If  size file the above is delayed is sent🙊",
          ]);

          messageRequest('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"یکی از ربات دانلود از یوتیوب استفاده کرد😐
        
        زبانش انگلیسی بود 😅
        
        نام : $name
        یوزر : $username
        ایدی : $chat_id
        
        اینم لینک یوتیوبش:
        $text",
          ]);

          messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'upload_document']);

            messageRequest('sendDocument',[
            'chat_id'=>$chat_id,
            'document'=>$ur,
            'file_name'=>$text,
          ]);

          messageRequest('sendDocument',[
            'chat_id'=>$chat_id,
            'document'=>$ur,
            'file_name'=>$text,
          ]);
    }

    elseif($text === 'توسعه دهنده') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        messageRequest('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"ربات دانلود  از یوتیوب 

توسعه دهنده : @Mojtaba_mz1

راهنما: 
با استقاده از این ربات شما میتوانید براحتی از یوتیوب دانلود کنید 


ورژن ربات : 1",
  ]);

    }

    elseif($text === 'مطور') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        messageRequest('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"تحميل يوتيوب روبوت

المطور: @Mojtaba_mz1

مساعدة:
مع استخدام الروبوت يمكنك بسهولة تنزيل يوتيوب


نسخة من الروبوت: 1",
  ]);

    }

    elseif($text === 'developer') {
        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        messageRequest('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"Download YouTube Robot
Developer: @Mojtaba_mz1

Guide:
With the use of the robot you can easily download YouTube
Version of the robot: 1",
  ]);

    }

    else {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);
        
        messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => 'دستور وارد شده صحیح نمیباشد', 'reply_to_message_id' => $message_id]);

        messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => 'لطفا یکی از گزینه های زیر را انتخاب کنید','reply_markup' => [
            'resize_keyboard' => true,
            'keyboard' => [
                ['/image_admin', '/admin'],
                ['/publicmsg'],
                ['/panel', '/statistics'],
                [[
                    'text' => 'اشتراک شماره',
                    'request_contact' => true
                ],
                [
                    'text' => 'اشتراک مکان',
                    'request_location' => true
                ]]
            ]
        ]]);

        die;
    }
}