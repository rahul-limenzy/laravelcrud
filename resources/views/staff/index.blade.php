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
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table id="example1" class="table table-bordered table-striped">
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
                                        <a class="card-link" style="color: black" href="{{ route('staff.show',$item->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a class="card-link" style="color: black" href="{{ route('staff.edit',$item->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <form action="{{ route('staff.destroy', $item->id)}}" method="POST" class="card-link" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" id="delete" class="btn fa-input" onclick="return confirm('confirm deletion?')">
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


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/adminlte.min.js')}}"></script>
<script src="{{asset('js/demo.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
