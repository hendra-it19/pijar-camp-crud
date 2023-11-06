@extends('layouts.main')

@section('pages')
    <section class="w-full max-w-md mx-auto my-10 rounded-md shadow-lg p-5">
        <div class="w-full flex flex-row justify-between my-5">
            <h1 class="text-lg font-semibold">Daftar produk</h1>
            <a href="{{ route('produk.create') }}" class="bg-blue-500 rounded py-1 px-3 hover:bg-blue-700">Tambah data</a>
        </div>
        @if ($message = Session::get('success'))
            <div class="my-3 text-black bg-blue-300 rounded-sm p-2">
                {{ $message }}
            </div>
        @endif
        <div class="overflow-x-auto">
            <table class="border-2 border-white">
                <thead class="text-left border-2 border-white">
                    <th class="px-1 py-2">No</th>
                    <th class="px-1 py-2 w-full">Nama Produk</th>
                    <th class="px-1 py-2">Harga</th>
                    <th class="px-1 py-2">Jumlah</th>
                    <th class="px-1 py-2">Action</th>
                </thead>
                <tbody>
                    @php
                        if(Request::get('page')){
                            $no = $dataPerPage * (Request::get('page') - 1);
                        }else{
                            $no = 0;
                        }
                    @endphp
                    @foreach ($data as $produk)
                        <tr>
                            <td class="px-1 py-2">{{ ++$no }}</td>
                            <td class="px-1 py-2 w-full">{{ $produk->nama_produk }}</td>
                            <td class="px-1 py-2">{{ $produk->harga }}</td>
                            <td class="px-1 py-2">{{ $produk->jumlah }}</td>
                            <td class="px-1 py-2">
                                <form action="{{ route('produk.destroy', $produk->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="hover:underline"
                                        onclick="return(confirm('Yakin ingin menghapus data?'))">Hapus</button>
                                </form>
                                <a href="{{route('produk.edit', $produk->id)}}" class="hover:underline">Ubah</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-black text-xs mt-5">
                <div class="text-center text-white">Total : {{ $total }} produk</div>
                {!! $data->withQueryString()->links() !!}
            </div>
        </div>
    </section>
@endsection
