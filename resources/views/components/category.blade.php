<ul>
	@foreach($categories as $category)
      <li>
      	<a href="{{ route($routename,$category->slug) }}"
      		class="@if(isset($selectedCategory) && $selectedCategory->_id == $category->_id){{'active'}}@endif">
      		{{$category->title}}
      	</a>
      </li>
	@endforeach
</ul>
