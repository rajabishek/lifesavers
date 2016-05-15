@extends('layouts.master')

@section('css')
	<link href="{{ URL::asset('assets/css/welcome.css') }}" rel="stylesheet" />
@stop

@section('content')
<table class="body-wrap">
	<tr>
		<td></td>
		<td class="container" bgcolor="#FFFFFF">

			<!-- content -->
			<div class="content">
			<table>
				<tr>
					<td>
						<h2>Thanks for your donation</h2>
						<p>Hey <strong>{{ $name }}</strong>, we have successfully recorded your blood donation details. We will keep you posted in case of an emergency</p>
						<h2>Who are we ?</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sit tempora, animi aut consequatur vitae culpa iusto, magnam provident cumque voluptatibus quaerat corporis at est! Doloremque, voluptatibus culpa nihil deserunt.</p>
						<table>
							<tr>
								<td class="padding">
									<p><a href="{{ route('about') }}" class="btn-primary">About us</a></p>
								</td>
							</tr>
						</table>
						<p>Feel free to contact us for any blood donation details or help.</p>
						<p>Thanks, have a lovely day.</p>
						<p><a href="http://twitter.com/leemunroe">Follow @lifesavers on Twitter</a></p>
					</td>
				</tr>
			</table>
			</div>
			<!-- /content -->
			
		</td>
		<td></td>
	</tr>
</table>
<!-- /body -->

<!-- footer -->
<table class="footer-wrap">
	<tr>
		<td></td>
		<td class="container">
			
			<!-- content -->
			<div class="content">
				<table>
					<tr>
						<td align="center">
							<p>Don't like these annoying emails? <a href="#"><unsubscribe>Unsubscribe</unsubscribe></a>.
							</p>
						</td>
					</tr>
				</table>
			</div>
			<!-- /content -->
			
		</td>
		<td></td>
	</tr>
</table>
@stop