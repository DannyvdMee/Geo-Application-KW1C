@extends('layouts.admin')

@section('content')
	<div class="row">
		<div class="col">
			<section>
				<h2 class="">@lang('messages.departments')</h2>

				<div id="department-container">
					@foreach($departments as $department)
						<div class="row">
							<div class="col">
								<p>{{ $department->title }}</p>
								@if ($department->state == true)
									<i class="fa-eye"></i>
								@else
									<i class="fa-eye-closed"></i>
								@endif
							</div>
						</div>
					@endforeach
				</div>
			</section>
		</div>
	</div>
@endsection