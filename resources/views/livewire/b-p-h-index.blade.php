<div class="pd-20">
    @if (session()->has('message'))
    <script>
        swal({
            position: 'top-end',
            showConfirmButton: false,
            timer: 1500,
            title: "Sukses",
            text: "{{ session('message') }}",
            type: 'success',
        })
    </script>
    @endif
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="text-blue h4">Daftar BPH</h4>
            <p>Berikut ini merupakan daftar Badan Pengurus Harian Badan Eksekutif Mahasiswa Institut Teknologi Del</p>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">NIM</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">No. HP</th>
                <th scope="col">Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bphs as $bph)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $bph->user->name }}</td>
                <td>{{ $bph->nim }}</td>
                <td>{{ $bph->jenis_kelamin }}</td>
                <td>{{ $bph->no_hp }}</td>
                <td>{{ $bph->alamat }}</td>
                <td>
                    <span class="badge badge-primary">Primary</span>
                </td>
            </tr>
            @endforeach
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td><span class="badge badge-secondary">Secondary</span></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td><span class="badge badge-success">Success</span></td>
            </tr>
        </tbody>
    </table>
</div>
