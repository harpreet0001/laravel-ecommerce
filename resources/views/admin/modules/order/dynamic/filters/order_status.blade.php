<div class="form-group View-all-select">
    <label for="exampleFormControlSelect1">By Status:</label>
    <select class="form-control" id="orderStatusFilter" name="orderStatusFilter">
        <option value="">All Orders</option>
          @foreach(orderStatusArr() as $statusId => $statusText)
            <option value="{{$statusId}}" @if(isset(request()->orderStatus) && request()->orderStatus == $statusId){{'selected'}}@endif>
                {{$statusText}}
            </option>
          @endforeach
    </select>
</div>