@extends('app.admin.index')

@section('mainsection')
  
    <h3 class="pt-4 ml-5">Categories</h3>
    
    <div class="card m-5" >
              <div class="card-header">
                   <a class="btn btn-md btn-success float-right" href="{{ route('Category.create') }}">Create New Category</a>
              </div>
              <div class="card-body">
                  <table class="table table-bordered table-condensed" >
	              	   <thead>
	              	   	  <tr>
	              	   	  	  <th><strong><u>Name</u></strong></th>
	              	   	  	  <th><strong><u>Description</u></strong></th>
	              	   	  	  <th><strong><u>Edit</u></strong></th>
	              	   	  	  <th><strong><u>Delete</u></strong></th>
	              	   	  </tr>
	              	   </thead>


	              	    <tbody>
	              	    	  @foreach($Categories as $Category)
				              	   	  <tr>
				              	   	  	  <td>{{ $Category->name }}</td>
				              	   	  	  <td>{{ $Category->description }}</td>
				              	   	  	  <td><button class="btn btn-md btn-primary edit_category" data-eid="{{ $Category->id }}">Edit</button></td>
				              	   	  	  <td><button class="btn btn-md btn-danger delete_category" data-did="{{ $Category->id }}">Delete</button></td>
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
										    axios.delete('Category/'+id)
										    .then(()=>{
										    	    Swal.fire(
													      'Deleted!',
													      'Category has been deleted.',
													      'success'
												    );

												    location.reload();
										    })  
								        }
								});
		              });





		              $('body').on('click','.edit_category',function(){
                               let id = $(this).data('eid');
                               window.location = "Category/"+id+"/edit";
		              });



	     });
</script>


@endsection