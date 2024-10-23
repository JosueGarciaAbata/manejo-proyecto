@extends('layouts.app')

@section('title', 'Suggestions')

@section('content')
    <div id="ventanaModal" class="modal">
        <div class="contenido-modal">
            <span class="cerrar">&times;</span>
            <h2 id="title"></h2>
            <p id="description"></p>
        </div>
    </div>
    <div id="form-add-suggestion" class="modal">
        <div class="contenido-modal">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>Tus sugerencias son valiosos para un mejor futuro</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis quam molestias
                                voluptatibus dicta provident quasi? Unde distinctio rerum explicabo doloribus atque?
                                Adipisci fugiat in odio autem laborum doloremque dolorum quas..</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7">
                        <form action="{{ route('suggestions.store') }}" method="POST" class="mailchimp-one__form add-suggestion">
                            @csrf
                            <input type="text" name='tit_sug' id="title" placeholder="Titulo">
                            <input type="text" name='ema_sug' placeholder="Email">
                            <textarea maxlength="150" name='des_sug' placeholder="Descripcion"></textarea>
                            <button type="submit" class="thm-btn mailchimp-one__form-btn">Enviar sugerencia</button>
                        </form>
                    </div>
                </div>
            </div>
            <span class="cerrar">&times;</span>

        </div>
    </div>

    <div class="container">
        <p class="primary-btn top-btn" id="add-suggestion"><i class="fa fa-plus"></i> Añadir sugerencia</p>

        <div class="row">
            @forelse ($suggestions as $suggestion)
                <div class="col-lg-6 ">
                    <div class="event-one__single">
                        <div class="event-one__content suggestion">
                            <p class="event-one__date">
                                {{ \Carbon\Carbon::parse($suggestion->updated_at)->format('d M, Y') }}
                            </p>
                            <h3 class="event-one__title">
                                {{ $suggestion->tit_sug }}
                            </h3>
                            <p class="suggestion-details">
                                {{ $suggestion->des_sug }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Aún no existen sugerencias.</p>
            @endforelse
        </div>

        @php
            $currentPage = $suggestions->currentPage();
            $lastPage = $suggestions->lastPage();
            $startPage = max(1, $currentPage - 2);
            $endPage = min($lastPage, $currentPage + 2);
        @endphp

        <div class="post-pagination">
            {{-- Botón para la página anterior (<<) --}}
            @if ($suggestions->onFirstPage())
                <a class="disabled" aria-disabled="true"><i class="fa fa-angle-double-left"></i></a>
            @else
                <a href="{{ $suggestions->previousPageUrl() }}"><i class="fa fa-angle-double-left"></i></a>
            @endif

            {{-- Enlace para la primera página --}}
            @if ($currentPage > 3)
                <a href="{{ $suggestions->url(1) }}">01</a>
                @if ($currentPage > 4)
                    <a class="disabled" aria-disabled="true">...</a>
                @endif
            @endif

            {{-- Enlaces de las páginas cercanas --}}
            @foreach (range($startPage, $endPage) as $page)
                @if ($page == $currentPage)
                    <a href="{{ $suggestions->url($page) }}" class="active">{{ sprintf('%02d', $page) }}</a>
                @else
                    <a href="{{ $suggestions->url($page) }}">{{ sprintf('%02d', $page) }}</a>
                @endif
            @endforeach

            {{-- Enlace para la última página --}}
            @if ($currentPage < $lastPage - 2)
                @if ($currentPage < $lastPage - 3)
                    <a class="disabled" aria-disabled="true">...</a>
                @endif
                <a href="{{ $suggestions->url($lastPage) }}">{{ sprintf('%02d', $lastPage) }}</a>
            @endif

            {{-- Botón para la página siguiente (>>) --}}
            @if ($suggestions->hasMorePages())
                <a href="{{ $suggestions->nextPageUrl() }}"><i class="fa fa-angle-double-right"></i></a>
            @else
                <a class="disabled" aria-disabled="true"><i class="fa fa-angle-double-right"></i></a>
            @endif
        </div>

        <!-- /.post-pagination -->
    </div>
    </section><!-- /.event-one -->
@endsection
