@extends('layouts.master')

@section('title', 'M.S. Registration Form')

@section('headerIncludes')
    <script src="{{URL::asset('assets/js/common.js')}}"></script>
@endsection

@section('departmentsList')
    <option value="" selected>Choose Department</option>
    <option value="CS">Computer Science and Engineering</option>
    <option value="CL">Chemical Engineering</option>
    <option value="CV">Civil Engineering </option>
    <option value="CC">CECASE</option>
    <option value="EN">Energy Engineering</option>
    <option value="EE">Electrical &amp; Electronics Engineering</option>
    <option value="EC">Electronics &amp; Communication Engineering</option>
    <option value="ME">Mechanical Engineering</option>
    <option value="PR">Production Engineering</option>
    <option value="IC">Instrumentation And Control Engineering</option>
    <option value="MME">Metalurgy and Material Sciences</option>
    <option value="PH">Physics</option>
@endsection

@section('body')
    <div class="blur">
        <div class="center preloader" hidden="true">
            <img src="{{URL::asset('assets/images/preloader.gif')}}">
        </div>
    </div>

    <div class="heading">

    </div>

    <div class="container main">
        <div class="row text-center">
            <div class="space-medium"></div>
            <div class="divider"></div><div class="divider"></div>
        </div>
        <div class="space-medium"></div>            
        <input type="text" hidden value="ms" class="checker" />
        <p class="vlarge">Applicant Details</p>
        <div class="col s12">
            <div class="row dept">
                <div class="input-field col l6 s6 ">
                    <select name="department1"  id="department1">
                        @yield('departmentsList')
                    </select>
                    <label>Department 1</label>
                </div>
                <div class="input-field col l6 s6 ">
                    <select name="department2" required id="department2">
                        @yield('departmentsList')
                    </select>
                    <label>Department 2</label>
                </div>
                <div class="input-field col l6 s6 ">
                    <select name="department3" required id="department3">
                        @yield('departmentsList')
                    </select>
                    <label>Department 3</label>
                </div>
                <div class="input-field col s6 l6">
                    <input id="email" name="email" type="email" class="validate" required>
                    <label for="last_name">*Email:</label>
                </div>

                <div class="input-field col l12 s12">
                    <span class="light">*Area of Research:</span>
                    <input required placeholder="Area of Research" id="area_of_research" type="text" class="validate" name="area_of_research" maxlength="50">
                </div>
            </div>      

            <div class="row">
                <div class="input-field col l6 s6">
                    <span class="light">*Name:</span>
                    <input required placeholder="Name of Candidate" id="name" type="text" class="validate" name="name" maxlength="32">
                </div>
                <div class="input-field col l6  s6">
                    <span class="light">*Father's Name/Guardian's Name/Husband's Name:</span>
                    <input required placeholder="Father's/Guardian Name" id="father_name" type="text" class="validate" name="father_name" maxlength="32">
                </div>
            </div>

            <div class="row">
                <div class="input-field col l4">
                    <span class="light">*Date of Birth:</span>
                    <input required id="dob" type="date" class="validate" name="dob" max="2016-06-31" min="1990-06-31" >
                </div>

                <div class="input-field col l2">
                    <span class="light">*Age:</span>
                    <input placeholder="Enter Age" required id="age" type="number" class="validate" name="age" max="50" min="12" >
                </div>

                <div class="input-field col l6 ">
                    <span class="light">*Category:</span><br>
                    <select required name="category" id="category">
                        <option value="" disabled selected>Choose your Category</option>
                        <option value="OBC">OBC</option>
                        <option value="OC">OC</option>
                        <option value="SC">SC</option>
                        <option value="ST">ST</option>
                    </select>
                </div>
            </div> 

            <div class="row">
                <div class="input-field col l6">
                    <span class="light">*Sex:</span><br>
                    <select required name="sex" id="sex">
                        <option value="" disabled selected>Choose your Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>

                </div>

                <div class="input-field col l6 ">
                    <span class="light">*Marital Status:</span><br>
                    <select required name="marital_status" id="marital_status">
                        <option value="" disabled selected>Choose your Marital Status</option>
                        <option value="Married">Married</option>
                        <option value="single">Single</option>
                    </select>
                </div>
            </div> 

            <div class="row">
                <div class="input-field col l6">
                    <span class="light">*Person with Disability(PwD):</span><br>
                    <select required name="ph" id="ph">
                        <option value="" disabled selected>Choose your option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <div class="input-field col l6 ">

                    <span class="light">*Nationality:</span>
                    <input required placeholder="Nationality" id="nationality" type="text" class="validate" name="nationality" maxlength="32">
                </div>
            </div>           

            <div class="row">
                <div class="input-field col l6"> 
                    <span for="textarea1">*Address for Communication:</span><br>              
                    <textarea required id="addr_for_commn" class="materialize-textarea" name="addr_for_commn" maxlength="200"></textarea>
                    <span>*Mobile Number:</span>
                    <input required type="number" min="7000000000" max="9999999999" class="validate" name="mobile" id="mobile"></input>
                </div>
                <div class="input-field col l6 ">
                    <span for="textarea1">*Permanent Address:</span><br>
                    <textarea required id="permanent_addr" class="materialize-textarea" name="permanent_addr" maxlength="200"></textarea>
                    <span>Land-Line Number:</span>
                    <input id="landline" type="text" class="validate" name="landline" >
                </div>
            </div>
        </div>
        <p>(*) indicates that it's a required field.</p> 
    </div>

    <div class="center">
        <a class="valid teal darken-1 send-btn btn waves-effect waves-light">Submit</a>
    </div>

    <div class="modal center" id="error">
        <div class="modal-content">
            <div class="error"></div>
        </div>
        <div class="modal-footer">
            <a class="btn modal-action modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
    </div>

    <div id="regNo" class="modal center">   
        <div class="modal-content">
            <div class="regno"></div>

        </div>
        <div class="modal-footer">

        </div>
    </div>

@endsection

@section('script')
<script type="text/javascript">
    function safeMaterialSelect($el, update) {
        //alert($el.find('option').length);
        if(update)
            $el.material_select('update');
        else
            $el.material_select();

        // https://github.com/Dogfalo/materialize/issues/1861
        $el.css({display: "inline", height: 0, padding: 0, width: 0, position: 'absolute'});
        // so that the select input that's made invisible above doesn't get focus on using tabstops,
        // creating inconsistencies potentially
        $el.attr('tabindex', "-1");
    }
    $(document ).ready(function(){
        $('select').each(function(i, el) {
            safeMaterialSelect($(el));
        });

        var x = new Date().getFullYear();
        var y = x+1;
        console.log(x);
        var p = '<h4 class="center">APPLICATION FOR ADMISSION TO M.S.<br> PROGRAMME ('+ x + '-' + y + ')</h4>';
        $('.heading').append(p);

        var allDepartments = $("#department1 option").clone();
        var currentlySelected = {
            "department1": $("#department1").val(), 
            "department2": $("#department2").val(),
            "department3": $("#department3").val()
        };

        function changeSomeDepartment(e) {
            var curElem = this;
            var curVal = curElem.value;
            var prevVal = currentlySelected[this.id];

            var $otherTwo = $("#department1,#department2,#department3").not($(curElem));
            $otherTwo.each(function(i, el) {
                if(curVal == "")
                    return;
                var originalValue = el.value;
                var $el = $(el);

                if(originalValue == curVal)
                    $el.val('');

                $el.find("option[value='" + prevVal + "']").prop('disabled', false);
                $el.find("option[value='" + curVal + "']").prop('disabled', true);
                safeMaterialSelect( $el, true );
            });

            currentlySelected[this.id] = curVal;
        }

        $("#department1,#department2,#department3").change(changeSomeDepartment).trigger('change');
    });
</script>
@endsection