@extends('layout.main')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Ketika tombol "Add Photo" diklik
        $('#add-photo').click(function () {
            let index = $('#photo-input-container .input-group').length; // menghitung jumlah input yang ada
            let inputHtml = `
                <div class="input-group mb-2">
                    <input type="file" class="form-control" name="fotos[]" />
                    <button type="button" class="btn btn-danger remove-photo">Remove</button>
                </div>`;
            $('#photo-input-container').append(inputHtml);
        });

        // Hapus input file jika tombol "Remove" diklik
        $(document).on('click', '.remove-photo', function () {
            $(this).closest('.input-group').remove();
        });
    });
</script>

@section('content')
    <x-breadcrumb
        :values="[__('Tambah Produk')]">
    </x-breadcrumb>

    <div class="card mb-4">
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">
                <!-- Pilih Kategori -->
                <div class="col-sm-12 col-12 col-md-6 col-lg-3">
                    <label for="kategori_id" class="form-label">{{ __('Kategori') }}</label>
                    <select name="kategori_id" id="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id_category }}">{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Nama Produk -->
                <div class="col-sm-12 col-12 col-md-6 col-lg-3">
                    <x-input-form name="nama" :label="__('Nama Produk')"/>
                </div>

                <!-- Harga -->
                <div class="col-sm-12 col-12 col-md-6 col-lg-3">
                    <x-input-form name="harga" :label="__('Harga')" type="number" step="0.01"/>
                </div>

                <!-- Subjudul -->
                <div class="col-sm-12 col-12 col-md-6 col-lg-3">
                    <x-input-form name="subjudul" :label="__('Subjudul')"/>
                </div>

                <!-- Deskripsi -->
                <div class="col-sm-12 col-12 col-md-6 col-lg-12">
                    <label for="deskripsi" class="form-label">{{ __('Deskripsi') }}</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3"></textarea>
                    @error('deskripsi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Berat -->
                <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                    <x-input-form name="berat" :label="__('Berat (kg)')" type="number" step="0.01"/>
                </div>

                <!-- Dimensi -->
                <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                    <x-input-form name="dimensi" :label="__('Dimensi')"/>
                </div>

                <!-- Material -->
                <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                    <x-input-form name="material" :label="__('Material')"/>
                </div>

                <!-- Warna -->
                <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                    <x-input-form name="color" :label="__('Warna')"/>
                </div>

                <!-- Ukuran -->
                <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                    <x-input-form name="size" :label="__('Ukuran')"/>
                </div>

                <!-- Foto Produk (dinamis) -->
            <div class="col-sm-12 col-12 col-md-6 col-lg-12">
                <label for="fotos" class="form-label">{{ __('Foto Produk') }}</label>
                <div id="photo-input-container">
                    <div class="input-group mb-2">
                        <input type="file" class="form-control @error('fotos.0') is-invalid @enderror" name="fotos[]" />
                        <button type="button" class="btn btn-danger remove-photo">Remove</button>
                    </div>
                </div>
                <button type="button" id="add-photo" class="btn btn-secondary btn-sm">Add Photo</button>
                @error('fotos.*')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            </div>
            <div class="card-footer pt-0">
                <button class="btn btn-primary" type="submit">{{ __('menu.general.save') }}</button>
            </div>
        </form>
    </div>
@endsection

