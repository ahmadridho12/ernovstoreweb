@extends('layout.main')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#add-photo').click(function () {
            let index = $('#photo-input-container .input-group').length;
            let inputHtml = 
                <div class="input-group mb-2">
                    <input type="file" class="form-control" name="fotos[]" />
                    <button type="button" class="btn btn-danger remove-photo">Remove</button>
                </div>;
            $('#photo-input-container').append(inputHtml);
        });

        $(document).on('click', '.remove-photo', function () {
            $(this).closest('.input-group').remove();
        });
    });
</script>

@section('content')
    <x-breadcrumb :values="[__('Edit Produk'), $product->nama]" />

    <!-- Form Update Produk -->
    <div class="card mb-4">
        <form action="{{ route('product.update', $product->id_produk) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body row">
                <!-- Pilih Kategori -->
                <div class="col-sm-12 col-12 col-md-6 col-lg-3">
                    <label for="kategori_id" class="form-label">{{ __('Kategori') }}</label>
                    <select name="kategori_id" id="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id_category }}" @if($kategori->id_category == $product->kategori_id) selected @endif>
                                {{ $kategori->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Nama Produk -->
                <div class="col-sm-12 col-12 col-md-6 col-lg-3">
                    <x-input-form name="nama" :label="__('Nama Produk')" :value="$product->nama"/>
                </div>

                <!-- Harga -->
                <div class="col-sm-12 col-12 col-md-6 col-lg-3">
                    <x-input-form name="harga" :label="__('Harga')" type="number" step="0.01" :value="$product->harga"/>
                </div>

              <!-- Harga Diskon -->
        <div class="col-sm-12 col-md-6 col-lg-3">
            <x-input-form name="harga_diskon" :label="__('Harga Diskon')" type="number" step="0.01" :value="$product->harga_diskon ?? ''"/>
        </div>

        <!-- Status Diskon -->
        <div class="col-sm-12 col-md-6 col-lg-3">
            <label for="status" class="form-label">{{ __('Status Diskon') }}</label>
            <select name="status" id="status" class="form-control">
                <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Aktif</option>
                <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>

                <!-- Subjudul -->
                <div class="col-sm-12 col-12 col-md-6 col-lg-3">
                    <x-input-form name="subjudul" :label="__('Subjudul')" :value="$product->subjudul"/>
                </div>
                <br>
                <!-- Deskripsi -->
                <div class="col-sm-12 col-12 col-md-6 col-lg-12">
                    <label for="deskripsi" class="form-label">{{ __('Deskripsi') }}</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{ $product->deskripsi }}</textarea>
                    @error('deskripsi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <br>
                <!-- Berat -->
                <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                    <x-input-form name="berat" :label="__('Berat (kg)')" type="number" step="0.01" :value="$product->berat"/>
                </div>

                <!-- Dimensi -->
                <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                    <x-input-form name="dimensi" :label="__('Dimensi')" :value="$product->dimensi"/>
                </div>

                <!-- Material -->
                <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                    <x-input-form name="material" :label="__('Material')" :value="$product->material"/>
                </div>

                <!-- Warna -->
                <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                    <x-input-form name="color" :label="__('Warna')" :value="$product->color"/>
                </div>

                <!-- Ukuran -->
                <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                    <x-input-form name="size" :label="__('Ukuran')" :value="$product->size"/>
                </div>

                <!-- Input File Baru (untuk upload tambahan) -->
                <div class="col-sm-12 col-12 col-md-6 col-lg-12">
                    <label for="fotos" class="form-label">{{ __('Foto Produk') }}</label>
                    <div id="photo-input-container">
                        <div class="input-group mb-2">
                            <input type="file" class="form-control" name="fotos[]" />
                            <button type="button" class="btn btn-danger remove-photo">Remove</button>
                        </div>
                    </div>
                    <button type="button" id="add-photo" class="btn btn-secondary btn-sm">Add Photo</button>
                </div>
            </div>
            <div class="card-footer pt-0">
                <button class="btn btn-primary" type="submit">{{ __('menu.general.save') }}</button>
            </div>
        </form>
    </div>

    <!-- Preview Foto Lama dengan Form Hapus (di luar form update) -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Foto yang Ada</h5>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($product->photos as $photo)
                    <div class="col-md-3 mb-2">
                        <img src="{{ asset($photo->foto) }}" class="img-thumbnail" style="height: 100px; object-fit: cover;" alt="Photo">
                        <form action="{{ route('product.photo.destroy', ['id' => $product->id_produk, 'photoId' => $photo->id]) }}" method="POST" class="mt-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection 