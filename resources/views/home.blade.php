@extends('layouts.master')

@section('title', 'Home')

@section('body')
    <div class="container center main">
        <p class="large">
            Welcome to NIT Trichy PhD. and M.S. (by research) application portal!
        </p>
        
        <div class="space-small"></div>
        <!-- <p>The Ph.D. degree is granted for distinction attained in a special field of concentration, by the demonstrated ability to modify or enlarge a significant subject in a dissertation, based upon original research scholarship. The minimum requirement is that the doctoral student follow a unified and organized program of study.</p> -->
        
        <div class="space-large"></div>
        
        <div class="row">
            <div class="col l12 s12">
                <a class="waves-effect waves-light btn" href="/phdinstructions">
                    Click here for <span style="text-transform: initial">PhD.</span> Application
                </a>
                <a class="waves-effect waves-light btn" href="/msinstructions">
                    Click here for M.S. Application
                </a>
            </div>
            <div class="space-medium"></div>
            <div class="col l12 s12">
                <a class="waves-effect waves-light btn" href="/view">
                    View my application
                </a>
            </div>
        </div>
        
        <div class="space-medium"></div>
        
        <div class="row center">
            <p>Click <a href="continue">here</a> to continue with saved application form </p>
        </div>
    </div>
@endsection