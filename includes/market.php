<style>
    .box14{
        width: 35%;
        margin-top:15px;
        min-height: 310px;
        margin-right: 10px;
        padding:10px;
        position:absolute;
        z-index:1;
        right:0px;
        float:right;
        background: -webkit-gradient(linear, 0% 20%, 0% 92%, from(#fff), to(#f3f3f3), color-stop(.1,#fff));
        border: 1px solid #ccc;
        -webkit-border-radius: 60px 5px;
        -webkit-box-shadow: 0px 0px 35px rgba(0, 0, 0, 0.1) inset;
    }
    .box14_ribbon{
        position:absolute;
        top:0; right: 0;
        width: 130px;
        height: 40px;
        background: -webkit-gradient(linear, 555% 20%, 0% 92%, from(rgba(0, 0, 0, 0.1)), to(rgba(0, 0, 0, 0.0)), color-stop(.1,rgba(0, 0, 0, 0.2)));
        border-left: 1px dashed rgba(0, 0, 0, 0.1);
        border-right: 1px dashed rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.2);
        -webkit-transform: rotate(6deg) skew(0,0) translate(-60%,-5px);
    }
    .box14 h3
    {
        text-align:center;
        margin:2px;
    }
    .box14 p
    {
        text-align:center;
        margin:2px;
        border-width:1px;
        border-style:solid;
        padding:5px;
        border-color: rgb(204, 204, 204);
    }
    .box14 span
    {
        background:#fff;
        padding:5px;
        display:block;
        box-shadow:green 0px 3px inset;
        margin-top:10px;
    }
    .box14 img {
        width: 40%;
        padding-left:30%;
        margin-top: 5px;
    }
    .table-box-main {
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        transition: all 0.3s cubic-bezier(.25,.8,.25,1);
    }

    .table-box-main:hover {
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
    }
</style>
<div class="box14 table-box-main">
    <h3>Premium Upgrade</h3> 
    <hr>
    <img src="https://cdn.xadapter.com/wp-content/uploads/2016/05/FedEx-WooCommerce-Shipping-Product-Image-3.png">
    <h3><?php echo __('FedEx WooCommerce Extension' , 'wf-shipping-fedex');?></h3><br/>
    <p style="color:red;">
        <strong><?php echo __('Your Business is precious. Go Premium!' , 'wf-shipping-fedex');?></strong>
    </p>
    <span>
        <ul>
            <li> - <strong><?php echo __('Print shipping label with postage.' , 'wf-shipping-fedex'); ?></strong></li>
            <li> - <strong><?php echo __('Automatic shipment tracking while generating the label.' , 'wf-shipping-fedex'); ?></strong></li>
            <li> - <strong><?php echo __('Weight based packing & box packing.' , 'wf-shipping-fedex'); ?></strong></li>
            <li> - <strong><?php echo __('WPML Support' , 'wf-shipping-fedex'); ?></strong></li>
            <li> - <strong><?php echo __('Change the name of shipping services and add handling costs.' , 'wf-shipping-fedex'); ?></strong></li>
            <li> - <strong><?php echo __('CoD, Third party payer, FedEx LTL Freight & Many more options.' , 'wf-shipping-fedex'); ?></strong></li>
            <li> - <strong><?php echo __('Timely compatibility updates and bug fixes.' , 'wf-shipping-fedex'); ?></strong></li>
            <li> - <strong><?php echo __('Premium support!' , 'wf-shipping-fedex'); ?></strong></li>
        </ul>
    </span>
    <br />
    <center>
        <a href="//www.xadapter.com/product/woocommerce-fedex-shipping-plugin-with-print-label/" target="_blank" class="button button-primary"><?php echo __('Upgrade to Premium','wf-shipping-fedex');?></a> 
        <a href="//fedexwoodemo.wooforce.com/wp-admin/admin.php?page=wc-settings&tab=shipping&section=wf_fedex_woocommerce_shipping_method" target="_blank" class="button button-primary"><?php echo __('Live Demo' , 'wf-shipping-fedex');?></a>
        <a href="//www.xadapter.com/category/product/woocommerce-fedex-shipping-plugin-with-print-label/" target="_blank" class="button button-primary"><?php echo __('Documentation' , 'wf-shipping-fedex');?></a>
    </center>
</div>