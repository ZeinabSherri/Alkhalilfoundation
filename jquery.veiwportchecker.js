!(function (t) {
  t.fn.viewportChecker = function (e) {
    var o = {
      classToAdd: "visible",
      classToRemove: "invisible",
      offset: 10,
      repeat: !1,
      invertBottomOffset: !0,
      callbackFunction: function (t, e) {},
      scrollHorizontal: !1,
    };
    t.extend(o, e);
    var a = this,
      s = { height: t(window).height(), width: t(window).width() },
      l =
        -1 != navigator.userAgent.toLowerCase().indexOf("webkit")
          ? "body"
          : "html";
    return (
      (this.checkElements = function () {
        var e, i;
        o.scrollHorizontal
          ? ((e = t(l).scrollLeft()), (i = e + s.width))
          : ((e = t(l).scrollTop()), (i = e + s.height)),
          a.each(function () {
            var a = t(this),
              s = {},
              l = {};
            if (
              (a.data("vp-add-class") &&
                (l.classToAdd = a.data("vp-add-class")),
              a.data("vp-remove-class") &&
                (l.classToRemove = a.data("vp-remove-class")),
              a.data("vp-offset") && (l.offset = a.data("vp-offset")),
              a.data("vp-repeat") && (l.repeat = a.data("vp-repeat")),
              a.data("vp-scrollHorizontal") &&
                (l.scrollHorizontal = a.data("vp-scrollHorizontal")),
              a.data("vp-invertBottomOffset") &&
                (l.scrollHorizontal = a.data("vp-invertBottomOffset")),
              t.extend(s, o),
              t.extend(s, l),
              !a.hasClass(s.classToAdd) || s.repeat)
            ) {
              var d = s.scrollHorizontal
                  ? Math.round(a.offset().left) + s.offset
                  : Math.round(a.offset().top) + s.offset,
                n = s.scrollHorizontal ? d + a.width() : d + a.height();
              s.invertBottomOffset && (n -= 2 * s.offset),
                d < i && n > e
                  ? (a.removeClass(s.classToRemove),
                    a.addClass(s.classToAdd),
                    s.callbackFunction(a, "add"))
                  : a.hasClass(s.classToAdd) &&
                    s.repeat &&
                    (a.removeClass(s.classToAdd),
                    s.callbackFunction(a, "remove"));
            }
          });
      }),
      t(window).bind("load scroll touchmove MSPointerMove", this.checkElements),
      t(window).resize(function (e) {
        (s = { height: t(window).height(), width: t(window).width() }),
          a.checkElements();
      }),
      this.checkElements(),
      this
    );
  };
})(jQuery);
