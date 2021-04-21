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
            <h4 class="text-blue h4">Tambah Program Studi IT Del</h4>
        </div>
    </div>
    <form wire:submit.prevent="store">
        <div class="form-group row @error('nama_program_studi') has-danger @enderror">
            <label class="col-sm-12 col-md-2 col-form-label" for="nama_program_studi">Nama Program Studi</label>
            <div class="col-sm-12 col-md-10">
                <input wire:model="nama_program_studi" class="form-control @error('nama_program_studi') form-control-danger @enderror" type="text" id="nama_program_studi" name="nama_program_studi" value="{{ old('nama_program_studi') }}" placeholder="S1 ********">
                @error('nama_program_studi')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
</div>
