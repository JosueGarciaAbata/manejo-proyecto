@extends('back.layouts.pages-layout')
@section('page-title', isset($pageTitle) ? $pageTitle : 'Profile - Read On')
@section('content')

    @livewire('admin-profile-header')

    <hr>
    <div class="row">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                    <li class="nav-item">
                        <a href="#tabs-details" class="nav-link active" data-bs-toggle="tab"><svg
                                xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <circle cx="12" cy="7" r="4" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                            </svg>Personal Details</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tabs-password" class="nav-link" data-bs-toggle="tab">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-lock-square-rounded">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                                <path d="M8 11m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v3a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z" />
                                <path d="M10 11v-2a2 2 0 1 1 4 0v2" />
                            </svg>
                            Change password</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active show" id="tabs-details">
                        <h2>Details settings</h2>
                        <div>

                            @livewire('admin-personal-details')

                        </div>
                    </div>
                    <div class="tab-pane" id="tabs-password">
                        <h2>Change your password</h2>
                        <div>

                            @livewire('admin-change-password-form')

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>


@endsection

@push('scripts')
    <script>
        $('#changeAuthorPictureFile').ijaboCropTool({
            preview: '.image-previewer',
            setRatio: 1,
            allowedExtensions: ['jpg', 'jpeg', 'png'],
            buttonsText: ['CROP', 'QUIT'],
            buttonsColor: ['#30bf7d', '#ee5155', -15],
            processUrl: '{{ route('admin.change-profile-picture') }}',
            withCSRF: ['_token', '{{ csrf_token() }}'],
            onSuccess: function(message, element, status) {
                //alert(message);
                Livewire.dispatch('updateAuthorProfileHeader');
                Livewire.dispatch('updateTopHeader');
                toastr.success(message);
            },
            onError: function(message, element, status) {
                alert(message);
                toastr.error(message);
            }
        });
    </script>
@endpush
