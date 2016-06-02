<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Phd;
use App\Ms;
use App\SavePhd;
use App\SaveMs;
use App\PhdUg;
use App\PhdPg;
use App\PhdOther;
use App\PhdPro;
use App\MsUg;
use App\MsScores;
use App\MsPro;
use App\MsOther;
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

            $personal_details = Phd::where('registrationNumber', $regNo)->first();
            $ug_details = PhdUg::where('applNo', $personal_details->applNo)->first();
            $pg_details = PhdPg::where('applNo', $personal_details->applNo)->first();
            $other_details = PhdOther::where('applNo', $personal_details->applNo)->first();
            $pro_details = PhdPro::where('applNo', $personal_details->applNo)->first();

            $details = array(
                'name' => $personal_details->name,
                'email' => $personal_details->email,
                'dob' => $personal_details->dob,
                'areaOfResearch' => $personal_details->areaOfResearch,
                'applicationCategory' => $personal_details->applicationCategory,
                'chalanNo' => $personal_details->chanlanNo,
                'imagePath' => $personal_details->imagePath,
                'dept1' => $personal_details->dept1,
                'dept2' => $personal_details->dept2,
                'dept3' => $personal_details->dept3,
                'fatherName' => $personal_details->fatherName,
                'category' => $personal_details->category,
                'sex' => $personal_details->sex,
                'maritalStatus' => $personal_details->maritalStatus,
                'PH' => $personal_details->PH,
                'age' => $personal_details->age,
                'nationality' => $personal_details->nationality,
                'addrforcomm' => $personal_details->addrforcomm,
                'permanentaddr' => $personal_details->permanentaddr,
                'mobile' => $personal_details->mobile,
                'lanline' => $personal_details->lanline,
                'ugdegreeName' => $ug_details->degreeName,
                'ugbranch' => $ug_details->branch,
                'uggpa' => $ug_details->gpa,
                'ugclass' => $ug_details->class,
                'uginstitutionName' => $ug_details->institutionName,
                'uguniversityName' => $ug_details->universityName,
                'ugyop' => $ug_details->yop,
                'pgdegreeName' => $pg_details->degreeName,
                'pgbranch' => $pg_details->branch,
                'pggpa' => $pg_details->gpa,
                'pgclass' => $pg_details->class,
                'pginstitutionName' => $pg_details->institutionName,
                'pguniversityName' => $pg_details->universityName,
                'pgyop' => $pg_details->yop,
                'score' => $other_details->score,
                'rank' => $other_details->rank,
                'validity' => $other_details->validity,
                'discipline' => $other_details->discipline,
                'exam' => $other_details->exam,
                'pgproject' => $other_details->pgproject,
                'publications1' => $other_details->publications1,
                'publications2' => $other_details->publications2,
                'publications3' => $other_details->publications3,
                'publications4' => $other_details->publications4,
                'publications5' => $other_details->publications5,
                'publications6' => $other_details->publications6,
                'awards1' => $other_details->awards1,
                'awards2' => $other_details->awards2,
                'awards3' => $other_details->awards3,
                'awards4' => $other_details->awards4,
                'awards5' => $other_details->awards5,
                'awards6' => $other_details->awards6,
                'proexp1' => $pro_details->proexp1,
                'proexp2' => $pro_details->proexp2,
                'proexp3' => $pro_details->proexp3,
                'proexp4' => $pro_details->proexp4,
                'proexp5' => $pro_details->proexp5,
                'proexp6' => $pro_details->proexp6,
                'position1' => $pro_details->position1,
                'position2' => $pro_details->position2,
                'position3' => $pro_details->position3,
                'position4' => $pro_details->position4,
                'position5' => $pro_details->position5,
                'position6' => $pro_details->position6,
                'from1' => $pro_details->from1,
                'from2' => $pro_details->from2,
                'from3' => $pro_details->from3,
                'from4' => $pro_details->from4,
                'from5' => $pro_details->from5,
                'from6' => $pro_details->from6,
                'to1' => $pro_details->to1,
                'to2' => $pro_details->to2,
                'to3' => $pro_details->to3,
                'to4' => $pro_details->to4,
                'to5' => $pro_details->to5,
                'to6' => $pro_details->to6
                );

            SavePhd::where('registrationNumber', $regNo)->update($details);

            return json_encode(0);
    	}
        else
        {
            Ms::where('registrationNumber', $regNo)
                    ->update(['flag' => false]);

            $personal_details = Ms::where('registrationNumber', $regNo)->first();
            $ug_details = MsUg::where('applNo', $personal_details->applNo)->first();
            $score_details = MsScores::where('applNo', $personal_details->applNo)->first();
            $other_details = MsOther::where('applNo', $personal_details->applNo)->first();
            $pro_details = MsPro::where('applNo', $personal_details->applNo)->first();

            $details = array(
                'name' => $personal_details->name,
                'email' => $personal_details->email,
                'dob' => $personal_details->dob,
                'applicationCategory' => $personal_details->applicationCategory,
                'chalanNo' => $personal_details->chanlanNo,
                'imagePath' => $personal_details->imagePath,
                'dept1' => $personal_details->dept1,
                'dept2' => $personal_details->dept2,
                'dept3' => $personal_details->dept3,
                'fatherName' => $personal_details->fatherName,
                'category' => $personal_details->category,
                'sex' => $personal_details->sex,
                'maritalStatus' => $personal_details->maritalStatus,
                'PH' => $personal_details->PH,
                'age' => $personal_details->age,
                'nationality' => $personal_details->nationality,
                'addrforcomm' => $personal_details->addrforcomm,
                'permanentaddr' => $personal_details->permanentaddr,
                'mobile' => $personal_details->mobile,
                'lanline' => $personal_details->lanline,
                'ugdegreeName' => $ug_details->degreeName,
                'ugbranch' => $ug_details->branch,
                'uggpa' => $ug_details->gpa,
                'ugclass' => $ug_details->class,
                'uginstitutionName' => $ug_details->institutionName,
                'uguniversityName' => $ug_details->universityName,
                'ugyop' => $ug_details->yop,
                'score' => $other_details->score,
                'rank' => $other_details->rank,
                'validity' => $other_details->validity,
                'discipline' => $other_details->discipline,
                'exam' => $other_details->exam,
                'gpamax1' => $score_details->gpamax1,
                'gpa1' => $score_details->gpa1,
                'gpamax2' => $score_details->gpamax2,
                'gpa2' => $score_details->gpa2,
                'gpamax3' => $score_details->gpamax3,
                'gpa3' => $score_details->gpa3,
                'gpamax4' => $score_details->gpamax4,
                'gpa4' => $score_details->gpa4,
                'gpamax5' => $score_details->gpamax5,
                'gpa5' => $score_details->gpa5,
                'gpamax6' => $score_details->gpamax6,
                'gpa6' => $score_details->gpa6,
                'gpamax7' => $score_details->gpamax7,
                'gpa7' => $score_details->gpa7,
                'gpamax8' => $score_details->gpamax8,
                'gpa8' => $score_details->gpa8,
                'proexp1' => $pro_details->proexp1,
                'proexp2' => $pro_details->proexp2,
                'proexp3' => $pro_details->proexp3,
                'proexp4' => $pro_details->proexp4,
                'proexp5' => $pro_details->proexp5,
                'proexp6' => $pro_details->proexp6,
                'position1' => $pro_details->position1,
                'position2' => $pro_details->position2,
                'position3' => $pro_details->position3,
                'position4' => $pro_details->position4,
                'position5' => $pro_details->position5,
                'position6' => $pro_details->position6,
                'from1' => $pro_details->from1,
                'from2' => $pro_details->from2,
                'from3' => $pro_details->from3,
                'from4' => $pro_details->from4,
                'from5' => $pro_details->from5,
                'from6' => $pro_details->from6,
                'to1' => $pro_details->to1,
                'to2' => $pro_details->to2,
                'to3' => $pro_details->to3,
                'to4' => $pro_details->to4,
                'to5' => $pro_details->to5,
                'to6' => $pro_details->to6
                );

            SaveMs::where('registrationNumber', $regNo)->update($details);

            return json_encode(0);
        }
    }
}
