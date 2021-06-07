
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">

            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ $title }}</h5>

            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item text-muted">
                    <a href="" class="text-muted">{{ $subtitle ?: "" }}</a>
                </li>
            </ul>
            {{ $action ?? "" }}
        </div>
        <div class="d-flex align-items-center">
            {{ $slot }}
        </div>

    </div>
</div>
