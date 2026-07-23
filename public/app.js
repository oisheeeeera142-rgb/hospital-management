/* Sidebar Toggle */

const sidebarToggle = document.querySelector(".sidebar-toggle");

if (sidebarToggle) {

    sidebarToggle.addEventListener("click", () => {

        document.querySelector(".sidebar")
            .classList.toggle("active");
    });
}

/* SweetAlert Flash Messages */

const successMessage =
    document.querySelector("#success-message");

if (successMessage) {

    Swal.fire({
        icon: 'success',
        title: successMessage.value,
        showConfirmButton: false,
        timer: 2000
    });
}

const errorMessage =
    document.querySelector("#error-message");

if (errorMessage) {

    Swal.fire({
        icon: 'error',
        title: errorMessage.value,
        showConfirmButton: false,
        timer: 2000
    });
}

/* Register Role Toggle */

const roleSelect = document.getElementById("role");

if (roleSelect) {

    roleSelect.addEventListener("change", function () {

        const doctorFields =
            document.getElementById("doctorFields");

        if (this.value === "doctor") {

            doctorFields.style.display = "block";

        } else {

            doctorFields.style.display = "none";
        }
    });
}

/* Confirm Delete */

function confirmDelete() {

    return confirm("Are you sure?");
}

/* Appointment Filter */

const filterInput =
    document.getElementById("appointmentFilter");

if (filterInput) {

    filterInput.addEventListener("keyup", function () {

        const value =
            this.value.toLowerCase();

        const rows =
            document.querySelectorAll("tbody tr");

        rows.forEach(row => {

            row.style.display =
                row.innerText.toLowerCase()
                    .includes(value)
                    ? ""
                    : "none";
        });
    });

    /* Doctor Schedule Load */

    document.addEventListener('DOMContentLoaded', function () {

        let doctorSelect =
            document.getElementById('doctorSelect');

        if (doctorSelect) {

            doctorSelect.addEventListener('change', function () {

                let doctorId = this.value;

                fetch(
                    'index.php?page=get-schedules&doctor_id='
                    + doctorId
                )

                    .then(response => response.json())

                    .then(data => {

                        let scheduleSelect =
                            document.getElementById(
                                'scheduleSelect'
                            );

                        scheduleSelect.innerHTML =
                            '<option value="">Select Schedule</option>';

                        data.forEach(schedule => {

                            let option =
                                document.createElement('option');

                            option.value = schedule.id;

                            option.text =
                                schedule.available_date
                                + ' | '
                                + schedule.start_time
                                + ' - '
                                + schedule.end_time;

                            option.setAttribute(
                                'data-date',
                                schedule.available_date
                            );

                            option.setAttribute(
                                'data-time',
                                schedule.start_time
                            );

                            scheduleSelect.appendChild(option);
                        });

                    });

            });

            document
                .getElementById('scheduleSelect')

                .addEventListener('change', function () {

                    let selected =
                        this.options[this.selectedIndex];

                    document.getElementById(
                        'appointmentDate'
                    ).value =
                        selected.getAttribute('data-date');

                    document.getElementById(
                        'appointmentTime'
                    ).value =
                        selected.getAttribute('data-time');

                });
        }

    });
}