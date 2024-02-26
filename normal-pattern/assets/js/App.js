const TYPE_POST = "POST";
const TYPE_GET = "GET";

const URL_ACTION_VALIDATE = "../../views/action/";

// var SELECT2;
var SELECT2_BOOTSTRAP4_US;
var CHANGE_TOTAL;
var MODAL_BOOKING_USER;
var AMOUNT_VALIDATE;

Number.prototype.format = function (n, x) {
  var re = "\\d(?=(\\d{" + (x || 3) + "})+" + (n > 0 ? "\\." : "$") + ")";
  return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, "g"), "$&,");
};

(function () {
  // AMOUNT_VALIDATE = function amount_validate() {
  //   jQuery.validator.addMethod("NosLimit", function(value, element) {
  //     var amount_person = $("#form-create-booking #amount_person").val();
  //     var amount_children = $("#form-create-booking #amount_children").val();

  //     var total_amount = (Number(amount_person) + Number(amount_children));

  //     return this.optional(element) || value > total_amount;
  //   });
  // };

  // AMOUNT_VALIDATE = function amount_validate() {
  //   jQuery.validator.addMethod("maxAmount", function(value, element, param) {

  //       var amount_person = $("#form-create-booking #amount_person").val();
  //       var amount_children = $("#form-create-booking #amount_children").val();
  //       var total_amount = (Number(amount_person) + Number(amount_children));

  //       return total_amount <= param;

  //   }, "*Số Lượng Vượt Quá Mức Số Chỗ");
  // }

  // AMOUNT_VALIDATE = function amount_validate() {

  // };
  // jQuery.validator.addMethod(
  //   "amountLimit",
  //   function (value, element, params) {
  //     var $element = $("#form-create-booking .three-values-amount");

  //     var number_of_seat_amount = $element.eq(0).val();
  //     var person_amount = $element.eq(1).val();
  //     var children_amount = $element.eq(2).val();

  //     var isValid;

  //     $.ajax({
  //       url: "../../../normal-pattern/views/includes/validate/booking/validate_number_of_seat.php",
  //       type: TYPE_POST,
  //       data: {
  //         values: [number_of_seat_amount, person_amount, children_amount],
  //       },
  //       // dataType: "json",
  //       success: function (response) {
  //         // Assuming the server response is a boolean indicating validity
  //         isValid = response;
  //       },
  //     });

  //     return isValid;
  //   },
  //   "*Số Lượng Vượt Quá Mức Số Chỗ"
  // );

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

  CHANGE_TOTAL = function change_total() {
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

    $("#modal-create-booking").on("change keyup", function () {
      var cal_tl_ps = $("#cal-total-price-person").val().replace(/,|VNĐ/g, "");
      var cal_tl_chl = $("#cal-total-price-children")
        .val()
        .replace(/,|VNĐ/g, "");
      var cal_tl_pr = cal_total_price.val().replace(/,|VNĐ/g, "");

      var cal_tl = Number(cal_tl_ps) + Number(cal_tl_chl) + Number(cal_tl_pr);

      cal_total_all.val(cal_tl.format() + " VNĐ");

      // console.log(cal_tl);
    });
  };

  MODAL_BOOKING_USER = function modal_booking_user() {
    // var number_of_seat = Number($("#form-create-booking #number_of_seat").val());

    // var nos = Number($("#form-create-booking #number_of_seat").val());
    // Create
    const form_create_booking = $("#form-create-booking").validate({
      ignore: [],
      rules: {
        number_of_seat: {
          // remote: {
          //   url: "../../../normal-pattern/views/includes/validate/booking/validate_number_of_seat.php",
          //   type: TYPE_POST,
          //   data: {
          //     number_of_seat: function () {
          //       return $("#form-create-booking :input[name='number_of_seat']").val();
          //       // $("#form-create-booking :input[name='amount_person']").val();
          //       // $("#form-create-booking :input[name='amount_children']").val();
          //     },
          //   },
          // },

          // NosLimit: true,

          // range: [
          //   total_amount, nos
          // ]

          // maxAmount: number_of_seat,

          // amountLimit: true,
          remote: {
            url: "../../../normal-pattern/views/includes/validate/booking/validate_number_of_seat.php",
            type: TYPE_POST,
            data: {
              number_of_seat: function () {
                return $(
                  "#form-create-booking :input[name='number_of_seat']"
                ).val();
              },
              amount_person: function () {
                return $(
                  "#form-create-booking :input[name='amount_person']"
                ).val();
              },
              amount_children: function () {
                return $(
                  "#form-create-booking :input[name='amount_children']"
                ).val();
              },
            },
          },
        },
        schedule_id: {
          required: true,
        },
      },
      messages: {
        // number_of_seat: {
        //   // remote: "*Số Lượng Vượt Quá Mức Số Chỗ",
        //   // NosLimit: "*Số Lượng Vượt Quá Mức Số Chỗ",
        //   // range: "*Số Lượng Vượt Quá Mức Số Chỗ",
        //   maxAmount: "*Số Lượng Vượt Quá Mức Số Chỗ",
        // },
        // number_of_seat: {
        //   amountLimit: "*Số Lượng Vượt Quá Mức Số Chỗ",
        // },
        number_of_seat: {
          remote: "*Số Lượng Vượt Quá Mức Số Chỗ",
        },
        schedule_id: {
          required: "*Bạn Chưa Chọn Lịch Trình",
        },
      },
      errorPlacement: function (error, element) {
        if (element.attr("name") == "schedule_id") {
          error.insertAfter("#modal-create-booking span.select2");
        } else {
          error.insertAfter(element);
        }
      },
      submitHandler: function (form) {
        $.ajax({
          type: TYPE_POST,
          url: URL_ACTION_VALIDATE + "action_booking.php",
          data: new FormData(form),
          contentType: false,
          processData: false,
          // dataType: "json",
          // cache : false,
          success: function (data) {},
        });
      },
    });
  };
})(jQuery);

// AMOUNT_VALIDATE();
SELECT2_BOOTSTRAP4_US();
CHANGE_TOTAL();
MODAL_BOOKING_USER();
