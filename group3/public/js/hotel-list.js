/**
 * To set data table
 */
 $(document).ready(function() {
    const hotelTable = $("#hotel-list").DataTable({
        sDom: "lrtip"
    });

    $("#search-click").click(function() {
      hotelTable.search($("#search-keyword").val()).draw();
    });
});

/**
 * To show hotel detail
 * @param {Object} hotelInfo hotelinfo
 * @returns void
 */
function showHotelDetail(hotelInfo) {
    $("#hotel-detail #hotel-name").text(hotelInfo.hotel_name);
    $("#hotel-detail #hotel-description").text(hotelInfo.description);
    $("#hotel-detail #hotel-phone").text(hotelInfo.phone);
    $("#hotel-detail #hotel-location").text(hotelInfo.location);
}

/**
 * To show hotel delete confirm
 * @param {Object} hotelInfo hotelInfo
 * @returns void
 */
function showDeleteConfirm(hotelInfo) {
    $("#hotel-delete #hotel-id").text(hotelInfo.id);
    $("#hotel-delete #hotel-name").text(hotelInfo.hotel_name);
    $("#hotel-delete #hotel-description").text(hotelInfo.description);
    $("#hotel-delete #hotel-phone").text(hotelInfo.phone);
    $("#hotel-delete #hotel-location").text(hotelInfo.location);
}

/**
 * To delete hotel by id
 * @returns void
 */
async function deleteHotelById(csrf_token) {
    axios
            .delete(`/hotels/delete/${this.userInfo.id}`)
            .then(response => {
                location.reload();
            })
            .catch(err => {
                console.log(err);
            });
        this.isDeleteDialog = false;
        this.dialog = false;
    await $.ajax({
        url: "/hotels/delete/" + $("#hotel-delete #hotel-id").text(),
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
