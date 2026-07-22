<!DOCTYPE html>
<html lang="id" class="light-style layout-menu-fixed">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Web SMKN 11</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Public Sans', sans-serif;
            background-color: #f5f5f9; /* Warna background khas Sneat */
        }
        .card {
            border: 0;
            box-shadow: 0 2px 6px 0 rgba(67, 89, 113, 0.12);
        }
    </style>
</head>
<body>

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            
            <div class="layout-page">
                
                <div class="content-wrapper">
                    
                    @yield('content')
                    
                </div>

            </div>
        </div>
    </div>

</body>
</html>