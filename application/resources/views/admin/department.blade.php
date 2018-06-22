@extends('layouts.admin')

@section('content')
	<Section>
		<h2 class="">@lang('messages.departments')</h2>

		<table>
			@foreach($departments as $department)
				<tr>
					<td>
						$department;
					</td>
				</tr>
			@endforeach
		</table>
	</Section>
@endsection