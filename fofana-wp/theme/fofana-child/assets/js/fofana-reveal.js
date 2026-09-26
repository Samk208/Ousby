/**
 * Fofana — Reveal & Counter Animation
 *
 * Minimal IntersectionObserver script (~30 lines).
 * No external animation library. Respects prefers-reduced-motion.
 *
 * @package FofanaChild
 */
(function () {
  "use strict";

  // Bail early if user prefers reduced motion.
  var prefersReducedMotion = window.matchMedia(
    "(prefers-reduced-motion: reduce)",
  ).matches;

  // Reveal elements with .fofana-reveal class.
  var revealElements = document.querySelectorAll(".fofana-reveal");

  if (prefersReducedMotion) {
    // Immediately show all elements without animation.
    revealElements.forEach(function (el) {
      el.classList.add("is-visible");
    });
    return;
  }

  if ("IntersectionObserver" in window) {
    var revealObserver = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-visible");
            revealObserver.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.15, rootMargin: "0px 0px -60px 0px" },
    );

    revealElements.forEach(function (el) {
      revealObserver.observe(el);
    });
  } else {
    // Fallback: show everything immediately.
    revealElements.forEach(function (el) {
      el.classList.add("is-visible");
    });
  }

  // Animated counter — counts up to data-target when element enters viewport.
  var counters = document.querySelectorAll(".fofana-counter");

  function animateCounter(el) {
    var target = parseInt(el.getAttribute("data-target"), 10);
    var suffix = el.getAttribute("data-suffix") || "";
    var duration = 1500;
    var startTime = null;

    function easeOutExpo(t) {
      return t === 1 ? 1 : 1 - Math.pow(2, -10 * t);
    }

    function formatNumber(n) {
      return n.toLocaleString("fr-FR");
    }

    function step(timestamp) {
      if (!startTime) startTime = timestamp;
      var progress = Math.min((timestamp - startTime) / duration, 1);
      var current = Math.floor(easeOutExpo(progress) * target);
      el.textContent = formatNumber(current) + suffix;
      if (progress < 1) {
        requestAnimationFrame(step);
      } else {
        el.textContent = formatNumber(target) + suffix;
      }
    }

    requestAnimationFrame(step);
  }

  if (prefersReducedMotion) {
    // Show final number immediately.
    counters.forEach(function (el) {
      var target = parseInt(el.getAttribute("data-target"), 10);
      var suffix = el.getAttribute("data-suffix") || "";
      el.textContent = target.toLocaleString("fr-FR") + suffix;
    });
    return;
  }

  if ("IntersectionObserver" in window) {
    var counterObserver = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            animateCounter(entry.target);
            counterObserver.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.5 },
    );

    counters.forEach(function (el) {
      counterObserver.observe(el);
    });
  } else {
    counters.forEach(function (el) {
      var target = parseInt(el.getAttribute("data-target"), 10);
      var suffix = el.getAttribute("data-suffix") || "";
      el.textContent = target.toLocaleString("fr-FR") + suffix;
    });
  }
})();
