@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper p-4">
    <div class="content-card">
        <div class="card">
            <div class="card-body">
                <div class="tab-content p-0">
                    @include('msg')
                    <div class="edit-order-sec">
                        <div class="edit-order_content">
                            <div class="row">
                                <div class="col-lg-9 col-md-8 col-sm-6 col-12">
                                    <div class="edit-order_card">
                                        <div class="orderFormLeftColumn">
                                            <div class="horizontalFormContainer orderMachineStateCustomerDetails">
                                                <div class="header">
                                                    Billing Address
                                                </div>
                                                <div class="Billing-Address-wrapper">
                                                    <div>
                                                        <div class="formRow">
                                                            <label>
                                                                <span class="Required FormFieldRequired" style="visibility: hidden">*</span>
                                                                <span class="FormFieldLabel">First Name:</span>
                                                            </label>
                                                            <div class="value">
                                                                <input type="hidden" class="FormFieldId" value="4"><input type="hidden" class="FormFieldFormId" value="2"><input type="hidden" class="FormFieldType" value="singleline"><input type="hidden" class="FormFieldPrivateId" value="FirstName">
                                                                <input type="text" class="Textbox Field200 FormField" id="FormField_4" name="FormField[2][4]" value="Amarjeet">
                                                            </div>
                                                        </div>
                                                        <div class="formRow">
                                                            <label>
                                                                <span class="Required FormFieldRequired" style="visibility: hidden">*</span>
                                                                <span class="FormFieldLabel">Last Name:</span>
                                                            </label>
                                                            <div class="value">
                                                                <input type="hidden" class="FormFieldId" value="5"><input type="hidden" class="FormFieldFormId" value="2"><input type="hidden" class="FormFieldType" value="singleline"><input type="hidden" class="FormFieldPrivateId" value="LastName">
                                                                <input type="text" class="Textbox Field200 FormField" id="FormField_5" name="FormField[2][5]" value="singh">
                                                            </div>
                                                        </div>
                                                        <div class="formRow">
                                                            <label>
                                                                <span class="Required FormFieldRequired" style="visibility: hidden">*</span>
                                                                <span class="FormFieldLabel">Company Name:</span>
                                                            </label>
                                                            <div class="value">
                                                                <input type="hidden" class="FormFieldId" value="6"><input type="hidden" class="FormFieldFormId" value="2"><input type="hidden" class="FormFieldType" value="singleline"><input type="hidden" class="FormFieldPrivateId" value="CompanyName">
                                                                <input type="text" class="Textbox Field200 FormField" id="FormField_6" name="FormField[2][6]" value="Deftsoft">
                                                            </div>
                                                        </div>
                                                        <div class="formRow">
                                                            <label>
                                                                <span class="Required FormFieldRequired" style="visibility: hidden">*</span>
                                                                <span class="FormFieldLabel">Phone Number:</span>
                                                            </label>
                                                            <div class="value">
                                                                <input type="hidden" class="FormFieldId" value="7"><input type="hidden" class="FormFieldFormId" value="2"><input type="hidden" class="FormFieldType" value="singleline"><input type="hidden" class="FormFieldPrivateId" value="Phone">
                                                                <input type="text" class="Textbox Field200 FormField" id="FormField_7" name="FormField[2][7]" value="9759348288">
                                                            </div>
                                                        </div>
                                                        <div class="formRow">
                                                            <label>
                                                                <span class="Required FormFieldRequired" style="visibility: hidden">*</span>
                                                                <span class="FormFieldLabel">Address Line 1:</span>
                                                            </label>
                                                            <div class="value">
                                                                <input type="hidden" class="FormFieldId" value="8"><input type="hidden" class="FormFieldFormId" value="2"><input type="hidden" class="FormFieldType" value="singleline"><input type="hidden" class="FormFieldPrivateId" value="AddressLine1">
                                                                <input type="text" class="Textbox Field200 FormField" id="FormField_8" name="FormField[2][8]" value="Mohali trick">
                                                            </div>
                                                        </div>
                                                        <div class="formRow">
                                                            <label>
                                                                <span class="Required FormFieldRequired" style="visibility: hidden">*</span>
                                                                <span class="FormFieldLabel">Address Line 2:</span>
                                                            </label>
                                                            <div class="value">
                                                                <input type="hidden" class="FormFieldId" value="9"><input type="hidden" class="FormFieldFormId" value="2"><input type="hidden" class="FormFieldType" value="singleline"><input type="hidden" class="FormFieldPrivateId" value="AddressLine2">
                                                                <input type="text" class="Textbox Field200 FormField" id="FormField_9" name="FormField[2][9]" value="">
                                                            </div>
                                                        </div>
                                                        <div class="formRow">
                                                            <label>
                                                                <span class="Required FormFieldRequired" style="visibility: hidden">*</span>
                                                                <span class="FormFieldLabel">Suburb/City:</span>
                                                            </label>
                                                            <div class="value">
                                                                <input type="hidden" class="FormFieldId" value="10"><input type="hidden" class="FormFieldFormId" value="2"><input type="hidden" class="FormFieldType" value="singleline"><input type="hidden" class="FormFieldPrivateId" value="City">
                                                                <input type="text" class="Textbox Field200 FormField" id="FormField_10" name="FormField[2][10]" value="Mohali">
                                                            </div>
                                                        </div>
                                                        <div class="formRow">
                                                            <label>
                                                                <span class="Required FormFieldRequired" style="visibility: visible">*</span>
                                                                <span class="FormFieldLabel">Country:</span>
                                                            </label>
                                                            <div class="value">
                                                                <input type="hidden" class="FormFieldChoosePrefix" value="Choose a Country"><input type="hidden" class="FormFieldId" value="11"><input type="hidden" class="FormFieldFormId" value="2"><input type="hidden" class="FormFieldType" value="singleselect"><input type="hidden" class="FormFieldPrivateId" value="Country">
                                                                <select class="Field200 FormField" style="" id="FormField_11" name="FormField[2][11]" size="1">
                                                                    <option value="">Choose a Country</option>
                                                                    <option value="Afghanistan">Afghanistan</option>
                                                                    <option value="Albania">Albania</option>
                                                                    <option value="Algeria">Algeria</option>
                                                                    <option value="American Samoa">American Samoa</option>
                                                                    <option value="Andorra">Andorra</option>
                                                                    <option value="Angola">Angola</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="formRow">
                                                            <label>
                                                                <span class="Required FormFieldRequired" style="visibility: hidden">*</span>
                                                                <span class="FormFieldLabel">State/Province:</span>
                                                            </label>
                                                            <div class="value">
                                                                <input type="hidden" class="FormFieldChoosePrefix" value="Choose a State"><input type="hidden" class="FormFieldId" value="12"><input type="hidden" class="FormFieldFormId" value="2"><input type="hidden" class="FormFieldType" value="selectortext"><input type="hidden" class="FormFieldPrivateId" value="State">
                                                                <noscript>
                                                                    <input type="text" name="FormField[2][12]" value="Suffolk" class="Field200" style="" />
                                                                </noscript>
                                                                <select name="FormField[2][12]" id="FormField_12" class="FormField JSHidden Field200" style="">
                                                                    <option value="">Choose a State</option>
                                                                    <option value="Aberdeenshire">Aberdeenshire</option>
                                                                    <option value="Anglesey">Anglesey</option>
                                                                    <option value="Angus">Angus</option>
                                                                    <option value="Antrim">Antrim</option>
                                                                    <option value="Argyll">Argyll</option>
                                                                    <option value="Armagh">Armagh</option>
                                                                    <option value="Ayrshire">Ayrshire</option>
                                                                    <option value="Banffshire">Banffshire</option>
                                                                    <option value="Bedfordshire">Bedfordshire</option>
                                                                    <option value="Berkshire">Berkshire</option>
                                                                    <option value="Berwickshire">Berwickshire</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="formRow">
                                                            <label>
                                                                <span class="Required FormFieldRequired" style="visibility: visible">*</span>
                                                                <span class="FormFieldLabel">Zip/Postcode:</span>
                                                            </label>
                                                            <div class="value">
                                                                <input type="hidden" class="FormFieldId" value="13"><input type="hidden" class="FormFieldFormId" value="2"><input type="hidden" class="FormFieldType" value="singleline"><input type="hidden" class="FormFieldPrivateId" value="Zip">
                                                                <input type="text" class="Textbox Field45 FormField" id="FormField_13" name="FormField[2][13]" value="CO10 8BZ">
                                                            </div>
                                                        </div>
                                                        <div class="formRow   " style="">
                                                            <label class="label">
                                                                <span class="Required" style="visibility:hidden;">*</span>
                                                            </label>
                                                            <div class="value input-label">
                                                                <label>
                                                                    <input type="checkbox" name="saveBillingAddress" value="1" checked="checked" class="input-checkbox">
                                                                    Save to customer's address book </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <fieldset class="existingAddressList" style="display: ;">
                                                            <legend>Use Existing Address</legend>
                                                            <ul>
                                                                <li>
                                                                    <div class="addressDetails" style="background-image: url('../lib/flags/gb.gif')"><a href="#" class="useExistingAddress">Use This Address</a><strong>Amarjeet singh</strong>
                                                                        <div>Deft test</div>
                                                                        <div>chndigrh</div>
                                                                        <div>chndigrh 1</div>
                                                                        <div>chd, Suffolk, CO10 8BZ</div>
                                                                        <div>United Kingdom</div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="addressDetails" style="background-image: url('../lib/flags/in.gif')"><a href="#" class="useExistingAddress">Use This Address</a><strong>Amarjeet Singh</strong>
                                                                        <div>Deftsoft</div>
                                                                        <div>S.A.S Nagar mohali</div>
                                                                        <div>S.A.S Nagar Mohali</div>
                                                                        <div>mohali, mohali, 140675</div>
                                                                        <div>India</div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="addressDetails" style="background-image: url('../lib/flags/gb.gif')"><a href="#" class="useExistingAddress">Use This Address</a><strong>Amarjeet singh</strong>
                                                                        <div>Deftsoft</div>
                                                                        <div>Mohali trick</div>
                                                                        <div></div>
                                                                        <div>Mohali, Suffolk, CO10 8BZ</div>
                                                                        <div>United Kingdom</div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="addressDetails" style="background-image: url('../lib/flags/gb.gif')"><a href="#" class="useExistingAddress">Use This Address</a><strong>Amarjeet singh</strong>
                                                                        <div>Deftsoft</div>
                                                                        <div>Mohalissssss</div>
                                                                        <div></div>
                                                                        <div>Mohali, Suffolk, CO10 8BZ</div>
                                                                        <div>United Kingdom</div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="orderFormSummaryBillingDetailsContainer">
                                                <div class="verticalFormContainer orderFormSummaryBillingDetails">
                                                    <div class="header">
                                                        Customer Billing Details
                                                    </div>
                                                    <div class="formRow formRowUnlabeled  " style="">
                                                        <div class="value">
                                                            <div class="detailsHeading">Billing To: <a href="#" class="orderFormChangeBillingDetailsLink">Change</a></div>
                                                            <div class="detailsAddress">
                                                                <div>Amarjeet singh</div>
                                                                <div>Deftsoft</div>
                                                                <div>Mohali trick</div>
                                                                <div></div>
                                                                <div>
                                                                    Mohali, Suffolk, CO10 8BZ
                                                                </div>
                                                                <div>
                                                                    United Kingdom
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="orderFormSummaryShippingDetailsContainer">
                                                <div class="verticalFormContainer orderFormSummaryShippingDetails">
                                                    <div class="header">
                                                        Shipping Details: Items 1-1 of 1
                                                    </div>
                                                    <div class="formRow formRowUnlabeled  " style="">
                                                        <div class="value">
                                                            <div class="detailsHeading">Shipping To: <a href="#" class="orderFormChangeShippingDetailsLink">Change</a></div>
                                                            <div class="detailsAddress">
                                                                <div>Amarjeet singh</div>
                                                                <div>Deft test</div>
                                                                <div>chndigrh</div>
                                                                <div>chndigrh 1</div>
                                                                <div>
                                                                    chd, Suffolk, CO10 8BZ
                                                                </div>
                                                                <div>
                                                                    United Kingdom
                                                                </div>
                                                            </div>
                                                            <div class="detailsHeading">Shipping Method: <a href="#" class="orderFormChangeShippingDetailsLink">Change</a></div>
                                                            <div class="detailsShippingMethod">
                                                                Royal Mail 1st Class Signed For: £0.00
                                                            </div>
                                                            <div class="quoteItemsGrid quoteItemsGridInteractive">
                                                                <table class="table table-bordered cstm-data-table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th colspan="2">
                                                                                Products shipped to chndigrh, chndigrh 1, chd, CO10 8BZ, United Kingdom </th>
                                                                            <th class="quoteItemQuantity">Qty</th>
                                                                            <th class="quoteItemPrice">Item Price</th>
                                                                            <th class="quoteItemTotal">Item Total</th>
                                                                            <th class="quoteItemAction">Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr class="itemRow" id="itemId_178126">
                                                                            <td class="quoteItemImage">
                                                                                <img src="https://megatan.ws/product_images/o/969/10mg_melanotan_2.fw__04614_zoom__24556_thumb.png" alt="">
                                                                            </td>
                                                                            <td>
                                                                                <div class="quoteItemName">Melanotan 2 10mg (1 vial) + 1 FREE</div>
                                                                                <div class="quoteItemConfiguration">
                                                                                </div>
                                                                            </td>
                                                                            <td class="quoteItemQuantity">
                                                                                <input type="text" name="quantity" value="1" class="Field50" id="qty">
                                                                            </td>
                                                                            <td class="quoteItemPrice">
                                                                                £ 17.95
                                                                            </td>
                                                                            <td class="quoteItemTotal"><span>£17.95</span></td>
                                                                            <td class="quoteItemAction">
                                                                                <a href="#" class="customizeItemLink">Customize</a>
                                                                                <a href="#" class="copyItemLink">Copy</a>
                                                                                <a href="#" class="deleteItemLink">Delete</a>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="showByValue_shipItemsTo showByValue_shipItemsTo_single">
                                                <div class="horizontalFormContainer ">
                                                    <div class="header">
                                                        Shipping Address
                                                    </div>
                                                    <div class="Billing-Address-wrapper Shipping-Address">
                                                        <div>
                                                            <div class="formRow">
                                                                <label>
                                                                    <span class="Required FormFieldRequired" style="visibility: hidden">*</span>
                                                                    <span class="FormFieldLabel">First Name:</span>
                                                                </label>
                                                                <div class="value">
                                                                    <input type="hidden" class="FormFieldId" value="14"><input type="hidden" class="FormFieldFormId" value="3"><input type="hidden" class="FormFieldType" value="singleline"><input type="hidden" class="FormFieldPrivateId" value="FirstName">
                                                                    <input type="text" class="Textbox Field200 FormField" id="FormField_14" name="FormField[3][14]" value="Amarjeet">
                                                                </div>
                                                            </div>
                                                            <div class="formRow">
                                                                <label>
                                                                    <span class="Required FormFieldRequired" style="visibility: hidden">*</span>
                                                                    <span class="FormFieldLabel">Last Name:</span>
                                                                </label>
                                                                <div class="value">
                                                                    <input type="hidden" class="FormFieldId" value="15"><input type="hidden" class="FormFieldFormId" value="3"><input type="hidden" class="FormFieldType" value="singleline"><input type="hidden" class="FormFieldPrivateId" value="LastName">
                                                                    <input type="text" class="Textbox Field200 FormField" id="FormField_15" name="FormField[3][15]" value="singh">
                                                                </div>
                                                            </div>
                                                            <div class="formRow">
                                                                <label>
                                                                    <span class="Required FormFieldRequired" style="visibility: hidden">*</span>
                                                                    <span class="FormFieldLabel">Company Name:</span>
                                                                </label>
                                                                <div class="value">
                                                                    <input type="hidden" class="FormFieldId" value="16"><input type="hidden" class="FormFieldFormId" value="3"><input type="hidden" class="FormFieldType" value="singleline"><input type="hidden" class="FormFieldPrivateId" value="CompanyName">
                                                                    <input type="text" class="Textbox Field200 FormField" id="FormField_16" name="FormField[3][16]" value="Deft test">
                                                                </div>
                                                            </div>
                                                            <div class="formRow">
                                                                <label>
                                                                    <span class="Required FormFieldRequired" style="visibility: hidden">*</span>
                                                                    <span class="FormFieldLabel">Phone Number:</span>
                                                                </label>
                                                                <div class="value">
                                                                    <input type="hidden" class="FormFieldId" value="17"><input type="hidden" class="FormFieldFormId" value="3"><input type="hidden" class="FormFieldType" value="singleline"><input type="hidden" class="FormFieldPrivateId" value="Phone">
                                                                    <input type="text" class="Textbox Field200 FormField" id="FormField_17" name="FormField[3][17]" value="9759348288">
                                                                </div>
                                                            </div>
                                                            <div class="formRow">
                                                                <label>
                                                                    <span class="Required FormFieldRequired" style="visibility: hidden">*</span>
                                                                    <span class="FormFieldLabel">Address Line 1:</span>
                                                                </label>
                                                                <div class="value">
                                                                    <input type="hidden" class="FormFieldId" value="18"><input type="hidden" class="FormFieldFormId" value="3"><input type="hidden" class="FormFieldType" value="singleline"><input type="hidden" class="FormFieldPrivateId" value="AddressLine1">
                                                                    <input type="text" class="Textbox Field200 FormField" id="FormField_18" name="FormField[3][18]" value="chndigrh">
                                                                </div>
                                                            </div>
                                                            <div class="formRow">
                                                                <label>
                                                                    <span class="Required FormFieldRequired" style="visibility: hidden">*</span>
                                                                    <span class="FormFieldLabel">Address Line 2:</span>
                                                                </label>
                                                                <div class="value">
                                                                    <input type="hidden" class="FormFieldId" value="19"><input type="hidden" class="FormFieldFormId" value="3"><input type="hidden" class="FormFieldType" value="singleline"><input type="hidden" class="FormFieldPrivateId" value="AddressLine2">
                                                                    <input type="text" class="Textbox Field200 FormField" id="FormField_19" name="FormField[3][19]" value="chndigrh 1">
                                                                </div>
                                                            </div>
                                                            <div class="formRow">
                                                                <label>
                                                                    <span class="Required FormFieldRequired" style="visibility: hidden">*</span>
                                                                    <span class="FormFieldLabel">Suburb/City:</span>
                                                                </label>
                                                                <div class="value">
                                                                    <input type="hidden" class="FormFieldId" value="20"><input type="hidden" class="FormFieldFormId" value="3"><input type="hidden" class="FormFieldType" value="singleline"><input type="hidden" class="FormFieldPrivateId" value="City">
                                                                    <input type="text" class="Textbox Field200 FormField" id="FormField_20" name="FormField[3][20]" value="chd">
                                                                </div>
                                                            </div>
                                                            <div class="formRow">
                                                                <label>
                                                                    <span class="Required FormFieldRequired" style="visibility: visible">*</span>
                                                                    <span class="FormFieldLabel">Country:</span>
                                                                </label>
                                                                <div class="value">
                                                                    <input type="hidden" class="FormFieldChoosePrefix" value="Choose a Country"><input type="hidden" class="FormFieldId" value="21"><input type="hidden" class="FormFieldFormId" value="3"><input type="hidden" class="FormFieldType" value="singleselect"><input type="hidden" class="FormFieldPrivateId" value="Country">
                                                                    <select class="Field200 FormField" style="" id="FormField_21" name="FormField[3][21]" size="1">
                                                                        <option value="">Choose a Country</option>
                                                                        <option value="Afghanistan">Afghanistan</option>
                                                                        <option value="Albania">Albania</option>
                                                                        <option value="Algeria">Algeria</option>
                                                                        <option value="American Samoa">American Samoa</option>
                                                                        <option value="Andorra">Andorra</option>
                                                                        <option value="Angola">Angola</option>
                                                                        <option value="Anguilla">Anguilla</option>
                                                                        <option value="Antarctica">Antarctica</option>
                                                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                                        <option value="Argentina">Argentina</option>
                                                                        <option value="Armenia">Armenia</option>
                                                                        <option value="Aruba">Aruba</option>
                                                                        <option value="Australia">Australia</option>
                                                                        <option value="Austria">Austria</option>
                                                                        <option value="Azerbaijan">Azerbaijan</option>
                                                                        <option value="Bahamas">Bahamas</option>
                                                                        <option value="Bahrain">Bahrain</option>
                                                                        <option value="Bangladesh">Bangladesh</option>
                                                                        <option value="Barbados">Barbados</option>
                                                                        <option value="Belarus">Belarus</option>
                                                                        <option value="Belgium">Belgium</option>
                                                                        <option value="Belize">Belize</option>
                                                                        <option value="Benin">Benin</option>
                                                                        <option value="Bermuda">Bermuda</option>
                                                                        <option value="Bhutan">Bhutan</option>
                                                                        <option value="Bolivia">Bolivia</option>
                                                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                                        <option value="Botswana">Botswana</option>
                                                                        <option value="Bouvet Island">Bouvet Island</option>
                                                                        <option value="Brazil">Brazil</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="formRow">
                                                                <label>
                                                                    <span class="Required FormFieldRequired" style="visibility: hidden">*</span>
                                                                    <span class="FormFieldLabel">State/Province:</span>
                                                                </label>
                                                                <div class="value">
                                                                    <input type="hidden" class="FormFieldChoosePrefix" value="Choose a State"><input type="hidden" class="FormFieldId" value="22"><input type="hidden" class="FormFieldFormId" value="3"><input type="hidden" class="FormFieldType" value="selectortext"><input type="hidden" class="FormFieldPrivateId" value="State">
                                                                    <noscript>
                                                                        <input type="text" name="FormField[3][22]" value="Suffolk" class="Field200" style="" />
                                                                    </noscript>
                                                                    <select name="FormField[3][22]" id="FormField_22" class="FormField JSHidden Field200" style="">
                                                                        <option value="">Choose a State</option>
                                                                        <option value="Aberdeenshire">Aberdeenshire</option>
                                                                        <option value="Anglesey">Anglesey</option>
                                                                        <option value="Angus">Angus</option>
                                                                        <option value="Antrim">Antrim</option>
                                                                        <option value="Argyll">Argyll</option>
                                                                        <option value="Armagh">Armagh</option>
                                                                        <option value="Ayrshire">Ayrshire</option>
                                                                        <option value="Banffshire">Banffshire</option>
                                                                        <option value="Bedfordshire">Bedfordshire</option>
                                                                        <option value="Berkshire">Berkshire</option>
                                                                        <option value="Berwickshire">Berwickshire</option>
                                                                        <option value="Brecknockshire">Brecknockshire</option>
                                                                        <option value="Buckinghamshire">Buckinghamshire</option>
                                                                        <option value="Bute">Bute</option>
                                                                        <option value="Caernarfonshire">Caernarfonshire</option>
                                                                        <option value="Caithness">Caithness</option>
                                                                        <option value="Cambridgeshire">Cambridgeshire</option>
                                                                        <option value="Yorkshire, West Riding">Yorkshire, West Riding</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="formRow">
                                                                <label>
                                                                    <span class="Required FormFieldRequired" style="visibility: visible">*</span>
                                                                    <span class="FormFieldLabel">Zip/Postcode:</span>
                                                                </label>
                                                                <div class="value">
                                                                    <input type="hidden" class="FormFieldId" value="23"><input type="hidden" class="FormFieldFormId" value="3"><input type="hidden" class="FormFieldType" value="singleline"><input type="hidden" class="FormFieldPrivateId" value="Zip">
                                                                    <input type="text" class="Textbox Field45 FormField" id="FormField_23" name="FormField[3][23]" value="CO10 8BZ">
                                                                </div>
                                                            </div>
                                                            <div class="formRow">
                                                                <label class="label">
                                                                    <span class="Required" style="visibility:hidden;">*</span>
                                                                </label>
                                                                <div class="value input-label">
                                                                    <label>
                                                                        <input type="checkbox" name="saveShippingAddress" value="1" checked="checked" class="input-checkbox">
                                                                        Save to customer's address book </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <fieldset class="existingAddressList" style="display: block;">
                                                                <legend>Use Existing Address</legend>
                                                                <ul>
                                                                    <li>
                                                                        <div class="addressDetails" style="background-image: url('../lib/flags/gb.gif')"><a href="#" class="useExistingAddress">Use This Address</a><strong>Amarjeet Singh</strong>
                                                                            <div>Deftsoft</div>
                                                                            <div>Mohli testing 1</div>
                                                                            <div></div>
                                                                            <div>Mohali, Suffolk, CO10 8BZ</div>
                                                                            <div>United Kingdom</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="addressDetails" style="background-image: url('../lib/flags/gb.gif')"><a href="#" class="useExistingAddress">Use This Address</a><strong>Amarjeet singh</strong>
                                                                            <div>Deft test</div>
                                                                            <div>chndigrh</div>
                                                                            <div>chndigrh 1</div>
                                                                            <div>chd, Suffolk, CO10 8BZ</div>
                                                                            <div>United Kingdom</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="addressDetails" style="background-image: url('../lib/flags/in.gif')"><a href="#" class="useExistingAddress">Use This Address</a><strong>Amarjeet Singh</strong>
                                                                            <div>Deftsoft</div>
                                                                            <div>S.A.S Nagar mohali</div>
                                                                            <div>S.A.S Nagar Mohali</div>
                                                                            <div>mohali, mohali, 140675</div>
                                                                            <div>India</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="addressDetails" style="background-image: url('../lib/flags/gb.gif')"><a href="#" class="useExistingAddress">Use This Address</a><strong>Amarjeet singh</strong>
                                                                            <div>Deftsoft</div>
                                                                            <div>Mohali trick</div>
                                                                            <div></div>
                                                                            <div>Mohali, Suffolk, CO10 8BZ</div>
                                                                            <div>United Kingdom</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="addressDetails" style="background-image: url('../lib/flags/gb.gif')"><a href="#" class="useExistingAddress">Use This Address</a><strong>Amarjeet singh</strong>
                                                                            <div>Deftsoft</div>
                                                                            <div>Mohalissssss</div>
                                                                            <div></div>
                                                                            <div>Mohali, Suffolk, CO10 8BZ</div>
                                                                            <div>United Kingdom</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="addressDetails" style="background-image: url('../lib/flags/gb.gif')"><a href="#" class="useExistingAddress">Use This Address</a><strong>Amarjeet Singh</strong>
                                                                            <div>Deftsoft</div>
                                                                            <div>Mohli</div>
                                                                            <div></div>
                                                                            <div>Mohali, Suffolk, CO10 8BZ</div>
                                                                            <div>United Kingdom</div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="addressDetails" style="background-image: url('../lib/flags/in.gif')"><a href="#" class="useExistingAddress">Use This Address</a><strong>Amarjeet Singh</strong>
                                                                            <div></div>
                                                                            <div>mohali</div>
                                                                            <div>mohali</div>
                                                                            <div>Mohali, Punjab, 140055</div>
                                                                            <div>India</div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- search sec -->
                                            <div class="orderMachineStateItems" style="display: block;">
                                                <div class="verticalFormContainer ">
                                                    <div class="header">
                                                        Search Items
                                                    </div>
                                                    <div class="formRow formRowUnlabeled  formRowLast" style="">
                                                        <div class="value">
                                                            <div>
                                                                
                                                                <div class="quoteItemSearch">
                                                                    <input type="text" autocomplete="off" class="ac_input" placeholder="Search">
                                                                    <div class="quoteItemSearchResults">
                                                                        <ul style="max-height: 300px; overflow: auto;">
                                                                            <li class="ac_even">
                                                                                <div class="recordContent undefined"><input type="hidden" class="searchResultProductId" value="15">
                                                                                    <div class="viewItemLink"><a href="https://megatan.ws/products/10-x-BD-29G-Ultrafine-Syringes.html" target="_blank">View Product</a></div><strong>10 x BD 29G Ultrafine Syringes</strong>
                                                                                    <div class="productDetails">£1.66</div>
                                                                                </div>
                                                                            </li>
                                                                            <li class="ac_odd">
                                                                                <div class="recordContent undefined"><input type="hidden" class="searchResultProductId" value="1">
                                                                                    <div class="viewItemLink"><a href="https://megatan.ws/products/Melanotan-2-10mg-%281-vial%29-%252b-1-FREE.html" target="_blank">View Product</a></div><strong>Melanotan 2 10mg (1 vial) + 1 FREE</strong>
                                                                                    <div class="productDetails">£15.26</div>
                                                                                </div>
                                                                            </li>
                                                                            <li class="ac_even">
                                                                                <div class="recordContent undefined"><input type="hidden" class="searchResultProductId" value="29">
                                                                                    <div class="viewItemLink"><a href="https://megatan.ws/products/Melanotan-2-10mg-Oral-Drops-10ml-%252b-1-FREE.html" target="_blank">View Product</a></div><strong>Melanotan 2 10mg Oral Drops 10ml + 1 FREE</strong>
                                                                                    <div class="productDetails">£16.96</div>
                                                                                </div>
                                                                            </li>
                                                                            <li class="ac_odd">
                                                                                <div class="recordContent undefined"><input type="hidden" class="searchResultProductId" value="5">
                                                                                    <div class="viewItemLink"><a href="https://megatan.ws/products/Melanotan-2-10mg-Starter-Kit-%252b-1-FREE.html" target="_blank">View Product</a></div><strong>Melanotan 2 10mg Starter Kit + 1 FREE</strong>
                                                                                    <div class="productDetails">£16.76</div>
                                                                                </div>
                                                                            </li>
                                                                            <li class="ac_even">
                                                                                <div class="recordContent undefined"><input type="hidden" class="searchResultProductId" value="10">
                                                                                    <div class="viewItemLink"><a href="https://megatan.ws/products/Melanotan-2-Nasal-Spray-20mg-%252b-1-FREE.html" target="_blank">View Product</a></div><strong>Melanotan 2 Nasal Spray 20mg + 1 FREE</strong>
                                                                                    <div class="productDetails">£31.41</div>
                                                                                </div>
                                                                            </li>
                                                                            <li class="ac_odd">
                                                                                <div class="recordContent undefined"><input type="hidden" class="searchResultProductId" value="22">
                                                                                    <div class="viewItemLink"><a href="https://megatan.ws/products/Safe-Snap-Amp-Snapper.html" target="_blank">View Product</a></div><strong>Safe Snap Amp Snapper</strong>
                                                                                    <div class="productDetails">£1.75</div>
                                                                                </div>
                                                                            </li>
                                                                            <li class="ac_even">
                                                                                <div class="recordContent recordContentManual"><input type="hidden" class="searchResultProductId" value="virtual"><strong>Add Manual Product</strong>
                                                                                    <div class="productDetails">Select this option if you want to add a product to this order which doesn't exist in your store</div>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <a href="#" class="quoteItemSearchIcon mini-btn"><i class="fas fa-search"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- search sec end-->
                                            <div class="verticalFormContainer ">
                                                <div class="header">
                                                    Order Comments (Visible to Customers)
                                                </div>
                                                <div class="formRow formRowUnlabeled  formRowLast" style="">
                                                    <div class="value">
                                                        <textarea name="customerMessage" class="Field100pct" rows="6">testing order</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                    <div class="edit-order_card order-summary-wrapper">
                                        <div class="greenFormContainer">
                                            <div class="header">
                                                Finalize Order
                                            </div>
                                            <div class="greenForm-inner">
                                                <div class="value">
                                                    <label class="row">
                                                        <input type="checkbox" name="emailInvoiceToCustomer" value="1"> Email Invoice to Customer?
                                                    </label>
                                                    <div class="billingEmailAddressContainer">(<span class="billingEmailAddress">qa5.deftsoft@gmail.com</span>)</div>
                                                    <button class="orderMachineSaveButton mini-btn" accesskey="s"><span class="accesskey">S</span>ave »</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="verticalFormContainer orderSummaryContainer">
                                            <div class="header">
                                                Order Summary
                                            </div>
                                            <div class="formRow formRowUnlabeled  " style="">
                                                <div class="value">
                                                    <div class="orderFormSummaryOrderSummaryContainer">
                                                        <table cellspacing="0" class="orderFormSummaryTable">
                                                            <tbody>
                                                                <tr class="orderFormSummaryTable-subtotal ">
                                                                    <th>
                                                                        Subtotal
                                                                    </th>
                                                                    <td valign="top">£17.95</td>
                                                                </tr>
                                                                <tr class="orderFormSummaryTable-discount ">
                                                                    <th>
                                                                        Discount
                                                                    </th>
                                                                    <td valign="top">-£12.00</td>
                                                                </tr>
                                                                <tr class="orderFormSummaryTable-shipping ">
                                                                    <th>
                                                                        Shipping
                                                                    </th>
                                                                    <td valign="top">£0.00</td>
                                                                </tr>
                                                                <tr class="orderFormSummaryTable-total ">
                                                                    <th>
                                                                        Grand Total
                                                                    </th>
                                                                    <td valign="top">£5.95</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="verticalFormContainer applyDiscountContainer">
                                            <div class="header">
                                                Apply Discount
                                            </div>
                                            <div class="formRow formRowUnlabeled  " style="">
                                                <div class="value">
                                                    £ <input name="discountAmount" type="text" value="0.00" class="Field100">
                                                    <input type="button" class="mini-btn" value="Apply">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="verticalFormContainer couponGiftCertificateContainer">
                                            <div class="header">
                                                Apply Coupon or Gift Certificate
                                            </div>
                                            <div class="formRow formRowUnlabeled  " style="">
                                                <div class="value">
                                                    <input name="couponGiftCertificate" type="text" value="" class="Field120">
                                                    <input type="button" class="mini-btn" value="Apply">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="verticalFormContainer ">
                                            <div class="header">
                                                Payment Details
                                            </div>
                                            <div class="formRow formRowUnlabeled  " style="">
                                                <div class="value">
                                                    A payment for this order has previously been charged using <strong>Credit and Debit Cards</strong>. </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection