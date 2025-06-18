<DOCTYPE html>
    <html>
        <head>
            <?php include("header.php"); ?>
</head>
<body>
<main class="d-flex align-items-center justify-content-center min-vh-100 bg-light">
        <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%;">
            <form action="loginLogic.php" method="post" class="form-signin">
                <h2 class="mb-4 text-center">Sign In to Digital School</h2>


                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        class="form-control" 
                        placeholder="Enter your username" 
                        required 
                        autofocus>
                </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="form-control" 
                        placeholder="Enter your password" 
                        required>
                </div>
                  <button class="btn btn-primary w-100" type="submit" name="submit">Sign In</button>


                <div class="text-center mt-3">
                    <small>
                        Don't have an account? <a href="signup.php">Sign Up</a>
                    </small>
                </div>


                <p class="text-center text-muted mt-4 mb-0">&copy; 2023 Digital School</p>
            </form>
        </div>
    </main>



    <?php include("footer.php"); ?>
        </body>
    </html>