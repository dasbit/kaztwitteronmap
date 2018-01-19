<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
	protected $fillable = [
		'tweet_id',
		'user_name', 'user_link', 'user_icon', 
		'text', 'link', 
		'latitude', 'longitude', 
		'serialized_data'
	];

	protected $hidden = [
        'serialized_data'
    ];
}