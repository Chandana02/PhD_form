<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Phd;
use App\PhdUg;
use App\PhdPg;
use App\PhdOther;
use App\PhdPro;
use App\Ms;
use App\MsUg;
use App\MsScores;
use App\MsPro;
use PDF;
use View;

class ApplicationController extends Controller
{
    public function view(Request $request)
    {
    	$regNo = $request->input('regNo');

    	$rules = array(
    		'regNo' => 'required'
    	);

    	$validator = Validator::make($request->all(), $rules);

    	if(count($validator->errors()) > 0)
    	{
    		$message = 'Please fill in all the required details';
    		return view('error')->with('message', $message);
    	}
    	else
    	{
    		$dept = explode("/", $regNo);
    		$categ = $dept[0];

    		if($categ == 'PHD')
	        {
	            $candidates = Phd::where('registrationNumber', $regNo)
	                                ->first();
	            if(!$candidates)
	            {
	                $message = 'Invalid registration number';
	                return View::make('error')->with('message', $message);
	            } 
	            $applNo = $candidates->applNo;                             

	            $ugDetails = PhdUg::where('applNo', $applNo)
	                                    ->first();
	            $pgDetails = PhdPg::where('applNo', $applNo)
	                                    ->first();
	            $otherDetails = PhdOther::where('applNo', $applNo)
	                                    ->first();
	            $proDetails = PhdPro::where('applNo', $applNo)
	                                    ->first();
	            $data = array('candidates' => $candidates,
	                            'ug' => $ugDetails,
	                            'pg' => $pgDetails,
	                            'others' => $otherDetails,
	                            'pro' => $proDetails,
	                            'phdorms' => $categ
	                            );

	            
	            $pdf = PDF::loadView('print', $data);
	            return response($pdf->output())
	                            ->header('Content-Type', 'application/pdf');
	        }
	        else
	        {
	            $candidates = Ms::where('registrationNumber', $regNo)
	                                ->first();
	            if(!$candidates)
	            {
	                $message = 'Invalid registration number';
	                return View::make('error')->with('message', $message);
	            }  
	            $applNo = $candidates->applNo;                             
	            $ugDetails = MsUg::where('applNo', $applNo)
	                                    ->first();
	            $proDetails = MsPro::where('applNo', $applNo)
	                                    ->first();
	            $scores = MsScores::where('applNo', $applNo)
	                                    ->first();
	            $data = array('candidates' => $candidates,
	                            'ug' => $ugDetails,
	                            'scores' => $scores,
	                            'pro' => $proDetails,
	                            'phdorms' => $categ
	                            );
	            $pdf = PDF::loadView('print', $data);
	            return response($pdf->output())
	                            ->header('Content-Type', 'application/pdf');
	        }
	    }
    }
}
