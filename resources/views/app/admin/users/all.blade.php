@extends('app.admin.index2')

@section('mainsection')
  
    <h3 class="pt-4 ml-5">Users</h3>
    
    <div class="card m-5" >
              
              <div class="card-body">
                  <table class="table table-bordered table-condensed" >
	              	   <thead>
	              	   	  <tr>
	              	   	  	  <th><strong><u>Name</u></strong></th>
	              	   	  	  <th><strong><u>Email Address</u></strong></th>
	              	   	  	  <th><strong><u>Image</u></strong></th>
	              	   	  </tr>
	              	   </thead>


	              	    <tbody>
	              	    	  @foreach($Users as $User)
				              	   	  <tr>
				              	   	  	  <td>{{ $User->name }}</td>
				              	   	  	  <td>{{ $User->email }}</td>
				              	   	  	  <td>
				              	   	  	  	   @if($User->image != '')
				              	   	  	  	         <img src="http://localhost/shopping/public/Images/profiles/{{ $User->image }}" width="90px" height="90px" style="border-radius: 100px;">
				              	   	  	  	   @else
				              	   	  	  	        No Image
				              	   	  	  	   @endif
				              	   	  	  </td>
				              	   	  </tr>
		              	   	  @endforeach
	              	   </tbody>
	              </table>
              </div>
    </div>




@endsection