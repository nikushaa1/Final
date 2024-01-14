<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Platform</title>

  
</head>
<body>
    <header>
        <h1>Quiz Platform</h1>
        
    </header>

    <main>
        @yield('content') 
    </main>

    <footer>

        <p>&copy; {{ date('Y') }} Quiz Platform</p>
    </footer>
</body>
</html>

