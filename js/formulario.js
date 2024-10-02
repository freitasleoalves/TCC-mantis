	process = function()
	{
		addProduto = window.open('about:blank', 'popup', 'width=475,height=400,resizable=false');
		document.login.setAttribute('target', 'popup');
		document.login.setAttribute('onsubmit', '');
		document.login.submit();
		if (window.focus)
			addProduto.focus();
	};

            function check(ca) {
                var boxes = document.getElementsByName('checkbox[]');
                for (var x = 0; x < boxes.length; x++) {
                    var obj = boxes[x];
                    if (ca.checked) {
                        obj.checked = true;
                    }
                    else {
                        obj.checked = false;
                    }
                }
            }

   