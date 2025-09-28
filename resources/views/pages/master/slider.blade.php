@extends('layout.main')

@push('script')
    <script>
        $(document).on('click', '.btn-edit', function() {
            const id = $(this).data('id');
            const status = $(this).data('status'); // Ambil status dari data atribut

            $('#editModal form').attr('action', '{{ route('master.slider.update', '') }}/' + id);
            $('#editModal input:hidden#id').val(id);
            $('#editModal input#nama').val($(this).data('nama'));
            $('#editModal input#judul').val($(this).data('judul'));
            // $('#editModal input#status').val($(this).data('status'));
            $('#editModal input#deskripsi').val($(this).data('deskripsi'));
            $('#editModal select#status').val(status);
            var foto = $(this).data('foto');
            $('#editModal input#foto_lama').val(foto); // Simpan nilai foto lama

            if (foto) {
                $('#foto-preview img').attr('src', '{{ asset('') }}' + foto);
                $('#foto-preview').show();
            } else {
                $('#foto-preview img').attr('src', '');
                $('#foto-preview').hide();
            }

        });
    </script>
@endpush

@section('content')
    <x-breadcrumb :values="[__('Slider')]">
        <button type="button" class="btn btn-primary btn-create" data-bs-toggle="modal" data-bs-target="#createModal">
            {{ __('menu.general.create') }}
        </button>
    </x-breadcrumb>

    <div class="card mb-5">
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>{{ __('Nama Foto') }}</th>
                        <th>{{ __('Judul ') }}</th>
                        <th>{{ __('Deskripsi') }}</th>
                        <th>{{ __('Status') }}</th> <!-- Tambahkan kolom status -->
                        <th>{{ __('Foto') }}</th> <!-- Tambahkan kolom status -->

                        <th>{{ __('menu.general.action') }}</th>
                    </tr>
                </thead>
                @if ($data && $data->count())
                    <tbody>
                        @foreach ($data as $slider)
                            <tr>
                                <td>{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</td>

                                <td>{{ $slider->nama }}</td>
                                <td>{{ $slider->judul }}</td>
                                <td>{{ \Illuminate\Support\Str::words($slider->deskripsi, 10, '...') }}</td>
                                {{-- <td>{{ $slider->status }}</td> --}}
                                <td>
                                    <span class="{{ $slider->status === 'active' ? 'text-success' : 'text-danger' }}">
                                        {{ ucfirst($slider->status) }}
                                    </span>
                                </td>
                                <td>
                                    <img src="{{ $slider->foto_url }}" alt="Foto Slider" style="max-width: 100px;">
                                </td>

                                <td>
                                    <button class="btn btn-info btn-sm btn-edit" data-id="{{ $slider->id_slider }}"
                                        data-nama="{{ $slider->nama }}" data-judul="{{ $slider->judul }}"
                                        data-deskripsi="{{ $slider->deskripsi }}" data-status="{{ $slider->status }}"
                                        data-foto="{{ $slider->foto }}" data-bs-toggle="modal" data-bs-target="#editModal">
                                        {{ __('menu.general.edit') }}
                                    </button>
                                    <form action="{{ route('master.slider.destroy', $slider) }}" class="d-inline"
                                        method="post">
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
                            <td colspan="4" class="text-center">
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
            <form class="modal-content" method="post" action="{{ route('master.slider.store') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalTitle">{{ __('menu.general.create') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <x-input-form name="nama" :label="__('Nama Slider')" />
                    <x-input-form name="judul" :label="__('Judul')" />
                    <div class="form-group">
                        <label for="deskripsi">{{ __('deskripsi') }}</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="{{ __('Masukkan deskripsi') }}">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">{{ __('Status') }}</label>
                        <select name="status" id="status" class="form-control">
                            <option value="active" selected>{{ __('Active') }}</option>
                            <option value="inactive">{{ __('Nonactive') }}</option>
                        </select>
                    </div>
                    <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto"
                                name="foto" />
                            <span class="error invalid-feedback">{{ $errors->first('foto') }}</span>
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

                    <x-input-form name="nama" :label="__('Nama Slider')" id="nama" />
                    <x-input-form name="judul" :label="__('Judul Foto')" id="judul" />
                    <div class="form-group">
                        <label for="deskripsi">{{ __('deskripsi') }}</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="{{ __('Masukkan deskripsi') }}">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">{{ __('Status') }}</label>
                        <select name="status" id="status" class="form-control">
                            <option value="active">{{ __('Active') }}</option>
                            <option value="inactive">{{ __('Nonactive') }}</option>
                        </select>
                    </div>
                    <div class="mb-3" id="foto-preview">
                        <label class="form-label">Foto Saat Ini</label>
                        <div>
                            <img src="" alt="Foto Preview" style="max-width: 500px;">
                        </div>
                    </div>

                    <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                        <div class="mb-3">
                            <label for="foto" class="form-label">Ganti Foto (Opsional)</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto"
                                name="foto">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto</small>
                            <span class="error invalid-feedback">{{ $errors->first('foto') }}</span>
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
