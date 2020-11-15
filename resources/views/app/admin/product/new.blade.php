@extends('app.admin.index')

@section('mainsection')

<section class="content pt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="offset-md-2 col-md-8 mt-3">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create New Product</h3>
              </div>
            

              <form  action="{{ route('Product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
		              <label for="recipient-name" class="col-form-label">Name:</label>
		              <input type="text" class="form-control @error('name') is-invalid @enderror" id="form_attr_name" name="name">
		              @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
		          </div>

		    
                  <div class="form-group">
		              <label for="message-text" class="col-form-label">Description:</label>
		              <textarea class="form-control @error('description') is-invalid @enderror" id="form_attr_description" rows="4" name="description"></textarea>
			           @error('description')
	                          <span class="invalid-feedback" role="alert">
	                              <strong>{{ $message }}</strong>
	                          </span>
	                   @enderror
		          </div>

		          <div class="form-group">
		              <label for="recipient-name" class="col-form-label">Price:</label>
		              <input type="text" class="form-control @error('price') is-invalid @enderror" id="form_attr_price" name="price">
		               @error('price')
	                          <span class="invalid-feedback" role="alert">
	                              <strong>{{ $message }}</strong>
	                          </span>
	                   @enderror
		          </div>

		          <div class="form-group">
		              <label for="message-text" class="col-form-label">Category:</label>
		              <select class="form-control @error('category') is-invalid @enderror" id="form_attr_category" rows="4" name="category">
		              	       <option value="" disabled="" selected="">Select Category</option>
		              	       @foreach($Categories as $Category)
		              	                <option value="{{ $Category->id }}">{{ $Category->name }}</option>
		              	       @endforeach
		              </select>
		               @error('category')
	                          <span class="invalid-feedback" role="alert">
	                              <strong>{{ $message }}</strong>
	                          </span>
	                   @enderror
		          </div>


		          <div class="form-group">
		              <label for="message-text" class="col-form-label">Sub Category:</label>
		              <select class="form-control" id="form_attr_sub_category" rows="4" name="sub_category">
		              	       <option value="" disabled="" selected="">Select Sub Category</option>
		              </select>
		              <span class="text-left" id="sub_category" role="alert" style="color:red;margin-top:-15px;"></span>
		          </div>


		           <div class="form-group">
		               <label for="recipient-name" class="col-form-label">Image:</label>
		               <input type="file" name="my_image[]" class="form-control @error('my_image') is-invalid @enderror"  id="form_attr_my_image" multiple>
		                @error('my_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
		          </div>


		          <div class="form-group">
		          	 <input type="submit" name="submit" value="Create Product" class="btn btn-md btn-success">
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



		              $('#form_attr_category').on('change',function(){
		              	         let parent_category_id = $(this).val();
		              	         axios.get('../category_related_subcategory/'+parent_category_id)
		              	         .then((response)=>{
		              	         	    let options = "<option value='' disabled selected>Select Sub Category</option>";
                                        
                                        $(response.data).each(function(index,value) {
											     options = options+"<option value='"+value.id+"'>"+value.name+"</option>" 
										});


										$('#form_attr_sub_category').empty();
										$('#form_attr_sub_category').append(options);
		              	         });
		              });

	                
	     });
</script>
@endsection