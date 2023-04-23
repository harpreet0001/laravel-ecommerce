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
                                    <a href="<?php echo e(route('account.home')); ?>">
                                        <span class="links-text <?php if(isset($activelink) && $activelink == 'account'): ?><?php echo e('active'); ?><?php endif; ?>">My Account</span>
                                    </a>
                                </li>
                                <li class="menu-item accordion-menu-item accordion-menu-item-2">
                                    <a href="<?php echo e(route('account.addressbook.index')); ?>">
                                        <span class="links-text <?php if(isset($activelink) && $activelink == 'addressbook'): ?><?php echo e('active'); ?><?php endif; ?>">Address Book</span>
                                    </a>
                                </li>
                                <li class="menu-item accordion-menu-item accordion-menu-item-3">
                                    <a href="<?php echo e(route('wishlist.show')); ?>">
                                        <span class="links-text <?php if(isset($activelink) && $activelink == 'wishlist'): ?><?php echo e('active'); ?><?php endif; ?>">Wish Lists</span><?php echo wishlistProductCount(); ?>

                                    </a>
                                </li>
                                <li class="menu-item accordion-menu-item accordion-menu-item-4">
                                    <a href="<?php echo e(route('account.order-history')); ?>">
                                        <span class="links-text <?php if(isset($activelink) && $activelink == 'order-history'): ?><?php echo e('active'); ?><?php endif; ?>">Order History</span>
                                    </a>
                                </li>
                                <!-- <li class="menu-item accordion-menu-item accordion-menu-item-5">
                                    <a href="javascript:void(0);">
                                        <span class="links-text <?php if(isset($activelink) && $activelink == 'downloads'): ?><?php echo e('active'); ?><?php endif; ?>">Downloads</span>
                                    </a>
                                </li>
                                <li class="menu-item accordion-menu-item accordion-menu-item-6">
                                    <a href="javascript:void(0);">
                                        <span class="links-text <?php if(isset($activelink) && $activelink == 'recurring-payments'): ?><?php echo e('active'); ?><?php endif; ?>">Recurring Payments</span>
                                    </a>
                                </li>
                                <li class="menu-item accordion-menu-item accordion-menu-item-7">
                                    <a href="javascript:void(0);">
                                        <span class="links-text <?php if(isset($activelink) && $activelink == 'reward-points'): ?><?php echo e('active'); ?><?php endif; ?>">Reward Points</span>
                                    </a>
                                </li>
                                <li class="menu-item accordion-menu-item accordion-menu-item-8">
                                    <a href="javascript:void(0);">
                                        <span class="links-text <?php if(isset($activelink) && $activelink == 'returns'): ?><?php echo e('active'); ?><?php endif; ?>">Returns</span>
                                    </a>
                                </li>
                                <li class="menu-item accordion-menu-item accordion-menu-item-9">
                                    <a href="javascript:void(0);">
                                        <span class="links-text <?php if(isset($activelink) && $activelink == 'transactions'): ?><?php echo e('active'); ?><?php endif; ?>">Transactions</span>
                                    </a>
                                </li> -->
                                <li class="menu-item accordion-menu-item accordion-menu-item-10">
                                    <a href="<?php echo e(route('account.newsletter')); ?>">
                                        <span class="links-text <?php if(isset($activelink) && $activelink == 'newsletter'): ?><?php echo e('active'); ?><?php endif; ?>">Newsletter</span>
                                    </a>
                                </li>
                                <!-- <li class="menu-item accordion-menu-item accordion-menu-item-11 ">
                                    <a>
                                        <span class="links-text <?php if(isset($activelink) && $activelink == 'custom-menu'): ?><?php echo e('active'); ?><?php endif; ?>">Custom Menus</span>
                                        <span class="open-menu collapsed" data-toggle="collapse" data-target="#collapse-611a0cccd7345" role="heading"><i class="fa fa-plus"></i></span>
                                    </a>
                                    <div class="collapse " id="collapse-611a0cccd7345">
                                        <ul class="j-menu">
                                            <li class="menu-item accordion-menu-item-12">
                                                <a>
                                                    <span class="links-text <?php if(isset($activesublink) && $activesublink == ''): ?><?php echo e('active'); ?><?php endif; ?>"">All Menus Are</span>
                                                </a>
                                            </li>
                                            <li class="menu-item accordion-menu-item-13">
                                                <a>
                                                    <span class="links-text <?php if(isset($activesublink) && $activesublink == ''): ?><?php echo e('active'); ?><?php endif; ?>"">Fully Customizable</span>
                                                </a>
                                            </li>
                                            <li class="menu-item accordion-menu-item-14">
                                                <a>
                                                    <span class="links-text <?php if(isset($activesublink) && $activesublink == ''): ?><?php echo e('active'); ?><?php endif; ?>"">Add/Remove Links</span>
                                                </a>
                                            </li>
                                            <li class="menu-item accordion-menu-item-15">
                                                <a>
                                                    <span class="links-text <?php if(isset($activesublink) && $activesublink == ''): ?><?php echo e('active'); ?><?php endif; ?>"">As Needed</span>
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
</aside><?php /**PATH E:\Ecommerce\resources\views/front/includes/aside.blade.php ENDPATH**/ ?>