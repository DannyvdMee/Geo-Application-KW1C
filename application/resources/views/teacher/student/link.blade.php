@extends('layouts.teacher')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<div class="row">
					<div class="col">
						<h5 class="text-center font-bold">@lang('messages.student-add')</h5>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<form method="POST" action="{{ route('teacher/student/import/link') }}">
							@csrf

							@foreach ($db_headers as $info)
								<p>{{ ucfirst($info) }}</p>
								<select name="students[{{ $info }}]">
									@foreach ($sorted_file_headers as $header_item) {
										<option value="{{ array_search($header_item, $file_headers) }}" {{ ($header_item == ucfirst($info) ? 'selected' : '') }}>{{ ucfirst($header_item) }}</option>
									@endforeach
								</select>
								<br>
							@endforeach

							<input type="submit" value="@lang('messages.save')">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
