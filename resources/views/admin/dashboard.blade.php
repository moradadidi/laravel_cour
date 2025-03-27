<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <h1>Welcome {{ $user->name }} ,  to the Admin Dashboard</h1>
        <div class="card">
            <div class="card-header">
                Dashboard
            </div>
            <div class="card-body">
                <p>This is the admin dashboard. You can manage your application here.</p>
                <a href="{{ route('accueil') }}" class="btn btn-primary">Manage Users</a><br>
                <a href="{{ route('accueil') }}" class="btn btn-secondary">Settings</a>

                @if ($user)
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                @else
                    <p>No user found.</p>
                @endif
            </div>

        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
