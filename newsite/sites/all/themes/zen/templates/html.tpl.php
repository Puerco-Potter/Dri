<?php
/**
 * @file
 * Returns the HTML for the basic html structure of a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728208
 */
?><!DOCTYPE html>
<!--[if IEMobile 7]><html class="iem7" <?php print $html_attributes; ?>><![endif]-->
<!--[if lte IE 6]><html class="lt-ie9 lt-ie8 lt-ie7" <?php print $html_attributes; ?>><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="lt-ie9 lt-ie8" <?php print $html_attributes; ?>><![endif]-->
<!--[if IE 8]><html class="lt-ie9" <?php print $html_attributes; ?>><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!--><html <?php print $html_attributes . $rdf_namespaces; ?>><!--<![endif]-->
    <head>
        <?php print $head; ?>
        <title><?php print $head_title; ?></title>

        <?php if ($default_mobile_metatags): ?>
            <meta name="MobileOptimized" content="width">
            <meta name="HandheldFriendly" content="true">
            <meta name="viewport" content="width=device-width">
        <?php endif; ?>
        <meta http-equiv="cleartype" content="on">        
        <!-- jQuery -->
        <script src="http://code.jquery.com/jquery-1.11.3.js"></script>
        <!-- UI, for draggable nodes -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.15/jquery-ui.min.js"></script>

        <!-- Raphael for SVG support (won't work on android) -->

        <style>
            ul {
                position: relative;
                top: 400px; left: 600px;
                list-style-type: none;
                margin: 0;
                padding: 0;
            }
            li {
                position: absolute;
                -webkit-transition: all 2s linear;
                -moz-transition: all 2s linear;
                transition: all 2s linear;
                text-align: center;
            }

            ul li ul {
                display: inline;
                position: absolute;
                top: 0px;
                left: 0px;
            }
            ul li ul li {
                font-size: 12px;
                text-align: center;
            }

            ul li ul li ul li {
                font-size: 10px;
            }
        </style>

    </head>
    <body>

        <?php print $page; ?>

        <script>
            var type = 1, //circle type - 1 whole, 0.5 half, 0.25 quarter
                    radius = '20em', //distance from center
                    start = -90, //shift start from 0
                    elements = $('ul > li > ul > li').not('ul  li  ul  li  ul li'),
                    numberOfElements = (type === 1) ? elements.length : elements.length - 1, //adj for even distro of elements when not full circle
                    slice = 360 * type / numberOfElements;

            elements.each(function (i) {
                var $self = $(this),
                        rotate = slice * i + start,
                        rotateReverse = rotate * -1;

                $self.css({
                    'transform': 'rotate(' + rotate + 'deg) translate(' + radius + ') rotate(' + rotateReverse + 'deg)'
                });


                ordenasubitems($self);
            });

            function ordenasubitems($element) {
                //$subElements = $element. //$('ul > li > ul li');
                if ($element.children().length > 0) {
                    console.log($element.children().children().length);
                    nElements = $element.children().children().length;
                    subslice = 360 * type / nElements;
                    subradius = '7em';
                    //console.log($subElements);

                    $element.children().children().each(function (i) {
                        //alert('hola');
                        var $subitem = $(this),
                                rotate = subslice * i + start,
                                rotateReverse = rotate * -1;

                        $subitem.css({
                            'transform': 'rotate(' + rotate + 'deg) translate(' + subradius + ') rotate(' + rotateReverse + 'deg)'
                        });
                    });

                }
            }
        </script>
    </body>
</html>
