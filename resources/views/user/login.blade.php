<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
            <meta content="width=device-width, initial-scale=1" name="viewport"/>
                <title>
                </title>
                <!-- Latest compiled and minified CSS -->
                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet"/>
                    <!-- Optional theme -->
                    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css" rel="stylesheet"/>
                        <!-- Latest compiled and minified JavaScript -->
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js">
                        </script>
                        <link href="https://digispades.net/assets/css/style.min.css" rel="stylesheet" type="text/css">
                        
    </head>
    <body>
        <div class="container mt-8">
            <form class="form form-validate" id="checkout-frm" method="post" name="checkout-frm" novalidate="novalidate">
                <input id="paypal_txnid" name="paypal_txnid" type="hidden">
                    <input id="paypal_status" name="paypal_status" type="hidden">
                        <input id="paypal_payamnt" name="paypal_payamnt" type="hidden">
                         
                            <div class="row gutter-lg">
                                <div class="col-lg-7 mb-6"  style="margin: 0 auto;">
                                    <h3 class="title title-simple text-left">
                                        Billing Details
                                    </h3>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label class="input-label required">
                                                Name
                                            </label>
                                            <div class="relative">
                                                <input class="form-control" id="firstName" name="first_name" required="" type="text" value=""/>
                                               
                                            </div>
                                        </div>
                                      
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="input-label required">
                                                Email Address
                                            </label>
                                            <div class="relative">
                                                <input class="form-control" id="email" name="payer_email" required="" type="email" value=""/>
                                                
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <label class="input-label">
                                                Phone
                                            </label>
                                            <div class="relative">
                                                <input class="form-control" id="phone" name="mobile" type="text">
                                                    <input class="form-control" id="subject" name="subject" type="hidden" value=""/>
                                                        
                                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label required">
                                            Street Address
                                        </label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="relative">
                                                    <input class="form-control" id="address1" name="address1" placeholder="House number and street name" required="" type="text" value=""/>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="relative">
                                                    <label class="input-label required">
                                                        State
                                                    </label>
                                                    <input class="form-control" id="state" name="state" required="" type="text" value=""/>
                                                   
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="relative">
                                                    <label class="input-label required">
                                                        City
                                                    </label>
                                                    <input class="form-control" id="city" name="city" required="" type="text" value=""/>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <label class="input-label required">
                                                Postcode / ZIP
                                            </label>
                                            <div class="relative">
                                                <input class="form-control" id="postcode" name="postcode" required="" type="text" value=""/>
                                                
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <label class="input-label required">
                                                Country
                                            </label>
                                            
                                        </div>
                                    </div>

                                    <div class="form-group mt-5">
                                        <h3 class="title title-simple text-left mb-3">
                                            Additional information
                                        </h3>
                                        <label class="input-label">
                                            Order Notes
                                            <small>
                                                (Optional)
                                            </small>
                                        </label>
                                        <textarea class="form-control" id="notes" name="message" placeholder="Notes about your order, e.g. special notes for delivery" rows="6">
                                        </textarea>
                                    </div>

                                      <button class="btn btn-primary btn-block mb-3 popup-modal" data-ajaxify="true" disabled="" href="#stripe-modal" id="stript-btn" type="button">
                                                    CARDS
                                                    <img src="/assets/images/paylogo.png" style="margin-left: 20px;vertical-align: middle;"/>
                                                </button>
                                </div>
                               
                            </div>
                        </input>
                    </input>
                </input>
            </form>
        </div>
    </body>
</html>