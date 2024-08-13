<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
        .register-container {
            padding: 2rem;
            background-color: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .register-container h2 {
            margin-bottom: 1.5rem;
            font-weight: bold;
            color: #333;
        }
        .register-container .input-field {
            margin-bottom: 1rem;
        }
        .register-container .btn {
            width: 100%;
        }
        .error-message {
            color: #e53935;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .register-container a span {
            color: #d32f2f; 
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="register-container z-depth-3">
        <h2>Dom Coxitos</h2>
        <h4>Registro</h4>
        <!-- Mensagens de erro -->
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="error-message">
                    {{$error}}
                </div>
            @endforeach
        @endif
        <!-- Formulário de Registro -->
        <form action="{{route('users.store')}}" method="post">
            @csrf
            <div class="input-field">
                <input type="text" name="firstName" id="firstName" class="validate" required>
                <label for="firstName">Nome</label>
            </div>
            <div class="input-field">
                <input type="text" name="lastName" id="lastName" class="validate" required>
                <label for="lastName">Sobrenome</label>
            </div>
            <div class="input-field">
                <input type="email" name="email" id="email" class="validate" required>
                <label for="email">Email</label>
            </div>
            <div class="input-field">
                <input type="password" name="password" id="password" class="validate" required>
                <label for="password">Senha</label>
            </div>
            <button type="submit" class="btn waves-effect yellow darken-3">Cadastrar</button>
            <div class="register-container">
                <a href="{{ route('login.form') }}" class="btn-flat waves-effect">Já tem uma conta? <span>Faça login</span></a>
            </div>
        </form>
    </div>

    <!-- Adicionando o Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
