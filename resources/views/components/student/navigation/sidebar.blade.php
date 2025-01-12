<div class="card-body">
    <h4 class="subheader">Menu</h4>
    <div class="list-group list-group-transparent">
        <a wire:navigate href="{{ route('student.profile') }}"
            class="list-group-item list-group-item-action d-flex align-items-center {{ Request::is('student/profile*') ? 'active' : '' }}">Profile</a>
    </div>
</div>