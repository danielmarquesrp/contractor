$(function() {
	'use strict'
	

		// showing modal with effect
		$('.modal-effect').on('click', function(e) {
			e.preventDefault();
			var effect = $(this).attr('data-effect');
			$('#modaldemo3').addClass(effect);
		});

		// hide modal with effect
		$('#modaldemo3').on('hidden.bs.modal', function(e) {
			$(this).removeClass(function(index, className) {
				return (className.match(/(^|\s)effect-\S+/g) || []).join(' ');
			});
		});





	
		// showing modal with effect
		$('.modal-effect').on('click', function(e) {
			e.preventDefault();
			var effect = $(this).attr('data-effect');
			$('#modaldemo4').addClass(effect);
		});

		// hide modal with effect
		$('#modaldemo4').on('hidden.bs.modal', function(e) {
			$(this).removeClass(function(index, className) {
				return (className.match(/(^|\s)effect-\S+/g) || []).join(' ');
			});
		});




	// showing modal with effect
	$('.modal-effect').on('click', function(e) {
		e.preventDefault();
		var effect = $(this).attr('data-effect');
		$('#modaldemo5').addClass(effect);
	});

	// hide modal with effect
	$('#modaldemo5').on('hidden.bs.modal', function(e) {
		$(this).removeClass(function(index, className) {
			return (className.match(/(^|\s)effect-\S+/g) || []).join(' ');
		});
	});


		// showing modal with effect
		$('.modal-effect').on('click', function(e) {
			e.preventDefault();
			var effect = $(this).attr('data-effect');
			$('#modaldemo6').addClass(effect);
		});

		// hide modal with effect
		$('#modaldemo6').on('hidden.bs.modal', function(e) {
			$(this).removeClass(function(index, className) {
				return (className.match(/(^|\s)effect-\S+/g) || []).join(' ');
			});
		});


	// showing modal with effect
	$('.modal-effect').on('click', function(e) {
		e.preventDefault();
		var effect = $(this).attr('data-effect');
		$('#modaldemo7').addClass(effect);
	});
	
	// hide modal with effect
	$('#modaldemo7').on('hidden.bs.modal', function(e) {
		$(this).removeClass(function(index, className) {
			return (className.match(/(^|\s)effect-\S+/g) || []).join(' ');
		});
	});




	// showing modal with effect
	$('.modal-effect').on('click', function(e) {
		e.preventDefault();
		var effect = $(this).attr('data-effect');
		$('#modaldemo8').addClass(effect);
	});
	
	// hide modal with effect
	$('#modaldemo8').on('hidden.bs.modal', function(e) {
		$(this).removeClass(function(index, className) {
			return (className.match(/(^|\s)effect-\S+/g) || []).join(' ');
		});
	});



});
$(document).ready(function() {
	$('.select2-show-search').select2({
	 minimumResultsForSearch: '',
	 placeholder: "Search",
	 width: '100%'
   });
});