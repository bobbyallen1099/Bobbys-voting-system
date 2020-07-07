<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeatureVote extends Model
{

    protected $table = 'feature_votes';
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'feature_id', 'user_id'
    ];

}
