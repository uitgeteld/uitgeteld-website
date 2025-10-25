<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<style>
		body {
			font-family: sans-serif;
			background: #f8fafc;
			padding: 2rem;
		}

		header {
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		button {
			background: #e3342f;
			color: white;
			border: none;
			padding: 10px 15px;
			border-radius: 5px;
			cursor: pointer;
		}

		button:hover {
			background: #cc1f1a;
		}
	</style>
</head>

<body>
	<header>
		<h1>Dashboard</h1>
		<form action="{{ route('logout') }}" method="POST">
			@csrf
			<button type="submit">Logout</button>
		</form>
	</header>

	<hr>

	<h3>Welcome, {{ Auth::user()->name }} 🎉</h3>
	<p>Your email: {{ Auth::user()->email }}</p>
</body>

</html>