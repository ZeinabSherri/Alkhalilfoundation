function init(e) {
  $(window).width();
  document.querySelector("#nav-toggle").addEventListener("click", function () {
    this.classList.toggle("active");
  }),
    $("#nav-toggle").click(function () {
      if ($(".mobile-navigation").hasClass("ooo"))
        $(".fade-in").removeClass("fff"),
          $(".mobile-navigation").removeClass("ooo"),
          $(".mobile-navigation").removeClass("nav-open");
      else {
        $(".mobile-navigation").addClass("ooo"), $(".fade-in").addClass("fff");
        var e = 0;
        $(".mob_menu li").each(function () {
          e = e + $(this).height() + 40;
        }),
          $(".mob_menu").height(e - 142),
          $(".mobile-navigation").addClass("nav-open");
      }
    }),
    $(window).resize(function () {
      $(window).width() > 1076 &&
        !isMobileDev() &&
        $(".mobile-navigation").hasClass("ooo") &&
        ($(".fade-in").removeClass("fff"),
        $(".mobile-navigation").removeClass("ooo"),
        $(".mobile-navigation").removeClass("nav-open"),
        $("#nav-toggle").removeClass("active"));
    });
  $(window).scroll(function () {
    $(this).scrollTop() >= 300
      ? $("#return-to-top").fadeIn("slow")
      : $("#return-to-top").fadeOut("slow");
  }),
    $("#return-to-top").click(function () {
      $("html, body").animate({ scrollTop: 0 }, 700);
    });
}
function openSub() {
  var e = $("#mob_menu_item").attr("yes");
  e && 1 == e
    ? ($(".sub-distance-mob").removeAttr("id"),
      $("#mob_menu_item").attr("yes", "0"))
    : ($(".sub-distance-mob").attr("id", "sub-distance-mob"),
      $("#mob_menu_item").attr("yes", "1"));
  var i = 0;
  $(".mob_menu li").each(function () {
    i = i + $(this).height() + 40;
  }),
    $(".mob_menu").height(i - 142);
}
function loadhome(e) {
  1 == load1 &&
    1 == load2 &&
    (msieversion()
      ? $("body")
          .css({ opacity: 0, visibility: "visible" })
          .animate({ opacity: 1 }, 2e3)
      : $("body").addClass("fade-in"),
    loadBanner(e, 1, 0),
    init(1),
    fixHeight(".news-events-b", 768));
}
function loadpages(e, i, n, o) {
  if (1 == load3 && 1 == load4) {
    if (
      (msieversion()
        ? $("body")
            .css({ opacity: 0, visibility: "visible" })
            .animate({ opacity: 1 }, 2e3)
        : $("body").addClass("fade-in"),
      loadBanner(n, e, 0),
      init(e),
      2 == e && fixHeight(".about-section", 768),
      6 == e && fixHeight(".contact-box", 768),
      4 == e || 5 == e)
    ) {
      var t = $("#v").val();
      if (1 == o && n > 0 && t > 1) {
        var a = $(".gallery-container").masonry({
          itemSelector: ".gallery-box",
          percentPosition: !0,
          gutter: 10,
        });
        a.imagesLoaded().progress(function () {
          a.masonry();
        });
      } else fixHeight(".news-box", 768);
    }
    3 == e &&
      ($("#page_navigation").removeClass("page-fixed"),
      setTimeout(function () {
        scrollToPage();
      }, 400)),
      (2 != e && 3 != e) || goToPage(i);
  }
}
function loadBanner(e, i, n) {
  e > 0 &&
    ($(".banner-slideshow ul").cycle({
      fx: "fade",
      slideResize: 1,
      speed: 4e3,
    }),
    ($.fn.fullscreen = function () {
      if (1 == i) var e = "600px";
      else e = "470px";
      var n = $(window).width();
      $(this).css({ height: e, width: n });
    }),
    ($.fn.stopfullscreen = function () {
      var e = $(window).width();
      $(this).css({ height: "470px", width: e });
    }),
    $(window).width() > 768
      ? $(".banner-slideshow, .banner-slideshow li").fullscreen()
      : $(".banner-slideshow, .banner-slideshow li").stopfullscreen(),
    1 == i && $(window).width() > 768
      ? $(".ekf-banner").height("600px")
      : $(".ekf-banner").height("470px"),
    $(window).resize(function () {
      $(window).width() > 768
        ? $(".banner-slideshow, .banner-slideshow li").fullscreen()
        : $(".banner-slideshow, .banner-slideshow li").stopfullscreen(),
        1 == i && $(window).width() > 768
          ? $(".ekf-banner").height("600px")
          : $(".ekf-banner").height("470px");
    }),
    $(window).trigger("resize"));
}
function getGallery(e, i) {
  $("#lightgallery_" + e).lightGallery({ thumbnail: !1 }),
    $("#lightgallery_" + e + " a")[i].click();
}
function scrollToPage() {
  $(window)
    .scroll(function () {
      isMobileDev() ||
        ($(window).width() > 768
          ? $("#page_navigation")
              .removeClass("page-fixed")
              .toggleClass(
                "page-fixed",
                $("#page_navigation").offset().top - 100 <
                  $(window).scrollTop() + 10
              )
          : $("#page_navigation").removeClass("page-fixed"));
    })
    .scroll(),
    isMobileDev() &&
      $(window).width() > 768 &&
      $("#page_navigation").addClass("page-absolute"),
    $(window).resize(function () {
      $(window)
        .scroll(function () {
          isMobileDev() ||
            ($(window).width() > 768
              ? $("#page_navigation")
                  .removeClass("page-fixed")
                  .toggleClass(
                    "page-fixed",
                    $("#page_navigation").offset().top - 100 <
                      $(window).scrollTop() + 10
                  )
              : $("#page_navigation").removeClass("page-fixed"));
        })
        .scroll(),
        isMobileDev() &&
          $(window).width() > 768 &&
          $("#page_navigation").addClass("page-absolute");
    });
}
function goToPage(e) {
  var i,
    n = $(".page_navigation"),
    o = n.outerHeight() + 15,
    t = n.find("a"),
    a = t.map(function () {
      var e = $($(this).attr("lang"));
      if (e.length) return e;
    });
  "" != e &&
    setTimeout(function () {
      var i = "#service_" + e,
        n = "#" === i ? 0 : $(i).offset().top - o - 85;
      $("html, body").stop().animate({ scrollTop: n }, 300);
    }, 400),
    t.click(function (e) {
      var i = $(this).attr("lang"),
        n = "#" === i ? 0 : $(i).offset().top - o - 44;
      $("html, body").stop().animate({ scrollTop: n }, 300), e.preventDefault();
    }),
    $(window).scroll(function () {
      var e = $(this).scrollTop() + o,
        n = a.map(function () {
          if ($(this).offset().top - 80 < e) return this;
        }),
        s = (n = n[n.length - 1]) && n.length ? n[0].id : "";
      i !== s &&
        ((i = s),
        t
          .parent()
          .removeClass("active_page")
          .end()
          .filter("[lang=#" + s + "]")
          .parent()
          .addClass("active_page"));
    });
}
function OpenRequest(e) {
  setTimeout(function () {
    $("#gradientBgNew").stop().animate({ scrollTop: 0 }, 500);
  }, 400),
    $(".update_frame").css("display", "none"),
    $("#update_frame2")
      .attr("src", test + "iframe/" + e)
      .css("display", "block"),
    $("#gradientBgNew").fadeIn("normal");
}
function closePopupThankyou() {
  $("#gradientBg").hide(), $("#gradientBgNew").hide();
}
function fixHeight(e, i) {
  if ($(window).width() > i) {
    var n = 0;
    $(e).css("height", "auto"),
      $(e).each(function () {
        $(this).height() > n && (n = $(this).height());
      }),
      $(e).height(n);
  } else $(e).height("auto");
  $(window).resize(function () {
    if ($(window).width() > i) {
      var n = 0;
      $(e).css("height", "auto"),
        $(e).each(function () {
          $(this).height() > n && (n = $(this).height());
        }),
        $(e).height(n);
    } else $(e).height("auto");
  });
}
function msieversion() {
  return !!(
    window.navigator.userAgent.indexOf("MSIE ") > 0 ||
    navigator.userAgent.match(/Trident.*rv\:11\./)
  );
}
function isMobileDev() {
  return (
    -1 != navigator.userAgent.indexOf("Android") ||
    -1 != navigator.userAgent.indexOf("BlackBerry") ||
    -1 != navigator.userAgent.indexOf("iPhone") ||
    -1 != navigator.userAgent.indexOf("iPod") ||
    -1 != navigator.userAgent.indexOf("Nokia") ||
    -1 != navigator.userAgent.indexOf("LG") ||
    -1 != navigator.userAgent.indexOf("Samsung") ||
    -1 != navigator.userAgent.indexOf("Sony") ||
    -1 != navigator.userAgent.indexOf("PlayBook") ||
    -1 != navigator.userAgent.indexOf("SonyEricsson") ||
    -1 != navigator.userAgent.indexOf("SIE-") ||
    -1 != navigator.userAgent.indexOf("Motorola") ||
    -1 != navigator.userAgent.indexOf("iPad")
  );
}
function isEmail(e) {
  return e.indexOf("@") > 0;
}
function resizeIframe(e) {
  (e.style.height = e.contentWindow.document.body.scrollHeight + "px"),
    $(window).resize(function () {
      e.style.height = e.contentWindow.document.body.scrollHeight + "px";
    });
}
$(function () {});
