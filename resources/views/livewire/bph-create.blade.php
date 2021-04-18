<div class="pd-20">
    <div class="clearfix pb-4">
        <div class="pull-left">
            <h4 class="text-blue h4">Tambah Badan Pengurus Harian BEM KM IT Del</h4>
        </div>
    </div>
    <form wire:submit.prevent="store">
        @csrf
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label" for="name">Nama</label>
            <div class="col-sm-12 col-md-10">
                <input wire:model="name" class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Johnny Brown">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label" for="nim">NIM</label>
            <div class="col-sm-12 col-md-10">
                <input wire:model="nim" class="form-control" name="nim" id="nim" value="{{ old('nim') }}" placeholder="ex: 11419046" type="text">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label" for="email">Email</label>
            <div class="col-sm-12 col-md-10">
                <input wire:model="email" class="form-control" id="email" placeholder="ex: jerryandrianto22@gmail.com" name="email" value="{{ old('email') }}" type="email">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label" for="no_hp">No. Hp</label>
            <div class="col-sm-12 col-md-10">
                <input wire:model="no_hp" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" placeholder="ex: 082276858074" type="text">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label" for="alamat">Alamat</label>
            <div class="col-sm-12 col-md-10">
                <textarea wire:model="alamat" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" placeholder="ex: Huta II Jl.Protokol Marihat Bandar, Kab. Simalungun, Sumatera Utara" type="text"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Select</label>
            <div class="col-sm-12 col-md-10">
                <select wire:model="jenis_kelamin" name="jenis_kelamin" class="custom-select col-12">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Tambah</button>
            <div class="max-width-200 mx-auto">
                <button type="button" class="btn mb-20 btn-primary btn-block" id="sa-success">Click me</button>
            </div>
        </div>
    </form>
</div>
