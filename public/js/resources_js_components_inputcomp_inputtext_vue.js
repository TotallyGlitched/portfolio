"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_inputcomp_inputtext_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/inputcomp/inputtext.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/inputcomp/inputtext.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  props: ["name", "type", "id", "label", "value", "error", "placeholder", "disabled", 'required', 'min', 'max'],
  data: function data() {
    return {
      content: this.value || ""
    };
  },
  mounted: function mounted() {
    var _this = this;

    this.$watch('$props', function () {
      _this.content = _this.value;
    }, {
      deep: true
    });
    this.changevalue();
  },
  methods: {
    changevalue: function changevalue() {
      this.$emit('changedata', this.content);
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/inputcomp/inputtext.vue?vue&type=template&id=1945c0c6&":
/*!*************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/inputcomp/inputtext.vue?vue&type=template&id=1945c0c6& ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function render() {
  var _vm = this,
      _c = _vm._self._c;

  return _c("div", [_vm.label ? _c("label", {
    staticClass: "form-label w-100",
    attrs: {
      "for": "inputname"
    }
  }, [_vm._v("\n        " + _vm._s(_vm.label) + " "), _vm.required ? _c("span", {
    staticClass: "text-danger h5"
  }, [_vm._v("*")]) : _vm._e()]) : _vm._e(), _vm._v(" "), _vm.type === "checkbox" ? _c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _vm.content,
      expression: "content"
    }],
    staticClass: "bg-white form-control form-control-sm",
    "class": [_vm.error ? "is-invalid" : ""],
    attrs: {
      disabled: _vm.disabled == 1,
      name: _vm.name,
      id: _vm.name,
      min: _vm.min,
      max: _vm.max,
      placeholder: _vm.placeholder,
      type: "checkbox"
    },
    domProps: {
      checked: Array.isArray(_vm.content) ? _vm._i(_vm.content, null) > -1 : _vm.content
    },
    on: {
      keyup: _vm.changevalue,
      change: function change($event) {
        var $$a = _vm.content,
            $$el = $event.target,
            $$c = $$el.checked ? true : false;

        if (Array.isArray($$a)) {
          var $$v = null,
              $$i = _vm._i($$a, $$v);

          if ($$el.checked) {
            $$i < 0 && (_vm.content = $$a.concat([$$v]));
          } else {
            $$i > -1 && (_vm.content = $$a.slice(0, $$i).concat($$a.slice($$i + 1)));
          }
        } else {
          _vm.content = $$c;
        }
      }
    }
  }) : _vm.type === "radio" ? _c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _vm.content,
      expression: "content"
    }],
    staticClass: "bg-white form-control form-control-sm",
    "class": [_vm.error ? "is-invalid" : ""],
    attrs: {
      disabled: _vm.disabled == 1,
      name: _vm.name,
      id: _vm.name,
      min: _vm.min,
      max: _vm.max,
      placeholder: _vm.placeholder,
      type: "radio"
    },
    domProps: {
      checked: _vm._q(_vm.content, null)
    },
    on: {
      keyup: _vm.changevalue,
      change: function change($event) {
        _vm.content = null;
      }
    }
  }) : _c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _vm.content,
      expression: "content"
    }],
    staticClass: "bg-white form-control form-control-sm",
    "class": [_vm.error ? "is-invalid" : ""],
    attrs: {
      disabled: _vm.disabled == 1,
      name: _vm.name,
      id: _vm.name,
      min: _vm.min,
      max: _vm.max,
      placeholder: _vm.placeholder,
      type: _vm.type
    },
    domProps: {
      value: _vm.content
    },
    on: {
      keyup: _vm.changevalue,
      input: function input($event) {
        if ($event.target.composing) return;
        _vm.content = $event.target.value;
      }
    }
  }), _vm._v(" "), _vm.error ? _c("span", {
    staticClass: "text-danger text-small",
    staticStyle: {
      "margin-top": "0px"
    }
  }, [_vm._v("\n        " + _vm._s(_vm.error) + "\n    ")]) : _vm._e()]);
};

var staticRenderFns = [];
render._withStripped = true;


/***/ }),

/***/ "./resources/js/components/inputcomp/inputtext.vue":
/*!*********************************************************!*\
  !*** ./resources/js/components/inputcomp/inputtext.vue ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _inputtext_vue_vue_type_template_id_1945c0c6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./inputtext.vue?vue&type=template&id=1945c0c6& */ "./resources/js/components/inputcomp/inputtext.vue?vue&type=template&id=1945c0c6&");
/* harmony import */ var _inputtext_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./inputtext.vue?vue&type=script&lang=js& */ "./resources/js/components/inputcomp/inputtext.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _inputtext_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _inputtext_vue_vue_type_template_id_1945c0c6___WEBPACK_IMPORTED_MODULE_0__.render,
  _inputtext_vue_vue_type_template_id_1945c0c6___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/inputcomp/inputtext.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/inputcomp/inputtext.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ./resources/js/components/inputcomp/inputtext.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_inputtext_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./inputtext.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/inputcomp/inputtext.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_inputtext_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/inputcomp/inputtext.vue?vue&type=template&id=1945c0c6&":
/*!****************************************************************************************!*\
  !*** ./resources/js/components/inputcomp/inputtext.vue?vue&type=template&id=1945c0c6& ***!
  \****************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_inputtext_vue_vue_type_template_id_1945c0c6___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_inputtext_vue_vue_type_template_id_1945c0c6___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_inputtext_vue_vue_type_template_id_1945c0c6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./inputtext.vue?vue&type=template&id=1945c0c6& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/inputcomp/inputtext.vue?vue&type=template&id=1945c0c6&");


/***/ })

}]);