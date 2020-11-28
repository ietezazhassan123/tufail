@extends('app.admin.index2')


@section('mainsection')
  
    <h3 class="pt-4 ml-5">Sub Categories</h3>
    
    <div class="card m-5" >
              <div class="card-header">
                   <a class="btn btn-md btn-success float-right" href="{{ route('SubCategory.create') }}">Create New Sub Category</a>
              </div>
              <div class="card-body">
                  <table class="table table-bordered table-condensed" >
	              	   <thead>
	              	   	  <tr>
	              	   	  	  <th><strong><u>Name</u></strong></th>
	              	   	  	  <th><strong><u>Description</u></strong></th>
	              	   	  	  <th><strong><u>Parent Category</u></strong></th>
	              	   	  	  <th><strong><u>Edit</u></strong></th>
	              	   	  	  <th><strong><u>Delete</u></strong></th>
	              	   	  </tr>
	              	   </thead>


	              	    <tbody>
	              	    	  @foreach($SubCategories as $SubCategory)
				              	   	  <tr>
				              	   	  	  <td>{{ $SubCategory->name }}</td>
				              	   	  	  <td>{{ $SubCategory->description }}</td>
				              	   	  	  <td>{{ $SubCategory->category->name }}</td>
				              	   	  	  <td><button class="btn btn-md btn-primary edit_category" data-eid="{{ $SubCategory->id }}">Edit</button></td>
				              	   	  	  <td><button class="btn btn-md btn-danger delete_category" data-did="{{ $SubCategory->id }}">Delete</button></td>
				              	   	  </tr>
		              	   	  @endforeach
	              	   </tbody>
	              </table>
              </div>
    </div>




<script type="text/javascript">
		 $(document).ready(function() {


		 	          $.ajaxSetup({
				             headers: {
			       	             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		                   }
		              });



		              $('body').on('click','.delete_category',function(){
		              	        let id = $(this).data('did');

		              	        Swal.fire({
								  title: 'Are you sure?',
								  text: "You won't be able to revert this!",
								  icon: 'warning',
								  showCancelButton: true,
								  confirmButtonColor: '#3085d6',
								  cancelButtonColor: '#d33',
								  confirmButtonText: 'Yes, delete it!'
								}).then((result) => {
										if (result.isConfirmed) {
										    axios.delete('SubCategory/'+id)
										    .then(()=>{
										    	    Swal.fire(
													      'Deleted!',
													      'Sub Category has been deleted.',
													      'success'
												    );
												    location.reload();
										    })  
								        }
								});
		              });





		              $('body').on('click','.edit_category',function(){
                               let id = $(this).data('eid');
                               window.location = "SubCategory/"+id+"/edit";
		              });



	     });
</script>


@endsection