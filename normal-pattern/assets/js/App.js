var SELECT2;
var SELECT2_BOOTSTRAP4;

(function () {
  SELECT2_BOOTSTRAP4 = function select2bs4() {
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
})(jQuery);

SELECT2_BOOTSTRAP4();