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
use App\MsOther;
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
            $reg_appl_no = str_replace('/', '-', $regNo);

    		if($categ == 'PHD')
	        {
	            $candidates = Phd::where('registrationNumber', $regNo)
	                                ->first();
	            if(!$candidates)
	            {
	                $message = 'Kindly finish the application process and come back here';
	                return View::make('error')->with('message', $message);
	            } 
	            $applNo = $candidates->applNo;  
	            $candidates->dept1 = self::department($candidates->dept1);
	            $candidates->dept2 = self::department($candidates->dept2);
	            $candidates->dept3 = self::department($candidates->dept3); 

                $type = explode(',', $candidates->imagePath);
                $imgtype = $type[0];
                $signtype = $type[1];                          

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
	                            'phdorms' => $categ,
                                'applNo' => $reg_appl_no,
                                'imgtype' => $imgtype,
                                'signtype' => $signtype
	                            );
                
	            return View::make('print')->with($data);
	            // $pdf = PDF::loadView('print', $data);
	            // return response($pdf->output())
	            //                 ->header('Content-Type', 'application/pdf');
	        }
	        else
	        {
	            $candidates = Ms::where('registrationNumber', $regNo)
	                                ->first();
	            if(!$candidates)
	            {
	                $message = 'Kindly finish the application process and come back here';
	                return View::make('error')->with('message', $message);
	            }  
	            $applNo = $candidates->applNo;  
	            $candidates->dept1 = self::department($candidates->dept1);
	            $candidates->dept2 = self::department($candidates->dept2);
	            $candidates->dept3 = self::department($candidates->dept3); 

                $type = explode(',', $candidates->imagePath);
                $imgtype = $type[0];
                $signtype = $type[1];
	                                         
	            $ugDetails = MsUg::where('applNo', $applNo)
	                                    ->first();
	            $proDetails = MsPro::where('applNo', $applNo)
	                                    ->first();
                $otherDetails = MsOther::where('applNo', $applNo)
                                        ->first();
	            $scores = MsScores::where('applNo', $applNo)
	                                    ->first();
	            $data = array('candidates' => $candidates,
	                            'ug' => $ugDetails,
	                            'scores' => $scores,
	                            'pro' => $proDetails,
                                'others' => $otherDetails,
	                            'phdorms' => $categ,
                                'applNo' => $reg_appl_no,
                                'imgtype' => $imgtype,
                                'signtype' => $signtype
	                            );

                return View::make('print')->with($data);
	            // $pdf = PDF::loadView('print', $data);
	            // return response($pdf->output())
	            //                 ->header('Content-Type', 'application/pdf');
	        }
	    }
    }

    public function department($t)
    {
        if($t == 'AR')
        {
            return 'Architecture';
        }
        if($t == 'CS')
        {
            return 'Computer Science and Engineering';
        }
        if($t == 'CL')
        {
            return 'Chemical Engineering';
        }
        if($t == 'CV')
        {
            return 'Civil Engineering';
        }
        if($t == 'CY')
        {
            return 'Chemistry';
        }
        if($t == 'CA')
        {
            return 'Computer Applications';
        }
        if($t == 'CC')
        {
            return 'CECASE';
        }
        if($t == 'EN')
        {
            return 'Department of Energy Engineering';
        }
        if($t == 'EE')
        {
            return 'Electrical and Electronics Engineering';
        }
        if($t == 'EC')
        {
            return 'Electronics and Communication Engineering';
        }
        if($t == 'ME')
        {
            return 'Mechanical Engineering';
        }
        if($t == 'MS')
        {
            return 'Management Studies';
        }
        if($t == 'PR')
        {
            return 'Production Engineering';
        }
        if($t == 'MME')
        {
            return 'Metalurgy and Material Sciences';
        }
        if($t == 'MA')
        {
            return 'Mathematics';
        }
        if($t == 'IC')
        {
            return 'Instrumentation and Control Engineering';
        }
        if($t == 'PH')
        {
            return 'Physics';
        }
        if($t == 'HM')
        {
            return 'Humanities & Social Science';
        }
    }
}
