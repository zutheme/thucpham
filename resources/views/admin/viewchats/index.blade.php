@extends('admin.general')
@section('other_styles')

@stop
@section('content')
  <chats :user="{{ auth()->user() }}"></chats>
@stop

@section('other_scripts')
  <script src="{{ asset('gentelella/build/js/custom-build.js?v=0.1.1') }}"></script>
@stop