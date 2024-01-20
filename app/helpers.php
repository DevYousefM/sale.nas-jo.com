<?php
use Ladumor\OneSignal\OneSignal;

if (! function_exists('OneSignalSendPush')) {
    function OneSignalSendPush($player_id= null,$url= null ,$message = null,$android_channel_id=null,$notificationRedirectId=null,$notificationRedirectType=null)
    {
        if(!is_null($player_id)){
            $fields['include_player_ids'] = ["$player_id"];
            if(!is_null($url)){
                $fields['url'] = route($url);
            }
            if(!is_null($android_channel_id)){
                $fields['android_channel_id'] = $android_channel_id;
            }
            if(!is_null($notificationRedirectId)){
                $fields['data']['id'] = $notificationRedirectId;
            }
            if(!is_null($notificationRedirectType)){
                $fields['data']['type'] = $notificationRedirectType;
            }
            $message =  $message;
            OneSignal::sendPush($fields, $message);
        }
    }
}
