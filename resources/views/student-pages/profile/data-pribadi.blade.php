<x-layout.student :title="$title">
    <x-slot name="style">

    </x-slot>

    <x-slot name="header">
        <x-student.navigation.page-header page-pretitle="overview" :page-title="$title" />
    </x-slot>

    <div class="card">
        <div class="card-body">
            <div class="row g-0">
                <div class="col-3 d-none d-md-block border-end">
                    <x-student.navigation.sidebar />
                </div>
                <div class="col d-flex flex-column">
                    <div class="card-body">
                        <h2 class="mb-4">{{ $title }}</h2>
                        <div class="d-flex justify-content-center">
                            <div class="text-center">
                                <div class="mb-3"><span class="avatar avatar-xl"
                                        style="background-image: url(./static/avatars/000m.jpg)"></span>
                                </div>
                                <div><a href="#" class="btn">
                                        Upload foto raport
                                    </a></div>
                            </div>
                        </div>
                        <h3 class="card-title mt-4">Business Profile</h3>
                        <p class="card-subtitle">This contact will be shown to others publicly, so choose it carefully.</p>
                        <div class="row g-3">
                            <div class="col-md">
                                <div class="form-label">Business Name</div>
                                <input type="text" class="form-control" value="Tabler">
                            </div>
                            <div class="col-md">
                                <div class="form-label">Business ID</div>
                                <input type="text" class="form-control" value="560afc32">
                            </div>
                            <div class="col-md">
                                <div class="form-label">Location</div>
                                <input type="text" class="form-control" value="Peimei, China">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent mt-auto">
                        <div class="btn-list justify-content-end">
                            <a href="#" class="btn btn-primary">
                                Perbarui
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">

    </x-slot>
</x-layout.student>
