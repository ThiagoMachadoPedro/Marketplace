import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
// importar framework bootstrap para que rode emk tela
import "bootstrap";

import Swal from 'sweetalert2';

window.Swal = Swal;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
