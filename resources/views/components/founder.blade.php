@props(['founders' => null])

<!-- Founder Section -->
<section class="section founder" id="founder">
    <div class="container">
        <h2 class="section-title fade-in">Founder</h2>

        @if ($founders)
            <div class="founder-content fade-in">
                <div class="founder-image-container">
                    <div class="founder-image-bg"></div>
                    @if ($founders->image)
                        <img src="{{ asset($founders->image) }}" alt="{{ $founders->name }}" class="founder-image" />
                    @else
                        <img src="{{ asset('img/sis.jpg') }}" alt="Founder" class="founder-image" />
                    @endif
                </div>

                <div class="founder-text">
                    <h3>{{ $founders->name }}</h3>
                    <p>{{ $founders->description }}</p>
                </div>
            </div>
        @else
            <div class="no-data fade-in" style="text-align: center; padding: 50px 0; color: #666;">
                <p>Belum ada data founder yang tersedia.</p>
            </div>
        @endif
    </div>
</section>
