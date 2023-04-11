<div>
    <div class="row">
        <div class="col-md-4">
            @if (session()->has('pesan'))
                <div class="alert alert-success">
                    <i class="fas fa-check"></i> {{ session('pesan') }}
                </div>
            @endif
            @if ($statusUpdate)
                <livewire:agama.agama-update>
                @else
                    <livewire:agama.agama-create>
            @endif
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="text-center">
                            <tr>
                                <th width="7%">No</th>
                                <th>Name</th>
                                <th width="40%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <th class="text-center">{{ $loop->iteration }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td class="text-center">
                                        <button wire:click="getAgama({{ $item->id }})"
                                            class="btn btn-sm kuning">EDIT</button>

                                        <button type="button" wire:click.prevent="hapusKonfirmasi({{ $item->id }})"
                                            class="btn btn-sm btn-primary" data-toggle="modal" data-target="#delete">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-dismiss='modal-delete'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda Yakin ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" wire:click="hapus({{ $idHapus }})"
                        class="btn btn-primary">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('modal-delete', event => {
            $("#delete").modal('hide');
        })
    </script>
</div>
