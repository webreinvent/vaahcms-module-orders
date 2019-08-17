import pagination from 'laravel-vue-pagination';
import Datepicker from 'vuejs-datepicker';

export default {

    props: ['urls'],
    computed:{
        ajax_url(){
            let ajax_url = this.$store.state.urls.current;
            return ajax_url;
        },
        app_assets(){
            return this.$store.state.app_assets;
        }
    },
    components:{
        'pagination': pagination,
        'datepicker': Datepicker,
    },
    data()
    {
        let obj = {
            assets: null,
            q: null,
            page: 1,
            list: null,
            active_item: null,
            active_el: null,
            filters: {
                q: null,
            },
            new_customer:{
                first_name: null,
                last_name: null,
                phone: null,
                email: null,
                send_account_details_email: false,
            },
            order:{
                order_number: null,
                order_date: null,
                currency: "",
                sub_total: 0,
                tax: 0,
                discount: 0,
                total: 0,
                staff_notes: null,
                addresses: {
                    customer_as_billing: false,
                    customer_as_shipping: false,
                    customer:{
                        user_id: "",
                        type: 'customer',
                        business_name: null,
                        name: null,
                        phone: null,
                        email: null,
                        address_one: null,
                        address_two: null,
                        city: null,
                        state: null,
                        country_code: null,
                        country: null,
                        postal_code: null,
                        taxation_label: null,
                        taxation_number: null,
                        business_identification_label: null,
                        business_identification_number: null,
                    },
                    billing:{
                        user_id: "",
                        type: 'billing',
                        business_name: null,
                        name: null,
                        phone: null,
                        email: null,
                        address_one: null,
                        address_two: null,
                        city: null,
                        state: null,
                        country_code: null,
                        country: null,
                        postal_code: null,
                        taxation_label: null,
                        taxation_number: null,
                        business_identification_label: null,
                        business_identification_number: null,
                    },

                    shipping:{
                        user_id: "",
                        type: 'shipping',
                        business_name: null,
                        name: null,
                        phone: null,
                        email: null,
                        address_one: null,
                        address_two: null,
                        city: null,
                        state: null,
                        country_code: null,
                        country: null,
                        postal_code: null,
                        taxation_label: null,
                        taxation_number: null,
                        business_identification_label: null,
                        business_identification_number: null,
                    },
                },
                products: [
                    {
                        order: 0,
                        name: null,
                        price: 0,
                        quantity: 0,
                        total: 0,
                    }
                ]
            }
        };

        return obj;
    },
    watch: {



    },
    mounted() {

        //---------------------------------------------------------------------
        document.title = "Orders";
        //---------------------------------------------------------------------
        //---------------------------------------------------------------------
        //---------------------------------------------------------------------
        //---------------------------------------------------------------------

    },
    methods: {
        //---------------------------------------------------------------------
        showAddCustomerModal: function () {
            $("#ModalAddCustomer").modal('show');
        },
        //---------------------------------------------------------------------

        storeCustomer: function () {
            var url = this.ajax_url+"/customer/store";
            var params = this.new_customer;
            this.$vaahcms.ajax(url, params, this.storeCustomerAfter);
        },
        //---------------------------------------------------------------------
        storeCustomerAfter: function (data) {

            this.$root.$emit('getAppAssetsReloadEvent');

            this.new_customer={
                first_name: null,
                last_name: null,
                phone: null,
                email: null,
                send_account_details_email: false,
            };

            this.$vaahcms.stopNprogress();

        },

        //---------------------------------------------------------------------
        updateEmailPhone: function (e, type) {

            let user = this.$vaahcms.findInArrayByKey(this.app_assets.users, 'id', e.target.value);

            if(user)
            {
                this.order.addresses[type].email = user.email;
                this.order.addresses[type].phone = user.phone;
            }
        },
        //---------------------------------------------------------------------
        updateBillingAddress: function (e) {
            if(!this.order.addresses.customer_as_billing)
            {
                this.order.addresses.billing = this.order.addresses.customer;
            } else {
                this.resetBillingAddress();
            }
        },
        //---------------------------------------------------------------------
        resetBillingAddress: function()
        {

            this.order.addresses.billing = {
                user_id: "",
                type: 'billing',
                business_name: null,
                name: null,
                phone: null,
                email: null,
                address_one: null,
                address_two: null,
                city: null,
                state: null,
                country_code: null,
                country: null,
                postal_code: null,
                taxation_label: null,
                taxation_number: null,
                business_identification_label: null,
                business_identification_number: null,
        };



        },
        //---------------------------------------------------------------------
        updateShippingAddress: function (e) {
            if(!this.order.addresses.customer_as_shipping)
            {
                this.order.addresses.shipping = this.order.addresses.customer;
            } else
            {
                this.resetShippingAddress();
            }
        },
        //---------------------------------------------------------------------
        resetShippingAddress: function()
        {
            this.order.addresses.shipping = {
                user_id: "",
                type: 'billing',
                business_name: null,
                name: null,
                phone: null,
                email: null,
                address_one: null,
                address_two: null,
                city: null,
                state: null,
                country_code: null,
                country: null,
                postal_code: null,
                taxation_label: null,
                taxation_number: null,
                business_identification_label: null,
                business_identification_number: null,
            };
        },
        //---------------------------------------------------------------------
        addProduct: function (e) {

            e.preventDefault();

            let order = this.order.products.length;
            let product = {
                order: order,
                name: null,
                price: 0,
                quantity: 0,
                total: 0,
            };

            this.order.products.push(product);

        },
        //---------------------------------------------------------------------
        removeProduct: function (e, product) {

            e.preventDefault();

            let products = this.$vaahcms.removeInArrayByKey(this.order.products, product, 'order');

            this.order.products = {};
            this.order.products = products;

            this.updateTotals();

        },
        //---------------------------------------------------------------------
        updateTotals: function()
        {
            if(this.order.products.length < 1)
            {
                this.order.sub_total = 0;
                this.order.tax = 0;
                this.order.total = 0;
                this.order.discount = 0;
                return false;
            }
            this.order.sub_total = 0;

            let self = this;

            this.order.products.map(function (product) {
                product.total = product.price*product.quantity;
                self.order.sub_total = self.order.sub_total+product.total;
            });

            this.order.total = this.order.sub_total-this.order.tax-this.order.discount;

        },
        //---------------------------------------------------------------------
        store: function () {
            let url = this.ajax_url+"/store";
            let params = this.order;
            params.user_id = this.order.addresses.customer.user_id;
            this.$vaahcms.console('-->', params);
            this.$vaahcms.ajax(url, params, this.storeAfter);
        },
        //---------------------------------------------------------------------
        storeAfter: function (data) {

            console.log('test-->', data);

            this.$vaahcms.stopNprogress();
        },
        //---------------------------------------------------------------------

        //---------------------------------------------------------------------
        //---------------------------------------------------------------------
        //---------------------------------------------------------------------
    }
}