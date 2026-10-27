<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width,initial-scale=1.0">
				<meta name="format-detection" content="telephone=no" >
				<meta name="description" content="Mentor Language Institute was founded in 2002 and is located in two popular areas: Westwood & Hollywood. We help students from all over the world improve their English.">
				<meta property="og:title" content="Mentor Language Institute" />
				<meta property="og:type" content="article" />
				<meta property="og:description" content="Affordable English School located in Los Angeles" />
				<meta property="og:url" content="https://mliesl.edu/" />
				<meta property="og:image" content="http://mliesl.edu/wp-content/uploads/2020/11/mli_logo.jpg" />
				<meta property="og:site_name" content="Mentor Language Institute" />
        <title>Laravel</title>

        <!-- Fonts -->

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
	<body class="antialiased">
		<div id="app">
			<App />
		</div>
		<script src="{{ asset('js/app.js') }}"></script>
	</body>
</html>
