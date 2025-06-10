@extends('layout.main')

@section('content')
    <x-breadcrumb :values="[__('Detail Produk'), $product->nama]" />

    <div class="card mb-4">
        <div class="card-header">
            <h5>{{ $product->nama }}</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Kolom foto produk -->
                <div class="col-md-6">
                    @if($product->photos->count())
                        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($product->photos as $key => $photo)
                                    <div class="carousel-item @if($key == 0) active @endif">
                                        <img src="{{ asset('storage/' . $photo->foto) }}" class="d-block w-100" alt="{{ $product->nama }}" style="object-fit: cover; height: 300px;">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">{{ __('Previous') }}</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">{{ __('Next') }}</span>
                            </button>
                        </div>
                    @else
                        <img src="https://via.placeholder.com/400x300?text=No+Image" alt="{{ $product->nama }}" class="img-fluid">
                    @endif
                </div>

                <!-- Kolom detail produk -->
                <div class="col-md-6">
                    <p><strong>{{ __('Harga') }}:</strong> ${{ number_format($product->harga, 2) }}</p>
                    <p><strong>{{ __('Subjudul') }}:</strong> {{ $product->subjudul ?? '-' }}</p>
                    <p><strong>{{ __('Deskripsi') }}:</strong> {{ $product->deskripsi ?? '-' }}</p>
                    <p><strong>{{ __('Berat') }}:</strong> {{ $product->berat ?? '-' }} kg</p>
                    <p><strong>{{ __('Dimensi') }}:</strong> {{ $product->dimensi ?? '-' }}</p>
                    <p><strong>{{ __('Material') }}:</strong> {{ $product->material ?? '-' }}</p>
                    <p><strong>{{ __('Warna') }}:</strong> {{ $product->color ?? '-' }}</p>
                    <p><strong>{{ __('Ukuran') }}:</strong> {{ $product->size ?? '-' }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('product.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
            <a href="{{ route('product.edit', $product->id_produk) }}" class="btn btn-primary">{{ __('Edit') }}</a>
        </div>
    </div>
@endsection
