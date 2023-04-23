<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Make a payment')); ?></div>
                <label for="cardElement" class="mt-3">
                    Card Details:
                </label>
                
                <div id="cardElement"></div>
                
                <small id="cardErrors" class="form-text text-muted" role="alert"></small>
                <input type="hidden" name="payment_method" id="paymentMethod">
                <div class="card-body">
                    <form action="" id="paymentForm" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('post'); ?>
                        <div class="text-center mt-3">
                            <button type="submit" id="payButton" class="btn btn-primary">PAY</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script>
	const stripe = Stripe('pk_test_HwhhhweX9qh068jlfLLbQkd900cWNenH6Z');

	const elements = stripe.elements({'locale':'en'});

	const cardElement = elements.create('card');

	cardElement.mount('#cardElement');
</script>
<script>
	const form = document.getElementById('paymentForm');

	const payButton = document.getElementById('payButton');

	payButton.addEventListener('click',async(e) => {
           
         e.preventDefault();
        
        stripe.createToken(cardElement).then(function(result) {

            console.log(result);
        });         
           
	});
</script>
    
</body>
</html>

<?php /**PATH E:\GIT\Laravel\Ecommerce\resources\views/stripe/index.blade.php ENDPATH**/ ?>