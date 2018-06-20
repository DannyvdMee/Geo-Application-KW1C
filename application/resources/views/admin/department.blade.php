@extends('layouts.admin')

@section('content')
<Section>
    <h2 class="">@lang('messages.departments')</h2>

	@foreach($departments as $department)

	@endforeach
</Section>
@endsection