@extends('layouts.app')

@section('content')
	<search-page-component
	:users="{{ $result }}"
	></search-page-component>
@endsection
