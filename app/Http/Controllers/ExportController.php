<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Excel;
use App\Phd;
use App\PhdUg;
use App\PhdPg;
use App\PhdPro;
use App\PhdOther;
use App\Ms;
use App\MsUg;
use App\MsScores;
use App\MsPro;
use App\MsOther;

class ExportController extends Controller
{
    public function allPhdCandidatesExport()
    {
    	$phdCandidatesPersonal = Phd::orderBy('created_at', 'desc')->get();
    	$phdCandidatesUg = PhdUg::orderBy('created_at', 'desc')->get();
    	$phdCandidatesPg = PhdPg::orderBy('created_at', 'desc')->get();
    	$phdCandidatesPro = PhdPro::orderBy('created_at', 'desc')->get();
    	$phdCandidatesOther = PhdOther::orderBy('created_at', 'desc')->get();
    	$phdCandidates = array();
    	for($i = 0; $i < sizeof($phdCandidatesPersonal); $i++)
    	{
    		$personArray = $phdCandidatesPersonal[$i]->toArray();
    		$ugArray = $phdCandidatesUg[$i]->toArray();
            foreach ($ugArray as $key => $value) {
                $ugArray['ug'.$key] = $value;
                unset($ugArray[$key]);
            }
    		$pgArray = $phdCandidatesPg[$i]->toArray();
            foreach ($pgArray as $key => $value) {
                $pgArray['pg'.$key] = $value;
                unset($pgArray[$key]);
            }
    		$proArray = $phdCandidatesPro[$i]->toArray();
    		$otherArray = $phdCandidatesOther[$i]->toArray();
    		$phdCandidates[$i] = array_merge($personArray, $ugArray);
    		$phdCandidates[$i] = array_merge($phdCandidates[$i], $pgArray);
    		$phdCandidates[$i] = array_merge($phdCandidates[$i], $proArray);
    		$phdCandidates[$i] = array_merge($phdCandidates[$i], $otherArray);
    	}

		Excel::create('Phd Candidates', function($excel) use($phdCandidates) {
		    $excel->sheet('Sheet 1', function($sheet) use($phdCandidates) {
		        $sheet->fromArray($phdCandidates);
		    });
		})->export('xlsx');
	}

	public function allMsCandidatesExport() 
	{
		$msCandidatesPersonal = Ms::orderBy('created_at', 'desc')->get();
    	$msCandidatesUg = MsUg::orderBy('created_at', 'desc')->get();
    	$msCandidatesScores = MsScores::orderBy('created_at', 'desc')->get();
    	$msCandidatesPro = MsPro::orderBy('created_at', 'desc')->get();
    	$msCandidatesOther = MsOther::orderBy('created_at', 'desc')->get();
    	$msCandidates = array();
    	for($i = 0; $i < sizeof($msCandidatesPersonal); $i++)
    	{
    		$personArray = $msCandidatesPersonal[$i]->toArray();
    		$ugArray = $msCandidatesUg[$i]->toArray();
            foreach ($ugArray as $key => $value) {
                $ugArray['ug'.$key] = $value;
                unset($ugArray[$key]);
            }
    		$scoresArray = $msCandidatesScores[$i]->toArray();
    		$proArray = $msCandidatesPro[$i]->toArray();
    		$otherArray = $msCandidatesOther[$i]->toArray();
    		$msCandidates[$i] = array_merge($personArray, $ugArray);
    		$msCandidates[$i] = array_merge($msCandidates[$i], $scoresArray);
    		$msCandidates[$i] = array_merge($msCandidates[$i], $proArray);
    		$msCandidates[$i] = array_merge($msCandidates[$i], $otherArray);
    	}
		Excel::create('Ms Candidates', function($excel) use($msCandidates) {
		    $excel->sheet('Sheet 2', function($sheet) use($msCandidates) {
		        $sheet->fromArray($msCandidates);
		    });
		})->export('xlsx');
    }

    public function deptPhdCandidatesExport($dept)
    {
        $phdCandidatesPersonal = Phd::where('dept1', $dept)
                                        ->orWhere('dept2', $dept)
                                        ->orWhere('dept3', $dept)
                                        ->orderBy('created_at', 'desc')
                                        ->get();
        $phdCandidates = array();
        for($i = 0; $i < sizeof($phdCandidatesPersonal); $i++)
        {
            $personArray = $phdCandidatesPersonal[$i]->toArray();
            $ugArray = PhdUg::where('applNo', $personArray['applNo'])->orderBy('created_at', 'desc')->get()[0]->toArray();
            foreach ($ugArray as $key => $value) {
                $ugArray['ug'.$key] = $value;
                unset($ugArray[$key]);
            }
            $pgArray = PhdPg::where('applNo', $personArray['applNo'])->orderBy('created_at', 'desc')->get()[0]->toArray();
            foreach ($pgArray as $key => $value) {
                $pgArray['pg'.$key] = $value;
                unset($pgArray[$key]);
            }
            $proArray = PhdPro::where('applNo', $personArray['applNo'])->orderBy('created_at', 'desc')->get()[0]->toArray();
            $otherArray = PhdOther::where('applNo', $personArray['applNo'])->orderBy('created_at', 'desc')->get()[0]->toArray();
            $phdCandidates[$i] = array_merge($personArray, $ugArray);
            $phdCandidates[$i] = array_merge($phdCandidates[$i], $pgArray);
            $phdCandidates[$i] = array_merge($phdCandidates[$i], $proArray);
            $phdCandidates[$i] = array_merge($phdCandidates[$i], $otherArray);
        }
        Excel::create($dept.'_phd_'.$phdCandidates[0]['created_at'], function($excel) use($phdCandidates) {
            $excel->sheet('Sheet 1', function($sheet) use($phdCandidates) {
                $sheet->fromArray($phdCandidates);
            });
        })->export('xlsx');
    }

    public function deptMsCandidatesExport($dept)
    {
        $msCandidatesPersonal = Ms::where('dept1', $dept)
                                        ->orWhere('dept2', $dept)
                                        ->orWhere('dept3', $dept)
                                        ->orderBy('created_at', 'desc')
                                        ->get();
        $msCandidates = array();
        for($i = 0; $i < sizeof($msCandidatesPersonal); $i++)
        {
            $personArray = $msCandidatesPersonal[$i]->toArray();
            $ugArray = MsUg::where('applNo', $personArray['applNo'])->orderBy('created_at', 'desc')->get()[0]->toArray();
            foreach ($ugArray as $key => $value) {
                $ugArray['ug'.$key] = $value;
                unset($ugArray[$key]);
            }
            $pgArray = MsScores::where('applNo', $personArray['applNo'])->orderBy('created_at', 'desc')->get()[0]->toArray();
            $proArray = MsPro::where('applNo', $personArray['applNo'])->orderBy('created_at', 'desc')->get()[0]->toArray();
            $otherArray = MsOther::where('applNo', $personArray['applNo'])->orderBy('created_at', 'desc')->get()[0]->toArray();
            $msCandidates[$i] = array_merge($personArray, $ugArray);
            $msCandidates[$i] = array_merge($msCandidates[$i], $pgArray);
            $msCandidates[$i] = array_merge($msCandidates[$i], $proArray);
            $msCandidates[$i] = array_merge($msCandidates[$i], $otherArray);
        }
        Excel::create($dept.'_ms_'.$msCandidates[0]['created_at'], function($excel) use($msCandidates) {
            $excel->sheet('Sheet 2', function($sheet) use($msCandidates) {
                $sheet->fromArray($msCandidates);
            });
        })->export('xlsx');
    }

    public function singlePhdCandidateExport($regNo)
    {
        $regNo = str_replace("-", "/", $regNo);
        $departments = explode('/', $regNo);
        $regApplNo = $departments[sizeof($departments) - 1];

        $phdCandidatesPersonal = Phd::where('registrationNumber', $regNo)
                                ->get();
        $applNo = $phdCandidatesPersonal[0]->applNo;

        $phdCandidatesUg = PhdUg::where('applNo', $applNo)
                                ->get();
        $phdCandidatesPg = PhdPg::where('applNo', $applNo)
                                ->get();
        $phdCandidatesPro = PhdPro::where('applNo', $applNo)
                                ->get();
        $phdCandidatesOther = PhdOther::where('applNo', $applNo)
                                ->get();

        $phdCandidates = array();

        for($i = 0; $i < sizeof($phdCandidatesPersonal); $i++)
        {
            $personArray = $phdCandidatesPersonal[$i]->toArray();
            $ugArray = $phdCandidatesUg[$i]->toArray();
            foreach ($ugArray as $key => $value) {
                $ugArray['ug'.$key] = $value;
                unset($ugArray[$key]);
            }
            $pgArray = $phdCandidatesPg[$i]->toArray();
            foreach ($pgArray as $key => $value) {
                $pgArray['pg'.$key] = $value;
                unset($pgArray[$key]);
            }
            $proArray = $phdCandidatesPro[$i]->toArray();
            $otherArray = $phdCandidatesOther[$i]->toArray();
            $phdCandidates[$i] = array_merge($personArray, $ugArray);
            $phdCandidates[$i] = array_merge($phdCandidates[$i], $pgArray);
            $phdCandidates[$i] = array_merge($phdCandidates[$i], $proArray);
            $phdCandidates[$i] = array_merge($phdCandidates[$i], $otherArray);
        }
        
        $name = str_replace("/", "-", $regNo);

        Excel::create($name, function($excel) use($phdCandidates) { 
            $excel->sheet('Sheet 3', function($sheet) use($phdCandidates) {
                $sheet->fromArray($phdCandidates);
            });
        })->export('xlsx');
    }   

    public function singleMsCandidatesExport($regNo) 
    {
        $regNo = str_replace('-', '/', $regNo);
        $departments = explode('/', $regNo);
        $regApplNo = $departments[sizeof($departments) - 1];

        $msCandidatesPersonal = Ms::where('registrationNumber', $regNo)
                                ->get();
        $applNo = $msCandidatesPersonal[0]->applNo;  

        $msCandidatesUg = MsUg::where('applNo', $applNo)
                                ->get();
        $msCandidatesScores = MsScores::where('applNo', $applNo)
                                ->get();
        $msCandidatesPro = MsPro::where('applNo', $applNo)
                                ->get();
        $msCandidatesOther = MsOther::where('applNo', $applNo)
                                ->get();

        $msCandidates = array();

        for($i = 0; $i < sizeof($msCandidatesPersonal); $i++)
        {
            $personArray = $msCandidatesPersonal[$i]->toArray();
            $ugArray = $msCandidatesUg[$i]->toArray();
            foreach ($ugArray as $key => $value) {
                $ugArray['ug'.$key] = $value;
                unset($ugArray[$key]);
            }
            $scoresArray = $msCandidatesScores[$i]->toArray();
            $proArray = $msCandidatesPro[$i]->toArray();
            $otherArray = $msCandidatesOther[$i]->toArray();
            $msCandidates[$i] = array_merge($personArray, $ugArray);
            $msCandidates[$i] = array_merge($msCandidates[$i], $scoresArray);
            $msCandidates[$i] = array_merge($msCandidates[$i], $proArray);
            $msCandidates[$i] = array_merge($msCandidates[$i], $otherArray);
        }
        $name = str_replace("/", "-", $regNo);

        Excel::create($name, function($excel) use($msCandidates) {
            $excel->sheet('Sheet 4', function($sheet) use($msCandidates) {
                $sheet->fromArray($msCandidates);
            });
        })->export('xlsx');
    }


}
