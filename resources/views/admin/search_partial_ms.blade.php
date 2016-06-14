    <div class="row candidates">
    @for($i = 0; $i < sizeof($data['candidates']); $i++) 
     <div class="{!! $data['candidates'][$i]->registrationNumber !!} col l5 offset-l1" } data-reg = "{!! $data['candidates'][$i]->registrationNumber !!}">
       @if($data['candidates'][$i]->accepted)
        <div class="card center border">
        @elseif($data['candidates'][$i]->deleted)
        <div class="card center border-del">
        @else
        <div class="card center no-border">
        @endif
          <div class=" waves-effect waves-block waves-light">  
          </div>
          <div class="card-content">
            <span class="card-title activator grey-text text-darken-4" style="font-size:18px;color:rgb(56, 132, 119)" >{!! $data['candidates'][$i]->name !!}</span>
            <div class="row">
              <div class="col l12 s12">
                <p>Registration Number:{!! $data['candidates'][$i]->registrationNumber !!}</p>
                <p>Email-Id:  {!! $data['candidates'][$i]->email !!}</p>
              </div>
              <div class="col l12 s12">
                <!-- <p>Date of Submission:</p> -->
              </div>
            </div>           
            <div class="space-small center">
            </div>
            <?php if(file_exists('./uploads/MS/'.$data['candidates'][$i]->dashed_reg_number.'/cert.pdf')) { $extension = 'pdf'; }
                  else if(file_exists('./uploads/MS/'.$data['candidates'][$i]->dashed_reg_number.'/cert.PDF')) { $extension = 'PDF'; }
                  else { $extension = null; }
            ?>
            @if($extension != null)
                <div class="col l12 center">
                <a href="{{ URL::asset('uploads/MS/'.$data['candidates'][$i]->dashed_reg_number.'/cert.'.$extension) }}"  class="btn waves-effect waves-green btn" target="_blank">Form</a>
                </div>
                <div class="space-medium"></div>
            @endif
               <div class="center">
                @if($data['session_all'] != 'all')
                <input type="radio" id="{!! $data['candidates'][$i]->registrationNumber!!}-yes" name="{!! $data['candidates'][$i]->registrationNumber!!}" data-reg={!! $data['candidates'][$i]->registrationNumber!!} categ='MS' class="verify" {!! strpos($data['candidates'][$i]->selected_depts, $data['session']) !== false ? 'checked' : '' !!} value="yes" />
                <label for="{!! $data['candidates'][$i]->registrationNumber!!}-yes">Selected</label>

                <input type="radio" id="{!! $data['candidates'][$i]->registrationNumber!!}-no" name="{!! $data['candidates'][$i]->registrationNumber!!}" data-reg={!! $data['candidates'][$i]->registrationNumber!!} categ='MS' class="verify" {!! strpos($data['candidates'][$i]->selected_depts, $data['session']) !== false ? '' : 'checked' !!} value="no"/>
                <label for="{!! $data['candidates'][$i]->registrationNumber!!}-no">Not Selected</label>
                @endif
        @if($data['session_all'] == 'all')
        <input type="checkbox" id="paid_{!! $i !!}" data-reg={!! $data['candidates'][$i]->registrationNumber!!} class="paid" name="paid_{!! $i !!}" {!! $data["candidates"][$i]->paidornot ? 'checked' : '' !!} />
        <label for="paid_{!! $i !!}">Paid</label>
        <div class="space-small"></div>
      <!--  <div class="col s12">
          <a href="#!" data-reg={!! $data['candidates'][$i]->registrationNumber!!} hidden="true" class="discard btn  waves-effect waves-green btn">Discard</a>
        @if(!$data['candidates'][$i]->accepted)
          <a href="#!"  data-reg={!! $data['candidates'][$i]->registrationNumber!!} hidden="true" class="accept btn modal-action  waves-green btn" >Accept</a>
        @endif
        </div> -->
        @elseif($data["candidates"][$i]->paidornot)
        <div class="space-small"></div>
        <p style="color:green;">Paid</p>
        @endif
        <div class="space-small"></div>
        <div class="col l12 center buttons">
          <div class="col l6">
            <a href="#!" data-reg={!! $data['candidates'][$i]->registrationNumber!!} class="print btn  waves-effect waves-green btn" >View</a>
          </div>
          <div class="col l6">
            <a href="#!" data-reg={!! $data['candidates'][$i]->registrationNumber!!} class="admit btn  waves-effect waves-green btn">Admit</a>
          </div>
          <div class="col l12">
        <div class="space-vsmall"></div>
        <a href="#!" data-reg={!! $data['candidates'][$i]->registrationNumber!!} class="msExcel btn modal-action modal-close waves-effect waves-green btn">Generate Excel</a>
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
        </div>
          <div class="space-small"></div>
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


  <div class="row">
    <div class="center">
      <ul class="pagination">
    <li class="disabled"><a href={!! $data["candidates"]->appends(Request::except(array('page','ajax')))->previousPageUrl()!!}><i class="material-icons">chevron_left</i></a></li>
    <li class="active teal" ><a href="#!">{!! $data["candidates"]->appends(Request::except(array('page','ajax')))->currentPage() !!}</a></li>
    <li class="waves-effect"><a href={!! $data["candidates"]->appends(Request::except(array('page','ajax')))->nextPageUrl()!!}><i class="material-icons">chevron_right</i></a></li>
  </ul>
  </div>
</div>
   <div class="space-medium"></div>
<div class="center">
   <a class="waves-effect waves-light btn" href="../phd">View Ph.D applicants</a>
   <a href="#" class="exportms waves-effect waves-light btn" data-reg="{!! $data['session'] !!}">Export All Candidates</a>
  </div>