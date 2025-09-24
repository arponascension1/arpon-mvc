<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Arpon Mvc</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in {
            animation: fadeIn 1s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gray-900 text-white flex items-center justify-center h-screen">
    <div class="text-center fade-in">
        <h1 class="text-5xl font-bold mb-4 animate-pulse">Welcome to Arpon Mvc</h1>
        <p class="text-lg text-gray-400 mb-8 animate-bounce">A fresh start for your next big idea.</p>
        <div class="flex justify-center space-x-6">
            <a href="#" class="text-gray-400 hover:text-white transform hover:scale-125 transition-transform duration-300"><i class="fab fa-github fa-2x"></i></a>
            <a href="#" class="text-gray-400 hover:text-white transform hover:scale-125 transition-transform duration-300"><i class="fab fa-twitter fa-2x"></i></a>
            <a href="#" class="text-gray-400 hover:text-white transform hover:scale-125 transition-transform duration-300"><i class="fab fa-linkedin fa-2x"></i></a>
        </div>
    </div>
</body>
</html>