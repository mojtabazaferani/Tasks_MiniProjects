
# Important Methods For Making a Telegram Bot :

## getMe

A simple method for testing your bot's authentication token. Requires no parameters. Returns basic information about the bot in form of 

a User object.

## sendMessage

Use this method to send text messages. On success, the sent Message is returned.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target channel (in the format              @channelusername)

message_thread_id | Integer | Optional | Unique identifier for the target message thread (topic) of the forum; for forum supergroups only

text | String | Yes | Text of the message to be sent, 1-4096 characters after entities parsing

parse_mode | String | Optional | Mode for parsing entities in the message text. See formatting options for more details.

entities | Array of MessageEntity | Optional | A JSON-serialized list of special entities that appear in message text, which can be specified instead of parse_mode

disable_web_page_preview | Boolean | Optional | Disables link previews for links in this message

disable_notification | Boolean | Optional | Sends the message silently. Users will receive a notification with no sound.

protect_content | Boolean | Optional | Protects the contents of the sent message from forwarding and saving

reply_to_message_id | Integer | Optional | If the message is a reply, ID of the original message

allow_sending_without_reply | Boolean | Optional | Pass True if the message should be sent even if the specified replied-to message is  not found

reply_markup | 	InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply | Optional | Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.

## sendPhoto

Use this method to send photos. On success, the sent Message is returned.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target channel (in the format @channelusername)

message_thread_id | Integer | Optional | Unique identifier for the target message thread (topic) of the forum; for forum supergroups only

photo | InputFile or String | Yes | Photo to send. Pass a file_id as String to send a photo that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a photo from the Internet, or upload a new photo using multipart/form-data. The photo must be at most 10 MB in size. The photo's width and height must not exceed 10000 in total. Width and height ratio must be at most 20. More information on Sending Files »

caption | String | Optional | Photo caption (may also be used when resending photos by file_id), 0-1024 characters after entities parsing

parse_mode | String | Optional | Mode for parsing entities in the photo caption. See formatting options for more details. 

caption_entities | Array of MessageEntity | Optional | A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode

has_spoiler | Boolean | Optional | Pass True if the photo needs to be covered with a spoiler animation

disable_notification | Boolean | Optional | Sends the message silently. Users will receive a notification with no sound.

reply_to_message_id | Integer | Optional | If the message is a reply, ID of the original message

allow_sending_without_reply | Boolean | Optional | Pass True if the message should be sent even if the specified replied-to message is not found

reply_markup | InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply | Optional | Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.

## sendAudio

Use this method to send audio files, if you want Telegram clients to display them in the music player. Your audio must be in the .MP3 

or .M4A format. On success, the sent Message is returned. Bots can currently send audio files of up to 50 MB in size, this limit may be

changed in the future.

For sending voice messages, use the sendVoice method instead.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target channel (in the format              @channelusername)

message_thread_id | Integer | Optional | Unique identifier for the target message thread (topic) of the forum; for forum supergroups only

audio | InputFile or String | Yes | Audio file to send. Pass a file_id as String to send an audio file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get an audio file from the Internet, or upload a new one using multipart/form-data. More information on Sending Files »

caption | String | Optional | Photo caption (may also be used when resending photos by file_id), 0-1024 characters after entities parsing

parse_mode | String | Optional | Mode for parsing entities in the message text. See formatting options for more details.

caption_entities | Array of MessageEntity | Optional | A JSON-serialized list of special entities that appear in message text, which can be specified instead of parse_mode

duration | Integer | Optional | Duration of the audio in seconds

performer | String | Optional | Performer

title | String | Optional | Track name

thumb | InputFile or String | Optional | Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »

disable_notification | Boolean | Optional | 	Sends the message silently. Users will receive a notification with no sound.

protect_content | Boolean | Optional | Protects the contents of the sent message from forwarding and saving

reply_to_message_id | Integer | Optional | 	If the message is a reply, ID of the original message

allow_sending_without_reply | Boolean | Optional | Pass True if the message should be sent even if the specified replied-to message is  not found

reply_markup | 	InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply | Optional | Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.

## sendDocument

Use this method to send general files. On success, the sent Message is returned. Bots can currently send files of any type of up to 50

MB in size, this limit may be changed in the future.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target channel (in the format              @channelusername)

message_thread_id | Integer | Optional | Unique identifier for the target message thread (topic) of the forum; for forum supergroups only

document | InputFile or String | Yes | 	File to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More information on Sending Files »

thumb | InputFile or String | Optional | Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »

caption | String | Optional | Photo caption (may also be used when resending photos by file_id), 0-1024 characters after entities parsing

parse_mode | String | Optional | Mode for parsing entities in the message text. See formatting options for more details.

caption_entities | Array of MessageEntity | Optional | A JSON-serialized list of special entities that appear in message text, which can be specified instead of parse_mode

disable_content_type_detection | Boolean | Optional	| Disables automatic server-side content type detection for files uploaded using multipart/form-data

disable_notification | Boolean | Optional | 	Sends the message silently. Users will receive a notification with no sound.

reply_to_message_id | Integer | Optional | 	If the message is a reply, ID of the original message

allow_sending_without_reply | Boolean | Optional | Pass True if the message should be sent even if the specified replied-to message is  not found

reply_markup | 	InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply | Optional | Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.

## sendVideo

Use this method to send video files, Telegram clients support MPEG4 videos (other formats may be sent as Document). On success, the sent

Message is returned. Bots can currently send video files of up to 50 MB in size, this limit may be changed in the future.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target channel (in the format              @channelusername)

message_thread_id | Integer | Optional | Unique identifier for the target message thread (topic) of the forum; for forum supergroups only

video | InputFile or String | Yes | Video to send. Pass a file_id as String to send a video that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a video from the Internet, or upload a new video using multipart/form-data. More information on Sending Files »

duration | Integer | Optional | Duration of the audio in seconds

width | Integer | Optional | Video width

height | Integer | Optional | Video height

thumb | InputFile or String | Optional | Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »

caption | String | Optional | Photo caption (may also be used when resending photos by file_id), 0-1024 characters after entities parsing

parse_mode | String | Optional | Mode for parsing entities in the message text. See formatting options for more details.

caption_entities | Array of MessageEntity | Optional | A JSON-serialized list of special entities that appear in message text, which can be specified instead of parse_mode

has_spoiler | Boolean | Optional | Pass True if the photo needs to be covered with a spoiler animation

supports_streaming | Boolean | Optional | Pass True if the uploaded video is suitable for streaming

disable_notification | Boolean | Optional | Sends the message silently. Users will receive a notification with no sound.

protect_content | Boolean | Optional | Protects the contents of the sent message from forwarding and saving

reply_to_message_id | Integer | Optional | 	If the message is a reply, ID of the original message

allow_sending_without_reply | Boolean | Optional | Pass True if the message should be sent even if the specified replied-to message is  not found

reply_markup | 	InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply | Optional | Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.

## sendAnimation

Use this method to send animation files (GIF or H.264/MPEG-4 AVC video without sound). On success, the sent Message is returned. Bots

can currently send animation files of up to 50 MB in size, this limit may be changed in the future.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target channel (in the format              @channelusername)

message_thread_id | Integer | Optional | Unique identifier for the target message thread (topic) of the forum; for forum supergroups only

animation | InputFile or String | Yes | Animation to send. Pass a file_id as String to send an animation that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get an animation from the Internet, or upload a new animation using multipart/form-data. More information on Sending Files »

duration | Integer | Optional | Duration of the audio in seconds

width | Integer | Optional | Video width

height | Integer | Optional | Video height

thumb | InputFile or String | Optional | Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »

caption | String | Optional | Photo caption (may also be used when resending photos by file_id), 0-1024 characters after entities parsing

parse_mode | String | Optional | Mode for parsing entities in the message text. See formatting options for more details.

caption_entities | Array of MessageEntity | Optional | A JSON-serialized list of special entities that appear in message text, which can be specified instead of parse_mode

has_spoiler | Boolean | Optional | Pass True if the photo needs to be covered with a spoiler animation

disable_notification | Boolean | Optional | 	Sends the message silently. Users will receive a notification with no sound.

protect_content | Boolean | Optional | Protects the contents of the sent message from forwarding and saving

reply_to_message_id | Integer | Optional | 	If the message is a reply, ID of the original message

allow_sending_without_reply | Boolean | Optional | Pass True if the message should be sent even if the specified replied-to message is  not found

reply_markup | 	InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply | Optional | Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.

## sendVoice

Use this method to send audio files, if you want Telegram clients to display the file as a playable voice message. For this to work,

your audio must be in an .OGG file encoded with OPUS (other formats may be sent as Audio or Document). On success, the sent Message is 

returned. Bots can currently send voice messages of up to 50 MB in size, this limit may be changed in the future.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target channel (in the format              @channelusername)

message_thread_id | Integer | Optional | Unique identifier for the target message thread (topic) of the forum; for forum supergroups only

voice | InputFile or String | Yes | Audio file to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More information on Sending Files »

caption | String | Optional | Photo caption (may also be used when resending photos by file_id), 0-1024 characters after entities parsing

parse_mode | String | Optional | Mode for parsing entities in the message text. See formatting options for more details.

caption_entities | Array of MessageEntity | Optional | A JSON-serialized list of special entities that appear in message text, which can be specified instead of parse_mode

duration | Integer | Optional | Duration of the audio in seconds

disable_notification | Boolean | Optional | 	Sends the message silently. Users will receive a notification with no sound.

protect_content | Boolean | Optional | Protects the contents of the sent message from forwarding and saving

reply_to_message_id | Integer | Optional | 	If the message is a reply, ID of the original message

allow_sending_without_reply | Boolean | Optional | Pass True if the message should be sent even if the specified replied-to message is  not found

reply_markup | 	InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply | Optional | Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.

## sendMediaGroup

Use this method to send a group of photos, videos, documents or audios as an album. Documents and audio files can be only grouped in an 

album with messages of the same type. On success, an array of Messages that were sent is returned.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | 	Unique identifier for the target chat or username of the target channel (in the format @channelusername)

message_thread_id | Integer | Optional | Unique identifier for the target message thread (topic) of the forum; for forum supergroups only

media | Array of InputMediaAudio, InputMediaDocument, InputMediaPhoto and InputMediaVideo | Yes | A JSON-serialized array describing messages to be sent, must include 2-10 items

disable_notification | Boolean | Optional | 	Sends the message silently. Users will receive a notification with no sound.

protect_content | Boolean | Optional | Protects the contents of the sent message from forwarding and saving

reply_to_message_id | Integer | Optional | 	If the message is a reply, ID of the original message

allow_sending_without_reply | Boolean | Optional | Pass True if the message should be sent even if the specified replied-to message is  not found

## sendContact

Use this method to send phone contacts. On success, the sent Message is returned.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | 	Unique identifier for the target chat or username of the target channel (in the format @channelusername)

message_thread_id | Integer | Optional | Unique identifier for the target message thread (topic) of the forum; for forum supergroups only

phone_number | String | Yes | Contact's phone number

first_name | String | Yes | Contact's first name

last_name | String | Optional | Contact's last name

vcard | String | Optional | Additional data about the contact in the form of a vCard, 0-2048 bytes

disable_notification | Boolean | Optional | 	Sends the message silently. Users will receive a notification with no sound.

protect_content | Boolean | Optional | Protects the contents of the sent message from forwarding and saving

reply_to_message_id | Integer | Optional | 	If the message is a reply, ID of the original message

allow_sending_without_reply | Boolean | Optional | Pass True if the message should be sent even if the specified replied-to message is  not found

reply_markup | InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply | Optional | Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.

## sendPoll

Use this method to send a native poll. On success, the sent Message is returned.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target channel (in the format              @channelusername)

message_thread_id | Integer | Optional | Unique identifier for the target message thread (topic) of the forum; for forum supergroups only

question | String | Yes | Poll question, 1-300 characters

options | Array of String | Yes | A JSON-serialized list of answer options, 2-10 strings 1-100 characters each

is_anonymous | Boolean | Optional | True, if the poll needs to be anonymous, defaults to True

type | String | Optional | Poll type, “quiz” or “regular”, defaults to “regular”

allows_multiple_answers | Boolean | Optional | True, if the poll allows multiple answers, ignored for polls in quiz mode, defaults to False

correct_option_id | Integer | Optional | 0-based identifier of the correct answer option, required for polls in quiz mode

explanation | String | Optional | Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200 characters with at most 2 line feeds after entities parsing

explanation_parse_mode | String | Optional | Mode for parsing entities in the explanation. See formatting options for more details.

explanation_entities | Array of MessageEntity | Optional | 	A JSON-serialized list of special entities that appear in the poll explanation, which can be specified instead of parse_mode

open_period | Integer | Optional | Amount of time in seconds the poll will be active after creation, 5-600. Can't be used together with close_date.

close_date | Integer | Optional | Point in time (Unix timestamp) when the poll will be automatically closed. Must be at least 5 and no more than 600 seconds in the future. Can't be used together with open_period.

is_closed | Boolean | Optional | Pass True if the poll needs to be immediately closed. This can be useful for poll preview.

disable_notification | Boolean | Optional | 	Sends the message silently. Users will receive a notification with no sound.

protect_content | Boolean | Optional | Protects the contents of the sent message from forwarding and saving

reply_to_message_id | Integer | Optional | 	If the message is a reply, ID of the original message

allow_sending_without_reply | Boolean | Optional | Pass True if the message should be sent even if the specified replied-to message is  not found

reply_markup | 	InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply | Optional | Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.

## sendChatAction 

Use this method when you need to tell the user that something is happening on the bot's side. The status is set for 5 seconds or less 

(when a message arrives from your bot, Telegram clients clear its typing status). Returns True on success.

Example: The ImageBot needs some time to process a request and upload the image. Instead of sending a text message along the lines of 

“Retrieving image, please wait…”, the bot may use sendChatAction with action = upload_photo. The user will see a “sending photo” status 

for the bot.

We only recommend using this method when a response from the bot will take a noticeable amount of time to arrive

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target channel (in the format              @channelusername)

message_thread_id | Integer | Optional | Unique identifier for the target message thread (topic) of the forum; for forum supergroups only

action | String | Yes | Type of action to broadcast. Choose one, depending on what the user is about to receive: typing for text messages, upload_photo for photos, record_video or upload_video for videos, record_voice or upload_voice for voice notes, upload_document for general files, choose_sticker for stickers, find_location for location data, record_video_note or upload_video_note for video notes.



## banChatMember 

Use this method to ban a user in a group, a supergroup or a channel. In the case of supergroups and channels, the user will not be able

to return to the chat on their own using invite links, etc., unless unbanned first. The bot must be an administrator in the chat for 

this to work and must have the appropriate administrator rights. Returns True on success.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target channel (in the format              @channelusername)

user_id | Integer | Yes | Unique identifier of the target user

until_date | Integer | Optional | Date when the user will be unbanned, unix time. If user is banned for more than 366 days or less than 30 seconds from the current time they are considered to be banned forever. Applied for supergroups and channels only.

revoke_messages | Boolean | Optional | Pass True to delete all messages from the chat for the user that is being removed. If False, the user will be able to see messages in the group that were sent before the user was removed. Always True for supergroups and channels.

## unbanChatMember

Use this method to unban a previously banned user in a supergroup or channel. The user will not return to the group or channel 

automatically, but will be able to join via link, etc. The bot must be an administrator for this to work. By default, this method 

guarantees that after the call the user is not a member of the chat, but will be able to join it. So if the user is a member of the chat 

they will also be removed from the chat. If you don't want this, use the parameter only_if_banned. Returns True on success.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target channel (in the format              @channelusername)

user_id | Integer | Yes | Unique identifier of the target user

only_if_banned | Boolean | Optional | Do nothing if the user is not banned

## restrictChatMember

Use this method to restrict a user in a supergroup. The bot must be an administrator in the supergroup for this to work and must have 

the appropriate administrator rights. Pass True for all permissions to lift restrictions from a user. Returns True on success.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target channel (in the format              @channelusername)

user_id | Integer | Yes | Unique identifier of the target user

permissions | ChatPermissions | Yes | A JSON-serialized object for new user permissions

use_independent_chat_permissions | Boolean | Optional | Pass True if chat permissions are set independently. Otherwise, the can_send_other_messages and can_add_web_page_previews permissions will imply the can_send_messages, can_send_audios, can_send_documents, can_send_photos, can_send_videos, can_send_video_notes, and can_send_voice_notes permissions; the can_send_polls permission will imply the can_send_messages permission.

until_date | Integer | Optional | Date when restrictions will be lifted for the user, unix time. If user is restricted for more than 366 days or less than 30 seconds from the current time, they are considered to be restricted forever

## promoteChatMember 

Use this method to promote or demote a user in a supergroup or a channel. The bot must be an administrator in the chat for this to work 

and must have the appropriate administrator rights. Pass False for all boolean parameters to demote a user. Returns True on success.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target channel (in the format              @channelusername)

user_id | Integer | Yes | Unique identifier of the target user

is_anonymous | Boolean | Optional | Pass True if the administrator's presence in the chat is hidden

can_manage_chat | Boolean | Optional | Pass True if the administrator can access the chat event log, chat statistics, message statistics in channels, see channel members, see anonymous administrators in supergroups and ignore slow mode. Implied by any other administrator privilege

can_post_messages | Boolean | Optional | Pass True if the administrator can create channel posts, channels only

can_edit_messages | Boolean | Optional | Pass True if the administrator can edit messages of other users and can pin messages, channels only

can_delete_messages | Boolean | Optional | Pass True if the administrator can delete messages of other users

can_manage_video_chats | Boolean | Optional | Pass True if the administrator can manage video chats

can_restrict_members | Boolean | Optional | Pass True if the administrator can restrict, ban or unban chat members

can_promote_members | Boolean | Optional | Pass True if the administrator can add new administrators with a subset of their own privileges or demote administrators that they have promoted, directly or indirectly (promoted by administrators that were appointed by him)

can_change_info | Boolean | Optional | Pass True if the administrator can change chat title, photo and other settings

can_invite_users | Boolean | Optional | Pass True if the administrator can invite new users to the chat

can_pin_messages | Boolean | Optional | Pass True if the administrator can pin messages, supergroups only

can_manage_topics | Boolean | Optional | Pass True if the user is allowed to create, rename, close, and reopen forum topics, supergroups only

## setChatAdministratorCustomTitle

Use this method to set a custom title for an administrator in a supergroup promoted by the bot. Returns True on success.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target channel (in the format              @channelusername)

user_id | Integer | Yes | Unique identifier of the target user

custom_title | String | Yes | New custom title for the administrator; 0-16 characters, emoji are not allowed

## banChatSenderChat

Use this method to ban a channel chat in a supergroup or a channel. Until the chat is unbanned, the owner of the banned chat won't be 

able to send messages on behalf of any of their channels. The bot must be an administrator in the supergroup or channel for this to work 

and must have the appropriate administrator rights. Returns True on success.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target channel (in the format              @channelusername)

sender_chat_id | Integer | Yes | Unique identifier of the target sender chat

## unbanChatSenderChat

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target channel (in the format              @channelusername)

sender_chat_id | Integer | Yes | Unique identifier of the target sender chat

## setChatPermissions

Use this method to set default chat permissions for all members. The bot must be an administrator in the group or a supergroup for this 

to work and must have the can_restrict_members administrator rights. Returns True on success.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target channel (in the format              @channelusername)

permissions | ChatPermissions | Yes | A JSON-serialized object for new default chat permissions

use_independent_chat_permissions | Boolean | Optional | Pass True if chat permissions are set independently. Otherwise, the can_send_other_messages and can_add_web_page_previews permissions will imply the can_send_messages, can_send_audios, can_send_documents, can_send_photos, can_send_videos, can_send_video_notes, and can_send_voice_notes permissions; the can_send_polls permission will imply the can_send_messages permission.

## exportChatInviteLink

Use this method to generate a new primary invite link for a chat; any previously generated primary link is revoked. The bot must be an 

administrator in the chat for this to work and must have the appropriate administrator rights. Returns the new invite link as String on 

success.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target channel (in the format              @channelusername)

Note: Each administrator in a chat generates their own invite links. Bots can't use invite links generated by other administrators. If 

you want your bot to work with invite links, it will need to generate its own link using exportChatInviteLink or by calling the getChat 

method. If your bot needs to generate a new primary invite link replacing its previous one, use exportChatInviteLink again.

## createChatInviteLink

Use this method to create an additional invite link for a chat. The bot must be an administrator in the chat for this to work and must 

have the appropriate administrator rights. The link can be revoked using the method revokeChatInviteLink. Returns the new invite link as 

ChatInviteLink object.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target channel (in the format              @channelusername)

name | String | Optional | Invite link name; 0-32 characters

expire_date | Integer | Optional | Point in time (Unix timestamp) when the link will expire

member_limit | Integer | Optional | The maximum number of users that can be members of the chat simultaneously after joining the chat via this invite link; 1-99999

creates_join_request | Boolean | Optional | True, if users joining the chat via the link need to be approved by chat administrators. If True, member_limit can't be specified

## editChatInviteLink

Use this method to edit a non-primary invite link created by the bot. The bot must be an administrator in the chat for this to work and 

must have the appropriate administrator rights. Returns the edited invite link as a ChatInviteLink object.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target channel (in the format              @channelusername)

invite_link | String | Yes | The invite link to edit

name | String | Optional | Invite link name; 0-32 characters

expire_date | Integer | Optional | Point in time (Unix timestamp) when the link will expire

member_limit | Integer | Optional | The maximum number of users that can be members of the chat simultaneously after joining the chat via this invite link; 1-99999

creates_join_request | Boolean | Optional | True, if users joining the chat via the link need to be approved by chat administrators. If True, member_limit can't be specified

## revokeChatInviteLink 

Use this method to revoke an invite link created by the bot. If the primary link is revoked, a new link is automatically generated. The 

bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the revoked invite 

link as ChatInviteLink object.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target channel (in the format              @channelusername)

invite_link | String | Yes | The invite link to edit

## approveChatJoinRequest

Use this method to approve a chat join request. The bot must be an administrator in the chat for this to work and must have the 

can_invite_users administrator right. Returns True on success.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target channel (in the format              @channelusername)

user_id | Integer | Yes | Unique identifier of the target user

## declineChatJoinRequest

Use this method to decline a chat join request. The bot must be an administrator in the chat for this to work and must have the 

can_invite_users administrator right. Returns True on success.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target channel (in the format              @channelusername)

user_id | Integer | Yes | Unique identifier of the target user

## setChatPhoto

Use this method to set a new profile photo for the chat. Photos can't be changed for private chats. The bot must be an administrator in 

the chat for this to work and must have the appropriate administrator rights. Returns True on success.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target channel (in the format              @channelusername)

photo | InputFile | Yes | New chat photo, uploaded using multipart/form-data

## deleteChatPhoto

Use this method to delete a chat photo. Photos can't be changed for private chats. The bot must be an administrator in the chat for 

this to work and must have the appropriate administrator rights. Returns True on success.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target channel (in the format              @channelusername)

## pinChatMessage

Use this method to add a message to the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an 

administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 

'can_edit_messages' administrator right in a channel. Returns True on success.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)

message_id | Integer | Yes | Identifier of a message to pin

disable_notification | Boolean | Optional | Pass True if it is not necessary to send a notification to all chat members about the new pinned message. Notifications are always disabled in channels and private chats.

## unpinChatMessage

Use this method to remove a message from the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an 

administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 

'can_edit_messages' administrator right in a channel. Returns True on success.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)

message_id | Integer | Yes | Identifier of a message to pin

## unpinAllChatMessages

Use this method to clear the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator in 

the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator 

right in a channel. Returns True on success.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)

## leaveChat

Use this method for your bot to leave a group, supergroup or channel. Returns True on success.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)

## getChat

Use this method to get up to date information about the chat (current name of the user for one-on-one conversations, current username of 

a user, group or channel, etc.). Returns a Chat object on success.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)

## getChatAdministrators

Use this method to get a list of administrators in a chat, which aren't bots. Returns an Array of ChatMember objects.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)

## getChatMemberCount

Use this method to get the number of members in a chat. Returns Int on success.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)

## getChatMember

Use this method to get information about a member of a chat. The method is only guaranteed to work for other users if the bot is an 

administrator in the chat. Returns a ChatMember object on success.

Parameter | Type | Required | Description

--------- | ---- | -------- | -----------

chat_id | Integer or String | Yes | Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)

user_id | Integer | Yes | Unique identifier of the target user

# Types :

## InlineKeyboardMarkup 

This object represents an inline keyboard that appears right next to the message it belongs to.

Field | Type | Description

------| ---- | ---------- |

inline_keyboard | Array of Array of InlineKeyboardButton | Array of button rows, each represented by an Array of InlineKeyboardButton objects

Note: This will only work in Telegram versions released after 9 April, 2016. Older clients will display unsupported message.

## InlineKeyboardButton

This object represents one button of an inline keyboard. You must use exactly one of the optional fields.

Field | Type | Description

------| ---- | ---------- |

text | String | Label text on the button

url | String | Optional. HTTP or tg:// URL to be opened when the button is pressed. Links tg://user?id=<user_id> can be used to mention a user by their ID without using a username, if this is allowed by their privacy settings.

callback_data | String | Optional. Data to be sent in a callback query to the bot when button is pressed, 1-64 bytes

web_app | WebAppInfo | Optional. Description of the Web App that will be launched when the user presses the button. The Web App will be able to send an arbitrary message on behalf of the user using the method answerWebAppQuery. Available only in private chats between a user and the bot.

login_url | LoginUrl | Optional. An HTTPS URL used to automatically authorize the user. Can be used as a replacement for the Telegram Login Widget.

switch_inline_query | String | Optional. If set, pressing the button will prompt the user to select one of their chats, open that chat and insert the bot's username and the specified inline query in the input field. May be empty, in which case just the bot's username will be inserted.

switch_inline_query_current_chat | String | Optional. If set, pressing the button will insert the bot's username and the specified inline query in the current chat's input field. May be empty, in which case only the bot's username will be inserted. This offers a quick way for the user to open your bot in inline mode in the same chat - good for selecting something from multiple options.

## ReplyKeyboardMarkup

This object represents a custom keyboard with reply options (see Introduction to bots for details and examples).

Field | Type | Description

------| ---- | ---------- |

keyboard | Array of Array of KeyboardButton | Array of button rows, each represented by an Array of KeyboardButton objects

is_persistent | Boolean | Optional. Requests clients to always show the keyboard when the regular keyboard is hidden. Defaults to false, in which case the custom keyboard can be hidden and opened with a keyboard icon.

resize_keyboard | Boolean | Optional. Requests clients to resize the keyboard vertically for optimal fit (e.g., make the keyboard smaller if there are just two rows of buttons). Defaults to false, in which case the custom keyboard is always of the same height as the app's standard keyboard.

one_time_keyboard | Boolean | Optional. Requests clients to hide the keyboard as soon as it's been used. The keyboard will still be available, but clients will automatically display the usual letter-keyboard in the chat - the user can press a special button in the input field to see the custom keyboard again. Defaults to false.

input_field_placeholder | String | Optional. The placeholder to be shown in the input field when the keyboard is active; 1-64 characters

selective | Boolean | Optional. Use this parameter if you want to show the keyboard to specific users only. Targets: 1) users that are @mentioned in the text of the Message object; 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message.Example: A user requests to change the bot's language, bot replies to the request with a keyboard to select the new language. Other users in the group don't see the keyboard.

## ReplyKeyboardRemove

Upon receiving a message with this object, Telegram clients will remove the current custom keyboard and display the default 

letter-keyboard. By default, custom keyboards are displayed until a new keyboard is sent by a bot. An exception is made for one-time 

keyboards that are hidden immediately after the user presses a button (see ReplyKeyboardMarkup).

Field | Type | Description

------| ---- | ---------- |

remove_keyboard | True | Requests clients to remove the custom keyboard (user will not be able to summon this keyboard; if you want to hide the keyboard from sight but keep it accessible, use one_time_keyboard in ReplyKeyboardMarkup)

selective | Boolean | Optional. Use this parameter if you want to remove the keyboard for specific users only. Targets: 1) users that are @mentioned in the text of the Message object; 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message. Example: A user votes in a poll, bot returns confirmation message in reply to the vote and removes the keyboard for that user, while still showing the keyboard with poll options to users who haven't voted yet.

## ForceReply

Upon receiving a message with this object, Telegram clients will display a reply interface to the user (act as if the user has selected 

the bot's message and tapped 'Reply'). This can be extremely useful if you want to create user-friendly step-by-step interfaces without 

having to sacrifice privacy mode.

Field | Type | Description

------| ---- | ---------- |

force_reply | True | Shows reply interface to the user, as if they manually selected the bot's message and tapped 'Reply'

input_field_placeholder | String | 	Optional. The placeholder to be shown in the input field when the reply is active; 1-64 characters

selective | Boolean | Optional. Use this parameter if you want to remove the keyboard for specific users only. Targets: 1) users that are @mentioned in the text of the Message object; 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message. Example: A user votes in a poll, bot returns confirmation message in reply to the vote and removes the keyboard for that user, while still showing the keyboard with poll options to users who haven't voted yet.

## InputFile

This object represents the contents of a file to be uploaded. Must be posted using multipart/form-data in the usual way that files are 

uploaded via the browser.

## ChatPermissions

Describes actions that a non-administrator user is allowed to take in a chat.

Field | Type | Description

------| ---- | ---------- |

can_send_messages | Boolean | Optional. True, if the user is allowed to send text messages, contacts, invoices, locations and venues

can_send_audios | Boolean | Optional. True, if the user is allowed to send audios

can_send_documents | Boolean | Optional. True, if the user is allowed to send documents

can_send_photos | Boolean | Optional. True, if the user is allowed to send photos

can_send_videos | Boolean | Optional. True, if the user is allowed to send videos

can_send_video_notes | Boolean | Optional. True, if the user is allowed to send video notes

can_send_voice_notes | Boolean | Optional. True, if the user is allowed to send voice notes

can_send_polls | Boolean | Optional. True, if the user is allowed to send polls

can_send_other_messages | Boolean | Optional. True, if the user is allowed to send animations, games, stickers and use inline bots

can_add_web_page_previews | Boolean | Optional. True, if the user is allowed to add web page previews to their messages

can_change_info | Boolean | Optional. True, if the user is allowed to change the chat title, photo and other settings. Ignored in public supergroups

can_invite_users | Boolean | Optional. True, if the user is allowed to invite new users to the chat

can_pin_messages | Boolean | Optional. True, if the user is allowed to pin messages. Ignored in public supergroups

can_manage_topics | Boolean | Optional. True, if the user is allowed to create forum topics. If omitted defaults to the value of can_pin_messages

## InputMediaAudio

Represents an audio file to be treated as music to be sent.

Field | Type | Description

------| ---- | --------- |

type | String | Type of the result, must be audio

media | String | File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files »

thumbnail | InputFile or String | Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »

caption | String | Optional. Caption of the audio to be sent, 0-1024 characters after entities parsing

parse_mode | String | Optional. Mode for parsing entities in the audio caption. See formatting options for more details.

caption_entities | Array of MessageEntity | Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode

duration | Integer | Optional. Duration of the audio in seconds

performer | String | Optional. Performer of the audio

title | String | Optional. Title of the audio

## InputMediaDocument

Represents a general file to be sent.

Field | Type | Description

------| ---- | --------- |

type | String | Type of the result, must be document

media | String | File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files »

thumbnail | InputFile or String | Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »

caption | String | Optional. Caption of the audio to be sent, 0-1024 characters after entities parsing

parse_mode | String | Optional. Mode for parsing entities in the audio caption. See formatting options for more details.

caption_entities | Array of MessageEntity | Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode

disable_content_type_detection | Boolean | Optional. Disables automatic server-side content type detection for files uploaded using multipart/form-data. Always True, if the document is sent as part of an album.

## InputMediaPhoto

Represents a photo to be sent.

Field | Type | Description

------| ---- | --------- |

type | String | Type of the result, must be photo

media | String | File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files »

caption | String | Optional. Caption of the audio to be sent, 0-1024 characters after entities parsing

parse_mode | String | Optional. Mode for parsing entities in the audio caption. See formatting options for more details.

caption_entities | Array of MessageEntity | Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode

has_spoiler | Boolean | Optional. Pass True if the photo needs to be covered with a spoiler animation

## InputMediaVideo

Represents a video to be sent.

Field | Type | Description

------| ---- | --------- |

type | String | 	Type of the result, must be video

media | String | File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files »

thumbnail | InputFile or String | Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »

caption | String | Optional. Caption of the audio to be sent, 0-1024 characters after entities parsing

parse_mode | String | Optional. Mode for parsing entities in the audio caption. See formatting options for more details.

caption_entities | Array of MessageEntity | Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode

width | Integer | Optional. Video width

height | Integer | Optional. Video height

duration | Integer | Optional. Video duration in seconds

supports_streaming | Boolean | Optional. Pass True if the uploaded video is suitable for streaming

has_spoiler | Boolean | Optional. Pass True if the photo needs to be covered with a spoiler animation

# It Will Be Updated In The Future
