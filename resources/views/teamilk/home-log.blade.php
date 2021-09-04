@extends('teamilk.master-log')

@section('other_styles')

  <style>
	ul {
		list-style-type: none;
	}
	ul li {
		padding:10px;
	}
  </style>

@stop

@section('content')
<ul>
  @foreach($rs_log as $row)
	<li>{{ $row['created_at'] }}<br>{{ $row['content'] }}</li>  
  @endforeach
</ul>
 
@stop

@section('other_scripts')

@stop