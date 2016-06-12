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
  <script src="{{URL::asset('assets/js/damage.js')}}"></script>
  
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
        <li><a href="/admin/home">Home</a></li>
        <li><a href="/admin/ms">M.S. Applicants</a></li>
        <li><a href="/logout">Logout</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
       <li><a href="/admin/home">Home</a></li>
        <li><a href="/admin/ms">M.S. Applicants</a></li>
        <li><a href="/logout">Logout</a></li>
      </ul>
    </div>
  </nav>
  
  <div class="container search" hidden="true">

    

      <form action="/admin/search" method="get" class="searchbox">
          <input type="hidden" name="phdorms" id="phdorms" value="phd">
          <input type="hidden" id="hidden_token" name="_token" value="{{ csrf_token() }}">
          <input id="search" dept="{!! $data['session'] !!}" phdorms="phd" type="search" placeholder="Enter Registration No. or Name of applicant to Search." name="search" class="searchbox-input" required>
      </form>
      
  </div>
  <div class="search-pad">
  <div class="box">
       <i class="material-icons">search</i><a class="box-a"> Click here to Search Applicants</a>
   </div>
  
</div>
<div class="hide space-large  " hidden="true"></div>
    <h5 class="center heading" data-reg="{!! $data['dept'] !!}">{!! $data['dept'] !!}</h5><br>
    @if($data['session_all'] == 'all')
    <div class="col l6 center">
    <a href="#" class="exportselphd waves-effect waves-light btn" data-reg="{!! $data['session'] !!}">Export Selected Candidates</a>
    </div>
    @endif
  <div class="space-small"></div>
  <div class="container main">

    <div class="candidates row">
     @for($i = 0; $i < sizeof($data['candidates']); $i++)
        <div class="{!! $data['candidates'][$i]->dashed_reg_number !!} col l5 offset-l1" data-reg = "{!! $data['candidates'][$i]->registrationNumber !!}">
        @if($data['candidates'][$i]->accepted)
        <div class="card center border">
        @elseif($data['candidates'][$i]->deleted)
        <div class="card center border-del">
        @else
        <div class="card center no-border">
        @endif
          <div class="card-content">
            <span class="card-title activator grey-text text-darken-4" style="font-size:18px;color:rgb(56, 132, 119);" >{!! $data['candidates'][$i]->name !!}</span>
            <div class="row">
              
                <p>Registration Number:  {!! $data['candidates'][$i]->registrationNumber !!}</p>
                <p>Email-Id:  {!! $data['candidates'][$i]->email !!}</p>
              
            </div>
               <div class="center">
                @if($data['candidates'][$i]->applicationCategory == 'onCampus')
                <?php { 
                    if(file_exists('./uploads/PHD/'.$data['candidates'][$i]->dashed_reg_number.'/form3.pdf')) { $extension3 = 'pdf'; }
                    else if(file_exists('./uploads/PHD/'.$data['candidates'][$i]->dashed_reg_number.'/form3.PDF')) { $extension3 = 'PDF'; }
                    else { $extension3 = null; }
                 }
                 ?>
                <div class="col l12">
                <a href="{{ URL::asset('uploads/PHD/'.$data['candidates'][$i]->dashed_reg_number.'/form3.'.$extension3) }}" target="_blank" class="btn waves-effect waves-green btn">Form 3</a>
                </div>
                <div class="space-medium"></div>
                @endif
                @if($data['candidates'][$i]->applicationCategory == 'External')
                <?php { 
                    if(file_exists('./uploads/PHD/'.$data['candidates'][$i]->dashed_reg_number.'/form1.pdf')) { $extension1 = 'pdf'; }
                    else if(file_exists('./uploads/PHD/'.$data['candidates'][$i]->dashed_reg_number.'/form1.PDF')) { $extension1 = 'PDF'; }
                    else { $extension1 = null; }

                    if(file_exists('./uploads/PHD/'.$data['candidates'][$i]->dashed_reg_number.'/form2.pdf')) { $extension2 = 'pdf'; }
                    else if(file_exists('./uploads/PHD/'.$data['candidates'][$i]->dashed_reg_number.'/form2.PDF')) { $extension2 = 'PDF'; }
                    else { $extension2 = null; }
                 }
                 ?>
                <div class="col l6">
                <a href="{{ URL::asset('uploads/PHD/'.$data['candidates'][$i]->dashed_reg_number.'/form1.'.$extension1) }}" target="_blank" class="btn waves-effect waves-green btn">Form 1</a>
                </div>
                <div class="col l6">
                <a href="{{ URL::asset('uploads/PHD/'.$data['candidates'][$i]->dashed_reg_number.'/form2.'.$extension2) }}" target="_blank" class="btn waves-effect waves-green btn">Form 2</a>
                </div>
                <div class="space-medium"></div>
                @endif
                @if($data['session_all'] != 'all')
                <input type="checkbox" id="{!! $data['candidates'][$i]->registrationNumber!!}" name="{!! $data['candidates'][$i]->registrationNumber!!}" data-reg={!! $data['candidates'][$i]->registrationNumber!!} categ='PHD' class="verify" {!! strpos($data['candidates'][$i]->selected_depts, $data['session']) !== false ? 'checked' : '' !!} />
                <label for="{!! $data['candidates'][$i]->registrationNumber!!}">Selected</label>
                @endif
        @if($data['session_all'] == 'all')
        <input type="checkbox" id="paid_{!! $i !!}" data-reg={!! $data['candidates'][$i]->registrationNumber!!} class="paid" name="paid_{!! $i !!}" {!! $data["candidates"][$i]->paidornot ? 'checked' : '' !!} />
        <label for="paid_{!! $i !!}">Paid</label>
        <div class="space-small"></div>
       <!-- <div class="col l12 center buttons">
        <div class="col l6">
          <a href="#!" data-reg={!! $data['candidates'][$i]->registrationNumber!!} class="discard btn modal-action modal-close waves-effect waves-green btn">Discard</a>
          </div>
        @if(!$data['candidates'][$i]->accepted)
        <div class="col l6">
        <a href="#!"  data-reg={!! $data['candidates'][$i]->registrationNumber!!} class="accept btn modal-action modal-close waves-effect waves-green btn">Accept</a>
        </div> 
        @endif
        </div> -->
        @elseif($data["candidates"][$i]->paidornot)
        <div class="space-small"></div>
        <p style="color:green;">Paid</p>
        @endif
        <div class="space-small"></div>
        <div class="col l12 center buttons">
        <div class="col l6">
        <a href="#!" data-reg={!! $data['candidates'][$i]->registrationNumber!!} class="print btn modal-action modal-close waves-effect waves-green btn" >View</a>
        </div>
        <div class="col l6">
        <a href="#!" data-reg={!! $data['candidates'][$i]->registrationNumber!!} class="admit btn modal-action modal-close waves-effect waves-green btn">Admit</a>
        </div>
        <div class="col l12">
        <div class="space-vsmall"></div>
        <a href="#!" data-reg={!! $data['candidates'][$i]->registrationNumber!!} class="phdExcel btn modal-action modal-close waves-effect waves-green btn">Generate Excel</a>
        @if($data['session_all'] == 'all' && $data['candidates'][$i]->flag)
        <div class="space-vsmall"></div>
        <a href="#!" data-reg={!! $data['candidates'][$i]->registrationNumber!!} class="button1 btn modal-action modal-close waves-effect waves-green btn">Reset User</a>
        @elseif(!$data['candidates'][$i]->flag)
        <p style="color:red;">Reset approved</p>
        @endif
        @if($data['candidates'][$i]->re_submitted)
        <p style="color:green;">Re-submitted</p>
        @endif
        </div>
        </div>
        <div class="space-large"></div>
        </div>
          <div class="space-vsmall"></div>
          <p>Created at:{!! $data['candidates'][$i]->created_at !!}</p>
          <?php
            if (strpos($data['candidates'][$i]->selected_depts, $data['session']) !== false) {
           ?>
          <p style="color:teal;">selected</p>
          <?php
            }
          ?>
          </div>
          </div>      
        
    </div>
          @endfor

           </div>
           <div class="center">
      <ul class="pagination">
    <li><a href={!! $data["candidates"]->appends(Request::except('page'))->previousPageUrl()!!}><i class="material-icons">chevron_left</i></a></li>
    <li class="active teal" ><a href="#!">{!! $data["candidates"]->appends(Request::except('page'))->currentPage() !!}</a></li>
    <li class="waves-effect"><a href={!! $data["candidates"]->appends(Request::except('page'))->nextPageUrl()!!}><i class="material-icons">chevron_right</i></a></li>
  </ul>
  </div>

   <div class="space-medium"></div>
<div class="center">
   <a class="waves-effect waves-light btn" href="../ms">View M.S. applicants</a>
   <a href="#" class="exportphd waves-effect waves-light btn" data-reg="{!! $data['session'] !!}">Export All Candidates</a>
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

        function department(t)
        {
          if(t == 'AR')
          {
              return 'Architecture';
          }
          if(t == 'CS')
          {
              return 'Computer Science and Engineering';
          }
          if(t == 'CL')
          {
              return 'Chemical Engineering';
          }
          if(t == 'CV')
          {
              return 'Civil Engineering';
          }
          if(t == 'CY')
          {
              return 'Chemistry';
          }
          if(t == 'CA')
          {
              return 'Computer Applications';
          }
          if(t == 'CC')
          {
              return 'CECASE';
          }
          if(t == 'EN')
          {
              return 'Energy and Environment';
          }
          if(t == 'EE')
          {
              return 'Electrical and Electronics Engineering';
          }
          if(t == 'EC')
          {
              return 'Electronics and Communication Engineering';
          }
          if(t == 'ME')
          {
              return 'Mechanical Engineering';
          }
          if(t == 'PR')
          {
              return 'Production Engineering';
          }
          if(t == 'MME')
          {
              return 'Metallurgical and Materials Engineering';
          }
          if(t == 'MA')
          {
              return 'Mathematics';
          }
          if(t == 'HM')
          {
              return 'Humanities and Social Sciences';
          }
          if(t == 'IC')
          {
              return 'Instrumentation and Control Engineering';
          }
          if(t == 'PH')
          {
              return 'Physics';
          }
        }
  });
  </script>

</body>
</html>