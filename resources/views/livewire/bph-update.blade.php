<div class="pd-20">
    <div class="clearfix pb-4">
        <div class="pull-left">
            <h4 class="text-blue h4">Ubah Badan Pengurus Harian BEM KM IT Del</h4>
        </div>
    </div>
    <form wire:submit.prevent="update">
        @csrf
        <input type="hidden" name="" wire:model="BPHId">
        <div class="form-group row @error('name') has-danger @enderror">
            <label class="col-sm-12 col-md-2 col-form-label" for="name">Nama</label>
            <div class="col-sm-12 col-md-10">
                <input wire:model="name" class="form-control @error('name') form-control-danger @enderror" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Johnny Brown">
                @error('name')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row @error('nim') has-danger @enderror">
            <label class="col-sm-12 col-md-2 col-form-label" for="nim">NIM</label>
            <div class="col-sm-12 col-md-10">
                <input wire:model="nim" class="form-control @error('nim') form-control-danger @enderror" name="nim" id="nim" value="{{ old('nim') }}" placeholder="ex: 11419046" type="text">
                @error('nim')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row @error('email') has-danger @enderror">
            <label class="col-sm-12 col-md-2 col-form-label" for="email">Email</label>
            <div class="col-sm-12 col-md-10">
                <input wire:model="email" class="form-control @error('email') form-control-danger @enderror" id="email" placeholder="ex: jerryandrianto22@gmail.com" name="email" value="{{ old('email') }}" type="email">
                @error('email')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row @error('no_hp') has-danger @enderror">
            <label class="col-sm-12 col-md-2 col-form-label" for="no_hp">No. Hp</label>
            <div class="col-sm-12 col-md-10">
                <input wire:model="no_hp" class="form-control @error('no_hp') form-control-danger @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" placeholder="ex: 082276858074" type="text">
                @error('no_hp')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row @error('alamat') has-danger @enderror">
            <label class="col-sm-12 col-md-2 col-form-label" for="alamat">Alamat</label>
            <div class="col-sm-12 col-md-10">
                <textarea wire:model="alamat" class="form-control @error('alamat') form-control-danger @enderror" id="alamat" name="alamat" value="{{ old('alamat') }}" placeholder="ex: Huta II Jl.Protokol Marihat Bandar, Kab. Simalungun, Sumatera Utara" type="text"></textarea>
                @error('alamat')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row @error('jenis_kelamin') has-danger @enderror">
            <label class="col-sm-12 col-md-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-12 col-md-10">
                <select wire:model="jenis_kelamin" name="jenis_kelamin" class="custom-select col-12 @error('jenis_kelamin') form-control-danger @enderror">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                @error('jenis_kelamin')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row @error('program_studi_id') has-danger @enderror">
            <label class="col-sm-12 col-md-2 col-form-label">Program Studi</label>
            <div class="col-sm-12 col-md-10">
                <select wire:model="program_studi_id" name="program_studi_id" class="custom-select col-12 @error('program_studi_id') form-control-danger @enderror">
                    <option value="">Pilih Program Studi</option>
                    @foreach ($programStudi as $ps)
                    <option value="{{ $ps->id }}">{{ $ps->nama_program_studi }}</option>
                    @endforeach
                </select>
                @error('program_studi_id')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
    </form>
</div>
