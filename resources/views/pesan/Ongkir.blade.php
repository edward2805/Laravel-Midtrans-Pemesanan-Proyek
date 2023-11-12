<!-- @extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-4">
        <main class="form-regristrasi w-100 m-auto">
        <h1 class="h3 mb-3 fw-normal text-center">Tambah Ongkir</h1>
            <form action="" method="get">  
            @csrf
                <label for="provinsi">{{ ('Silahkan Pilih Provinsi Anda') }}</label>

                <select name="provinsi" id="provinsi" class="form-control">
                    <option value="0">-PILIH PROVINSI-</option>
                    @forelse($daftarProvinsi as $p)
                    <option value="{{ $p['province_id'] }}">{{ $p['province'] }}</option>
                    @empty
                    <option value="0">-TIDAK ADA-</option>
                    @endforelse
                </select>

                <label for="kota">{{ ('Silahkan Pilih Kota Anda') }}</label>

                <select name="kota" id="kota" class="form-control">
                    <option value="0">-PILIH KOTA-</option>
                    @if($provinsi_id)
                    @forelse($daftarKota as $k)
                    <option value="{{ $k['city_id'] }}">{{ $k['city_name'] }}</option>
                    @empty
                    <option value="0">-TIDAK ADA-</option>
                    @endforelse
                    @endif
                </select>

                <label for="jasa">{{ ('Jasa Pengiriman') }}</label>

                <select name="jasa" id="jasa" class="form-control">
                    <option value="">-PILIH JASA-</option>
                    <option value="jne">JNE</option>
                    <option value="pos">POS</option>
                    <option value="tiki">TIKI</option>
                </select>
                
                
                <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Lihat Daftar Ongkir</button>
            </form>
        </main>
    </div>
</div>


@endsection -->