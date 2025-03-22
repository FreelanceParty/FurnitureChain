@extends('_templates.a_content')

@section('content')
	<div> Furniture: {{ $furniture->getTitle() }}</div>
@endsection