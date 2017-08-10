@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Page not found!</div>

					<div class="panel-body">
						Page <a href="{{ $request->getUri() }}">{{ $request->getUri() }}</a> cannot be found. Please
						<a href="{{ $request->getSchemeAndHttpHost() }}">click here</a> to return home.
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection