@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row left">
		<div class="col-md-3">
			<main-avatar
			:user='@json(auth()->user())'
			></main-avatar>
		</div>
		<div class="col-md-6 justify-content-center">
			<feed-component
			:user='@json(auth()->user())'
			></feed-component>
		</div>
		<div class="col-md-3">
			<followers
			:user='@json(auth()->user())'
			></followers>
			<br>
			<following
			:user='@json(auth()->user())'
			></following>
		</div>

	</div>
</div>
@endsection
