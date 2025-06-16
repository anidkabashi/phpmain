<DOCTYPE html>
    <html>
        <head>
            <?php include("header.php"); ?>
</head>
<body>

 <main class="d-flex align-items-center justify-content-center min-vh-100 bg-light">
        <div class="card shadow-sm p-4" style="max-width: 500px; width: 100%;">
            <form action="register.php" method="post" class="form-signin">
                <h2 class="mb-4 text-center">Create an Account</h2>


                <div class="mb-3">
                    <label for="name" class="form-label">First Name</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        class="form-control" 
                        placeholder="Enter your first name" 
                        required 
                        autofocus>
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">Last Name</label>
                    <input 
                        type="text" 
                        id="surname" 
                        name="surname" 
                        class="form-control" 
                        placeholder="Enter your last name" 
                        required>
                </div>


                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        class="form-control" 
                        placeholder="Choose a username" 
                        required>
                </div>
                <button class="btn btn-primary w-100" type="submit" name="submit">Sign Up</button>


                <div class="text-center mt-3">
                    <small>Already have an account? <a href="login.php">Log In</a></small>
                </div>


                <p class="text-center text-muted mt-4 mb-0">&copy; 2023 Digital School</p>
            </form>
        </div>
    </main>
    <button class="btn btn-primary w-100" type="submit" name="submit">Sign Up</button>


                <div class="text-center mt-3">
                    <small>Already have an account? <a href="login.php">Log In</a></small>
                </div>


                <p class="text-center text-muted mt-4 mb-0">&copy; 2023 Digital School</p>
            </form>
        </div>
    </main>
                


    <?php include("footer.php"); ?>
        </body>
    </html>