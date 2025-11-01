<!DOCTYPE html><?php layout('layouts.app'); ?>

<html lang="en">

<head><?php section('content'); ?>

    <meta charset="UTF-8"><div class="text-center">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">    <h1 class="text-4xl font-bold text-gray-800">Welcome to Arpon MVC Framework!</h1>

    <title>Arpon Framework</title>    <p class="mt-4 text-lg text-gray-600">This is your starting page.</p>

    <style></div>

        * {<?php endSection(); ?>

            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
        }
        
        .container {
            text-align: center;
            background: white;
            padding: 60px 40px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            max-width: 600px;
            animation: fadeIn 0.8s ease-in;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        h1 {
            font-size: 3em;
            color: #667eea;
            margin-bottom: 20px;
            font-weight: 700;
        }
        
        .subtitle {
            font-size: 1.2em;
            color: #666;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        
        .version {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 0.9em;
            margin-bottom: 30px;
            font-weight: 500;
        }
        
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 40px;
            text-align: left;
        }
        
        .feature {
            padding: 15px;
            background: #f8f9fa;
            border-radius: 10px;
            border-left: 4px solid #667eea;
            transition: transform 0.3s ease;
        }
        
        .feature:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .feature-title {
            font-weight: 600;
            color: #667eea;
            margin-bottom: 5px;
        }
        
        .feature-desc {
            font-size: 0.85em;
            color: #666;
        }
        
        .links {
            margin-top: 40px;
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .btn {
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .btn-primary {
            background: #667eea;
            color: white;
        }
        
        .btn-primary:hover {
            background: #5568d3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .btn-secondary {
            background: white;
            color: #667eea;
            border: 2px solid #667eea;
        }
        
        .btn-secondary:hover {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
        }
        
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            font-size: 0.9em;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Arpon</h1>
        <div class="version">v1.0.0</div>
        <p class="subtitle">
            A Modern Laravel-Inspired PHP Framework
        </p>
        
        <div class="features">
            <div class="feature">
                <div class="feature-title">🚀 Routing</div>
                <div class="feature-desc">Advanced Laravel-style routing with resource routes</div>
            </div>
            <div class="feature">
                <div class="feature-title">🗄️ Eloquent ORM</div>
                <div class="feature-desc">Powerful database abstraction layer</div>
            </div>
            <div class="feature">
                <div class="feature-title">🔐 Authentication</div>
                <div class="feature-desc">Built-in auth system with guards</div>
            </div>
            <div class="feature">
                <div class="feature-title">⚡ Middleware</div>
                <div class="feature-desc">Flexible request/response pipeline</div>
            </div>
            <div class="feature">
                <div class="feature-title">🎨 Blade-like Views</div>
                <div class="feature-desc">Template engine with layouts</div>
            </div>
            <div class="feature">
                <div class="feature-title">✅ Validation</div>
                <div class="feature-desc">Comprehensive request validation</div>
            </div>
        </div>
        
        <div class="links">
            <a href="https://github.com/arponascension1/arpon-framwork" class="btn btn-primary" target="_blank">
                Documentation
            </a>
            <a href="https://github.com/arponascension1/arpon-mvc" class="btn btn-secondary" target="_blank">
                GitHub
            </a>
        </div>
        
        <div class="footer">
            Built with ❤️ by Arpon Ascension
        </div>
    </div>
</body>
</html>
