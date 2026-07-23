$(document).ready(function () {

    $('#doctor_id').change(function () {

        let doctorId = $(this).val();

        $.ajax({
            url: 'index.php?page=get-schedules',
            method: 'POST',
            data: {
                doctor_id: doctorId
            },
            success: function (response) {
                $('#schedule_box').html(response);
            }
        });
    });
});