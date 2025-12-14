<!-- View Details Modal -->
<div id="productModal" class="modal" role="dialog" aria-modal="true" aria-labelledby="modalProductTitle">
    <div class="modal-content">
        <span class="close-btn" role="button" aria-label="Close">&times;</span>

        <div class="modal-body">
            <!-- Gambar Produk -->
            <div class="modal-image">
                <img id="modalProductImage" src="" alt="Product Image">
            </div>

            <!-- Informasi Produk -->
            <div class="modal-info">
                <h2 id="modalProductTitle"></h2>

                <!-- Harga -->
                <div class="modal-prices">
                    <p class="modal-old-price" id="modalProductOldPrice"></p>
                    <p class="modal-price" id="modalProductPrice"></p>
                    <p class="modal-discount" id="modalProductDiscount" style="display:none"></p>
                </div>

                <!-- Badges Stok dan Level -->
                <div class="modal-badges">
                    <!-- Stok -->
                    <p class="modal-stock" id="modalProductStock"></p>

                    <!-- Level -->
                    <p class="modal-level" id="modalProductLevel"></p>
                </div>

                <!-- Spesifikasi -->
                <div class="modal-specs" id="modalProductSpecs">
                    <!-- Spesifikasi produk akan dimuat dari data-attribute -->
                </div>

                <div class="modal-actions">
                    <!-- WhatsApp -->
                    <a href="#" id="whatsappButton" class="btn-whatsapp" target="_blank" rel="noopener">
                        <i class="fab fa-whatsapp"></i>
                        Pesan via WhatsApp
                    </a>

                    <!-- Shopee -->
                    <a href="https://shopee.co.id/indobismar" class="ecommerce-btn shopee" target="_blank"
                        rel="noopener">
                        <img src="{{ asset('img/shopee.png') }}" alt="Shopee">
                        <span>Lihat Produk</span>
                    </a>

                    <!-- Tokopedia -->
                    <a href="https://www.tokopedia.com/indobismarstore" class="ecommerce-btn tokopedia" target="_blank"
                        rel="noopener">
                        <img src="{{ asset('img/tokopedia.png') }}" alt="Tokopedia">
                        <span>Lihat Produk</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
