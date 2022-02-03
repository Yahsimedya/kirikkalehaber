@php
    use App\Models\Category;
use App\Models\WebsiteSetting;

    $websetting=WebsiteSetting::first();

@endphp
<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark">
		<div class="navbar-brand">
			<a href="#" class="d-inline-block">
				<img src="{{asset($websetting->logo)}}" style="width: 170px;height: 30px" alt="">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>


			</ul>

			<a href="{{route('cacheClean')}}" class="badge bg-success ml-md-3 mr-md-auto">Önbellek Temizle</a>

			<ul class="navbar-nav">




				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<img src="{{$photo[0]->profile_photo_path}}" class="rounded-circle mr-2" height="34" alt="">
						<span>{{Auth::user()->name}}</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="{{route('admin.logout')}}" class="dropdown-item"><i class="icon-switch2"></i> Güvenli Çıkış</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->
