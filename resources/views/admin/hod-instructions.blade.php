  @extends('layouts.admin')
  @section('title', 'M.S. Ph.D. Admissions - 2016, NIT-Trichy |Instructions')
  @section('navbar')
  <ul class="hide-on-sm-and-down">

    <li><a href="/admin/home">Home</a></li>
    <li><a href="/contact">Contact</a></li>
    <li><a href="/logout">Logout</a></li>
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
        <h5 class="center"><b>Step by Step instructions for HOD/Admission Coordinator to use Portal</b></h5>


        <h6 class="center"> Before login <h6>
        <ul class="pad">
        
          <li><b>Step 1:</b> Click here to <a href="/adminlogin">login</a> into admin panel.</li>
          <li><b>Step 2:</b> Use <b>Username</b> & <b>Password</b> issued by Dean Academic and click on <b>Submit</b> button to login. </li>
          </ul>
        <h6 class="center"> After login <h6>
        <ul class="pad">
        
          <li><b>Step 3:</b> Click on <b>M.S. APPLICANTS</b> button to view MS applications for your department.</li>
          <li><b>Step 4:</b> Click on <b>PH.D. APPLICANTS</b> button to view PH.D applications for your department.</li>
        </ul>
        


        <h6 class="center"><b>Upload Signature</b></h6>
        <ul class="pad">
          <li><b>Step 5:</b>Click on <b>UPLOAD SIGNATURE</b> button to upload your signature.<br> 
          	  Signature should be uploaded only in PNG/JPG/JPEG format.The dimension of signature should be less that 200px wide and 150px high.<br>
          	  (less than or equal to 200x150 px).

          </li>

        </ul>

       <h6 class="center"><b>Select/Reject Application</b></h6>
        <ul class="pad">
          <li><b>Step 6:</b> To read candidates application form, click on <b>View</b> button.</li>
          <li><b>Step 7:</b> If applicant's form is eligible for further rounds and if applicant has paid the application fee, kindly click on <b>Selected</b> cicle.</li>
          <li><b>Step 8:</b> If you want to reject any application click on <b>Not Selected</b> cicle. Clicking on <b>Not Selected</b> circle will pop a alert box asking you to reason for rejecting the application. Kindly mention the reason for rejection(e.g, Fees not paid, Form not submitted, False information etc). Click <b>Cancel</b> if you want to mention any reason.</li>
          
          
        </ul>
           <h6 class="center"><b>Generate Excel</b></h6>
        <ul class="pad">
          <li><b>Step 9:</b>Click on <b>GENERATE EXCEL</b> button to download individual application in excel format.</li>
          <li><b>Step 10:</b>Click on <b>EXPORT ALL CANDIDATES</b> button to download all applications of your department in excel format.</li>

        </ul>

        <h6 class="center"><b>Logut & Change Password</b></h6>
        <ul class="pad">
          <li><b>Step 11:</b> Click on <b>Logout</b> to logout.</li>
          <li><b>Step 12:</b> You can change your password for department on the login screen. Or Click <a href="/change"> here </a> to change your password.</li>
          
        </ul>
       

        <h6 class="center"><b>Admit Card Generation</b></h6>
        <ul class="pad">
          <li>Signature of HOD/Admission Coordinator will automatically get deployed to all the selected candidate's admit card.
           Selected candidates will be able to download their admit cards from the portal</li>
        
        </ul>

        <h6 class="center"><b>Help Desk</b></h6>
        <ul class="pad">
          <li> Write to delta@nitt.edu for technical queries.</li>
          <li> Write to phdsection@nitt.edu for other queries.</li>
          <li> Call on +91-431-2503011 for any query.</li>
        
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
