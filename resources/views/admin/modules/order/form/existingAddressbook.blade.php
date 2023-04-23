@php($addressbooks = $order->orderuser->addressbooks)
@if(!is_null($addressbooks) && $addressbooks->count() > 0)
    <fieldset class="existingAddressList" style="display: ;">
        <legend>Use Existing Address</legend>
        <ul>
            @foreach($addressbooks as $addressbook)
             <li>
                <div class="addressDetails" style="background-image: url('../lib/flags/gb.gif')">
                    <a href="{{route('admin.order.getAddressbook',$addressbook->_id)}}" data-address="{{$existingAddress}}" class="useExistingAddress" onclick="OrderForm.useExistingAddress(this);return false;">Use This Address</a>
                    <strong>{{$addressbook->firstname}} {{$addressbook->lastname}}</strong>
                    <div>{{$addressbook->company}}</div>
                    <div>{{$addressbook->postcode}}</div>
                    <div>{{$addressbook->city}}</div>
                    <div>{{getStateName($addressbook->stateId)}}</div>
                    <div>{{getStateName($addressbook->stateId)}}</div>
                    <div>{{$addressbook->address1}}</div>
                </div>
            </li>
            @endforeach
        </ul>
    </fieldset>
  
@endif