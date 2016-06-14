  @extends('layouts.admin')
  @section('title', 'M.S. Ph.D. Admissions - 2016, NIT-Trichy |Instructions')
  @section('navbar')
  <ul class="hide-on-sm-and-down">

    <li><a href="/admin/home">Home</a></li>
    <li><a href="/contact">Contact</a></li>
    <li><a href="/logout">Contact</a></li>
  </ul>
  <ul class="side-nav" id="mobile-demo">
   <li><a href="/admin/home">Home</a></li>
    <li><a href="/admin/home">Ph.D./M.S. Admissions</a></li>

    <li><a href="/contact">Contact</a></li>
  </ul>
  @endsection
  @section('body')
  <div class="container main">
    <div class="row">

     <!--<marquee> <p class="imp" style="color:black"><b><img src="{{URL::asset('assets/images/newgood.gif')}}">For any notices & updates we request you to keep visiting this site. </b></p></marquee> -->
<!--       <marquee> <p class="imp" style="color:black"><b><img src="{{URL::asset('assets/images/newgood.gif')}}"> Applicants who want to modify/edit their application form, kindly wait for the notice on this. Keep visiting the site. </b></p></marquee>-->

      <div class="space-medium"></div>
      <div class="content">
        <h5 class="center"><b>Instructions for HOD/Admission Coordinator to Login</b></h5>
        <ul class="pad">
          <li>1) Click here to <a href="/adminlogin">login</a> into admin panel.</li>
          <li>2) Use <b>Username</b> & <b>Password</b> issued by Dean Academic to login. </li>
        </ul>
        
        <h5 class="center"><b>Upload Signature</b></h5>
        <ul class="pad">
          <li>Dear Admission Co-ordinator,<br>
          	  We request you to upload your signature in PNG/JPG/JPEG format.<br>
          	  The dimension of signature should be less that 200px wide and 150px high.<br>
          	  (less than or equal to 200x150 px) <br>

          </li>

        </ul>

       <h5 class="center"><b>Select/Reject Application</b></h5>
        <ul class="pad">
          <li><b>Step 1:</b> To read candidates application form, click on <b>View</b> button.</li>
          <li><b>Step 2:</b> If applicant's form is eligible for further rounds and if applicant has paid the application fee,kindly click on <b>Select</b> button.</li>
          <li><b>Or Step 2:</b> If applicant's form is not eligible for further rounds and if applicant has not paid the application fee,kindly do not click on <b>Select</b> button.</li>
          
        </ul>


       

        <h5 class="center"><b>Admit Card Generation</b></h5>
        <ul class="pad">
          <li>Signature of HOD/Admission Coordinator will automatically get deployed to all the selected candidates admit card.
           Selected candidates will be able to download their admit cards.</li>
        
        </ul>

         <h5 class="center"><b>Other Instructions</b></h5>
        <ul class="pad">
          <li> Click Logout to logout.</li>
          
        </ul>

      </div>
    </div>

  </div>
            

  <script type="text/javascript">
  $(document ).ready(function(){
    $(".button-collapse").sideNav();
  });
  </script>
  @endsection
