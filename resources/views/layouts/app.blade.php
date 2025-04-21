<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
  />
    <style>
        /* Entry animation for cards */
        .fade-in-up {
          animation: fadeInUp 0.5s ease forwards;
          opacity: 0;
          transform: translateY(10px);
        }
        @keyframes fadeInUp {
          to {
            opacity: 1;
            transform: translateY(0);
          }
        }
        /* Navbar link underline animation */
        nav a {
          position: relative;
          padding-bottom: 0.25rem;
          transition: color 0.3s ease;
        }
        nav a::after {
          content: "";
          position: absolute;
          left: 0;
          bottom: 0;
          width: 0;
          height: 2px;
          background-color: #2563eb; /* Tailwind blue-600 */
          transition: width 0.3s ease;
        }
        nav a:hover {
          color: #2563eb;
        }
        nav a:hover::after {
          width: 100%;
        }
      </style>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>
<body class="bg-gray-50 font-inter min-h-screen flex flex-col">
    <x-navigation></x-navigation>

    <main class="flex-1 p-8 max-w-6xl mx-auto">

        @yield('content')
      </main>
    </div>
    
</body>
</html>

