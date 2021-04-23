<div class="pd-20">
    @if (session()->has('message'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Sukses',
            text: "{{ session('message') }}",
            showConfirmButton: false,
            timer: 1500
        })
    </script>
    @endif
    <div class="clearfix pb-4">
        <div class="pull-left">
            <h4 class="text-blue h4">Tambah Kategori Blog</h4>
        </div>
    </div>
    <form wire:submit.prevent="store">
        <div class="form-group row @error('nama_kategori') has-danger @enderror">
            <label class="col-sm-12 col-md-2 col-form-label" for="nama_kategori">Nama Kategori</label>
            <div class="col-sm-12 col-md-10">
                <input wire:model="nama_kategori" class="form-control @error('nama_kategori') form-control-danger @enderror" type="text" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}" placeholder="ex: Pendidikan">
                @error('nama_kategori')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
</div>
