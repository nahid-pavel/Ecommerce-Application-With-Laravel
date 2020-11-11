<div class="list-group">

    @foreach(App\Models\Category::where('parent_id',NULL)->orderBy('id','desc')->get() as $category)
    <a href="#category-{{ $category->id }}" class="list-group-item list-group-item-action" data-toggle="collapse">
        <img src="/images/categories/{{ $category->image }}" width="50" height="50" /> {{ $category->name }}
    </a>
    <div class="collapse {{ Route::is('categories.show') ? 'show': '' }}" id="category-{{ $category->id }}">
        @foreach(App\Models\Category::where('parent_id',$category->id)->orderBy('id','desc')->get() as $sub_category)
        <a href="{{ route('categories.show', $sub_category->id) }}"
            class="list-group-item list-group-item-action {{ Route::is('categories.show') ? 'active': '' }}">
            <img src="/images/categories/{{ $sub_category->image }}" width="50" height="50" /> {{ $sub_category->name }}
        </a>
        @endforeach
    </div>
    @endforeach

</div>