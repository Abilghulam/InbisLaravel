@extends('layouts.admin')

@section('content')
    <h2>Kelola Product Catalog</h2>

    <!-- Tabs -->
    <div class="tabs">
        <button class="tab-link {{ request('category') == 'hp' || !request('category') ? 'active' : '' }}" data-tab="tab-hp"
            onclick="window.location='{{ route('admin.product.index', ['category' => 'hp']) }}'">
            Handphone
        </button>

        <button class="tab-link {{ request('category') == 'laptop' ? 'active' : '' }}" data-tab="tab-laptop"
            onclick="window.location='{{ route('admin.product.index', ['category' => 'laptop']) }}'">
            Laptop & Notebook
        </button>

        <button class="tab-link {{ request('category') == 'pc' ? 'active' : '' }}" data-tab="tab-pc"
            onclick="window.location='{{ route('admin.product.index', ['category' => 'pc']) }}'">
            Dekstop Computer
        </button>

        <button class="tab-link {{ request('category') == 'accessories' ? 'active' : '' }}" data-tab="tab-accessories"
            onclick="window.location='{{ route('admin.product.index', ['category' => 'accessories']) }}'">
            Accessories
        </button>
    </div>

    <!-- HP -->
    <div id="tab-hp" class="tab-content {{ request('category') == 'hp' || !request('category') ? 'active' : '' }}">
        @include('admin.product.partials.table', ['products' => $hp, 'title' => 'Catalog Handphone'])
    </div>

    <!-- Laptop -->
    <div id="tab-laptop" class="tab-content {{ request('category') == 'laptop' ? 'active' : '' }}">
        @include('admin.product.partials.table', [
            'products' => $laptop,
            'title' => 'Catalog Laptop & Notebook',
        ])
    </div>

    <!-- PC -->
    <div id="tab-pc" class="tab-content {{ request('category') == 'pc' ? 'active' : '' }}">
        @include('admin.product.partials.table', [
            'products' => $pc,
            'title' => 'Catalog Dekstop Computer',
        ])
    </div>

    <!-- Accessories -->
    <div id="tab-accessories" class="tab-content {{ request('category') == 'accessories' ? 'active' : '' }}">
        @include('admin.product.partials.table', [
            'products' => $accessories,
            'title' => 'Catalog Accessories',
        ])
    </div>
@endsection

@push('scripts')
    <script>
        // ====== Handle Switching Tab Manual ======
        document.querySelectorAll('.tab-link').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.tab-link').forEach(el => el.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
                btn.classList.add('active');
                document.getElementById(btn.dataset.tab).classList.add('active');
                // Update query URL agar bisa direload
                const category = btn.dataset.tab.replace('tab-', '');
                const newUrl = new URL(window.location.href);
                newUrl.searchParams.set('category', category);
                window.history.replaceState({}, '', newUrl);
            });
        });

        // ====== Auto-Open Tab Berdasarkan ?category= ======
        const urlParams = new URLSearchParams(window.location.search);
        const category = urlParams.get('category');
        if (category) {
            document.querySelectorAll('.tab-link').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
            const activeBtn = document.querySelector(`[data-tab="tab-${category}"]`);
            const activeTab = document.querySelector(`#tab-${category}`);
            if (activeBtn && activeTab) {
                activeBtn.classList.add('active');
                activeTab.classList.add('active');
                activeTab.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }

        // ====== Handle AJAX Pagination ======
        document.addEventListener('click', function(e) {
            const link = e.target.closest('.pagination a');
            if (link) {
                e.preventDefault();
                const url = link.getAttribute('href');
                const wrapper = link.closest('.pagination-links');
                const category = wrapper.getAttribute('data-category');
                const container = document.querySelector(`#tab-${category}`);

                // Loading indikator (opsional)
                container.style.opacity = '0.5';

                fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.text())
                    .then(html => {
                        // Ambil bagian tabel dari HTML hasil fetch
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');
                        const newTable = doc.querySelector(`#tab-${category} table`);
                        const newPagination = doc.querySelector(`#tab-${category} .pagination-wrapper`);

                        // Replace tabel dan pagination di tab aktif
                        container.querySelector('table').outerHTML = newTable.outerHTML;
                        container.querySelector('.pagination-wrapper').outerHTML = newPagination.outerHTML;

                        // Kembalikan opacity
                        container.style.opacity = '1';
                    })
                    .catch(err => {
                        console.error('Gagal memuat halaman:', err);
                        container.style.opacity = '1';
                    });
            }
        });
    </script>
@endpush
