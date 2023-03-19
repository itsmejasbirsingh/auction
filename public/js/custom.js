// Increment button click handler.
$(".increment-button").click(function () {
    var input = $(this).closest("form").find('input[name="usd"]');
    input.val(
        parseFloat(input.val() ? input.val() : 0) +
            parseInt($(this).attr("value"))
    );
    $(this).closest("form").submit();
});

// Place a bid handler.
$(".form-bid").on("submit", function (e) {
    e.preventDefault();
    var _this = $(this);
    if (_this.find('input[name="usd"]').val() < 0) {
        alert("Negative amount is not allowed!");
        return;
    }
    _this.closest("form").find("button").attr("disabled", "disabled");
    _this.closest(".auction").find(".status").html("Loading...");
    $.ajax({
        url: _this.attr("action"),
        type: "post",
        dataType: "json",
        data: _this.serialize(),
        success: function (data) {
            _this.closest(".auction").find(".status").text(data.winning_status);
            _this
                .closest(".auction")
                .find(".my-bid")
                .text("Total: " + data.my_bid + " USD");

            getMybids();
        },
        complete: function () {
            _this.closest("form").find("button").removeAttr("disabled");
        },
        error: function (e) {
            alert("Something went wrong!");
            _this.closest(".auction").find(".status").text("");
        },
    });
});

// My bids.
function getMybids() {
    $.ajax({
        url: "/bid",
        dataType: "json",
        success: function (data) {
            if (data.my_bids && data.my_bids.length) {
                $(".total-bid-table .counts").text(data.my_bids.length);

                let total = 0;
                $.each(data.my_bids, function (index, value) {
                    total += parseFloat(value.usd) * value.quantity;
                });

                $(".total-bid-table .usds").text("$" + total);
            } else {
                $(".total-bid-table .counts").text(0);
                $(".total-bid-table .usds").text("$0");
            }
        },
        complete: function () {},
    });
}

getMybids();
