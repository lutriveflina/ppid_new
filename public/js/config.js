/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/config.js":
/*!********************************!*\
  !*** ./resources/js/config.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _createForOfIteratorHelper(o, allowArrayLike) { 
  var it; if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) { 
    if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") 
    { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = o[Symbol.iterator](); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

var name = document.querySelector('#name');
var alamat = document.querySelector('#alamat');
var provinsi = document.querySelector('#provinsi');
var kabKot = document.querySelector('#kabKot');
var noKontak = document.querySelector('#noKontak');
var hidden = document.querySelector('#hidden');

function displayNone() {
  name.setAttribute("style", "display: none;");
  alamat.setAttribute("style", "display: none;");
  provinsi.setAttribute("style", "display: none;");
  kabKot.setAttribute("style", "display: none;");
  noKontak.setAttribute("style", "display: none;");
  hidden.setAttribute("style", "display: none;");
}

function displayBlock() {
  name.setAttribute("style", "display: block;");
  alamat.setAttribute("style", "display: block;");
  provinsi.setAttribute("style", "display: block;");
  kabKot.setAttribute("style", "display: block;");
  noKontak.setAttribute("style", "display: block;");
  hidden.setAttribute("style", "display: block;");
}

document.addEventListener("DOMContentLoaded", function () {
  displayNone();
});
document.querySelector('#cariNik').addEventListener('click', function () {
  var nik = document.querySelector('#nik').value;
  var timerInterval;

  if (nik.length < 16) {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'NIK tidak valid!'
    });
  } else {
    Swal.fire({
      title: '',
      html: '<p id="tulisan">Menghubungi server Dukcapil...</p>',
      timer: 2000,
      timerProgressBar: true,
      onBeforeOpen: function onBeforeOpen() {
        Swal.showLoading();
        timerInterval = setInterval(function () {
          var content = Swal.getContent();

          if (content) {
            var persen = parseInt(100 - Swal.getTimerLeft() / 20); // console.log(persen);

            if (persen == -700) {
              content.querySelector('#tulisan').textContent = 'Koneksi Terhubung...';
            } else if (persen == -600) {
              content.querySelector('#tulisan').textContent = 'Melakukan Pencarian NIK : ' + nik;
            } else if (persen == -100) {
              content.querySelector('#tulisan').textContent = 'Parsing Data';
            }
          }
        }, 100);
      },
      onClose: function onClose() {
        clearInterval(timerInterval);
        axios.get('apiNik/' + nik).then(function (response) {
          if (response.api_status == 0) {
            Swal.fire({
              icon: 'warning',
              title: 'Oops...',
              text: 'NIK tidak terdaftar sebagai Penduduk Kota Bukittinggi, silahkan isi form secara manual!'
            });
            displayBlock();
          } else {
            displayBlock();
            console.log(response.data.data.nama_lengkap);
            response = response.data.data;
            name.value =  response.nama_lengkap;
            alamat.value =  response.alamat;
            provinsi.value =  response.provinsi;
            kabKot.value =  response.kota;

           
            // var _iterator = _createForOfIteratorHelper(response.api_status),
            //     _step;
            // try {
            //   for (_iterator.s(); !(_step = _iterator.n()).done;) {
            //     var element = _step.value;

            //     if (element.NIK == nik) {
            //       name.value = element.NAMA_LENGKAP;
            //       alamat.value = element.ALAMAT;
            //       provinsi.value = element.PROVINSI;
            //       kabKot.value = element.KOTA;
            //     }
            //   }
            // } catch (err) {
            //   _iterator.e(err);
            // } finally {
            //   _iterator.f();
            // }
          }
        }, function (error) {
          // console.log(error);
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: error + 'Gangguan Koneksi!'
          });
        });
      }
    }).then(function (result) {
      if (result.dismiss === Swal.DismissReason.timer) {// console.log('I was closed by the timer')
      }
    });
  }
});

/***/ }),

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/config.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\laragon\www\ppid-1\resources\js\config.js */"./resources/js/config.js");


/***/ })

/******/ });