<aside id="column-right" class="side-column">
<div class="grid-rows">
    <div class="grid-row grid-row-column-right-1">
        <div class="grid-cols">
            <div class="grid-col grid-col-column-right-1-1">
                <div class="grid-items">
                    <div class="grid-item grid-item-column-right-1-1-1">
                        <div class="accordion-menu accordion-menu-126">
                            <ul class="j-menu">
                                <li class="menu-item accordion-menu-item accordion-menu-item-1">
                                    <a href="{{route('account.home')}}">
                                        <span class="links-text @if(isset($activelink) && $activelink == 'account'){{'active'}}@endif">My Account</span>
                                    </a>
                                </li>
                                <li class="menu-item accordion-menu-item accordion-menu-item-2">
                                    <a href="{{route('account.addressbook.index')}}">
                                        <span class="links-text @if(isset($activelink) && $activelink == 'addressbook'){{'active'}}@endif">Address Book</span>
                                    </a>
                                </li>
                                <li class="menu-item accordion-menu-item accordion-menu-item-3">
                                    <a href="{{route('wishlist.show')}}">
                                        <span class="links-text @if(isset($activelink) && $activelink == 'wishlist'){{'active'}}@endif">Wish Lists</span>{!! wishlistProductCount() !!}
                                    </a>
                                </li>
                                <li class="menu-item accordion-menu-item accordion-menu-item-4">
                                    <a href="{{route('account.order-history')}}">
                                        <span class="links-text @if(isset($activelink) && $activelink == 'order-history'){{'active'}}@endif">Order History</span>
                                    </a>
                                </li>
                                <!-- <li class="menu-item accordion-menu-item accordion-menu-item-5">
                                    <a href="javascript:void(0);">
                                        <span class="links-text @if(isset($activelink) && $activelink == 'downloads'){{'active'}}@endif">Downloads</span>
                                    </a>
                                </li>
                                <li class="menu-item accordion-menu-item accordion-menu-item-6">
                                    <a href="javascript:void(0);">
                                        <span class="links-text @if(isset($activelink) && $activelink == 'recurring-payments'){{'active'}}@endif">Recurring Payments</span>
                                    </a>
                                </li>
                                <li class="menu-item accordion-menu-item accordion-menu-item-7">
                                    <a href="javascript:void(0);">
                                        <span class="links-text @if(isset($activelink) && $activelink == 'reward-points'){{'active'}}@endif">Reward Points</span>
                                    </a>
                                </li>
                                <li class="menu-item accordion-menu-item accordion-menu-item-8">
                                    <a href="javascript:void(0);">
                                        <span class="links-text @if(isset($activelink) && $activelink == 'returns'){{'active'}}@endif">Returns</span>
                                    </a>
                                </li>
                                <li class="menu-item accordion-menu-item accordion-menu-item-9">
                                    <a href="javascript:void(0);">
                                        <span class="links-text @if(isset($activelink) && $activelink == 'transactions'){{'active'}}@endif">Transactions</span>
                                    </a>
                                </li> -->
                                <li class="menu-item accordion-menu-item accordion-menu-item-10">
                                    <a href="{{route('account.newsletter')}}">
                                        <span class="links-text @if(isset($activelink) && $activelink == 'newsletter'){{'active'}}@endif">Newsletter</span>
                                    </a>
                                </li>
                                <!-- <li class="menu-item accordion-menu-item accordion-menu-item-11 ">
                                    <a>
                                        <span class="links-text @if(isset($activelink) && $activelink == 'custom-menu'){{'active'}}@endif">Custom Menus</span>
                                        <span class="open-menu collapsed" data-toggle="collapse" data-target="#collapse-611a0cccd7345" role="heading"><i class="fa fa-plus"></i></span>
                                    </a>
                                    <div class="collapse " id="collapse-611a0cccd7345">
                                        <ul class="j-menu">
                                            <li class="menu-item accordion-menu-item-12">
                                                <a>
                                                    <span class="links-text @if(isset($activesublink) && $activesublink == ''){{'active'}}@endif"">All Menus Are</span>
                                                </a>
                                            </li>
                                            <li class="menu-item accordion-menu-item-13">
                                                <a>
                                                    <span class="links-text @if(isset($activesublink) && $activesublink == ''){{'active'}}@endif"">Fully Customizable</span>
                                                </a>
                                            </li>
                                            <li class="menu-item accordion-menu-item-14">
                                                <a>
                                                    <span class="links-text @if(isset($activesublink) && $activesublink == ''){{'active'}}@endif"">Add/Remove Links</span>
                                                </a>
                                            </li>
                                            <li class="menu-item accordion-menu-item-15">
                                                <a>
                                                    <span class="links-text @if(isset($activesublink) && $activesublink == ''){{'active'}}@endif"">As Needed</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</aside>