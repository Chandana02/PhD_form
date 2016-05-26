@extends('layouts.master')

@section('title', 'Instructions')

@section('body')
    <div class="container main">
        <div class="row">
            <h5 class="center">
                Instructions to fill the application
            </h5>
            <div class="space-small"></div>
            <div class="inst">
                <ol>
                    <li>Use Google Chrome for better experience.</li>
                    <li>This site is also compatible to your Android Phone Browser.</li>
                    <li>Please read the <a href="http://www.nitt.edu/home/MS%20and%20Ph_D%20advt%20July%202016%20(1)-revised-26th-may-2016.pdf">information brouchure</a> before filling the aplication.</li>
                    <li>The entire registration process is of 3 stages. 
                        <ul>
                            <li>Stage 1: Personal details</li>
                            <li>Stage 2: Online payment</li>
                            <li>Stage 3: Other details</li>
                        </ul>
                    </li>
                    <li>Application fees should be paid through  <a href="https://www.onlinesbi.com/prelogin/icollecthome.htm?corpID=88587">State Bank Collect</a> before the submission of the application form.</li>
                    <li>If any information given in the application is found incorrect, the application will be rejected.</li>
                </ol>
            </div>
            <div class="space-small"></div>
            <div class="center">
                <a href="/phd" class="center btn teal waves">Proceed</a>
            </div>
        </div>
    </div>
@endsection
