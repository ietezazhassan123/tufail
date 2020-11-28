@extends('app.admin.index2')

@section('mainsection')

<section class="content pt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="offset-md-2 col-md-8 mt-4">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Sub Category</h3>
              </div>

              <form id="subcategory_form" method="post">
                <div class="card-body">
                	<input type="hidden" name="category_hidden_id" id="category_hidden_id" value="{{ $SubCategory->id }}">
                  <div class="form-group">
		              <label for="recipient-name" class="col-form-label">Name:</label>
		              <input type="text" class="form-control" id="form_attr_name" name="name" value="{{ $SubCategory->name }}">
		              <span class="text-left" id="name" role="alert" style="color:red;margin-top:-15px;"></span>
		          </div>

		          <div class="form-group">
		              <label for="message-text" class="col-form-label">Category:</label>
		              <select class="form-control" id="form_attr_sub_category" rows="4" name="sub_category">
		              	       @foreach($Categories as $Category)
		              	                @if($Category->id == $SubCategory->category_id)
		              	                      <option value="{{ $Category->id }}">{{ $Category->name }}</option>
		              	                @else
		              	                      <option value="{{ $Category->id }}">{{ $Category->name }}</option>
		              	                @endif
		              	       @endforeach
		              </select>
		              <span class="text-left" id="sub_category" role="alert" style="color:red;margin-top:-15px;"></span>
		          </div>

		          

                  <div class="form-group">
		              <label for="message-text" class="col-form-label">Description:</label>
		              <textarea class="form-control" id="form_attr_description" rows="4" name="description">
		              	    {{ $SubCategory->description }}
		              </textarea>
		              <span class="text-left" id="description" role="alert" style="color:red;margin-top:-15px;"></span>
		          </div>

		          <div class="form-group">
		          	 <input type="submit" name="submit" value="Update Sub Category" class="btn btn-md btn-success">
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
                              axios.put('../../SubCategory/'+id,$('#subcategory_form').serialize())
                              .then((response) => {
                                        if(response.data.success)
	                                    {
	                                    	    Swal.fire(
												      'Updated!',
												      'Sub Category successfully Updated.',
												      'success'
											    );
											    window.location = "../../SubCategory";
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