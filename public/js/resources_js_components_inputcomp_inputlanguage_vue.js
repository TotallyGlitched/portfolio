"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_inputcomp_inputlanguage_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/inputcomp/inputlanguage.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/inputcomp/inputlanguage.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  props: ["languages", "data", "options", 'title', 'name'],
  data: function data() {
    return {
      content: "",
      key: "",
      contentx: this.data || {}
    };
  },
  mounted: function mounted() {
    this.content = this.options[0];

    if (Object.keys(this.contentx).length <= 0) {
      this.contentx = {};
    }

    for (var i = 0; i < this.languages.length; i++) {
      if (!this.contentx.hasOwnProperty(this.languages[i].code)) {
        var tempx = {
          language: this.languages[i].name
        };

        for (var j = 0; j < this.options.length; j++) {
          tempx[this.options[j].name] = "";
        } // this.contentx[this.languages[i].code] = tempx;


        this.$set(this.contentx, this.languages[i].code, tempx);
      }
    }
  },
  methods: {
    changedetails: function changedetails(item) {
      this.content = item;
      this.key = Math.random();
    },
    updatelanguage: function updatelanguage(item, val) {
      console.log(item, val);
      this.$set(this.contentx[item], this.content.name, val);
      this.$emit("changedata", this.contentx);
      this.key = Math.random();
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/inputcomp/inputlanguage.vue?vue&type=template&id=489758f1&":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/inputcomp/inputlanguage.vue?vue&type=template&id=489758f1& ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function render() {
  var _vm = this,
      _c = _vm._self._c;

  return _c("div", [_c("h5", {
    staticClass: "mt-4",
    staticStyle: {
      "font-weight": "900"
    }
  }, [_vm._v(_vm._s(_vm.title) + " Information")]), _vm._v(" "), _c("div", {
    staticClass: "over-x"
  }, [_c("ul", {
    staticClass: "nav nav-pills select-lang mb-3",
    attrs: {
      id: "pills-tab"
    }
  }, _vm._l(_vm.options, function (item, index) {
    return _c("li", {
      key: "side" + item.name,
      staticClass: "nav-item"
    }, [_c("button", {
      staticClass: "btn w-100",
      "class": [item.name == _vm.content.name ? "active" : ""],
      attrs: {
        id: "pills-home-tab1",
        type: "button",
        role: "tab",
        "aria-controls": "pills-home",
        "aria-selected": "true"
      },
      on: {
        click: function click($event) {
          return _vm.changedetails(item);
        }
      }
    }, [_vm._v(_vm._s(item.title))])]);
  }), 0)]), _vm._v(" "), _vm.contentx && _vm.content ? _c("div", {
    staticClass: "container-fluid"
  }, [_c("div", {
    staticClass: "row row-h-fix"
  }, _vm._l(_vm.languages, function (item, index) {
    return _c("div", {
      key: "side" + index,
      staticClass: "col-12"
    }, [_vm._v("\n        " + _vm._s(item.name) + "\n        "), _vm.content.type == "text" ? _c("vue-inputtext", {
      staticClass: "mb-2",
      attrs: {
        placeholder: "Enter " + _vm.content.title,
        value: _vm.contentx[item.code][_vm.content.name]
      },
      on: {
        changedata: function changedata(val) {
          _vm.updatelanguage(item.code, val);
        }
      }
    }) : _vm.content.type == "textarea" ? _c("vue-inputeditor", {
      staticClass: "mb-2",
      attrs: {
        name: "dynamic" + item.name,
        id: _vm.content + item.name + _vm.key,
        value: _vm.contentx[item.code][_vm.content.name],
        type: "0",
        placeholder: "Enter " + _vm.content.title
      },
      on: {
        changedata: function changedata(val) {
          return _vm.updatelanguage(item.code, val);
        }
      }
    }) : _vm.content.type == "textareadesc" ? _c("vue-inputtextarea", {
      staticClass: "mb-2",
      attrs: {
        name: "dynamic" + item.name,
        id: _vm.content + item.name + _vm.key,
        value: _vm.contentx[item.code][_vm.content.name],
        type: "0",
        placeholder: "Enter " + _vm.content.title
      },
      on: {
        changedata: function changedata(val) {
          return _vm.updatelanguage(item.code, val);
        }
      }
    }) : _vm._e()], 1);
  }), 0)]) : _vm._e(), _vm._v(" "), _c("input", {
    attrs: {
      type: "hidden",
      name: _vm.name,
      id: "input" + _vm.name + _vm.key
    },
    domProps: {
      value: JSON.stringify(_vm.contentx)
    }
  })]);
};

var staticRenderFns = [];
render._withStripped = true;


/***/ }),

/***/ "./resources/js/components/inputcomp/inputlanguage.vue":
/*!*************************************************************!*\
  !*** ./resources/js/components/inputcomp/inputlanguage.vue ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _inputlanguage_vue_vue_type_template_id_489758f1___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./inputlanguage.vue?vue&type=template&id=489758f1& */ "./resources/js/components/inputcomp/inputlanguage.vue?vue&type=template&id=489758f1&");
/* harmony import */ var _inputlanguage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./inputlanguage.vue?vue&type=script&lang=js& */ "./resources/js/components/inputcomp/inputlanguage.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _inputlanguage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _inputlanguage_vue_vue_type_template_id_489758f1___WEBPACK_IMPORTED_MODULE_0__.render,
  _inputlanguage_vue_vue_type_template_id_489758f1___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/inputcomp/inputlanguage.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/inputcomp/inputlanguage.vue?vue&type=script&lang=js&":
/*!**************************************************************************************!*\
  !*** ./resources/js/components/inputcomp/inputlanguage.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_inputlanguage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./inputlanguage.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/inputcomp/inputlanguage.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_inputlanguage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/inputcomp/inputlanguage.vue?vue&type=template&id=489758f1&":
/*!********************************************************************************************!*\
  !*** ./resources/js/components/inputcomp/inputlanguage.vue?vue&type=template&id=489758f1& ***!
  \********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_inputlanguage_vue_vue_type_template_id_489758f1___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_inputlanguage_vue_vue_type_template_id_489758f1___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_inputlanguage_vue_vue_type_template_id_489758f1___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./inputlanguage.vue?vue&type=template&id=489758f1& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/inputcomp/inputlanguage.vue?vue&type=template&id=489758f1&");


/***/ })

}]);