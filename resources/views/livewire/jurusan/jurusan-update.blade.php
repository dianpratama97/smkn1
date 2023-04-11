<div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="update" method="post">
                <h4 class="text-center">Edit Data</h4>
                <hr>
                <div class="form-group row">
                    <label for="kode" class="col-sm-5 col-form-label">kode jurusan</label>
                    <div class="col-sm-7">
                        <input wire:model="kode" type="text" name=""
                            class="form-control form-control-sm @error('kode') is-invalid @enderror" id="kode"
                            autocomplete="off">
                        @error('kode')
                            <strong class='text-danger'>{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-5 col-form-label">nama jurusan</label>
                    <div class="col-sm-7">
                        <input wire:model="name" type="text" name=""
                            class="form-control form-control-sm @error('name') is-invalid @enderror" id="name"
                            autocomplete="off">
                        @error('name')
                            <strong class='text-danger'>{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bidang_keahlian" class="col-sm-5 col-form-label">bidang keahlian</label>
                    <div class="col-sm-7">
                        <textarea wire:model="bidang_keahlian" type="text" name=""
                            class="form-control @error('bidang_keahlian') is-invalid @enderror" id="bidang_keahlian" autocomplete="off"
                            cols="20" rows="7"></textarea>

                        @error('bidang_keahlian')
                            <strong class='text-danger'>{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bidang_umum" class="col-sm-5 col-form-label">bidang umum</label>
                    <div class="col-sm-7">
                        <textarea wire:model="bidang_umum" type="text" name=""
                            class="form-control @error('bidang_umum') is-invalid @enderror" id="bidang_umum" autocomplete="off" cols="20"
                            rows="7"></textarea>
                        @error('bidang_umum')
                            <strong class='text-danger'>{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bidang_khusus" class="col-sm-5 col-form-label">bidang khusus</label>
                    <div class="col-sm-7">
                        <textarea wire:model="bidang_khusus" type="text" name=""
                            class="form-control @error('bidang_khusus') is-invalid @enderror" id="bidang_khusus" autocomplete="off"
                            cols="20" rows="7"></textarea>
                        @error('bidang_khusus')
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
