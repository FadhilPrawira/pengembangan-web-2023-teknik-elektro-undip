<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= isset($meta['title']) ? $meta['title'] : 'mahasiswa.com' ?></title>

<style>
	.navbar {
		display: flex;
		gap: 1em;
		background-color: teal;
	}

	.navbar a {
		font-family: sans-serif;
		font-weight: 500;
		color: white;
		text-decoration: none;
		padding: 1rem;
	}

	.navbar a:hover {
		background-color: rgba(255, 255, 255, 0.1);
	}

	.footer {
		font-family: sans-serif;
		background-color: whitesmoke;
		padding: 1em;
		text-align: center;
		border-top: 1px solid lightgray;
	}
</style>