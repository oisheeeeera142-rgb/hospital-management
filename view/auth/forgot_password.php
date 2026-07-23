<?php include 'view/layouts/header.php'; ?>

<div class="auth-page">

    <div class="auth-card">

        <h2 class="text-center mb-4">
            Forgot Password
        </h2>

        <form method="POST">

            <div class="mb-3">

                <label>Email</label>

                <input type="email"
                    name="email"
                    class="form-control"
                    required>

            </div>

            <button class="btn btn-primary w-100">
                Send Reset Link
            </button>

        </form>

    </div>

</div>

<?php include 'view/layouts/footer.php'; ?>