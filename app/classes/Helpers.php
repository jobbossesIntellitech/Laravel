<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Helpers {
    public static function doMessage() {
        $message = 'Hello';
        return $message;
    }
    
    public static function twitterFeed($screen_name='mackhankins', $count='3', $include_retweets='false', $exclude_replies='true')
	{
		$twitterfeed = Cache::remember('twitterfeed', 30, function() use ($screen_name, $count, $include_retweets, $exclude_replies) {
			return Twitter::getUserTimeline(array('screen_name' => $screen_name, 'count' => $count, 'include_rts' => $include_retweets, 'exclude_replies' => $exclude_replies));
		});
		if(!empty($twitterfeed))
		{
			return $twitterfeed;
		}
		else
		{
			return array();
		}		
	}
}