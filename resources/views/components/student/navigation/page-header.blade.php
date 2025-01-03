<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    {{ $pagePretitle }}
                </div>
                <h2 class="page-title">
                    {{ $pageTitle }}
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>