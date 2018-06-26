@extends('layouts.teacher')

@section('content')
	<div class="row">
		<div class="col">
			<form method="POST" action="{{ route('teacher/exercise/create') }}">
				<p class="text-center font-bold">@lang('messages.add-exercise')</p>
				@csrf
				<select name="poi_id">
						<option value="0" disabled selected>Selecteer POI</option>
						@foreach($pois as $poi)
							<option value="{{ $poi->id }}">{{ $poi->title }}</option>
						@endforeach
					{{--TODO: Only 1 exercise per poi--}}
				</select>
				<input type="text" name="title" placeholder="Vraag titel">
				<textarea name="content" placeholder="Vraag" required></textarea>
				<input type="text" name="picture" placeholder="Afbeelding URL" required>
				<input type="text" name="answer" placeholder="juiste antwoord" required>
				<input type="submit" value="@lang('messages.save')">
			</form>
		</div>
	</div>
@endsection