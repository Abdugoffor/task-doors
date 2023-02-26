@extends('layout')
@section('name')
Heandel
@endsection
@section('con')
<div class="row">
    <div class="col-md-8 offset-2">

        @if (session('text'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h2>{{ session('text') }}</h2>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        {{-- <div class="col-12"> --}}
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h2>{{ $error }}</h2>
        </div>
        @endforeach
        @endif
        {{-- </div> --}}

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
            Add Heandel
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Heandel Add</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('heandl.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Price</label>
                                <input type="number" name="price" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp" placeholder="Price">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Img</label>
                                <input type="file" name="img" class="form-control" id="exampleInputPassword1">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Save changes">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Color</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th style="width: 40%">Image</th>
                            <th style="width: 10%">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($models as $model)
                        <tr>
                            <td>{{ $model->id }}</td>
                            <td>{{ $model->name }}</td>
                            <td>{{ $model->price }}</td>
                            <td>
                                <img src="{{ asset($model->img) }}" width="37%" alt="">
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal1{{ $model->id }}">
                                    Edit
                                </button>

                                <form action="{{ route('heandl.delete', $model->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger bg-danger mb-1">Delete</button>
                                </form>
                                <!-- Button trigger modal -->


                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal1{{ $model->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="{{ route('heandl.edit', $model->id) }}" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Name</label>
                                                        <input type="text" name="name" value="{{ $model->name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail3">Price</label>
                                                        <input type="number" name="price" value="{{ $model->price }}" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp" placeholder="Price">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Img</label>
                                                        <input type="file" name="img" value="{{ $model->img }}" class="form-control" id="exampleInputPassword1">

                                                        <img src="{{ $model->img }}" class="mt-2 ml-1" width="30%" alt="">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-primary" value="Save changes">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
