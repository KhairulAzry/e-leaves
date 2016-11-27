var info;
			$(document).ready(function(){
			
				var options2 = {
						'maxCharacterSize': 500,
						'originalStyle': 'originalTextareaInfo',
						'warningStyle' : 'warningTextareaInfo',
						'warningNumber': 100,
						'displayFormat' : '#left Characters Left | #words words'
				};
				$('#reason').textareaCount(options2);

			
			});

var info2;
			$(document).ready(function(){
			
				var options3 = {
						'maxCharacterSize': 1000,
						'originalStyle': 'originalTextareaInfo',
						'warningStyle' : 'warningTextareaInfo',
						'warningNumber': 100,
						'displayFormat' : '#left Characters Left | #words words'
				};
				$('#feed_back').textareaCount(options3);

			
			});