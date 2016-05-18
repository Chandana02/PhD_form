<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admissions NITT | Admit Card</title>
  <link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/materialize.min.css')}}">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <script src="{{URL::asset('assets/js/jquery-2.1.1.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/materialize.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/print.js')}}"></script>
</head>
<body>

  <div class="container-fluid">
  <div class="row">
    
      <img src="{{ URL::asset('assets/images/admit.png')}}">
    
    
  </div>
</div>
 

  <div class="container main">
  <h5 class="center"><u>ADMIT CARD</u></h5>
  <div class="space-medium"></div>
  <hr><hr>
    <div class="row admit">
      <div class="col l8">
        <div class="space-large"></div>
        <p><b>Name of the Candidate: </b>  {!! $name !!} </p>
        <p><b>Signature of Candidate:</b> </p>
        <div class="space-large"></div>
      </div>
      <div class="col l4">
        <img src={{URL::asset('uploads/'.$image)}}>

      </div>
    </div>
      <hr><hr>
      <div class="space-small"></div>
      <p class="center head"><u>FOR OFFICE USE ONLY</u></p>
    <div class="row admit">
      <div class="col l12">

        <p><b>Registration Number: </b> {!! $regNo !!} </p>
        <p><b>Department:</b>  {!! $dept !!}</p>
        <p><b>Venue:</b>   </p>
        <p><b>Examination Date:</b>  </p>
        <p><b>Examination Time:</b>  </p>
        <div class="space-medium"></div>
        <span class="left"><b>HoD/Admission Co-ordinator</b></span>
        <span class="right"><b>Seal</b></span>
        <div class="space-large"></div>
      </div>
    </div>
      <hr><hr>
      <div class="space-medium"></div>
        <h5 class="center"><u>Address Slip</u></h5>
        <div class="space-medium"></div>
        <hr><hr>
      <div class="row admit">
        <!-- <div class="col l12">
          <p><b>To</b></p>
          <p>Mr/Mrs</p>
          <p>Address: .............................................................................................................<br>..............................................................................................................................<br>..............................................................................................................................<br></p>
          <p>PIN: .....................................................................................................................<br></p>
        </div>
        <hr>
        
        <hr>

      </div> -->
      <div class="col l12">
        <p><b>To</b></p>
        <p>Mr/Mrs</p>
        <p>{!! $address !!}</p>
        <hr>        
        <hr>        
      </div>
      <div class="col l12">
        <p><b>To</b></p>
        <p>Mr/Mrs</p>
        <p>{!! $address !!}</p>
        <hr>        
        <hr>        
      </div>
      <div class="col l12">
        <p><b>To</b></p>
        <p>Mr/Mrs</p>
        <p>{!! $address !!}</p>
        <hr>        
        <hr>        
      </div>
      <div class="col l12">
        <p><b>To</b></p>
        <p>Mr/Mrs</p>
        <p>{!! $address !!}</p>
        <hr>        
        <hr>        
      </div>

  </div>
  <div class="space-large"></div>
       <a href="#!" class="admit btn  waves-effect waves-green btn-flat" onclick="$(this).hide;window.print()">Admit</a>     

  <script type="text/javascript">
      $(document).ready(function(){
        $(".button-collapse").sideNav();
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
  </script>

</body>
</html>

