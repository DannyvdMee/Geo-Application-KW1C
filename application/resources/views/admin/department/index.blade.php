@extends('layouts.admin')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.departments')</h5>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div id="department-container">
						@foreach($departments as $department)
							<div class="row">
								<div class="col dataItem">
									<p class="display-inline-block">{{ $department->name }}</p>
									<div class="float-right">
										@if ($department->visibility == 1)
											<a href="{{ route('admin/department/visibility', ['id' => $department->id]) }}">
												<i class="material-icons">visibility</i>
											</a>
										@else
											<a href="{{ route('admin/department/visibility', ['id' => $department->id]) }}">
												<i class="material-icons">visibility_off</i>
											</a>
										@endif
										<a href="{{ route('admin/department/edit', ['id' => $department->id]) }}">
											<i class="material-icons">edit</i>
										</a>
										<a href="{{ route('admin/department/delete', ['id' => $department->id]) }}">
											<i class="material-icons">delete_forever</i>
										</a>
									</div>
								</div>
							</div>
						@endforeach
						<div class="whitespace height-21"></div>

						<div class="dataAddIcon display-inline-block float-right">
							<a href="{{ route('admin/department/create') }}" id="add-item">
								<i class="material-icons">add</i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
