$(document).ready(function () {
    $("#search").on("keyup", function () {
        let query = $(this).val().toLowerCase();
        $(".box").each(function () {
            let roomName = $(this).data("room-name");
            let roomDesc = $(this).data("room-desc");
            let roomid = $(this).data("room-id");
            if (
                roomName.includes(query) ||
                roomDesc.includes(query) ||
                roomid.includes(query)
            ) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});
