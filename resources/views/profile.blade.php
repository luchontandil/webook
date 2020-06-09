@extends('layouts.app')

@section('content')
	<!-- :users="{{ $result }}" -->
<div class="container">
	<div class="row left">

		<div class="col-md-3">
			<main-avatar
			:userdata="[{{json_encode($result[0])}}, {{$onlyView}}]"
			></main-avatar>
		</div>

		<div class="col-md-6 justify-content-center">
			<feed-component
			:data="[{{json_encode($result[0])}}, {{$onlyView}}]"
			></feed-component>
		</div>

		<div class="col-md-3">
			<followers
			:data="[{{json_encode($result[0])}}, {{$onlyView}}]"
			></followers>
			<br>
			<following
			:data="[{{json_encode($result[0])}}, {{$onlyView}}]"
			></following>
		</div>

	</div>
</div>
@endsection
