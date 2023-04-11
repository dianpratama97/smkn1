<div class="card mb-4">
    <div class="card-header">
        <b>Berita Terbaru</b>
    </div>
    <div class="card-body">
       
    </div>
</div>

<div class="card">
    <div class="card-header">
        <b>Kategori</b>
    </div>
    <div class="card-body">
        @foreach (categories() as $item)
            <ul>
                <li>{{ $item->title }}</li>
            </ul>
        @endforeach
    </div>
</div>
