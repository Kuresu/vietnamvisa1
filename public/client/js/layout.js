(function($){
	var initLayout = function() {
		var hash = window.location.hash.replace('#', '');
		var currentTab = $('ul.navigationTabs a')
							.bind('click', showTab)
							.filter('a[rel=' + hash + ']');
		if (currentTab.size() == 0) {
			currentTab = $('ul.navigationTabs a:first');
		}
		showTab.apply(currentTab.get(0));
		$('#date').DatePicker({
			flat: true,
			date: '2008-07-31',
			current: '2008-07-31',
			calendars: 1,
			starts: 1,
			view: 'years'
		});
		var now = new Date();
		now.addDays(-10);
		var now2 = new Date();
		now2.addDays(-5);
		now2.setHours(0,0,0,0);
		$('#date2').DatePicker({
			flat: true,
			date: ['2008-07-31', '2008-07-28'],
			current: '2008-07-31',
			format: 'Y-m-d',
			calendars: 1,
			mode: 'multiple',
			onRender: function(date) {
				return {
					disabled: (date.valueOf() < now.valueOf()),
					className: date.valueOf() == now2.valueOf() ? 'datepickerSpecial' : false
				}
			},
			onChange: function(formated, dates) {
			},
			starts: 0
		});
		$('#clearSelection').bind('click', function(){
			$('#date3').DatePickerClear();
			return false;
		});
		$('#date3').DatePicker({
			flat: true,
			date: ['2009-12-28','2010-01-23'],
			current: '2010-01-01',
			calendars: 3,
			mode: 'range',
			starts: 1
		});
		$('#date_arrival').DatePicker({
			format:'m/d/Y',
			date: $('#date_arrival').val(),
			current: $('#date_arrival').val(),
			starts: 1,
			position: 'right',
			onBeforeShow: function(){
				$('#date_arrival').DatePickerSetDate($('#date_arrival').val(), true);
			},
			onChange: function(formated, dates){
				$('#date_arrival').val(formated);
				if ($('.closeOnSelect input').attr('checked')) {
					$('#date_arrival').DatePickerHide();
				}
			}
		});
		
		
		$('#date_exit').DatePicker({
			format:'m/d/Y',
			date: $('#date_exit').val(),
			current: $('#date_exit').val(),
			starts: 1,
			position: 'right',
			onBeforeShow: function(){
				$('#date_exit').DatePickerSetDate($('#date_exit').val(), true);
			},
			onChange: function(formated, dates){
				$('#date_exit').val(formated);
				if ($('.closeOnSelect input').attr('checked')) {
					$('#date_exit').DatePickerHide();
				}
			}
		});
		
		
		for ( var i = 1; i <= number_visa; i++) {
			var	id_expiration	=	"#passport_expiration_"+i;
			
			$(id_expiration).DatePicker({
				format:'m/d/Y',
				date: $(id_expiration).val(),
				current: $(id_expiration).val(),
				starts: 1,
				position: 'right',
				onBeforeShow: function(){
					$(id_expiration).DatePickerSetDate($(id_expiration).val(), true);
				},
				onChange: function(formated, dates){
					$(id_expiration).val(formated);
					if ($('.closeOnSelect input').attr('checked')) {
						$(id_expiration).DatePickerHide();
					}
				}
			});
		}
		
		//Applicant 1
		$("#passport_expiration_1").DatePicker({
			format:'m/d/Y',
			date: $("#passport_expiration_1").val(),
			current: $("#passport_expiration_1").val(),
			starts: 1,
			position: 'right',
			onBeforeShow: function(){
				$("#passport_expiration_1").DatePickerSetDate($("#passport_expiration_1").val(), true);
			},
			onChange: function(formated, dates){
				$("#passport_expiration_1").val(formated);
				if ($('.closeOnSelect input').attr('checked')) {
					$("#passport_expiration_1").DatePickerHide();
				}
			}
		});
		
		$("#birth_date_1").DatePicker({
			format:'m/d/Y',
			date: $("#birth_date_1").val(),
			current: $("#birth_date_1").val(),
			starts: 1,
			position: 'right',
			onBeforeShow: function(){
				$("#birth_date_1").DatePickerSetDate($("#birth_date_1").val(), true);
			},
			onChange: function(formated, dates){
				$("#birth_date_1").val(formated);
				if ($('.closeOnSelect input').attr('checked')) {
					$("#birth_date_1").DatePickerHide();
				}
			}
		});
		
		//Applicant 2
		$("#passport_expiration_2").DatePicker({
			format:'m/d/Y',
			date: $("#passport_expiration_2").val(),
			current: $("#passport_expiration_2").val(),
			starts: 1,
			position: 'right',
			onBeforeShow: function(){
				$("#passport_expiration_2").DatePickerSetDate($("#passport_expiration_2").val(), true);
			},
			onChange: function(formated, dates){
				$("#passport_expiration_2").val(formated);
				if ($('.closeOnSelect input').attr('checked')) {
					$("#passport_expiration_2").DatePickerHide();
				}
			}
		});
		
		
		$("#birth_date_2").DatePicker({
			format:'m/d/Y',
			date: $("#birth_date_2").val(),
			current: $("#birth_date_2").val(),
			starts: 1,
			position: 'right',
			onBeforeShow: function(){
				$("#birth_date_2").DatePickerSetDate($("#birth_date_2").val(), true);
			},
			onChange: function(formated, dates){
				$("#birth_date_2").val(formated);
				if ($('.closeOnSelect input').attr('checked')) {
					$("#birth_date_2").DatePickerHide();
				}
			}
		});
		
		
		//Applicant 3
		$("#passport_expiration_3").DatePicker({
			format:'m/d/Y',
			date: $("#passport_expiration_3").val(),
			current: $("#passport_expiration_3").val(),
			starts: 1,
			position: 'right',
			onBeforeShow: function(){
				$("#passport_expiration_3").DatePickerSetDate($("#passport_expiration_3").val(), true);
			},
			onChange: function(formated, dates){
				$("#passport_expiration_3").val(formated);
				if ($('.closeOnSelect input').attr('checked')) {
					$("#passport_expiration_3").DatePickerHide();
				}
			}
		});
		
		
		$("#birth_date_3").DatePicker({
			format:'m/d/Y',
			date: $("#birth_date_3").val(),
			current: $("#birth_date_3").val(),
			starts: 1,
			position: 'right',
			onBeforeShow: function(){
				$("#birth_date_3").DatePickerSetDate($("#birth_date_3").val(), true);
			},
			onChange: function(formated, dates){
				$("#birth_date_3").val(formated);
				if ($('.closeOnSelect input').attr('checked')) {
					$("#birth_date_3").DatePickerHide();
				}
			}
		});
		
		
		var now3 = new Date();
		now3.addDays(-4);
		var now4 = new Date()
		$('#widgetCalendar').DatePicker({
			flat: true,
			format: 'd B, Y',
			date: [new Date(now3), new Date(now4)],
			calendars: 3,
			mode: 'range',
			starts: 1,
			onChange: function(formated) {
				$('#widgetField span').get(0).innerHTML = formated.join(' &divide; ');
			}
		});
		var state = false;
		$('#widgetField>a').bind('click', function(){
			$('#widgetCalendar').stop().animate({height: state ? 0 : $('#widgetCalendar div.datepicker').get(0).offsetHeight}, 500);
			state = !state;
			return false;
		});
		$('#widgetCalendar div.datepicker').css('position', 'absolute');
	};
	
	var showTab = function(e) {
		var tabIndex = $('ul.navigationTabs a')
							.removeClass('active')
							.index(this);
		$(this)
			.addClass('active')
			.blur();
		$('div.tab')
			.hide()
				.eq(tabIndex)
				.show();
	};
	
	EYE.register(initLayout, 'init');
})(jQuery)