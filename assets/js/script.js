$(document).ready(function () {
  $(document).on("keyup", ".only_numeric", function () {
    this.value = this.value.replace(/[^0-9\.]/g, "");
  });
  $(".refresh").load(location.href + " .refresh");

  $(".form").submit(function (e) {
    e.preventDefault();

    let formIds = $(this).attr("id");
    let datas = $(this).serialize();
    let datas2 = new FormData(this);
    let message = "Inserted Succesfully";

    switch (formIds) {
      case "register":
        $.ajax({
          url: $(this).attr("action"),
          type: "post",
          data: datas,
          success: function (res) {
            // alert("Registered Successfully");
            alertify.set("notifier", "position", "top-right");
            alertify.success("Registered Successfully");
            setTimeout(() => {
              window.location = "login.php";
            }, 1000);
            // $("Form")[0].reset();
            // window.location = "login.php";

            // console.log(data.message);
            console.log(res);
          },

          error: function (xhr, status, error) {
            console.log(xhr);

            let errors = xhr.responseJSON;
            console.log(xhr.responseJSON);
            let errorResponse = '<div class="alert alert-danger ps-3"><ul>';
            $.each(errors, (key, err) => {
              errorResponse += `<li>${err}</li>`;
              console.log(key);
              $("#" + key + "Error")
                .removeClass("d-none")
                .text(err);
            });
            errorResponse += "</ul></div>";
            $("#" + key + "Error").reset();
          },
        });
        break;

      case "staffForm":
        $.ajax({
          url: $(this).attr("action"),
          type: "post",
          data: datas,
          success: function (res) {
            // alert("Registered Successfully");
            alertify.set("notifier", "position", "top-right");
            alertify.success("Registered Successfully");
            setTimeout(() => {
              window.location = "staff_login.php";
            }, 1000);
            // $("Form")[0].reset();
            // window.location = "login.php";

            // console.log(data.message);
            console.log(res);
          },

          error: function (xhr, status, error) {
            console.log(xhr);

            let errors = xhr.responseJSON;
            console.log(xhr.responseJSON);
            let errorResponse = '<div class="alert alert-danger ps-3"><ul>';
            $.each(errors, (key, err) => {
              errorResponse += `<li>${err}</li>`;
              console.log(key);
              $("#" + key + "Error")
                .removeClass("d-none")
                .text(err);
            });
            errorResponse += "</ul></div>";
            $("#" + key + "Error").reset();
          },
        });
        break;

      case "update_user":
        $.ajax({
          url: $(this).attr("action"),
          type: "post",
          data: datas,
          success: function (res) {
            alertify.set("notifier", "position", "top-right");
            alertify.success("Updated Successfully");
            setTimeout(() => {
              $("#editModal").modal("hide");
              window.location.reload();
            }, 2000);
            console.log(res);
          },

          error: function (xhr, status, error) {
            console.log(xhr);

            let errors = xhr.responseJSON;
            console.log(xhr.responseJSON);
            let errorResponse = '<div class="alert alert-danger ps-3"><ul>';
            $.each(errors, (key, err) => {
              errorResponse += `<li>${err}</li>`;
              console.log(key);
              $("#" + key + "Error")
                .removeClass("d-none")
                .text(err);
            });
            errorResponse += "</ul></div>";
            $("#" + key + "Error").reset();
          },
        });
        break;

      case "userInfo":
        $.ajax({
          url: $(this).attr("action"),
          type: "post",
          data: datas,
          success: function (res) {
            alertify.set("notifier", "position", "top-right");
            alertify.success("Updated Successfully");
            console.log(res);
          },

          error: function (xhr, status, error) {
            console.log(xhr);

            let errors = xhr.responseJSON;
            console.log(xhr.responseJSON);
            let errorResponse = '<div class="alert alert-danger ps-3"><ul>';
            $.each(errors, (key, err) => {
              errorResponse += `<li>${err}</li>`;
              console.log(key);
              $("#" + key + "Error")
                .removeClass("d-none")
                .text(err);
            });
            errorResponse += "</ul></div>";
            $("#" + key + "Error").reset();
          },
        });
        break;

      case "category":
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
        break;

      case "update_cat":
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
            alertify.warning("Updated Successfully");
            setTimeout(() => {
              $("#editModal").modal("hide");
              window.location.reload();
            }, 2000);
            // $("#editModal").modal("hide");
            // window.location.reload();
            // window.location = "all_cat.php";
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
        break;

      case "product":
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
            alertify.warning("Updated Successfully");
            setTimeout(() => {
              $("#editModal").modal("hide");
              window.location.reload();
            }, 2000);
            // window.location = "all_cat.php";
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
        break;

      case "order":
        $("#orderNow").prop("disabled", true).text("Please wait...");
        $.ajax({
          url: $(this).attr("action"),
          type: "post",
          data: datas,
          success: function (res) {
            alertify.set("notifier", "position", "top-right");
            alertify.warning("Order placed Successfully");

            setTimeout(() => {
              window.location = "orders.php";
            }, 3000);
            // alert("Registered Successfully");
            // $("Form")[0].reset();
            // window.location = "login.php";

            // console.log(data.message);
            console.log(res);
          },

          error: function (xhr, status, error) {
            $("#orderNow").prop("disabled", false).text("Order Now");
            console.log(xhr);

            let errors = xhr.responseJSON;
            console.log(xhr.responseJSON);
            let errorResponse = '<div class="alert alert-danger ps-3"><ul>';
            $.each(errors, (key, err) => {
              errorResponse += `<li>${err}</li>`;
              console.log(key);
              $("#" + key + "Error")
                .removeClass("d-none")
                .text(err);
            });
            errorResponse += "</ul></div>";
            $("#" + key + "Error").reset();
          },
        });
        break;
    }
  });
  $(document).on("click", ".delete_product_btn", function (e) {
    e.preventDefault();

    let id = $(this).val();
    // alert(id);

    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this Product!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          method: "POST",
          url: "delete_product.php",
          data: {
            product_id: id,
            delete_product_btn: true,
          },
          success: function (res) {
            console.log(res);
            if (res == 200) {
              swal("Success!", "Product deleted successfuly!", "success");
              $("#product_table").load(location.href + " #product_table");
            } else {
              if (res == 400) {
                swal("Error!", "Something went wrong!", "error");
              }
            }
          },
        });
      }
    });
  });

  $(document).on("click", ".delete_cat_btn", function (e) {
    e.preventDefault();

    let id = $(this).val();
    // alert(id);

    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this Category!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          method: "POST",
          url: "delete_cat.php",
          data: {
            category_id: id,
            delete_cat_btn: true,
          },
          success: function (res) {
            console.log(res);
            if (res == 200) {
              swal("Success!", "Category deleted successfuly!", "success");
              $("#category_table").load(location.href + " #category_table");
            } else {
              if (res == 400) {
                swal("Error!", "Something went wrong!", "error");
              }
            }
          },
        });
      }
    });
  });

  $(document).on("click", ".delete_user_btn", function (e) {
    e.preventDefault();

    let id = $(this).val();

    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this User!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          method: "POST",
          url: "delete_user.php",
          data: {
            user_id: id,
            delete_user_btn: true,
          },
          success: function (res) {
            console.log(res);
            if (res == 200) {
              swal("Success!", "User deleted successfuly!", "success");
              $("#users_table").load(location.href + " #users_table");
            } else {
              if (res == 400) {
                swal("Error!", "Something went wrong!", "error");
              }
            }
          },
        });
      }
    });
  });

  $(document).on("click", ".delete_staff_btn", function (e) {
    e.preventDefault();

    let id = $(this).val();

    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this staff!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          method: "POST",
          url: "delete_staff.php",
          data: {
            staff_id: id,
            delete_staff_btn: true,
          },
          success: function (res) {
            console.log(res);
            if (res == 200) {
              swal("Success!", "Staff deleted successfuly!", "success");
              $("#staffs_table").load(location.href + " #staffs_table");
            } else {
              if (res == 400) {
                swal("Error!", "Something went wrong!", "error");
              }
            }
          },
        });
      }
    });
  });

  $(document).on("click", ".increament-btn", function () {
    let qty = $(this).closest(".product-cart").find(".input-qty").val();
    let value = parseInt(qty, 10);
    value = isNaN(value) ? 0 : value;

    if (value < 10) {
      value++;
      $(this).closest(".product-cart").find(".input-qty").val(value);
    }
  });

  $(document).on("click", ".decreament-btn", function () {
    let qty = $(this).closest(".product-cart").find(".input-qty").val();
    let value = parseInt(qty, 10);
    value = isNaN(value) ? 0 : value;

    if (value > 1) {
      value--;
      $(this).closest(".product-cart").find(".input-qty").val(value);
    }
  });

  $(document).on("click", ".addToCartBtn", function () {
    let qty = $(this).closest(".product-cart").find(".input-qty").val();
    let pid = $(this).val();

    $.ajax({
      method: "POST",
      url: "functions/handle_cart.php",
      data: {
        pid: pid,
        qty: qty,
        scope: "add",
      },
      success: function (res) {
        if (res == 201) {
          // alert("success");
          console.log(res);
          alertify.success("Product added to cart");
          $("#load_cart").load(location.href + " #load_cart");
        } else if (res == 401) {
          console.log(res);
          // alert("void");
          alertify.success("Log in to continue");
        } else if (res == 501) {
          console.log(res);
          alertify.success("Something went wrong");
          // alert("error");
        } else if (res == 202) {
          console.log(res);
          alertify.success("Product already present in cart");
          // alert("error");
        }
      },
    });
  });

  $(document).on("click", ".addToWhishBtn", function () {
    let pid = $(this).val();
    let scope = "add";

    $.ajax({
      method: "POST",
      url: "functions/wish_list.php",
      data: {
        pid: pid,
        scope: scope,
      },

      success: function (res) {
        if (res == 201) {
          console.log(res);
          alertify.success("Product added to Whish List");
          $("#load_cart").load(location.href + " #load_cart");
        } else if (res == 401) {
          console.log(res);
          // alert("void");
          alertify.success("Something went wrong");
        } else if (res == 501) {
          console.log(res);
          alertify.success("Something went wrong");
          // alert("error");
        } else if (res == 202) {
          console.log(res);
          alertify.success("Product already present in wish list");
          // alert("error");
        }
      },
    });
  });

  $(document).on("click", ".updateQty", function () {
    let prod_qty = $(this).closest(".product-cart").find(".input-qty").val();
    let prod_id = $(this).closest(".product-cart").find(".prodId").val();

    $.ajax({
      method: "POST",
      url: "functions/handle_cart.php",
      data: {
        prod_id: prod_id,
        prod_qty: prod_qty,
        scope: "update",
      },
      success: function (res) {
        if (res == 203) {
          // alert("success");
          console.log(res);
          alertify.success("Product updated");
        } else if (res == 401) {
          console.log(res);
          // alert("void");
          alertify.success("Log in to continue");
        } else if (res == 501) {
          console.log(res);
          alertify.success("Something went wrong");
          // alert("error");
        }
      },
    });
  });

  $(document).on("click", ".deleteCartBtn", function () {
    let cart_id = $(this).val();

    $.ajax({
      method: "POST",
      url: "functions/handle_cart.php",
      data: {
        cart_id: cart_id,
        scope: "delete",
      },
      success: function (res) {
        if (res == 202) {
          // alert("success");
          console.log(res);
          alertify.success("Product removed from cart successfully");
          $("#load_cart").load(location.href + " #load_cart");
          $("#cartsItem").load(location.href + " #cartsItem");
        } else if (res == 402) {
          console.log(res);
          // alert("void");
          alertify.success("Something went wrong");
        } else if (res == 502) {
          console.log(res);
          alertify.success("Something went wrong");
          // alert("error");
        }
      },
    });
  });

  $(document).on("click", ".deletewishBtn", function () {
    let wish_id = $(this).val();
    let scope = "delete";

    $.ajax({
      method: "POST",
      url: "functions/wish_list.php",
      data: {
        wish_id: wish_id,
        scope: scope,
      },
      success: function (res) {
        if (res == 202) {
          // alert("success");
          console.log(res);
          alertify.success("Product removed from wish list successfully");
          $("#load_cart").load(location.href + " #load_cart");
          $("#cartsItem").load(location.href + " #cartsItem");
        } else if (res == 402) {
          console.log(res);
          // alert("void");
          alertify.success("Something went wrong");
        } else if (res == 502) {
          console.log(res);
          alertify.success("Something went wrong");
          // alert("error");
        }
      },
    });
  });

  $(document).on("click", ".editProductBtn", function (event) {
    event.preventDefault();
    var url = $(this).attr("href");

    $.ajax({
      method: "GET",
      url: url,
      success: function (res) {
        $("#editPane").html(res);
      },
    });
  });

  // $(document).on("click", "#checkbox", function (e) {
  //   e.preventDefault();
  //   $("#other").removeClass("d-none");
  // function valueChanged() {
  //   if ($("#checkbox").is(":checked")) $("#other").show();
  //   else $("#other").hide();
  // }
  // });
});
