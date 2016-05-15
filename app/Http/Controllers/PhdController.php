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
use App\Phd;
use App\PhdUg;
use App\PhdPg;
use App\PhdOther;
use App\PhdPro;
use App\SavePhd;
use Session;

class PhdController extends Controller
{
    public function validated(Request $request)
    {

    	$rules = array(                        
	        // 'date' => 'required', 
            'chalanNo' => 'required',    
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
	        'ug_class' => 'required|in:Honours,Distinction,First,Second',
	        'ug_name_of_inst' => 'required',
	        'ug_name_of_uni' => 'required',
	        'ug_yop' => 'required',
            'pg_deg' => 'required',
            'pg_branch' => 'required',
            'pg_class' => 'required|in:Honours,Distinction,First,Second',
            'pg_name_of_inst' => 'required',
            'pg_name_of_uni' => 'required',
            'pg_yop' => 'required'
            // 'g-recaptcha-response' => 'required|captcha'              
    	);

        
    	$validator = Validator::make($request->input(), $rules);

        if(sizeof($validator->errors()) > 0)
    	{
    		$message = 'Please fill in all the details';
			return View::make('error')->with('message', $validator->errors());
    	}
        else
        {

        	$checkcandidate = Phd::where('name' , $request->input('name'))
                                ->where('dob', $request->input('dob'))
        						->where('addrforcomm' , $request->input('addr_for_commn'))
        						->first();
            $bool1 = false;
            if($checkcandidate != NULL)
            {
                $bool1 = $checkcandidate->flag;
            }
            $bool2 = Phd::where('registrationNumber' , $request->get('regNo'))
                                ->first();

        	if($bool1 == false && $bool2 == NULL){
            $details = array(
                'date' => $request->input('date'),
                // 'date_of_sub' => $request->input('date_of_sub'),
                'application_category' => $request->input('appl_categ'),//dont know how to add $name attribute here
                'image_path' => $request->input('image_path'),
                'department1' => self::department($request->input('department1')),
                'department2' => self::department($request->input('department2')),
                'department3' => self::department($request->input('department3')),
                'area_of_research' => $request->input('area_of_research'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'landline' => $request->input('landline'),
                'name' => $request->input('name'),
                'father_name' => $request->input('father_name'),
                'dob' => $request->input('dob'),
                'category' => $request->input('category'),//dont know how to add $name attribute here
                'sex' => $request->input('sex'),//dont know how to add $name attribute here
                'marital_status' => $request->input('marital_status'),
                'ph' => $request->input('ph'),//dont know how to add $name attribute here
                'nationality' => $request->input('nationality'),
                'addr_for_commn' => $request->input('addr_for_commn'),
                'permanent_addr' => $request->input('permanent_addr'),
                'ug_deg' => $request->input('ug_deg'),
                'ug_branch' => $request->input('ug_branch'),
                'ug_percentage' => $request->input('ug_percentage'),
                'ug_gpa' => $request->input('ug_gpa'),
                'ug_class' => $request->input('ug_class'),
                'ug_name_of_inst' => $request->input('ug_name_of_inst'),
                'ug_name_of_uni' => $request->input('ug_name_of_uni'),
                'ug_yop' => $request->input('ug_yop'),
                'pg_deg' => $request->input('pg_deg'),
                'pg_branch' => $request->input('pg_branch'),
                'pg_gpa' => $request->input('pg_gpa'),
                'pg_class' => $request->input('pg_class'),
                'pg_name_of_inst' => $request->input('pg_name_of_inst'),
                'pg_name_of_uni' => $request->input('pg_name_of_uni'),
                'pg_yop' => $request->input('pg_yop'),
                // 'score' => $request->input('score'),
                // 'rank' => $request->input('rank'),
                'title_of_project' => $request->input('title_of_project'),
                'details_of_pub1' => $request->input('details_of_pub1'),
                'details_of_pub2' => $request->input('details_of_pub2'),
                'details_of_pub3' => $request->input('details_of_pub3'),
                'awards1' => $request->input('awards1'),
                'awards2' => $request->input('awards2'),
                'awards3' => $request->input('awards3'),
                'employer_details_1' => $request->input('employer_details_1'),
                'employer_details_2' =>$request->input('employer_details_2'),
                'employer_details_3' => $request->input('employer_details_3'),
                'position1' => $request->input('emp_pos_1'),
                'position2' => $request->input('emp_pos_2'),
                'position3' => $request->input('emp_pos_3'),
                'from1' => $request->input('emp_from_1'),
                'from2' => $request->input('emp_from_2'),
                'from3' => $request->input('emp_from_3'),
                'to1' => $request->input('emp_to_1'),
                'to2' => $request->input('emp_to_2'),
                'to3' => $request->input('emp_to_3')
            );

            if($request->input('ra2') == 'on')
            {
                $details['pg_gpa'] = $details['pg_gpa'] . ' excluding final semester';
            }
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

            $file = $request->file('image_path');  
            
            $stored_image_path = SavePhd::where('registrationNumber', Session::get('regNo'))->select('imagePath')->first()['imagePath'];
            $stored_image_arr = explode(',', $stored_image_path);
            $stored_image_extension = $stored_image_arr[0];
            $stored_sign_extension = count($stored_image_arr) == 2 ? $stored_image_arr[1] : '';

            $extension = '';
            if($file)
                $extension = $request->file('image_path')->getClientOriginalExtension();
            if($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg')
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
            if($signExt == 'jpg' || $signExt == 'png' || $signExt == 'jpeg')
            {
                list($width, $height) = getimagesize($file);
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

            $form1 = $form2 = $form3 = NULL;
            if($request->input('appl_categ') == 'External')
            {
                $form1 = $request->file('form1');
                $form2 = $request->file('form2');
                if(!$form1 || !$form2)
                {
                
                }
                else
                {
                    $extension1 = $request->file('form1')->getClientOriginalExtension();
                    $extension2 = $request->file('form2')->getClientOriginalExtension();
                    if($extension1 != 'pdf' || $extension2 != 'pdf')
                    {
                        $message = 'Invalid file format for the uploaded files';
                        return View::make('error')->with('message', $message);
                    }
                }
            }
            else if($request->input('appl_categ') == 'onCampus')
            {
                $form3 = $request->file('form3');
                if(!$form3)
                {
                    
                }
                else
                {
                    $extension3 = $request->file('form3')->getClientOriginalExtension();
                    if($extension3 != 'pdf')
                    {
                        $message = 'Invalid file format for the uploaded files';
                        return View::make('error')->with('message', $message);
                    }
                }
            }
            else 
            {
                $form1 = $form2 = $form3 = NULL;
            }

            $reg_number = $request->input('regNo');
            $reg_number_modified = str_replace("/", "-", $reg_number);

            $details['reg_number'] = $reg_number;
            $details['phdorms'] = 'phd';
            if($request->input('appl_categ') == 'External' || $request->input('appl_categ') == 'onCampus'){
                if($form1 && $form2)
                {
                    $form1 = $form1->move(public_path().'/uploads/PHD/'.$reg_number_modified, 'form1.' . $extension1);
                    $form2 = $form2->move(public_path().'/uploads/PHD/'.$reg_number_modified, 'form2.' . $extension2);
                }
                else if($form3)
                {
                    $form3 = $form3->move(public_path().'/uploads/PHD/'.$reg_number_modified, 'form3.' . $extension3);
                }
            }
            
            $image_extension = $stored_image_extension;
            $sign_extension = $stored_sign_extension;
            if($file)
            {
                $file = $file->move(public_path().'/uploads/PHD/'.$reg_number_modified, 'photo.' . $extension);
                $image_extension = $extension;
            }
            if($sign)
            {
                $sign = $sign->move(public_path().'/uploads/PHD/'.$reg_number_modified, 'sign.' . $signExt);
                $sign_extension = $signExt;
            }
            $details['imagePath'] = $image_extension . "," . $sign_extension;
            //Phd::where('registrationNumber', $request->input('regNo'))
            //                    ->update($details);

            
            $candidate = new Phd();

            $candidate->chalanNo = $request->input('chalanNo');
            $candidate->registrationNumber = $request->input('regNo');
            $candidate->applicationCategory = $request->input('appl_categ');
            $candidate->dept1 = $request->input('department1');
            $candidate->dept2 = $request->input('department2');
            $candidate->dept3 = $request->input('department3');
            $candidate->areaOfResearch = $request->input('area_of_research');
            $candidate->name = $request->input('name');
            $candidate->fatherName = $request->input('father_name');
            $candidate->dob = $request->input('dob');
            $candidate->category = $request->input('category');
            $candidate->sex = $request->input('sex');
            $candidate->maritalStatus = $request->input('marital_status');
            $candidate->ph = $request->input('ph');
            $candidate->nationality = $request->input('nationality');
            $candidate->addrforcomm = $request->input('addr_for_commn');
            $candidate->permanentaddr = $request->input('permanent_addr');
            $candidate->email = $request->input('email');
            $candidate->mobile = $request->input('mobile');
            $candidate->lanline = $request->input('landline');
            $candidate->imagePath = $details['imagePath'];

            $candidate->save();

            $applNo = $candidate->applNo;

            $ugDetails = new PhdUg();

            $ugDetails->applNo = $applNo;
            $ugDetails->degreeName = $request->input('ug_deg');
            $ugDetails->branch = $request->input('ug_branch');
            $ugDetails->gpa = $details['ug_gpa'];
            // replace this field by gpa
            $ugDetails->class = $request->input('ug_class');
            $ugDetails->institutionName = $request->input('ug_name_of_inst');
            $ugDetails->universityName= $request->input('ug_name_of_uni');
            $ugDetails->yop = $request->input('ug_yop');
            
            $ugDetails->save();

            $pgDetails = new PhdPg();
            
            $pgDetails->applNo = $applNo;;
            $pgDetails->degreeName = $request->input('pg_deg');
            $pgDetails->branch = $request->input('pg_branch');
            $pgDetails->gpa = $details['pg_gpa'];
            $pgDetails->class = $request->input('pg_class');
            $pgDetails->institutionName = $request->input('pg_name_of_inst');
            $pgDetails->universityName= $request->input('pg_name_of_uni');
            $pgDetails->yop = $request->input('pg_yop');
            
            $pgDetails->save();

            $others = new PhdOther();

            $others->applNo = $applNo;
            $others->score = $details['score'];
            $others->rank = $details['rank'];
            $others->validity = $details['validity'];
            $others->discipline = $details['discipline'];
            $others->exam = $details['exam'];
            $others->pgproject = $request->input('title_of_project');
            $others->publications1 = $request->input('details_of_pub1');
            $others->publications2 = $request->input('details_of_pub2');
            $others->publications3 = $request->input('details_of_pub3');
            $others->publications4 = $request->input('details_of_pub4');
            $others->publications5 = $request->input('details_of_pub5');
            $others->publications6 = $request->input('details_of_pub6');
            $others->awards1 = $request->input('awards1');
            $others->awards2 = $request->input('awards2');
            $others->awards3 = $request->input('awards3');

            $others->save();

            $pro = new PhdPro();

            $pro->applNo = $applNo;
            $pro->proexp1 = $request->input('employer_details_1');
            $pro->proexp2 = $request->input('employer_details_2');
            $pro->proexp3 = $request->input('employer_details_3');
            $pro->position1 = $request->input('emp_pos_1');
            $pro->position2 = $request->input('emp_pos_2');
            $pro->position3 = $request->input('emp_pos_3');
            $pro->from1 = $request->input('emp_from_1');
            $pro->from2 = $request->input('emp_from_2');
            $pro->from3 = $request->input('emp_from_3');
            $pro->to1 = $request->input('emp_to_1');
            $pro->to2 = $request->input('emp_to_2');
            $pro->to3 = $request->input('emp_to_3');

            $pro->save();

            return View::make('success')->with('details', $details);
            }
            else{
            	$message = "User already exists ";
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
