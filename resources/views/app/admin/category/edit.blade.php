@extends('app.admin.index')


@section('mainsection')

<section class="content pt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="offset-md-2 col-md-8 mt-4">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
              </div>

              <form id="subcategory_form" method="post">
                <div class="card-body">
                	<input type="hidden" name="category_hidden_id" id="category_hidden_id" value="{{ $Category->id }}">
                  <div class="form-group">
		              <label for="recipient-name" class="col-form-label">Name:</label>
		              <input type="text" class="form-control" id="form_attr_name" name="name" value="{{ $Category->name }}">
		              <span class="text-left" id="name" role="alert" style="color:red;margin-top:-15px;"></span>
		          </div>

		          

                  <div class="form-group">
		              <label for="message-text" class="col-form-label">Description:</label>
		              <textarea class="form-control" id="form_attr_description" rows="4" name="description">
		              	    {{ $Category->description }}
		              </textarea>
		              <span class="text-left" id="description" role="alert" style="color:red;margin-top:-15px;"></span>
		          </div>

		          <div class="form-group">
		          	 <input type="submit" name="submit" value="Update Category" class="btn btn-md btn-success">
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



		              $('#subcategory_form').on('submit',function(e){
                              e.preventDefault();

                              let id = $('#category_hidden_id').val();
                              axios.put('../../Category/'+id,$('#subcategory_form').serialize())
                              .then((response) => {
                                        if(response.data.success)
	                                    {
	                                    	    Swal.fire(
												      'Updated!',
												      'Category successfully Updated.',
												      'success'
											    );
											    window.location = "../../Category";
	                                    }
                              })
                              .catch((errors) => {
	                                    $('.form-group > span').addClass('d-none');
		                                $('.form-control').removeClass('is-invalid');

		                            	$.each(errors.response.data.errors, function(key, value){
										       $('#form_attr_'+key).after('<span class="invalid-feedback" role="alert"><strong>'+value+'</strong>');
										       $('#form_attr_'+key).addClass('is-invalid');
										});
	                           });
		              });
	     });
</script>
@endsection