@extends('layouts.admin')

<!--
Opdracht:       Multidisciplinair Project v.2
Auteur:         Onyi Lam, Ibo van Geffen, Rinaldo Boejé, Danny van der Mee
Aanmaakdatum:   27-06-18
Beschrijving:   Edit Department Pagina
-->

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<!-- Page title -->
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.department-edit')</h5>
				</div>
			</div>
			<!-- End page title -->
			<!-- Department edit form -->
			<div class="row">
				<div class="col">
					<form method="POST" action="{{ route('admin/department/create') }}">
						@csrf

						<!-- Department name/title -->
                        <input type="text" name="title" placeholder="@lang('messages.title')" 
                            value="{{ $department->title }}" required autofocus>
                        <!-- Department active? -->
						<select name="active">
							<option value="">@lang('messages.active')?</option>
							<option value="1" {{ ($department->active == 1 ? 'selected' : '') }}>@lang('messages.yes')</option>
							<option value="0" {{ ($department->active == 0 ? 'selected' : '') }}>@lang('messages.no')</option>
                        </select>

						<!-- Submit button -->	
						<input type="submit" value="@lang('messages.save')">
					</form>
				</div>
			</div>
			<!-- End department edit form -->
		</div>
	</div>
</div>
@endsection