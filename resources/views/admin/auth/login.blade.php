<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - VENDREDI SAINT</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .field-input {
            width: 100%; border: none; border-bottom: 1px solid rgba(128,113,79,0.3);
            background: transparent; padding: 10px 32px 10px 0; font-size: 14px;
            color: #2c2517; outline: none; transition: border-color 0.3s;
        }
        .field-input:focus { border-bottom-color: rgba(128,113,79,1); }
        .field-input::placeholder { color: rgba(128,113,79,0.35); font-size: 13px; }

        .btn-main {
            width: 100%; background: rgba(128,113,79,1); color: #f5f2ec; border: none;
            padding: 13px; font-size: 11px; letter-spacing: 0.22em;
            text-transform: uppercase; cursor: pointer;
            transition: background 0.2s, transform 0.15s;
        }
        .btn-main:hover { background: rgba(108,93,59,1); }
        .btn-main:active { transform: scale(0.98); }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">

    <div class="bg-white w-full max-w-sm px-10 py-12 border border-[rgba(128,113,79,0.15)] shadow-sm">

        <div class="text-center mb-8">
            <h1 class="text-2xl font-light tracking-[0.25em] text-[#2c2517]">VENDREDI SAINT</h1>
            <p class="text-[10px] tracking-widest uppercase text-[rgba(128,113,79,0.6)] mt-1">Admin Panel</p>
        </div>

        @if ($errors->any())
            <div class="border-l-2 border-red-400 bg-red-50 px-3 py-2 mb-6 text-xs text-red-700">
                @foreach ($errors->all() as $error) <p>{{ $error }}</p> @endforeach
            </div>
        @endif

        @if (session('success'))
            <div class="border-l-2 border-[rgba(128,113,79,0.7)] bg-[#f9f6ef] px-3 py-2 mb-6 text-xs text-[#5a4a1e]">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <div class="mb-6">
                <label class="block text-[10px] tracking-widest uppercase text-[rgba(128,113,79,0.8)] mb-2">Email</label>
                <input type="email" name="email" class="field-input" placeholder="email@example.com" value="{{ old('email') }}" required>
            </div>

            <div class="mb-8">
                <label class="block text-[10px] tracking-widest uppercase text-[rgba(128,113,79,0.8)] mb-2">Password</label>
                <div class="relative">
                    <input type="password" name="password" id="passwordInput" class="field-input" placeholder="••••••••" required>
                    <button type="button" onclick="togglePw()" class="absolute right-0 bottom-2.5 text-[rgba(128,113,79,0.45)] hover:text-[rgba(128,113,79,1)] transition">
                        <svg id="eyeOn" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        <svg id="eyeOff" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" style="display:none"><path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19M1 1l22 22"/></svg>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn-main">Masuk</button>
        </form>

        <a href="http://localhost:8000/" class="block text-center mt-6 text-[11px] tracking-widest uppercase text-[rgba(128,113,79,0.45)] hover:text-[rgba(128,113,79,1)] transition">
            ← Kembali ke Beranda
        </a>
    </div>

    <script>
        function togglePw() {
            const inp = document.getElementById('passwordInput');
            const isHidden = inp.type === 'password';
            inp.type = isHidden ? 'text' : 'password';
            document.getElementById('eyeOn').style.display = isHidden ? 'none' : 'block';
            document.getElementById('eyeOff').style.display = isHidden ? 'block' : 'none';
        }
    </script>
</body>
</html>