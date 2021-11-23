/**
 * To set data table
 */
 $(document).ready(function() {
    const roomTable = $("#room-list").DataTable({
        sDom: "lrtip"
    });

    $("#search-click").click(function() {
      roomTable.search($("#search-keyword").val()).draw();
    });
});

/**
 * To show room detail
 * @param {Object} roomInfo roominfo
 * @returns void
 */
function showRoomDetail(roomInfo) {
    $("#room-detail #hotel-id").text(roomInfo.hotel_id);
    $("#room-detail #room-number").text(roomInfo.room_number);
    $("#room-detail #room-type").text(roomInfo.room_type);
    $("#room-detail #service").text(roomInfo.service);
    $("#room-detail #price").text(roomInfo.price);
    $("#room-detail #status").text(roomInfo.status);
}

/**
 * To show room delete confirm
 * @param {Object} roomInfo roomInfo
 * @returns void
 */
function showDeleteConfirm(roomInfo) {
    $("#room-delete #room-id").text(roomInfo.id);
    $("#room-delete #hotel-id").text(roomInfo.hotel_id);
    $("#room-delete #room-number").text(roomInfo.room_number);
    $("#room-delete #room-type").text(roomInfo.room_type);
    $("#room-delete #service").text(roomInfo.service);
    $("#room-delete #price").text(roomInfo.price);
    $("#room-delete #status").text(roomInfo.status);
}

/**
 * To delete room by id
 * @returns void
 */
async function deleteRoomById(csrf_token) {
    axios
            .delete(`/rooms/delete/${this.userInfo.id}`)
            .then(response => {
                location.reload();
            })
            .catch(err => {
                console.log(err);
            });
        this.isDeleteDialog = false;
        this.dialog = false;
    await $.ajax({
        url: "/rooms/delete/" + $("#room-delete #room-id").text(),
        type: "DELETE",
        data: {
            _token: csrf_token
        },
        dataType: "text",
        success: function(result) {
            console.log(result);
            location.reload();
        }
    });
}
