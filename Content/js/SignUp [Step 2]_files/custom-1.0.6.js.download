$(document).ready(function () {
    $vpWidth = $(window).width();
    $vpHeight = $(window).height();
    $body = $('html, body');

    //ADD CLASS TO CLICKABLES
    $('.add-transit, .apply-filter button:not(#callbtn), .bottom-fixed .heart, a:not(.signin a#resndbtn, .dropper a:last-child, .block-button, .report-button, #applyBtn, #logout-cancel, .blocked-div a, #rpblock a, .loved, .shortlist-div a, .unshortlist-div a, .unblock, .unblocked-div a, .show-location-map a, .bottom-fixed a, .remove-candidate, #more-details, .more-details-popup a, #candidate-remove-cancel, .received-nos, .anon, #mode-selection a, .call-status1 a, .call-status2 a, #clear-fields, #logoutbutton, #conconfrm, .remove-experience, #candexpPopYes, #btnOtpResend, #msnd, #dashboradexpicon, .candidate-remove-cancel, #disclaimer-link, .no-transit)').addClass('transit');
    $('.transit').on('click', function () {
        showLoader();
    });
    //MENU ICON CLICK
    $('<em></em>').appendTo($('.dropper.notification a'));
    $('<em class="pointer"></em>').appendTo($('.icon-container span'));
    $('.icon-container span').click(function () {
        menu($(this));
    });
    $('body').on('click', function (event) {
        if (!$(event.target).hasClass('menu-opened')) {
            if (menuOpen == true) {
                menu(menuScope);
            }
        }
    });

    //PULSE
    if ($vpWidth >= 640) {
        $('<i class="pulse1"></i><i class="pulse2"></i>').appendTo($('.choose a'));
        var pulse = new TimelineMax({ repeat: -1, repeatDelay: -1.35 });
        $line1 = $('.choose a .pulse1');
        $line2 = $('.choose a .pulse2');
        pulse.to($line1, 2.5, { scaleX: '1.4', scaleY: '1.4', autoAlpha: '0', ease: Power4.easeOut }, 0)
		.to($line2, 2.5, { scaleX: '1.4', scaleY: '1.4', autoAlpha: '0', ease: Power4.easeOut }, 0.25);
    }

    //SHOW PASSWORD
    $('.show-password').click(function () {
        $tb = $(this).parent().find('input[type="password"], input[type="text"]');
        if ($tb.val() != '' && $tb.attr('type') == 'password') {
            $('#password').attr('type', 'text');
        } else {
            $('#password').attr('type', 'password');
        }
    });

    //HIDE HELP ON TEXTBOX FOCUS (for smaller viewports)
    $('input, textarea').on('focus', function () {
        $('p.help').hide();
    });
    $('input, textarea').on('blur', function () {
        $('p.help').show();
    });

    //TEXTBOX PLACEHOLDER/FOCUS
    if ($vpWidth >= 1200) {
        $("<i></i>").appendTo($('.rel.hover-line'));
        $('.rel.hover-line input, .rel.hover-line textarea').focus(function () {
            TweenLite.to($(this).parent().find('i'), 1, { width: '100%', ease: SlowMo.easeOut });
        });
        $('.rel.hover-line input, .rel.hover-line textarea').blur(function () {
            TweenLite.to($(this).parent().find('i'), 1, { width: '0', ease: SlowMo.easeOut });
        });
    }
    $("<b></b>").appendTo($('.rel.hover-line, .rel.select-dd'));
    $('.rel.hover-line input, .rel.hover-line textarea').each(function () {
        $upperScript = $(this).parent('div').find('b');
        $upperScript.attr('data-denote', '0');
        $placeholder = $(this).attr('placeholder');
        $upperScript.text($placeholder);
    });
    $('.rel.select-dd select').each(function () {
        $upperScript = $(this).parent('div').find('b');
        $upperScript.attr('data-denote', '0');
        $placeholder = $(this).find('option:first-child').text();
        $upperScript.text($placeholder);
    });
    $('.rel.hover-line input, .rel.hover-line textarea').on('input propertychange paste change', function () {
        showUpperScript($(this));
    });
    $('.rel.select-dd select').on('change', function () {
        showDropdownLabel($(this));
    });

    //EXPERIENCE INCREMENTOR
    $experience = 0;
    $('.rel.number .increment').click(function () {
        $tb = $(this).parent('div').find('input[type="text"]');
        $experience = $(this).parent('div').find('input[type="text"]').val();
        $experience++;
     //   alert($experience);
        $tb.val($experience);
        $tb.change();
    });
    $('.rel.number .decrement').click(function () {
        $tb = $(this).parent('div').find('input[type="text"]');
        $experience = $(this).parent('div').find('input[type="text"]').val();
        $experience--;
        $tb.change();
        
        if ($experience < 0) {
            $experience = 0;
        } else {
            $tb.val($experience);
            $("#experienceinYears").val($experience);
           // alert($tb.val());
        }
    });

    //EDIT PROFILE - PHOTO UPLOAD (MICROSOFT COGNITIVE SERVICES)
    $fileUploader = $('.profile-pic').find('input[type="file"]');
    $uploadedImage = $('.display-pic, .pic-bg');
    $uploadHolder = $fileUploader.parent();

    //LOADER
    $('<p class="min"></p>').appendTo($('.edit-profile .loader'));
    var loadImage = new TimelineMax({ paused: true, repeat: -1 });
    loadImage.to($('.edit-profile .loader'), 1, { rotation: '360', ease: Power0.easeNone });

    $fileUploader.change(function () {
        previewImage(this);
        //  $(".thumb").thumbs();

    });
    function previewImage(input) {

        // alert(input);
        if (input.files && input.files[0]) {
            TweenLite.to($uploadedImage, 0.25, { autoAlpha: '0', ease: Power4.easeOut });
            loadImage.play();
            TweenLite.to($('.loader'), 0.25, { display: 'block', autoAlpha: '1', ease: Power0.easeNone });
            TweenLite.set($uploadHolder, { display: 'none' });
            var reader = new FileReader();
            reader.readAsDataURL(input.files[0]);

            reader.onload = function (e) {
                //   var xhr = new XMLHttpRequest();
                //  xhr.onreadystatechange = function () {
                // if (this.readyState == 4 && this.status == 200) {
                var response = document.querySelector('#response');
                var img = new Image();
                var url = window.URL || window.webkitURL;
                img.src = url.createObjectURL(input.files[0]);
                $uploadedImage.attr('src', img.src);
                loadImage.stop();
                TweenLite.to($('.edit-profile .loader'), 0.25, {
                    autoAlpha: '0', ease: Power0.easeNone,
                    onComplete: function () {
                        $('.edit-profile .loader').css({ "display": "none" });
                        TweenLite.to($uploadedImage, 0.25, { autoAlpha: '1', ease: SlowMo.easeIn });
                        TweenLite.set($uploadHolder, { display: 'block' });
                    }
                });
                // }
                /// }
                //var binaryData = reader.result;
                //alert('cognitive');
                //xhr.open('POST', 'https://api.projectoxford.ai/vision/v1.0/generateThumbnail?width=126&height=126&smartCropping=true');
                //xhr.setRequestHeader("Content-Type", "application/octet-stream");
                //xhr.setRequestHeader("Ocp-Apim-Subscription-Key", "ed36629cc6bc4296a2d1bb4fc4345d7f");
                //xhr.responseType = 'blob';
                //xhr.send(makeBlob(binaryData));
            }
        }
    }
    function makeBlob(dataURL) {
        var BASE64_MARKER = ';base64,';
        if (dataURL.indexOf(BASE64_MARKER) == -1) {
            var parts = dataURL.split(',');
            var contentType = parts[0].split(':')[1];
            var raw = decodeURIComponent(parts[1]);
            return new Blob([raw], { type: contentType });
        }
        var parts = dataURL.split(BASE64_MARKER);
        var contentType = parts[0].split(':')[1];
        var raw = window.atob(parts[1]);
        var rawLength = raw.length;
        var uInt8Array = new Uint8Array(rawLength);
        for (var i = 0; i < rawLength; ++i) {
            uInt8Array[i] = raw.charCodeAt(i);
        }
        return new Blob([uInt8Array], { type: contentType });
    }


    //JOB APPLICATION LOVE BUTTON
    $('.loved').click(function (event) {
        var like = $(this).attr('data-like');
        if ($(event.target).hasClass('calling')) {
            if (like == 0) {
                $(this).css('backgroundColor', '#269e48');
                $(this).attr('data-like', '1');
            }
            if (like == 1) {
                $(this).css('backgroundColor', '#585858');
                $(this).attr('data-like', '0');
            }
        } else {
            if (like == 0) {
                //$(this).removeClass("unfilled").addClass("filled");
                //$(this).attr('data-like', '1');
                shortlistPopup(event);
            }
            if (like == 1) {
                //$(this).removeClass("filled").addClass("unfilled");
                //$(this).attr('data-like', '0');
                unShortlistPopup(event);
            }
        }
    });
    $('.loved').each(function () {
        var like = $(this).attr('data-like');
        if ($(this).hasClass("calling")) {
            if (like == 0) {
                $(this).css('backgroundColor', '#585858');
            } else {
                $(this).css('backgroundColor', '#269e48');
            }
        } else {
            if (like == 0) {
                $(this).removeClass("filled").addClass("unfilled");
            } else {
                $(this).removeClass("unfilled").addClass("filled");
            }
        }
    });

    //REMOVE CANDIDATE FROM SHORTLIST
    $('.remove-candidate').on('click', function (event) {
        unShortlistPopup(event);
    });

    //SEE MORE
    $('.see-more').click(function () {
        TweenLite.to($(this).find('em'), 0.25, { autoAlpha: '0' });
        $(this).closest('.job-desc').find('.more').slideDown(400);
    });
    $('.see-more-skills').click(function () {
        $this = $(this);
        TweenLite.to($this, 0.25, { autoAlpha: '0', fontSize: '0' });
        $(this).closest('.vector').find('.more').slideDown(400);
    });
    $('.vague-see-more').click(function () {
        $this = $(this);
        $em = $this.find('em');
        $moreContent = $this.closest('.job-desc').find('.more');
        TweenLite.to([$this, $em], 0.1, {
            autoAlpha: '0', height: '0',
            onComplete: function () {
                $this.css({ "display": "none" });
            }
        });
        $this.parent('p').append($moreContent.text());
    });

    //BLOCKED EMPLOYERS CHAR LIMIT - CLICK
    $('.blocked .popin').click(function () {
        $block = $('#block-holder');
        $aLink = $block.find('a');
        $block.find('.person').text($(this).find('.person').text());
        $block.find('.list').text($(this).find('.list.hide').text());
        $queryString = $(this).find('input[type="hidden"]').val();
        var unblockHref = $block.find('a').attr('href');
        if (unblockHref.indexOf('?') >= 0) {
            unblockHref = unblockHref.substring(0, unblockHref.indexOf('?'));
        }
        $block.find('a').attr('href', unblockHref + '?' + $queryString);
        if ($(this).find('.icon').hasClass("isBlocked")) {
            TweenLite.to($aLink, 0.05, { opacity: '1', visibility: 'visible' });
        } else {
            TweenLite.to($aLink, 0.05, { opacity: '0', visibility: 'hidden' });
        }
        TweenLite.to($block, 0.5, { bottom: '-20px', display: 'block', opacity: '1', ease: Back.easeOut });
        $('.blocked .blocks').css({ "background": "#fff" });
        $(this).css({ "background": "#fef7e2" });
        $block.css({ "background": "#fef7e2" });
    });
    $('#block-holder .close').click(function () {
        $('.blocked .blocks').css({ "background": "#fff" });
        TweenLite.to($('#block-holder'), 0.5, {
            bottom: '-100%', opacity: '0', ease: Back.easeIn,
            onComplete: function () {
                $('#block-holder').css({ "display": "none" });
            }
        });
    });

    //CHOOSE AVATAR
    $('.rel.avatar input[type="file"]').change(function () {
        var filename = $(this).val().replace(/.*(\/|\\)/, '');
        $(this).parent().find('span').attr('data-placeholder', filename.length > 25 ? filename.substring(0, 22) + '...' : filename);
    });

    //TABS CLICK
    $('.tabs-wrapper span').click(function () {
        $spanId = $(this).attr('id');
        $('.tabs-wrapper span').removeClass("active");
        $(this).addClass("active");
        $('.tab-desc').hide();
        $('.' + $spanId).fadeIn(500);
    });

    //MAP FILTER
    $('#map, .filter-content').css({ "height": $vpHeight });
    $('.filter-content').css({ top: $vpHeight + 10 });
    $('.bring-filter').click(function () {
        TweenLite.to($('.filter-content'), 0.75, { display: 'block', top: '0', autoAlpha: '1', ease: Power4.easeOut });
    });

    //FILTER CLOSE
    $('<span id="close-filter"></span>').appendTo($('.filter-content'));
    $('.apply-filter, .filter-close, #close-filter').click(function () {
        closeFilter();
    });
    function closeFilter() {
        TweenLite.to($('.filter-content'), 1, {
            opacity: '0', top: $vpHeight, ease: Power4.easeOut,
            onComplete: function () {
                $('.filter-content').css({ "display": "none", "opacity": "0" });
            }
        });
    }

    //NUMERIC ONLY INPUT
    $('.numeric-only').on("keypress", function (evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && ((charCode < 48 || charCode > 57))) {
            return false;
        }
        return true;
    });

    //ACTIVE/EXPIRE TABS
    $('.bottom-fixed a').on('click', function (event) {
        $('.bottom-fixed a.active, .bottom-fixed a.expired').css({ "background": "#3a3c46" });
        if ($(event.target).hasClass('expired')) {
            $('.applications-active-tab').hide();
            $('.applications-expired-tab').fadeIn(400);
            $(this).css({ "background": "#f7267a" });
        }
        if ($(event.target).hasClass('active')) {
            $('.applications-expired-tab').hide();
            $('.applications-active-tab').fadeIn(400);
            $(this).css({ "background": "#f7267a" });
        }
    });

    //CHANGE VALUE OF TEXTBOX TO DB VALUE
    $dbValue = $('.rel.number').find('input[type="number"]').val();
    $('.rel.number').find('input[type="text"]').val($dbValue);

    //SAME OUTPUT FOR INPUT:NUMBER & INPUT:TEXT
    $('.swap-value').on('change keyup paste', function () {
        $('.swap-value').val($(this).val());
    });

    //LOGOUT CANCEL
    $('#logout-cancel, .logout-cancel, .hide-logout-popup, .location-popup-close, .more-details-popup a, .update-location, .candidate-remove-cancel').on('click', function () {
        TweenLite.to($('.more-details-popup, .logout-div, .report-candidate-div, .blocked-div, .unblocked-div, .location-popup, .shortlist-div, .unshortlist-div, .user-edit-location, .callconfirm-popup, .submit-confirm'),
			0.75, { opacity: '0', display: 'none', ease: Power4.easeOut });
    });

    //SHOW PLACEHOLDER ON NAVIGATION
    $items = $('.show-placeholder').find('b');
    showDenote($items);

    //ACCORDION
    if ($('.accordion').length) {
        $('.accordion').find('.panel').addClass("inactive");
        $('.accordion').find('.panel:first-child').removeClass("inactive").addClass("active");
        $('.accordion .panel-heading').on('click', function (event) {
            if ($(this).parent().find('.panel-body').hasClass('acc-open')) {
                $(this).parent('.panel').removeClass('active').addClass('inactive');
            } else {
                $(this).parent('.panel').removeClass('inactive').addClass('active');
            }
        });
    }

    //PERSIST PLACEHOLDERS
    pageinit();

    //KEEP ANONYMOUS
    $('.anon').on('click', function () {
        $this = $(this);
        var check = $this.attr('data-active');
        if (check == 'true') {
            $this.removeClass('active').addClass('inactive');
            $('#anonymous').attr('value', false);
            $this.attr('data-active', 'false');
        } else {
            $this.removeClass('inactive').addClass('active');
            $('#anonymous').attr('value', true);
            $this.attr('data-active', 'true');
        }
    });


    //SELECT MODE
    // $('.select-mode a').on('click', function(){
    // 	$('.select-mode a').removeClass('active');
    // 	$(this).addClass('active');
    // 	$index = $('.select-mode a').index($(this));
    // 	$mode = $('#mode');
    // 	switch($index){
    // 		case 0:
    // 		$mode.data('mode', 'call');
    // 		break;

    // 		case 1:
    // 		$mode.data('mode', 'mobile');
    // 		break;

    // 		case 2:
    // 		$mode.data('mode', 'message');
    // 		break;
    // 	}
    // });
    var modeCheckbox = $('#mode-selection').find('input[type="checkbox"]');
    var checkStatus = modeCheckbox.prop('checked');
    var checkLink = $('#mode-selection a');
    var calltimeDiv = $('#mode-calltime');
    if (checkStatus == true) {
        callEnabled();
    } else {
        callDisabled();
    }
    $('#mode-selection a').on('click', function () {
        $this = $(this);
        var status = $this.attr('data-checked');
        if (status == 0) {
            // callEnabled();
            // showNotification('Call Enabled');
            enableCall();
        } else {
            // callDisabled();
            // showNotification('Call Disabled');
            disableCall();
        }
    });
    $('#enable-call').on('click', function () {
        callEnabled();
    });
    $('#disable-call').on('click', function () {
        callDisabled();
    });
    function callEnabled() {
        checkLink.addClass('active').html('call enabled');
        checkLink.attr('data-checked', 1);
        modeCheckbox.prop('checked', true).attr('data-tick', 'true');
        calltimeDiv.show();
    }
    function callDisabled() {
        checkLink.removeClass('active').html('call disabled');
        checkLink.attr('data-checked', 0);
        modeCheckbox.prop('checked', false).attr('data-tick', 'false');
        calltimeDiv.hide();
    }

    //SELECT COLLAR
    $('#post-job').on('click', function () {
        if (menuOpen == true) {
            menu(menuScope);
        }
        $overlay = $('.collar-overlay');
        TweenLite.to($overlay, 1, { opacity: '1', display: 'block', ease: Power4.easeOut });
    });
    $('.collar-overlay-close').on('click', function () {
        $overlay = $('.collar-overlay');
        TweenLite.to($overlay, 1, {
            opacity: '0', ease: Power4.easeOut,
            onComplete: function () {
                TweenLite.set($overlay, { display: 'none' });
            }
        });
    });

    //UNBIND CLICK 
    $('.received-job-applications-inner').find('.loved').unbind('click');

    //CANDIDATE REMOVE OPEN 
    $('#prompt-removal .remove-candidate').on('click', function () {
        removeCandidatePopup();
    });

    //CANDIDATE REMOVE CLOSE
    $('#candidate-remove-cancel').on('click', function () {
        TweenLite.to($('.candidate-remove'), 0.75, { opacity: '0', display: 'none', ease: Power4.easeOut });
    });

    //CLOSE CALL ENABLE
    $('#enable-call, #disable-call, .call-status-cancel').on('click', function () {
        TweenLite.to($('.call-status1, .call-status2, .submit-confirm, .delete-employer'), 0.75, { opacity: '0', display: 'none', ease: Power4.easeOut });
    });

    //REPORT CANDIDATE VALIDATION
    $('#report-candidate').on('click', function () {
        reportCandidate();
    });
    $('.report-candidate-div .confirm').on('click', function () {
        var tVal = sVal = false;
        $textarea = $(this).parent().find('textarea');
        $select = $(this).parent().find('select');
        if (!$.trim($textarea.val())) {
            tVal = false;
            $textarea.parent().find('.error').show();
        } else {
            tVal = true;
            $textarea.parent().find('.error').hide();
        }
        if ($select.prop('selectedIndex') > 0) {
            sVal = true;
            $select.parent().find('.error').hide();
        } else {
            sVal = false;
            $select.parent().find('.error').show();
        }
        if (tVal == true && sVal == true) {
            TweenLite.to($('.report-candidate-div'), 0.75, { opacity: '0', display: 'none', ease: Power4.easeOut });
        }
    });

    //CALL DISABLED
    $('.call.call-disabled, .no-icon.apply-disabled').on('click', function (e) {
        e.preventDefault();
    }).css({ "cursor": "default" });

    //CALL SHORTLIST AJAX FUNCTION
    $('.shortlist-div .hide-logout-popup').on('click', function () {
        var data = $('.shortlist-div').find('.shortlistData').val();
        var array = data.split(',');
        addtosavedjob(array[0], array[1], array[2], shortlistTarget);
    });
    $('.unshortlist-div .hide-logout-popup').on('click', function () {
        var data = $('.unshortlist-div').find('.shortlistData').val();
        var array = data.split(',');
        addtosavedjob(array[0], array[1], array[2], shortlistTarget);
    });

    //MORE DETAILS POPUP
    $('#more-details').on('click', function () {
        moreDetailsPopup();
    });

    //USER EDIT LOCATION
    $('#user-edit-location').on('click', function () {
        userEditLocationPopup();
        startPopupMap();
    });

    //BODY CLICK VISUALIZER
    $clicker = $('i.clicked');
    $body.on('click', function (event) {
        event.stopPropagation();
        var x = event.pageX - 40;
        var y = event.pageY - 40;
        var clickerTL = new TimelineMax({ paused: true });
        clickerTL.to($clicker, 0.45, {
            display: 'block', scale: '1', opacity: '0', clearProps: 'all',
            onComplete: function () {
                TweenLite.set($clicker, { scale: '0', opacity: '1', left: '0', top: '0', display: 'none' });
            }
        });
        TweenLite.set($clicker, { left: x + 'px', top: y + 'px' });
        clickerTL.play();
    });

    //CLEAR FIELDS
    $('#clear-fields').on('click', function () {
        $page = $(this).closest('body');
        $page.find('input:not(input[type="submit"], input[type="hidden"])').val('');
        $page.find('select').prop('selectedIndex', 0);
        $page.find('input[type="checkbox"]').prop('checked', false);
    });

    //DISCLAIMER
    $claimPopup = $('.claim');
    $('#disclaimer-link').on('click', function () {
        TweenMax.to($claimPopup, 0.75, { display: 'block', opacity: '1' });
    });
    $claimPopup.on('click', function (event) {
        if ($(event.target).hasClass('cell') || $(event.target).hasClass('close-claim')) {
            TweenMax.to($claimPopup, 0.75, {
                opacity: '0',
                onComplete: function () {
                    $claimPopup.hide();
                }
            });
        }
    });

    //DELETE EMPLOYER
    $('.delete-emp').on('click', function () {
        deleteEmployerPopup();
    });
});

//WINDOW LOAD
$(window).load(function () {

    //INDEX SVG PATH ANIMATION
    if ($('.drawsvg').length) {
        setTimeout(function () {
            $('.drawsvg').find('path').addClass('animate-path');

            //INDEX COUNTER
            $('.incrementor').each(function () {
                incrementor($(this));
            });
        }, 1000);
    }

    function incrementor(scope) {
        var item = scope;
        var endValue = item.attr('data-end');
        var jumper = parseInt(item.attr('data-jumper'));
        var i = 0;
        var counter = setInterval(function () {
            item.text(i);
            i += jumper;
            if (i > endValue) {
                item.text(endValue);
                clearInterval(counter);
            }
        }, 10);
    }
});

//SHOW PLACEHOLDER
function pageinit() {
    $('.rel.hover-line input, .rel.hover-line textarea').each(function () {
        showUpperScript($(this));
    });
    $('.rel.select-dd select').each(function () {
        showDropdownLabel($(this));
    });
}
function showDropdownLabel(scope) {
    $this = scope;
    $upperScript = $this.parent('div').find('b');
    $val = $upperScript.attr('data-denote');
    if ($val == 0) {
        showDenote($upperScript);
    }
    if ($this.children('option:first-child').is(':selected')) {
        hideDenote($upperScript);
    }
}
function showUpperScript(scope) {
    $scope = scope;
    $upperScript = $scope.parent('div').find('b');
    $val = $upperScript.attr('data-denote');
    if ($val == 0) {
        showDenote($upperScript);
    }
    if ($scope.val() == '') {
        hideDenote($upperScript);
    }
}
function showDenote(scope) {
    $this = scope;
    TweenLite.to($this, 0.5, { left: '0', opacity: '1', display: 'block', ease: Power1.easeOut });
    $this.attr('data-denote', '1');
}
function hideDenote(scope) {
    $this = scope;
    TweenLite.to($this, 0.25, {
        left: '10px', opacity: '0', ease: Power0.easeOut,
        onComplete: function () {
            TweenLite.set($this, { display: 'none' });
        }
    });
    $this.attr('data-denote', '0');
}

//MENU
var menuOpen = false, menuScope;
function menu(scope) {
    $this = scope;
    $target = $this.attr('id');
    $open = $this.attr('data-open');
    $pointer = $('.icon-container').find('.pointer');
    $dropdown = $('.dropper' + '.' + $target);
    $flip = $dropdown.find('.flip');
    TweenLite.set($('.dropper .flip'), { opacity: '0', rotationX: '-120' });
    TweenLite.to($pointer, 0.75, { height: '0' });
    if ($open == 0) {
        $('.icon-container span').attr('data-open', '0');
        TweenLite.to($this.find('.pointer'), 0.5, {
            height: '15px', ease: Power0.easeNone,
            onComplete: function () {
                TweenLite.set($('.dropper'), { display: 'none' });
                TweenLite.to($dropdown, 0.0, {
                    display: 'block',
                    onComplete: function () {
                        TweenMax.staggerTo($flip, 0.15, { opacity: '1', rotationX: '0', ease: Power0.easeOut }, 0.15);
                    }
                });
            }
        });
        setTimeout(function () {
            menuOpen = true;
            menuScope = $this;
            $this.attr('data-open', '1');
        }, 100);
    }
    if ($open == 1) {
        TweenLite.to($pointer, 0.75, { height: '0' });
        TweenLite.to($dropdown, 0.5, { display: 'none' });
        setTimeout(function () {
            menuOpen = false;
            menuScope = null;
            $this.attr('data-open', '0');
        }, 100);
    }
}

//NOTIFICATION
function showNotification(str) {
    if (menuOpen == true) {
        menu(menuScope);
    }
    $div = $('.notify-div');
    var notify = str;
    $div.find('span').text(str);
    TweenLite.set($div, { display: 'block', width: $vpWidth, height: $vpHeight });
    TweenLite.to($div, 0.75, {
        opacity: '1', ease: Power4.easeOut,
        onComplete: function () {
            TweenLite.delayedCall(1.5, function () {
                TweenLite.to($div, 0.75, { opacity: '0', display: 'none', ease: Power4.easeOut })
            });
        }
    });
}

//SHOW SITE LOADER
$loader = $('.site-loader');
function showLoader() {
    TweenLite.set($loader, { display: 'block', width: $(window).width(), height: $(window).height() });
    TweenLite.to($loader, 0.5, { opacity: '1', ease: Power4.easeOut });
}
function hideLoader() {
    TweenLite.to($loader, 1, {
        opacity: '0', ease: Power4.easeOut,
        onComplete: function () {
            TweenLite.set($loader, { display: 'none' });
        }
    });
}

//Quit POPUP
function quitPopup() {
    if (menuOpen == true) {
        menu(menuScope);
    }
    $div = $('.quit-div .logout-div');
    TweenLite.set($div, { display: 'block', width: $vpWidth, height: $vpHeight });
    TweenLite.to($div, 0.75, { opacity: '1', ease: Power4.easeOut });
}

//LOGOUT POPUP
function logoutPopup() {
    if (menuOpen == true) {
        menu(menuScope);
    }
    $div = $('.logout-div');
    TweenLite.set($div, { display: 'block', width: $vpWidth, height: $vpHeight });
    TweenLite.to($div, 0.75, { opacity: '1', ease: Power4.easeOut });
    $('.quit-div .logout-div').hide();
}



//CALL CONFIRM POPUP
function callConfirmPopup() {
    if (menuOpen == true) {
        menu(menuScope);
    }
    $div = $('.callconfirm-popup');
    TweenLite.set($div, { display: 'block', width: $vpWidth, height: $vpHeight });
    TweenLite.to($div, 0.75, { opacity: '1', ease: Power4.easeOut });
}

//SUBMIT CONFIRM POPUP
function submitConfirmPopup() {
    if (menuOpen == true) {
        menu(menuScope);
    }
    $div = $('.submit-confirm');
    TweenLite.set($div, { display: 'block', width: $vpWidth, height: $vpHeight });
    TweenLite.to($div, 0.75, { opacity: '1', ease: Power4.easeOut });
}

//DELETE EMPLOYER POPUP
function deleteEmployerPopup() {
    if (menuOpen == true) {
        menu(menuScope);
    }
    $div = $('.delete-employer');
    TweenLite.set($div, { display: 'block', width: $vpWidth, height: $vpHeight });
    TweenLite.to($div, 0.75, { opacity: '1', ease: Power4.easeOut });
}

//USER EDIT LOCATION POPUP
function userEditLocationPopup() {
    if (menuOpen == true) {
        menu(menuScope);
    }
    $div = $('.user-edit-location');
    TweenLite.set($div, { display: 'block', width: $vpWidth, height: $vpHeight });
    TweenLite.to($div, 0.75, { opacity: '1', ease: Power4.easeOut });
}

//MORE DETAILS POPUP
function moreDetailsPopup() {
    if (menuOpen == true) {
        menu(menuScope);
    }
    $div = $('.more-details-popup');
    TweenLite.set($div, { display: 'block', width: $vpWidth, height: $vpHeight });
    TweenLite.to($div, 0.75, { opacity: '1', ease: Power4.easeOut });
}

//BLOCK CANDIDATE POPUP
function blockPopup() {
    if (menuOpen == true) {
        menu(menuScope);
    }
    $div = $('.blocked-div');
    TweenLite.set($div, { display: 'block', width: $vpWidth, height: $vpHeight });
    TweenLite.to($div, 0.75, { opacity: '1', ease: Power4.easeOut });
}
function unBlockPopup() {
    if (menuOpen == true) {
        menu(menuScope);
    }
    $div = $('.unblocked-div');
    TweenLite.set($div, { display: 'block', width: $vpWidth, height: $vpHeight });
    TweenLite.to($div, 0.75, { opacity: '1', ease: Power4.easeOut });
}

//CANDIDATE REMOVE POPUP
function removeCandidatePopup() {
    if (menuOpen == true) {
        menu(menuScope);
    }
    $div = $('.candidate-remove');
    TweenLite.set($div, { display: 'block', width: $vpWidth, height: $vpHeight });
    TweenLite.to($div, 0.75, { opacity: '1', ease: Power4.easeOut });
}

//CALL STATUS ENABLE
function enableCall() {
    if (menuOpen == true) {
        menu(menuScope);
    }
    $div = $('.call-status1');
    TweenLite.set($div, { display: 'block', width: $vpWidth, height: $vpHeight });
    TweenLite.to($div, 0.75, { opacity: '1', ease: Power4.easeOut });
}

//CALL STATUS DISABLE
function disableCall() {
    if (menuOpen == true) {
        menu(menuScope);
    }
    $div = $('.call-status2');
    TweenLite.set($div, { display: 'block', width: $vpWidth, height: $vpHeight });
    TweenLite.to($div, 0.75, { opacity: '1', ease: Power4.easeOut });
}

//REPORT CANDIDATE POPUP
function reportCandidate() {
    if (menuOpen == true) {
        menu(menuScope);
    }
    $div = $('.report-candidate-div');
    TweenLite.set($div, { display: 'block', width: $vpWidth, height: $vpHeight });
    TweenLite.to($div, 0.75, { opacity: '1', ease: Power4.easeOut });
}

//SHORTLIST POPUP
function shortlistPopup(event) {
    if (menuOpen == true) {
        menu(menuScope);
    }
    $div = $('.shortlist-div');
    TweenLite.set($div, { display: 'block', width: $vpWidth, height: $vpHeight });
    TweenLite.to($div, 0.75, { opacity: '1', ease: Power4.easeOut });
    fetchShortlistData($div, event);
}
function unShortlistPopup(event) {
    if (menuOpen == true) {
        menu(menuScope);
    }
    $div = $('.unshortlist-div');
    TweenLite.set($div, { display: 'block', width: $vpWidth, height: $vpHeight });
    TweenLite.to($div, 0.75, { opacity: '1', ease: Power4.easeOut });
    fetchShortlistData($div, event);
}
//FETCH SHORTLIST DATA
function fetchShortlistData(scope, event) {
    $div = scope;
    $parent = $(event.target).closest('.box, .job-seeker');
    $candidateID = $parent.find('.attr1').val();  ///candidate id
    $jobID = $parent.find('.attr2').val();  ///jobid
    $empID = $parent.find('.attr3').val(); ///EmployerID
    $div.find('.shortlistData').val($candidateID + "," + $jobID + "," + $empID);
    window.shortlistTarget = $(event.target).attr('id');
}
//function addtosavedjob(canid, jobid, empid){          
//	$.ajax({
//		url: ("@Url.Content('~/Candidate/addtosavedjob')"),
//		type: "POST",
//		async: true,
//		dataType: "json",
//		selectFirst: false,
//		data: {"canid":canid, "jobid": jobid, "empid":empid},
//		success: function (data) {
//		    showNotification(data.responseText);
//		}
//	});
//}

//JITHIN JS
function _subDropDownBinding(a, b, c, d) { b.change(function () { return c.empty(), c.append('<option value="">' + d + "</option>"), $.post(a, { Id: b.val() }, function (a) { $.each(a, function (a, b) { c.append('<option value="' + b.ValueField + '">' + b.TextField + "</option>") }) }, "json"), !1 }) }
function RegexCheck(n, t) { return null != n && "" != n ? t.test(n) ? !0 : !1 : !1 }
function _DropDownBindingByValue(a, b, c, d) { return c.empty(), c.append('<option value="">' + d + "</option>"), $.post(a, { Id: b }, function (a) { $.each(a, function (a, b) { c.append('<option value="' + b.ValueField + '">' + b.TextField + "</option>") }) }, "json"), !1 }

//GOOGLE MAPS STYLE
window.snazzyMapStyle =
[
    {
        "featureType": "all",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "saturation": 36
            },
            {
                "color": "#333333"
            },
            {
                "lightness": 40
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#ffffff"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#fefefe"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#fefefe"
            },
            {
                "lightness": 17
            },
            {
                "weight": 1.2
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f5f5f5"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#d0d0d0"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f5f5f5"
            },
            {
                "lightness": 21
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#dedede"
            },
            {
                "lightness": 21
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 17
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 29
            },
            {
                "weight": 0.2
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 18
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f2f2f2"
            },
            {
                "lightness": 19
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#e9e9e9"
            },
            {
                "lightness": 17
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#82afc9"
            },
            {
                "saturation": "-25"
            },
            {
                "lightness": "0"
            }
        ]
    }
];







