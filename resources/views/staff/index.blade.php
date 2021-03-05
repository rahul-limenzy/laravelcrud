@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Staff list') }}
                        <a class="btn btn-info float-right" href="{{ route('staff.create') }}">{{ __('create') }}</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-info alert-dismissible fade show"
                                 role="alert">{{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <table id="myTable" class="myTable table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{$item->first_name.' '.$item->last_name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>
                                        <a class="card-link" style="color: black"
                                           href="{{ route('staff.show',$item->id) }}"><i class="fa fa-eye"
                                                                                         aria-hidden="true"></i></a>
                                        <a class="card-link" style="color: black"
                                           href="{{ route('staff.edit',$item->id) }}"><i class="fa fa-pencil-square-o"
                                                                                         aria-hidden="true"></i></a>
                                        <form action="{{ route('staff.destroy', $item->id)}}" method="POST"
                                              class="card-link" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" id="delete" class="btn fa-input"
                                                    onclick="return confirm('confirm deletion?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>


            </div>
        </div>
    </div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $.noConflict();
        $('#myTable').DataTable();
    });
</script>
