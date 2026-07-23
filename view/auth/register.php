<?php include 'view/layouts/header.php'; ?>

<div class="container py-5">

    <div class="auth-card">

        <h2 class="mb-4 text-center">
            Register
        </h2>

        <form method="POST">

            <input type="hidden"
                   name="csrf_token"
                   value="<?php echo $_SESSION['csrf_token']; ?>">

            <div class="row">

                <!-- FULL NAME -->

                <div class="col-md-6 mb-3">

                    <label>Full Name</label>

                    <input type="text"
                           name="full_name"
                           class="form-control"
                           required>

                </div>

                <!-- EMAIL -->

                <div class="col-md-6 mb-3">

                    <label>Email</label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           required>

                </div>

                <!-- PHONE -->

                <div class="col-md-6 mb-3">

                    <label>Phone</label>

                    <input type="text"
                           name="phone"
                           class="form-control"
                           required>

                </div>

                <!-- ROLE -->

                <div class="col-md-6 mb-3">

                    <label>Role</label>

                    <select name="role"
                            id="role"
                            class="form-select"
                            onchange="toggleRoleFields()"
                            required>

                        <option value="">
                            Select Role
                        </option>

                        <option value="patient">
                            Patient
                        </option>

                        <option value="doctor">
                            Doctor
                        </option>

                    </select>

                </div>

                <!-- PASSWORD -->

                <div class="col-md-6 mb-3">

                    <label>Password</label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           required>

                </div>

                <!-- CONFIRM PASSWORD -->

                <div class="col-md-6 mb-3">

                    <label>Confirm Password</label>

                    <input type="password"
                           name="confirm_password"
                           class="form-control"
                           required>

                </div>

            </div>

            <!-- ========================= -->
            <!-- DOCTOR FIELDS -->
            <!-- ========================= -->

            <div id="doctor-fields" style="display:none;">

                <hr>

                <h4 class="mb-3">
                    Doctor Information
                </h4>

                <div class="mb-3">

                    <label>Specialization</label>

                    <input type="text"
                           name="specialization"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label>Degree</label>

                    <input type="text"
                           name="degree"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label>Experience</label>

                    <input type="text"
                           name="experience"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label>Chamber Address</label>

                    <textarea name="chamber_address"
                              class="form-control"></textarea>

                </div>

            </div>

            <!-- ========================= -->
            <!-- PATIENT FIELDS -->
            <!-- ========================= -->

            <div id="patient-fields" style="display:none;">

                <hr>

                <h4 class="mb-3">
                    Patient Information
                </h4>

                <div class="mb-3">

                    <label>Gender</label>

                    <select name="gender"
                            class="form-select">

                        <option value="Male">
                            Male
                        </option>

                        <option value="Female">
                            Female
                        </option>

                        <option value="Other">
                            Other
                        </option>

                    </select>

                </div>

                <div class="mb-3">

                    <label>Age</label>

                    <input type="number"
                           name="age"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label>Address</label>

                    <textarea name="address"
                              class="form-control"></textarea>

                </div>

            </div>

            <!-- BUTTON -->

            <button type="submit"
                    class="btn btn-success w-100 mt-4">

                Register

            </button>

        </form>

    </div>

</div>

<!-- ========================= -->
<!-- JAVASCRIPT -->
<!-- ========================= -->

<script>

function toggleRoleFields()
{
    let role =
        document.getElementById('role').value;

    let doctorFields =
        document.getElementById('doctor-fields');

    let patientFields =
        document.getElementById('patient-fields');

    doctorFields.style.display = 'none';
    patientFields.style.display = 'none';

    if(role === 'doctor')
    {
        doctorFields.style.display = 'block';
    }

    if(role === 'patient')
    {
        patientFields.style.display = 'block';
    }
}

</script>

<?php include 'view/layouts/footer.php'; ?>