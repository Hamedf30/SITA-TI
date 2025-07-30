@extends('layout.template')

@section('main')
    <h1 class="title">
        <i class="bi bi-plus-circle-fill"></i> Tentukan Pembimbing
    </h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li><i class="bi bi-exclamation-circle-fill"></i> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('mhs_pkl.tentukanPembimbing', $pkl->id_pkl) }}">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="id_bidang" class="form-label">Bidang Keahlian:</label>
            <select class="form-select" id="id_bidang" name="id_bidang" required>
                <option value="">Pilih bidang</option>
                @foreach ($bidangs as $bidang)
                    <option value="{{ $bidang->id_bidang }}">{{ $bidang->bidang }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="dosen_pembimbing" class="form-label">Pembimbing 1:</label>
            <select class="form-select" id="dosen_pembimbing" name="dosen_pembimbing" required>
                <option value="">Pilih Pembimbing 1</option>
            </select>
        </div>

        {{-- <div class="mb-3">
            <label for="keterangan" class="form-label">keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" rows="3" placeholder="Masukkan keterangan"
                required></textarea>
            @error('keterangan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div> --}}

        <div class="mb-3 row">
            <div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#id_bidang').change(function() {
                var id_bidang = $(this).val();
                if (id_bidang) {
                    $.ajax({
                        url: '/mhs_pkl/getdosen/' + id_bidang, // Pastikan URL ini benar
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#dosen_pembimbing')
                                .empty(); // Kosongkan dropdown dosen_pembimbing
                            $('#dosen_pembimbing').append(
                                '<option value="">Pilih Dosen</option>'
                            ); // Tambahkan opsi default
                            $.each(data, function(key, value) {
                                $('#dosen_pembimbing').append(
                                    '<option value="' + value.id_dosen + '">' +
                                    value.nama + '</option>'
                                ); // Sesuaikan dengan field nama dosen
                            });
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText); // Tampilkan kesalahan di konsol
                        }
                    });
                } else {
                    $('#dosen_pembimbing')
                        .empty(); // Kosongkan dropdown jika tidak ada bidang yang dipilih
                    $('#dosen_pembimbing').append('<option value="">Pilih Dosen</option>');
                }
            });
        });
    </script>
@endsection
