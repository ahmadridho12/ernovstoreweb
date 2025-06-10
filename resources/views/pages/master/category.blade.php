@extends('layout.main')

@push('script')
    <script>
        $(document).on('click', '.btn-edit', function () {
    const id = $(this).data('id');
    $('#editModal form').attr('action', '{{ route('master.category.update', '') }}/' + id);
    $('#editModal input:hidden#id').val(id);
    $('#editModal input#nama').val($(this).data('nama'));
    $('#editModal input#judul').val($(this).data('judul'));
    
    var foto = $(this).data('foto');
    $('#editModal input#foto_lama').val(foto); // Simpan nilai foto lama
    
    if(foto) {
        $('#foto-preview img').attr('src', '{{ asset('storage') }}/' + foto);
        $('#foto-preview').show();
    } else {
        $('#foto-preview img').attr('src', '');
        $('#foto-preview').hide();
    }
    
    // Tambahkan preview untuk foto_sampul
    var fotoSampul = $(this).data('foto_sampul');
    $('#editModal input#foto_sampul_lama').val(fotoSampul); // Simpan nilai foto_sampul lama
    
    if(fotoSampul) {
        $('#foto-sampul-preview img').attr('src', '{{ asset('storage') }}/' + fotoSampul);
        $('#foto-sampul-preview').show();
    } else {
        $('#foto-sampul-preview img').attr('src', '');
        $('#foto-sampul-preview').hide();
    }
});

    </script>
@endpush

@section('content')
    <x-breadcrumb
        :values="[__('Category')]">
        <button
            type="button"
            class="btn btn-primary btn-create"
            data-bs-toggle="modal"
            data-bs-target="#createModal">
            {{ __('menu.general.create') }}
        </button>
    </x-breadcrumb>

    <div class="card mb-5">
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                <tr><th>No</th>
                    <th>{{ __('Nama ') }}</th>
                    <th>{{ __('Judul ') }}</th>
                    <th>{{ __('Foto') }}</th>
                    <th>{{ __('Foto_Sampul') }}</th>
                    <th>{{ __('menu.general.action') }}</th>
                </tr>
                </thead>
                @if($data && $data->count())
                    <tbody>
                    @foreach($data as $category)
                        <tr>
                            <td>{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</td>
                            <td>{{ $category->nama }}</td>
                            <td>{{ $category->judul }}</td>
                            <td>
                                @if($category->foto)
                                    <img src="{{ asset('storage/' . $category->foto) }}" alt="Foto Category" style="max-width: 100px;">
                                @else
                                    <span class="text-muted">Tidak ada foto</span>
                                @endif
                            </td>
                            <td>
                                @if($category->foto_sampul)
                                    <img src="{{ asset('storage/' . $category->foto_sampul) }}" alt="Foto Category" style="max-width: 100px;">
                                @else
                                    <span class="text-muted">Tidak ada foto</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-info btn-sm btn-edit"
                                        data-id="{{ $category->id_category }}"
                                        data-nama="{{ $category->nama }}"
                                        data-judul="{{ $category->judul }}"
                                        data-foto="{{ $category->foto }}" 
                                        data-foto_sampul="{{ $category->foto_sampul }}" 
                                        data-bs-toggle="modal"
                                        data-bs-target="#editModal">
                                    {{ __('menu.general.edit') }}
                                </button>
                                <form action="{{ route('master.category.destroy', $category) }}" class="d-inline" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm btn-delete"
                                            type="button">{{ __('menu.general.delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                @else
                    <tbody>
                    <tr>
                        <td colspan="5" class="text-center">
                            {{ __('menu.general.empty') }}
                        </td>
                    </tr>
                    </tbody>
                @endif
            </table>
        </div>
    </div>

    {!! $data->appends(['search' => $search])->links() !!} 

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" method="post" action="{{ route('master.category.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalTitle">{{ __('menu.general.create') }}</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <x-input-form name="nama" :label="__('Name Category')"/>
                    <x-input-form name="judul" :label="__('Judul')"/>                 
                    <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto"/>
                            <span class="error invalid-feedback">{{ $errors->first('foto') }}</span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                        <div class="mb-3">
                            <label for="foto_sampul" class="form-label">Foto</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto_sampul" name="foto_sampul"/>
                            <span class="error invalid-feedback">{{ $errors->first('foto_sampul') }}</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        {{ __('menu.general.cancel') }}
                    </button>
                    <button type="submit" class="btn btn-primary">{{ __('menu.general.save') }}</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
<div class="modal fade" id="editModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="post" action="" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title" id="editModalTitle">{{ __('menu.general.edit') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <input type="hidden" name="id" id="id" value="">
                <input type="hidden" name="foto_lama" id="foto_lama" value="">
                <!-- Tambahan untuk menyimpan foto_sampul lama -->
                <input type="hidden" name="foto_sampul_lama" id="foto_sampul_lama" value="">
                
                <x-input-form name="nama" :label="__('Name Category')" id="nama"/>
                <x-input-form name="judul" :label="__('Judul Foto')" id="judul"/>
                
                <!-- Preview foto -->
                <div class="mb-3" id="foto-preview">
                    <label class="form-label">Foto Saat Ini</label>
                    <div>
                        <img src="" alt="Foto Preview" style="max-width: 500px;">
                    </div>
                </div>
                
                <!-- Input ganti foto -->
                <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                    <div class="mb-3">
                        <label for="foto" class="form-label">Ganti Foto (Opsional)</label>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto</small>
                        <span class="error invalid-feedback">{{ $errors->first('foto') }}</span>
                    </div>
                </div>
                
                <!-- Preview foto_sampul -->
                <div class="mb-3" id="foto-sampul-preview">
                    <label class="form-label">Foto Sampul Saat Ini</label>
                    <div>
                        <img src="" alt="Foto Sampul Preview" style="max-width: 500px;">
                    </div>
                </div>
                
                <!-- Input ganti foto_sampul -->
                <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                    <div class="mb-3">
                        <label for="foto_sampul" class="form-label">Ganti Foto Sampul (Opsional)</label>
                        <input type="file" class="form-control @error('foto_sampul') is-invalid @enderror" id="foto_sampul" name="foto_sampul">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto sampul</small>
                        <span class="error invalid-feedback">{{ $errors->first('foto_sampul') }}</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    {{ __('menu.general.cancel') }}
                </button>
                <button type="submit" class="btn btn-primary">{{ __('menu.general.update') }}</button>
            </div>
        </form>
    </div>
</div>

@endsection