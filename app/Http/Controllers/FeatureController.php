<?php

namespace App\Http\Controllers;

use Auth;
use App\FeatureVote;
use App\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Show all features
     * @return View
     */
    public function index()
    {
        $features = Feature::all();

        return view('admin.features.index', compact('features'));
    }

   /**
     * Like a feature
     * @param Feature $feature
     * @return Response
     */
    public function storeFeatureVote(Feature $feature)
    {
        $votes = $feature->votes();
        
        if ($votes->where('user_id', Auth::id())->doesntExist()) {
            $votes->create(['user_id' => Auth::id()]);
        } else { 
            $votes->where('user_id', Auth::id())->delete();
        }
    }
}
