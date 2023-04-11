@foreach ($kategori as $item)
    <!-- category list -->
    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center pr-0">
        <label class="mt-auto mb-auto">
            <!-- todo: show category title -->
            {{ str_repeat('>', $count) . ' ' . $item->title }}
        </label>
        <div class="mr-4">
            @can('kategori_datail')
                <!-- detail -->
                <a href=" {{ route('kategori.show', ['kategori' => $item]) }}" class="btn btn-xs btn-primary" role="button">
                    <i class="fas fa-eye"></i>
                </a>
            @endcan
            @can('kategori_update')
                <!-- edit -->
                <a href="{{ route('kategori.edit', ['kategori' => $item]) }}" class="btn btn-xs btn-warning" role="button">
                    <i class="fas fa-edit"></i>
                </a>
            @endcan
            @can('kategori_delete')
                <!-- delete -->
                <form class="d-inline" action="{{ route('kategori.destroy', ['kategori' => $item]) }}" role="alert"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-xs btn-danger">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            @endcan

        </div>
        <!-- todo:show subcategory -->
        @if ($item->turunan && !trim(request()->get('keyword')))
            @include('cms.kategori._kategori-list', ['kategori' => $item->turunan, 'count' => $count + 2])
        @endif
    </li>
    <!-- end  category list -->
@endforeach
