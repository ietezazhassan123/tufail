@extends('app.admin.index2')

@section('mainsection')

<section class="content pt-4">
      <div class="container-fluid">
        <div class="row">

        	    @if ($message = Session::get('success'))
						<div class="alert alert-success alert-block">
							<button type="button" class="close" data-dismiss="alert">×</button>	
						        <strong>{{ $message }}</strong>
						</div>
				@endif


          <div class="offset-md-1 col-md-5 mt-3">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Product</h3>
              </div>
            

              <form  action="{{ route('Product.update',['Product'=>$Product->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                  <div class="form-group">
		              <label for="recipient-name" class="col-form-label">Name:</label>
		              <input type="text" class="form-control @error('name') is-invalid @enderror" id="form_attr_name" name="name" value="{{ $Product->name }}">
		              @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
		          </div>

		    
                  <div class="form-group">
		              <label for="message-text" class="col-form-label">Description:</label>
		              <textarea class="form-control @error('description') is-invalid @enderror" id="form_attr_description" rows="4" name="description">
		              	   {{ $Product->description }}
		              </textarea>
			           @error('description')
	                          <span class="invalid-feedback" role="alert">
	                              <strong>{{ $message }}</strong>
	                          </span>
	                   @enderror
		          </div>

		          <div class="form-group">
		              <label for="recipient-name" class="col-form-label">Price:</label>
		              <input type="text" class="form-control @error('price') is-invalid @enderror" id="form_attr_price" name="price" value="{{ $Product->price }}">
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
		              	                @if($Product->category_id == $Category->id)
		              	                      <option value="{{ $Category->id }}" selected>{{ $Category->name }}</option>
		              	                @else 
		              	                      <option value="{{ $Category->id }}">{{ $Category->name }}</option>
		              	                @endif
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
		              	       <option value="{{ $Product->sub_category_id	}}" selected="">{{ $Product->sub_category->name }}</option>
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
		          	 <input type="submit" name="submit" value="Update Product" class="btn btn-md btn-warning">
		          </div>
                
              </form>
            </div>

          </div>
        </div>

         
          <div class="offset-md-1 col-md-5 mt-3">
           <div class="card card-success">
	            <div class="card-header">
	                <h3 class="card-title">Product Images</h3>
	            </div>
            
                <div class="card-body">
                	   @foreach($Product->product_images as $SingleImage)
                	       <span>
                	            <img src="http://localhost/shopping/public/Images/Products/{{ $SingleImage->image_path }}" width="100px">
                	            <i class="far fa-trash-alt text-danger remove_image" id="image_id_{{ $SingleImage->id }}"></i>
                	       </span>
                	   @endforeach
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
		              	         axios.get('../../category_related_subcategory/'+parent_category_id)
		              	         .then((response)=>{
		              	         	    let options = "<option value='' disabled selected>Select Sub Category</option>";
                                        
                                        $(response.data).each(function(index,value) {
											     options = options+"<option value='"+value.id+"'>"+value.name+"</option>" 
										});


										$('#form_attr_sub_category').empty();
										$('#form_attr_sub_category').append(options);
		              	         });
		              });



		              $('body').on('click','.remove_image',function(){
                                let id = $(this).attr('id');

                                let num = id.split('_')[2];
                                 Swal.fire({
									  title: 'Are you sure?',
									  text: "You won't be able to revert this!",
									  icon: 'warning',
									  showCancelButton: true,
									  confirmButtonColor: '#3085d6',
									  cancelButtonColor: '#d33',
									  confirmButtonText: 'Yes, Remove it!'
								}).then((result) => {
								  if (result.isConfirmed) {

								  	    axios.post('../../store_image_id_for_deletion/'+num)
								  	    .then((number)=>{
                                                Swal.fire(
											      	'Deleted!',
											      	'Product Image has been deleted.',
											      	'success'
												);

												$('#'+id).parent().empty();
								  	    });
								  }
								})
		              });

	                
	     });
</script>
@endsection