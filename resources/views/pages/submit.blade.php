@extends('layouts.default')

@section('page')
{!! Form::open(['url' => '/submit', 'id' => 'submitForm']) !!}
<div class="hero">
	<div class="row">
		<div class="medium-6 medium-offset-3 columns">
			<div class="register-form">
				{!! Form::label('question', 'Your question') !!}
				{!! Form::textarea('question', '', ['rows' => 1]) !!}
			</div>
		</div>
	</div>
</div>
<div class="padding">
	<div class="row">
		<div class="medium-6 medium-offset-3 columns">
			<div class="panel">
				<h5>
					More details
				</h5>
				<hr>
				{!! Form::label('tag', 'Tag your question') !!}
				<br>
				<ul>
					<li>Tags are claimed by users.</li>
					<li>If the tag isn't claimed, it will be claimed by you.</li>
					<li>If you don't submit a tag, your question will be submitted to <a href="{{ url('/tag/random') }}">#random</a>.</li>
					<li>You can use one tag per question.</li>
				</ul>
				{!! Form::text('tag', '', ['placeholder' => '#ask']) !!}
				<br>
				<h5>
					Question settings
				</h5>
				<hr>
				<label for="nsfw" class="checkbox-label">
					{!! Form::checkbox('nsfw', 1, null, ['id' => 'nsfw']) !!}
					This question is <b>Not Safe For Work</b>
				</label>
				<label for="serious" class="checkbox-label">
					{!! Form::checkbox('serious', 1, null, ['id' => 'serious']) !!}
					This is a <b>serious</b> question.
				</label>
				<br>
				<p class="text-alert" id="submitFormError"></p>
				{!! Form::submit('Submit', ['class' => 'btn blue']) !!}
				&nbsp;&nbsp;&nbsp;
				<img class="loader" id="submitFormLoader" src="{{ url('/img/dark-loader.svg') }}">
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
@stop

@section('scripts')
{!! HTML::script('/bower_components/autosize/autosize.min.js') !!}
@include('scripts.autosizer')
@include('scripts.submit')
@stop