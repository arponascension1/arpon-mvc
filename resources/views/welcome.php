<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arpon Framework</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(-45deg, #667eea, #764ba2, #f093fb, #4facfe);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.95);
            padding: 60px 50px;
            border-radius: 30px;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.3);
            max-width: 700px;
            width: 90%;
            animation: fadeInUp 1s ease;
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
        }
        
        .container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(102, 126, 234, 0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }
        
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .content {
            position: relative;
            z-index: 1;
        }
        
        h1 {
            font-size: 3.5em;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 20px;
            font-weight: 800;
            animation: slideIn 1s ease 0.2s both;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .version-badge {
            display: inline-block;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 10px 25px;
            border-radius: 30px;
            font-size: 1em;
            margin: 20px 0 30px;
            font-weight: 600;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
            animation: pulse 2s ease infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .subtitle {
            font-size: 1.4em;
            color: #555;
            margin-bottom: 40px;
            line-height: 1.6;
            animation: fadeIn 1s ease 0.4s both;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            margin: 40px 0;
        }
        
        .feature-card {
            padding: 25px 20px;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            border-radius: 20px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            animation: fadeInScale 0.6s ease backwards;
            cursor: pointer;
            border: 2px solid transparent;
        }
        
        .feature-card:nth-child(1) { animation-delay: 0.5s; }
        .feature-card:nth-child(2) { animation-delay: 0.6s; }
        .feature-card:nth-child(3) { animation-delay: 0.7s; }
        .feature-card:nth-child(4) { animation-delay: 0.8s; }
        .feature-card:nth-child(5) { animation-delay: 0.9s; }
        .feature-card:nth-child(6) { animation-delay: 1s; }
        
        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        .feature-card:hover {
            transform: translateY(-10px) scale(1.05);
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.3);
            border-color: #667eea;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .feature-card:hover .feature-icon {
            transform: scale(1.2) rotate(10deg);
        }
        
        .feature-card:hover .feature-title,
        .feature-card:hover .feature-desc {
            color: white;
        }
        
        .feature-icon {
            font-size: 2.5em;
            margin-bottom: 15px;
            display: block;
            transition: transform 0.4s ease;
        }
        
        .feature-title {
            font-weight: 700;
            color: #667eea;
            margin-bottom: 8px;
            font-size: 1.1em;
            transition: color 0.3s ease;
        }
        
        .feature-desc {
            font-size: 0.9em;
            color: #666;
            transition: color 0.3s ease;
        }
        
        .action-buttons {
            margin-top: 50px;
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeIn 1s ease 1.2s both;
        }
        
        .btn {
            padding: 15px 40px;
            text-decoration: none;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1.1em;
            transition: all 0.3s ease;
            display: inline-block;
            position: relative;
            overflow: hidden;
        }
        
        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transition: width 0.6s, height 0.6s, top 0.6s, left 0.6s;
            transform: translate(-50%, -50%);
        }
        
        .btn:hover::before {
            width: 300px;
            height: 300px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.5);
        }
        
        .btn-secondary {
            background: white;
            color: #667eea;
            border: 3px solid #667eea;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .btn-secondary:hover {
            background: #667eea;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.3);
        }
        
        .footer {
            margin-top: 50px;
            padding-top: 30px;
            border-top: 2px solid rgba(102, 126, 234, 0.2);
            font-size: 1em;
            color: #888;
            animation: fadeIn 1s ease 1.4s both;
        }
        
        .footer a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        
        .footer a:hover {
            color: #764ba2;
        }
        
        .floating-shapes {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 0;
            pointer-events: none;
        }
        
        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 20s ease-in-out infinite;
        }
        
        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }
        
        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            left: 80%;
            animation-delay: 2s;
        }
        
        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            top: 80%;
            left: 20%;
            animation-delay: 4s;
        }
        
        .shape:nth-child(4) {
            width: 100px;
            height: 100px;
            top: 20%;
            left: 85%;
            animation-delay: 6s;
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
                opacity: 0.3;
            }
            50% {
                transform: translateY(-50px) rotate(180deg);
                opacity: 0.6;
            }
        }
        
        @media (max-width: 768px) {
            h1 { font-size: 2.5em; }
            .subtitle { font-size: 1.1em; }
            .container { padding: 40px 30px; }
            .features-grid { grid-template-columns: 1fr; }
            .action-buttons { flex-direction: column; }
            .btn { width: 100%; }
        }
    </style>
</head>
<body>
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    
    <div class="container">
        <div class="content">
            <h1>Arpon</h1>
            <div class="version-badge">v1.0.0</div>
            <p class="subtitle">
                A Modern Laravel-Inspired PHP Framework
            </p>
            
            <div class="features-grid">
                <div class="feature-card">
                    <span class="feature-icon">🚀</span>
                    <div class="feature-title">Advanced Routing</div>
                    <div class="feature-desc">Resource routes & model binding</div>
                </div>
                <div class="feature-card">
                    <span class="feature-icon">🗄️</span>
                    <div class="feature-title">Eloquent ORM</div>
                    <div class="feature-desc">Powerful database layer</div>
                </div>
                <div class="feature-card">
                    <span class="feature-icon">🔐</span>
                    <div class="feature-title">Authentication</div>
                    <div class="feature-desc">Built-in security system</div>
                </div>
                <div class="feature-card">
                    <span class="feature-icon">⚡</span>
                    <div class="feature-title">Middleware</div>
                    <div class="feature-desc">Request/response pipeline</div>
                </div>
                <div class="feature-card">
                    <span class="feature-icon">🎨</span>
                    <div class="feature-title">View Engine</div>
                    <div class="feature-desc">Template with layouts</div>
                </div>
                <div class="feature-card">
                    <span class="feature-icon">✅</span>
                    <div class="feature-title">Validation</div>
                    <div class="feature-desc">Comprehensive rules</div>
                </div>
            </div>
            
            <div class="action-buttons">
                <a href="https://github.com/arponascension1/arpon-framwork" class="btn btn-primary" target="_blank">
                    📚 Documentation
                </a>
                <a href="https://github.com/arponascension1/arpon-mvc" class="btn btn-secondary" target="_blank">
                    💻 GitHub
                </a>
            </div>
            
            <div class="footer">
                Built with ❤️ by <a href="https://github.com/arponascension1" target="_blank">Arpon Ascension</a>
            </div>
        </div>
    </div>
</body>
</html>
