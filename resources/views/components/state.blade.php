 <select name="{{$fieldname}}" id="input-state " class="{{$classes}}">
    <option value=""> --- Please Select --- </option>
    @foreach($states as $state)
     <option value="{{$state->_id}}" @if($selectedStateId == $state->_id){{'selected'}}@endif>{{$state->state_name}}</option>
    @endforeach
</select>
