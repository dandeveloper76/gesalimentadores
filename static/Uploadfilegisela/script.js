document.forms['upload-form'].onsubmit = function(e){
	e.preventDefault();

	let error = document.querySelector(".error");
	let success = document.querySelector(".success");
	let file = this.file.files[0];  
	error.innerHTML = "";

	let formdata = new FormData(); 
	formdata.append("file", file); 
	
	let http = new XMLHttpRequest();
	http.upload.addEventListener("progress", function(event){
		let percent = (event.loaded / event.total) * 100;
		document.querySelector("progress").value = Math.round(percent);
	});
    
	function cargarBarraDeProgreso() {
  const progressBar = document.querySelector('.progress-bard');
  const progressBarInner = document.querySelector('.progress-bar-inner');
  let valor = 0;

  function incrementar() {
    valor += 10;
    progressBar.style.width = valor + '%';
	progressBarInner.textContent = valor + '%';

    if (valor < 100) {
      setTimeout(incrementar, 200); // Retraso de 500ms entre cada incremento
    } else {
		
			success.innerHTML = `Arxiu pujat correctament`;
	
      // Cuando se completa la barra de progreso, recargar la página
      setTimeout(function() {
        location.reload();
      }, 3000);
    }
  }

  incrementar();
}

cargarBarraDeProgreso();
	
	

	http.open("post", "script.php");
	http.send(formdata);
}



