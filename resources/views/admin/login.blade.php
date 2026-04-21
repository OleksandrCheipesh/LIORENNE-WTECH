<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin — Liorenne</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:wght@400;700&family=Jost:wght@300;400;500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('styles/css/admin.css') }}" />
</head>
<body class="login-page">

<div class="login-wrap">
  <div class="login-brand">LIORENNE</div>
  <p class="login-subtitle">Administrator Portal</p>

  <form class="login-form" action="{{ route('admin.login.submit') }}" method="POST">
    @csrf

    <div class="field">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="admin@liorenne.com" required />
    </div>

    <div class="field">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="••••••••" required />
    </div>

    @if ($errors->any())
      <p style="color: red; font-size: 0.85rem; margin-bottom: 0.5rem;">{{ $errors->first() }}</p>
    @endif

    <button type="submit" class="btn-login">Sign In</button>
  </form>
</div>

</body>
</html>