


/*
* change inpiut text to input date (for placeholder)
*/
$(document).ready(function() {

	//change input date
	$("#checkInBox").click(function(event) {
		$(this).onfocus(this.type='date');
	 });

	//change input date
	$("#checkOutBox").click(function(event) {
		$(this).onfocus(this.type='date');
	 });

	//change input date
	$("#indexHeaderForm .form-control#checkInBox").click(function(event) {
		$(this).onfocus(this.type='date');
	 });

	//change input date
	$("#indexHeaderForm .form-control#checkOutBox").click(function(event) {
		$(this).onfocus(this.type='date');
	 });

});



/*
* Btn function
*/

var visMenuBar = 0;

$(window).load(function() {
	var searchAside = $("aside");

	// button close panel header
	$("#imgMenuHide").click(function() {
		searchAside.toggleClass("invis");
	});

	// mbutton open and close panel header
	$(".searchBtn").click(function() {
		searchAside.toggleClass("invis");
	});

	// open and close menu button mobile
	$("#menuBtn").click(function() {
		if(!visMenuBar) {
		 $('#navMobile').animate({"width":"60%"}, 150);
		 visMenuBar = 1;
		} else {
			$('#navMobile').animate({"width":"0%"}, 150);
			visMenuBar = 0;
		}
	});

	// open inbox panel
	$(".panel-title").click(function() {
		$(this).parent(".panel-heading").find(".messegeContextInbox").hide(0);
		$(this).parent(".panel-heading").find(".timeMessegeInbox").hide(0);
		$(this).parent(".panel-heading").addClass("messegeFullInbox",2000);
		$(this).parent(".panel-heading").find(".AllMessegeFullInbox").show(50);
		$(this).parent(".panel-heading").find(".closeInboxBtn").show(50);
	});


	// close inbox panel
	$(".closeInboxBtn").click(function() {
		console.log("In closeInboxBtn");
		$(this).parent(".panel-heading").find(".messegeContextInbox").show(0);
		$(this).parent(".panel-heading").find(".timeMessegeInbox").show(0);
		$(this).parent(".panel-heading").removeClass("messegeFullInbox",2000);
		$(this).parent(".panel-heading").find(".AllMessegeFullInbox").hide(0);
		$(this).parent(".panel-heading").find(".closeInboxBtn").hide(0);

		var mobile = false;
		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
	    	$("header").css({ "position": "inherit" });
	    	$(this).parent(".panel-heading").find(".timeMessegeInbox").hide(0);
	    	return;
	    }
	});



		//open dish box
	$(".ShowMore").click(function() {
		//$(this).parent(".offer").find(".messegeContextInbox").hide(0);
		$(this).hide(0);
		console.log("In ShowMore");
		$(this).parent().parent(".offer").addClass("fullOfferDish",5000);
		$(this).parent().parent(".offer").find(".AllMessegeFullInbox").show(50);
		$(this).parent().parent(".offer").find(".ingridientDish").show(50);
		$(this).parent().parent(".offer").find(".preparationDish").show(50);
		$(this).parent().parent(".offer").find(".discriptionDish p").css({"height":"auto"});
		$(this).parent().parent(".offer").find(".ShowLess").show(50);
	});


		//close dish box
	$(".ShowLess").click(function() {
		console.log("In closeInboxBtn");
		$(this).hide(0);
		$(this).parent(".offer").removeClass("fullOfferDish",5000);
		$(this).parent(".offer").find(".AllMessegeFullInbox").hide(50);
		$(this).parent(".offer").find(".ingridientDish").hide(50);
		$(this).parent(".offer").find(".preparationDish").hide(50);
		$(this).parent(".offer").find(".discriptionDish p").css({"height":"40px"});
		$(this).parent(".offer").find(".ShowMore").show(50);
	});


		//open input settings
	$(".editInputSetting").click(function() {
		console.log("In editInputSetting");
		$(this).hide(0);
		$(this).parent(".labelInputSetting").find(".cancelInputSetting").show(50);
		$(this).parent(".labelInputSetting").find("input").show(0);
	});

	//close input settings
	$(".cancelInputSetting").click(function() {
		console.log("In cancelInputSetting");
		$(this).hide(0);
		$(this).parent(".labelInputSetting").find(".editInputSetting").show(50);
		$(this).parent(".labelInputSetting").find("input").hide(0);
	});


});
