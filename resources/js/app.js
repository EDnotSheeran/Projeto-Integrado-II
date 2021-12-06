/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue").default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
});

window.addEventListener("load", function () {
    var file_fields = document.querySelectorAll(".file-field");
    file_fields.forEach(function (file_field) {
        var input = file_field.querySelector("input[type=file]");
        var label = file_field.querySelector("label");
        var image = file_field.querySelector("img");

        input.addEventListener("change", function (e) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    image.setAttribute("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
    });

    var date_fields = document.querySelectorAll("[mask=date]");
    $(date_fields).mask("00/00/0000");

    var time_fields = document.querySelectorAll("[mask=time]");
    $(time_fields).mask("00:00");

    var cpf_fields = document.querySelectorAll("[mask=cpf]");

    $(cpf_fields).mask("000.000.000-00");

    var zipcode_fields = document.querySelectorAll("[data-address=zipcode]");

    $(zipcode_fields).mask("99999-999");

    zipcode_fields.forEach(function (zipcode_field) {
        zipcode_field.addEventListener("input", function (e) {
            var zipcode = this.value;
            zipcode_field.classList.remove("is-invalid");
            zipcode_field.classList.remove("is-valid");
            if (zipcode.length == 9) {
                var url = "https://viacep.com.br/ws/" + zipcode + "/json/";
                axios.get(url).then(function (response) {
                    console.log(response.data);
                    if (response.data.erro) {
                        zipcode_field.classList.add("is-invalid");
                        return;
                    }
                    zipcode_field.classList.add("is-valid");

                    var city = document.querySelector("[data-address=city]");
                    var state = document.querySelector("[data-address=state]");
                    var district = document.querySelector(
                        "[data-address=district]"
                    );
                    var street = document.querySelector(
                        "[data-address=street]"
                    );

                    if (city && response.data.localidade) {
                        city.value = response.data.localidade;
                        city.setAttribute("readonly", "readonly");
                    } else {
                        city.removeAttribute("readonly");
                    }
                    if (state && district) {
                        state.value = response.data.uf;
                        state.setAttribute("readonly", "readonly");
                    } else {
                        state.removeAttribute("readonly");
                    }
                    if (district && response.data.bairro) {
                        district.value = response.data.bairro;
                        district.setAttribute("readonly", "readonly");
                    } else {
                        district.removeAttribute("readonly");
                    }
                    if (street && response.data.logradouro) {
                        street.value = response.data.logradouro;
                        street.setAttribute("readonly", "readonly");
                    } else {
                        street.removeAttribute("readonly");
                    }
                });
            }
        });
    });
});
