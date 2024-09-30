import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import Swal from "sweetalert2";

// Ou se estiver usando require:
window.Swal = require("sweetalert2");


// Swal.fire({
//     title: "Hello!",
//     text: "SweetAlert2 is working!",
//     icon: "success",
//     confirmButtonText: "Cool",
// });
