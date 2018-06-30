@extends('layouts.admin')

<!--
Opdracht:       Multidisciplinair Project v.2
Auteur:         Onyi Lam, Ibo van Geffen, Rinaldo Boejé, Danny van der Mee
Aanmaakdatum:   30-06-18
Beschrijving:   Edit User Pagina
-->

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<!-- Page title -->
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.users-edit')</h5>
				</div>
			</div>
			<!-- End page title -->
			<!-- Edit form -->
			<div class="row">
				<div class="col">
					<form method="POST" action="{{ route('admin/user/edit', ['id' => $user->id] ) }}">
                        @csrf
                        
						<h6 class="text-center font-bold">@lang('messages.account')</h6>
						<!-- Email -->
						<input type="email" name="email" placeholder="@lang('messages.email')"
                            value="{{ $user->email }}" required>
						<!-- Username -->
						<input type="text" name="username" placeholder="@lang('messages.username')"
                            value="{{ $user->username }}" required>
                        <!-- Password -->   
                        <input type="password" name="password" placeholder="@lang('messages.password')" >
                        
                        <h6 class="text-center font-bold">@lang('messages.name')</h6>
						<!-- First name -->
						<input type="text" name="firstname" placeholder="@lang('messages.firstname')"
                            value="{{ $user->firstname }}" required>
						<!-- Last name -->
						<input type="text" name="lastname" placeholder="@lang('messages.lastname')"
                            value="{{ $user->lastname }}" required>

						<!-- Department -->	
						<h6 class="text-center font-bold">@lang('messages.department')</h6>
						<select name="department" required>
							<!-- <option value="">@lang('messages.selectDepartment')</option> -->
							@if (!empty($departments))
								@foreach ($departments as $department)
									<option value="{{ $department->name }}" {{ ($department->name == $user->department ? 'selected' : '') }}>{{ $department->name }}</option>
								@endforeach
							@endif
                        </select>

						<!-- Account type -->	
						<h6 class="text-center font-bold">@lang('messages.account_type')</h6>
						<select name="account_type" required>
							<option value="">@lang('messages.account_type')?</option>
							<option value="admin" {{ ($user->account_type == 'admin' ? 'selected' : '') }}>@lang('messages.admin')</option>
							<option value="teacher" {{ ($user->account_type == 'teacher' ? 'selected' : '') }}>@lang('messages.teacher')</option>
                        </select>
                        
						<div class="whitespace height-21"></div>

                        <!-- Is it active? -->
						<select name="active" required>
							<option value="">@lang('messages.active')?</option>
							<option value="1" {{ ($user->active == 1 ? 'selected' : '') }}>@lang('messages.yes')</option>
							<option value="0" {{ ($user->active == 0 ? 'selected' : '') }}>@lang('messages.no')</option>
						</select>

						<!-- Submit button -->						
						<input type="submit" value="@lang('messages.save')">
					</form>
				</div>
			</div>
			<!-- End edit form -->
		</div>
	</div>
@endsection
