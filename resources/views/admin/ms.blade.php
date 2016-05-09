<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta id="token" name="csrf-token" content="{{ csrf_token() }}">
  <title>Admissions NITT | Admin Page</title>
  <link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/materialize.min.css')}}">
  <!-- <link rel="shortcut icon" href="{{URL::asset('assets/logo.jpg')}}"> -->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="{{URL::asset('assets/js/jquery-2.1.1.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/admin.js')}}"></script>
  <script src="{{URL::asset('assets/js/materialize.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/print.js')}}"></script>
  
</head>
<body>

  <header style="height: 25vh;
  padding: 0px;
  margin: 0px;
  background-image: url('{{URL::asset('assets/images/header.png')}}');
  background-repeat: no-repeat;
  background-position: center;
  background-color: #004d40;
  background-size: contain;"></header>

  
  <nav>
    <div class="nav-wrapper ">
      
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="hide-on-med-and-down">
        <li><a href="home">Home</a></li>
        <li><a href="phd">PhD Applicants</a></li>
        <li><a href="/logout">Logout</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
       <li><a href="home">Home</a></li>
        <li><a href="phd">PhD Applicants</a></li>
        <li><a href="/logout">Logout</a></li>
      </ul>
    </div>
  </nav>
<div class="container search" hidden="true">

      <form class="searchbox">
          <input id="search" type="search" placeholder="Search.." name="search" class="searchbox-input" required>
          


      </form>
      
  </div>
  <div class="search-pad">
  <div class="box">
       <i class="material-icons">search</i><a class="box-a"> Search </a>
   </div>
  
</div>
<div class="hide space-large  " hidden="true"></div>
  <div class="space-large"></div>
  <div class="container main">
    <div class="row candidates">
    @for($i = 0; $i < sizeof($data['candidates']); $i++)
        
        @if(!$data['candidates'][$i]->deleted)
     <div class="{!! $data['candidates'][$i]->registrationNumber !!} col l5 offset-l1 s5 offset-s1" } data-reg = "{!! $data['candidates'][$i]->registrationNumber !!}">
        @if($data['candidates'][$i]->accepted)
        <div class="card center border">
        @else
        <div class="card center">
        @endif
          <div class=" waves-effect waves-block waves-light">  
          </div>
          <div class="card-content">

            <span class="card-title activator grey-text text-darken-4">Candidate's Card</span>
            <div class="row">
              <div class="col l12 s12">
                <p>Registration Number:{!! $data['candidates'][$i]->registrationNumber !!}</p>
              </div>
              <div class="col l12 s12">
                <!-- <p>Date of Submission:</p> -->
              </div>
            </div>
           
            <div class="space-small center">
            </div>
            <div class="center">
              <a class="waves-effect waves-light btn modal-trigger" href="#modal{!! $i !!}">Click Here To view full form</a>
            </div>
           <!--  {!! Form::open(array('action'=>array('AdminController@deleted' , ))) !!}

            {!! Form::submit('Reject Application', array('class'=>'teal darken-1 send-btn btn waves-effect waves-light' )) !!}
            {!! Form::close() !!} -->
          </div>
          
          </div>

          <div id="modal{!! $i !!}" class="modal l8">
          <div class="modal-content">
          <div class="container">
          <h4>Candidate's Form</h4>
          <div class="row">
            <div class="col l6">
              <p><b>Registration Number:</b> {!! $data['candidates'][$i]->registrationNumber !!}</p>
            </div>
            <div class="col l6">
              <p><b>Date of Registration:</b> {!! $data['candidates'][$i]->dateOfReg !!}
          </p>
            </div>
          </div>
          
          <div class="row">
            <h5>Application Details:</h5>
            <div class="col l6">
              <p><b>Application Category:</b> {!! $data['candidates'][$i]->applicationCategory !!}</p>
            </div>
            <div class="col l6">
              <p><b>Department:</b> {!! $data['candidates'][$i]->dept !!}</p>
            </div>
          </div>
          <div class="row">
            <h5>Personal Details:</h5>
            <div class="col l6">
              <p><b>Email Id:</b> {!! $data['candidates'][$i]->email !!}</p>
              <p><b>Name of Candidate:</b> {!! $data['candidates'][$i]->name !!}</p>
              <p><b>Father's Name:</b> {!! $data['candidates'][$i]->fatherName !!}</p>
              <p><b>Category:</b> {!! $data['candidates'][$i]->category !!}</p>
              <p><b>Marital Status: </b>{!! $data['candidates'][$i]->maritalStatus !!}</p>
              <p><b>Nationality:</b> {!! $data['candidates'][$i]->nationality !!}</p>
              <p><b>Permanent Address:</b> {!! $data['candidates'][$i]->permanentaddr !!}</p>
              <p><b>Landline Number:</b> {!! $data['candidates'][$i]->landline !!}</p>
            </div>
            <div class="col l6">
              <p><b>Area of Research:</b> {!! $data['candidates'][$i]->areaOfResearch !!}</p>              
              <p><b>Email Id:</b> {!! $data['candidates'][$i]->email !!}</p>              
              <p><b>Date of Birth:</b> {!! $data['candidates'][$i]->dob !!}</p>              
              <p><b>Sex :</b> {!! $data['candidates'][$i]->sex !!}</p>              
              <p><b>Physically Handicapped:</b> {!! $data['candidates'][$i]->PH !!}</p><!-- wtf -->              
              <p><b>Address for Communication:</b> {!! $data['candidates'][$i]->addrforcomm !!}</p>              
              <p><b>Mobile Number:</b> {!! $data['candidates'][$i]->mobile !!}</p>
            </div>
          </div>
          <div class="row">
              <h5>Undergraduate Details:</h5>
            <div class="col l6">
              <p><b>Undergraduate Degree:</b> {!! $data['ug'][$i]->degreeName !!}</p>
              <p><b>Undergraduate G.P.A:</b> {!! $data['ug'][$i]->gpa !!}</p>
              <p><b>Undergraduate Name of Institution:</b> {!! $data['ug'][$i]->institutionName !!}</p>
              <p><b>Undergraduate Year of Passing:</b> {!! $data['ug'][$i]->yop !!}</p>
            </div>
            <div class="col l6">
              
          <p><b>Undergraduate Branch:</b> {!! $data['ug'][$i]->branch !!}</p>
          
          <p><b>Undergraduate Class:</b> {!! $data['ug'][$i]->class !!}</p>
          
          <p><b>Undergraduate Name of University:</b> {!! $data['ug'][$i]->universityName !!}</p>
          
            </div>
          </div>

          <div class="row">
            <h5>Scores:</h5>
            <p><b>Semester 1:</b></p>
            <p><span class="half"><b>G.P.A obtained:</b>{!! $data['scores'][$i]->gpa1 !!}</span class="half"><b>Out of:</b>{!! $data['scores'][$i]->gpamax1 !!}<span></span></p>
            <p><b>Semester 2:</b></p>
            <p><span class="half"><b>G.P.A obtained:</b>{!! $data['scores'][$i]->gpa2 !!}</span class="half"><b>Out of:</b>{!! $data['scores'][$i]->gpamax2 !!}<span></span></p>
            <p><b>Semester 3:</b></p>
            <p><span class="half"><b>G.P.A obtained:</b>{!! $data['scores'][$i]->gpa3 !!}</span class="half"><b>Out of:</b>{!! $data['scores'][$i]->gpamax3 !!}<span></span></p>
            <p><b>Semester 4:</b></p>
            <p><span class="half"><b>G.P.A obtained:</b>{!! $data['scores'][$i]->gpa4 !!}</span class="half"><b>Out of:</b>{!! $data['scores'][$i]->gpamax4 !!}<span></span></p>
            <p><b>Semester 5:</b></p>
            <p><span class="half"><b>G.P.A obtained:</b>{!! $data['scores'][$i]->gpa5 !!}</span class="half"><b>Out of:</b>{!! $data['scores'][$i]->gpamax5 !!}<span></span></p>
            <p><b>Semester 6:</b></p>
            <p><span class="half"><b>G.P.A obtained:</b>{!! $data['scores'][$i]->gpa6 !!}</span class="half"><b>Out of:</b>{!! $data['scores'][$i]->gpamax6 !!}<span></span></p>
            <p><b>Semester 7:</b></p>
            <p><span class="half"><b>G.P.A obtained:</b>{!! $data['scores'][$i]->gpa7 !!}</span class="half"><b>Out of:</b>{!! $data['scores'][$i]->gpamax7 !!}<span></span></p>
            <p><b>Semester 8:</b></p>
            <p><span class="half"><b>G.P.A obtained:</b>{!! $data['scores'][$i]->gpa8 !!}</span class="half"><b>Out of:</b>{!! $data['scores'][$i]->gpamax8 !!}<span></span></p>

          </div>                                        
          <div class="row">
            <h5>Employer Details:</h5>
            <div class="col l12">
              <p><b>Employer Details 1:</b> {!! $data['pro'][0]->proexp1 !!}</p>
              <p><b>Position at Work 1:</b>{!! $data['pro'][0]->position1 !!}</p>
              <div class="col l6">
                <p><b>From 1:</b>{!! $data['pro'][0]->from1 !!}</p>
              </div>
              <div class="col l6">
                <p><b>To 1:</b>{!! $data['pro'][0]->to1 !!}</p>
              </div>
            </div>
            <div class="col l12">
              <p><b>Employer Details 2:</b> {!! $data['pro'][0]->proexp2 !!}</p>
              <p><b>Position at Work 2:</b>{!! $data['pro'][0]->position2 !!}</p>
              <div class="col l6">
                <p><b>From 2:</b>{!! $data['pro'][0]->from2 !!}</p>
              </div>
              <div class="col l6">
                <p><b>To 2:</b>{!! $data['pro'][0]->to2 !!}</p>
              </div>
            </div>
            <div class="col l12">
              <p><b>Employer Details 3:</b> {!! $data['pro'][0]->proexp3 !!}</p>
              <p><b>Position at Work 3:</b>{!! $data['pro'][0]->position3 !!}</p>
              <div class="col l6">
                <p><b>From 3:</b>{!! $data['pro'][0]->from3 !!}</p>
              </div>
              <div class="col l6">
                <p><b>To 3:</b>{!! $data['pro'][0]->to3 !!}</p>
              </div>
            </div>
          </div>          
        </div>
      <div class="modal-footer">
        @if($data['dept'] == 'all')
        <a href="#!" data-reg={!! $data['candidates'][$i]->registrationNumber!!} class="discard btn modal-action modal-close waves-effect waves-green btn-flat">Discard</a>
        @if(!$data['candidates'][$i]->accepted)
        <a href="#!"  data-reg={!! $data['candidates'][$i]->registrationNumber!!} class="accept btn modal-action modal-close waves-effect waves-green btn-flat">Accept</a>
        @endif
        @endif
        <a href="#!" data-reg={!! $data['candidates'][$i]->registrationNumber!!} class="print btn modal-action modal-close waves-effect waves-green btn-flat">Print</a>
        <a href="#!" data-reg={!! $data['candidates'][$i]->registrationNumber!!} class="admit btn modal-action modal-close waves-effect waves-green btn-flat">Admit</a>
      </div>
      </div>
        </div>
        
      @endif
      @endfor
    </div>
  <div class="row">
    <div class="center">
      <ul class="pagination">
    <li class="disabled"><a href={!! $data["candidates"]->previousPageUrl()!!}><i class="material-icons">chevron_left</i></a></li>
    <li class="active teal" ><a href="#!">{!! $data["candidates"]->currentPage() !!}</a></li>
    <li class="waves-effect"><a href={!! $data["candidates"]->nextPageUrl()!!}><i class="material-icons">chevron_right</i></a></li>
  </ul>
  </div>
</div>
   <div class="space-medium"></div>
<div class="center">
   <a class="waves-effect waves-light btn" href="phd">View PhD applicants</a>
  </div>
   </div>
 </div>
 </div>
</div>
<div class="space-large"></div>

<footer class="page-footer teal darken-4">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Contact Us</h5>
                <p class="grey-text text-lighten-4">National Institute of Technology</p>
                <p class="grey-text text-lighten-4">Tiruchirappalli - 620015</p>
                <p class="grey-text text-lighten-4">Tamil Nadu, INDIA</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">QuickLinks</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="http://www.nitt.edu/">Institute Website</a></li>
                  <li><a class="grey-text text-lighten-3" href="http://www.nitt.edu/home/academics/departments/">Departments</a></li>
                  <li><a class="grey-text text-lighten-3" href="http://www.nitt.edu/home/admissions/">Admissions</a></li>
                  <li><a class="grey-text text-lighten-3" href="http://www.nitt.edu/contact">Contact Us</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright dark">
            <div class="container center">
            
            <a class="grey-text text-lighten-4" href="#!">Made with &hearts; by Delta Force</a>
            </div>
          </div>
        </footer>
            

  <script type="text/javascript">
  $(document ).ready(function(){
    $(".button-collapse").sideNav();
  })
  </script>    

  <script type="text/javascript">
      $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
     var a = $('.box');
        var inputBox = $('.searchbox-input');
        var isOpen = false;

        a.click(function(){
          $('.box').hide();
          $('.search').show();
          if(isOpen == false){
          $('.searchbox').addClass('searchbox-open');
          inputBox.focus();
          isOpen = true;
        }
        else{
          $('.box').show('slow');
          $('.search').css('display','none');
          $('.hide').show();
          $('.search-pad').append('<div class="space-large"></div>');
         $('.searchbox').removeClass('searchbox-open');
          inputBox.focusout();
          isOpen = false; 
        }
        });
  });
  </script>

</body>
</html>