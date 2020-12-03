@extends('app.admin.index2')


@section('mainsection')

<section class="content pt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="offset-md-2 col-md-8 mt-3">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Profile</h3>
              </div>
            

              <form action="{{ route('update_user_profile') }}" method="post" enctype="multipart/form-data">
              	 @csrf
                <div class="card-body">

                  <div class="form-group">
		              <label for="recipient-name" class="col-form-label">Name:</label>
		              <input type="text" class="form-control @error('name') is-invalid @enderror"  id="form_attr_name" name="name" value="{{ Auth::user()->name }}">
		                @error('name')
	                        <span class="invalid-feedback" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror
		          </div>


		          <div class="form-group">
		              <label for="recipient-name" class="col-form-label">Email:</label>
		              <input type="text" class="form-control" id="form_attr_email" name="email" value="{{ Auth::user()->email }}" disabled>
		          </div>

		          <div class="form-group">
		              <label for="recipient-name" class="col-form-label">Image:</label>
		              <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="form_attr_picture"  >
		               @error('image')
	                        <span class="invalid-feedback" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror
		          </div>


		          <div class="form-group">
		              <label for="recipient-name" class="col-form-label">New Password:</label>
		              <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="form_attr_new_password" name="new_password">
		                @error('new_password')
	                        <span class="invalid-feedback" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror
		          </div>


		          <div class="form-group">
		              <label for="recipient-name" class="col-form-label">Confirm Password:</label>
		              <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="form_attr_confirm_password" name="confirm_password">
		                @error('confirm_password')
	                        <span class="invalid-feedback" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror
		          </div>


		          <div class="form-group">
		              <label for="recipient-name" class="col-form-label">Old Password:</label>
		              <input type="password" class="form-control @error('old_password') is-invalid @enderror" id="form_attr_old_password" name="old_password">
		                @error('old_password')
	                        <span class="invalid-feedback" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror
		          </div>


		          <div class="form-group">
		          	 <input type="submit" name="submit" value="Update Profile" class="btn btn-md btn-success">
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