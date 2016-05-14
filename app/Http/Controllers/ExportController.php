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
    	$phdCandidatesPersonal = Phd::all();
    	$phdCandidatesUg = PhdUg::all();
    	$phdCandidatesPg = PhdPg::all();
    	$phdCandidatesPro = PhdPro::all();
    	$phdCandidatesOther = PhdOther::all();
    	$phdCandidates = array();
    	for($i = 0; $i < sizeof($phdCandidatesPersonal); $i++)
    	{
    		$personArray = $phdCandidatesPersonal[$i]->toArray();
    		$ugArray = $phdCandidatesUg[$i]->toArray();
    		$pgArray = $phdCandidatesPg[$i]->toArray();
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
		})->export('xls');
	}

	public function allMsCandidatesExport() 
	{
		$msCandidatesPersonal = Ms::all();
    	$msCandidatesUg = MsUg::all();
    	$msCandidatesScores = MsScores::all();
    	$msCandidatesPro = MsPro::all();
    	$msCandidatesOther = MsOther::all();
    	$msCandidates = array();
    	for($i = 0; $i < sizeof($msCandidatesPersonal); $i++)
    	{
    		$personArray = $msCandidatesPersonal[$i]->toArray();
    		$ugArray = $msCandidatesUg[$i]->toArray();
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
		})->export('xls');
    }
}
