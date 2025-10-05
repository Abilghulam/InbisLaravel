@props(['about_us' => null])

<!-- About Section -->
<section class="section about" id="about">
    <div class="container">
        <h2 class="section-title fade-in">About Us</h2>

        <div class="about-content fade-in">
            <div class="about-text">
                @if ($about_us)
                    {!! nl2br(e($about_us->description)) !!}
                @else
                    <p><em>Konten About Us belum ditambahkan oleh admin.</em></p>
                @endif
            </div>

            <iframe class="about-video" width="560" height="315"
                src="{{ $about_us->video_url ?? 'https://www.youtube.com/embed/6020shHfBX4' }}"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
        </div>

        @if ($about_us)
            <div class="about-stats fade-in">
                <div class="stat-item">
                    <div class="stat-number">{{ $about_us->rating ?? '0.0' }}</div>
                    <div class="stars">★★★★★</div>
                    <div class="stat-text">{{ $about_us->reviews_count ?? 0 }} Ulasan</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">{{ $about_us->years_experience ?? 0 }}th</div>
                    <div class="stat-text">Tahun Pengalaman</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">{{ $about_us->brand_partners ?? 0 }}</div>
                    <div class="stat-text">Brand Partner</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">{{ $about_us->retail_stores ?? 0 }}</div>
                    <div class="stat-text">Retail Store</div>
                </div>
            </div>
        @else
            <div class="no-data fade-in" style="text-align: center; padding: 50px 0; color: #666;">
                <p>Belum ada deskripsi perusahaan yang tersedia.</p>
            </div>
        @endif
    </div>
</section>
