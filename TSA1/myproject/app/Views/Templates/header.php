<?php /** @var string $title */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Tasks for Today') ?></title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- F1 Racing Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=Racing+Sans+One&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --f1-navy: #0B192C;
            --f1-dark-navy: #060E1A;
            --f1-card-bg: #1E2E45;
            --f1-accent-blue: #0075FF;
            --f1-light-blue: #00D2FF;
            --f1-racing-red: #E10600;
            --f1-text: #f6f6f6;
            --f1-muted: #94A3B8;
        }

        body {
            background-color: var(--f1-dark-navy);
            color: var(--f1-text);
            font-family: 'Montserrat', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* F1 Navy Header Navigation */
        .navbar-f1 {
            background: linear-gradient(180deg, #0f233f 0%, var(--f1-navy) 100%);
            border-bottom: 3px solid var(--f1-racing-red);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.6);
        }

        .navbar-brand {
            font-family: 'Racing Sans One', cursive;
            font-size: 1.5rem;
            color: #FFFFFF !important;
            letter-spacing: 1px;
        }

        .nav-link {
            color: var(--f1-muted) !important;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--f1-light-blue) !important;
        }

        /* F1 Styled UI Elements */
        .card-f1 {
            background-color: var(--f1-card-bg);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 10px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
        }

        /* F1 Dark Input Controls & Date Picker Fixes */
        .form-control-f1, 
        input[type="date"].form-control-f1 {
            background-color: #111C2D !important;
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
            color: #FFFFFF !important;
        }

        .form-control-f1::placeholder {
            color: #94A3B8 !important;
            opacity: 1;
        }

        .form-control-f1:focus {
            background-color: #0E1726 !important;
            border-color: #00D2FF !important;
            color: #FFFFFF !important;
            box-shadow: 0 0 0 0.2rem rgba(0, 210, 255, 0.25) !important;
        }

        /* Calendar icon white inversion */
        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
            cursor: pointer;
        }

        /* F1 Styled Primary Button */
        .btn-f1-add {
            background: linear-gradient(90deg, #0075FF, #00D2FF);
            border: none;
            color: #FFFFFF !important;
            font-weight: 700;
            letter-spacing: 0.5px;
            transition: all 0.2s ease-in-out;
        }

        .btn-f1-add:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-f1 py-3 mb-4">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url() ?>">
            <i class="fa-solid fa-flag-checkered me-2"></i>Tasks for Today
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>">Today's Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('tasks') ?>">All Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('profile') ?>">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('about') ?>">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container flex-grow-1">