<div class="section-header">
    <h3>{{ $title }}</h3>
    <a href="{{ route('admin.product.create', ['category' => request('category') ?? 'hp']) }}" class="btn btn-primary">
        + Tambah Produk
    </a>
</div>

<table>
    <thead>
        <tr>
            <th>Nama Produk</th>
            <th>Brand</th>
            <th>Kategori</th>
            <th>Level</th>
            <th>Section</th>
            <th>Stock</th>
            <th>Harga Lama</th>
            <th>Harga</th>
            <th>Spesifikasi</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->brand }}</td>
                <td>{{ ucfirst($product->category) }}</td>
                <td>{{ ucfirst($product->level) }}</td>
                <td>{{ ucfirst($product->section) }}</td>
                <td>
                    @if ($product->stock === 'tersedia')
                        <span style="color:green;">Tersedia</span>
                    @else
                        <span style="color:red;">Habis</span>
                    @endif
                </td>
                <td>
                    @if ($product->old_price)
                        Rp {{ number_format($product->old_price, 0, ',', '.') }}
                    @else
                        -
                    @endif
                </td>
                <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                <td>{{ \Illuminate\Support\Str::limit($product->specs, 50) }}</td>
                <td>
                    @if ($product->image)
                        <img src="{{ asset($product->image) }}" width="80">
                    @else
                        <em>Tidak ada gambar</em>
                    @endif
                </td>
                <td>
                    <div class="action-buttons">
                        {{-- tombol edit dengan kategori aktif --}}
                        <a href="{{ route('admin.product.edit', [
                            'product' => $product->id,
                            $category . '_page' => request($category . '_page', 1),
                            'category' => $category,
                        ]) }}"
                            class="btn btn-sm btn-primary">Edit</a>

                        {{-- tombol hapus dengan kategori aktif --}}
                        <form
                            action="{{ route('admin.product.destroy', ['product' => $product->id, 'category' => request('category') ?? $product->category]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="11"><em>Belum ada produk {{ $title }}.</em></td>
            </tr>
        @endforelse
    </tbody>
</table>

<!-- Pagination -->
<div class="pagination-wrapper">
    {{-- tambahkan query agar tetap di tab kategori --}}
    {{ $products->appends(['category' => request('category')])->links('vendor.pagination.admin') }}
</div>
