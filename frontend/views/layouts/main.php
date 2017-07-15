<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="contentWrapper">
    <div class="">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>



<script type="text/javascript">
    $(document).ready(function(){
        $('.grid').masonry({
            itemSelector: '.grid-item',
            columnWidth: 0
        });
    });
</script>
<script>
    $(document).ready(function() {

        $('#img-gallery').carousel({
            interval: 4000
        });
// handles the carousel thumbnails
        $('[id^=carousel-selector-]').click( function(){
            var id_selector = $(this).attr("id");

            var id = id_selector.substr(id_selector.length -1);
            id = parseInt(id);
            console.log(id);
            $('#img-gallery').carousel(parseInt(id));
            $('[id^=carousel-selector-]').removeClass('selected');
            $(this).addClass('selected');
        });

// when the carousel slides, auto update
//$('#img-gallery').on('slid', function (e) {
//  var id = $('.item.active').data('slide-number');
//  id = parseInt(id);
//  $('[id^=carousel-selector-]').removeClass('selected');
//  $('[id=carousel-selector-'+id+']').addClass('selected');
//});
    });
</script>
<script>
    $(document).ready(function() {
        $("#next1").click(function() {
            $("#perInfo").removeClass("active");
            $("#othFaci").addClass("active");
            $("html,body").animate({scrollTop:0}, 1000);
        });
        $("#next2").click(function() {
            $("#othFaci").removeClass("active");
            $("#budgt").addClass("active");
            $("html,body").animate({scrollTop:0}, 1000);
        });
        $("#prev1").click(function() {
            $("#perInfo").addClass("active");
            $("#othFaci").removeClass("active");
            $("html,body").animate({scrollTop:0}, 1000);
        });
        $("#prev2").click(function() {
            $("#othFaci").addClass("active");
            $("#budgt").removeClass("active");
            $("html,body").animate({scrollTop:0}, 1000);
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(window).scroll(function() {
            if($(this).scrollTop()>50)
            {
                $(".scrolltop").fadeIn("slow");
            }
            else
            {
                $(".scrolltop").fadeOut("slow");
            }
        });
        $(".scrolltop").click(function() {
            $("html,body").animate({scrollTop:0}, 1000);
        });
    });
</script>
<script>$("#price").bootstrapSlider({});</script>
<script>
    /******Bar Ratings********/
    var currentRating = $('#example-fontawesome-o').data('current-rating');

    $('.stars-example-fontawesome-o .current-rating')
        .find('span')
        .html(currentRating);

    $('.stars-example-fontawesome-o .clear-rating').on('click', function(event) {
        event.preventDefault();

        $('#example-fontawesome-o')
            .barrating('clear');
    });

    $('#example-fontawesome-o').barrating({
        theme: 'fontawesome-stars-o',
        showSelectedRating: false,
        initialRating: currentRating,
        onSelect: function(value, text) {
            if (!value) {
                $('#example-fontawesome-o')
                    .barrating('clear');
            } else {
                $('.stars-example-fontawesome-o .current-rating')
                    .addClass('hidden');

                $('.stars-example-fontawesome-o .your-rating')
                    .removeClass('hidden')
                    .find('span')
                    .html(value);
            }
        },
        onClear: function(value, text) {
            $('.stars-example-fontawesome-o')
                .find('.current-rating')
                .removeClass('hidden')
                .end()
                .find('.your-rating')
                .addClass('hidden');
        }
    });
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>


<script type="text/javascript">
    var locations = [
        ['Head Office', 26.206902, 78.200481, 4],
        ['Mumbai Office', 19.107951, 72.852056, 5],
        ['Singapore Office', 1.302791, 103.865377, 3],
        ['Malaysia Office', 3.131420, 101.683513, 2],
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
        center: new google.maps.LatLng(15.870032, 100.99254100000007),
        styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"color":"#7c93a3"},{"lightness":"-10"}]},{"featureType":"administrative.country","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"color":"#c2d1d6"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#dde3e3"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#c2d1d6"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#a9b4b8"},{"lightness":"0"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#a3c7df"}]}],
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            icon:'<?php echo \SiteGlobal::getSiteBaseUrl().\SiteGlobal::DEFAULT_FRONTEND_IMAGE_FOLTER_PATH;?>map-marker.png',
            map: map
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }
</script>
<script>
    $(document).ready(function() {
        $('#selectState').material_select();
    });
    $(document).ready(function() {
        $('#selectCountry').material_select();
    });
</script>
<script>
    $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal').modal();
        $("#loginForm .close").click(function() {
            $('#loginForm').modal('close');
        });
        $("#signupForm .close").click(function() {
            $('#signupForm').modal('close');
        });
        $("#forgotPassword .close").click(function() {
            $('#forgotPassword').modal('close');
            $('#loginForm').modal('open');
        });
        $("#signupBtn").click(function() {
            $('#loginForm').modal('close');
        });
        $("#loginBtn").click(function() {
            $('#signupForm').modal('close');
        });
        $("#forPass").click(function() {
            $('#loginForm').modal('close');
        });
    });
</script>
<script>
    $('.expbar').barrating('show', {
        theme: 'bars-movie'
    });

    $('.expbar').barrating('set', 'Excellent');
</script>
<script> Scrollbar.initAll('desBody','alwaysShowTracks'); </script>
<script>
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });
</script>
<script>
    jQuery(document).ready(function(){
        // This button will increment the value
        $('.qtyplus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            fieldName = $(this).attr('field');
            // Get its current value
            var currentVal = parseInt($('input[name='+fieldName+']').val());
            // If is not undefined
            if (!isNaN(currentVal)) {
                // Increment
                $('input[name='+fieldName+']').val(currentVal + 1);
            } else {
                // Otherwise put a 0 there
                $('input[name='+fieldName+']').val(0);
            }
        });
        // This button will decrement the value till 0
        $(".qtyminus").click(function(e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            fieldName = $(this).attr('field');
            // Get its current value
            var currentVal = parseInt($('input[name='+fieldName+']').val());
            // If it isn't undefined or its greater than 0
            if (!isNaN(currentVal) && currentVal > 0) {
                // Decrement one
                $('input[name='+fieldName+']').val(currentVal - 1);
            } else {
                // Otherwise put a 0 there
                $('input[name='+fieldName+']').val(0);
            }
        });
    });
</script>
</html>
<?php $this->endPage() ?>
