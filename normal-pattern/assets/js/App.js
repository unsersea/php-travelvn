// var SELECT2;
var SELECT2_BOOTSTRAP4_US;
var CHANGE_AMOUNT;

(function () {
  SELECT2_BOOTSTRAP4_US = function select2bs4us() {
    if (document.querySelector("#select2-schedule-booking-create")) {
      try {
        return $("#select2-schedule-booking-create").select2({
          theme: "bootstrap4",
          placeholder: "Chọn Lịch Trình",
          allowClear: true,
          dropdownParent: $("#modal-create-booking"),
        });
      } catch (ex) {
        return console.log(ex);
      }
    }
  };

  CHANGE_AMOUNT = function change_amount() {
    var amount_person = $("#amount_person");
    var amount_children = $("#amount_children");

    var price_person = $("#price_person_booking_create");
    var price_children = $("#price_children_booking_create")

    $(amount_children, amount_person).change(function() {
      
    });

  }
})(jQuery);

SELECT2_BOOTSTRAP4_US();
CHANGE_AMOUNT();