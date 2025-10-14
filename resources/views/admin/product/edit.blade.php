@extends('layouts.admin')

@section('content')
    <h2>Edit Produk</h2>

    <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        {{-- Hidden input agar redirect dan kategori konsisten --}}
        <input type="hidden" name="category" value="{{ $product->category }}">

        <div>
            <label>Nama Produk:</label><br>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" required>
        </div>

        <div style="margin-top:10px;">
            <label>Brand:</label><br>
            <input type="text" name="brand" value="{{ old('brand', $product->brand) }}" required>
        </div>

        <div style="margin-top:10px;">
            <label>Section:</label><br>
            <select id="section" name="section" required>
                <option value="product" {{ $product->section == 'product' ? 'selected' : '' }}>Product</option>
                <option value="recommendation" {{ $product->section == 'recommendation' ? 'selected' : '' }}>Recommendation
                </option>
                <option value="promo" {{ $product->section == 'promo' ? 'selected' : '' }}>Promo</option>
                <option value="latest" {{ $product->section == 'latest' ? 'selected' : '' }}>Latest</option>
            </select>
        </div>

        <div style="margin-top:10px;">
            <label>Harga Lama:</label><br>
            <input type="number" step="0.01" id="old_price" name="old_price"
                value="{{ old('old_price', $product->old_price) }}">
        </div>

        <div style="margin-top:10px;">
            <label>Diskon (%):</label><br>
            <input type="number" id="discount" name="discount" value="{{ old('discount', $product->discount) }}">
        </div>

        <div style="margin-top:10px;">
            <label>Harga Baru:</label><br>
            <input type="number" step="0.01" id="price" name="price" value="{{ old('price', $product->price) }}"
                readonly>
        </div>

        <div style="margin-top:10px;">
            <label>Level:</label><br>
            <select name="level" required>
                <option value="flagship" {{ $product->level == 'flagship' ? 'selected' : '' }}>Flagship</option>
                <option value="high range" {{ $product->level == 'high range' ? 'selected' : '' }}>High Range</option>
                <option value="mid range" {{ $product->level == 'mid range' ? 'selected' : '' }}>Mid Range</option>
                <option value="entry level" {{ $product->level == 'entry level' ? 'selected' : '' }}>Entry Level</option>
            </select>
        </div>

        <div style="margin-top:10px;">
            <label>Stock:</label><br>
            <select name="stock" required>
                <option value="tersedia" {{ $product->stock == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="habis" {{ $product->stock == 'habis' ? 'selected' : '' }}>Habis</option>
            </select>
        </div>

        <div style="margin-top:10px;">
            <label>Spesifikasi:</label><br>
            <textarea name="specs">{{ old('specs', $product->specs) }}</textarea>
        </div>

        <div style="margin-top:10px;">
            <label>Gambar:</label><br>
            @if ($product->image)
                <img src="{{ asset($product->image) }}" width="100" style="margin-bottom:10px;">
            @endif
            <input type="file" name="image">
        </div>

        <button type="submit" class="btn btn-success" style="margin-top:15px;">Update</button>
        <a href="{{ route('admin.product.index', ['category' => $product->category]) }}" class="btn btn-warning">Batal</a>
    </form>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const oldPrice = document.getElementById("old_price");
            const discount = document.getElementById("discount");
            const price = document.getElementById("price");
            const section = document.getElementById("section");

            function calculatePrice() {
                let oldVal = parseFloat(oldPrice.value) || 0;
                let discVal = parseFloat(discount.value) || 0;
                if (oldVal > 0 && discVal > 0) {
                    let newPrice = oldVal - (oldVal * discVal / 100);
                    price.value = Math.round(newPrice);
                }
            }

            function togglePromoFields() {
                if (section.value === "promo") {
                    discount.disabled = false;
                    price.disabled = false;
                    discount.required = true;
                    price.required = true;
                } else {
                    discount.disabled = true;
                    price.disabled = true;
                    discount.required = false;
                    price.required = false;
                    discount.value = "";
                    price.value = "";
                }
            }

            oldPrice.addEventListener("input", calculatePrice);
            discount.addEventListener("input", calculatePrice);
            section.addEventListener("change", togglePromoFields);

            togglePromoFields();
        });
    </script>
@endpush
