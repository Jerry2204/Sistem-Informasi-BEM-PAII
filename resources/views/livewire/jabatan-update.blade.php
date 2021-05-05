<div class="pd-20">
    <div class="clearfix pb-4">
        <div class="pull-left">
            <h4 class="text-blue h4">Ubah Jabatan BPH</h4>
        </div>
    </div>
    <form wire:submit.prevent="update">
        <input type="hidden" wire:model="jabatan_id">
        <div class="form-group row @error('nama_jabatan') has-danger @enderror">
            <label class="col-sm-12 col-md-2 col-form-label" for="nama_jabatan">Jabatan</label>
            <div class="col-sm-12 col-md-10">
                <input wire:model="nama_jabatan" class="form-control @error('nama_jabatan') form-control-danger @enderror" type="text" id="nama_jabatan" name="nama_jabatan" value="{{ old('nama_jabatan') }}" placeholder="ex: Ketua">
                @error('nama_jabatan')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
    </form>
</div>
