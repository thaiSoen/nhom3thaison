
@extends('admin.layout.index')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Food Management</h2>
            </div>
            <br><br>
            
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered" ,border="0">
        <tr>
            <th>No</th>
            <th>Name</th>
           
            <th>Category</th>
            <th>Image</th>
            
            <th>Price</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($musics as $key => $music)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $music->name }}</td>
               
                <td>{{ $music->category->name }}</td>
                <td><img class="images-detail" src="{{ asset('image/music/' . $music->image) }}" alt="" border=3 height=150 width=150>
                </td>
               

                <td>{{ $music->price }}</td>

                <td>{{ $music->description }}</td>

                <td>

                    <form action="{{ route('music.destroy', $music->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('music.show', $music->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('music.edit', $music->id) }}">Edit</a>
                        <a class="btn btn-primary" href="{{ route('music.destroy', $music->id) }}">Delete</a>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $musics->links() !!}
@endsection
