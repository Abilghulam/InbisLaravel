    <!-- Footer Section -->
    <footer class="footer">
        <div class="container">
            <div class="footer-top">
                <div class="footer-logo">
                    <img src="{{ asset('img/logo.png') }}" alt="Indo Bismar Group" />
                    <h1>IndoBismar <span class="highlight">Group</span></h1>
                </div>
                <div class="footer-social">
                    <span>Ikuti Kami :</span>
                    <a
                        href="https://www.instagram.com/indobismar.store?utm_source=ig_web_button_share_sheet&igsh=c3c1b2tzNXc3am4="><img
                            src="{{ asset('img/social/instagram.png') }}" alt="Instagram"></a>
                    <a href="https://www.tiktok.com/@indobismar.store?is_from_webapp=1&sender_device=pc"><img
                            src="{{ asset('img/social/tiktok.png') }}" alt="Tiktok"></a>
                    <a href="#"><img src="{{ asset('img/social/whatsapp.png') }}" alt="WhatsApp"></a>
                    <a href="#"><img src="{{ asset('img/social/facebook.png') }}" alt="Facebook"></a>
                    <a href="#"><img src="{{ asset('img/social/x.webp') }}" alt="X"></a>
                    <a href="#"><img src="{{ asset('img/social/youtube.png') }}" alt="YouTube"></a>
                </div>
            </div>

            <div class="footer-main">
                <!-- Kategori Produk -->
                <div class="footer-col">
                    <h4>Kategori Produk</h4>
                    <ul>
                        <li><a href="{{ route('catalog.show', ['type' => 'laptop']) }}">Laptop & Notebook</a></li>
                        <li><a href="{{ route('catalog.show', ['type' => 'pc']) }}">Dekstop Computer</a></li>
                        <li><a href="{{ route('catalog.show', ['type' => 'pc']) }}">Handphone</a></li>
                        <li><a href="{{ route('catalog.show', ['type' => 'accessories']) }}">IT Accessories</a></li>
                    </ul>
                </div>

                <!-- Kategori Brand -->
                <div class="footer-col">
                    <h4>Kategori Brand</h4>
                    <ul>
                        <li><a href="">Apple</a></li>
                        <li><a href="">Samsung</a></li>
                        <li><a href="">Vivo</a></li>
                        <li><a href="">Oppo</a></li>
                        <li><a href="">Xiaomi</a></li>
                    </ul>
                </div>

                <!-- Hubungi Kami -->
                <div class="footer-col">
                    <h4>Hubungi Kami</h4>
                    <ul>
                        <li><i data-lucide="phone"
                                style="width: 16px;height: 16px;margin-right: 5px;vertical-align: middle;"></i> Call
                            Center (031) 8474685
                            <br><small style="margin-left: 25px;">(Operasional Layanan 24/7)</small>
                        </li>
                        <li><i data-lucide="clock"
                                style="width: 16px;height: 16px;margin-right: 5px;vertical-align: middle;"></i> Jam
                            Operasional
                            <br><small style="margin-left: 25px;">(Senin - Jumat: 08.30 -
                                17.00 WIB)</small>
                        </li>
                        <li><i data-lucide="mail"
                                style="width: 16px;height: 16px;margin-right: 5px;vertical-align: middle;"></i> <a
                                href="mailto:bismar@ptindobismar.com">bismar@ptindobismar.com</a>
                        </li>
                    </ul>
                </div>

                <!-- Kerjasama -->
                <div class="footer-col no-collapse">
                    <h4>Bekerjasama Dengan</h4>
                    <img src="{{ asset('img/partner/biz-removebg-preview.png') }}" alt="Partner"
                        class="partner-logo" />
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2025. All rights reserved by Indo Bismar Group</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            if (window.innerWidth <= 768) {
                document.querySelectorAll(".footer-col:not(.no-collapse) h4").forEach((header) => {
                    header.addEventListener("click", () => {
                        const parent = header.parentElement;
                        parent.classList.toggle("active");
                    });
                });
            }
        });
    </script>
