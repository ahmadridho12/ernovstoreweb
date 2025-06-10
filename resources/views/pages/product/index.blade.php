@extends('layout.main')

@section('content')
    <x-breadcrumb :values="[__('Product'), __('List Product')]">
        <a href="{{ route('product.product.create') }}" class="btn btn-primary">
            {{ __('Tambah Product') }}
        </a>
    </x-breadcrumb>

    <div class="row">
        @foreach($data as $product)
            {{-- <div class="col-sm-6 col-md-4 col-lg-3 mb-4"> --}}
                <x-product-card :product="$product" />
            {{-- </div> --}}
        @endforeach
    </div>
    
      

    {!! $data->appends(['search' => $search])->links() !!}
@endsection
