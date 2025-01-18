import "./bootstrap"; // Import ini jika Anda menggunakan Bootstrap
import $ from "jquery";
window.$ = window.jQuery = $;

console.log("app.js berhasil dimuat dan jQuery tersedia!"); // Sangat penting untuk debugging
// Kode JavaScript aplikasi Anda diletakkan DI SINI (setelah import dan window.$ = ...)
$(document).ready(function () {
    console.log("jQuery dari app.js berfungsi!");
    // Kode jQuery Anda yang lain di sini
});
