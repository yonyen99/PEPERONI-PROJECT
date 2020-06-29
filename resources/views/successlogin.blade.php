@extends('layouts.main')
@yield('content')
@include('layouts.navbar')
	{{-- view for user that have id = 1 --}}
	@if (auth()->user()->role == 1)
	<div class="container mt-5">
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8">
				<div class="text-right">
					<a href="" class="btn btn-warning btn-sm text-white font-weight-bolder" data-toggle="modal" data-target="#createPizza">
						<i class="material-icons float-left" data-toggle="tooltip" title="Add Pizza!" data-placement="left">add</i>&nbsp;Add
					</a>
				</div>
				<hr>
				<table class="table table-borderless table-hover">
					<tr>
						<th>Name</th>
						<th>Ingredients</th>
						<th>Price</th>
						<th></th>
					</tr>
					@foreach ($pizzas as $pizza)
						<tr>
						<td class="pizzaName">{{$pizza ->name}}</td>
						<td>{{$pizza ->ingredients}}</td>
						<td class="text-success font-weight-bolder">{{$pizza ->prize}}$</td>
						<td>
							<!-- ========================================START Model UPDATE================================================ -->
							<a href="" data-toggle="modal" data-target="#updatePizza{{$pizza->id}}"><i class="material-icons text-info" data-toggle="tooltip" title="Edit Pizza!" data-placement="left">edit</i></a>
							<div class="modal fade" id="updatePizza{{$pizza->id}}">
								<div class="modal-dialog">
								  <div class="modal-content">
								  
									<!-- Modal Header -->
									<div class="modal-header">
									  <h4 class="modal-title">Edit Pizza</h4>
									  <button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									
									<!-- Modal body -->
									<div class="modal-body text-right">
										<form  action="{{route('updatePizza',$pizza->id)}}" method="post">
											@csrf
                                       		 @method('patch')
											<div class="form-group">
												<input type="text" class="form-control" value="{{$pizza->name}}" name="name">
											</div>
											<div class="form-group">
												<input type="number" class="form-control" value="{{$pizza->prize}}" name="prize">
											</div>
											<div class="form-group">
												<textarea name="ingredients"  class="form-control">{{$pizza->ingredients}}</textarea>
											</div>
										<a data-dismiss="modal" class="closeModal">DISCARD</a>
										  &nbsp;
									  <input type="submit" value="UPDATE" class="createBtn text-warning">
									</div>
									</form>
								  </div>
								</div>
							  </div>
							  <!-- =================================END MODEL UPDATE==================================================== -->
							<a href="{{route('deletePizza',$pizza->id)}}" data-toggle="tooltip" title="Delete Pizza!" data-placement="right"><i class="material-icons text-danger">delete</i></a>
						</td>
						</tr>
					@endforeach

				</table>
			</div>
			<div class="col-2"></div>
		</div>
	</div>

	<!-- ========================================START Model CREATE================================================ -->
	<!-- The Modal -->
	<div class="modal fade" id="createPizza">
		<div class="modal-dialog">
		  <div class="modal-content">
		  
			<!-- Modal Header -->
			<div class="modal-header">
			  <h4 class="modal-title">Create Pizza</h4>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			
			<!-- Modal body -->
			<div class="modal-body text-right">
				<form  action="{{route('createPizza')}}" method="post">
					@csrf
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Pizza name" name ="name">
					</div>
					<div class="form-group">
						<input type="number" class="form-control" placeholder="Prize in dollars" name="prize">
					</div>
					<div class="form-group">
						<textarea name="ingredients" placeholder="Ingredients" class="form-control"></textarea>
					</div>
				<a data-dismiss="modal" class="closeModal">DISCARD</a>
				  &nbsp;
			  <input type="submit" value="CREATE" class="createBtn text-warning">
			</div>
			</form>
		  </div>
		</div>
	  </div>
	  <!-- =================================END MODEL CREATE==================================================== -->
	
		
	@endif


	{{-- view for user that have id != 1 --}}
	@if (auth()->user()->role != 1)
	<div class="container mt-5">
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8">
				<div class="text-right">
					
				</div>
				<hr>
				<table class="table table-borderless table-hover">
					<tr>
						<th>Name</th>
						<th>Ingredients</th>
						<th>Price</th>
						{{-- <th></th> --}}
					</tr>
					@foreach ($pizzas as $pizza)
						<tr>
						<td class="pizzaName">{{$pizza ->name}}</td>
						<td>{{$pizza ->ingredients}}</td>
						<td class="text-success font-weight-bolder">{{$pizza ->prize}}$</td>
						
						</tr>
					@endforeach

				</table>
			</div>
			<div class="col-2"></div>
		</div>
	</div>
	@endif

	
	
	
		





