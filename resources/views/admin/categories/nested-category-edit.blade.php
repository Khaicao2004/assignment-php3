<option value="{{ $category->id }}" @if ($parent_id == $category->id) selected @endif>
    {{ $each }}{{ $category->name }}</option>
@if ($category->children)
    @php($each .= '-')
    @foreach ($category->children as $child)
        @include('admin.categories.nested-category-edit', ['category' => $child])
    @endforeach
@endif