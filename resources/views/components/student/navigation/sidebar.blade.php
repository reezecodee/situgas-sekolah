<div class="card-body">
    <h4 class="subheader">Menu</h4>
    <div class="list-group list-group-transparent">
        <a href="{{ route('student.profile') }}" class="list-group-item list-group-item-action d-flex align-items-center {{ Request::is('student/profile*') ? 'active' : '' }}">Profile</a>
        <a href="{{ route('student.privacyData') }}" class="list-group-item list-group-item-action d-flex align-items-center {{ Request::is('student/data-pribadi*') ? 'active' : '' }}">Data pribadi</a>
        <a href="{{ route('student.changePassword') }}" class="list-group-item list-group-item-action d-flex align-items-center {{ Request::is('student/ganti-password*') ? 'active' : '' }}">Ganti password</a>
    </div>
</div>
