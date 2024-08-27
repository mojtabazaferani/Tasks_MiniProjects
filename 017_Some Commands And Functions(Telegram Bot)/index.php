<?php

/**
 * Description.
 * Working With A Series Of Methods
 * And
 * How To Use Them In A Super Group Environment.
 */

$conn = mysqli_connect('localhost', '???', '???', '???');

define('TOKEN', '???');

define('APIBOT', 'https://api.telegram.org/bot'.TOKEN. '/');

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

$content = file_get_contents('php://input');

$update = json_decode($content, true);

if(isset($update['message'])) {

    //--------------------------------------------------------

    //Message
    $text = $update['message']['text'];

    $update_id = $update['update_id'];

    $message_id = $update['message']['message_id'];

    //--------------------------------------------------------

    //From
    $from_id = $update['message']['from']['id'];

    $from_is_bot = $update['message']['from']['is_bot'];

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

    $chat_type = $update['message']['chat']['type'];

    $groupname = $update['message']['chat']['title'];

    $new_chat_member = $update['message']['new_chat_member'];

    $new_chat_member_id = $new_chat_member['id'];

    $new_chat_member_first_name = $new_chat_member['first_name'];

    $new_chat_member_last_name = $new_chat_member['last_name'];

    $new_chat_member_username = $new_chat_member['username'];

    $new_chat_member_username = $new_chat_member['username'];

    $left_chat_member = $update['message']['left_chat_member'];

    $left_chat_member_id = $left_chat_member['id'];

    $left_chat_member_first_name = $left_chat_member['first_name'];

    $left_chat_member_last_name = $left_chat_member['last_name'];

    //--------------------------------------------------------

    //Reply
    $reply_to_message = $update['message']['reply_to_message']['text'];

    $reply_id = $update['message']['reply_to_message']['from']['id'];

    $reply_username = $update['message']['reply_to_message']['from']['username'];

    $reply_message_id = $update['message']['reply_to_message']['message_id'];

    //--------------------------------------------------------

    //Files 
    $details = file_get_contents('details.txt');

    $admin = 84723281;

    $banned = "ban $from_username";

    //--------------------------------------------------------

    //Date
    $date = $update['message']['date'];

    //--------------------------------------------------------

    //Querys
    $callback_query = $update['callback_query'];

    $callback_id = $callback_query['id'];

    $callback_chat_id = $callback_query['message']['from']['id'];

    $callback_pv_id = $callback_query['from']['id'];

    $callback_data = $update['callback_query']['data'];

    $callback_message_id = $callback_query['message']['message_id'];

    $callback_text = $callback_query['message']['text'];

    //--------------------------------------------------------

    //Entities
    $offset = $update['message']['entities'][0]['offset'];

    $length = $update['message']['entities'][0]['length'];

    $entities_type = $update['message']['entities'][0]['type'];

    if($new_chat_member != '') {

        $id = $new_chat_member_id;

        $welcome = 'Welcom To Group @' . $new_chat_member_username;

        messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => $welcome]);

        messageRequest('deleteMessage', ['chat_id' => $chat_id, 'message_id' => $last_massage_id]);

    }

    if ($left_chat_member_id != '') {

        $leave_message = "کاربر " . $left_chat_member_first_name . " " . $left_chat_member_last_name . " گروه را ترک کرد";
    
        messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => $leave_message]);
        }


    if($text === '/start' || $text === 'شروع') {
        date_default_timezone_set('iran');
        
        $date = date('Y/m/d G:i:s');

        $msg = 'Welcome To Bot '.$from_username. ' My Dear❤️😜';

        $msg .= "Your Start Date : " . $date;

        messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => $msg, 'reply_markup' => ['keyboard' => $button, 'resize_keyboard' => true]]);
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

        messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => $msg]);
    }

    elseif($text === '/getmegp') {
        messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => $update]);
    }

    elseif($text === '/gpname' || $text === 'اسم گروه') {
        messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => $groupname]);
    }

    elseif($text === '/changetitle' || $text === 'تغییر اسم گروه') {
        file_put_contents('details.txt', 'title');

        messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => 'Type The Name Of The Group :']);
    }

    elseif($details === 'title') {

        file_put_contents('details.txt', 'none');

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => 'The Group Name Has Been Changed Successfully✅']);

        messageRequest('setChatTitle', ['chat_id' => $chat_id, 'title' => $text]);
    }

    elseif($text === '/getchataddmins' || $text === 'ادمین ها') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        $getAddmins = messageRequest('getChatAdministrators', ['chat_id' => $chat_id]);

        $updateGetAddmins = json_decode($getAddmins, true);

        $addmins = [];

        $counter = 0;
        
        while($counter < 100) {
            if(in_array(null, $addmins)) {
                break;
            }

            $list = $updateGetAddmins['result'][$counter]['user']['username'];

            array_push($addmins, $list);

            $counter++;
        }

        $counter = 0;

        $count = 1;

        $filter = array_filter($addmins, function($value){return $value !== null;});

        messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => $filter]);

    }

    elseif($text === '/locked') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        $ban = messageRequest('setChatPermissions', ['chat_id' => $chat_id, 'permissions' => ['can_send_messages' => false]]);

        messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => $ban]);

    }

    elseif($text === '/unlock') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        $ban = messageRequest('setChatPermissions', ['chat_id' => $chat_id, 'permissions' => ['can_send_messages' => true]]);

        messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => $ban]);

    }

    elseif($text === '/delete') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        $last_massage_id = --$message_id;

        for($i = 0; $i  < 10; $i++) {

            $ban = messageRequest('deleteMessage', ['chat_id' => $chat_id, 'message_id' => $last_massage_id]);

            messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => $ban]);

            $last_massage_id--;

        }
    }

    elseif($text === '/getchat') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        $chat = messageRequest('getChat', ['chat_id' => $chat_id]);

        messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => $chat]);

    }

    elseif($text === '/members' || $text === 'اعضا') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        $countMembers = messageRequest('getChatMemberCount', ['chat_id' => $chat_id]);

        $countMembers = json_decode($countMembers, true);

        $countMembers = $countMembers['result'];

        messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => $countMembers]);

    }

    elseif($text === '/link' || $text === 'لینک') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        $get = messageRequest('getChat', ['chat_id' => $chat_id]);

        $get = json_decode($get, true);

        $get = $get['result']['invite_link'];

        messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => $get]);

    }

    elseif($text === 'bio reg') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        $sql = "INSERT IGNORE INTO asl(username, asl) VALUES('$reply_username', '$reply_to_message')";

        mysqli_query($conn, $sql);

        $msg = 'Successfully';

        messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => $welcome, 'message_id' => $message_id]);

    }

    elseif($text === 'my bio') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        $sql = "SELECT * FROM asl WHERE username= '$from_username'";

        $query = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($query)) {

            $asl = $row['asl'];

            $message = "$asl : اصل من";

            messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => $message]);

        }
    }
    
    elseif($text === 'bio') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        $sql = "SELECT * FROM asl WHERE username = '$reply_username'";

        $query = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($query)) {

            $asl = $row['asl'];

            $message = "$asl : اصل کاربر";

            messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => $message, 'reply_to_message_id' => $message_id]);

        }
    }

    elseif($text === 'free') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        messageRequest('setChatPermissions', ['chat_id' => $chat_id, 'permissions' => 
        [
            'can_send_messages' => true,
            'can_send_audios' => true,
            'can_send_documents' => true,
            'can_send_photos' => true,
            'can_send_videos' => true,
            'can_send_video_notes' => true,
            'can_send_voice_notes' => true,
            'can_send_polls' => true,
            'can_send_other_messages' => true,
            'can_invite_users' => true,
            'can_pin_messages' => true,
            'can_manage_topics' => true
        ]]);

        messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => 'گروه از حالت محدود خارج شد✅', 'reply_to_message_id' => $message_id]);

    }

    elseif($text === 'limited') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        messageRequest('setChatPermissions', ['chat_id' => $chat_id, 'permissions' => 
        [
            'can_send_messages' => true,
            'can_send_audios' => false,
            'can_send_documents' => false,
            'can_send_photos' => false,
            'can_send_videos' => false,
            'can_send_video_notes' => false,
            'can_send_voice_notes' => false,
            'can_send_polls' => false,
            'can_send_other_messages' => false,
            'can_invite_users' => false,
            'can_pin_messages' => false,
            'can_manage_topics' => false
        ]]);

        messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => 'گروه  محدود  شد✅ (فقط پیام متنی در دسترس است❗️)', 'reply_to_message_id' => $message_id]);
    }

    elseif($text === 'silent') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        messageRequest('restrictChatMember', ['chat_id' => $chat_id, 'user_id' => $reply_id, 'permissions' => 
        [
            'can_send_messages' => false
        ]]);

        $silent = "کاربر سکوت شد✅";

        messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => $silent, 'reply_to_message_id' => $message_id]);

    }

    elseif($text === 'promote') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        messageRequest('promoteChatMember', ['chat_id' => $chat_id, 'user_id' => $reply_id]);

        messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => 'karbar admin shod']);

    }

    elseif($text === 'laghab') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        messageRequest('setChatAdministratorCustomTitle', ['chat_id' => $chat_id, 'user_id' => $reply_id, 'custom_title' => 'love']);

        messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => 'set shod', 'message_id' => $message_id]);

    }

    elseif($text === 'ban') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        messageRequest('banChatMember', ['chat_id' => $chat_id, 'user_id' => $reply_id]);

        $banned = "کاربر بن شد✅";

        messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => $banned, 'reply_to_message_id' => $message_id]);

    }
    
    elseif($text === 'pin') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        messageRequest('pinChatMessage', ['chat_id' => $chat_id, 'message_id' => $reply_message_id]);

        $pin = "پیام مد نظر سنجاق شد✅";

        messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => $pin, 'reply_to_message_id' => $message_id]);

    }

    // elseif($text === 'unpin') {

    //     messageRequest('unpinChatMessage', ['chat_id' => $chat_id, 'message_id' => $reply_id]);

    //     $unPin = "پیام مد نظر از سنجاق خارج شد✅♻️";

    //     messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => $unPin, 'reply_to_message_id' => $message_id]);
    // }

    // elseif($text === 'unpinall') {

    //     messageRequest('unpinAllChatMessages', ['chat_id' => $chat_id]);

    // }

    elseif($text === 'warning') {

        $sql = "INSERT IGNORE INTO warning(username, warnings) VALUES('$reply_username', 1)";

        mysqli_query($conn, $sql);

        $sql2 = "UPDATE warning SET warnings = 2 WHERE username = $reply_username";

        mysqli_query($conn, $sql2);

        // $sql2 = "UPDATE warning SET warnings =+ 1 WHERE username = $reply_username";

        // mysqli_query($conn, $sql2);

    }

    elseif($text === 'unban') {

        messageRequest('sendChatAction', ['chat_id' => $chat_id, 'action' => 'typing']);

        messageRequest('unbanChatMember', ['chat_id' => $chat_id, 'user_id' => $reply_id]);

        $unBan = "کاربر از حالت بن خارج شد✅";

        messageRequest('sendMessage', ['chat_id' => $chat_id, 'text' => $unBan, 'reply_to_message_id' => $message_id]);

    }
}

//---------------------------------------------------


