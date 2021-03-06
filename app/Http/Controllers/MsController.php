<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator; 
use View;
use File;
use Storage;
use App\Ms;
use App\MsUg;
use App\MsScores;
use App\MsPro;
use App\MsOther;
use App\SaveMs;
use Session;

class MsController extends Controller
{
    public function validated(Request $request)
    {
        //registration process stopped
        return redirect('instructions');
        //registration process stopped

    	$rules = array(   
            'chalanNo' => 'required',                     
	        // 'date' => 'required',     
	        'appl_categ' => 'required',
	        'department1' => 'required',
            // 'department2' => 'required',
            // 'department3' => 'required',
	        'area_of_research' => 'required',
	        'name' => 'required',
	        'father_name' => 'required',
	        'dob' => 'required',
	        'category' => 'required|in:OBC,OC,SC,ST',
	        'sex' => 'required|in:Male,Female',
            'marital_status' => 'required',
	        'ph' => 'required|in:Yes,No',
	        'nationality' => 'required',
	        'addr_for_commn' => 'required|max:200',
            'permanent_addr' =>'required|max:200',
            'email' => 'required|email',
            'mobile' => 'required',
            // 'landline' => 'required',
	        'ug_deg' => 'required',
	        'ug_branch' => 'required',
	        // 'ug_gpa' => 'required',
	        'ug_class' => 'required|in:Honours,Distinction,First,Second',
	        'ug_name_of_inst' => 'required',
	        'ug_name_of_uni' => 'required',
	        'ug_yop' => 'required',
	        'max2' => 'required',
	        'max4' => 'required',
	        'max6' => 'required',
	        // 'max8' => 'required',
	        'gpa2' => 'required',
	        'gpa4' => 'required',
	        'gpa6' => 'required',
            // 'g-recaptcha-response' => 'required|captcha'
	        // 'gpa8' => 'required',
            // 'title_of_project' => 'required',
            // 'details_of_pub' => 'required|max:30',
            // 'awards' => 'required',
            // 'employer_details_1' => 'required'               
    	);

        
    	$validator = Validator::make($request->all(), $rules);

        if(count($validator->errors()) > 0)
    	{
    		$message = 'Please fill in all the details';
			return View::make('error')->with('message', $validator->errors());
    	}
        else
        {

        	$checkcandidate = Ms::where('email' , $request->input('email'))
                                ->where('mobile', $request->input('mobile'))
                                ->first();
            $reg_candidate = Ms::where('registrationNumber' , $request->get('regNo'))
                                ->first();

            if(($checkcandidate == NULL && $reg_candidate == NULL) || (($checkcandidate != NULL && $checkcandidate->flag == false) || ($reg_candidate != NULL && $reg_candidate->flag == false)))
            {
                $details = array(
                    // 'date' => $request->get('date'),
                    // 'date_of_sub' => $request->get('date_of_sub'),
                    'appl_categ' => $request->get('appl_categ'),
                    'image_path' => $request->get('image_path'),
                    'department1' => self::department($request->get('department1')),
                    'department2' => self::department($request->get('department2')),
                    'department3' => self::department($request->get('department3')),
                    'area_of_research' => $request->get('area_of_research'),
                    'email' => $request->get('email'),
                    'mobile' => $request->get('mobile'),
                    'landline' => $request->get('landline'),
                    'name' => $request->get('name'),
                    'father_name' => $request->get('father_name'),
                    'dob' => $request->get('dob'),
                    'category' => $request->get('category'),
                    'sex' => $request->get('sex'),
                    'marital_status' => $request->get('marital_status'),
                    'ph' => $request->get('ph'),
                    'nationality' => $request->get('nationality'),
                    'addr_for_commn' => $request->get('addr_for_commn'),
                    'permanent_addr' => $request->get('permanent_addr'),
                    'ug_deg' => $request->get('ug_deg'),
                    'ug_branch' => $request->get('ug_branch'),
                    'ug_percentage' => $request->get('ug_percentage'),
                    'ug_gpa' => $request->get('ug_gpa'),
                    'ug_class' => $request->get('ug_class'),
                    'ug_name_of_inst' => $request->get('ug_name_of_inst'),
                    'ug_name_of_uni' => $request->get('ug_name_of_uni'),
                    'ug_yop' => $request->get('ug_yop'),
                    // 'score' => $request->get('score'),
                    // 'rank' => $request->get('rank'),
                    'employer_details_1' => $request->get('employer_details_1'),
                    'employer_details_2' =>$request->get('employer_details_2'),
                    'employer_details_3' => $request->get('employer_details_3'),
                    'employer_details_4' => $request->get('employer_details_4'),
                    'employer_details_5' =>$request->get('employer_details_5'),
                    'employer_details_6' => $request->get('employer_details_6'),
                    'position1' => $request->get('emp_pos_1'),
                    'position2' => $request->get('emp_pos_2'),
                    'position3' => $request->get('emp_pos_3'),
                    'position4' => $request->get('emp_pos_4'),
                    'position5' => $request->get('emp_pos_5'),
                    'position6' => $request->get('emp_pos_6'),
                    'from1' => $request->get('emp_from_1'),
                    'from2' => $request->get('emp_from_2'),
                    'from3' => $request->get('emp_from_3'),
                    'from4' => $request->get('emp_from_4'),
                    'from5' => $request->get('emp_from_5'),
                    'from6' => $request->get('emp_from_6'),
                    'to1' => $request->get('emp_to_1'),
                    'to2' => $request->get('emp_to_2'),
                    'to3' => $request->get('emp_to_3'),
                    'to4' => $request->get('emp_to_4'),
                    'to5' => $request->get('emp_to_5'),
                    'to6' => $request->get('emp_to_6'),
                    'max1' => $request->get('max1'),
                    'max2' => $request->get('max2'),
                    'max3' => $request->get('max3'),
                    'max4' => $request->get('max4'),
                    'max5' => $request->get('max5'),
                    'max6' => $request->get('max6'),
                    'max7' => $request->get('max7'),
                    'gpa1' => $request->get('gpa1'),
                    'gpa2' => $request->get('gpa2'),
                    'gpa3' => $request->get('gpa3'),
                    'gpa4' => $request->get('gpa4'),
                    'gpa5' => $request->get('gpa5'),
                    'gpa6' => $request->get('gpa6'),
                    'gpa7' => $request->get('gpa7')
                );

                if($request->input('ann') == 'on')
                {
                    $details['score'] = $request->input('score');
                    $details['rank'] = $request->input('rank');
                    $details['validity'] = $request->input('validity');
                    $details['discipline'] = $request->input('discipline');
                    $details['exam'] = $request->input('exam');
                }
                else
                {
                    $details['score'] = 'NA';
                    $details['rank'] = 'NA';
                    $details['validity'] = 'NA';
                    $details['discipline'] = 'NA';
                    $details['exam'] = 'NA';
                }

                if($request->get('ra3') == 'on')
                {
                    $details['ug_gpa'] = $details['ug_gpa'] . " excluding final semester";
                    $details['gpa8'] = 'NA';
                    $details['max8'] = 'NA';
                }
                else
                {
                    $details['gpa8'] = $request->get('gpa8');
                    $details['max8'] = $request->get('max8');
                }

                $file = $request->file('image_path');   

                $stored_image_path = SaveMs::where('registrationNumber', Session::get('regNo'))->select('imagePath')->first()['imagePath'];
                $stored_image_arr = explode(',', $stored_image_path);
                $stored_image_extension = $stored_image_arr[0];
                $stored_sign_extension = count($stored_image_arr) == 2 ? $stored_image_arr[1] : '';

                $extension = '';
                if($file)
                    $extension = $request->file('image_path')->getClientOriginalExtension();
                if($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'JPEG' || $extension == 'PNG')
                {
                    list($width, $height) = getimagesize($file);
                    if($width < 413 && $height < 531)
                    {

                    }
                    else
                    {
                        $message = 'Dimensions for the uploaded image are more than 413X531';
                        return View::make('error')->with('message', $message);  
                    }
                }
                else if($file)
                {
                    $message = 'Invalid file format for the uploaded image';
                    return View::make('error')->with('message', $message);
                }
                else if($stored_image_extension == "") {
                    $message = "Passport size photo is required.";
                    return View::make('error')->with('message', $message);
                }

                $sign = $request->file('sign');
                $signExt = '';
                if($sign)
                    $signExt = $request->file('sign')->getClientOriginalExtension();
                if($signExt == 'jpg' || $signExt == 'png' || $signExt == 'jpeg' || $signExt == 'JPG' || $signExt == 'JPEG' || $signExt == 'PNG')
                {
                    list($width, $height) = getimagesize($sign);
                    if($width < 413 && $height < 531)
                    {

                    }
                    else
                    {
                        $message = 'Size of the uploaded signature is more than 4 kb';
                        return View::make('error')->with('message', $message);
                    }
                }
                else if($sign)
                {
                    $message = 'Invalid file format for the uploaded Signature';
                    return View::make('error')->with('message', $message);
                }
                else if($stored_sign_extension == "")
                {
                    $message = "Signature is required.";
                    return View::make('error')->with('message', $message);
                }

                $cert = null;
                $cert = $request->file('form1');
                if(!$cert)
                {
                    
                }
                else
                {
                    $extension3 = $request->file('form1')->getClientOriginalExtension();
                    if($extension3 != 'pdf' && $extension3 != 'PDF')
                    {
                        $message = 'Upload a PDF file for the certificate.';
                        return View::make('error')->with('message', $message);
                    }
                }

                $reg_number = $request->input('regNo');
                $reg_number_modified = str_replace("/", "-", $reg_number);

                $details['reg_number'] = $reg_number;
                $details['phdorms'] = 'ms';

                $image_extension = $stored_image_extension;
                $sign_extension = $stored_sign_extension;
                if($file)
                {
                    $file = $file->move(public_path().'/uploads/MS/'.$reg_number_modified, 'photo.' . $extension);
                    $image_extension = $extension;
                }
                if($sign)
                {
                    $sign = $sign->move(public_path().'/uploads/MS/'.$reg_number_modified, 'sign.' . $signExt);
                    $sign_extension = $signExt;
                }
                if($cert)
                {
                    $cert = $cert->move(public_path().'/uploads/MS/'.$reg_number_modified, 'cert.' . $extension3);
                }

                $details['imagePath'] = $image_extension . "," . $sign_extension;
            }
            else
            {
                $message = "User already exists ";
                return View::make('error')->with('message' , $message);   
            }

            if($checkcandidate == NULL && $reg_candidate == NULL)
            {
                $candidate = new Ms();

                $candidate->chalanNo = $request->input('chalanNo');
                $candidate->registrationNumber = $request->input('regNo');
                $candidate->applicationCategory = $request->get('appl_categ');
                $candidate->dept1 = $request->input('department1');
                $candidate->dept2 = $request->input('department2');
                $candidate->dept3 = $request->input('department3');
                $candidate->areaOfResearch = $request->get('area_of_research');
                $candidate->name = $request->get('name');
                $candidate->fatherName = $request->get('father_name');
                $candidate->dob = $request->get('dob');
                $candidate->category = $request->get('category');
                $candidate->sex = $request->get('sex');
                $candidate->maritalStatus = $request->get('marital_status');
                $candidate->ph = $request->get('ph');
                $candidate->nationality = $request->get('nationality');
                $candidate->addrforcomm = $request->get('addr_for_commn');
                $candidate->permanentaddr = $request->get('permanent_addr');
                $candidate->email = $request->get('email');
                $candidate->mobile = $request->get('mobile');
                $candidate->lanline = $request->get('landline');
                $candidate->imagePath = $details['imagePath'];

                $candidate->save();

                $applNo = $candidate->applNo;

                $ugDetails = new MsUg();

                $ugDetails->applNo = $applNo;
                $ugDetails->degreeName = $request->get('ug_deg');
                $ugDetails->branch = $request->get('ug_branch');
                $ugDetails->gpa = $details['ug_gpa'];
                // replace this field by gpa
                $ugDetails->class = $request->get('ug_class');
                $ugDetails->institutionName = $request->get('ug_name_of_inst');
                $ugDetails->universityName= $request->get('ug_name_of_uni');
                $ugDetails->yop = $request->get('ug_yop');
                
                $ugDetails->save();

                $pro = new MsPro();

                $pro->applNo = $applNo;
    			$pro->proexp1 = $request->get('employer_details_1');
                $pro->proexp2 = $request->get('employer_details_2');
                $pro->proexp3 = $request->get('employer_details_3');
                $pro->proexp4 = $request->get('employer_details_4');
                $pro->proexp5 = $request->get('employer_details_5');
                $pro->proexp6 = $request->get('employer_details_6');
                $pro->position1 = $request->get('emp_pos_1');
                $pro->position2 = $request->get('emp_pos_2');
                $pro->position3 = $request->get('emp_pos_3');
                $pro->position4 = $request->get('emp_pos_4');
                $pro->position5 = $request->get('emp_pos_5');
                $pro->position6 = $request->get('emp_pos_6');
                $pro->from1 = $request->get('emp_from_1');
                $pro->from2 = $request->get('emp_from_2');
                $pro->from3 = $request->get('emp_from_3');
                $pro->from4 = $request->get('emp_from_4');
                $pro->from5 = $request->get('emp_from_5');
                $pro->from6 = $request->get('emp_from_6');
                $pro->to1 = $request->get('emp_to_1');
                $pro->to2 = $request->get('emp_to_2');
                $pro->to3 = $request->get('emp_to_3');
                $pro->to4 = $request->get('emp_to_4');
                $pro->to5 = $request->get('emp_to_5');
                $pro->to6 = $request->get('emp_to_6');

                $pro->save();

                $msScores = new MsScores();

                $msScores->applNo = $applNo;
                $msScores->gpamax1 = $request->get('max1');
                $msScores->gpamax2 = $request->get('max2');
                $msScores->gpamax3 = $request->get('max3');
                $msScores->gpamax4 = $request->get('max4');
                $msScores->gpamax5 = $request->get('max5');
                $msScores->gpamax6 = $request->get('max6');
                $msScores->gpamax7 = $request->get('max7');
                $msScores->gpamax8 = $details['max8'];
                $msScores->gpa1 = $request->get('gpa1');
                $msScores->gpa2 = $request->get('gpa2');
                $msScores->gpa3 = $request->get('gpa3');
                $msScores->gpa4 = $request->get('gpa4');
                $msScores->gpa5 = $request->get('gpa5');
                $msScores->gpa6 = $request->get('gpa6');
                $msScores->gpa7 = $request->get('gpa7');
                $msScores->gpa8 = $details['gpa8'];

                $msScores->save();

                $others = new MsOther();

                $others->applNo = $applNo;
                $others->score = $details['score'];
                $others->rank = $details['rank'];
                $others->validity = $details['validity'];
                $others->discipline = $details['discipline'];
                $others->exam = $details['exam'];

                $others->save();

                return View::make('success')->with('details', $details);
            }
            else if(($checkcandidate != NULL && $checkcandidate->flag == false) || ($reg_candidate != NULL && $reg_candidate->flag == false))
            {
                $personal_details = array(
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'dob' => $request->input('dob'),
                    'areaOfResearch' => $request->input('area_of_research'),
                    'applicationCategory' => $request->input('appl_categ'),
                    'chalanNo' => $request->input('chalanNo'),
                    'imagePath' => $details['imagePath'],
                    'dept1' => $request->input('department1'),
                    'dept2' => $request->input('department2'),
                    'dept3' => $request->input('department3'),
                    'fatherName' => $request->input('father_name'),
                    'category' => $request->input('category'),
                    'sex' => $request->input('sex'),
                    'maritalStatus' => $request->input('marital_status'),
                    'PH' => $request->input('ph'),
                    'age' => $request->input('age'),
                    'nationality' => $request->input('nationality'),
                    'addrforcomm' => $request->input('addr_for_commn'),
                    'permanentaddr' => $request->input('permanent_addr'),
                    'mobile' => $request->input('mobile'),
                    'lanline' => $request->input('lanline'),
                    'flag' => true,
                    're_submitted' => true
                    );

                Ms::where('registrationNumber', $request->input('regNo'))->update($personal_details);

                $applNo = Ms::where('registrationNumber', $request->input('regNo'))->first()->applNo;

                $ug_details = array(
                    'degreeName' => $request->input('ug_deg'),
                    'branch' => $request->input('ug_branch'),
                    'gpa' => $details['ug_gpa'],
                    'class' => $request->input('ug_class'),
                    'institutionName' => $request->input('ug_name_of_inst'),
                    'universityName' => $request->input('ug_name_of_uni'),
                    'yop' => $request->input('ug_yop'),
                    );

                MsUg::where('applNo', $applNo)->update($ug_details);

                $pro_details = array(
                    'proexp1' => $request->input('employer_details_1'),
                    'proexp2' => $request->input('employer_details_2'),
                    'proexp3' => $request->input('employer_details_3'),
                    'proexp4' => $request->input('employer_details_4'),
                    'proexp5' => $request->input('employer_details_5'),
                    'proexp6' => $request->input('employer_details_6'),
                    'position1' => $request->input('emp_pos_1'),
                    'position2' => $request->input('emp_pos_2'),
                    'position3' => $request->input('emp_pos_3'),
                    'position4' => $request->input('emp_pos_4'),
                    'position5' => $request->input('emp_pos_5'),
                    'position6' => $request->input('emp_pos_6'),
                    'from1' => $request->input('emp_from_1'),
                    'from2' => $request->input('emp_from_2'),
                    'from3' => $request->input('emp_from_3'),
                    'from4' => $request->input('emp_from_4'),
                    'from5' => $request->input('emp_from_5'),
                    'from6' => $request->input('emp_from_6'),
                    'to1' => $request->input('emp_to_1'),
                    'to2' => $request->input('emp_to_2'),
                    'to3' => $request->input('emp_to_3'),
                    'to4' => $request->input('emp_to_4'),
                    'to5' => $request->input('emp_to_5'),
                    'to6' => $request->input('emp_to_6')
                    );

                MsPro::where('applNo', $applNo)->update($pro_details);

                $score_details = array(
                    'gpamax1' => $request->input('max1'),
                    'gpamax2' => $request->input('max2'),
                    'gpamax3' => $request->input('max3'),
                    'gpamax4' => $request->input('max4'),
                    'gpamax5' => $request->input('max5'),
                    'gpamax6' => $request->input('max6'),
                    'gpamax7' => $request->input('max7'),
                    'gpamax8' => $details['max8'],
                    'gpa1' => $request->input('gpa1'),
                    'gpa2' => $request->input('gpa2'),
                    'gpa3' => $request->input('gpa3'),
                    'gpa4' => $request->input('gpa4'),
                    'gpa5' => $request->input('gpa5'),
                    'gpa6' => $request->input('gpa6'),
                    'gpa7' => $request->input('gpa7'),
                    'gpa8' => $details['gpa8']
                    );

                MsScores::where('applNo', $applNo)->update($score_details);

                $other_details = array(
                    'score' => $details['score'],
                    'rank' => $details['rank'],
                    'validity' => $details['validity'],
                    'discipline' => $details['discipline'],
                    'exam' => $details['exam'],
                    );

                MsOther::where('applNo', $applNo)->update($other_details);

                return view('success')->with('details', array(
                    "reg_number" => $request->input('regNo'),
                    "name" => $request->input('name'),
                    "department1" => self::department($request->input('department1')),
                    "department2" => self::department($request->input('department2')),
                    "department3" => self::department($request->input('department3')),
                ));
            }
            else
            {
                $message = "User already exists";
                return View::make('error')->with('message' , $message);
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
    }
}
