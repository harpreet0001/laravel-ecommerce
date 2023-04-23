<ul>
	@foreach($categories as $category)
      <li><a href="{{route('shop',['cId' => base64_encode($category->id)])}}" class="@if(strtolower($categoryTitle) == strtolower($category->title)){{'active'}}@endif">{{$category->title}}</a></li>
	@endforeach
</ul>
<!-- 
<div class="accordion-menu cate-side-nav">
	<h3 class="title module-title">Categoriess</h3>
	<ul class="j-menu">
		<li class="menu-item accordion-menu-item accordion-menu-item-1">
			<a href="javascript:void(0)">
				<span class="links-text">Melanotan 2</span>
			</a>
		</li>
		<li class="menu-item accordion-menu-item accordion-menu-item-2">
			<a href="javascript:void(0)">
				<span class="links-text">MT2 Starter Kits</span>
			</a>
		</li>
		<li class="menu-item accordion-menu-item accordion-menu-item-3">
			<a href="javascript:void(0)">
				<span class="links-text">Melanotan Nasal Spray</span>
			</a>
		</li>
		<li class="menu-item accordion-menu-item accordion-menu-item-4">
			<a href="javascript:void(0)">
				<span class="links-text">MT2 Reseller Packs</span>
			</a>
		</li>
		<li class="menu-item accordion-menu-item accordion-menu-item-5">
			<a href="javascript:void(0)">
				<span class="links-text">Tanning Injection Supplies</span>
			</a>
		</li>
	</ul>
</div> -->