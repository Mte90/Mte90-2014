(function() {
  var draw, spinner;

  (function($) {
    var change_slogan;
    $('.news .arrow.fa-angle-up').click(function(e) {
      return $(".news ul li:visible").hide().prevOrLast().slideDown("fast");
    });
    $('.news .arrow.fa-angle-down').click(function(e) {
      return $(".news ul li:visible").hide().nextOrFirst().slideDown("fast");
    });
    $('.guest-post .arrow.fa-angle-up').click(function(e) {
      return $(".guest-post ul li:visible").hide().prevOrLast().slideDown("fast");
    });
    $('.guest-post .arrow.fa-angle-down').click(function(e) {
      return $(".guest-post ul li:visible").hide().nextOrFirst().slideDown("fast");
    });
    $('.last-events .arrow').click(function(e) {
      return $(".last-events .first-block").slideToggle();
    });
    change_slogan = function() {
      return $(".slogan ul li:visible").hide().nextOrFirst().css("display", "inline");
    };
    setInterval(change_slogan, 2000);
    $('.slogan').flowtype({
      minimum: 400,
      maximum: 1200,
      minFont: 13,
      maxFont: 40
    });
    $('.last-events').flowtype({
      minimum: 300,
      maximum: 1200,
      minFont: 12,
      maxFont: 20
    });
    jQuery('body').backstretch(template.path + '/assets/img/background.jpg');
    jQuery('.widget_yt_widget .fixed_box').width(jQuery('.widget').parent().width() + 30);
    jQuery(window).resize(function() {
      if (jQuery(window).width() < 769) {
        jQuery('.widget_yt_widget .fixed_box').width(jQuery('.widget').parent().width() + 30);
        jQuery('.float_box').removeClass('affix');
        jQuery('.widget_yt_widget').detach().appendTo('.entry-content');
      }
    });
    jQuery('a:hover').has("img").css({
      transform: "none"
    });
    return $(".social-facebook,.social-linkedin").click(function(e) {
      e.preventDefault();
      e.stopPropagation();
      return bootbox.alert($(this).data('text') + '<br><br>' + '<a href="' + $(this).attr('href') + '">' + $(this).attr('href') + '</a>');
    });
  })(jQuery);

  jQuery.fn.nextOrFirst = function(selector) {
    var next;
    next = this.next(selector);
    if (next.length) {
      return next;
    } else {
      return this.prevAll(selector).last();
    }
  };

  jQuery.fn.prevOrLast = function(selector) {
    var prev;
    prev = this.prev(selector);
    if (prev.length) {
      return prev;
    } else {
      return this.nextAll(selector).last();
    }
  };

  spinner = function() {
    var columns, o, x;
    o = document.querySelector(".c");
    o.height = window.innerHeight;
    o.width = window.innerWidth;
    o.style.display = "block";
    document.querySelector(".wrapper").style.display = "none";
    document.querySelector(".backstretch").style.display = "none";
    columns = o.width / window.o_font_size;
    window.o_drops = [];
    x = 0;
    while (x < columns) {
      window.o_drops[x] = 1;
      x++;
    }
    window.o_kill = setInterval(draw, 33);
  };

  draw = function() {
    var ctx, i, o, text;
    o = document.querySelector(".c");
    if (o !== null) {
      ctx = o.getContext("2d");
      ctx.fillStyle = "rgba(0, 0, 0, 0.05)";
      ctx.fillRect(0, 0, o.width, o.height);
      ctx.fillStyle = "#0F0";
      ctx.font = window.o_font_size + "px arial";
      i = 0;
    }
    while (i < window.o_drops.length) {
      text = window.o_chinese[Math.floor(Math.random() * window.o_chinese.length)];
      ctx.fillText(text, i * window.o_font_size, window.o_drops[i] * window.o_font_size);
      if (window.o_drops[i] * window.o_font_size > o.height && Math.random() > 0.975) {
        window.o_drops[i] = 0;
      }
      window.o_drops[i]++;
      i++;
    }
  };

  document.querySelector("#copy").addEventListener("click", function() {
    var m, o;
    if (document.querySelector(".c") === null) {
      o = document.createElement("canvas");
      o.classList.add("c");
      document.body.appendChild(o);
      window.o_font_size = 10;
      m = document.createElement("div");
      m.classList.add("d");
      m.textContent = "Welcome to Canvas Matrix, Neo";
      document.body.appendChild(m);
      window.o_chinese = "田由甲申甴电甶男甸甹町画甼甽甾甿畀畁畂畃畄畅畆畇畈畉畊畋界畍畎畏畐畑";
      window.o_chinese = window.o_chinese.split("");
    }
    spinner();
  }, false);

  window.onkeydown = function(e) {
    if (e.keyCode === 27) {
      document.querySelector(".c").remove();
      document.querySelector(".d").remove();
      clearInterval(window.o_kill);
      document.querySelector(".wrapper").style.display = "block";
      document.querySelector(".backstretch").style.display = "block";
    }
  };

}).call(this);

//# sourceMappingURL=_script.js.map
