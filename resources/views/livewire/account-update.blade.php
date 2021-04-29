<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4 mb-30">Pengaturan Akun</h4>
        </div>
    </div>
    <form wire:submit.prevent="store">
        <div class="form-group row @error('email') has-danger @enderror">
            <label class="col-sm-12 col-md-2 col-form-label">Email</label>
            <div class="col-sm-12 col-md-10">
                <input wire:model="email" class="form-control @error('email') form-control-danger @enderror" placeholder="email" type="email">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Password</label>
            <div class="col-sm-12 col-md-10">
                <input wire:model="password" class="form-control" placeholder="Password" type="password">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Konfirmasi Password</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" placeholder="Konfirmasi Password" type="password">
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
