<!DOCTYPE html>

<html class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths js" lang="es-MX">
<head>
<div class="fit-vids-style">&shy;
<style>               
	.fluid-width-video-wrapper {                 width: 100%;                              position: relative;                       padding: 0;                            }

   .fluid-width-video-wrapper iframe,        .fluid-width-video-wrapper object,        .fluid-width-video-wrapper embed {           position: absolute;                       top: 0;                                   left: 0;                                  width: 100%;                              height: 100%;                          }                                       
</style>
</div>
	<meta charset="UTF-8">
	<title>@yield('title','agrega title') | QuickPoBox</title>
	<meta name="robots" content="noindex,follow">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap3_3_6/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/fontawesome_4_5_0/css/font-awesome.css')}}">

	<script type="text/javascript">
			window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/72x72\/","ext":".png","source":{"concatemoji":"http:\/\/www.quickpobox.com\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.4.2"}};
			!function(a,b,c){function d(a){var c,d=b.createElement("canvas"),e=d.getContext&&d.getContext("2d"),f=String.fromCharCode;return e&&e.fillText?(e.textBaseline="top",e.font="600 32px Arial","flag"===a?(e.fillText(f(55356,56806,55356,56826),0,0),d.toDataURL().length>3e3):"diversity"===a?(e.fillText(f(55356,57221),0,0),c=e.getImageData(16,16,1,1).data.toString(),e.fillText(f(55356,57221,55356,57343),0,0),c!==e.getImageData(16,16,1,1).data.toString()):("simple"===a?e.fillText(f(55357,56835),0,0):e.fillText(f(55356,57135),0,0),0!==e.getImageData(16,16,1,1).data[0])):!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g;c.supports={simple:d("simple"),flag:d("flag"),unicode8:d("unicode8"),diversity:d("diversity")},c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.simple&&c.supports.flag&&c.supports.unicode8&&c.supports.diversity||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
	</script>
	<script type="text/javascript" src="{{asset('css/wpthemes/js/discover/wp-emoji-release.min.js?ver=4.4.2')}}"></script>
	<style type="text/css">
		img.wp-smiley,
		img.emoji {
			display: inline !important;
			border: none !important;
			box-shadow: none !important;
			height: 1em !important;
			width: 1em !important;
			margin: 0 .07em !important;
			vertical-align: -0.1em !important;
			background: none !important;
			padding: 0 !important;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/wpthemes/css/woocommerce/woocommerce-layout.css?ver=2.4.12')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/wpthemes/css/woocommerce/woocommerce-smallscreen.css?ver=2.4.12')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/wpthemes/css/woocommerce/woocommerce.css?ver=2.4.12')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/wpthemes/css/fileup/css/wordpress_file_upload_style_relaxed.css?ver=1.0')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/wpthemes/css/fileup/css/wordpress_file_upload_style_safe_relaxed.css?ver=1.0')}}">
	<link rel="stylesheet" type="text/css"  src="{{asset('vendor/jquery/jquery-ui.css?ver=4.4.2')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/wpthemes/css/fileup/css/jquery-ui-timepicker-addon.min.css?ver=1.0')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/wpthemes/css/woocommerce/wc-memberships-frontend.min.css?ver=1.4.1')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/wpthemes/css/plugins/default.min.css?ver=1.7')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/wpthemes/css/plugins/rpt_style.min.css?ver=4.4.2')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/superfish.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/wpthemes/js/discover/css/flexslider.css?ver=4.4.2')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/foundation/foundation.css')}}">
	
	<script type="text/javascript" src="{{asset('vendor/jquery/jquery-1.11.3.js')}}"></script>
	<script type="text/javascript" src="{{asset('vendor/jquery/jquery-migrate.min.js?ver=1.2.1')}}"></script>
	<script type="text/javascript" src="{{asset('css/wpthemes/js/discover/modernizr.js')}}"></script>
	<script type="text/javascript" src="{{ asset('css/wpthemes/css/fileup/wordpress_file_upload_functions.js?ver=4.4.2')}}"></script>
	<style>
			a{ 
				color: #fd7800; 
			}
			.widget-container-primary ul li a{ 
				color: #000000; 
			}
			#footer-widget .widget-container ul li a{ 
				color: #fd7800; 
			}
			body{ 
				border-top-color: #fd7800; 
			}
			.meta-data a{ 
				color: #fd7800; 
			}
			.button{ 
				background: #fd7800; 
			}
			.button:hover{ 
				background-color: #ce6200; 
			}
			.button{ 
				border-color: #ce6200; 
			}
			#nav li:hover, #nav li.sfHover, #nav li:hover > a,
			#nav a:focus, #nav a:hover, #nav a:active, #nav li li a{ 
				background: #444444; 
			}
				#nav li ul li:hover, #nav li ul li.sfHover,
				#nav li ul li a:focus, #nav li ul li a:hover, #nav li ul li a:active, #nav li.current_page_item > a,
				#nav li.current-menu-item > a,
				#nav li.current-cat > a{ 
				background: #fd7800; 
			}
			.spaceMargen{
				margin-left: 10px;
				margin-right: 10px;
			}
			</style>

</head>
<body>

@include('admin/templates/partials/headerMenu')

<div class="row">
	<div class=".col-md-6 .col-md-offset-3">
		<ul>
			<li>@include('flash::message')</li>
		</ul>
	</div>
</div>
<div class="spaceMargen">
	@yield('content')
</div>

@include('admin/templates/partials/footer')



<script type="text/javascript" src="{{asset('css/wpthemes/js/discover/superfish.js')}}"></script>
<script type="text/javascript" src="{{asset('css/wpthemes/js/discover/jquery.custom.js')}}"></script>
<script type="text/javascript" src="{{asset('css/wpthemes/js/discover/jquery.fitvids.js?ver=1.0')}}"></script>
<script type="text/javascript" src="{{asset('css/wpthemes/js/discover/jquery.flexslider.js?ver=2.1')}}"></script>
<script type="text/javascript" src="{{asset('css/wpthemes/js/discover/selectnav.js?ver=0.1')}}"></script>
<script type="text/javascript" src="{{asset('css/wpthemes/js/discover/responsive-script.js?ver=1.2.1')}}"></script>
<script type="text/javascript" src="{{asset('css/wpthemes/js/plugins/jquery.form.min.js?ver=3.51.0-2014.06.20')}}"></script>
<script type="text/javascript">
/* <![CDATA[ */
var _wpcf7 = {"loaderUrl":"http:\/\/www.quickpobox.com\/wp-content\/plugins\/contact-form-7\/images\/ajax-loader.gif","recaptchaEmpty":"Please verify that you are not a robot.","sending":"Sending ..."};
/* ]]> */
</script>
<script type="text/javascript" src="{{asset('css/wpthemes/js/plugins/scripts.js?ver=4.3.1')}}"></script>
<script type="text/javascript" src="{{asset('css/wpthemes/js/plugins/jquery.blockUI.min.js?ver=2.70')}}"></script>
<script type="text/javascript">
/* <![CDATA[ */
var woocommerce_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%"};
/* ]]> */
</script>

<script type="text/javascript" src="{{asset('css/wpthemes/css/woocommerce/js/woocommerce.min.js?ver=2.4.12')}}"></script>
<script type="text/javascript" src="{{asset('css/wpthemes/css/woocommerce/js/jquery.cookie.min.js?ver=1.4.1')}}"></script>
<script type="text/javascript">
/* <![CDATA[ */
var wc_cart_fragments_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%","fragment_name":"wc_fragments"};
/* ]]> */
</script>
<script type="text/javascript" src="{{asset('css/wpthemes/js/plugins/core.min.js?ver=1.11.4')}}"></script>
<script type="text/javascript" src="{{asset('css/wpthemes/js/plugins/widget.min.js?ver=1.11.4')}}"></script>
<script type="text/javascript" src="{{asset('css/wpthemes/js/plugins/mouse.min.js?ver=1.11.4')}}"></script>
<script type="text/javascript" src="{{asset('css/wpthemes/js/plugins/slider.min.js?ver=1.11.4')}}"></script>
<script type="text/javascript" src="{{asset('css/wpthemes/js/plugins/datepicker.min.js?ver=1.11.4')}}"></script>
<script type="text/javascript" src="{{asset('css/wpthemes/js/plugins/jquery-ui-timepicker-addon.min.js?ver=4.4.2')}}"></script>
<script type="text/javascript" src="{{asset('css/wpthemes/css/woocommerce/js/wp-embed.min.js?ver=4.4.2')}}"></script>


<script type="text/javascript" src="{{asset('vendor/bootstrap3_3_6/js/bootstrap.js')}}"></script>

<script type="text/javascript">
    
        jQuery("#flash-overlay-modal").modal();
    
</script>
   
</script>
</body>
</html>
