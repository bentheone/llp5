<nav>
    <div class="brand">
       <p>Employee MGMT</p>
    </div>
    <div class="links">
        <ul>
            <li><a href="/dashboard">Home</a></li>
            <li><a href="/jobs">Jobs</a></li>
            <li><a href="/applicants">Applicants</a></li>
            <li><a href="/applications">Applications</a></li>
            <li><a href="/stages">Stages</a></li>
            <li><a href="/report">Report</a></li>
        </ul>
    </div>
    <div class="account">
        <div class="user">
            <p>{{Auth::user()->name}}</p>
            <p>{{Auth::user()->email}}</p>
        </div>
        <div class="logout">
            <a href="/logout">-></a>
        </div>
    </div>
</nav>