

<link rel="stylesheet" href="https://www.paytabs.com/express/express.css">
<script src="https://www.paytabs.com/theme/express_checkout/js/jquery-1.11.1.min.js"></script>
<script src="https://www.paytabs.com/express/express_checkout_v3.js"></script>
<!-- Button Code for PayTabs Express Checkout -->
<div class="PT_express_checkout"></div>
<script type="text/javascript">
    Paytabs("#express_checkout").expresscheckout({
        settings:{
            // secret_key: "ybowXWKX21lmIq5BtdK7a96vazWSwYc5aAC8xm5zorW6R2IkfsrqCyVN8RFEQRK0sm8ZIez6FwdxyVSOnke0SaN02sFSkqTNM1Mu",
            secret_key:"7Q4Ii7s9YcMoyOcJiRvs6ngDAO5sbA8iqc1IjtRiGDGesSYKKucQRturiAUta3LAfNizg9SXNycfra0cFc2wFwYY6TrgWcQcZ9Lg",
           // merchant_id: "10026865",
            merchant_id: "10028405",
            amount: "10.00",
            currency: "USD",
            title: "Test Express Checkout Transaction",
            product_names: "Product1,Product2,Product3",
            order_id: 25,
            url_redirect: "https://etapromotion.com/api/confirm-payment",
            display_billing_fields: 0,
            display_shipping_fields:0,
            display_customer_info: 1,
            language: "en",
            redirect_on_reject: 1,
            style:{
                css: "custom",
                ///linktocss: "https://www.yourstore.com/css/style.css",
                linktocss : "http://etapromotion.com/css/payment.css"
            },
            is_iframe:{
                load: "onbodyload",
                show: 1,
            },

        },
        customer_info:{
            first_name: "John",
            last_name: "Smith",
            phone_number: "5486253",
            country_code: "973",
            email_address: "john@test.com"            
        },
        billing_address:{
            full_address: "Manama, Bahrain",
            city: "Manama",
            state: "Manama",
            country: "BHR",
            postal_code: "00973"
        },
        shipping_address:{
            shipping_first_name: "John",
            shipping_last_name: "Smith",
            full_address_shipping: "Manama, Bahrain",
            city_shipping: "Manama",
            state_shipping: "Manama",
            country_shipping: "BHR",
            postal_code_shipping: "00973"
        },
        checkout_button:{
            width: 150,
            height: 30,
            img_url: "https://www.YOURWEBSITE.com/image/yourimage.jpg"
        },
        pay_button:{
            width: 150,
            height: 30,
            img_url: "https://www.YOURWEBSITE.com/image/yourimage.jpg"
        }
    });
</script>

