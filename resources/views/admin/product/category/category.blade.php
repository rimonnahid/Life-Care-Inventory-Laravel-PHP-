@extends('admin.layouts.layout')

@section('css')
<link href="{{ asset('public/backend/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2 class="font-weight-bold">Category List <a href="#" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#newCategory">New Category</a></h2>
    </div>
</div>
<div class="wrapper wrapper-content">
	<div class="ibox-content">
		<div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
               	<thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr class="gradeX">
                        <td>{{ $count++ }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            @if($category->status == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Deactive</span>
                            @endif
                        </td>
                        <td>{{ $category->created_at }}</td>
                        <td class="center">
                        	<a href="#" class="btn btn-primary btn-sm collapsible"><i class="fa fa-pencil"></i></a>
                            <form class="content" action="{{route('update.category', $category->id)}}" method="post" style="display: none; margin-right: 20px;">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" value="{{$category->name}}" class="form-control mt-1">
                                    <button class="btn btn-sm btn-primary mt-1">Update</button>
                                </div>
                            </form>
                            @if($category->status == 1)
                                <a href="{{ route('deactive.category',$category->id) }}" class="btn btn-sm btn-success"><i class="fa fa-thumbs-up"></i></a>
                            @else
                                <a href="{{ route('active.category',$category->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-thumbs-down"></i></a>
                            @endif
                        	<a href="{{ route('delete.category',$category->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
	</div>
</div>

<!-- New Category MODAL -->
<div id="newCategory" class="modal fade">
  <div class="modal-dialog modal-dialog-vertical-center" role="document">
    <div class="modal-content bd-0 tx-14">
    <form action="{{ route('store.category') }}" method="POST">
        @csrf
      <div class="modal-header pd-y-20 pd-x-25">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">New Category</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Category Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Category Name" required="">
            <input type="hidden" name="status" value="1">
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-info pd-x-20">Save Category</button>
        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->



@endsection

@section('js')
<script src="{{ asset('public/backend/js/plugins/dataTables/datatables.min.js') }}"></script>
<script src="{{ asset('public/backend/js/plugins/dataTables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    //Hidding Button
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
          content.style.display = "none";
        } else {
          content.style.display = "block";
        }
      });
    }
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'Product Category List'},
                {extend: 'pdf', title: 'Product Category List'},

                {extend: 'print',
                 customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                }
                }
            ]

        });

    });

</script>
@endsection

