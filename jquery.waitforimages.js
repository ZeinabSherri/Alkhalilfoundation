!(function (e) {
  (e.waitForImages = {
    hasImageProperties: [
      "backgroundImage",
      "listStyleImage",
      "borderImage",
      "borderCornerImage",
      "cursor",
    ],
    hasImageAttributes: ["srcset"],
  }),
    (e.expr[":"].uncached = function (r) {
      if (!e(r).is('img[src][src!=""]')) return !1;
      var t = new Image();
      return (t.src = r.src), !t.complete;
    }),
    (e.fn.waitForImages = function () {
      var r,
        t,
        a,
        i = 0,
        n = 0,
        s = e.Deferred();
      if (
        (e.isPlainObject(arguments[0])
          ? ((a = arguments[0].waitForAll),
            (t = arguments[0].each),
            (r = arguments[0].finished))
          : 1 === arguments.length && "boolean" === e.type(arguments[0])
          ? (a = arguments[0])
          : ((r = arguments[0]), (t = arguments[1]), (a = arguments[2])),
        (r = r || e.noop),
        (t = t || e.noop),
        (a = !!a),
        !e.isFunction(r) || !e.isFunction(t))
      )
        throw new TypeError("An invalid callback was supplied.");
      return (
        this.each(function () {
          var c = e(this),
            o = [],
            u = e.waitForImages.hasImageProperties || [],
            h = e.waitForImages.hasImageAttributes || [],
            l = /url\(\s*(['"]?)(.*?)\1\s*\)/g;
          a
            ? c
                .find("*")
                .addBack()
                .each(function () {
                  var r = e(this);
                  r.is("img:uncached") &&
                    o.push({ src: r.attr("src"), element: r[0] }),
                    e.each(u, function (e, t) {
                      var a,
                        i = r.css(t);
                      if (!i) return !0;
                      for (; (a = l.exec(i)); )
                        o.push({ src: a[2], element: r[0] });
                    }),
                    e.each(h, function (t, a) {
                      var i,
                        n = r.attr(a);
                      if (!n) return !0;
                      (i = n.split(",")),
                        e.each(i, function (t, a) {
                          (a = e.trim(a).split(" ")[0]),
                            o.push({ src: a, element: r[0] });
                        });
                    });
                })
            : c.find("img:uncached").each(function () {
                o.push({ src: this.src, element: this });
              }),
            (i = o.length),
            (n = 0),
            0 === i && (r.call(c[0]), s.resolveWith(c[0])),
            e.each(o, function (a, o) {
              var u = new Image(),
                h = "load.waitForImages error.waitForImages";
              e(u).one(h, function a(u) {
                var l = [n, i, "load" == u.type];
                if (
                  (n++,
                  t.apply(o.element, l),
                  s.notifyWith(o.element, l),
                  e(this).off(h, a),
                  n == i)
                )
                  return r.call(c[0]), s.resolveWith(c[0]), !1;
              }),
                (u.src = o.src);
            });
        }),
        s.promise()
      );
    });
})(jQuery);
