/******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/clock/index.js":
/*!*******************************!*\
  !*** ./src/js/clock/index.js ***!
  \*******************************/
/***/ (function() {

// main.js
/****Clock*****/
(function ($) {
  class Clock {
    constructor() {
      this.initializeClock();
    }
    initializeClock() {
      let t = setInterval(() => this.time(), 1000);
    }
    numPad(str) {
      let cStr = str.toString();
      if (cStr.length < 2) str = 0 + cStr;
      return str;
    }
    time() {
      let currDate = new Date();
      let currSec = currDate.getSeconds();
      let currMin = currDate.getMinutes();
      let curr24Hr = currDate.getHours();
      let ampm = curr24Hr >= 12 ? 'pm' : 'am';
      let currHr = curr24Hr % 12;
      currHr = currHr ? currHr : 12;
      let stringTime = currHr + ':' + this.numPad(currMin) + ':' + this.numPad(currSec);
      const timeEmojiEl = $('#time-emoji');
      if (curr24Hr >= 5 && curr24Hr <= 17) {
        timeEmojiEl.text('🌞');
      } else {
        timeEmojiEl.text('🌜');
      }
      $('#time').text(stringTime);
      $('#ampm').text(ampm);
    }
  }
  new Clock();
})(jQuery);

/***/ }),

/***/ "./src/img/jodhpur.jpg":
/*!*****************************!*\
  !*** ./src/img/jodhpur.jpg ***!
  \*****************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("../../src/img/jodhpur.jpg");

/***/ }),

/***/ "./src/sass/main.scss":
/*!****************************!*\
  !*** ./src/sass/main.scss ***!
  \****************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	!function() {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = function(module) {
/******/ 			var getter = module && module.__esModule ?
/******/ 				function() { return module['default']; } :
/******/ 				function() { return module; };
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
!function() {
"use strict";
/*!************************!*\
  !*** ./src/js/main.js ***!
  \************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _clock_index__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./clock/index */ "./src/js/clock/index.js");
/* harmony import */ var _clock_index__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_clock_index__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _sass_main_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../sass/main.scss */ "./src/sass/main.scss");
/* harmony import */ var _img_jodhpur_jpg__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../img/jodhpur.jpg */ "./src/img/jodhpur.jpg");
// This is the main js file , here we will include all the javascript files that will be required though out



// Styles


// images

}();
/******/ })()
;
//# sourceMappingURL=main.js.map