/**
 * Theme: Abstack - Bootstrap 4 Web App kit
 * Author: Coderthemes
 * Module/App: Main Js
 */


(function ($) {

    'use strict';

    function initSlimscrollMenu() {

        $('.slimscroll-menu').slimscroll({
            height: 'auto',
            position: 'right',
            size: "8px",
            color: '#9ea5ab',
            wheelStep: 5
        });
    }

    function initSlimscroll() {
        $('.slimscroll').slimscroll({
            height: 'auto',
            position: 'right',
            size: "8px",
            color: '#9ea5ab'
        });
    }

    function initMetisMenu() {
        //metis menu
        $("#side-menu").metisMenu();
    }

    function initLeftMenuCollapse() {
        // Left menu collapse
        $('.button-menu-mobile').on('click', function (event) {
            event.preventDefault();
            $("body").toggleClass("enlarged");
            $.ajax({
              url: '/profiles/update-setting-side-bar',
              data: 'toggle-side-bar=' + $("body").attr('class'),
              success: function(data) {},
              error: function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
              }
            });
        });
    }

    function initChangeLeftMenuTab() {
        // Left menu collapse
        $('.trigger-left-menu-tab').on('click', function (event) {
            event.preventDefault();
            let current = $(this);
            $.ajax({
              url: '/profiles/update-setting-left-menu-tab',
              data: 'left-menu-tab-setting=' + current.attr('id-user-setting'),
              success: function(data) {},
              error: function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
              }
            });
        });
    }

    function initEnlarge() {
        if ($(window).width() < 1025 && !$('body').hasClass('enlarged')) {
            $('body').addClass('enlarged');
        }
    }

    function initChangeBgNb() {
        $('.event').on('click', function (e) {
            let color = $('.event').serialize();
            $.ajax({
              url: '/profiles/update-setting-nb-bg',
              data: color,
              success: function(data) {
                location.reload();
              },
              error: function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
              }
            });
        });
    }

    function initChangeNewsPanel() {
        $('.event-news-panel').on('click', function (e) {
            let panel = $(this);
            $.ajax({
              url: '/profiles/update-setting-news-panel?toggle-news-panel=' + panel.val(),
              data: panel.val(),
              success: function(data) {
                $('.event-news-panel:disabled').removeAttr('disabled')
                panel.attr('disabled', 'disabled')
              },
              error: function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
              }
            });
        });
    }

    function initActiveMenu() {
        // === following js will activate the menu in left side bar based on url ====
        $("#sidebar-menu a").each(function () {
            if (this.href == window.location.href) {
                $(this).addClass("active");
                $(this).parent().addClass("active"); // add active to li of the current link
                $(this).parent().parent().addClass("in");
                $(this).parent().parent().prev().addClass("active"); // add active class to an anchor
                $(this).parent().parent().parent().addClass("active");
                $(this).parent().parent().parent().parent().addClass("in"); // add active to li of the current link
                $(this).parent().parent().parent().parent().parent().addClass("active");
            }
        });
    }

    function init() {
        initSlimscrollMenu();
        initSlimscroll();
        initMetisMenu();
        initLeftMenuCollapse();
        initEnlarge();
        initActiveMenu();
        initChangeBgNb();
        initChangeNewsPanel();
        initChangeLeftMenuTab();
    }

    init();

})(jQuery)

