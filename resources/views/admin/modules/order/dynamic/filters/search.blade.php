<div class="search-wrapper">
    <div class="input-group">
        <div class="form-outline">                                            
            <input type="text" id="searchQuery" name="searchQuery" class="form-control" placeholder="Search" value="{{request()->searchQuery ?? ''}}">
        </div>
        <button type="button" name="SearchButton" id="SearchButton" class="btn btn-primary main-btn">
            <i class="fas fa-search"></i>
        </button>
    </div>
    <div class="search-inner-wrapper">       
       <a href="javascript:void(0);" id="reset-filter-btn">Clear Search Results</a>
    </div>
</div>
