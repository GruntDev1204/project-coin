@if (Auth::guard('admin_managers')->user())
<div class="head">
    <div class="head-content">
        <ul>
            <li><a href="/setting/Introduce/form">Edit Info</a> </li>
            <li><a href="/setting/Link/form">Edit Link</a> </li>
            <li>Edit Token </li>
            <li>Edit RoadMap </li>
            <li><a href="/logout">Logout</a></li>

        </ul>
    </div>
    <div class="head-info">
        <div class="avatar"><img class="avatar"
                src={{Auth::guard('admin_managers')->user()->avatar}}></div>
        <div class="info-admin">
            <p class="name-admin">{{ Auth::guard('admin_managers')->user()->fullName }}</p>
            @if (Auth::guard('admin_managers')->user()->is_ceo == 1)
                <p class="detail-admin"> Admins <a href="/changeIn4"><i class="fa-solid fa-gear"></i></a></p>
            @else
                <p class="detail-admin">Member</p>
            @endif
        </div>
    </div>
</div>
@else
<div class="head container">
    <div class="head-content ">
        <ul>
            <li><a href="/JoinSndg">Join Sndg</a> </li>
            <li><a href="/login">Login</a> </li>
        </ul>
    </div>
</div>
@endif
