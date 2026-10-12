<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
/* --- SIDEBAR STYLING MODERN SaaS --- */
        #sidebar { 
            min-width: 260px; max-width: 260px; min-height: 100vh; 
            background-color: #0b1121; /* Warna navy sangat gelap */
            color: #94a3b8; 
            transition: all 0.3s ease; 
            box-shadow: 4px 0 10px rgba(0,0,0,0.02); 
            z-index: 10; 
        }
        #sidebar .sidebar-header { 
            padding: 30px 20px; text-align: center; font-weight: 800; 
            font-size: 1.7rem; color: #fff; letter-spacing: 0.5px; 
        }
        #sidebar .sidebar-header span { color: #3b82f6; }
        
        .sidebar-menu { padding: 10px 15px; }
        .sidebar-heading { 
            font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; 
            font-weight: 700; color: #475569; margin: 25px 0 10px 15px; 
        }
        
        #sidebar ul li { margin-bottom: 6px; }
        #sidebar ul li a { 
            padding: 12px 18px; font-size: 0.95rem; color: #94a3b8; font-weight: 500;
            display: flex; align-items: center; text-decoration: none; 
            border-radius: 10px; /* Membuat sudut membulat / tidak kaku */
            transition: all 0.2s ease; 
        }
        #sidebar ul li a i { 
            width: 24px; font-size: 1.1rem; text-align: center; 
            margin-right: 12px; transition: all 0.2s ease; 
        }
        
        /* Efek saat cursor menyorot menu (Hover) */
        #sidebar ul li a:hover { 
            color: #f8fafc; background: #1e293b; 
            transform: translateX(4px); /* Bergeser ke kanan sedikit agar dinamis */
        }
        #sidebar ul li a:hover i { color: #3b82f6; }
        
        /* Efek menu yang sedang aktif dibuka */
        #sidebar ul li.active > a { 
            color: #fff; 
            background: linear-gradient(118deg, #3b82f6, #2563eb); 
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3); /* Efek glow */
        }
        #sidebar ul li.active > a i { color: #fff; }
        /* --- END SIDEBAR STYLING --- */

        /* Layout Tambahan */
        .wrapper { display: flex; align-items: stretch; }
        #content { width: 100%; padding: 0; min-height: 100vh; transition: all 0.3s; }
        .topbar { background: #fff; padding: 15px 25px; box-shadow: 0 2px 15px rgba(0,0,0,0.04); }
        .stat-card { border: none; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.03); transition: transform 0.2s; }
        .stat-card:hover { transform: translateY(-3px); }
        .icon-box { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; }
    </style>
</head>
<body>
    <div class="wrapper">