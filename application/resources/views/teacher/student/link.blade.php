@extends('layouts.teacher')

<!--
Opdracht:       Multidisciplinair Project v.2
Auteur:         Onyi Lam, Ibo van Geffen, Rinaldo Boejé, Danny van der Mee
Aanmaakdatum:   27-06-18
Beschrijving:   Link POI CSV to DB page
-->

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<!-- Page title -->
				<div class="row">
					<div class="col">
						<h5 class="text-center font-bold">@lang('messages.student-add')</h5>
					</div>
				</div>
				<!-- End page title -->
				<!-- POI link form -->
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

							<!-- Submit button -->
							<input type="submit" value="@lang('messages.save')">
						</form>
					</div>
				</div>
				<!-- End POI link form -->
			</div>
		</div>
	</div>
@endsection
