<section class="inner-banner">
    <div class="container">
        <h2 class="inner-banner__title">Personaliza tu página</h2>
        <ul class="list-unstyled thm-breadcrumb">
            <li><a href="{{ route('home') }}">Inicio</a></li>
            
            {{-- Mostrar el eslogan e ícono personalizados --}}
            <li>
                <div class="organization-info">
                    {{-- Ícono de la organización --}}
                    @if(isset($organizationIcon) && $organizationIcon)
                        <img src="{{ asset('storage/' . $organizationIcon) }}" alt="Ícono de la organización" class="organization-icon">
                    @else
                        <img src="{{ asset('images/default-icon.png') }}" alt="Ícono por defecto" class="organization-icon">
                    @endif
                    
                    {{-- Eslogan --}}
                    <span class="organization-slogan">
                        {{ $organizationSlogan ?? 'Trabajemos juntos por un mejor futuro' }}
                    </span>
                </div>
            </li>
            
            {{-- Otros elementos --}}
            <li>Visión/Misión</li>
            <li>Sobre la organización</li>
            <li>Límite de eventos a mostrar</li>
            <li>Cambiar footer</li>
        </ul>
    </div>
</section>

