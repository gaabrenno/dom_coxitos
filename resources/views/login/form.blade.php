<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Adicionando o Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #f7d542, #bd2c00);
        }
        .login-container {
            padding: 2rem;
            background-color: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .login-container h2 {
            margin-bottom: 1.5rem;
            font-weight: bold;
            color: #333;
        }
        .login-container h4 {
            margin-bottom: 1.5rem;
            font-weight: bold;
            color: #555;
        }
        .login-container .input-field {
            margin-bottom: 1rem;
        }
        .login-container .btn {
            width: 100%;
            margin-bottom: 1rem;
        }
        .error-message {
            color: #e53935;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .login-container .remember-me {
            margin-bottom: 1rem;
        }
        .login-container .register-container {
            text-align: center;
            margin-top: 1rem;
        }
        .login-container .register-container a span {
            color: #d32f2f; /* Cor específica para o texto "Cadastre-se" */
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="login-container z-depth-3">
        <div style="display: flex; justify-content: center;">
            <img src="{{asset('img/logo_dom_coxitos.png')}}" alt="Dom Coxitos" style="max-width: 300px;">
        </div>
        <h4>Login</h4>
        <!-- Mensagens de erro -->
        @if($mensagem = Session::get('erro'))
            <div class="error-message">
                {{$mensagem}}
            </div>
        @endif
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="error-message">
                    {{$error}}
                </div>
            @endforeach
        @endif
        <!-- Formulário de Login -->
        <form action="{{route('login.auth')}}" method="post">
            @csrf
            <div class="input-field">
                <input type="email" name="email" id="email" class="validate" required>
                <label for="email">Email</label>
            </div>
            <div class="input-field">
                <input type="password" name="password" id="password" class="validate" required>
                <label for="password">Senha</label>
            </div>
            <div class="remember-me">
                <label>
                    <input type="checkbox" name="remember">
                    <span>Lembrar-me</span>
                </label>
            </div>
            <button type="submit" class="btn waves-effect yellow darken-3">Entrar</button>
        </form>
        <div class="register-container">
            <a href="{{ route('login.create') }}" class="btn-flat waves-effect">Não tem uma conta? <span>Cadastre-se</span></a>
        </div>
    </div>

    <!-- Adicionando o Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
