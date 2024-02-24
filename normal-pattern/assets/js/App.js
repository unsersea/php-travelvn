// var SELECT2;
var SELECT2_BOOTSTRAP4_US;
var CHANGE_AMOUNT;

Number.prototype.format = function (n, x) {
  var re = "\\d(?=(\\d{" + (x || 3) + "})+" + (n > 0 ? "\\." : "$") + ")";
  return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, "g"), "$&,");
};

(function () {
  SELECT2_BOOTSTRAP4_US = function select2bs4us() {
    if (document.querySelector("#select2-schedule-booking-create")) {
      try {
        return $("#select2-schedule-booking-create").select2({
          theme: "bootstrap4",
          placeholder: "Chọn Lịch Trình",
          allowClear: true,
          // dropdownParent: $("#modal-create-booking"),
        });
      } catch (ex) {
        return console.log(ex);
      }
    }
  };

  CHANGE_AMOUNT = function change_amount() {
    var amount_person = $("#amount_person");
    var price_person = $("#price_person_booking_create");

    var amount_children = $("#amount_children");
    var price_children = $("#price_children_booking_create");

    // Set Up
    var cal_person = $("#cal-total-price-person");
    var cal_children = $("#cal-total-price-children");

    var cal_total_price = $("#cal-total-price");
    var cal_total_all = $("#cal-total-all");

    // Total Person
    $(amount_person).change(function () {
      var cal_ps_ =
        amount_person.val() * price_person.val().replace(/,|VNĐ/g, "");

      cal_person.val(cal_ps_.format() + " VNĐ");
    });

    $(amount_children).change(function () {
      var cal_chl_ =
        amount_children.val() * price_children.val().replace(/,|VNĐ/g, "");

      cal_children.val(cal_chl_.format() + " VNĐ");
    });

    $("#modal-create-booking").on('change keyup' ,function () {
      var cal_tl_ps = $("#cal-total-price-person").val().replace(/,|VNĐ/g, "");
      var cal_tl_chl = $("#cal-total-price-children").val().replace(/,|VNĐ/g, "");
      var cal_tl_pr = cal_total_price.val().replace(/,|VNĐ/g, "");

      var cal_tl = (Number(cal_tl_ps) + Number(cal_tl_chl)) + Number(cal_tl_pr);

      cal_total_all.val(cal_tl.format() + " VNĐ");

      // console.log(cal_tl);
    });
  };
})(jQuery);

SELECT2_BOOTSTRAP4_US();
CHANGE_AMOUNT();
