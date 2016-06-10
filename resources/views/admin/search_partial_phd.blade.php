
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
            <span class="card-title activator grey-text text-darken-4" style="font-size:18px;color:rgb(56, 132, 119)" >{!! $data['candidates'][$i]->name !!}</span>
            <div class="row">
              
                <p>Registration Number:  {!! $data['candidates'][$i]->registrationNumber !!}</p>
                <p>Email-Id:  {!! $data['candidates'][$i]->email !!}</p>
              
            </div>
               <div class="center">
                @if($data['candidates'][$i]->applicationCategory == 'onCampus')
                <div class="col l12">
                <a href="{{ URL::asset('uploads/PHD/'.$data['candidates'][$i]->dashed_reg_number.'/form3.pdf') }}" target="_blank" class="btn waves-effect waves-green btn">Form 3</a>
                </div>
                <div class="space-medium"></div>
                @endif
                @if($data['candidates'][$i]->applicationCategory == 'External')
                <div class="col l6">
                <a href="{{ URL::asset('uploads/PHD/'.$data['candidates'][$i]->dashed_reg_number.'/form1.pdf') }}" target="_blank" class="btn waves-effect waves-green btn">Form 1</a>
                </div>
                <div class="col l6">
                <a href="{{ URL::asset('uploads/PHD/'.$data['candidates'][$i]->dashed_reg_number.'/form2.pdf') }}" target="_blank" class="btn waves-effect waves-green btn">Form 2</a>
                </div>
                <div class="space-medium"></div>
                @endif
                @if($data['session_all'] != 'all')
                <a href="#!" data-reg={!! $data['candidates'][$i]->registrationNumber!!} categ='PHD' class="verify btn modal-action modal-close waves-effect waves-green btn">
                <?php
                  if (strpos($data['candidates'][$i]->selected_depts, $data['session']) !== false) {
                 ?>
                Deselect
                <?php
                  }
                  else {
                ?>
                Select
                <?php
                  }
                ?>
                </a>
                @endif
        @if($data['session_all'] == 'all')
        <input type="checkbox" id="paid_{!! $i !!}" data-reg={!! $data['candidates'][$i]->registrationNumber!!} class="paid" name="paid_{!! $i !!}" {!! $data["candidates"][$i]->paidornot ? 'checked' : '' !!} />
        <label for="paid_{!! $i !!}">Paid</label>
        <div class="space-small"></div>
        <div class="col l12 center buttons">
      <!--  <div class="col l6">
          <a href="#!" data-reg={!! $data['candidates'][$i]->registrationNumber!!} class="discard btn modal-action modal-close waves-effect waves-green btn">Discard</a>
          </div>
        @if(!$data['candidates'][$i]->accepted)
        <div class="col l6">
        <a href="#!"  data-reg={!! $data['candidates'][$i]->registrationNumber!!} class="accept btn modal-action modal-close waves-effect waves-green btn">Accept</a>
        </div> -->
        @endif
        </div>
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
    <li><a href={!! $data["candidates"]->appends(Request::except(array('page','ajax')))->previousPageUrl()!!}><i class="material-icons">chevron_left</i></a></li>
    <li class="active teal" ><a href="#!">{!! $data["candidates"]->appends(Request::except(array('page','ajax')))->currentPage() !!}</a></li>
    <li class="waves-effect"><a href={!! $data["candidates"]->appends(Request::except(array('page','ajax')))->nextPageUrl()!!}><i class="material-icons">chevron_right</i></a></li>
  </ul>
  </div>

   <div class="space-medium"></div>
<div class="center">
   <a class="waves-effect waves-light btn" href="../ms">View M.S. applicants</a>
   <a href="#" class="exportphd waves-effect waves-light btn" data-reg="{!! $data['session'] !!}">Export All Candidates</a>
  </div>
  <script src="{{URL::asset('assets/js/print.js')}}"></script>
  <script src="{{URL::asset('assets/js/damage.js')}}"></script>
  <script src="{{URL::asset('assets/js/admin.js')}}"></script>

