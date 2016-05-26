jQuery(document).ready(function($) {

    "use strict";

    jQuery(".mobile-menu").on("click", function($) {
        jQuery(this).toggleClass("open");
        jQuery("header nav .menu").slideToggle("slow");
    });

    jQuery("#search-link").on("click", function(e) {
        e.preventDefault();
        jQuery(".search-overlay").fadeIn("slow");
        jQuery(".search-overlay #search-input").focus();
        jQuery("body").on({
            "mousewheel": function(e) {
                if (e.target.id == 'el') return;
                e.preventDefault();
                e.stopPropagation();
            }
        });
        jQuery(".search-overlay #close-search").on("click", function() {
            jQuery(".search-overlay").fadeOut("slow");
            jQuery(".search-overlay #search-input").val("");
            jQuery("body").unbind("mousewheel");
        });
        jQuery(document).on("keyup", function(e) {
            if (e.keyCode == 27) {
                jQuery(".search-overlay").fadeOut("slow");
                jQuery(".search-overlay #search-input").val("");
                jQuery("body").unbind("mousewheel");
            }
        });
    });

    jQuery("#socials-link").on("click", function(e) {
        e.preventDefault();
        jQuery(".socials-overlay").fadeIn("slow");
        jQuery("body").on({
            "mousewheel": function(e) {
                if (e.target.id == 'el') return;
                e.preventDefault();
                e.stopPropagation();
            }
        });
        jQuery(".socials-overlay #close-socials").on("click", function() {
            jQuery(".socials-overlay").fadeOut("slow");
            jQuery("body").unbind("mousewheel");
        });
        jQuery(document).keyup(function(e) {
            if (e.keyCode == 27) {
                jQuery(".socials-overlay").fadeOut("slow");
                jQuery("body").unbind("mousewheel");
            }
        });
    });


});


jQuery(window).load(function($) {

    "use strict";

    jQuery('.portfolio-masonry').isotope({
        itemSelector: '.col-md-4'
    });

    jQuery('.portfolio-masonry2').isotope({
        itemSelector: '.col-md-3'
    });

    jQuery('.portfolio-masonry3').isotope({
        itemSelector: '.col-md-6'
    });

    jQuery('.blog-masonry').isotope({
        itemSelector: '.col-md-4'
    });

    jQuery('.blog-masonry2').isotope({
        itemSelector: '.col-md-6'
    });

    jQuery(function($) {
        // init Isotope
        var $container = $('.portfolio-masonry,.portfolio-masonry2,.portfolio-masonry3').isotope({
            itemSelector: '.item'
        });
        // filter functions
        var filterFns = {
            // show if number is greater than 50
            numberGreaterThan50: function() {
                var number = $(this).find('.number').text();
                return parseInt(number, 10) > 50;
            },
            // show if name ends with -ium
            ium: function() {
                var name = $(this).find('.name').text();
                return name.match(/ium$/);
            }
        };
        // bind filter button click
        jQuery('#filters').on('click', 'li', function() {
            var filterValue = $(this).attr('data-filter');
            // use filterFn if matches value
            filterValue = filterFns[filterValue] || filterValue;
            $container.isotope({
                filter: filterValue
            });
        });
        // change is-checked class on buttons
        jQuery('.filters').each(function(i, buttonGroup) {
            var $buttonGroup = $(buttonGroup);
            $buttonGroup.on('click', 'li', function() {
                $buttonGroup.find('.active').removeClass('active');
                $(this).addClass('active');
            });
        });
    });

    jQuery(function() {
        // init Isotope
        var $container = jQuery('portfolio-v1 .portfolio-masonry,portfolio-v2 .portfolio-masonry2,portfolio-v3 .portfolio-masonry3').isotope({
            itemSelector: '.item'
        });
        // filter functions
        var filterFns = {
            // show if number is greater than 50
            numberGreaterThan50: function() {
                var number = $(this).find('.number').text();
                return parseInt(number, 10) > 50;
            },
            // show if name ends with -ium
            ium: function() {
                var name = $(this).find('.name').text();
                return name.match(/ium$/);
            }
        };
        // bind filter button click
        jQuery('#filters').on('click', 'li', function() {
            var filterValue = jQuery(this).attr('data-filter');
            // use filterFn if matches value
            filterValue = filterFns[filterValue] || filterValue;
            $container.isotope({
                filter: filterValue
            });
        });
        // change is-checked class on buttons
        jQuery('.filters').each(function(i, buttonGroup) {
            var $buttonGroup = jQuery(buttonGroup);
            $buttonGroup.on('click', 'li', function() {
                $buttonGroup.find('.active').removeClass('active');
                jQuery(this).addClass('active');
            });
        });
    });

    jQuery(".loader").fadeOut("slow");
});