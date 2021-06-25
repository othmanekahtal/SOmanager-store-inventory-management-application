"use strict";
// select all elements when I click  :

const select_all = document.querySelector("#select_all");
const select__array = document.querySelectorAll(
  ".checkbox__item input[type='checkbox']"
);
// convert node HTML collection to array:
const arr = [...select__array];
const delete_icon = document.querySelector(".navbar__option--delete");

select_all.addEventListener("click", () => {
  if (select_all.checked) {
    select__array.forEach((Element) => {
      Element.checked = true;
      delete_icon.classList.add("navbar__option--delete-working");
    });
  } else {
    select__array.forEach((Element) => {
      Element.checked = false;
      delete_icon.classList.remove("navbar__option--delete-working");
    });
  }
});

select__array.forEach((Element) => {
  Element.addEventListener("click", () => {
    if (!Element.checked) {
      select_all.checked = false;
    } else {
      delete_icon.classList.add("navbar__option--delete-working");
    }
    if (arr.every((value) => value.checked)) {
      select_all.checked = true;
    }

    if (arr.every((value) => !value.checked)) {
      delete_icon.classList.remove("navbar__option--delete-working");
    }
  });
});

delete_icon.onclick = () => {
  let y = arr.filter((e) => e.checked);
  let len = y.length;
  let index = 0;
  let ids = [];
  y.forEach((e) => {
    ids.push(e.value);
    let x = e.parentElement.parentElement;
    x.remove();
    index++;
  });
  if (len === index) select_all.checked = false;
  let href = `/SOmanager-store-inventory-management-application/delete.php?id=${ids}`;
  location.href = `${String(href)}`;
};

// close popup

const close_popup = document.querySelectorAll(".close-popup");
const overlay_popup = document.querySelector(".overlay_popup");
const popup_edit = document.querySelector(".popup_edit");
const popup_add = document.querySelector(".add_product");
const popup_view = document.querySelector(".popup_view");

close_popup.forEach((element) => {
  element.addEventListener("click", () => {
    element.parentElement.classList.add("hidden");
    element.parentElement.parentElement.classList.add("hidden");
  });
});
//// closing popup using esc key
document.addEventListener("keydown", (event) => {
  close_popup.forEach((element) => {
    if (
      event.key === "Escape" &&
      !element.parentElement.classList.contains("hidden") &&
      !element.parentElement.parentElement.classList.contains("hidden")
    ) {
      element.parentElement.classList.add("hidden");
      element.parentElement.parentElement.classList.add("hidden");
    }
  });
});

// show up popup :
let add = document.querySelector(".nav__option--add");
add.addEventListener("click", () => {
  overlay_popup.classList.remove("hidden");
  popup_add.classList.remove("hidden");
});

// show preview popup :
let list_table = document.querySelectorAll(".body-table.table-row");
list_table.forEach((element) => {
  element.addEventListener("dblclick", function () {
    document.querySelector(".Desc_product").innerHTML = document.querySelector(
      `#${this.id} .description`
    ).innerHTML;
    document.querySelector(
      ".quantity_product span span"
    ).innerHTML = document.querySelector(
      `#${this.id} .col-quantity .col-span--content`
    ).innerHTML;
    document.querySelector(
      ".popup_view .secondary-heading"
    ).innerHTML = document.querySelector(`#${this.id} .col-name`).innerHTML;
    document.querySelector(
      ".popup_view .discount_product span span"
    ).innerHTML = document.querySelector(
      `#${this.id} .col-discount .col-span--content`
    ).innerHTML;
    document.querySelector(
      ".Sale_product span span"
    ).innerHTML = document.querySelector(
      `#${this.id} .col-price .col-span--content`
    ).innerHTML;
    document.querySelector(
      ".Purshase_product span span"
    ).innerHTML = document.querySelector(
      `#${this.id} .purchase_price`
    ).innerHTML;
    overlay_popup.classList.remove("hidden");
    popup_view.classList.remove("hidden");
    document
      .querySelector(".popup_view__btns .delete_btn")
      .addEventListener("click", () => {
        let path = `/SOmanager-store-inventory-management-application/delete.php?id=${this.id.slice(
          1
        )}`;
        location.href = `${String(path)}`;
      });
    document
      .querySelector(".popup_view__btns .edit_btn")
      .addEventListener("click", () => {
        popup_view.classList.toggle("hidden");
        popup_edit.classList.toggle("hidden");
      });
  });
  element
    .querySelector(".col-actions svg")
    .addEventListener("click", function () {
      overlay_popup.classList.remove("hidden");
      popup_edit.classList.remove("hidden");

      // here code ⚔ :
      popup_edit.querySelector(".Product_name").value = element.querySelector(
        ".col-name"
      ).innerHTML;
      popup_edit.querySelector(
        ".description_input"
      ).value = element.querySelector(".description").innerHTML;
      popup_edit.querySelector(".final_price").value = element.querySelector(
        ".col-3 .col-span--content"
      ).innerHTML;
      popup_edit.querySelector(
        ".Percent_discount"
      ).value = element.querySelector(".col-4 .col-span--content").innerHTML;

      popup_edit.querySelector(".initial_price").value = element.querySelector(
        ".purchase_price"
      ).innerHTML;
      popup_edit.querySelector(".quantity").value = element.querySelector(
        ".col-2.col-span--content"
      ).innerHTML;
      popup_edit.querySelector(
        ".hidden_element.id_product"
      ).value = element.querySelector(".id_element").innerHTML;
    });
});
{
  /* <span class='col-2 col-span--content'>12</span>; */
}
// change styling Dashboard :
let list_menu__icon = document.querySelector(".navbar__option--list");
list_menu__icon.addEventListener("click", () => {
  document.querySelector(".table").innerHTML = "";
  document.querySelector(".table").classList.add("table_menu");
});

// search bar functionality by Jquery :
$(document).ready(function () {
  $(".search-input").on("keyup", function () {
    let value = $.trim($(this).val());
    $(".table .body-table .col-name").filter(function () {
      $(this)
        .parent()
        .toggle($(this).text().indexOf(value) > -1);
    });
  });
});

// mobile functionality:
if (window.innerWidth <= 375) {
  let menu_toggle = document.querySelector(".menu-toggle .menu");
  let asidebar = document.querySelector(".asidebar");
  let overlay_mobile = document.querySelector(".overlay_mobile");
  menu_toggle.addEventListener("click", () => {
    menu_toggle.classList.toggle("menu-active");
    asidebar.classList.toggle("asidebar-active");
    overlay_mobile.classList.toggle("overlay_mobile-active");
    overlay_mobile.addEventListener("click", () => {
      menu_toggle.classList.toggle("menu-active");
      asidebar.classList.toggle("asidebar-active");
      overlay_mobile.classList.toggle("overlay_mobile-active");
    });
  });
}
