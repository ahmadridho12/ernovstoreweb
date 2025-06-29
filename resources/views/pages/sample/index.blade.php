@extends('layout.main')

@push('script')
<script>
    $(document).on('click', '.btn-edit', function () {
        const id = $(this).data('id');
        $('#editModal form').attr('action', '{{ route('sample.colors.update', '') }}/' + id);
        $('#editModal input:hidden#id').val(id);

        // Set input kode_sample
        $('#editModal input#kode_sample').val($(this).data('kode_sample'));

        // Set select status
        $('#editModal select#status').val($(this).data('status'));

        // Foto utama
        var foto = $(this).data('foto');
        $('#editModal input#foto_lama').val(foto); // Simpan nilai foto lama

        if(foto) {
            $('#foto-preview img').attr('src', '/' + foto); // jika foto path dari root public
            $('#foto-preview').show();
        } else {
            $('#foto-preview img').attr('src', '');
            $('#foto-preview').hide();
        }

    });
</script>
@endpush


@section('content')
    <x-breadcrumb
        :values="[__('Sample Color')]">
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
    <tr>
        <th>No</th>
        <th>{{ __('Kode Sample') }}</th>
        <th>{{ __('Status') }}</th>
        <th>{{ __('Foto') }}</th>
        <th>{{ __('menu.general.action') }}</th>
    </tr>
    </thead>
    @if($data && $data->count())
        <tbody>
        @foreach($data as $sample)
            <tr>
                <td>{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</td>
                <td>{{ $sample->kode_sample }}</td>
                <td>
                    @if($sample->status === \App\Enums\Status::ACTIVE)
                        <span class="badge bg-success">{{ $sample->status->value }}</span>
                    @else
                        <span class="badge bg-danger">{{ $sample->status->value }}</span>
                    @endif
                </td>

                <td>
                    @if($sample->foto)
                        <img src="{{ asset($sample->foto) }}" alt="Foto Sample" style="max-width: 100px;">
                    @else
                        <span class="text-muted">Tidak ada foto</span>
                    @endif
                </td>
                <td>
                    <button class="btn btn-info btn-sm btn-edit"
                            data-id="{{ $sample->id_sample_color }}"
                            data-kode_sample="{{ $sample->kode_sample }}"
                            data-status="{{ $sample->status }}"
                            data-foto="{{ $sample->foto }}"
                            data-bs-toggle="modal"
                            data-bs-target="#editModal">
                        {{ __('menu.general.edit') }}
                    </button>
                    <form action="{{ route('sample.colors.destroy', $sample) }}" class="d-inline" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm btn-delete" type="button">
                            {{ __('menu.general.delete') }}
                        </button>
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
        <form class="modal-content" method="post" action="{{ route('sample.colors.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Create Sample Color') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <x-input-form name="kode_sample" :label="__('Kode Sample')"/>

                <div class="mb-3">
                    <label for="status" class="form-label">{{ __('Status') }}</label>
                    <select name="status" id="status" class="form-select">
                        <option value="Available">Available</option>
                        <option value="Unavailable">Unavailable</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto"/>
                    <span class="error invalid-feedback">{{ $errors->first('foto') }}</span>
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
                <h5 class="modal-title">{{ __('Edit Sample Color') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <input type="hidden" name="id" id="id" value="">
                <input type="hidden" name="foto_lama" id="foto_lama" value="">

                <x-input-form name="kode_sample" :label="__('Kode Sample')" id="kode_sample"/>

                <div class="mb-3">
                    <label for="status" class="form-label">{{ __('Status') }}</label>
                    <select name="status" id="status" class="form-select">
                        <option value="Available">Available</option>
                        <option value="Unavailable">Unavailable</option>
                    </select>
                </div>

                <!-- Preview foto -->
                <div class="mb-3" id="foto-preview">
                    <label class="form-label">Foto Saat Ini</label>
                    <div>
                        <img src="" alt="Foto Preview" style="max-width: 500px;">
                    </div>
                </div>

                <!-- Input ganti foto -->
                <div class="mb-3">
                    <label for="foto" class="form-label">Ganti Foto (Opsional)</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto</small>
                    <span class="error invalid-feedback">{{ $errors->first('foto') }}</span>
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