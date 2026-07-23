<?php include 'view/layouts/header.php'; ?>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card shadow border-0">

                <div class="card-body p-4">

                    <h2 class="text-center mb-4">
                        Login
                    </h2>

                    <?php if(isset($_SESSION['error'])): ?>

                        <div class="alert alert-danger">

                            <?php
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            ?>

                        </div>

                    <?php endif; ?>

                    <?php if(isset($_SESSION['success'])): ?>

                        <div class="alert alert-success">

                            <?php
                                echo $_SESSION['success'];
                                unset($_SESSION['success']);
                            ?>

                        </div>

                    <?php endif; ?>

                    <form method="POST"
                          action="index.php?page=login">

                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Password
                            </label>

                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Role
                            </label>

                            <select name="role"
                                    class="form-select"
                                    required>

                                <option value="">
                                    Select Role
                                </option>

                                <option value="admin">
                                    Admin
                                </option>

                                <option value="doctor">
                                    Doctor
                                </option>

                                <option value="patient">
                                    Patient
                                </option>

                            </select>

                        </div>

                        <button type="submit"
                                class="btn btn-primary w-100">

                            Login

                        </button>

                    </form>

                    <div class="text-center mt-3">

                        <a href="index.php?page=register">
                            Create Account
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?php include 'view/layouts/footer.php'; ?>