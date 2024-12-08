<div>
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-auto">
                <span class="avatar avatar-md" style="background-image: url({{ $author->picture }})"></span>
            </div>
            <div class="col">
                <h2 class="page-title">{{ $author->name }}</h2>
                <div class="page-subtitle">
                    <div class="row">

                        <div class="col-auto text-success">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-auto d-none d-md-flex">
                <input type="file" name="file" id="changeAuthorPictureFile" class="d-none"
                    onchange="this.dispatchEvent(new InputEvent('input'))">
                <a href="#" class="btn btn-primary"
                    onclick="event.preventDefault();document.getElementById('changeAuthorPictureFile').click();">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-photo-scan">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M15 8h.01" />
                        <path d="M6 13l2.644 -2.644a1.21 1.21 0 0 1 1.712 0l3.644 3.644" />
                        <path d="M13 13l1.644 -1.644a1.21 1.21 0 0 1 1.712 0l1.644 1.644" />
                        <path d="M4 8v-2a2 2 0 0 1 2 -2h2" />
                        <path d="M4 16v2a2 2 0 0 0 2 2h2" />
                        <path d="M16 4h2a2 2 0 0 1 2 2v2" />
                        <path d="M16 20h2a2 2 0 0 0 2 -2v-2" />
                    </svg>
                    Chage picture
                </a>
            </div>
        </div>
    </div>
