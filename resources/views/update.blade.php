@extends('layouts.main')

@section('pages')
    <section class="w-full max-w-md mx-auto my-10 rounded-md shadow-lg p-5">
        <h1 class="my-5 text-lg font-semibold">Tambah data</h1>
        <form action="{{ route('produk.update', $produk->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="mb-3 flex flex-col gap-1">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" name="nama_produk" id="nama_produk"
                    class="text-black px-1 border-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 @error('nama_produk') border-red-500 @enderror"
                    value="{{ old('nama_produk', $produk->nama_produk) }}">
                @error('nama_produk')
                    <small class="text-red-500">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="mb-3 flex flex-col gap-1">
                <label for="harga">Harga</label>
                <input type="number" name="harga" id="harga"
                    class="text-black px-1 border-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 @error('harga') border-red-500 @enderror"
                    value="{{ old('harga', $produk->harga) }}">
                @error('harga')
                    <small class="text-red-500">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="mb-3 flex flex-col gap-1">
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah"
                    class="text-black px-1 border-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 @error('jumlah') border-red-500 @enderror"
                    value="{{ old('jumlah', $produk->jumlah) }}">
                @error('jumlah')
                    <small class="text-red-500">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="mb-3 flex flex-col gap-1">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" rows="5"
                    class="text-black px-1 border-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 @error('keterangan') border-red-500 @enderror">{{ old('keterangan', $produk->keterangan) }}</textarea>
                @error('keterangan')
                    <small class="text-red-500">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <a href="{{ route('produk.index') }}" type="reset"
                class="w-full bg-white text-center text-red-500 border-red-500 border-2 rounded p-1 my-3 hover:bg-red-500 focus:bg-red-500 active:bg-red-600 focus:text-white active:text-white hover:text-white">Batal</a>
            <button type="submit"
                class="w-full bg-blue-400 rounded p-1 hover:bg-blue-600 focus:bg-blue-600 active:bg-blue-700">Simpan</button>
        </form>
    </section>
@endsection
