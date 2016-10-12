// Generated by CoffeeScript 1.10.0
var change_slogan, draw, spinner, video_mobile;

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

video_mobile = function() {
  if (jQuery(window).width() < 769) {
    jQuery('.fixed_box').removeClass('affix');
    jQuery('.widget_yt_widget .fixed_box').width(jQuery('.widget').parent().width() + 30);
    return jQuery('.widget_yt_widget').detach().appendTo('.entry-content');
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
    while (i < window.o_drops.length) {
      text = window.o_chinese[Math.floor(Math.random() * window.o_chinese.length)];
      ctx.fillText(text, i * window.o_font_size, window.o_drops[i] * window.o_font_size);
      if (window.o_drops[i] * window.o_font_size > o.height && Math.random() > 0.975) {
        window.o_drops[i] = 0;
      }
      window.o_drops[i]++;
      i++;
    }
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

jQuery('.news .arrow.fa-angle-up').click(function() {
  return jQuery(".news ul.box-carousel > li:visible").hide().prevOrLast().slideDown("fast");
});

jQuery('.news .arrow.fa-angle-down').click(function() {
  return jQuery(".news ul.box-carousel > li:visible").hide().nextOrFirst().slideDown("fast");
});

jQuery('.guest-post .arrow.fa-angle-up').click(function() {
  return jQuery(".guest-post ul.box-carousel > li:visible").hide().prevOrLast().slideDown("fast");
});

jQuery('.guest-post .arrow.fa-angle-down').click(function() {
  return jQuery(".guest-post ul.box-carousel > li:visible").hide().nextOrFirst().slideDown("fast");
});

jQuery('.last-events .arrow').click(function() {
  return jQuery(".last-events .first-block").slideToggle();
});

change_slogan = function() {
  return jQuery(".slogan ul li:visible").hide().nextOrFirst().css("display", "inline");
};

setInterval(change_slogan, 2000);

jQuery('.slogan').flowtype({
  minimum: 400,
  maximum: 1200,
  minFont: 13,
  maxFont: 40
});

jQuery('.last-events').flowtype({
  minimum: 300,
  maximum: 1200,
  minFont: 12,
  maxFont: 20
});

if (jQuery(window).width() > 769) {
  jQuery('.main').css('min-height', jQuery('aside').height() + 20);
}

jQuery('body').backstretch(template.path + '/assets/img/background.jpg');

jQuery('.widget_yt_widget .fixed_box').width(jQuery('.widget').parent().width() + 30);

video_mobile();

jQuery(window).resize(function() {
  return video_mobile();
});

jQuery('a').has("img").css({
  transform: "none",
  display: "block"
});

jQuery('.entry-content-asset').has(".github-embed").css('padding-bottom', "25%");

jQuery('.main article .entry-content img').each(function(index) {
  if (jQuery(this).attr('width') < 500) {
    return jQuery(this).css({
      'width': 'auto'
    });
  }
});

jQuery(".social-facebook,.social-linkedin").click(function(e) {
  var link;
  link = this;
  e.preventDefault();
  e.stopPropagation();
  return jQuery("html").animate({
    scrollTop: 0
  }, "fast", function() {
    return bootbox.alert(jQuery(link).data('text') + '<br><br>' + '<a href="' + jQuery(link).attr('href') + '">' + jQuery(link).attr('href') + '</a>');
  });
});

jQuery(".social-feed").click(function(e) {
  var link;
  link = this;
  e.preventDefault();
  e.stopPropagation();
  return jQuery("html").animate({
    scrollTop: 0
  }, "fast", function() {
    return bootbox.alert(jQuery(link).data('text'));
  });
});

//# sourceMappingURL=script.js.map
