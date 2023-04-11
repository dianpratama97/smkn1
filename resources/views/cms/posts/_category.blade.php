<ul class="pl-1 my-1" style="list-style: none;">
    @foreach ($kategori as $item)
        <div class="form-check">
            @if ($kategoriChecked && in_array($item->id, $kategoriChecked))
                <label class="form-check-label">
                    <input class="form-check-input " type="checkbox" value="{{ $item->id }}" name="category[]"
                        checked>
                    <span class="form-check-sign"> {{ $item->title }}</span>
                </label>
            @else
                <label class="form-check-label">
                    <input class="form-check-input " type="checkbox" value="{{ $item->id }}" name="category[]">
                    <span class="form-check-sign"> {{ $item->title }}</span>
                </label>
            @endif



            @if ($item->turunan)
                @include('cms.posts._category', [
                    'kategori' => $item->turunan,
                    'kategoriChecked' => $kategoriChecked,
                ])
            @endif
        </div>
    @endforeach
</ul>
