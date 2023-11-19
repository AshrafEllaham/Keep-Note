<div class="wrapper">
  <section class="form signup">
    <header>Signup</header>

    <!-- print errors -->
    <?php print_errors('signup_errors') ?>

    <form action="/signup/signup" method="POST" autocomplete="off" enctype="multipart/form-data">
      <div class="error-text"></div>
      <div class="name-details">
        <div class="field input">
          <label>First Name</label>
          <input type="text" name="fname" placeholder="First name" required> 
        </div>
        <div class="field input">
          <label>Last Name</label>
          <input type="text" name="lname" placeholder="Last name" required> 
        </div>
      </div>
      <div class="field input">
        <label>Email Address</label>
        <input type="text" name="email" placeholder="Enter your email" required> 
      </div>
      <div class="field input">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter new password" required> 
        <i class="fas fa-eye"></i>
      </div>
      
      <div class="field button">
        <button type="submit">Signup</button>
      </div>
    </form>
    <div class="link">Already signed up? <a href="/login">Login now</a></div>
  </section>
</div>