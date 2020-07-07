<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\FeatureVote;

class Feature extends Model
{

    /**
     * Table
     * @param string
     */
    protected $table = 'features';
    
    /**
     * Counts votes on a feature
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function votes()
    {
        return $this->hasMany(FeatureVote::class, 'feature_id', 'id');
    }

}
