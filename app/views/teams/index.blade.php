@extends('layouts.master')

@section('pagebar')
	<section id="wrapper_slider" class="container">
        <h2 class="page_name text_shadow">Home Teaching teams</h2>
        <h3 class="breadcrumb text_shadow">Home  /  Teams</h3>
    </section><!-- end #wrapper_slider -->
@stop



@section('content')
	@if(Session::get('success_message'))
		<div class="alert alert-success">{{Session::get('success_message')}}</div>
	@endif

	@if(Session::get('error_message'))
		<div class="alert alert-error">{{Session::get('error_message')}}</div>
	@endif
	<table class="table table-striped">
		<tr>	
			<td>Team number</td>
			<td>Leader</td>
			<td>Junior companion</td>
			<td>Steward</td>
		</tr>
	@foreach ($teams as $team)
    	<tr>
			<td>{{ HTML::to('teams/'.$team->id, $team->id, array('id' => 'register_link'));}}</td>
			<td>{{ User::name($team->lead) }}</td>
			<td>{{ User::name($team->companion) }}</td>
			<td>{{ $team->steward }}</td>
		</tr>
	@endforeach
	</table>

	<a href="../../teams/create" class="btn btn-inverse"><i class="icon-plus icon-white"></i> Add a new team</a>

@stop