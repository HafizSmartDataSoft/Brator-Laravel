import './bootstrap';
import 'simplebar';
import ResizeObserver from 'resize-observer-polyfill';
import feather from 'feather-icons';
import Dropzone from 'dropzone';

import sidebar from './components/sidebar';
import dropdown from './components/dropdown';
import datepicker from './components/datepicker';
import select from './components/select';
// import swalModal from './components/swal';
import uploader from './components/uploader';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Initialize sidebar
sidebar.init();
// Initialize uploader
uploader.init();
// Initialize datepicker
datepicker.init();

// Initialize dropdown
dropdown.init();

// Initialize select
select.init();

// Initialize feather-icons. Must be Initialize at the end.
feather.replace();


// // Initialize Swal
// swalModal.init();


// Polyfill for ResizeObserver
window.ResizeObserver = ResizeObserver;

