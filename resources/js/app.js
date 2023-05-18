import './bootstrap';

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import '@fortawesome/fontawesome-free/js/all.js';

import flatpickr from "flatpickr";
import "flatpickr/dist/themes/dark.css";

flatpickr(".flatpickrSelector", {
    enableTime: true,
    dateFormat: "Y-m-d H:i:S",
    time_24hr: true,
});

import EasyMDE from 'easyMDE';
const easyMDE = new EasyMDE({ 
    element: document.getElementById("body"),
    maxHeight: "1000px",
});