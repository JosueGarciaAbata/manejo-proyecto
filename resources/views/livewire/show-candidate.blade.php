<div>
    <section class="candidates-section">
        <div class="container">
            <div class="row">
                @forelse ($candidates as $candidate)
                    @include('pages.candidates.candidate-item', ['candidate' => $candidate])
                @empty
                    <div class="col-12">
                        <p class="text-center">No hay candidatos por el momento.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</div>
