function checkRegistration(e){
	e.preventDefault();
	console.log('FORM SUBMIT VALIDATION');
	//e.target.submit();
	return true
}

function setLink(obj){
	console.log(obj)
	if(obj.dataset.isset !== 'no'){ // href is set
		return true;
	}else{	
		shoWform(obj);
		return false;
	}	
}


function shoWform(el){
	let hiddenInput = document.getElementById('btnId');
	hiddenInput.value = el.id;
	document.getElementById('daform').classList.remove('display-none');
	return false;
}

window.onload = function(e){ 


	document.querySelectorAll('a').forEach(function(element){
		element.addEventListener('contextmenu', function(ev) {
			ev.preventDefault();
			if(this.dataset.isset !== 'no'){ // href is set
				shoWform(this);
			}
			return false;
		}, false);
	})
}
