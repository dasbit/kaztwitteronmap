<?php

namespace App\Services;

use App\Models\Tweet;

class TweetsFetcher
{

    public function fetch()
    {
        $kazakhstan_id = '6d73a696edc5306f';

        $new_tweets = \Twitter::getSearch([
            'q' => 'place:' . $kazakhstan_id,
            'count' => 20,
            'include_entities' => true,
            'has' => 'geo'
        ]);

        foreach ($new_tweets->statuses as $new_tweet) {
            if(isset($new_tweet->geo) && Tweet::whereTweetId($new_tweet->id)->first() === null)
            {
                Tweet::create([
                    'tweet_id' => $new_tweet->id,
                    'user_name' => $new_tweet->user->name, 
                    'user_link' => \Twitter::linkUser($new_tweet->user), 
                    'user_icon' => $new_tweet->user->profile_image_url, 
                    'text' => \Twitter::linkify($new_tweet), 
                    'link' => \Twitter::linkTweet($new_tweet), 
                    'latitude' => $new_tweet->geo->coordinates[0], 
                    'longitude' => $new_tweet->geo->coordinates[1], 
                    'serialized_data' => json_encode($new_tweet)
                ]);
            }
        }

        return count($new_tweets);
    }
}