@props(['brand_partners' => null])

<!-- Brand Partner Section -->
<section class="section brand-partner" id="brand-partner">
    <div class="container">
        <h2 class="section-title fade-in">Brand Partner</h2>
        <div class="brand-logos fade-in">
            @foreach ($brand_partners as $brand)
                <div class="brand-logo-item">
                    @if ($brand->logo)
                        <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}" loading="lazy" />
                    @else
                        <em>{{ $brand->name }}</em>
                        <div class="no-data fade-in" style="text-align: center; padding: 50px 0; color: #666;">
                            <p>Belum ada data brand yang tersedia.</p>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
