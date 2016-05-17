<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Phd;
use App\Ms;
use Log;

class DamageController extends Controller
{
    public function dmgctrl(Request $request)
    {
    	$regNo = $request->input('regNo');
        
    	$departments = explode('/', $regNo);
    	$category = $departments[0];

    	if($category == 'PHD')
    	{
    		Phd::where('registrationNumber', $regNo)
    				->update(['flag' => false]);
            return json_encode(0);
    	}
        else
        {
            Ms::where('registrationNumber', $regNo)
                    ->update(['flag' => false]);
                    return json_encode(0);
        }
    }
}
