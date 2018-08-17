<ul id="slide-out" class="sidenav sidenav-fixed">
    <li>
        <div class="user-view">
            <a href="#user"><img class="logo" src="{{url('storage/logo2.png')}}"></a>
        </div>
    </li>

    <li><div class="divider"></div></li>
    <ul class="collapsible collapsible-accordion">
        <li>
        <a class="collapsible-header">STUDENTS<span class="waves-effect waves-light fa fa-sort-down"></span></a>
        <div class="collapsible-body">
            <ul>
                <li><a href="{{url('student/new')}}">New</a></li>
                <li><a href="{{url('students')}}">View</a></li>
            </ul>
        </div>
        </li>
    </ul>    
    <li><div class="divider"></div></li>
    <ul class="collapsible collapsible-accordion">
        <li>
        <a class="collapsible-header">COURSES<span class=" waves-effect waves-light fa fa-sort-down"></span></a>
        <div class="collapsible-body">
            <ul>
                <li><a href="{{url('course/index')}}">New</a></li>
                <li><a href="{{url('course/view')}}">view</a></li>
            </ul>
        </div>
        </li>
    </ul>
    <li><div class="divider"></div></li>
    <ul class="collapsible collapsible-accordion">
        <li>
        <a class="collapsible-header">ENROLLMENT<span class="waves-effect waves-light fa fa-sort-down"></span></a>
        <div class="collapsible-body">
            <ul>
                <li><a href="{{url('enroll/new')}}">Enroll</a></li>
                <li><a href="{{url('enroll/checkquorum')}}">Check Quorum</a></li>
            </ul>
        </div>
        </li>
    </ul>
    <li><div class="divider"></div></li>
   
    <li><div class="divider"></div></li>
  </ul>
