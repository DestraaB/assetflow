<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; padding-top: 70px; }
        .navbar-custom { background-color: #0f172a; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .navbar-custom .nav-link { color: #cbd5e1; font-weight: 500; padding: 0.5rem 1rem; transition: 0.3s; }
        .navbar-custom .nav-link:hover, .navbar-custom .nav-link.active { color: #fff; }
        .asset-card { border: none; border-radius: 12px; transition: transform 0.2s, box-shadow 0.2s; overflow: hidden; }
        .asset-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.08); }
        .asset-img { height: 180px; object-fit: cover; width: 100%; border-bottom: 1px solid #f1f5f9; }
    </style>
</head>
<body>