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

                <!-- Level -->
                <p class="modal-level" id="modalProductLevel"></p>

                <!-- Stok -->
                <p class="modal-stock" id="modalProductStock"></p>

                <!-- Spesifikasi -->
                <div class="modal-specs" id="modalProductSpecs">
                    <!-- Spesifikasi produk akan dimuat dari data-attribute -->
                </div>

                <a id="whatsappButton" href="#" target="_blank" class="whatsapp-btn" role="button">
                    <svg viewBox="0 0 24 24" width="24" height="24">
                        <path fill="currentColor"
                            d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.5 3.44 1.45 4.95l-1.5 5.54 5.66-1.48c1.47.8 3.1 1.25 4.3 1.25h.06c5.46 0 9.91-4.45 9.91-9.91-.01-5.46-4.46-9.91-9.92-9.91zm0 18.06c-1.4 0-2.8-.3-4.04-.9l-.3-.18-3.15.82.84-3.07-.2-.33c-.76-1.29-1.16-2.77-1.16-4.3 0-4.54 3.7-8.24 8.24-8.24 4.54 0 8.24 3.7 8.24 8.24s-3.7 8.24-8.24 8.24zm4.2-6.42c-.22-.11-.9-.44-1.28-.56-.37-.11-.64-.17-.92.17-.28.34-1.07 1.15-1.3 1.38-.24.22-.48.25-.9.13-.42-.11-1.78-.66-3.38-2.08-.24-.22-.57-.42-.75-.72-.18-.3-.02-.45.1-.67.1-.17.22-.3.33-.48.11-.18.15-.31.23-.48.09-.17.04-.32-.01-.48-.06-.15-.49-1.18-.68-1.62-.19-.44-.38-.38-.56-.38-.17 0-.36.03-.55.03s-.47-.07-.71.35c-.24.42-.9 1.16-.9 2.76 0 1.6.92 3.19 1.05 3.39.14.2 1.83 2.75 4.45 3.79 2.62 1.04 3.12.83 3.69.78.56-.05 1.77-.72 2.02-1.43.26-.71.26-1.28.18-1.43-.07-.16-.27-.26-.58-.41z" />
                    </svg>
                    Pesan Sekarang via WhatsApp
                </a>
            </div>
        </div>
    </div>
</div>
