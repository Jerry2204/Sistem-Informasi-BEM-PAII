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
            <h4 class="text-blue h4">Tambah Sejarah Kepengurusan BEM KM IT Del</h4>
        </div>
    </div>
    <form wire:submit.prevent="update" enctype="multipart/form-data">
        <div class="form-group row @error('ketua') has-danger @enderror">
            <label class="col-sm-12 col-md-2 col-form-label" for="ketua">Ketua</label>
            <div class="col-sm-12 col-md-10">
                <input wire:model="ketua" class="form-control @error('ketua') form-control-danger @enderror" name="ketua" id="ketua" value="{{ old('ketua') }}" placeholder="ex: John Sianipar" type="text">
                @error('ketua')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row @error('wakil_ketua') has-danger @enderror">
            <label class="col-sm-12 col-md-2 col-form-label" for="wakil_ketua">Wakil Ketua</label>
            <div class="col-sm-12 col-md-10">
                <input wire:model="wakil_ketua" class="form-control @error('wakil_ketua') form-control-danger @enderror" name="wakil_ketua" id="wakil_ketua" value="{{ old('wakil_ketua') }}" placeholder="ex: ex: John Sianipar" type="text">
                @error('wakil_ketua')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row @error('tahun_mulai') has-danger @enderror">
            <label class="col-sm-12 col-md-2 col-form-label" for="tahun_mulai">Tahun Mulai</label>
            <div class="col-sm-12 col-md-10">
                <input wire:model="tahun_mulai" class="form-control @error('tahun_mulai') form-control-danger @enderror" id="tahun_mulai" placeholder="ex: jerryandrianto22@gmail.com" name="tahun_mulai" value="{{ old('tahun_mulai') }}" type="month">
                @error('tahun_mulai')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row @error('tahun_exp') has-danger @enderror">
            <label class="col-sm-12 col-md-2 col-form-label" for="tahun_exp">Tahun Berakhir</label>
            <div class="col-sm-12 col-md-10">
                <input wire:model="tahun_exp" class="form-control @error('tahun_exp') form-control-danger @enderror" id="tahun_exp" name="tahun_exp" value="{{ old('tahun_exp') }}" placeholder="ex: 082276858074" type="month">
                @error('tahun_exp')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
    </form>
</div>
