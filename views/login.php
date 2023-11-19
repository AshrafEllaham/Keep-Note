<div class="wrapper">
<section class="form login">
    <header>Login</header>

    <!-- print errors -->
    <?php print_errors('login_errors') ?>
    
    <form action="/login/login" method="POST" autocomplete="off">
    <div class="error-text"></div>
    <div class="field input">
        <label>Email Address</label>
        <input type="text" name="email" placeholder="Enter your email" required>
    </div>
    <div class="field input">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter your password" required>
        <i class="fas fa-eye"></i>
    </div>
    <div class="field button">
        <button type="submit">Login</button>
    </div>
    </form>
    <div class="link">Not yet signed up? <a href="/signup">Signup now</a></div>
</section>
</div>