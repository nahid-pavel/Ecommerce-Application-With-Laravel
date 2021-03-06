@extends('backend.layout.master')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="card mt-4">

            <table class="table table-hover">
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Parent Category</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</th>
                    <th>{{ $category->name }}</th>
                    <th>{{ $category->description }}</th>
                    @if($category->parent_id === NULL)
                    <th>Parent Category</th>
                    @else
                    <th>{{ $category->parent->name }}</th>
                    @endif

                    <th>
                        <img src="/images/categories/{{ $category->image }}" alt="image" />
                    </th>
                    <th>
                        <a href="{{ route('admin.category.edit', $category) }}" class="btn btn-success">Edit</a>
                        <button class="btn btn-danger" data-toggle="modal"
                            data-target="#exampleModal{{ $category->id }}">Delete</button>
                    </th>
                </tr>
                <div class="modal fade" id="exampleModal{{ $category->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are you Sure, you want to delete?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>



                            <div class="modal-footer">
                                <form method="post" action="{{ route('admin.category.destroy', $category) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Yes</button>
                                </form>
                                <button type="button" data-dismiss="modal" class="btn btn-primary">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </table>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2020 <a
                    href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights
                reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a
                    href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a>
                templates</span>
        </div>
    </footer>
    <!-- partial -->
</div>


@endsection