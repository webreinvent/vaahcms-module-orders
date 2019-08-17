//---------Variables
var base_url = $('base').attr('href');
var current_url = $('#current_url').attr('content');
var debug = $('#debug').attr('content');
//---------/Variables

let urls = {
    base: base_url,
    current: current_url,
};

import Dashboard from "./dashboard/Dashboard";

const routes= [
    {   path: '/',
        component: Dashboard,
        props: true
    },
    { path: '*', redirect: '/' }
];


//----------Orders
import OrdersApp from "./orders/App";
import OrdersCreate from "./orders/Create";
import OrdersView from "./orders/View";

const routes_orders =     {
    path: '/orders',
    component: OrdersApp,
    props: true,
    children: [
        {
            path: 'create',
            component: OrdersCreate,
            props: true,
        },
        {
            path: 'view',
            component: OrdersView,
            props: true,
        },
    ]
};

routes.push(routes_orders);
//----------/pages

//----------Payments
import PaymentsApp from "./payments/App";
import PaymentsList from "./payments/List";

const routes_payments =     {
    path: '/payments',
    component: PaymentsApp,
    props: true,
    children: [
        {
            path: '/',
            component: PaymentsList,
            props: true,
        },
    ]
};

routes.push(routes_payments);
//----------/payments

//----------Invoices
import InvoicesApp from "./invoices/App";
import InvoicesList from "./invoices/List";

const routes_invoices =     {
    path: '/invoices',
    component: InvoicesApp,
    props: true,
    children: [
        {
            path: '/',
            component: InvoicesList,
            props: true,
        },
    ]
};

routes.push(routes_invoices);
//----------/Invoices


//----------Settings
import SettingsApp from "./settings/App";
import SettingsGeneral from "./settings/General";
import SettingsPaymentGateways from "./settings/PaymentGateways";

const routes_settings =     {
    path: '/settings',
    component: SettingsApp,
    props: true,
    children: [
        {
            path: '/',
            component: SettingsGeneral,
            props: true,
        },
        {
            path: 'general',
            component: SettingsGeneral,
            props: true,
        },
        {
            path: 'payment_gateways',
            component: SettingsPaymentGateways,
            props: true,
        },

    ]
};

routes.push(routes_settings);
//----------/Invoices

export default routes;