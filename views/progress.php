<?php
include "header.php";
?>

<!DOCTYPE html>
<html>

<head>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js'></script>
    
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <style>
    
h2
{
    color: #000000;
}

#form
{
    text-align: center;
    position: relative;
    margin-top: 20px;
}

#form fieldset
{
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative;
}

.finish
{
    text-align: center;
}

#form fieldset:not(:first-of-type)
{
    display: none;
}

#form .previous-step,
#form .next-step
{
    width: 100px;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px 10px 0px;
    float: right;
}

.form,
.previous-step
{
    background: #616161;
}

.form,
.next-step
{
    background: #2F8D46;
}


#progressbar
{
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey;
}

#progressbar .active
{
    color: #000000;
}

#progressbar li
{
    list-style-type: none;
    font-size: 15px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400;
}

#progressbar #step1:before
{
    content: "1";
}

#progressbar #step2:before
{
    content: "2";
}

#progressbar #step3:before
{
    content: "3";
}

#progressbar #step4:before
{
    content: "4";
}

#progressbar li:before
{
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px;
}

#progressbar li:after
{
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1;
}

#progressbar li.active:before,
#progressbar li.active:after
{
    background: #000000;
}

.progress
{
    height: 20px;
}

.progress-bar
{
    background-color: #000000;
}

  </style>
</head>

<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
                <div class="px-0 pt-4 pb-0 mt-3 mb-3">
                    <form id="form">
                        <ul id="progressbar" class="nav nav-pills">
                            <li class="active" id="step1">
                                <strong>Cart</strong>
                            </li>
                            <li id="step2"><strong>sign in</strong></li>
                            <li id="step3"><strong>Delivery and Payment</strong></li>
                            <li id="step4"><strong>Confirmation</strong></li>
                        </ul>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div> <br>
                        <fieldset>
                            <h2>cart</h2>
                            <button type="button" class="btn btn-primary next-step">Next Step</button>
                        </fieldset>
                        <fieldset>
                            <h2>sign in</h2>
                            <button type="button" class="btn btn-primary next-step">Next Step</button>
                            <button type="button" class="btn btn-secondary previous-step">Previous Step</button>
                        </fieldset>
                        <fieldset>
                            <h2>Delivery and Payment</h2>
                            <button type="button" class="btn btn-primary next-step">Final Step</button>
                            <button type="button" class="btn btn-secondary previous-step">Previous Step</button>
                        </fieldset>
                        <fieldset>
                            <div class="finish">
                                <h2 class="text text-center">
                                    <strong>Confirmation</strong>
                                </h2>
                            </div>
                            <button type="button" class="btn btn-secondary previous-step">Previous Step</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script>


$(document).ready(function () { 
	var currentGfgStep, nextGfgStep, previousGfgStep; 
	var opacity; 
	var current = 1; 
	var steps = $("fieldset").length; 

	setProgressBar(current); 

	$(".next-step").click(function () { 

		currentGfgStep = $(this).parent(); 
		nextGfgStep = $(this).parent().next(); 

		$("#progressbar li").eq($("fieldset") 
			.index(nextGfgStep)).addClass("active"); 

		nextGfgStep.show(); 
		currentGfgStep.animate({ opacity: 0 }, { 
			step: function (now) { 
				opacity = 1 - now; 

				currentGfgStep.css({ 
					'display': 'none', 
					'position': 'relative'
				}); 
				nextGfgStep.css({ 'opacity': opacity }); 
			}, 
			duration: 500 
		}); 
		setProgressBar(++current); 
	}); 

	$(".previous-step").click(function () { 

		currentGfgStep = $(this).parent(); 
		previousGfgStep = $(this).parent().prev(); 

		$("#progressbar li").eq($("fieldset") 
			.index(currentGfgStep)).removeClass("active"); 

		previousGfgStep.show(); 

		currentGfgStep.animate({ opacity: 0 }, { 
			step: function (now) { 
				opacity = 1 - now; 

				currentGfgStep.css({ 
					'display': 'none', 
					'position': 'relative'
				}); 
				previousGfgStep.css({ 'opacity': opacity }); 
			}, 
			duration: 500 
		}); 
		setProgressBar(--current); 
	}); 

	function setProgressBar(currentStep) { 
		var percent = parseFloat(100 / steps) * current; 
		percent = percent.toFixed(); 
		$(".progress-bar") 
			.css("width", percent + "%") 
	} 

	$(".submit").click(function () { 
		return false; 
	}) 
}); 
</script>


<footer>
    <?php
    include "footer.php";

    ?>
  </footer>


</html>




