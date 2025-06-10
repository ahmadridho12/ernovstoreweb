<div class="col-md-3 mb-2">
    <div class="card border-1" style="width: 100%;">
        <!-- Foto Produk -->
        <img src="{{ asset('storage/' . $product->photos->first()->foto) }}"
             class="card-img-top"
             alt="{{ $product->nama }}"
             style="object-fit: cover; height: 150px;">

        <div class="card-body text-left p-2">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Nama Produk -->
                <h5 class="card-title mb-1">{{ $product->nama }}</h5>

                <!-- Dropdown -->
                <div class="dropdown d-inline-block">
                    <button class="btn p-0" type="button" id="dropdown-{{ $product->id_produk }}"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end"
                         aria-labelledby="dropdown-{{ $product->id_produk }}">
                        <a class="dropdown-item" href="{{ route('product.show', $product->id_produk) }}">
                            {{ __('menu.general.view') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('product.edit', $product->id_produk) }}">
                            {{ __('edit') }}
                        </a>
                        <form action="{{ route('product.destroy', $product->id_produk) }}" class="d-inline"
                              method="post">
                            @csrf
                            @method('DELETE')
                            <span class="dropdown-item cursor-pointer btn-delete">
                                {{ __('menu.general.delete') }}
                            </span>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Harga Produk -->
            <p class="mb-2 text-muted">
                @if ($product->status == 'active' && $product->harga_diskon)
                    <span class="text-danger fw-bold" style="font-size: 0.9rem;">
                        ${{ number_format($product->harga_diskon, 2) }}
                    </span>
                    <span class="text-muted text-decoration-line-through ms-1">
                        ${{ number_format($product->harga, 2) }}
                    </span>
                @else
                    <span style="font-size: 1rem;">
                        ${{ number_format($product->harga, 2) }}
                    </span>
                @endif
            </p>
        </div>
    </div>
</div>
