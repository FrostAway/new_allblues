$(document).ready(function() {
    // dropdown menu
    $("#top-menu li.dropdown").hover(function() {
            $(this).children("ul.dropdown-menu").fadeIn();
        },
        function() {
            $(this).children("ul.dropdown-menu").fadeOut();
        });

    /************  scroll windows  ************/

    $(window).scroll(function(){

        if ($(this).scrollTop() >= 200) {
            animate_feature_title();
        }
        if ($(this).scrollTop() >= 350) {
            animate_feature_box();
        }
        if ($(this).scrollTop() >= 680) {
            animate_template_title();
        }

        // about page
        if ($(this).scrollTop() >= 400) {
            skill_animate();
        }
    });

    // hover feature box
    $(".feature-box").hover(function(){
//            $(this).animate({
//                top:"-=20px"
//            });
            $(this).children("h3").slideUp(100);
            //$(this).children("p").css({"font-weight":"bold"});
        },
        function() {
//            $(this).animate({
//                top:"+=20px"
//            });
            $(this).children("h3").slideDown(100);
            //$(this).children("p").css({"font-weight":"normal"});
        });

    // click template category icon
    $("#templates-header>ul>li").click(function() {
        // remove active for any
        $("#templates-header>ul>li.active").find(".li-triangle").remove();
        $("#templates-header>ul>li.active").removeClass("active");

        // add active for click
        $(this).addClass("active");
        $(this).append("<div class='li-triangle'></div>");

        // hide templates which not in category
        var category_id = $(this).attr("data-category");
        $(".template-box").each(function(){
            if ($(this).attr("cat").indexOf(category_id) > -1) {
                $(this).show();
            }
            else {
                $(this).hide();
            }
        });

    });

    // click view template
    $(".view-template").click(function() {
        // get src of appropriate image
        $("#fixed-layer").fadeIn("slow");
        $("#close-layer").fadeIn("slow");
        $("#fixed-layer>img").attr("src", $(this).attr("data-img"));
    });

    // close layer
    $("#close-layer").click(function() {
        $("#fixed-layer").fadeOut("slow");
        $("#close-layer").fadeOut("slow");
    });

    // progress animate
    $(".progress-box").hover(function() {
            $(this).animate({top:"-=20px"});
        },
        function() {
            $(this).animate({top:"+=20px"});
        });

    // up to top button
    $('#up-button').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });

    /*********************************************************/
    /*********************************************************/
    /**                                                     **/
    /**                   FUNCTIONS DEFINE                  **/
    /**                                                     **/
    /*********************************************************/
    /*********************************************************/

    // animate feature header function
    count_animate_1 = 0;
    function animate_feature_title() {
        if (count_animate_1 == 0) {
            count_animate_1++;

            $("#feature>.wrapper>p").animate({
                opacity:"1"
            });
        }
    }

    // animate feature box function
    count_animate_2 = 0;
    function animate_feature_box() {
        if (count_animate_2 == 0) {
            count_animate_2++;

            $(".feature-box").animate({
                opacity:"1"
            });
        }
    }

    count_animate_3 = 0;
    function animate_template_title() {
        if (count_animate_3 == 0) {
            count_animate_3++;

            $("#templates>h1").animate({
                top:"-=40px"
            },800, function() {
                $("#templates>h1").animate({
                    top:"+=40px"
                }, 1200);
            });
        }
    }

    count_animate_4 = 0;
    function skill_animate() {
        if (count_animate_4 == 0) {
            count_animate_4++;

            animate_width(".skill-1", "89%");
            animate_width(".skill-2", "95%");
            animate_width(".skill-3", "100%");
            animate_width(".skill-4", "85%");
            animate_width(".skill-5", "98%");
        }
    }

    function animate_width(class_name, width_percent) {
        $(class_name).animate({
            width:"100%"
        },2000, function() {
            $(class_name).animate({width:width_percent});
        });
    }

});