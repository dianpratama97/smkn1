<div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="store" method="post">
                <h4 class="text-center">Tambah Data</h4>
                <hr>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Agama</label>
                    <div class="col-sm-9">
                        <input wire:model="name" type="text" name=""
                            class="form-control form-control-sm @error('name') is-invalid @enderror" id="name"
                            autocomplete="off">
                        @error('name')
                            <strong class='text-danger'>{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="text-center">
                    <button type="submit" class="btn btn-sm btn-success">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>
