$(document).ready(function () {
  $(document).on("keyup", ".only_numeric", function () {
    this.value = this.value.replace(/[^0-9\.]/g, "");
  });

  $(".form").submit(function (e) {
    e.preventDefault();

    let formIds = $(this).attr("id");
    let datas = $(this).serialize();
    let datas2 = new FormData(this);
    let message = "Inserted Succesfully";

    $.ajax({
      type: "POST",
      url: $(this).attr("action"),

      data: datas2,
      contentType: false,
      processData: false,

      success: function (res) {
        // $("#message").removeClass("d-none").text(message);
        // alert("Inserted Successfully");
        alertify.set("notifier", "position", "top-right");
        alertify.success("Inserted Successfully");
        $("form")[0].reset();
        console.log(res);
      },

      error: function (xhr, status, error) {
        console.log(xhr);

        let errors = xhr.responseJSON;
        console.log(errors);
        // let message = "This field is required";
        // let message2 = "Category already exit";
        let response = "<div class='alert alert-danger ps-3'><ul>";
        $.each(errors, (key, err) => {
          response += `<li>${err}</li>`;
          console.log(key);
          $("#" + key + "Error")
            .removeClass("d-none")
            .text(err);
        });
        // errorResponse += "</ul></div>";
        response += "</ul></div>";
      },
    });
  });
  $(".forms").submit(function (e) {
    e.preventDefault();

    let formIds = $(this).attr("id");
    let datas = $(this).serialize();
    let datas2 = new FormData(this);
    let message = "Inserted Succesfully";

    $.ajax({
      type: "POST",
      url: $(this).attr("action"),

      data: datas2,
      contentType: false,
      processData: false,

      success: function (res) {
        // $("#message").removeClass("d-none").text(message);
        // alert("Inserted Successfully");
        alertify.set("notifier", "position", "top-right");
        alertify.success("Inserted Successfully");
        $("form")[0].reset();
        console.log(res);
      },

      error: function (xhr, status, error) {
        console.log(xhr);

        let errors = xhr.responseJSON;
        console.log(errors);
        // let message = "This field is required";
        // let message2 = "Category already exit";
        let response = "<div class='alert alert-danger ps-3'><ul>";
        $.each(errors, (key, err) => {
          response += `<li>${err}</li>`;
          console.log(key);
          $("#" + key + "Error")
            .removeClass("d-none")
            .text(err);
        });
        // errorResponse += "</ul></div>";
        response += "</ul></div>";
      },
    });
  });

  $(".addToCartBtn").click(function (e) {
    e.preventDefault();

    let qty = $(this).closest(".product-cart").find(".input-qty").val();
    let pid = $(this).val();

    $.ajax({
      method: "POST",
      url: "functions/handle_cart.php",
      data: {
        "pid": pid,
        "qty": qty,
        "scope": "add"
      },
      success: function (res){
        if(res == 201){
          console.log(res)
          alertify.success("Product added to cart");
        }
        else if(res == 401){
          alertify.success("Log in to continue");
        }
        else if(res == 500){
          alertify.success("Something went wrong");
        }
      }
    })
  });
});
