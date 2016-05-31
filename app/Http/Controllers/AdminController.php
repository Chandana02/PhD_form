<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use Validator;
use Input;
use PDF;
use App\Http\Requests;
use App\Http\Controllers\Controller;
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
use App\Admin;
use paginate;
use Session;
use Redirect;
use File;
use Log;

use Illuminate\Support\Facades\Mail;


class AdminController extends Controller
{
    public function login(Request $request)
    {
        $rules = array(
            'username' => 'required',
            'password' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            $message = 'Please fill in all the details';
            return view('error')->with('message', $message);
        }
        else
        {
            $username = $request->input('username');
            $password = $request->input('password');

            $auth = Admin::where('userName', $username)
                ->where('password', sha1($password)) 
                ->first();

            if(count($auth) > 0)
            {
                Session::put('userName', $username);
                Session::put('dept', $auth->dept);
                $count = array(
                    'PHD' => self::dept_count('phd', Session::get('dept')),
                    'MS' => self::dept_count('ms', Session::get('dept'))
                    );
                $hod_sign_type = '';
                if(Session::get('dept') != 'all')
                {
                    $hod_sign_file = public_path().'/uploads/signatures/'.Session::get('dept').'.';
                    if(file_exists($hod_sign_file.'jpg'))
                    {
                        $hod_sign_type = 'jpg';
                    }
                    else if(file_exists($hod_sign_file.'jpeg'))
                    {
                        $hod_sign_type = 'jpeg';
                    }
                    else if(file_exists($hod_sign_file.'png'))
                    {
                        $hod_sign_type = 'png';
                    }
                }
                $data = array(
                    'count' => $count,
                    'hod_sign' => Session::get('dept').'.'.$hod_sign_type
                    );
                if($hod_sign_type == '')
                {
                    $data['hod_sign'] = null;
                }
                return view('admin.home')->with($data);
            }
            else
            {
                $message = 'Username or Password is incorrect';
                return view('error')->with('message', $message);
            }
        }
    }

    public function returnHome()
    {
        $count = array(
            'PHD' => self::dept_count('phd', Session::get('dept')),
            'MS' => self::dept_count('ms', Session::get('dept'))
            );
        $hod_sign_type = '';
        if(Session::get('dept') != 'all')
        {
            $hod_sign_file = public_path().'/uploads/signatures/'.Session::get('dept').'.';
            if(file_exists($hod_sign_file.'jpg'))
            {
                $hod_sign_type = 'jpg';
            }
            else if(file_exists($hod_sign_file.'jpeg'))
            {
                $hod_sign_type = 'jpeg';
            }
            else if(file_exists($hod_sign_file.'png'))
            {
                $hod_sign_type = 'png';
            }
        }
        $data = array(
            'count' => $count,
            'hod_sign' => Session::get('dept').'.'.$hod_sign_type
            );
        if($hod_sign_type == '')
        {
            $data['hod_sign'] = null;
        }
        return view('admin.home')->with($data);  
    }

    public function change(Request $request)
    {
        $rules = array(
            'username' => 'required',
            'old_password' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            $message = 'Please fill in all the details';
            return view('error')->with('message', $message);
        }
        else
        {
            $username = $request->input('username');
            $oldpassword = $request->input('old_password');
            $newpassword = $request->input('new_password');

            $auth = Admin::where('userName', $username)
                ->where('password', sha1($oldpassword)) 
                ->first();

            if(count($auth) > 0)
            {
                Admin::where('userName', $username)
                            ->where('password', sha1($oldpassword))
                            ->update(['password' => sha1($newpassword)]);
                Session::put('userName', $username);
                Session::put('dept', $auth->dept);
                $count = array(
                    'PHD' => self::dept_count('phd', Session::get('dept')),
                    'MS' => self::dept_count('ms', Session::get('dept'))
                    );
                $hod_sign_type = '';
                if(Session::get('dept') != 'all')
                {
                    $hod_sign_file = public_path().'/uploads/signatures/'.Session::get('dept').'.';
                    if(file_exists($hod_sign_file.'jpg'))
                    {
                        $hod_sign_type = 'jpg';
                    }
                    else if(file_exists($hod_sign_file.'jpeg'))
                    {
                        $hod_sign_type = 'jpeg';
                    }
                    else if(file_exists($hod_sign_file.'png'))
                    {
                        $hod_sign_type = 'png';
                    }
                }
                $data = array(
                    'count' => $count,
                    'hod_sign' => Session::get('dept').'.'.$hod_sign_type
                    );
                if($hod_sign_type == '')
                {
                    $data['hod_sign'] = null;
                }
                return view('admin.home')->with($data);
            }
            else
            {
                $message = 'Username or Password is incorrect';
                return view('error')->with('message', $message);
            }
        }
    }

    public function upload(Request $request)
    {
        $signature = $request->file('sign');
        if($signature)
        {
            $signExt = $signature->getClientOriginalExtension();
            if($signExt == 'jpg' || $signExt == 'png' || $signExt == 'jpeg')
            {
                list($width, $height) = getimagesize($signature);
                if($width < 300 && $height < 200)
                {
                    $signature = $signature->move(public_path().'/uploads/signatures', Session::get('dept') . '.' . $signExt);
                    Session::flash('message', 'Uploaded your signature!');
                    return redirect()->back();
                }
                Session::flash('message', 'Dimensions for the uploaded image are more than 300X200');
                return redirect()->back();
            }
            else
            {
                Session::flash('message', 'Invalid file format!');
                return redirect()->back();
            }
        }
        else
        {           
            Session::flash('message', 'Please upload your signature!');
                return redirect()->back();
        }
    }

    public function adminView($phdorms)
    {
        // dd(Session::get('dept'));
        if(Session::get('dept') == 'all')
        {
            if($phdorms == 'phd')
            {
                $count = array(
                    'CS' => self::dept_count($phdorms, 'CS'),
                    'EC' => self::dept_count($phdorms, 'EC'),
                    'EE' => self::dept_count($phdorms, 'EE'),
                    'ME' => self::dept_count($phdorms, 'ME'),
                    'AR' => self::dept_count($phdorms, 'AR'),
                    'CL' => self::dept_count($phdorms, 'CL'),
                    'CV' => self::dept_count($phdorms, 'CV'),
                    'CY' => self::dept_count($phdorms, 'CY'),
                    'CA' => self::dept_count($phdorms, 'CA'),
                    'CC' => self::dept_count($phdorms, 'CC'),
                    'EN' => self::dept_count($phdorms, 'EN'),
                    'HM' => self::dept_count($phdorms, 'HM'),
                    'MA' => self::dept_count($phdorms, 'MA'),
                    'MME' => self::dept_count($phdorms, 'MME'),
                    'PR' => self::dept_count($phdorms, 'PR'),
                    'IC' => self::dept_count($phdorms, 'IC'),
                    'PH' => self::dept_count($phdorms, 'PH'),
                    'MS' => self::dept_count($phdorms, 'MS')
                    );
                return view('admin.all.phd.dept')
                                ->with('count', $count);
            }
            else
            {
                $count = array(
                    'CS' => self::dept_count($phdorms, 'CS'),
                    'EC' => self::dept_count($phdorms, 'EC'),
                    'EE' => self::dept_count($phdorms, 'EE'),
                    'ME' => self::dept_count($phdorms, 'ME'),
                    'CL' => self::dept_count($phdorms, 'CL'),
                    'CV' => self::dept_count($phdorms, 'CV'),
                    'CC' => self::dept_count($phdorms, 'CC'),
                    'EN' => self::dept_count($phdorms, 'EN'),
                    'MME' => self::dept_count($phdorms, 'MME'),
                    'PR' => self::dept_count($phdorms, 'PR'),
                    'IC' => self::dept_count($phdorms, 'IC'),
                    'PH' => self::dept_count($phdorms, 'PH')
                    );
                return view('admin.all.ms.dept')
                                ->with('count', $count);
            }
        }
        else
        {
            if($phdorms == 'phd')
            {
                return redirect('admin/phd/'.Session::get('dept'));
            }
            else
            {
                return redirect('admin/ms/'.Session::get('dept'));
            }
        }
    }

    public function dept_count($phdorms, $dept)
    {
        if($phdorms == 'phd')
        {
            if($dept == 'all')
            {
                return Phd::all()->count();
            }
            return Phd::where('dept1', $dept)
                            ->orWhere('dept2', $dept)
                            ->orWhere('dept3', $dept)
                            ->count();
        }
        else
        {
            if($dept == 'all')
            {
                return Ms::all()->count();
            }
            return Ms::where('dept1', $dept)
                            ->orWhere('dept2', $dept)
                            ->orWhere('dept3', $dept)
                            ->count();
        }
    }

    public function adminall($phdormsc, $dept)
    {
        Session::put('dept_folder', $dept);
        $rules1 = ['dept1' => $dept];
        $rules2 = ['dept2' => $dept];
        $rules3 = ['dept3' => $dept];

        $data = self::finalView($phdormsc, $rules1, $rules2, $rules3);
        $data['dept'] = self::department($dept);
        $data['session'] = $dept;
        $data['session_all'] = Session::get('dept');
        for($i = 0; $i < sizeof($data['candidates']); $i++)
        {
            $data['candidates'][$i]->dashed_reg_number = str_replace('/', '-', $data['candidates'][$i]->registrationNumber);
        }
        return view('admin.'.$phdormsc)->with('data', $data);
    }

    public function finalView($phdormsc, $rules1, $rules2, $rules3)
    {
        if($phdormsc == 'phd')
        {
            $candidates = Phd::where($rules1)
                                        ->orWhere($rules2)
                                        ->orWhere($rules3)
                                        ->orderBy('created_at', 'desc')
                                        ->paginate(6);
            $candidates_id = $candidates->lists('applNo');
            $ugDetails = PhdUg::whereIn('applNo', $candidates_id)->get();
            $pgDetails = PhdPg::whereIn('applNo', $candidates_id)->get(); 
            $otherDetails = PhdOther::whereIn('applNo', $candidates_id)->get();
            $proDetails = PhdPro::whereIn('applNo', $candidates_id)->get();
            $data = array('candidates' => $candidates,
                            'ug' => $ugDetails,
                            'pg' => $pgDetails,
                            'others' => $otherDetails,
                            'pro' => $proDetails
                            );
            return $data;
        }
        else
        {
            $candidates = Ms::where($rules1)
                                        ->orWhere($rules2)
                                        ->orWhere($rules3)
                                        ->orderBy('created_at', 'desc')
                                        ->paginate(6);
            
            $candidates_id = $candidates->lists('applNo');
            $ugDetails = MsUg::whereIn('applNo', $candidates_id)->get(); 
            $scores = MsScores::whereIn('applNo', $candidates_id)->get();//changed this from MsScores to MsSemScore 
            $proDetails = MsPro::whereIn('applNo', $candidates_id)->get();
            $otherDetails = MsOther::whereIn('applNo', $candidates_id)->get();
            $data = array('candidates' => $candidates,
                            'ug' => $ugDetails,
                            'scores' => $scores,
                            'pro' => $proDetails,
                            'others' => $otherDetails
                            );
            return $data;
        }
    }

    public function paidornot(Request $request)
    {
        $regNo = $request->input('regNo');
        $category = explode('/', $regNo)[0];

        $hasPaid = false;
        if($request->input("paid") == "true")
            $hasPaid = true;

        if($category == 'PHD')
        {
            Phd::where('registrationNumber', $regNo)
                    ->update(['paidornot' => $hasPaid]);

            return json_encode($regNo);
        }
        else
        {
            Ms::where('registrationNumber', $regNo)
                    ->update(['paidornot' => $hasPaid]);

            return json_encode($regNo);
        }
    }

    public function verify(Request $request)
    {
        $regNo = $request->input('regNo');
        $phdorms = $request->input('phdorms');
        $reason = $request->input('reason');

        if($phdorms == 'PHD')
        {
            $selected_or_not_json = Phd::select('dept1', 'dept2', 'dept3', 'selected_depts')
                                        ->where('registrationNumber', $regNo)
                                        ->first();
            if (strpos($selected_or_not_json->selected_depts, Session::get('dept')) === false) 
            {
                $selected_depts_db = $selected_or_not_json->selected_depts.Session::get('dept').',';
            }
            else
            {
                $selected_depts_db = str_replace(Session::get('dept').',', '', $selected_or_not_json->selected_depts);
            }
            Phd::where('registrationNumber', $regNo)
                    ->update(['selected_depts' => $selected_depts_db]);

            switch (Session::get('dept')) 
            {
                case $selected_or_not_json->dept1:
                    Phd::where('registrationNumber', $regNo)
                            ->update(['dept1_comments' => $reason]);
                    break;
                case $selected_or_not_json->dept2:
                    Phd::where('registrationNumber', $regNo)
                            ->update(['dept2_comments' => $reason]);
                    break;
                case $selected_or_not_json->dept3:
                    Phd::where('registrationNumber', $regNo)
                            ->update(['dept3_comments' => $reason]);
                    break;
            }

            return json_encode($regNo);
        }
        else
        {
            $selected_or_not_json = Ms::select('dept1', 'dept2', 'dept3', 'selected_depts')
                                        ->where('registrationNumber', $regNo)
                                        ->first();
            if(strpos($selected_or_not_json->selected_depts, Session::get('dept')) === false)
            {
                $selected_depts_db = $selected_or_not_json->selected_depts.Session::get('dept').',';
            }
            else
            {
                $selected_depts_db = str_replace(Session::get('dept').',', '', $selected_or_not_json->selected_depts);
            }
            Ms::where('registrationNumber', $regNo)
                    ->update(['selected_depts' => $selected_depts_db]);

            switch (Session::get('dept')) 
            {
                case $selected_or_not_json->dept1:
                    Ms::where('registrationNumber', $regNo)
                            ->update(['dept1_comments' => $reason]);
                    break;
                case $selected_or_not_json->dept2:
                    Ms::where('registrationNumber', $regNo)
                            ->update(['dept2_comments' => $reason]);
                    break;
                case $selected_or_not_json->dept3:
                    Ms::where('registrationNumber', $regNo)
                            ->update(['dept3_comments' => $reason]);
                    break;
            }

            return json_encode($regNo);
        }
    }

    public function search(Request $request)
    {
        $search_val = $request->input('search');        
        $phdorms = $request->input('phdorms');
        $dept = Session::get('dept_folder');
        $ajax = $request->input('ajax');

        if($phdorms == 'ms') {
            $table = DB::table('ms');
        }
        else if($phdorms == 'phd') {
            $table = DB::table('phd');
        }
        else {
            return json_encode($phdorms);
        }
        $candidates = $table->where(function ($query) use ($search_val, $dept) {
            $query->where('dept1', $dept)
                    ->where('registrationNumber', 'LIKE', '%'.$search_val.'%');
        })->orWhere(function ($query) use ($search_val, $dept) {
            $query->where('dept2', $dept)
                    ->where('registrationNumber', 'LIKE', '%'.$search_val.'%');
        })->orWhere(function ($query) use ($search_val, $dept) {
            $query->where('dept3', $dept)
                    ->where('registrationNumber', 'LIKE', '%'.$search_val.'%');
        })->orWhere(function ($query) use ($search_val, $dept) {
            $query->where('dept1', $dept)
                    ->where('name', 'LIKE', '%'.$search_val.'%');
        })->orWhere(function ($query) use ($search_val, $dept) {
            $query->where('dept2', $dept)
                    ->where('name', 'LIKE', '%'.$search_val.'%');
        })->orWhere(function ($query) use ($search_val, $dept) {
            $query->where('dept3', $dept)
                    ->where('name', 'LIKE', '%'.$search_val.'%');
        })->paginate(6);

        $candidates_id = $candidates->lists('applNo');
            $ugDetails = PhdUg::whereIn('applNo', $candidates_id)->get();
            $pgDetails = PhdPg::whereIn('applNo', $candidates_id)->get(); 
            $otherDetails = PhdOther::whereIn('applNo', $candidates_id)->get();
            $proDetails = PhdPro::whereIn('applNo', $candidates_id)->get();
            $data = array('candidates' => $candidates,
                            'ug' => $ugDetails,
                            'pg' => $pgDetails,
                            'others' => $otherDetails,
                            'pro' => $proDetails
                            );

        $data['dept'] = self::department($dept);
        $data['session'] = $dept;
        $data['session_all'] = Session::get('dept');
        for($i = 0; $i < sizeof($data['candidates']); $i++)
        {
            $data['candidates'][$i]->dashed_reg_number = str_replace('/', '-', $data['candidates'][$i]->registrationNumber);
        }

        if(!$ajax)
            return view('admin.'.$phdorms)->with('data', $data);
        else
            return view('admin.search_partial_'.$phdorms)->with('data', $data);
    }

    public function deleted(Request $request)
    {   
        $reg_number = $request->input('applNo');
        $departments = explode('/', $reg_number);
        $phdormsc = $departments[0];
        if($phdormsc == 'PHD')
        {
            Phd::where('registrationNumber', $reg_number)
                    ->update(['deleted' => true]);

            $user = Phd::select('name', 'email')
                                ->where('registrationNumber', $reg_number)
                                ->first();                 
            Mail::send('emails.delete', ['user' => $user->name], function ($m) use($user) {
                $m->from('phdsection@nitt.edu', 'NIT Trichy Admissions');
                $m->to($user->email, 'Applicant' )->subject('NIT Trichy Admissions Notice!');
            });

            return json_encode($reg_number);
        }
        else
        {
            Ms::where('applNo', $reg_number)
                    ->update(['deleted' => true]);

            $user = Ms::select('name', 'email')
                                ->where('registrationNumber', $reg_number)
                                ->first();
            Mail::send('emails.delete', ['user' => $user->name], function ($m) use($user) {
                $m->from('phdsection@nitt.edu', 'NIT Trichy Admissions');
                $m->to($user->email, 'Applicant')->subject('NIT Trichy Admissions Notice!');
            });

            return json_encode($reg_number);
        }
    }

    public function accepted(Request $request)
    {
        $reg_number = $request->input('applNo');
        $departments = explode('/', $reg_number);
        $phdormsc = $departments[0];
        if($phdormsc == 'PHD')
        {
            Phd::where('registrationNumber', $reg_number)
                    ->update(['accepted' => true]);

            $user = Phd::select('name', 'email')
                                ->where('registrationNumber', $reg_number)
                                ->first();

            Mail::send('emails.accept', ['user' => $user->name], function ($m) use($user) {
                $m->from('phdsection@nitt.edu', 'NIT Trichy Admissions');
                $m->to($user->email, 'Applicant')->subject('NIT Trichy Admissions Notice!');
            });
            
            return json_encode($reg_number);
        }
        else
        {
            Ms::where('registrationNumber', $reg_number)
                    ->update(['accepted' => true]);

            $user = Ms::select('name', 'email')
                                ->where('registrationNumber', $reg_number)
                                ->first();
            Mail::send('emails.accept', ['user' => $user->name], function ($m) use($user) {
                $m->from('phdsection@nitt.edu', 'NIT Trichy Admissions');
                $m->to($user->email, 'Applicant')->subject('NIT Trichy Admissions Notice!');
            });

            return json_encode($reg_number);
        }
    }


    public function printer($phdormsc, $reg_number)
    {
        $regNo = '';
        $departments = explode('-', $reg_number);
        for($i = 0; $i < sizeof($departments) - 1; $i++)
        {
            $regNo = $regNo.$departments[$i].'/';
        }
        $regNo = $regNo.$departments[sizeof($departments) - 1];
        $reg_appl_no = str_replace('/', '-', $regNo);
        if($phdormsc == 'PHD')
        {
            $candidates = Phd::where('registrationNumber', $regNo)
                                ->first();

            if(!$candidates)
            {
                $message = 'Invalid registration number';
                return view('error')->with('message', $message);
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
                            'phdorms' => $phdormsc,
                            'applNo' => $reg_appl_no,
                            'imgtype' => $imgtype,
                            'signtype' => $signtype
                            );
            
            return view('print')->with($data);
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
                $message = 'Invalid registration number';
                return view('error')->with('message', $message);
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
                            'phdorms' => $phdormsc,
                            'applNo' => $reg_appl_no,
                            'imgtype' => $imgtype,
                            'signtype' => $signtype
                            );
            return view('print')->with($data);
            // $pdf = PDF::loadView('print', $data);
            // return response($pdf->output())
            //                 ->header('Content-Type', 'application/pdf');
        }
    }

    public function admitCard($phdormsc, $reg_number, $dept)
    {
        // $reg_number is the dashed version
        // $reg_number_original is the slashed version (original)
        
        $reg_number_original = str_replace("-", "/", $reg_number);

        $filename = $phdormsc.'/'.$reg_number.'/photo';
        $path = public_path() . '/uploads/' . $filename;
        if(file_exists($path.'.jpg'))
        {
            $type = 'jpg';
        }
        else if(file_exists($path.'.jpeg'))
        {
            $type = 'jpeg';
        }
        else if(file_exists($path.'.png'))
        {
            $type = 'png';
        }


        if($phdormsc == 'PHD')
        {
            $candidate = Phd::select('name', 'registrationNumber','addrforcomm', 'selected_depts')
                            ->where('registrationNumber', $reg_number_original)
                            ->first();
        }
        else
        {
            $candidate = Ms::select('name', 'registrationNumber','addrforcomm', 'selected_depts')
                            ->where('registrationNumber', $reg_number_original)
                            ->first();
        }

        $hod_sign_file = public_path().'/uploads/signatures/'.Session::get('dept_folder').'.';
        $hod_sign_type = '';
        if(file_exists($hod_sign_file.'jpg'))
        {
            $hod_sign_type = 'jpg';
        }
        else if(file_exists($hod_sign_file.'jpeg'))
        {
            $hod_sign_type = 'jpeg';
        }
        else if(file_exists($hod_sign_file.'png'))
        {
            $hod_sign_type = 'png';
        }

        $data = array(
            'image' => $phdormsc.'/'.$reg_number.'/photo.' . $type,
            'hod_sign' => Session::get('dept_folder').'.'.$hod_sign_type,
            'name' => $candidate->name,
            'dept' => $dept,
            'regNo' => $candidate->registrationNumber,
            'address'=> $candidate->addrforcomm,
        );
        if (strpos($candidate->selected_depts, Session::get('dept_folder')) !== false) 
        {
            $data['selected'] = true;
        }
        else
        {
            $data['selected'] = false;
        }
        if($hod_sign_type == '')
        {
            $data['hod_sign'] = null;
        }

        return view('admin.admit')->with($data);
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
            return 'Energy and Environment';
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
        if($t == 'PR')
        {
            return 'Production Engineering';
        }
        if($t == 'MME')
        {
            return 'Metallurgical and Materials Engineering';
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
            return 'Humanities and Social Sciences';
        }
        if($t == 'MS')
        {
            return 'Management Studies';
        }
    }
    
    public function logout()
    {
        Session::flush();
        return redirect('adminlogin');
    }
}
