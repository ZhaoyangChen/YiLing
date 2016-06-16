$(document).ready(function(){	var stopBtn = $('#stopSpider');	var startBtn = $('#startSpider');	var spiderStatus = $('#status');	startBtn.on('click', function() {		$.ajax({			url: '/spider/start/',			type: 'GET'		});		$(this).prop('disabled', true);		stopBtn.prop('disabled', false);		spiderStatus.text('Working');	});	stopBtn.on('click', function() {		$.ajax({			url: '/spider/stop/',			type: 'GET'		});		$(this).prop('disabled', true);		startBtn.prop('disabled', false);		spiderStatus.text('Sleeping');	})	refreshSpiderStatus();	function refreshSpiderStatus() {		$.ajax({			url: '/spider/status/',			type: 'GET'		}).done(function(msg){			if (msg == true) {				spiderStatus.text('Working');			} else {				spiderStatus.text('Sleeping');			}		});	}});