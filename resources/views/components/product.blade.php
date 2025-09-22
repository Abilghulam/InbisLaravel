@props(['product'])

<!-- Products Section -->
<section class="section products" id="products">
    <div class="container">
        <h2 class="section-title fade-in">Our Products</h2>

        <div class="product-grid">
            <div class="product-card fade-in">
                <div class="product-label">Penawaran Terbaik</div>
                <div class="product-image">
                    <img src="img/product/laptop.jpg" alt="Laptop & Notebook" />
                </div>
                <h3 class="product-title">Laptop & Notebook</h3>
                <button onclick="window.location='{{ route('catalog.show', 'laptop') }}'" class="btn-view">
                    View Catalog
                </button>

            </div>

            <div class="product-card fade-in">
                <div class="product-label">Penawaran Terbaik</div>
                <div class="product-image">
                    <img src="img/product/pc.jpg" alt="Desktop Computer" />
                </div>
                <h3 class="product-title">Dekstop Computer</h3>
                <button onclick="window.location='{{ route('catalog.show', 'pc') }}'" class="btn-view">
                    View Catalog
                </button>

            </div>

            <div class="product-card fade-in">
                <div class="product-label">Penawaran Terbaik</div>
                <div class="product-image">
                    <img src="img/product/hp.jpg" alt="Smartphone" />
                </div>
                <h3 class="product-title">Handphone</h3>
                <button onclick="window.location='{{ route('catalog.show', 'hp') }}'" class="btn-view">
                    View Catalog
                </button>

            </div>

            <div class="product-card fade-in">
                <div class="product-label">Penawaran Terbaik</div>
                <div class="product-image">
                    <img src="img/product/aksesoris.jpg" alt="IT Accessories" />
                </div>
                <h3 class="product-title">IT Accessories</h3>
                <button onclick="window.location='{{ route('catalog.show', 'accessories') }}'" class="btn-view">
                    View Catalog
                </button>

            </div>
        </div>
    </div>
</section>
