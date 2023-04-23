<select name="{{$fieldname}}" id="input-country" class="{{$classes}}" action="{{route('country.states')}}">
    <option value=""> --- Please Select --- </option>
    @foreach($countries as $country)
     <option value="{{$country['_id']}}" @if($selectedCountryId == $country['_id']){{'selected'}}@endif>{{$country['country_name']}}</option>
    @endforeach
</select>
