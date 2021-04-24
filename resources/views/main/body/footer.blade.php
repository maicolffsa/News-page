<!-- top-footer-start -->
	<section>
		<div class="container-fluid">
			<div class="top-footer">
				<div class="row">
					<div class="col-md-3 col-sm-4">
						<div class="foot-logo">
 <img src="{{ asset('frontend/assets/img/PPT.png') }}" style="height: 100px; with: 150px;" />
						</div>
					</div>
					<div class="col-md-6 col-sm-4">
						 <div class="social">
                            <ul>
                                <li><a href="" target="_blank" class="facebook"> <i class="fa fa-facebook"></i></a></li>
                                <li><a href="" target="_blank" class="instagram"> <i class="fa fa-instagram"></i></a></li>
                                <li><a href="" target="_blank" class="youtube"> <i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
					</div>
					<div class="col-md-3 col-sm-4">
						<div class="apps-img">
							<ul>
 <li><a href="#"><img src="{{ asset('frontend/assets/img/apps-01.png') }}" alt="" /></a></li>
 <li><a href="#"><img src="{{ asset('frontend/assets/img/apps-02.png') }}" alt="" /></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- /.top-footer-close -->
	
@php
	$websitesetting = DB::table('websitesettings')->first();
@endphp	
	<!-- middle-footer-start -->	
	<section class="middle-footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<div class="editor-one">
						Dirección: 
						<br>
        @if(session()->get('lang')== 'spanish')
	    {!! $websitesetting->address_es !!}
		@else
		{!! $websitesetting->address_es !!}
		@endif

					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="editor-two">
					Celular: 
						<br>
        @if(session()->get('lang')== 'spanish')
	    {!! $websitesetting->phone_es !!}
		@else
		{!! $websitesetting->phone_es !!}
		@endif
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="editor-three">
						Email: 
						<br>
        {{ $websitesetting->email }}
					</div>
				</div>
			</div>
		</div>
	</section><!-- /.middle-footer-close -->
	
	<!-- bottom-footer-start -->	
	<section class="bottom-footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="copyright">						
						All rights reserved © 2021 PiuraPlusTV
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="btm-foot-menu">
						<ul>
							<li><a href="#">Nosotros</a></li>
							<li><a href="#">Contáctanos</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>