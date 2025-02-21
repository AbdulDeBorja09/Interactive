document.addEventListener("DOMContentLoaded", function () {
    const roomId = "{{ $item->room_id }}";

    function selectRoomById(roomId) {
        const rooms = document.querySelectorAll(".room");
        rooms.forEach((room) => {
            if (room.id === roomId) {
                room.classList.add("selected");
            } else {
                room.classList.remove("selected");
            }
        });
    }
    selectRoomById(roomId);
});
