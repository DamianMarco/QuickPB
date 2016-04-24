
@extends('admin.templates.main')
@section('title', 'Bienvenido')

@section('content')
<div id="subhead_container">
        
    <div class="row">

        <div class="jumbotron">
          <div id="features-wrapper">
					<section id="features" class="container">
						<header>
							<h2>Compra en USA y recibe en <strong>M&eacute;xico</strong>!</h2>
						</header>
						<div class="row">
							<div class="4u 12u(mobile)">

								<!-- Feature -->
									<section>
										<a href="#" class="image featured"><img src="{{asset('images/reception.png')}}" alt="" /></a>
										<header>
											<h3>Recibimos tu paquete</h3>
										</header>
										<p>This is <strong>Strongly Typed</strong>, a free, fully responsive site template
										by <a href="http://html5up.net">HTML5 UP</a>. Free for personal and commercial use under the
										<a href="http://html5up.net/license">CCA 3.0 license</a>.</p>
									</section>

							</div>
							<div class="4u 12u(mobile)">

								<!-- Feature -->
									<section>
										<a href="#" class="image featured"><img src="{{asset('images/transit.png')}}" alt="" /></a>
										<header>
											<h3>Lo trasladamos</h3>
										</header>
										<p><a href="http://html5up.net">HTML5 UP</a> is a side project of <a href="http://n33.co">AJ’s</a> (= me).
										I started it as a way to both test my <strong>skel</strong> framework and sharpen up my coding
										and design skills a bit.</p>
									</section>

							</div>
							<div class="4u 12u(mobile)">

								<!-- Feature -->
									<section>
										<a href="#" class="image featured"><img src="{{asset('images/delivery.png')}}" alt="" /></a>
										<header>
											<h3>Lo recibes en M&eacute;xico</h3>
										</header>
										<p><strong>Skel</strong> is a lightweight framework for building responsive
										sites and apps. All of my stuff at <a href="http://html5up.net">HTML5 UP</a> (including this
										one) are built on this framework.</p>
									</section>

							</div>
						</div>
						<ul class="actions">
							<li><a href="#" class="button icon fa-file">M&aacute;s Detalles</a></li>
						</ul>
					</section>
				</div>


        </div>
            
    </div>
</div>


@endsection