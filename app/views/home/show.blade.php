@section('pagebar')
	<section id="wrapper_slider" class="container">
        <h2 class="page_name text_shadow">{{$home->name}}</h2>
        <h3 class="breadcrumb text_shadow">Home  /  Users</h3>
    </section><!-- end #wrapper_slider -->
@stop

@section('content')
	@if(Session::get('success_message'))
		<div class="alert alert-success">{{Session::get('success_message')}}</div>
	@endif

	@if(Session::get('error_message'))
		<div class="alert alert-error">{{Session::get('error_message')}}</div>
	@endif
	<br>
    <p>The home email is <a href="mailto:{{$home->email}}">{{ $home->email }}</a></p>
    <p>The home's phone number is {{ $home->phone_number }}</p>
    <p>Their address is {{$home->address}}</p>
    <p>Their home teachers are {{$home->team->senior->first_name}} {{$home->team->senior->last_name}} and {{$home->team->junior->first_name}} {{$home->team->junior->last_name}}</p>
    <br>
    {{ Form::open('homes/'.$home->id, 'DELETE', array('class' => 'form')) }}
	    <a href="../../../homes/<?php echo $home->id ?>/edit" class="btn btn-inverse"><i class="icon-white icon-pencil"></i> Edit this family</a>
	    <a href="../../../homes" class="btn btn-inverse"><i class="icon-white icon-chevron-left"></i> Back to family list</a>
		
		@if($admin)
			<button class="btn btn-danger pull-right" value="Submit" type="submit"><i class="icon-white icon-trash"></i> Delete Family</button>
		@endif
	{{Form::close()}}
	
	<div class="heading center m2">
        <div class="separation"></div>
        <h2>Goals</h2>
    </div>

    @if (count($home->goal) > 0)
	    <table class="table table-striped">
			<tr>	
				<td><strong>Goal</strong></td>
				<td><strong>Due Date</strong></td>
				<td><strong>Status</strong></td>
			</tr>
		@foreach ($home->goal as $goal)
			<tr <?=($goal->completed == 1) ? 'class="success"' : '';?>>
				<td>{{ HTML::to('goals/'.$goal->id, $goal->name, array('class' => 'fancybox', 'data-fancybox-type' =>'iframe'));}}</td>
				<td>{{$goal->date_due}}</td>
				<td><?=($goal->completed == 1) ? 'Completed' : 'Ongoing';?></td>
			</tr>
		@endforeach
		</table>
    @endif

    <a href="../../goals/create/<?php echo $home->id ?>" data-fancybox-type="iframe" class="btn btn-inverse fancybox"><i class="icon-white icon-plus"></i> Add Goal</a>


	<div class="heading center m2">
        <div class="separation"></div>
        <h2>Visit Reports</h2>
    </div>
	<table class="table table-striped">
		<tr>	
			<td><strong>Month</strong></td>
			<td><strong>Family</strong></td>
			<td><strong>Team</strong></td>
			<td><strong>Visited ?</strong></td>
 			<td><strong>Status</strong></td>
			<td><strong>Visit date</strong></td>
			<td><strong>Report date</strong></td>
		</tr>
	@foreach ($visits as $visit)
		<tr>
			<td>{{ HTML::to('visits/'.$visit->id, $visit->month, array('id' => 'visit_link'));}}</td>
			<td>{{ $visit->home->name }}</td>
			<td>{{ $visit->team->senior->first_name . ' ' . $visit->team->senior->last_name }} and {{ $visit->team->junior->first_name . ' ' . $visit->team->junior->last_name }}</td>
			<td>{{ $visit->visited == 1 ? 'Yes' : 'No'}}</td>
			<td>{{ $visit->status }}</td>
			<td>{{ $visit->visit_date }}</td>
			<td>{{ $visit->report_date }}</td>
		</tr>
	@endforeach
	</table>

@stop