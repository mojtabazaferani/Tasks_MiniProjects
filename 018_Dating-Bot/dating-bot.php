<?php

ob_start();

error_reporting(E_ALL);

$conn = mysqli_connect('localhost', '????', '????', '????');

define('TOKEN', '????');

define('APIBOT', 'https://api.telegram.org/bot'.TOKEN. '/');

$content = file_get_contents('php://input');

$update = json_decode($content, true);

$language_bot = [
    'آ', 'ا', 'ب',
    'پ', 'ت', 'ث',
    'ج', 'چ', 'ح',
    'خ', 'د', 'ذ',
    'ر', 'ز', 'ژ',
    'س', 'ش', 'ص',
    'ض', 'ط', 'ظ',
    'ع', 'غ', 'ف',
    'ق', 'ک', 'گ',
    'ل', 'م', 'ن',
    'و', 'ه', 'ی',
];

$commands = [
'/start', '/lock_sticker',
'/unlock_sticker', 'راهنما📕',
'پروفایل🎭', 'به یک ناشناس وصلم کن😍',
'دخترم👩', 'پسرم👨🏼‍🦱',
"$account", '/getme',
'ارتباط با ادمین✍️', '/panel',
'/statistics', '/publicmsg',
"$sticker", 'public'
];

if(isset($update['message'])) {

    //--------------------------------------------------------

    //Message
    $text = $update['message']['text'];

    $update_id = $update['update_id'];

    $message_id = $update['message']['message_id'];

    //--------------------------------------------------------

    //From
    $from_id = $update['message']['from']['id'];

    $from_language_code = $update['message']['from']['language_code'];

    $from_first_name = $update['message']['from']['first_name'];

    $from_last_name = $update['message']['from']['last_name'];

    $from_username = $update['message']['from']['username'];

    //--------------------------------------------------------

        //Chat
        $chat_id = $update['message']['chat']['id'];

        $chat_first_name = $update['message']['chat']['first_name'];
    
        $chat_last_name = $update['message']['chat']['last_name'];
    
        $chat_user_name = $update['message']['chat']['username'];
    
        //--------------------------------------------------------
    
        //Reply
        // $reply_to_message = $update['message']['reply_to_message']['text'];
    
        // $reply_id = $update['message']['reply_to_message']['from']['id'];
    
        // $reply_username = $update['message']['reply_to_message']['from']['username'];
    
        // $reply_message_id = $update['message']['reply_to_message']['message_id'];
    
        //--------------------------------------------------------

        //Settings
        $cli_settings = "SELECT * FROM setting WHERE user_id = $from_id";

        $query = mysqli_query($conn, $cli_settings);

        $settings = mysqli_fetch_assoc($query);

        if($settings != null) {

            $info_sticker = $settings['sticker'];

        }else {

            $sql = "INSERT INTO setting(user_id) VALUES('$from_id')";

            mysqli_query($conn, $sql);
        }

        //--------------------------------------------------------

        //Files 
        $mojtaba = file_get_contents("mojtaba.txt");

        $admin = '????';

        //--------------------------------------------------------

        $photo_id = $update['message']['photo'][2]['file_id'];

        $sticker = $update['message']['sticker'];

//     if(isset($sticker)) {

//         if($info_sticker == 'قفل'){

//             messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

//             $message_id = $update['message']['message_id'];

//             messageRequest('deleteMessage', ['chat_id' => $chat_id, 'message_id' => $message_id]);

//             $msg = '❌ ارسال استیکر قفل میباشد ❌

//             میتوانید با ارسال دستور, ( unlock_sticker/ )  استیکر را باز کنید🔓

// /unlock_sticker
    
//             و یا میتوانید با ارسال دستور, lock_sticker/ استیکر را قفل کنید🔒

// /lock_sticker
    
//             پیش فرض قفل میباشد🔒';

//             messageRequest('sendMessage', ['chat_id' => $from_id, 'text' => $msg]);

//             die();

//         }else {

//             $verify_sticker = 'yes';

//         }

//     }else {

//         // Continue 

//     }

    $array = [];

    for($i = 0; $i < strlen($text); $i++) {

        $array[] = $text[$i];

    }

    // if(! in_array($array[0], $language_bot)) {
    //     if(! in_array($text, $commands)) {
    //         messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

    //         $message_id = $update['message']['message_id'];

    //         messageRequest('deleteMessage', ['chat_id' => $chat_id, 'message_id' => $message_id]);

    //         $msg = '❌ ارسال حروف و کلمات لاتین مجاز نمیباشد ❌';

    //         messageRequest('sendMessage', ['chat_id' => $from_id, 'text' => $msg]);

    //         // $war = json_decode($war, true);

    //         // $message_id_war = $war['result']['message_id'];

    //         // $edit = messageRequest('editMessageText', ['chat_id' => $chat_id, 'message_id' => $message_id, 'text' => 'please try again send message']);

    //         die();

    //     }else {

    //         // Continue

    //     }

    // }else {

    //     // Continue 

    // }

    //--------------------------------------------------------

    $sql = "SELECT * FROM member WHERE user_id = $from_id";

    $query = mysqli_query($conn, $sql);

    $result = mysqli_fetch_assoc($query);

    if($result != null) {
        $status = $result['status'];

        $sex = $result['sex'];

        $to_user_id = $result['to_user_id'];

        $name = $result['name'];

        $city = $result['city'];

        $state = $result['state'];

        $photo = $result['photo'];

        $account = $result['account'];

        $age = $result['age'];

    }else {
        $sql = "INSERT INTO member(user_id) VALUES('$from_id')";

        mysqli_query($conn, $sql);

        $sex = 0;

        $status = 0;

    }

    if($text === '/start') {

        $sql = "SELECT * FROM member WHERE user_id = $from_id";

        $query = mysqli_query($conn, $sql);

        $result = mysqli_fetch_assoc($query);

        $account = $result['account'];

        if($account == 'no') {

            $base = '/user_';

            $len = strlen($base);

            $chr = 'abcdefghijklmnopqrstuvxwyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';

            $random = substr(str_shuffle($chr), 0, $len);

            $base = $base . $random;

            $sql = "UPDATE member SET account = '$base' WHERE user_id = '$from_id'";

            mysqli_query($conn, $sql);

        }else{
            // Continue
        }

        $user = file_get_contents('Member.txt');
    
        $members = explode("\n", $user);
    
        if(! in_array($chat_id, $members)) {
    
            $add_user = file_get_contents('Member.txt');
    
            $add_user .= $chat_id . "\n";
    
            file_put_contents('Member.txt', $add_user);
        }else {
            // Continue
        }

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        $msg = 'خوش اومدی😍 حالا چیکار کنیم🤔

        از گزینه های زیر انتخاب کن👇
        
        راستی یک پروفایل هم ایجاد شد برات😳
        
        برای دیدن پروفایلت, روی گزینه پروفایل بزن🎭';

        messageRequest('sendMessage', ['chat_id' => $from_id, 'text' => $msg, 'reply_markup' => [
            'resize_keyboard' => true,
            'keyboard' => [
                ['به یک ناشناس وصلم کن😍'],
                ['پروفایل🎭', 'راهنما📕', 'ارتباط با ادمین✍️']
                ]
        ]]);
    }

    elseif($text == '/unlock_sticker') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        $sql = "UPDATE setting SET sticker = 'باز' WHERE user_id = '$from_id'";

        mysqli_query($conn, $sql);

        $msg = 'ارسال استیکر با موفقیت باز شد✅🔓';

        messageRequest('sendMessage', ['chat_id' => $from_id, 'text' => $msg]);

    }

    elseif($text == '/lock_sticker') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        $sql = "UPDATE setting SET sticker = 'باز' WHERE user_id = '$from_id'";

        mysqli_query($conn, $sql);

        $msg = ' ارسال استیکر با موفقیت قفل شد✅🔒';

        messageRequest('sendMessage', ['chat_id' => $from_id, 'text' => $msg]);

    }

    elseif($text === 'راهنما📕') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        $msg = '🔹راهنمای استفاده از ربات:';

        messageRequest('sendMessage', ['chat_id' => $from_id, 'text' => $msg]);

    }

    elseif($text === 'پروفایل🎭') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        $sql = "SELECT * FROM member WHERE user_id = $from_id";

        $query = mysqli_query($conn, $sql);

        $result = mysqli_fetch_assoc($query);

        $values = ['اسم' => $name, 'سن' => $age,'استان' =>  $state,'شهر' => $city, 'جنسیت' => $sex, 'ID' => $account];

        $arrayKeys = array_keys($values);

        $arrayValues = array_values($values);

        $caption = "
        
        $arrayKeys[0] : $arrayValues[0]

        $arrayKeys[1] : $arrayValues[1]
        
        $arrayKeys[2] : $arrayValues[2]
        
        $arrayKeys[3] : $arrayValues[3]
        
        $arrayKeys[4] : $arrayValues[4]
        
        $arrayKeys[5] : $arrayValues[5]";

        $trim = trim($caption);

        $pro = messageRequest('sendPhoto', ['chat_id' => $from_id, 'photo' => $photo, 'caption' => $trim]);

        $message_id_photo = json_decode($pro, true);

        $message_id_photo = $message_id_photo['result']['message_id'];

        $msg = 'روی گزینه های زیر👇بزن و پروفایلتو🎭 تکمیل کن😍
        با پروفایل تکمیل, دوست های بهتری میتونی پیدا کنی😜';

        messageRequest('sendMessage', ['chat_id' => $from_id, 'text' => $msg, 'reply_markup' => [
            'resize_keyboard' => true,
            'keyboard' => [
                    ['بازگشت'],
                    ['جنسیت'],
                    ['اسم', 'شهر'],
                    ['سن', 'عکس']
            ]
        ]]);
        
    }

    elseif($text === 'به یک ناشناس وصلم کن😍' && $status != 2) {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        $msg = 'از گزینه های زیر👇تایپ جستجو را تعیین کنید :';

        messageRequest('sendMessage', ['chat_id' => $from_id, 'text' => $msg, 'reply_markup' => [
            'resize_keyboard' => true,
            'keyboard' => [
                ['جستجوی شانسی🎲'],
                ['جستجوی پسر👨🏼‍🦱', 'جستجوی دختر👩']
            ]
        ]]);
        
    }

    elseif($text === 'جستجوی شانسی🎲') {

        if($status == 1) {

            $msg = 'دو دقیقه دندون رو جیگر بزار😒

            دارم پیدا میکنم🔍';

            messageRequest('sendMessage', ['chat_id' => $from_id, 'text' => $msg]);

            die();
        }

        $waitingUser = "SELECT * FROM member WHERE status = 1 ORDER BY RAND() LIMIT 1";

        $query = mysqli_query($conn, $waitingUser);

        $result = mysqli_fetch_assoc($query);

        if($result != null) {

            $waiting_user_id = $result['user_id'];

            $sql1 = "UPDATE member SET to_user_id = '$waiting_user_id', status = 2 WHERE user_id = '$from_id'";

            mysqli_query($conn, $sql1);

            $sql2 = "UPDATE member SET to_user_id = '$from_id', status = 2 WHERE user_id = '$waiting_user_id'";

            mysqli_query($conn, $sql2);

            $msg = 'وصلت کردم😍

            به مخاطبت سلام کن🖐';

            messageRequest('sendMessage', ['chat_id' => $from_id, 'text' => $msg, 'reply_markup' => [
                'resize_keyboard' => true,
                'keyboard' => [
                    ['قطع مکالمه'],
                    ['مشاهده پروفایل مخاطب']
                ]
            ]]);

            messageRequest('sendMessage', ['chat_id' => $waiting_user_id, 'text' => $msg, 'reply_markup' => [
                'resize_keyboard' => true,
                'keyboard' => [
                    ['قطع مکالمه']
                ]
            ]]);

            die();

        }else {
            $sql = "UPDATE member SET status = 1 WHERE user_id = '$from_id'";

            mysqli_query($conn, $sql);

            $msg = 'درحال برقراری اتصال

            لطفا صبر کنید ';

            messageRequest('sendMessage', ['chat_id' => $from_id, 'text' => $msg]);
        }
       
    }

    elseif($text ==  'جستجوی دختر👩') {

        if($status == 1) {

            $msg = 'دو دقیقه دندون رو جیگر بزار😒

            دارم پیدا میکنم🔍';

            messageRequest('sendMessage', ['chat_id' => $from_id, 'text' => $msg]);

            die();
        }

        $waitingUser = "SELECT * FROM member WHERE status = 1 AND sex = 'دختر' ORDER BY RAND() LIMIT 1";

        $query = mysqli_query($conn, $waitingUser);

        $result = mysqli_fetch_assoc($query);

        if($result != null) {

            $waiting_user_id = $result['user_id'];

            $sql1 = "UPDATE member SET to_user_id = '$waiting_user_id', status = 2 WHERE user_id = '$from_id'";

            mysqli_query($conn, $sql1);

            $sql2 = "UPDATE member SET to_user_id = '$from_id', status = 2 WHERE user_id = '$waiting_user_id'";

            mysqli_query($conn, $sql2);

            $msg = 'وصلت کردم😍

            به مخاطبت سلام کن🖐';

            messageRequest('sendMessage', ['chat_id' => $from_id, 'text' => $msg, 'reply_markup' => [
                'resize_keyboard' => true,
                'keyboard' => [
                    ['قطع مکالمه']
                ]
            ]]);

            messageRequest('sendMessage', ['chat_id' => $waiting_user_id, 'text' => $msg, 'reply_markup' => [
                'resize_keyboard' => true,
                'keyboard' => [
                    ['قطع مکالمه']
                ]
            ]]);

            die();

        }else {

            $sql = "UPDATE member SET status = 1 WHERE user_id = '$from_id'";

            mysqli_query($conn, $sql);

            $msg = 'درحال برقراری اتصال

            لطفا صبر کنید ';

            messageRequest('sendMessage', ['chat_id' => $from_id, 'text' => $msg]);
        }
    }

    elseif($text == 'جستجوی پسر👨🏼‍🦱') {

        if($status == 1) {

            $msg = 'دو دقیقه دندون رو جیگر بزار😒

            دارم پیدا میکنم🔍';

            messageRequest('sendMessage', ['chat_id' => $from_id, 'text' => $msg]);

            die();
        }

        $waitingUser = "SELECT * FROM member WHERE status = 1 AND sex = 'پسر👨🏼‍🦱' ORDER BY RAND() LIMIT 1";

        $query = mysqli_query($conn, $waitingUser);

        $result = mysqli_fetch_assoc($query);

        if($result != null) {

            $waiting_user_id = $result['user_id'];



            $sql1 = "UPDATE member SET to_user_id = '$waiting_user_id', status = 2 WHERE user_id = '$from_id'";

            mysqli_query($conn, $sql1);

            $sql2 = "UPDATE member SET to_user_id = '$from_id', status = 2 WHERE user_id = '$waiting_user_id'";

            mysqli_query($conn, $sql2);

            $msg = 'وصلت کردم😍

            به مخاطبت سلام کن🖐';

            messageRequest('sendMessage', ['chat_id' => $from_id, 'text' => $msg, 'reply_markup' => [
                'resize_keyboard' => true,
                'keyboard' => [
                    ['قطع مکالمه']
                ]
            ]]);

            messageRequest('sendMessage', ['chat_id' => $waiting_user_id, 'text' => $msg, 'reply_markup' => [
                'resize_keyboard' => true,
                'keyboard' => [
                    ['قطع مکالمه']
                ]
            ]]);

            die();

        }else {

            $sql = "UPDATE member SET status = 1 WHERE user_id = '$from_id'";

            mysqli_query($conn, $sql);

            $msg = 'درحال برقراری اتصال

            لطفا صبر کنید ';

            messageRequest('sendMessage', ['chat_id' => $from_id, 'text' => $msg]);
        }
    }

    elseif($status == 2 && $text == 'قطع مکالمه') {

        $sql1 = "UPDATE member SET to_user_id = 0, status = 0 WHERE user_id = '$from_id'";

        mysqli_query($conn, $sql1);

        $sql2 = "UPDATE member SET to_user_id = 0, status = 0 WHERE user_id = '$to_user_id'";

        mysqli_query($conn, $sql2);

        $msg = 'مکالمه قطع شد😕';

        messageRequest('sendMessage', ['chat_id' => $from_id, 'text' => $msg, 'reply_markup' => [
            'resize_keyboard' => true,
            'keyboard' => [
                ['به یک ناشناس وصلم کن😍'],
                ['پروفایل🎭', 'راهنما📕', 'ارتباط با ادمین✍️']
                ]
        ]]);
    }

    elseif($text != '' && $status == 2) {

        messageRequest('sendMessage', ['chat_id' => $to_user_id, 'text' => $text]);
    }

    elseif($text === 'دخترم👩') {

        //dokhtar = 1

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        $sql = "UPDATE member SET sex = 'دختر' WHERE user_id = '$from_id'";

        mysqli_query($conn, $sql);

        $msg = 'باشه عزیزم ثبتت کردم😜

        حالا با زدن دکمه زیر, چت رو شروع کن😍';

        messageRequest('sendMessage', ['chat_id' => $from_id, 'text' => $msg, 'reply_markup' => [
            'resize_keyboard' => true,
            'keyboard' => [
                ['بازگشت'],
                ['به یک ناشناس وصلم کن😍']
            ]
        ]]);

    }

    elseif($text === 'پسرم👨🏼‍🦱') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        $sql = "UPDATE member SET sex = 'پسر' WHERE user_id = '$from_id'";

        mysqli_query($conn, $sql);

        $msg = 'باشه عزیزم ثبتت کردم😜

        حالا با زدن دکمه زیر, چت رو شروع کن😍';

        messageRequest('sendMessage', ['chat_id' => $from_id, 'text' => $msg, 'reply_markup' => [
            'resize_keyboard' => true,
            'keyboard' => [
                ['بازگشت'],
                ['به یک ناشناس وصلم کن😍']
            ]
        ]]);
    }

    elseif($text === 'بازگشت') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        $last_massage_id = --$message_id;

        for($i = 0; $i  < 2; $i++) {

            messageRequest('deleteMessage', ['chat_id' => $chat_id, 'message_id' => $last_massage_id]);

            $last_massage_id--;

        }

        $msg = 'مجددا به منوی اصلی خوش آمدید😜

        از گزینه های زیر پیش برو👇';

        messageRequest('sendMessage', ['chat_id' => $from_id, 'text' => $msg, 'reply_markup' => [
            'resize_keyboard' => true,
            'keyboard' => [
                ['به یک ناشناس وصلم کن😍'],
                ['پروفایل🎭', 'راهنما📕', 'ارتباط با ادمین✍️']
                ]
        ]]);
    }

    elseif($text === '/getme') {

        $msg = "update_id => $update_id
        ✍️✍️✍️✍️
        message : {
        (messeage_id => $message_id)

        🗣🗣🗣🗣
        from :
        (id = > $from_id)
        (is_bot => $from_is_bot)
        (first_name => $from_first_name)
        (last_name => $from_last_name)
        (username => $from_username)
        (language_code => $from_language_code)

        💬💬💬💬
        chat : 
        (id => $chat_id)
        (first_name => $chat_first_name)
        (last_name => $chat_last_name)
        (username => $chat_user_name)
        (type => $chat_type)

        📅📅📅📅
        (date => $date)

        📝📝📝📝
        (text => $text)

        🛠🛠🛠🛠
        entities :
        (offset =>$offset)
        (length => $length)
        (type => $entities_type)
        }";

        messageRequest('sendMessage', ['chat_id' => $from_id, 'text' => $msg]);

    }

    elseif($text == 'ارتباط با ادمین✍️') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        $msg = 'ادمین ربات :

        @Mojtaba_mz1';

        messageRequest('sendMessage', ['chat_id' => $from_id, 'text' => $msg]);

    }

    elseif($text === 'جنسیت') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        file_put_contents("mojtaba.txt","sex");

        $msg = 'دختری یا پسر کلللک؟!!😜';

        messageRequest('sendMessage', ['chat_id' => $from_id, 'text' => $msg, 'reply_markup' => [
            'resize_keyboard' => true,
            'keyboard' => [
                ['دخترم👩', 'پسرم👨🏼‍🦱']
            ]
        ]]);

    }

    elseif($mojtaba == 'sex') {

        if($text != 'دخترم👩' || $text != 'پسرم👨🏼‍🦱') {

            messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

            $msg = '❌ بین دو گزینه انتخاب کنید ❌';

            messageRequest('sendMessage', ['chat_id' => $from_id, 'text' => $msg, 'reply_markup' => [
                'resize_keyboard' => true,
                'keyboard' => [
                    ['دخترم👩', 'پسرم👨🏼‍🦱']
                ]
            ]]);

        }else {

            //die();

        }
    }

    elseif($text === '/panel' && $from_id === $admin) {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);
    
        messageRequest('sendmessage', [
                    'chat_id' =>$from_id,
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

    elseif($text === '/statistics' && $from_id == $admin){

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        $user = file_get_contents("Member.txt");
    
        $member_id = explode("\n",$user);
    
        $member_count = count($member_id) -1;

        messageRequest('sendMessage', ['chat_id' => $from_id, 'text' => $member_count, 'parse_mode' => 'HTML']);

    }

    elseif($text === '/publicmsg' && $from_id === $admin) {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing ']);

        file_put_contents("mojtaba.txt","bc");

        messageRequest('sendMessage',[
            'chat_id'=>$from_id,
            'text'=>" پیام مورد نظر رو در قالب متن بفرستید:",
            'parse_mode'=>'html',
            'reply_markup'=>json_encode([
              'keyboard'=>[
              [['text'=>'/panel']],
              ],'resize_keyboard'=>true])
          ]);
    }

    elseif($mojtaba === 'bc' && $from_id === $admin) {

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

    else {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        $msg = 'متوجه منظورت نشدم🤔

        از گزینه های زیر پیش برو👇';

        messageRequest('sendMessage', ['chat_id' => $from_id, 'text' => $msg, 'reply_markup' => [
            'resize_keyboard' => true,
            'keyboard' => [
                ['به یک ناشناس وصلم کن😍'],
                ['پروفایل🎭', 'راهنما📕', 'ارتباط با ادمین✍️']
            ]
        ]]);    

    }
}

function messageRequest($method, $parameters = [])
{
    $parameters['method'] = $method;

    $ch = curl_init(APIBOT);

    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($parameters));

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

    curl_setopt($ch, CURLOPT_TIMEOUT, 60);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));

    $result = curl_exec($ch);

    return $result;
}

function createRandumId()
{
    $base = '/user_';

    $len = strlen($base);

    $chr = 'abcdefghijklmnopqrstuvxwyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';

    $random = substr(str_shuffle($chr), 0, $len);

    $base = $base . $random;

    return $base;
}

function sendMessage($chat_id, $text, $mode)
{
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => $text,
        'parse_mode' => $mode
    ]);
}