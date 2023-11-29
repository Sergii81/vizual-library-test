<table class="table table-bordered border-primary">
    <thead>
    <tr>
        <th>{{__('book.ID')}}</th>
        <th>{{__('book.title')}}</th>
        <th>{{__('book.description')}}</th>
        <th>{{__('book.publisher')}}</th>
        <th>{{__('book.authors')}}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($books as $book)
        <tr>
            <td>{{$book->id}}</td>
            <td>{{$book->title}}</td>
            <td>{{$book->description}}</td>
            <td>{{$book->user->name}}</td>
            <td>{{implode(', ', $book->authors->pluck('name')->toArray())}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $books->links() }}
