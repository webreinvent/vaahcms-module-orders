<template>
    <div class="col-sm-12 col-md-8 mg-b-10">

        <!--card-->
        <div class="card">

            <!--header-->
            <div class="card-header">

                <div class="d-sm-flex align-items-center justify-content-between">
                    <div>
                        <h5 >Create Orders</h5>
                    </div>
                    <div class=" d-md-block">

                        <div class="mg-l-auto btn-group btn-group-xs">


                            <button @click="showAddCustomerModal()"
                                    class="btn btn-xs btn-light btn-uppercase">
                                Add Customer
                            </button>

                        </div>

                        <router-link class="btn btn-card "
                                     :to="{ path: '/orders'}">
                            <i class="fas fa-times"></i>
                        </router-link>

                    </div>
                </div>

            </div>
            <!--/header-->

            <!--body-->
            <div class="card-body" v-if="app_assets">

                <!--addresses-->
                <div class="addresses-block">
                    <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Addresses</label>


                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#customer"
                               role="tab" aria-controls="home" aria-selected="true">Customer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#billing"
                               role="tab" aria-controls="profile" aria-selected="false">Billing </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#shipping"
                               role="tab" aria-controls="contact" aria-selected="false">Shipping</a>
                        </li>
                    </ul>
                    <div class="tab-content bd bd-gray-300 bd-t-0 pd-20" id="myTabContent">
                        <div class="tab-pane fade show active" id="customer" role="tabpanel" >
                            <!--form-customer-->
                            <div class="form-customer">
                                <div class="form-row">
                                    <div class="form-group col-md-4" >
                                        <label>Customer</label>
                                        <select
                                                @change="updateEmailPhone($event, 'customer')"
                                                v-model="order.addresses.customer.user_id"
                                                class="custom-select custom-select-sm">
                                            <option value="">Select Customer/User</option>
                                            <option v-for="user in app_assets.users"
                                            :value="user.id">{{user.name}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Email</label>
                                        <input type="text"
                                               v-model="order.addresses.customer.email"
                                               dusk="order.addresses.customer.email"
                                               class="form-control form-control-sm" />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Phone</label>
                                        <input type="text"
                                               v-model="order.addresses.customer.phone"
                                               dusk="order.addresses.customer.phone"
                                               class="form-control form-control-sm" />
                                    </div>


                                </div>
                                <div class="form-group">
                                    <label >Business Name</label>
                                    <input type="text"
                                           v-model="order.addresses.customer.business_name"
                                           dusk="order.addresses.customer.business_name"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label >Address</label>
                                    <input type="text"
                                           v-model="order.addresses.customer.address_one"
                                           dusk="order.addresses.customer.address_one"
                                           class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label >Address 2</label>
                                    <input type="text"
                                           v-model="order.addresses.customer.address_two"
                                           dusk="order.addresses.customer.address_two"
                                           class="form-control">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>City</label>
                                        <input type="text"
                                               v-model="order.addresses.customer.city"
                                               dusk="order.addresses.customer.city"
                                               class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Country</label>
                                        <select v-model="order.addresses.customer.country_code" class="custom-select">
                                            <option value="">Select Country</option>
                                            <option v-for="country in app_assets.countries"
                                            :value="country.code"
                                            >{{country.name}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Postal Code</label>
                                        <input type="text"
                                               v-model="order.addresses.customer.postal_code"
                                               dusk="order.addresses.customer.postal_code"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input"
                                               v-model="order.addresses.customer_as_billing"
                                               @click="updateBillingAddress($event)"
                                               dusk="order.addresses.customer_as_billing"
                                               id="billingAddress">
                                        <label class="custom-control-label" for="billingAddress">Use this for billing address</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input"
                                               v-model="order.addresses.customer_as_shipping"
                                               @click="updateShippingAddress($event)"
                                               dusk="order.addresses.customer_as_shipping"
                                               id="shippingAddress">
                                        <label class="custom-control-label" for="shippingAddress">Use this for shipping address</label>
                                    </div>
                                </div>

                            </div>
                            <!--/form-customer-->
                        </div>
                        <div class="tab-pane fade" id="billing" role="tabpanel" >
                            <!--form-billing-->
                            <div class="form-customer">
                                <div class="form-row">
                                    <div class="form-group col-md-4" >
                                        <label>Customer</label>
                                        <select
                                                @change="updateEmailPhone($event, 'billing')"
                                                v-model="order.addresses.billing.user_id"
                                                class="custom-select custom-select-sm">
                                            <option value="">Select Customer/User</option>
                                            <option v-for="user in app_assets.users"
                                                    :value="user.id">{{user.name}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Email</label>
                                        <input type="text"
                                               v-model="order.addresses.billing.email"
                                               dusk="order.addresses.billing.email"
                                               class="form-control form-control-sm" />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Phone</label>
                                        <input type="text"
                                               v-model="order.addresses.billing.phone"
                                               dusk="order.addresses.billing.phone"
                                               class="form-control form-control-sm" />
                                    </div>


                                </div>
                                <div class="form-group">
                                    <label >Business Name</label>
                                    <input type="text"
                                           v-model="order.addresses.billing.business_name"
                                           dusk="order.addresses.billing.business_name"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label >Address</label>
                                    <input type="text"
                                           v-model="order.addresses.billing.address_one"
                                           dusk="order.addresses.billing.address_one"
                                           class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label >Address 2</label>
                                    <input type="text"
                                           v-model="order.addresses.billing.address_two"
                                           dusk="order.addresses.billing.address_two"
                                           class="form-control">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>City</label>
                                        <input type="text"
                                               v-model="order.addresses.billing.city"
                                               dusk="order.addresses.billing.city"
                                               class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Country</label>
                                        <select v-model="order.addresses.billing.country_code" class="custom-select">
                                            <option value="">Select Country</option>
                                            <option v-for="country in app_assets.countries"
                                                    :value="country.code"
                                            >{{country.name}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Postal Code</label>
                                        <input type="text"
                                               v-model="order.addresses.billing.postal_code"
                                               dusk="order.addresses.customer.postal_code"
                                               class="form-control">
                                    </div>
                                </div>


                            </div>
                            <!--/form-billing-->
                        </div>
                        <div class="tab-pane fade" id="shipping" role="tabpanel" >
                            <!--form-shipping-->
                            <div class="form-customer">
                                <div class="form-row">
                                    <div class="form-group col-md-4" >
                                        <label>Customer</label>
                                        <select
                                                @change="updateEmailPhone($event, 'shipping')"
                                                v-model="order.addresses.shipping.user_id"
                                                class="custom-select custom-select-sm">
                                            <option value="">Select Customer/User</option>
                                            <option v-for="user in app_assets.users"
                                                    :value="user.id">{{user.name}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Email</label>
                                        <input type="text"
                                               v-model="order.addresses.shipping.email"
                                               dusk="order.addresses.customer.email"
                                               class="form-control form-control-sm" />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Phone</label>
                                        <input type="text"
                                               v-model="order.addresses.shipping.phone"
                                               dusk="order.addresses.customer.phone"
                                               class="form-control form-control-sm" />
                                    </div>


                                </div>
                                <div class="form-group">
                                    <label >Business Name</label>
                                    <input type="text"
                                           v-model="order.addresses.shipping.business_name"
                                           dusk="order.addresses.customer.business_name"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label >Address</label>
                                    <input type="text"
                                           v-model="order.addresses.shipping.address_one"
                                           dusk="order.addresses.customer.address_one"
                                           class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label >Address 2</label>
                                    <input type="text"
                                           v-model="order.addresses.shipping.address_two"
                                           dusk="order.addresses.customer.address_two"
                                           class="form-control">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>City</label>
                                        <input type="text"
                                               v-model="order.addresses.shipping.city"
                                               dusk="order.addresses.customer.city"
                                               class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Country</label>
                                        <select v-model="order.addresses.shipping.country_code" class="custom-select">
                                            <option value="">Select Country</option>
                                            <option v-for="country in app_assets.countries"
                                                    :value="country.code"
                                            >{{country.name}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Postal Code</label>
                                        <input type="text"
                                               v-model="order.addresses.shipping.postal_code"
                                               dusk="order.addresses.customer.postal_code"
                                               class="form-control">
                                    </div>
                                </div>


                            </div>
                            <!--/form-shipping-->
                        </div>
                    </div>

                </div>
                <!--/addresses-->

                <br clear="all"/>
                <br />
                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Order Details</label>




                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Currency</label>
                        <select v-model="order.currency"
                                class="custom-select custom-select-sm">
                            <option value="">Select Currency</option>
                            <option v-for="(currency, currency_code) in app_assets.currencies"
                                    :value="currency_code">{{currency_code}} : {{currency}}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Order Number</label>
                        <input type="text"
                               v-model="order.order_number"
                               dusk="order.order_number"
                               class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Order Date</label>
                        <datepicker format="yyyy-MM-dd"
                                    input-class="form-control"
                                    v-model="order.order_date" ></datepicker>
                    </div>
                </div>


                <br clear="all"/>
                <br />
                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Products</label>

                <!--products-->

                <table class="table table-borderless">

                    <thead>

                    <tr>
                        <th width="50">Sl.</th>
                        <th>Details</th>
                        <th style="text-align: right;" width="120"><span class="mg-r-5">Unit Price</span></th>
                        <th style="text-align: right;" width="80"><span class="mg-r-5">Units</span></th>
                        <th style="text-align: right;" width="120">Total Price</th>
                        <th style="text-align: right;" width="30"></th>
                    </tr>

                    </thead>

                    <tbody>

                    <tr v-if="order.products" v-for="(product, index) in order.products">
                        <td style="vertical-align: middle;">
                            {{index+1}}.
                        </td>
                        <td>
                            <input type="text" v-model="product.name"  class="form-control form-control-sm" />
                        </td>
                        <td>
                            <input type="text" v-model="product.price"
                                   @input="updateTotals()"
                                   style="text-align: right;" class="form-control form-control-sm" />
                        </td>
                        <td>
                            <input type="text" v-model="product.quantity"
                                   @input="updateTotals()"
                                   style="text-align: right;" class="form-control form-control-sm" />
                        </td>
                        <td style="text-align: right; vertical-align: middle;">{{order.currency}}  {{product.total}}</td>
                        <td style="text-align: right; vertical-align: middle;">
                            <button @click="removeProduct($event, product)" class="btn btn-card ">
                                <i class="fas fa-times"></i>
                            </button>
                        </td>
                    </tr>


                    <tr style="font-weight: bold;">
                        <td style="vertical-align: middle; "></td>
                        <td >
                            <a href="#" v-on:click="addProduct($event)">Add More</a>
                        </td>
                        <td colspan="2" style="vertical-align: middle; text-align: right;">
                            Sub Total
                        </td>
                        <td style="text-align: right; vertical-align: middle;">{{order.currency}} {{order.sub_total}}</td>
                        <td style="text-align: right; vertical-align: middle;"></td>
                    </tr>

                    <tr style="font-weight: bold;">
                        <td colspan="4" style="vertical-align: middle; text-align: right;">
                            Tax
                        </td>
                        <td style="text-align: right; vertical-align: middle;">{{order.currency}} {{order.tax}}</td>
                        <td style="text-align: right; vertical-align: middle;"></td>
                    </tr>

                    <tr style="font-weight: bold;">
                        <td colspan="4" style="vertical-align: middle; text-align: right;">
                            Discount
                        </td>
                        <td style="text-align: right; vertical-align: middle;">{{order.currency}} {{order.discount}}</td>
                        <td style="text-align: right; vertical-align: middle;"></td>
                    </tr>

                    <tr style="font-weight: bold;">
                        <td colspan="4" style="vertical-align: middle; text-align: right;">
                            Total
                        </td>
                        <td style="text-align: right; vertical-align: middle;">{{order.currency}} {{order.total}}</td>
                        <td style="text-align: right; vertical-align: middle;"></td>
                    </tr>

                    </tbody>

                </table>

                <!--/products-->


                <div class="btn-group mg-t-15">
                    <button type="submit" @click="$vaahcms.fakeFill(order.addresses.customer)"
                            v-if="$store.state.debug"
                            class="btn btn-dark mg-b-10">Fake Fill</button>
                    <button type="submit" @click="store($event)" class="btn btn-primary mg-b-10">Submit</button>
                </div>

            </div>
            <!--/body-->



        </div>
        <!--/card-->


        <!--modal-->
        <div class="modal fade" id="ModalAddCustomer" tabindex="-1" role="dialog" >
              <div class="modal-dialog">
                <div class="modal-content tx-14">
                  <div class="modal-header">
                    <h6 class="modal-title">Add Customer</h6>
                    <button type="button" class="close" data-dismiss="modal">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                      <div class="row">
                          <div class="col-sm">
                              <div class="form-group">
                                  <label>First Name</label>
                                  <input type="text" v-model="new_customer.first_name" class="form-control" >
                              </div>
                          </div>
                          <div class="col-sm">

                              <div class="form-group">
                                  <label>Last Name</label>
                                  <input type="text" v-model="new_customer.last_name" class="form-control" >
                              </div>

                          </div>
                      </div>

                      <div class="row">
                          <div class="col-sm">
                              <div class="form-group">
                                  <label>Email</label>
                                  <input type="text" v-model="new_customer.email" class="form-control" >
                              </div>
                          </div>
                          <div class="col-sm">

                              <div class="form-group">
                                  <label>phone</label>
                                  <input type="text" v-model="new_customer.phone" class="form-control" >
                              </div>

                          </div>
                      </div>

                      <!--<div class="row">
                          <div class="col-sm">
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input"
                                         v-model="new_customer.send_account_details_email"
                                         name="new_customer_send_account_details_email"
                                         id="accountEmail">
                                  <label class="custom-control-label"
                                         for="accountEmail">Send Account Detail Email</label>
                              </div>
                          </div>

                      </div>-->

                  </div>
                  <div class="modal-footer">
                      <div class="btn-group">

                          <button type="button" class="btn btn-dark tx-13"
                                v-if="$store.state.debug"
                                @click="$vaahcms.fakeFill(new_customer)">Fake Fill</button>

                          <button type="button" v-on:click="storeCustomer()" class="btn btn-primary tx-13">Save</button>

                          <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>

                      </div>
                  </div>
                </div>
              </div>
        </div>
        <!--/modal-->

    </div>
</template>
<script src="./CreateJs.js"></script>