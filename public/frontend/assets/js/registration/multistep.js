/*
Plugin Name: - Multi Step Form Wizard jQuery validation
Created by: @LogicalStack Team
DEMO URL:  http://logicalstack.com/demo/multistepwizard/index.html
 

*/
;( function( $, window, document, undefined) {

	"use strict";
		var pluginName = "stepWizard",
			defaults = {
                stepTheme: 'steptheme1',        /*Valse should be defaultTheme,steptheme1*/
                allstepClickable: true,         /*Value should be true /false*/
                compeletedStepClickable: false, /*Value should be true/false*/
                stepCounter: false,             /*Value should be true/false*/
                StepImage: true,                /*Valse should be true/false*/
                lastStepIndex: 0,               /*Temp value but should be 0*/
                animation: true,                /*Value should be true/false*/
                animationClass: "fadeIn",       /*Value should be any animated Class but class will be avaliable on animate.CSS file.*/
               // messageInAnimationClass: "bounceInUp", /*Value should be any animated Class but class will be avaliable on animate.CSS file.*/
                stepValidation: true,          /*Value should be true/false if Step validation required then set true*/
                validation : true,              /*Temp value but should be true other wise step wil not work*/
                field: {                        /*Hold all validation input field You can set according to form field*/
                    company_name : {
                        required : true,
                        minlength: 2,
                        Regex: /^[a-zA-Z0-9]+$/,
                    },
                    username : { 
                        required : true, 
                        minlength: 2,
                        Regex: /^[a-zA-Z0-9]+$/,  
                    },
                     password : {
                        required : true,
                        minlength : 5,
                        maxlength : 20,
                        Regex: /^(?=.*[0-9_\W]).+$/, 
                    },
                    confirm_password :{ required : true, },
                    email:{
                        required : true,
                        Regex: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                    },
                    gender :{ required : true, },
                    salutation :{ required : true, },
                    firstname: { required : true, },
                    lastname: { required : true,  },
                    lookonpackage: { required : true,  },
                    phone: { 
                        required : true,  
                        /*Regex: /^[0-9]*$/,*/ 
                        Regex : /^\d{10}$/,
                           
                    },
                    zipcode: { 
                        required : true,
                        Regex : /^\d{6}$/,
                    },
                    state: { required : true,  },
                    address: { required : true,  },
                    country: { required : true,  },
                    cardtype: { required : true,  },
                    cardnum: {
                        required : true,
                        Regex : /^\d{16}$/,
                    },
                    cvc: { 
                        required : true, 
                        Regex : /^\d{3}$/,
                    },
                    holdername: { required : true,  },
                    exmonth: { required : true,  },
                    exyear: { required : true,  },
                },
                message: {                      /*Hold all error message*/
                    company_name: inscribe,
                    password: "Please provide a password",
                    passwordMinLength: "Your Password must consist of at least 5 characters",
                    passwordRegex: "Your password must contain at least one Special character",
                    confirm_password: " Please provide a ConfirmPassword",
                    confirm_password1: " Enter ConfirmPassword Same as Password",
                    email: inscribe_4,
                    emailRegex: " Bitte geben Sie eine gültige E-Mail Adresse ein",
                    firstname : inscribe_2,
                    lastname : inscribe_3,
                    lookonpackage: "Bitte auswählen",
	                phone : inscribe_5,
	                phoneRegex : "phone number is Not Valid",
	                address : "Please Enter a FUll Address",
	                country : "Please select Country Name",
	                cardtype : "Please Select Card Type",
	                cardnum : "Card Number Require",
	                cardnumRegex : "Card Number is not valid",
	                cvc : "CVC Required",
	                cvcRegex : "CVC not valid",
	                holdername : "Please Enter a Card Holder Name",
	                exmonth : "Please Select Expiry Month",
	                exyear : "Please Select Expiry Year",
                }
                
			};

			function Plugin ( element, options ) {
                this.element = element;
                this.settings = $.extend( {}, defaults, options );
                this.settings.message = $.extend( {}, defaults.message, options.message);
                this.settings.field = $.extend( {}, defaults.field, options.field);
                this._defaults = defaults;
                this._name = pluginName;
                this.init();
    
            }
            var oid;
            var oelm;
            var valid;
            $.extend( Plugin.prototype, {
                init: function() {
                    oid = this;
                    oelm = $(this.element).attr('id');
                    valid = this.settings;
                    this.handleStepTheme();
                    this.handleStepCounter();
                    this.handleStepImage();
                    this.lastStepIndex();
                    this.handleStepBtn();
                    this.handleNextStep();
                    this.handlePrevStep();
                    this.handleStepClick();
                    this.handleSelectDropox();
                    this.handleSubmitBtnClick();
                    this.btnInformationText();
                    this.handleAnimation();
    
    
                },
                /*Handle Wizard Theme*/
                handleStepTheme: function() {
                    var selm = $("#"+ oelm);
                    selm.addClass(valid.stepTheme)
    
                },
                /*Handle Wizard Step Counter feature*/
                handleStepCounter: function() {
                    var selm = $("#"+ oelm +' .rms-step-section');
                    if (valid.stepCounter){
                        valid.StepImage = false;
                        selm.attr("data-step-counter", true);
                    }else {
                        selm.attr("data-step-counter", false);
                    }
    
                },
                 /*Handle Wizard Step image feature*/
                handleStepImage: function() {
                    var selm = $("#"+ oelm +' .rms-step-section');
                    if (valid.StepImage){
                        selm.attr("data-step-image", true);
                    }else {
                        selm.attr("data-step-image", false);
                    }
    
                },
                 /*Handle Wizard Step Form Validation*/
                 handleFormValidation: function() {
                    switch(this.settings.stepValidation){
                        case true:
                            valid.validation = true;
                            var miac = this.settings.messageInAnimationClass;
                            var cws = ".rms-content-box.rms-current-section .inpt-control"
                           $("#"+ oelm +' '+ cws +'').focusin(function(){
                                    $(this).removeClass("input-error");
                                    $(this).parent().find('.errors').remove();
                            });
                            /*If Condition Match Remove Field error message Class*/
                            function conditionMatch(s){
                                s.removeClass('input-error');
                                s.parent().find('.errors').remove();
                            }
                            /*If Condition not Match Add Field error message Class*/
                            function conditionNotMatch(s, m){
                                valid.validation = false;
                                s.addClass('input-error');
                                s.after('<span class="errors animated '+ miac +'">' + m + ' </span>');
    
                            }
    
    
                            /*Function to check Blank field*/
                            function checkBlankField(s, v, m){
                                s.parent().find('.errors').remove();
                                if(!v){
                                    conditionNotMatch(s, m);
                                }else{
                                    conditionMatch(s, m);
                                }
                            }
                            /*Function to check Minimum Length of field*/
                            function checkMinlength(s, v, mnl, m){
                                if (!s.hasClass('input-error')){
                                    if(mnl > v.length ){
                                         conditionNotMatch(s, m);
                                    }else{
                                        conditionMatch(s);
                                    }
                                }
                            }
                            /*Function to check input field Patteren*/
                            function checkRegex(s, v, r, m){
                                if (!s.hasClass('input-error')){
                                  if(!v.match(r) ){
                                       conditionNotMatch(s, m);
                                    }else{
                                        conditionMatch(s);
                                    }
                                }
                            }
                            /*Function to Compare field value*/
                            function checkCompareField(s, v, p, m){
                                if (!s.hasClass('input-error')){
                                    if(v != p ){
                                         conditionNotMatch(s, m);
                                    }else{
                                        conditionMatch(s);
                                    }
                                }
                            }
    
    
                             /*Function to Valid company_name Field*/
                            function checkCompanyName(){
                                var selm = $("#"+ oelm +' '+ cws +'[name="company_name"]');
                                 if (valid.field.company_name.required && selm.length > 0){
                                     var elmval = selm.val().trim();
                                     checkBlankField(selm, elmval, valid.message.company_name );
                                     //checkMinlength(selm, elmval, valid.field.company_name.minlength );
                                     //checkRegex(selm, elmval, valid.field.company_name.Regex, valid.message.usernameRegex );
                                 }
                            }
                            /*Function to Valid Password Field*/
                            function checkPassword(){
                                var selm = $("#"+ oelm +' '+ cws +'[name="password"]');
                                 if (valid.field.password.required && selm.length > 0){
                                     var elmval = selm.val().trim();
                                     checkBlankField(selm, elmval, valid.message.password );
                                     checkMinlength(selm, elmval, valid.field.password.minlength, valid.message.passwordMinLength );
                                     checkRegex(selm, elmval, valid.field.password.Regex, valid.message.passwordRegex );
                                 }
                            }
    
                            /*Function to Valid Confirm Password Field*/
                            function checkConfirmPassword(){
                                var selm = $("#"+ oelm +' '+ cws +'[name="confirm_password"]');
                                 if (valid.field.confirm_password.required && selm.length > 0){
                                     var passwd = $("#"+ oelm +' '+ cws +'[name="password"]').val().trim();
                                     var elmval = selm.val().trim();
                                     checkBlankField(selm, elmval, valid.message.confirm_password );
                                     checkCompareField(selm, elmval, passwd, valid.message.confirm_password1 );
                                 }
                            }
                            /*Function to Valid Email Field*/
                            function checkEmail(){
                                var selm = $("#"+ oelm +' '+ cws +'[name="email"]');
                                 if (valid.field.email.required && selm.length > 0){
                                     var elmval = selm.val().trim();
                                     checkBlankField(selm, elmval, valid.message.email );
                                     checkRegex(selm, elmval, valid.field.email.Regex, valid.message.emailRegex );
                                 }
                            }
                            /*Function to Valid Gender Field*/
                            function checkGender(){
                                var selm = $("#"+ oelm +' '+ cws +'[name="gender"]');
                                 if (valid.field.gender.required && selm.length > 0){
                                     var elmval = selm.val();
                                     checkBlankField(selm, elmval, valid.message.gender );
                                 }
                            }
                            /*Function to Valid First Name Field*/
                            function checkfirstname(){
                                var selm = $("#"+ oelm +' '+ cws +'[name="firstname"]');
                                 if (valid.field.firstname.required && selm.length > 0){
                                     var elmval = selm.val().trim();
                                     checkBlankField(selm, elmval, valid.message.firstname );
                                 }
                            }
                            /*Function to Valid lookonpackage Field*/
                            function checklookonpackage(){
                                var selm = $("#"+ oelm +' '+ cws +'[name="lookonpackage"]');
                                 if (valid.field.lookonpackage.required && selm.length > 0){
                                     var elmval = selm.val().trim();
                                     checkBlankField(selm, elmval, valid.message.lookonpackage );
                                 }
                            }
                            /*Function to Valid Last Name Field*/
                            function checklastname(){
                                var selm = $("#"+ oelm +' '+ cws +'[name="lastname"]');
                                 if (valid.field.lastname.required && selm.length > 0){
                                     var elmval = selm.val().trim();
                                     checkBlankField(selm, elmval, valid.message.lastname );
                                 }
                            }
                            /*Function to Valid Phone Number Field*/
                            function checkphoneNumber(){
                                var selm = $("#"+ oelm +' '+ cws +'[name="phone"]');
                                 if (valid.field.phone.required && selm.length > 0){
                                     var elmval = selm.val().trim();
                                     checkBlankField(selm, elmval, valid.message.phone );
                                     //checkRegex(selm, elmval, valid.field.phone.Regex, valid.message.phoneRegex );
                                 }
                            }
                            /*Function to Valid Zip Code Field*/
                            function checkzipcode(){
                                var selm = $("#"+ oelm +' '+ cws +'[name="zipcode"]');
                                 if (valid.field.zipcode.required && selm.length > 0){
                                     var elmval = selm.val().trim();
                                     checkBlankField(selm, elmval, valid.message.zipcode );
                                     checkRegex(selm, elmval, valid.field.zipcode.Regex, valid.message.zipcodeRegex );
                                 }
                            }
                            /*Function to Valid State Field*/
                            function checkstate(){
                                var selm = $("#"+ oelm +' '+ cws +'[name="state"]');
                                 if (valid.field.state.required && selm.length > 0){
                                     var elmval = selm.val();
                                     checkBlankField(selm, elmval, valid.message.state );
                                 }
                            }
                            /*Function to Valid Address Field*/
                            function checkaddress(){
                                var selm = $("#"+ oelm +' '+ cws +'[name="address"]');
                                 if (valid.field.address.required && selm.length > 0){
                                     var elmval = selm.val().trim();
                                     checkBlankField(selm, elmval, valid.message.address );
                                 }
                            }
                            /*Function to Valid Country Field*/
                            function checkcountry(){
                                var selm = $("#"+ oelm +' '+ cws +'[name="country"]');
                                 if (valid.field.country.required && selm.length > 0){
                                     var elmval = selm.val();
                                     checkBlankField(selm, elmval, valid.message.country );
                                 }
                            }
                            /*Function to Valid Card type Field*/
                            function checkcardtype(){
                                var selm = $("#"+ oelm +' '+ cws +'[name="cardtype"]');
                                 if (valid.field.cardtype.required && selm.length > 0){
                                     var elmval = selm.val();
                                     checkBlankField(selm, elmval, valid.message.cardtype );
                                 }
                            }
                            /*Function to Valid Card Number Field*/
                            function checkcardnum(){
                                var selm = $("#"+ oelm +' '+ cws +'[name="cardnum"]');
                                 if (valid.field.cardnum.required && selm.length > 0){
                                     var elmval = selm.val().trim();
                                     checkBlankField(selm, elmval, valid.message.cardnum );
                                     checkRegex(selm, elmval, valid.field.cardnum.Regex, valid.message.cardnumRegex );
                                 }
                            }
                            /*Function to Valid Card CVC Field*/
                            function checkcvc(){
                                var selm = $("#"+ oelm +' '+ cws +'[name="cvc"]');
                                 if (valid.field.cvc.required && selm.length > 0){
                                     var elmval = selm.val().trim();
                                     checkBlankField(selm, elmval, valid.message.cvc );
                                     checkRegex(selm, elmval, valid.field.cvc.Regex, valid.message.cvcRegex );
                                 }
                            }
                            /*Function to Valid Card Holder Name Field*/
                            function checkholdername(){
                                var selm = $("#"+ oelm +' '+ cws +'[name="holdername"]');
                                 if (valid.field.holdername.required && selm.length > 0){
                                     var elmval = selm.val().trim();
                                     checkBlankField(selm, elmval, valid.message.holdername );
                                 }
                            }
                            /*Function to Valid Card Expiary Month Field*/
                            function checkexmonth(){
                                var selm = $("#"+ oelm +' '+ cws +'[name="exmonth"]');
                                 if (valid.field.exmonth.required && selm.length > 0){
                                     var elmval = selm.val();
                                     checkBlankField(selm, elmval, valid.message.exmonth );
                                 }
                            }
                            /*Function to Valid Expiry Year Field*/
                            function checkexyear(){
                                var selm = $("#"+ oelm +' '+ cws +'[name="exyear"]');
                                 if (valid.field.exyear.required && selm.length > 0){
                                     var elmval = selm.val();
                                     checkBlankField(selm, elmval, valid.message.exyear );
                                 }
                            }
                            /*Function to Valid salutation Field*/
                            function checksalutation(){
                                var selm = $("#"+ oelm +' '+ cws +'[name="salutation"]');
                                 if (valid.field.salutation.required && selm.length > 0){
                                     var elmval = selm.val();
                                     checkBlankField(selm, elmval, valid.message.salutation );
                                 }
                            }
    
                            checkCompanyName();
                            checkPassword();
                            checkConfirmPassword();
                            checkEmail();
                            checkGender();
                            checkfirstname();
                            checklookonpackage();
                            checklastname();
                            checkphoneNumber();
                            checkzipcode();
                            checkstate();
                            checkaddress();
                            checkcountry();
                            checkcardtype();
                            checkcardnum();
                            checkcvc();
                            checkholdername();
                            checkexmonth();
                            checkexyear();
                            checksalutation();
                        break;
                        case  false:
                           valid.validation = true;
                        break;
                        default:
    
                    }
    
    
                },
    
                /*Get Last Index Number*/
                lastStepIndex: function() {
                    var lastIndex = $("#"+ oelm +' .rms-content-box').length - 1;
                    this.settings.lastStepIndex = lastIndex;
                },
                /*Handle footer Button visibility accroding to index number*/
                 handleStepBtn: function() {
                    var selm = $("#"+ oelm +' .rms-content-box.rms-current-section');
                    var nextbtn = $("#"+ oelm +' .next');
                    var prevbtn = $("#"+ oelm +' .prev');
                    var submitbtn = $("#"+ oelm +' .submit');
                    if (selm.index() == this.settings.lastStepIndex){
                        nextbtn.hide();
                        prevbtn.show();
                        submitbtn.show();
                     } else if (selm.index() == 0){
                        nextbtn.show();
                        prevbtn.hide();
                        submitbtn.hide();
                     } else {
                        nextbtn.show();
                        prevbtn.show();
                        submitbtn.hide();
                     }
    
                },
                /*Handle Submit Button click*/
                handleSubmitBtnClick: function(){
                    var selm = $("#"+ oelm +' .submit');
                    selm.on("click" , function (e){
                         var i = $("#"+ oelm +' .rms-content-box.rms-current-section').index();
                        if (i == oid.settings.lastStepIndex){
                            var allselm = $("#"+ oelm +' .rms-multistep-progressbar li.rms-step');
                            allselm.removeClass("rms-current-step").addClass("completed-step");
                             // alert("Thanks to submit your information");
                        }else {
                           // alert("Something is wrong");
                        }
                    });
                },
                /*Handle Next Step Button Click*/
                handleNextStep: function() {
                    var selm = $("#"+ oelm +' .next');
                    selm.on("click" , function (e){
                          oid.handleFormValidation();
                         console.log('before goto nextstep = ' +  valid.validation);
                        if (valid.validation == true){
                           oid.goToNextStep();
                        }else{
                            return false;
                        }
    
                    });
                },
                /*Handle Next Previous Button Click*/
                handlePrevStep: function() {
                    var selm = $("#"+ oelm +' .prev');
                    selm.on("click" , function (e){
                        /*console.log(e.target);*/
                         oid.goToPrevStep();
                    });
                },
                /* Go to Next Step after Click NextStep button and call goToSection Function*/
                goToNextStep: function() {
                    var i = $("#"+ oelm +' .rms-content-box.rms-current-section').index();
                    var selm = $("#"+ oelm +' .rms-multistep-progressbar li.rms-step');
                    if (i < this.settings.lastStepIndex){
                      selm.eq(i+1).addClass("rms-current-step");
                      var nextstep = i + 1;
                      var nextelm = $("#"+ oelm +' .rms-multistep-progressbar li.rms-step:lt(' + nextstep +')');
                      nextelm.removeClass("rms-current-step").addClass("completed-step");
    
                      oid.goToSection(nextstep);
                      oid.btnInformationText(nextstep, i);
                   }
                   oid.handleStepBtn();
                },
                /* Go to Previous Step after Click prevStep button and call goToSection Function*/
                goToPrevStep: function() {
                    var i = $("#"+ oelm +' .rms-content-box.rms-current-section').index();
                    var selm = $("#"+ oelm +' .rms-multistep-progressbar li.rms-step');
                    if (i > 0){
                      selm.eq(i-1).addClass("rms-current-step").removeClass('completed-step');
                      var prevstep = i - 1;
                      var prevelm = $("#"+ oelm +' .rms-multistep-progressbar li.rms-step:gt(' + prevstep +')');
                      prevelm.removeClass("rms-current-step completed-step");
                      oid.goToSection(prevstep);
                      oid.btnInformationText(prevstep, i);
                   }
                   oid.handleStepBtn();
                },
                /*Function to Handle Footer Button text*/
                btnInformationText: function(e, i) {
                    var selm = $("#"+ oelm +' .rms-multistep-progressbar li.rms-step');
                    var sit =  selm.eq(1).find('.step-title').text();
                    var nbt = selm.eq(e+1).find('.step-title').text();
                    var pbt = selm.eq(e-1).find('.step-title').text();
                    if ( i == undefined ){
                       $("#"+ oelm +' .rms-footer-section .button-section .next a small').html(sit);
                    }else{
                        $("#"+ oelm +' .rms-footer-section .button-section .next a small').html(nbt);
                        $("#"+ oelm +' .rms-footer-section .button-section .prev a small').html(pbt);
                    }
                },
                /*Handle All Step navigation click functionally and call goToStepClick*/
                 handleStepClick: function() {
                    var selm = $("#"+ oelm +' .rms-multistep-progressbar li.rms-step');
                    if (valid.allstepClickable){
                        var selm = $("#"+ oelm +' .rms-multistep-progressbar li.rms-step');
                        valid.compeletedStepClickable = false;
                        selm.closest(".rms-step-section").addClass('allstepClickable').removeClass("compeletedStepClickable");
                        stepClick ();
    
                    }else if(valid.compeletedStepClickable){
                        selm.closest(".rms-step-section").addClass('compeletedStepClickable').removeClass("allstepClickable");
                        stepClick ();
                    }
                    function stepClick (){
                        selm.on("click" , function (e){
                            oid.goToStepClick(this);
                        });
                    }
                },
                /*Handle Step Change functionally According to Option Value */
                goToStepClick: function(e) {
                    var i = $(e).index();
                    var nbt =  $(e).next().find('.step-title').text();
                    var pbt =  $(e).prev().find('.step-title').text();
                    if(valid.compeletedStepClickable){
                        if ($(e).hasClass("completed-step")){
                            stepClickConditionMatch(e, i, nbt, pbt);
                        }
                    }else{
                        stepClickConditionMatch(e, i, nbt, pbt);
                    }
    
                    function stepClickConditionMatch(e, i, n, p){
                        $(e).addClass("rms-current-step").siblings().removeClass("rms-current-step");
                        oid.goToSection(i);
                        $("#"+ oelm +' .rms-footer-section .button-section .next a small').html(nbt);
                        $("#"+ oelm +' .rms-footer-section .button-section .prev a small').html(pbt);
                    }
    
                oid.handleStepBtn();
                },
                /*This Function chnage Main Content section */
                goToSection: function(i) {
                    var selm = $("#"+ oelm +' .rms-content-box');
                    selm.eq(i).addClass("rms-current-section").siblings().removeClass("rms-current-section");
                    setTimeout(function() {
                           oid.handleAnimation();
                    }, 0.1);
                },
                /*Handle Animation Class*/
                handleAnimation: function(){
                    if(this.settings.animation){
                        var ac = this.settings.animationClass
                        $("#"+ oelm +' .rms-content-box .rms-content-area').removeClass('animated '+ ac +'');
                        $("#"+ oelm +' .rms-content-box.rms-current-section .rms-content-area').addClass('animated '+ ac +'');
                    }
                },
                /*Handle Select Field style*/
                handleSelectDropox: function() {
                    var selm = $("#"+ oelm +' .select');
                    selm.css('color','#b5b5b5');
                    selm.change(function() {
                        var celm = $(this).val();
                        if (celm != 'null') {
                            $(this).css('color','#555555');
                        } else {
                            $(this).css('color','#b5b5b5');
                        }
                    });
                },
            } );
    
            $.fn[ pluginName ] = function( options ) {
                return this.each( function() {
                    if ( !$.data( this, "plugin_" + pluginName ) ) {
                        $.data( this, "plugin_" +
                            pluginName, new Plugin( this, options ) );
                    }
                } );
            };
    
    } )( jQuery, window, document );




 