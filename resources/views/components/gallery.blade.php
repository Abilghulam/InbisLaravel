@props(['galleries' => null])

<!-- Gallery Section -->
<section class="section gallery" id="gallery">
    <div class="container">
        <h2 class="section-title fade-in">Gallery</h2>

        @if (isset($galleries) && $galleries->count() > 0)
            <div class="gallery-wrapper">
                <button class="gallery-btn prev">&#10094;</button>
                <div class="gallery-track">
                    @foreach ($galleries as $item)
                        <div class="gallery-item">
                            <img src="{{ asset('uploads/' . $item->image) }}" alt="{{ $item->title }}" loading="lazy" />
                            <div class="caption">{{ $item->title }}</div>
                        </div>
                    @endforeach
                </div>
                <button class="gallery-btn next">&#10095;</button>
            </div>
        @else
            <div class="no-data fade-in" style="text-align: center; padding: 50px 0; color: #666;">
                <p>Belum ada gambar pada galeri yang tersedia.</p>
            </div>
        @endif
    </div>
</section>
