<div class="pd-20">
    <div class="clearfix pb-4">
        <div class="pull-left">
            <h4 class="text-blue h4">Ubah Kategori Blog</h4>
        </div>
    </div>
    <form wire:submit.prevent="update">
        <input type="hidden" wire:model="nama_kategori">
        <div class="form-group row @error('nama_kategori') has-danger @enderror">
            <label class="col-sm-12 col-md-2 col-form-label" for="nama_kategori">Nama Kategori</label>
            <div class="col-sm-12 col-md-10">
                <input wire:model="nama_kategori" class="form-control @error('nama_kategori') form-control-danger @enderror" type="text" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}" placeholder="S1 ********">
                @error('nama_kategori')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
    </form>
</div>
