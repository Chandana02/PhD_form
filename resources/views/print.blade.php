  <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admissions NITT | Print Page</title>
  <link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/materialize.min.css')}}">
  <!-- <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->

  <script src="{{URL::asset('assets/js/jquery-2.1.1.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/materialize.min.js')}}"></script> 
</head>
<body>

<div class="container-fluid main">
  
  <div class="row">
    
      <img src="{{ URL::asset('assets/images/admit.png')}}">
    
    
  </div>

<div class="heading"></div>
</div>




@if($phdorms  == 'PHD')
    <div class="container center">
    <h4>Form Details: </h4>
    <div class="row">
    <div class="col l12">
      <div class="col l2">
        <img src="{{ URL::asset('uploads/PHD/'.$applNo.'/photo.' . $imgtype) }}" width="150" height="150">
      </div>
      <table class="bordered" width="1000">
        <thead>
          <tr>
            <td><h5>Application Details</h5></td>
            <td></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><b>Registration Number:</b></td>
            <td>{!! $candidates['registrationNumber'] !!}</td>
         
            <td><b>Date of Registration:</b></td>
            <td>{!! $candidates['created_at'] !!}</td>
          </tr>
          <tr>
            <td><b>Application Category:</b></td>
            <td>{!! $candidates['applicationCategory'] !!}</td>

            <td><b>Bank Referance Number:</b></td>
            <td>{!! $candidates['chalanNo'] !!}</td>
          </tr>
        </tbody>
        <thead>
          <tr>
            <td> <h5>General Details:</h5></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><b>Department 1:</b></td>
            <td>{!! $candidates['dept1'] ? $candidates['dept1'] : 'N/A' !!}</td>
            <td><b>Department 2:</b></td>
            <td>{!! $candidates['dept2'] ? $candidates['dept2'] : 'N/A' !!}</td>
          </tr>
          <tr>
            <td><b>Department 3:</b></td>
            <td>{!! $candidates['dept3'] ? $candidates['dept3'] : 'N/A' !!}</td>
            <td><b>Area of Research:</b></td>
            <td>{!! $candidates['areaOfResearch'] !!}</td>
          </tr>

        </tbody>
        <thead>
          <tr>
            <td><h5>Personal Details:</h5></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><b>Name of Candidate:</b></td>
            <td>{!! $candidates['name'] !!}</td>
            <td><b>Email Id:</b></td>
            <td>{!! $candidates['email'] !!}</td>
          </tr>
          <tr>
            <td><b>Father's Name:</b></td>
            <td>{!! $candidates['fatherName'] !!}</td>
            <td><b>Date of Birth:</b></td>
            <td>{!! $candidates['dob'] !!}</td>
          </tr>
          <tr>
            <td><b>Category:</b></td>
            <td>{!! $candidates['category'] !!}</td>
            <td><b>Marital Status:</b></td>
            <td>{!! $candidates['maritalStatus'] !!}</td>
          </tr>
          <tr>
            <td><b>Sex:</b></td>
            <td>{!! $candidates['sex'] !!}</td>
            <td><b>Physically Handicapped:</b></td>
            <td>{!! $candidates['PH'] !!}</td>
          </tr>
          <tr>
            <td><b>Nationality:</b></td>
            <td>{!! $candidates['nationality'] !!}</td>
            <td><b>Permanent Address:</b></td>
            <td>{!! $candidates['permanentaddr'] !!}</td>
          </tr>                  
          <tr>
            <td><b>Address for Communication:</b></td>
            <td>{!! $candidates['addrforcomm'] !!}</td>
            <td><b>Mobile Number:</b></td>
            <td>{!! $candidates['mobile'] !!}</td>
          </tr>
          <tr>
            <td><b>Landline Number:</b></td>
            <td colspan="3">{!! $candidates['lanline'] !!}</td>
            
          </tr>
        </tbody>
        <thead>
          <tr>
            <td><h5>Undergraduate Details</h5></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><b>Degree:</b></td>
            <td>{!! $ug['degreeName'] !!}</td>
            <td><b>G.P.A:</b></td>
            <td>{!! $ug['gpa'] !!}</td>
          </tr>
          <tr>
            <td><b>Branch:</b></td>
            <td>{!! $ug['branch'] !!}</td>
            <td><b>Class:</b></td>
            <td>{!! $ug['class'] !!}</td>
          </tr>
          <tr>
            <td><b>Name of Institution:</b></td>
            <td>{!! $ug['institutionName'] !!}</td>
            <td><b>University Name:</b></td>
            <td>{!! $ug['universityName'] !!}</td>
          </tr>
           <tr>
            <td><b>Year of passing:</b></td>
            <td colspan="3">{!! $ug['yop'] !!}</td>
            
          </tr>
        </tbody>
        <thead>
          <tr>
            <td><h5>Post-Graduate Details</h5></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><b>Degree:</b></td>
            <td>{!! $pg['degreeName'] !!}</td>
            <td><b>G.P.A:</b></td>
            <td>{!! $pg['gpa'] !!}</td>
          </tr>
          <tr>
            <td><b>Branch:</b></td>
            <td>{!! $pg['branch'] !!}</td>
            <td><b>Class:</b></td>
            <td>{!! $pg['class'] !!}</td>
          </tr>
          <tr>
            <td><b>Name of Institution:</b></td>
            <td>{!! $pg['institutionName'] !!}</td>
            <td><b>University Name:</b></td>
            <td>{!! $pg['universityName'] !!}</td>
          </tr>
           <tr>
            <td><b>Year of passing:</b></td>
            <td colspan="3">{!! $pg['yop'] !!}</td>
            
          </tr>
        </tbody>
        <thead>
          <tr>
            <td><b>GATE/NET/SLET/CSIR/CAT/UGC/NBHM details:</b></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><b>Examination:</b></td>
            <td>{!! $others['exam'] !!}</td>
            <td><b>Score:</b></td>
            <td>{!! $others['score'] !!}</td>
          </tr>
          <tr>
            <td><b>Rank:</b></td>
            <td>{!! $others['rank'] !!}</td>
            <td><b>Valid Till:</b></td>
            <td>{!! $others['validity'] !!}</td>
          </tr>
          <tr>
            <td><b>Discipline:</b></td>
            <td colspan="3">{!! $others['discipline'] !!}</td>
          </tr>
        </tbody>
        <thead>
          <tr>
            <td><h5>Publication/Project Details:</h5></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="2"><b>Title of Project:</b></td>
            <td colspan="2">{!! $others['pgproject'] !!}</td>
          </tr>
          <tr>
            <td><b>Details of Publication 1:</b></td>
            <td>{!! $others['publications1'] !!}</td>
            <td><b>Details of Publication 2:</b></td>
            <td>{!! $others['publications2'] !!}</td>
          </tr>
          <tr>
            <td><b>Details of Publication 3:</b></td>
            <td>{!! $others['publications3'] !!}</td>
            <td><b>Details of Publication 4:</b></td>
            <td>{!! $others['publications4'] !!}</td>
          </tr>
          <tr>
            <td><b>Details of Publication 5:</b></td>
            <td>{!! $others['publications5'] !!}</td>
            <td><b>Details of Publication 6:</b></td>
            <td>{!! $others['publications6'] !!}</td>
          </tr>
          <tr>
            <td><b>Awards1:</b></td>
            <td>{!! $others['awards1'] !!}</td>
            <td><b>Awards2:</b></td>
            <td>{!! $others['awards2'] !!}</td>
          </tr>
          <tr>
            <td><b>Awards3:</b></td>
            <td>{!! $others['awards3'] !!}</td>
            <td><b>Awards4:</b></td>
            <td>{!! $others['awards4'] !!}</td>
          </tr>
          <tr>
            <td><b>Awards5:</b></td>
            <td>{!! $others['awards5'] !!}</td>
            <td><b>Awards6:</b></td>
            <td>{!! $others['awards6'] !!}</td>
          </tr>
        </tbody>
        <thead>
          <tr>
            <td><h5>Employer Details:</h5></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><b>Employer:</b></td>
            <td>{!! $pro['proexp1'] !!}</td>
            <td><b>From</b></td>
            <td>{!! $pro['from1'] !!}</td>
          </tr>
          <tr>
            <td><b>Position:</b></td>
            <td>{!! $pro['position1'] !!}</td>
            <td><b>To</b></td>
            <td>{!! $pro['to1'] !!}</td>
          </tr>
          <tr><td colspan="4"></td></tr>

          <tr>
            <td><b>Employer:</b></td>
            <td>{!! $pro['proexp2'] !!}</td>
            <td><b>From</b></td>
            <td>{!! $pro['from2'] !!}</td>
          </tr>
          <tr>
            <td><b>Position:</b></td>
            <td>{!! $pro['position2'] !!}</td>
            <td><b>To</b></td>
            <td>{!! $pro['to2'] !!}</td>
          </tr>
          <tr><td colspan="4"></td></tr>

          <tr>
            <td><b>Employer:</b></td>
            <td>{!! $pro['proexp3'] !!}</td>
            <td><b>From</b></td>
            <td>{!! $pro['from3'] !!}</td>
          </tr>
          <tr>
            <td><b>Position:</b></td>
            <td>{!! $pro['position3'] !!}</td>
            <td><b>To</b></td>
            <td>{!! $pro['to3'] !!}</td>
          </tr>
          <tr><td colspan="4"></td></tr>

          <tr>
            <td><b>Employer:</b></td>
            <td>{!! $pro['proexp4'] !!}</td>
            <td><b>From</b></td>
            <td>{!! $pro['from4'] !!}</td>
          </tr>
          <tr>
            <td><b>Position:</b></td>
            <td>{!! $pro['position4'] !!}</td>
            <td><b>To</b></td>
            <td>{!! $pro['to4'] !!}</td>
          </tr>
          <tr><td colspan="4"></td></tr>

          <tr>
            <td><b>Employer:</b></td>
            <td>{!! $pro['proexp5'] !!}</td>
            <td><b>From</b></td>
            <td>{!! $pro['from5'] !!}</td>
          </tr>
          <tr>
            <td><b>Position:</b></td>
            <td>{!! $pro['position5'] !!}</td>
            <td><b>To</b></td>
            <td>{!! $pro['to5'] !!}</td>
          </tr>
          <tr><td colspan="4"></td></tr>

          <tr>
            <td><b>Employer:</b></td>
            <td>{!! $pro['proexp6'] !!}</td>
            <td><b>From</b></td>
            <td>{!! $pro['from6'] !!}</td>
          </tr>
          <tr>
            <td><b>Position:</b></td>
            <td>{!! $pro['position6'] !!}</td>
            <td><b>To</b></td>
            <td>{!! $pro['to6'] !!}</td>
          </tr>
        </tbody>
      </table>
      <div class="space-medium"></div>
      <div class="row left">
         <?php
          if($candidates['applicationCategory'] == 'External') {
         ?>
            <a href="{{ '/uploads/PHD/' . $applNo . '/form1.pdf' }}">Form-1 submitted by you</a><br>
            <a href="{{ '/uploads/PHD/' . $applNo . '/form2.pdf' }}">Form-2 submitted by you</a><br>
          <?php
            }
            else if($candidates['applicationCategory'] == 'onCampus') {
          ?>
            <a href="{{ '/uploads/PHD/' . $applNo . '/form3.pdf' }}">Form-3 submitted by you</a>
          <?php
            }
          ?>
      </div>
      <div class="row right">
         <img src="{{ URL::asset('uploads/PHD/'.$applNo.'/sign.'.$signtype) }}" width="250" height="100">
         <p><u>Signature</u></p>
      </div>
  
  </div>


          @else

    <div class="container center">
    <h4>Form Details: </h4>
    <div class="row">
      <div class="col l12">
        <div class="col l3">
          <img src="{{ URL::asset('uploads/MS/'.$applNo.'/photo.' . $imgtype) }}" width="150" height="150">
        </div>
      <table class="bordered">
        <thead>
          <tr>
            <td><h5>Application Details</h5></td>
            <td></td>

          </tr>
        </thead>
        <tbody>
          <tr>
            <td><b>Registration Number:</b></td>
            <td>{!! $candidates['registrationNumber'] !!}</td>
         
            <td><b>Date of Registration:</b></td>
            <td>{!! $candidates['created_at'] !!}</td>
          </tr>
          <tr>
            <td><b>Application Category:</b></td>
            <td colspan="3">{!! $candidates['applicationCategory'] !!}</td>
          </tr>
        </tbody>
      </table>
   
      <table class="bordered">
        <thead>
          <tr>
            <td> <h5>General Details:</h5></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><b>Department 1:</b></td>
            <td>{!! $candidates['dept1'] ? $candidates['dept1'] : 'NA' !!}</td>
            <td><b>Department 2:</b></td>
            <td>{!! $candidates['dept2'] ? $candidates['dept2'] : 'NA' !!}</td>
          </tr>
          <tr>
            <td><b>Department 3:</b></td>
            <td>{!! $candidates['dept3'] ? $candidates['dept3'] : 'NA' !!}</td>
            <td><b>Area of Research:</b></td>
            <td>{!! $candidates['areaOfResearch'] ? $candidates['areaOfResearch'] : 'NA' !!}</td>
          </tr>
        </tbody>
        <thead>
          <tr>
            <td><h5>Personal Details:</h5></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><b>Name of Candidate:</b></td>
            <td>{!! $candidates['name'] !!}</td>
            <td><b>Email Id:</b></td>
            <td>{!! $candidates['email'] !!}</td>
          </tr>
          <tr>
            <td><b>Father's Name:</b></td>
            <td>{!! $candidates['fatherName'] !!}</td>
            <td><b>Date of Birth:</b></td>
            <td>{!! $candidates['dob'] !!}</td>
          </tr>
          <tr>
            <td><b>Category:</b></td>
            <td>{!! $candidates['category'] !!}</td>
            <td><b>Marital Status:</b></td>
            <td>{!! $candidates['maritalStatus'] !!}</td>
          </tr>
          <tr>
            <td><b>Sex:</b></td>
            <td>{!! $candidates['sex'] !!}</td>
            <td><b>Physically Handicapped:</b></td>
            <td>{!! $candidates['PH'] !!}</td>
          </tr>
          <tr>
            <td><b>Nationality:</b></td>
            <td>{!! $candidates['nationality'] !!}</td>
            <td><b>Permanent Address:</b></td>
            <td>{!! $candidates['permanentaddr'] !!}</td>
          </tr>                  
          <tr>
            <td><b>Address for Communication:</b></td>
            <td>{!! $candidates['addrforcomm'] !!}</td>
            <td><b>Mobile Number:</b></td>
            <td>{!! $candidates['mobile'] !!}</td>
          </tr>
          <tr>
            <td><b>Landline Number:</b></td>
            <td colspan="4">{!! $candidates['lanline'] !!}</td>
            
          </tr>
        </tbody>
        <thead>
          <tr>
            <td><h5>Undergraduate Details</h5></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><b>Degree:</b></td>
            <td>{!! $ug['degreeName'] !!}</td>
            <td><b>G.P.A:</b></td>
            <td>{!! $ug['gpa'] !!}</td>
          </tr>
          <tr>
            <td><b>Branch:</b></td>
            <td>{!! $ug['branch'] !!}</td>
            <td><b>Class:</b></td>
            <td>{!! $ug['class'] !!}</td>
          </tr>
          <tr>
            <td><b>Name of Institution:</b></td>
            <td>{!! $ug['institutionName'] !!}</td>
            <td><b>University Name:</b></td>
            <td>{!! $ug['universityName'] !!}</td>
          </tr>
           <tr>
            <td><b>Year of passing:</b></td>
            <td colspan="3">{!! $ug['yop'] !!}</td>
            
          </tr>
        </tbody>
        <thead>
          <tr>
            <td><b>GATE details:</b></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><b>Examination:</b></td>
            <td>{!! $others['exam'] !!}</td>
            <td><b>Score:</b></td>
            <td>{!! $others['score'] !!}</td>
          </tr>
          <tr>
            <td><b>Rank:</b></td>
            <td>{!! $others['rank'] !!}</td>
            <td><b>Valid Till:</b></td>
            <td>{!! $others['validity'] !!}</td>
          </tr>
          <tr>
            <td><b>Discipline:</b></td>
            <td colspan="3">{!! $others['discipline'] !!}</td>
          </tr>
        </tbody>
        <thead>
          <tr>
            <td colspan="4"><h5>Educational Details:</h5></td>
          </tr>
          <tr>
            <td colspan="2"><b>Semester/Year</b></td>
            <td colspan="2"><b>G.P.A./Marks</b></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="2"><b>Semester 1</td>
            <td colspan="2">{!! $scores['gpa1'] ? $scores['gpa1'] : '-' !!} / {!! $scores['gpamax1'] ? $scores['gpamax1'] : '-' !!}</td>
          </tr>
          <tr>
            <td colspan="2"><b>Semester 2</td>
            <td colspan="2">{!! $scores['gpa2'] ? $scores['gpa2'] : '-' !!} / {!! $scores['gpamax2'] ? $scores['gpamax2'] : '-' !!}</td>
          </tr>
          <tr>
            <td colspan="2"><b>Semester 3</td>
            <td colspan="2">{!! $scores['gpa3'] ? $scores['gpa3'] : '-' !!} / {!! $scores['gpamax3'] ? $scores['gpamax3'] : '-' !!}</td>
          </tr>
          <tr>
            <td colspan="2"><b>Semester 4</td>
            <td colspan="2">{!! $scores['gpa4'] ? $scores['gpa4'] : '-' !!} / {!! $scores['gpamax4'] ? $scores['gpamax4'] : '-' !!}</td>
          </tr>
          <tr>
            <td colspan="2"><b>Semester 5</td>
            <td colspan="2">{!! $scores['gpa5'] ? $scores['gpa5'] : '-' !!} / {!! $scores['gpamax5'] ? $scores['gpamax5'] : '-' !!}</td>
          </tr>
          <tr>
            <td colspan="2"><b>Semester 6</td>
            <td colspan="2">{!! $scores['gpa6'] ? $scores['gpa6'] : '-' !!} / {!! $scores['gpamax6'] ? $scores['gpamax6'] : '-' !!}</td>
          </tr>
          <tr>
            <td colspan="2"><b>Semester 7</td>
            <td colspan="2">{!! $scores['gpa7'] ? $scores['gpa7'] : '-' !!} / {!! $scores['gpamax7'] ? $scores['gpamax7'] : '-' !!}</td>
          </tr>
          <tr>
            <td colspan="2"><b>Semester 8</td>
            <td colspan="2">{!! $scores['gpa8'] ?  $scores['gpa8'] : '-' !!} / {!! $scores['gpamax8'] ? $scores['gpamax8'] : '-' !!}</td>
          </tr>

        </tbody>
        <thead>
          <tr>
            <td colspan="4"><h5>Employer Details:</h5></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><b>Employer:</b></td>
            <td>{!! $pro['proexp1'] !!}</td>
            <td><b>From</b></td>
            <td>{!! $pro['from1'] !!}</td>
          </tr>
          <tr>
            <td><b>Position:</b></td>
            <td>{!! $pro['position1'] !!}</td>
            <td><b>To</b></td>
            <td>{!! $pro['to1'] !!}</td>
          </tr>
          <tr><td colspan="4"></td></tr>

          <tr>
            <td><b>Employer:</b></td>
            <td>{!! $pro['proexp2'] !!}</td>
            <td><b>From</b></td>
            <td>{!! $pro['from2'] !!}</td>
          </tr>
          <tr>
            <td><b>Position:</b></td>
            <td>{!! $pro['position2'] !!}</td>
            <td><b>To</b></td>
            <td>{!! $pro['to2'] !!}</td>
          </tr>
          <tr><td colspan="4"></td></tr>

          <tr>
            <td><b>Employer:</b></td>
            <td>{!! $pro['proexp3'] !!}</td>
            <td><b>From</b></td>
            <td>{!! $pro['from3'] !!}</td>
          </tr>
          <tr>
            <td><b>Position:</b></td>
            <td>{!! $pro['position3'] !!}</td>
            <td><b>To</b></td>
            <td>{!! $pro['to3'] !!}</td>
          </tr>
          <tr><td colspan="4"></td></tr>

          <tr>
            <td><b>Employer:</b></td>
            <td>{!! $pro['proexp4'] !!}</td>
            <td><b>From</b></td>
            <td>{!! $pro['from4'] !!}</td>
          </tr>
          <tr>
            <td><b>Position:</b></td>
            <td>{!! $pro['position4'] !!}</td>
            <td><b>To</b></td>
            <td>{!! $pro['to4'] !!}</td>
          </tr>
          <tr><td colspan="4"></td></tr>

          <tr>
            <td><b>Employer:</b></td>
            <td>{!! $pro['proexp5'] !!}</td>
            <td><b>From</b></td>
            <td>{!! $pro['from5'] !!}</td>
          </tr>
          <tr>
            <td><b>Position:</b></td>
            <td>{!! $pro['position5'] !!}</td>
            <td><b>To</b></td>
            <td>{!! $pro['to5'] !!}</td>
          </tr>
          <tr><td colspan="4"></td></tr>

          <tr>
            <td><b>Employer:</b></td>
            <td>{!! $pro['proexp6'] !!}</td>
            <td><b>From</b></td>
            <td>{!! $pro['from6'] !!}</td>
          </tr>
          <tr>
            <td><b>Position:</b></td>
            <td>{!! $pro['position6'] !!}</td>
            <td><b>To</b></td>
            <td>{!! $pro['to6'] !!}</td>
          </tr>
        </tbody>
      </table>

      <div class="space-medium"></div>
      
      <div class="row left">
         <?php if(file_exists('../public/uploads/MS/' . $applNo . '/cert.pdf')) { ?>
          <a href="{{ '/uploads/MS/' . $applNo . '/cert.pdf' }}">Sponsorship certificate submitted by you</a>
          <?php } 
            else {
              echo "You haven't submitted a Sponsorship Certificate";
            }
          ?>
      </div>

      <div class="row right">
         <img src="{{ URL::asset('uploads/MS/'.$applNo.'/sign.'.$signtype) }}" width="250" height="100">
         <p><u>Signature</u></p>
      </div>
</div>
          @endif



<script type="text/javascript">
  $(document).ready(function(){
    var x = new Date().getFullYear();
      var y = x+1;
      // console.log(x);
      if('{!! $phdorms !!}' == 'PHD')
      {
        var p = '<h4 class="center">APPLICATION FOR ADMISSION TO Ph.D. PROGRAMME ('+ x + '-' + y + ')</h4>';
        $('.heading').append(p);
      }else
      {
        var p = '<h4 class="center">APPLICATION FOR ADMISSION TO M.S. PROGRAMME ('+ x + '-' + y + ')</h4>';
        $('.heading').append(p);
      }
    });
</script>
</body>
</html>
