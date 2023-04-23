<ul class="main-menu">
    <li>
		<a href="{{route('home')}}" class="@if(isset($pageslug) && $pageslug == 'home'){{'active'}}@endif">Home</a>
	</li>
	<li>
		<a href="{{route('shop','')}}" class="@if(isset($pageslug) && $pageslug == 'shop'){{'active'}}@endif">Melanotan 2</a>
	</li>
	<li>
		<a href="{{route('how-to-use-tanning-injections')}}" class="@if(isset($pageslug) && $pageslug == 'how-to-use-tanning-injections'){{'active'}}@endif">Using Tanning Injections</a>
	</li>
	<li>
		<a href="{{route('faq')}}" class="@if(isset($pageslug) && $pageslug == 'faq'){{'active'}}@endif">FAQ's</a>
	</li>
	<li>
		<a href="{{route('shipping-returns')}}" class="@if(isset($pageslug) && $pageslug == 'shipping-returns'){{'active'}}@endif">Shipping & Returns</a>
	</li>
	<li>
		<a href="{{route('contact_form')}}" class="@if(isset($pageslug) && $pageslug == 'contact-us'){{'active'}}@endif">Contact</a>
	</li> 
</ul>
<ul class="main-menu-2"> 
  <li>
	<a href="{{route('blogs')}}"><i class="far fa-comment-alt" class="@if(isset($pageslug) && $pageslug == 'blogs'){{'active'}}@endif"></i>BLOG</a>
  </li>
</ul>