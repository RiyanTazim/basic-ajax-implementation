<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class DropdownController extends Controller
{
    public function index()
    {
        $countries = Country::get(['name', 'id']);
        
        return view('dropdown', compact('countries'));
    }
    
    public function state(Request $request)
    {
        $data['states'] = State::where('country_id',$request->country_id)->get(['name', 'id']);

        return response()->json($data);
    }

    public function city(Request $request)
    {
        $data['cities'] = City::where('state_id',$request->state_id)->get(['name', 'id']);

        return response()->json($data);
    }
}
