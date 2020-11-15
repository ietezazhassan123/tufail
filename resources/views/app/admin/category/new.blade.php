@extends('app.admin.index')


@section('mainsection')

<section class="content pt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="offset-md-2 col-md-8 mt-3">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create New Category</h3>
              </div>
            

              <form id="new_warehouse_form" method="post">
                <div class="card-body">
                  <div class="form-group">
		              <label for="recipient-name" class="col-form-label">Name:</label>
		              <input type="text" class="form-control" id="form_attr_name" name="name">
		              <span class="text-left" id="name" role="alert" style="color:red;margin-top:-15px;"></span>
		          </div>

		    
                  <div class="form-group">
		              <label for="message-text" class="col-form-label">Description:</label>
		              <textarea class="form-control" id="form_attr_description" rows="4" name="description"></textarea>
		              <span class="text-left" id="description" role="alert" style="color:red;margin-top:-15px;"></span>
		          </div>

		          <div class="form-group">
		          	 <input type="submit" name="submit" value="Create Category" class="btn btn-md btn-success">
		          </div>
                
              </form>
            </div>
          </div>




         
        </div>
      </div>
    </section>



<script type="text/javascript">
		 $(document).ready(function() {


		 	          $.ajaxSetup({
				             headers: {
			       	             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		                   }
		              });

	                

	                  $('#new_warehouse_form').on('submit',function(e){
                            e.preventDefault();
                            $.ajax({
                                    url: "{{ route('Category.store') }}",
                                    method:"POST",
                                    data: $('#new_warehouse_form').serialize(),
                                    success:function(response){
                                          Swal.fire(
											  'Added',
											  'New Category Successfully Added',
											  'success'
										  );


										   window.location ="../Category";

										  
                                    }, 
                                    error:function(response){
                                          
                                          $('.form-group > span').addClass('d-none');
                                          $('.form-control').removeClass('is-invalid');

                                    	  $.each(response.responseJSON.errors, function(key, value){
										        $('#form_attr_'+key).after('<span class="invalid-feedback" role="alert"><strong>'+value+'</strong>');
										        $('#form_attr_'+key).addClass('is-invalid');
										  });
                                    },
                             });
	                  });


















	     });
</script>
@endsection